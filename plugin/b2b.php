
/**
 * B2B Quote Payment Gateway for WooCommerce
 * Description: 提供一个询价支付方式，B2B 客户下单不在线付款，并自动设置订单为 processing 状态
 * Beskrivning: Erbjuder ett betalningsalternativ för offertförfrågan som låter B2B-kunder
 * lägga order utan direkt betalning och automatiskt sätta orderstatus till processing
 * för Visma-synkronisering.
 * Version:     1.0
 * Author:      Xingyi Chen
 */

// 1. Registrera egen gateway
add_filter( 'woocommerce_payment_gateways', 'register_b2b_offert_gateway' );
function register_b2b_offert_gateway( $gateways ) {
    $gateways[] = 'WC_Gateway_B2B_Offert';
    return $gateways;
}

// 2. Definiera gateway-klassen
class WC_Gateway_B2B_Offert extends WC_Payment_Gateway {
    public function __construct() {
        $this->id                 = 'b2b_offert';
        $this->method_title       = 'Skicka offertförfrågan';
        $this->has_fields         = false;

        // Initiera inställningar
        $this->init_form_fields();
        $this->init_settings();

        // Titel och beskrivning som visas för kunden
        $this->title              = $this->get_option( 'title', 'Skicka offertförfrågan' );
        $this->description        = $this->get_option( 'description', 'Efter att du skickat förfrågan kommer vi kontakta dig för prisbekräftelse så snart som möjligt.' );
        $this->enabled            = $this->get_option( 'enabled', 'yes' );

        // Spara inställningar i admin
        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [ $this, 'process_admin_options' ] );
    }

    // Formulärfält i admininställningar
    public function init_form_fields() {
        $this->form_fields = [
            'enabled'     => [
                'title'   => 'Aktivera/inaktivera',
                'type'    => 'checkbox',
                'label'   => 'Aktivera offertbetalningsalternativ',
                'default' => 'yes',
            ],
            'title'       => [
                'title'       => 'Rubrik',
                'type'        => 'text',
                'description' => 'Namn på betalningsalternativet på kassa-sidan',
                'default'     => 'Skicka offertförfrågan',
                'desc_tip'    => true,
            ],
            'description' => [
                'title'       => 'Beskrivning',
                'type'        => 'textarea',
                'description' => 'Beskrivning av betalningsalternativet på kassa-sidan',
                'default'     => 'Efter att du skickat förfrågan kommer vi kontakta dig för prisbekräftelse så snart som möjligt.',
            ],
        ];
    }

    // Hantera ordern vid checkout
    public function process_payment( $order_id ) {
        $order = wc_get_order( $order_id );
        // Markera som betald
        $order->payment_complete();
        // Minska lagersaldo
        wc_reduce_stock_levels( $order_id );
        // Returnera framgång och omdirigera till tack-sidan
        return [
            'result'   => 'success',
            'redirect' => $this->get_return_url( $order ),
        ];
    }
}

// 3. Visa endast gateway för B2B-kunder, dölj för andra
add_filter( 'woocommerce_available_payment_gateways', 'filter_b2b_offert_gateway' );
function filter_b2b_offert_gateway( $gateways ) {
    if ( current_user_can( 'b2b_customer' ) ) {
        // Behåll endast b2b_offert
        return isset( $gateways['b2b_offert'] ) ? [ 'b2b_offert' => $gateways['b2b_offert'] ] : [];
    } else {
        // Dölj för övriga användare
        unset( $gateways['b2b_offert'] );
        return $gateways;
    }
}

// 4. Sätt B2B-orderstatus till processing för Visma-synkronisering
add_action( 'woocommerce_checkout_order_processed', 'set_b2b_order_processing_status', 10, 3 );
function set_b2b_order_processing_status( $order_id, $posted_data, $order ) {
    if ( current_user_can( 'b2b_customer' ) ) {
        $order->update_status( 'processing', 'B2B-order, väntar på offert och synkronisering med Visma-lager' );
    }
}


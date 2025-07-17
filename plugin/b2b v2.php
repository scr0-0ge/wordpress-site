<?php
/**
 * B2B Offertbetalningsgateway för WooCommerce (med språksupport)
 * Description: 提供一个询价支付方式，B2B 客户下单不在线付款，并自动设置订单为 processing 状态
 * Beskrivning: Erbjuder ett betalningsalternativ för offertförfrågan som låter B2B-kunder
 * lägga order utan direkt betalning och automatiskt sätta orderstatus till processing
 * för Visma-synkronisering.
 * Version:     1.0
 * Author:      Xingyi Chen
 * Text-domain: b2b-offert
 */

// Helper: returnera text beroende på språk (WPML 或 get_locale)
function b2b_offert_get_text( $svenska, $english ) {
    // WPML 常用常量，回退到 get_locale()
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $lang = ICL_LANGUAGE_CODE;
    } else {
        $lang = substr( get_locale(), 0, 2 );
    }
    return in_array( $lang, [ 'en', 'en_US', 'en_GB' ], true )
        ? $english
        : $svenska;
}

// 1. Registrera egen gateway
add_filter( 'woocommerce_payment_gateways', 'register_b2b_offert_gateway' );
function register_b2b_offert_gateway( $gateways ) {
    $gateways[] = 'WC_Gateway_B2B_Offert';
    return $gateways;
}

// 2. Definiera gateway-klassen
class WC_Gateway_B2B_Offert extends WC_Payment_Gateway {
    public function __construct() {
        $this->id               = 'b2b_offert';
        // 管理后台 & 用户前端根据语言显示
        $this->method_title     = b2b_offert_get_text( 'Skicka offertförfrågan', 'Submit quote request' );
        $this->has_fields       = false;

        // Initiera inställningar
        $this->init_form_fields();
        $this->init_settings();

        // Titel och beskrivning som visas för slutkund
        $this->title            = $this->get_option( 'title',
            b2b_offert_get_text( 'Skicka offertförfrågan', 'Submit quote request' )
        );
        $this->description      = $this->get_option( 'description',
            b2b_offert_get_text(
                'Efter att du skickat förfrågan kommer vi kontakta dig för prisbekräftelse så snart som möjligt.',
                "After you submit a request, we'll contact you to confirm pricing shortly."
            )
        );
        $this->enabled          = $this->get_option( 'enabled', 'yes' );

        // Spara admin-inställningar
        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [ $this, 'process_admin_options' ] );
    }

    // Formulärfält i admininställningar
    public function init_form_fields() {
        $this->form_fields = [
            'enabled'     => [
                'title'   => __( 'Aktivera/inaktivera', 'b2b-offert' ),
                'type'    => 'checkbox',
                'label'   => __( 'Aktivera offertbetalningsalternativ', 'b2b-offert' ),
                'default' => 'yes',
            ],
            'title'       => [
                'title'       => __( 'Rubrik', 'b2b-offert' ),
                'type'        => 'text',
                'description' => __( 'Namn på betalningsalternativet på kassa-sidan', 'b2b-offert' ),
                'default'     => b2b_offert_get_text( 'Skicka offertförfrågan', 'Submit quote request' ),
                'desc_tip'    => true,
            ],
            'description' => [
                'title'       => __( 'Beskrivning', 'b2b-offert' ),
                'type'        => 'textarea',
                'description' => __( 'Beskrivning av betalningsalternativet på kassa-sidan', 'b2b-offert' ),
                'default'     => b2b_offert_get_text(
                    'Efter att du skickat förfrågan kommer vi kontakta dig för prisbekräftelse så snart som möjligt.',
                    "After you submit a request, we'll contact you to confirm pricing shortly."
                ),
            ],
        ];
    }

    // Hantera ordern vid checkout
    public function process_payment( $order_id ) {
        $order = wc_get_order( $order_id );
        // Markera som betald (virtually)
        $order->payment_complete();
        // Minska lagersaldo
        wc_reduce_stock_levels( $order_id );
        // Returnera framgång och omdirigera till tack-sida
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
        return isset( $gateways['b2b_offert'] )
            ? [ 'b2b_offert' => $gateways['b2b_offert'] ]
            : [];
    }
    // 非 B2B 用户移除
    if ( isset( $gateways['b2b_offert'] ) ) {
        unset( $gateways['b2b_offert'] );
    }
    return $gateways;
}

// 4. Sätt B2B-orderstatus till processing för Visma-synkronisering
add_action( 'woocommerce_checkout_order_processed', 'set_b2b_order_processing_status', 10, 3 );
function set_b2b_order_processing_status( $order_id, $posted_data, $order ) {
    if ( current_user_can( 'b2b_customer' ) ) {
        $order->update_status(
            'processing',
            b2b_offert_get_text(
                'B2B-order, väntar på offert och synkronisering med Visma-lager',
                'B2B order, awaiting quote and sync with Visma inventory'
            )
        );
    }
}

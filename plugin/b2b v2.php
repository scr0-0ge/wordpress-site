<?php

/**
 * B2B Offertbetalningsgateway för WooCommerce med Express Checkout-skydd
 * Beskrivning: Erbjuder ett betalningsalternativ för offertförfrågan som låter B2B-kunder
 * lägga order utan direkt betalning och automatiskt sätta orderstatus till processing
 * för Visma-synkronisering. Dölj även Apple Pay/Google Pay för B2B-roller.
 * Version:     1.0
 * Author:      Xingyi Chen
 * Text-domain: b2b-offert
 */

/**
 * Hjälpfunktion: Returnera text baserat på språk (WPML eller locale)
 */
function b2b_offert_get_text( $svenska, $english ) {
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $lang = ICL_LANGUAGE_CODE;
    } else {
        $lang = substr( get_locale(), 0, 2 );
    }
    return in_array( $lang, [ 'en', 'en_US', 'en_GB' ], true )
        ? $english
        : $svenska;
}

/**
 * 1. Registrera den egna gatewayen
 */
add_filter( 'woocommerce_payment_gateways', 'register_b2b_offert_gateway' );
function register_b2b_offert_gateway( $gateways ) {
    $gateways[] = 'WC_Gateway_B2B_Offert';
    return $gateways;
}

/**
 * 2. Definiera gateway-klassen WC_Gateway_B2B_Offert
 */
class WC_Gateway_B2B_Offert extends WC_Payment_Gateway {

    public function __construct() {
        $this->id                 = 'b2b_offert';
        $this->method_title       = b2b_offert_get_text( 'Skicka offertförfrågan', 'Submit quote request' );
        $this->has_fields         = false;

        // Initiera admininställningar
        $this->init_form_fields();
        $this->init_settings();

        // Titel och beskrivning som visas på kassa-sidan
        $this->title              = $this->get_option( 'title',
            b2b_offert_get_text( 'Skicka offertförfrågan', 'Submit quote request' )
        );
        $this->description        = $this->get_option( 'description',
            b2b_offert_get_text(
                'Efter att du skickat förfrågan kommer vi kontakta dig för prisbekräftelse så snart som möjligt.',
                "After you submit a request, we'll contact you to confirm pricing shortly."
            )
        );
        $this->enabled            = $this->get_option( 'enabled', 'yes' );

        // Spara inställningar i admin
        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [ $this, 'process_admin_options' ] );
    }

    /**
     * 2.1 Formulärfält i admininställningar
     */
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

    /**
     * 2.2 Hantera ordern vid checkout
     */
    public function process_payment( $order_id ) {
        $order = wc_get_order( $order_id );
        // Markera som betald (virtuellt)
        $order->payment_complete();
        // Minska lagersaldo
        wc_reduce_stock_levels( $order_id );
        // Returnera resultat och omdirigera till tack-sida
        return [
            'result'   => 'success',
            'redirect' => $this->get_return_url( $order ),
        ];
    }
}

/**
 * 3. Endast B2B-kunder ser offert-gatewayen, andra döljs
 */
add_filter( 'woocommerce_available_payment_gateways', 'filter_b2b_offert_gateway', 100 );
function filter_b2b_offert_gateway( $gateways ) {
    if ( current_user_can( 'b2b_customer' ) ) {
        foreach ( $gateways as $id => $gateway ) {
            if ( 'b2b_offert' !== $id ) {
                unset( $gateways[ $id ] );
            }
        }
        return $gateways;
    }
    if ( isset( $gateways['b2b_offert'] ) ) {
        unset( $gateways['b2b_offert'] );
    }
    return $gateways;
}

/**
 * 4. Sätt B2B-orderstatus till processing för Visma-synkronisering
 */
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

/**
 * 5. Dölj Express Checkouts (Apple Pay/Google Pay) för B2B-kunder via inline CSS
 */
add_action( 'wp_head', 'b2b_offert_remove_express_checkouts_css', 1 );
function b2b_offert_remove_express_checkouts_css() {
    if ( ! current_user_can( 'b2b_customer' ) ) {
        return;
    }
    echo '<style>
        /* Dölj Stripe Payment Request API-knappar */
        #wc-stripe-payment-request-wrapper,
        .wc-stripe-payment-request-button,
        /* Dölj WooPayments Block Express Checkouts */
        .wc-block-checkout-payment-request-wrapper,
        .wc-block-components-checkout-payment-request {
            display: none !important;
        }
    </style>';
}


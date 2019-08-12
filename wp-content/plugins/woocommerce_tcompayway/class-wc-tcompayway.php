<?php
/*
Plugin Name: T-com payway WooCommerce Gateway

Description: Extends WooCommerce with T-com payway payment gateway.
Version: 2.0

Copyright: © 2015 AG media.

*/
 
 add_action( 'plugins_loaded', 'WC_Gateway_TcomPayway_init', 0 );
 
function WC_Gateway_TcomPayway_init()
{
 
	if ( !class_exists( 'WC_Payment_Gateway' ) ) return;
	
    load_plugin_textdomain( 'wc-tcompayway', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); // localization
	
	/**
     * TcomPayway gateway class
	 * @ tcompayway_WC_Gateway_TcomPayway
     */
    class WC_Gateway_TcomPayway extends WC_Payment_Gateway {
		
		/**
		 * Class constructor
		 */
		function __construct() {
			$this->id 				= 'tcompayway';
			$this->method_title 	= __( 'T-Com Payway', 'tcompayway' );
			$this->icon 			= WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . '/assets/images/icon.png';
			$this->has_fields		= false;
			$this->debug_email 		= get_option( 'admin_email' );
			$this->liveurl			= 'https://pgw.ht.hr/services/payment/api/authorize-form';
			$this->testurl			= 'https://pgwtest.ht.hr/services/payment/api/authorize-form';
			
			// Load the form fields.
			$this->init_form_fields();
			
			// Load the settings.
			$this->init_settings();

			$currency_code = get_woocommerce_currency_symbol();
			
			// Define user set variables
			$this->title			= $this->settings['title'];
			$this->description		= $this->settings['description'];
			$this->shop_id			= $this->settings['shop_id'];
			$this->secret_key		= $this->settings['secret_key'];
			if($currency_code != 'kn'){
			//$this->language		    = $this->settings['language'];
				$this->language		    = 'en';
			}

			else{
				$this->language		    = 'hr';
			}

			$this->authorization_type	= $this->settings['authorization_type'];
			$this->testmode			= $this->settings['testmode'];
			$this->notify_url		= WC()->api_request_url( 'WC_Gateway_TcomPayway' );
			
			// Actions
			add_action( 'valid-tcompayway-request', array( $this, 'successful_request' ) );
			add_action( 'woocommerce_receipt_tcompayway', array( $this, 'receipt_page' ) );
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
			add_action( 'woocommerce_thankyou_tcompayway', array( $this, 'thankyou_page' ) );
			
			// Payment listener/API hook
			add_action( 'woocommerce_api_wc_gateway_tcompayway', array( $this, 'check_tcompayway_response' ) );
		}
		
		/**
		 * Init tcompayway Administration Fields
		 */
		function init_form_fields() {
			$this->form_fields = array(
                'enabled' => array(
                    'title'			=> __( 'Enable', 'tcompayway' ),
                    'type'			=> 'checkbox',
                    'label'			=> __( 'Enable T-Com Payway Payment Gateway.', 'tcompayway' ),
					'description'	=> __( 'Turn On or Off T-Com Payway Payment Gateway.' ),
                    'default'		=> 'no',
					'desc_tip'    	=> true ),
                'title' => array(
                    'title'			=> __( 'Title:', 'tcompayway' ),
                    'type'			=> 'text',
                    'description' 	=> __( 'This controls the title which the user sees during checkout.', 'tcompayway' ),
                    'default'		=> __( 'T-Com Payway', 'tcompayway' ),
					'desc_tip'    	=> true ),
                'description' => array(
                    'title'			=> __( 'Description:', 'tcompayway' ),
                    'type'			=> 'textarea',
                    'description'	=> __( 'This controls the description which the user sees during checkout.', 'tcompayway' ),
                    'default'		=> __( 'T-Com Payway sustav za internet autorizaciju i naplatu kreditnih i debitnih kartica.', 'tcompayway' ),
					'desc_tip'    	=> true ),
                'shop_id' => array(
                    'title'			=> __( 'Shop ID', 'tcompayway' ),
                    'type'			=> 'text',
                    'description'	=> __( 'Shop ID provided by T-Com Payway' ),
					'desc_tip'    	=> true ),
                'secret_key' => array(
                    'title'			=> __( 'Secret Key', 'tcompayway' ),
                    'type'			=> 'text',
                    'description'	=>  __( 'SecretKey provided by T-Com Payway', 'tcompayway' ),
					'desc_tip'    	=> true ),


               


                 'language' => array(
                    'title'			=> __( 'Language', 'tcompayway' ),
                    'type'			=> 'select',
                    'class'       => 'wc-enhanced-select',
                    'description'	=>  __( 'Select language on T-Com Payway form', 'tcompayway' ),
                   'default'     => 'hr',
		           'desc_tip'    => true,
		           'options'     => array(
			       'hr'          => __( 'Croatian language', 'tcompayway' ),
			       'en'          => __( 'English language', 'tcompayway' ),
			       'de'          => __( 'German language', 'tcompayway' ),
			       'it'          => __( 'Italian language', 'tcompayway' ),
			       'fr'          => __( 'France language', 'tcompayway' ),
			       'ru'          => __( 'Russian language', 'tcompayway' )
		             )
	               ),


                   'authorization_type' => array(
                    'title'			=> __( 'Authorisation type', 'tcompayway' ),
                    'type'			=> 'select',
                    'class'       => 'wc-enhanced-select',
                    'description'	=>  __( 'Select authorisation type ', 'tcompayway' ),
                   'default'     => '0',
		           'desc_tip'    => true,
		           'options'     => array(
			       '0'          => __( 'Authorization in two steps (pre-authorization)', 'tcompayway' ),
			       '1'          => __( 'Authorization in one step (automatic authorization)', 'tcompayway' )
		             )
	               ),

                 


				'testing' => array(
					'title' 		=> __( 'GATEWAY TEST MODE', 'tcompayway' ),
					'type' 			=> 'title',
					'description'	=> __( 'ATTENTION: disable T-Com Payway sandbox mode if you want go live with your store.', 'tcompayway' ) ),
				    'testmode' => array(
					'title' 		=> __( 'T-Com Payway sandbox', 'tcompayway' ),
					'type' 			=> 'checkbox',
					'label' 		=> __( 'Enable T-Com Payway Sandbox?', 'tcompayway' ),
					'default' 		=> 'yes',
					'description' 	=> __( 'T-Com Payway sandbox can be used to test payments without credit card charges.', 'tcompayway' ),
					'desc_tip'    	=> true )
            );
		}
		
		/**
         * Admin Panel Options
         * - Options for bits like 'title' and availability on a country-by-country basis
         */
        public function admin_options() {
            echo '<h3>'.__( 'T-Com Payway Payment Gateway', 'tcompayway' ).'</h3>';
          $currency_code = get_woocommerce_currency_symbol();


          if($currency_code != 'kn'){
			//$this->language		    = $this->settings['language'];
				 echo '<p>'.__( 'T-Com Payway – On-line authorization and payment of credit card.' ).'</p>';
			}

			else{
				   echo '<p>'.__( 'T-Com Payway sustav za internet autorizaciju i naplatu kreditnih i debitnih kartica.' ).'</p>';
			}

         

          



            echo '<table class="form-table">';
            $this->generate_settings_html();
            echo '</table>';
        }
		
		/**
         *  There are no payment fields for T-Com Payway, but we want to show the description if set.
         */
        function payment_fields() {
            if( $this->description ) echo wpautop( wptexturize( $this->description ) );
        }
		
		/**
         * Thank you Page
         */
		function thankyou_page() {
			echo '<p>'.__( 'Hvala na kupovini u našem shopu. Vaš račun je naplaćen i transakcije je bila uspješna. Narudžbu šaljemo odmah.', 'tcompayway' ).'</p>';
		}
		
		/**
         * Receipt Page
         */
        function receipt_page( $order ) {
            echo '<p>'.__( 'Hvala vam na narud&#382;bi, molimo klinite na gumb ispod da bi platili sa T-Com Payway - sustavom za internet autorizaciju i naplatu kreditnih i debitnih kartica.', 'tcompayway' ).'</p>';
            echo $this->generate_tcompayway_form( $order );
        }
		
		/**
         * Generate tcompayway button link
         */
        function generate_tcompayway_form( $order_id ) {
			global $woocommerce;
			
            $order = new WC_Order($order_id);
			
			// Test mode on | off
			if( $this->testmode == 'yes' ) $tcompayway_adr = $this->testurl; else $tcompayway_adr = $this->liveurl;
			
			$error_url = get_site_url();
      $order_id = $order_id.'_'.date("ymds"); // Unique order id
			
      //$order_total  = bcmul($order->order_total, 100);
      
      //get eur rate from HNB
      
      $eur_rate = get_transient( 'eur_rate' );

      if ( empty( $eur_rate ) ){

          $response = wp_remote_get( 'http://hnbex.eu/api/v1/rates/daily');
  
          if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) )
  
                  $eur_rate = '7.55';
  
          try {
  
                  $result = wp_remote_retrieve_body( $response );
  
                  $currency_list = json_decode( $result, true);
  
                  foreach ($currency_list as $item) {
  
                          if ($item['currency_code'] === 'EUR') {
  
                                  $eur_rate = $item['median_rate'];
  
                          }
  
                  }
  
                  set_transient( 'eur_rate', $eur_rate, 6 * HOUR_IN_SECONDS );
  
          } catch ( Exception $ex ) {
  
                  error_log( 'HNBEX API REQUEST ERROR : ' . $ex->getMessage() );
  
                  $eur_rate = '7.55';
  
          }

       }
      // end get eur rate from HNB
			
      // increase order_total for eur rate

$currency_code = get_woocommerce_currency_symbol();

      //if($eur_rate > 1){

if($currency_code != 'kn'){
          $order_total  = $order->order_total * $eur_rate;
          $order_total  = bcmul($order_total, 100);
      }  else {
          $order_total  = bcmul($order->order_total, 100);
      }
      
			//$methodname1 = 'authorize-form';
			
			// Generate sha512 signature
            $checksum = $this->GenerateSignature
			(
			'authorize-form',
			$this->secret_key,			

			$this->shop_id,		
			$this->secret_key,			

            $order_id,
            $this->secret_key,	

            $order_total,
			$this->secret_key,

		    $this->authorization_type,
			 $this->secret_key,
			 
            $this->language,
			 $this->secret_key,
				
			 $this->notify_url,
			 $this->secret_key,
		
			$this->notify_url,
			$this->secret_key,

			 $order->billing_first_name,
			 $this->secret_key,

			 $order->billing_last_name,
			  $this->secret_key,

			  $order->billing_address_1,
			   $this->secret_key,

			   $order->billing_city,
			    $this->secret_key,

			   $order->billing_postcode,	
			    $this->secret_key,

			   $order->billing_country,	
			    $this->secret_key,

			   $order->billing_phone,	
			    $this->secret_key,

			   $order->billing_email,
			   $this->secret_key 
			);
			
			$tcompayway_args = array
			(
				
				'pgw_shop_id'				=> $this->shop_id,
				'pgw_order_id'		=> $order_id,			
                'pgw_amount'			=> $order_total,
				'pgw_authorization_type'    =>  $this->authorization_type,		
				'pgw_language'     => $this->language,
				'pgw_success_url' => $this->notify_url,		
				'pgw_failure_url'		=> $this->notify_url,
                'pgw_first_name' 	=> $order->billing_first_name,
				'pgw_last_name'		=> $order->billing_last_name,
                'pgw_street'		=> $order->billing_address_1,
				'pgw_post_code'			=> $order->billing_postcode,
				'pgw_city'			=> $order->billing_city,
				'pgw_email'			=> $order->billing_email,
                'pgw_country'		=> $order->billing_country,
                'pgw_telephone'			=> $order->billing_phone,
                'pgw_signature'				=> $checksum
				  
			);

            $tcompayway_args_array = array();
            
			foreach( $tcompayway_args as $key => $value )
			{
                $tcompayway_args_array[] = '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '"/>';
            }

      
			
			wc_enqueue_js( '
				$.blockUI({
						message: "' . esc_js( __( 'Hvala vam na narudžbi,preusmjeravamo vas na T-com payway - sustavom za internet autorizaciju i naplatu kreditnih i debitnih kartica.'  , 'tcompayway' ) ) . '",
						baseZ: 99999,
						overlayCSS:
						{
							background: "#fff",
							opacity: 0.6
						},
						css: {
							padding:        "25px",
							zindex:         "999999",
							textAlign:      "center",
							color:          "#666",
							border:         "3px solid #ef007b",
							backgroundColor:"#fff",
							cursor:         "wait",
							lineHeight:		"24px",
						}
					});
				jQuery("#submit_tcompayway_payment_form").click();
			' );
			
            return 	'<form action="' . esc_attr( $tcompayway_adr ) . '" method="post" id="tcompayway_payment_form">
					 ' . implode( '', $tcompayway_args_array ) . '
					 <!-- Button Fallback -->
					 <div class="payment_buttons">
						<input type="submit" class="button" id="submit_tcompayway_payment_form" value="'.__( 'Pay via T-Com Payway', 'tcompayway' ).'" /> 
						<a class="button cancel" href="'.$order->get_cancel_order_url().'">'.__( 'Cancel order &amp; restore cart', 'tcompayway' ).'</a>
					 </div>
					/* 
					</form>';
        }
		
		/**
         * Process the payment and return the result
         */
        function process_payment( $order_id ) {
			
			$order = new WC_Order( $order_id );
			
			return array(
					'result' => 'success', 
					'redirect' => $order->get_checkout_payment_url( true )
			);
		}
		
		//Checking T-Com Payway Response 
		function check_tcompayway_response() {
			global $woocommerce;
			
			// Lets get tcompayway response parameters
			$posted = stripslashes_deep( $_REQUEST );



			$order_id	= (int)$posted['pgw_order_id'];
			$order		= new WC_Order( $order_id );
			
			
			$pgw_trace_ref  = $posted['pgw_trace_ref'];
			$pgw_transaction_id  = $posted['pgw_transaction_id'];
			$pgw_order_id  = $posted['pgw_order_id'];
			$pgw_amount  = $posted['pgw_amount'];
			$pgw_installments  = $posted['pgw_installments'];
			$pgw_card_type_id  = $posted['pgw_card_type_id']; 
			$pgw_signature = $posted['pgw_signature']; 
			

			
			
			// Verify incoming hash
			$hash = $this->VerifySignature
			(
				$pgw_trace_ref,
				$this->secret_key,
				$pgw_transaction_id,
				$this->secret_key,
				$pgw_order_id,
				$this->secret_key,				
				$pgw_amount,
				$this->secret_key,
				$pgw_installments,
				$this->secret_key,
				$pgw_card_type_id,
				$this->secret_key
			); 
			
			/**
			 * Successful Payment
			 */
			if( (!empty($posted['pgw_transaction_id']))  && ($hash == $posted['pgw_signature'])  ) {
				$order->add_order_note( __( 'tcompayway payment completed.', 'tcompayway' ) );
				$order->payment_complete();			
							
				// Redirection to order page
				wp_redirect( $this->get_return_url($order) );
			}
			
			
			/**
			 * Hacking Attempt
			 */
			else
			if( (empty($posted['pgw_transaction_id'])) && ($hash == $posted['pgw_signature']) ) {
				
				// Kill futher operations
				wp_die( 'Illegal access detected!' ); 
			} 
			
			/**
			 * Transaction Rejected
			 */


			else
			if( ($posted['pgw_result_code']) != 0) {
			
				// Change the status to pending / unpaid
				$order->update_status( 'pending', __( 'Payment declined', 'tcompayway' ) );
				
				// WooCommerce 2.1
				if( function_exists( 'wc_add_notice' ) ) {
					wc_add_notice( __( 'Transaction rejected: order ID: #'.$order_id.' rejected! Please contact site administrator.'), $notice_type = 'error' );
				} else {
					// WooCommerce 2.0
					$woocommerce->add_error( __( 'Transaction rejected: ', 'tcompayway' ) . 'order ID: #'.$order_id.' rejected! Please contact site administrator.' );
				}
				
				wp_redirect( $woocommerce->cart->get_checkout_url());
				exit;
			}
        }
		
		/**
         *  Generate SHA512 Signature
         */
		
		
	private function GenerateSignature( $MethodName,$SecretKey1,$ShopID,$SecretKey2,$OrderID,$SecretKey3,$Amount,$SecretKey4,$AutorisationType,$SecretKey5,$Language,$SecretKey6,$SuccesURL,$SecretKey7,$FailureURL,$SecretKey8,$FirstName,$SecretKey9,$LastName,$SecretKey10,$Street,$SecretKey11,$City,$SecretKey12,$PostCode,$SecretKey13,$Country,$SecretKey14,$Telephone,$SecretKey15,$Email,$SecretKey16) {
					
     $str = $MethodName.$SecretKey1.$ShopID.$SecretKey2.$OrderID.$SecretKey3.$Amount.$SecretKey4.$AutorisationType.$SecretKey5.$Language.$SecretKey6.$SuccesURL.$SecretKey7.$FailureURL.$SecretKey8.$FirstName.$SecretKey9.$LastName.$SecretKey10.$Street.$SecretKey11.$City.$SecretKey12.$PostCode.$SecretKey13.$Country.$SecretKey14.$Telephone.$SecretKey15.$Email.$SecretKey16;

		$signature = openssl_digest($str, 'sha512');
			
			return $signature;
        }

     /* 
		
		/**
		 * Verify Return SHA512 Signature
		 */
		 private function VerifySignature( $TraceRef,$SecretKey1,$TransactionID,$SecretKey2,$OrderID,$SecretKey3,$Amount,$SecretKey4,$Installments,$SecretKey5,$CardTypeID,$SecretKey6 ) {
			
			$str = $TraceRef.$SecretKey1.$TransactionID.$SecretKey2.$OrderID.$SecretKey3.$Amount.$SecretKey4.$Installments.$SecretKey5.$CardTypeID.$SecretKey6;
			
			$signature = openssl_digest($str, 'sha512');
			
			return $signature; 
		 }
	} //--> End WC_Gateway_tcompayway class
	
	/**
     * rgister tcompayway Gateway into WooCommerce
     */
    function woocommerce_add_tcompayway_gateway( $methods ) 
	{
        $methods[] = 'WC_Gateway_TcomPayway';
        return $methods;
    }
	add_filter( 'woocommerce_payment_gateways', 'woocommerce_add_tcompayway_gateway' );
}
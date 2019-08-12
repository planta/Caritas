<?php

/**
 * Give – Donation Plugin Functions
 * 
 * https://wordpress.org/plugins/give/
 */


/**
 * LC Give form select option
 */


add_action( 'wp_footer', 'humane_give_kc_select_donation_form_options' );

if(!function_exists('humane_give_kc_select_donation_form_options')){
	function humane_give_kc_select_donation_form_options(){

		$output = array();
 		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'give_forms', 
		);

		$give_forms = get_posts( $args );

		foreach ( $give_forms as $give_form ) {
			$output[$give_form->ID] = esc_html( get_the_title( $give_form->ID ) );
		}
	}
}
<?php
/**
 * Humane Theme Customizer
 *
 * @package Humane
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if( !function_exists('humane_customize_register') ){
	function humane_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'humane_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if( !function_exists('humane_customize_preview_js') ){
	function humane_customize_preview_js() {
		wp_enqueue_script( 'humane_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
	}
}
add_action( 'customize_preview_init', 'humane_customize_preview_js' );

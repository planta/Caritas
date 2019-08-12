<?php
/**
 * Plugin Name:       Humane CPT and Shortcodes
 * Plugin URI:        http://wpbean.com/plugins/
 * Description:       Custom post types and shortcodes for Humane theme.
 * Version:           1.0.8
 * Author:            XooThemes
 * Author URI:        https://xoothemes.com
 * Text Domain:       xt-humane-cpt-shortcode
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * Localization
 */

if( !function_exists('humane_shortcode_plugin_textdomain') ){
	function humane_shortcode_plugin_textdomain() {
		load_plugin_textdomain( 'xt-humane-cpt-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}
add_action( 'init', 'humane_shortcode_plugin_textdomain' );


/**
 * Current version
 */

if ( ! defined( 'XT_THEME_VERSION' ) ) {
	define( 'XT_THEME_VERSION', '1.0' );
}



/**
 * Requred files 
 */

add_action( 'plugins_loaded', 'humane_plugin_required_files' );

function humane_plugin_required_files() {
	
    $theme = wp_get_theme();

	if ( 'Humane' == $theme->name || 'Humane' == $theme->parent_theme ) {
	    
		require_once dirname( __FILE__ ) . '/inc/xt-aq-resizer.php';
		require_once dirname( __FILE__ ) . '/inc/theme-functions.php';
		require_once dirname( __FILE__ ) . '/inc/theme-cpt.php';
		require_once dirname( __FILE__ ) . '/inc/theme-shortcode.php';
		require_once dirname( __FILE__ ) . '/inc/theme-widgets.php';
		require_once dirname( __FILE__ ) . '/admin/codestar-framework/cs-framework.php';

		if ( class_exists( 'Give' ) ){
			require_once dirname( __FILE__ ) . '/inc/give-functions.php';
			require_once dirname( __FILE__ ) . '/inc/give-custom-shortcode.php';
		}

		if( defined('KC_VERSION') && function_exists('kc_add_map') ) {
			require_once dirname( __FILE__ ) . '/inc/kc-map.php';
			if ( class_exists( 'Charitable' ) ){
				require_once dirname( __FILE__ ) . '/inc/charitable-kc-map.php';
			}
			if ( class_exists( 'Give' ) ){
				require_once dirname( __FILE__ ) . '/inc/give-kc-map.php';
			}
		}

	}

}


/**
 * Define template path for KingComposer
 */

add_action('init', 'humane_kc_template_path_init', 99 );
 
if( !function_exists('humane_kc_template_path_init') ){
	function humane_kc_template_path_init(){
		if( defined('KC_VERSION') && function_exists('kc_add_map') ) {
			global $kc;
			$kc->set_template_path( dirname( __FILE__ ) .'/kc_templates/' );
		}
	}
}
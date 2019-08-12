<?php

/**
 * Humane Custom WooCommerce Functions
 *
 * Author: XooThemes
 * Since : 1.0
 */

/**
 * Adding WooCommerce 3.0 gallery and Zoom Support
 */

if(!function_exists('humane_woocommerce_theme_setup')){
	function humane_woocommerce_theme_setup() {
		$ch_need_woo_zoom 				= cs_get_option('ch_need_woo_zoom');
		$ch_need_woo_lightbox 			= cs_get_option('ch_need_woo_lightbox');
		$ch_need_woo_lightbox_slider 	= cs_get_option('ch_need_woo_lightbox_slider');

		if( $ch_need_woo_zoom == true ){
			add_theme_support( 'wc-product-gallery-zoom' );
		}
		if( $ch_need_woo_lightbox == true ){
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
		if( $ch_need_woo_lightbox_slider == true ){
			add_theme_support( 'wc-product-gallery-slider' );
		}
	}
}

add_action( 'after_setup_theme', 'humane_woocommerce_theme_setup' );

/**
 * WooCommerce breadcrumb
 */

function humane_woocommerce_breadcrumb_setup(){
	if( is_woocommerce() ) {
		add_action( 'humane_breadcrumb', 'woocommerce_breadcrumb' );
		remove_action( 'humane_breadcrumb', 'humane_breadcrumb_setup' );
	}
}
add_action( 'template_redirect', 'humane_woocommerce_breadcrumb_setup' );


/**
 * Enqueue WooCommerce scripts and styles.
 */

if(!function_exists('humane_woocommerce_scripts')){
	function humane_woocommerce_scripts() {
		wp_enqueue_style( 'ch-woocommerce-main', get_template_directory_uri() . '/assets/css/ch-woocommerce-main.css', array(), '1.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'humane_woocommerce_scripts' );



/**
 * Check WooCommerce
 */

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}


/**
 * Content area class
 */

add_filter( 'humane_content_area_class', 'humane_wocommerce_contet_area_class' );
if(!function_exists('humane_wocommerce_contet_area_class')){
	function humane_wocommerce_contet_area_class ( $class ) {

		if( is_shop() ){

			$ch_shop_layout = cs_get_option( 'xt_shop_layout', 'right' );

			if( $ch_shop_layout == 'right' ){
				$class = 'col-md-9';
			}elseif ( $ch_shop_layout == 'left' ) {
				$class = 'col-md-9 col-md-push-3';
			}elseif( $ch_shop_layout = 'full_width' ){
				$class = 'col-md-12';
			}

		}

		if( is_singular( 'product' ) ){

			$ch_product_layout = cs_get_option('ch_product_layout', 'right');

			if( $ch_product_layout == 'right' ){
				$class = 'col-md-9';
			}elseif ( $ch_product_layout == 'left' ) {
				$class = 'col-md-9 col-md-push-3';
			}elseif( $ch_product_layout = 'full_width' ){
				$class = 'col-md-12';
			}

		}

		return $class;
	}
}


/**
 * Widget area class
 */

add_filter( 'humane_widget_area_class', 'humane_woocomerce_widget_area_class' );
if(!function_exists('humane_woocomerce_widget_area_class')){
	function humane_woocomerce_widget_area_class ( $class ) {
		
		if( is_shop() ){

			$ch_shop_layout = cs_get_option('ch_shop_layout', 'right');

			if( $ch_shop_layout == 'right' ){
				$class = 'col-md-3';
			}elseif ( $ch_shop_layout == 'left' ) {
				$class = 'col-md-3 col-md-pull-9';
			}elseif( $ch_shop_layout = 'full_width' ){
				$class = '';
			}

		}

		if( is_singular( 'product' ) ){

			$ch_product_layout = cs_get_option('ch_product_layout', 'right');

			if( $ch_product_layout == 'right' ){
				$class = 'col-md-3';
			}elseif ( $ch_product_layout == 'left' ) {
				$class = 'col-md-3 col-md-pull-9';
			}elseif( $ch_product_layout = 'full_width' ){
				$class = '';
			}

		}
		
		return $class;

	}
}



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if(!function_exists('humane_woocommerce_widgets_init')){
	function humane_woocommerce_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Shop', 'humane' ),
			'id'            => 'woocommerce_shop',
			'description'   => esc_html__( 'Add widgets here. It will be shown to the WooCommerce shop and few other WooCommerce pages.', 'humane' ),
			'before_widget' => '<section id="%1$s" class="widget shadow humane-shadow-padding %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Product', 'humane' ),
			'id'            => 'woocommerce_product',
			'description'   => esc_html__( 'Add widgets here. It will be shown to the WooCommerce product page.', 'humane' ),
			'before_widget' => '<section id="%1$s" class="widget shadow humane-shadow-padding %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}

add_action( 'widgets_init', 'humane_woocommerce_widgets_init' );



/**
 * Woo Page Title
 */


add_filter( 'xt_theme_page_title', 'humane_woocommerce_page_title' );

if(!function_exists('humane_woocommerce_page_title')){
	function humane_woocommerce_page_title( $title ){
		if( is_shop() || is_singular( 'product' ) ){
			$title = woocommerce_page_title( false );
		}

		return $title;
	}
}


/**
 * Remove default Woo Page Title
 */

add_filter( 'woocommerce_show_page_title' , '__return_false' );

/**
 * Shop product columns
 */

add_filter('loop_shop_columns', 'humane_woocommerce_product_loop_columns');

if (!function_exists('humane_woocommerce_product_loop_columns')) {
	function humane_woocommerce_product_loop_columns() {
		$ch_shop_loop_column = cs_get_option('ch_shop_loop_column', 3);
		return $ch_shop_loop_column;
	}
}

/**
 * Adding column number to body class
 */

add_filter('body_class', 'humane_woocommerce_body_class');

if(!function_exists('humane_woocommerce_body_class')){
	function humane_woocommerce_body_class($classes) {
		$ch_shop_loop_column = cs_get_option('ch_shop_loop_column', 3);

	    if ( is_woocommerce()) {
	        $classes[] = 'ch-product-columns-'.$ch_shop_loop_column;
	    }
	    return $classes;
	}
}

/**
 * Shop filter wrapper
 */

add_action( 'woocommerce_before_shop_loop', 'humane_woocommerce_shop_filter_wrapper_start', 10 );
add_action( 'woocommerce_before_shop_loop', 'humane_woocommerce_shop_filter_wrapper_end', 40 );

if(!function_exists('humane_woocommerce_shop_filter_wrapper_start')){
	function humane_woocommerce_shop_filter_wrapper_start(){
		echo '<div class="ch-woocommerce-shop-filter-wrapper clearfix">';
	}
}

if(!function_exists('humane_woocommerce_shop_filter_wrapper_end')){
	function humane_woocommerce_shop_filter_wrapper_end(){
		echo '</div>';
	}
}

/**
 * Shop loop item wrapper
 */

add_action( 'woocommerce_before_shop_loop_item_title', 'humane_woocommerce_shop_loop_wrapper_start', 20 );

if(!function_exists('humane_woocommerce_shop_loop_wrapper_start')){
	function humane_woocommerce_shop_loop_wrapper_start(){
		echo '<div class="ch-product-wrapper-inner">';
	}
}

add_action( 'woocommerce_after_shop_loop_item', 'humane_woocommerce_shop_loop_wrapper_end', 20 );

if(!function_exists('humane_woocommerce_shop_loop_wrapper_end')){
	function humane_woocommerce_shop_loop_wrapper_end(){
		echo '</div>';
	}
}

/**
 * Shop loop cart wrapper
 */

add_action( 'woocommerce_after_shop_loop_item', 'humane_woocommerce_shop_cart_wrapper_start', 5 );

if(!function_exists('humane_woocommerce_shop_cart_wrapper_start')){
	function humane_woocommerce_shop_cart_wrapper_start(){
		echo '<div class="ch-cart-wrapper">';
	}
}

add_action( 'woocommerce_after_shop_loop_item', 'humane_woocommerce_shop_cart_wrapper_end', 10 );

if(!function_exists('humane_woocommerce_shop_cart_wrapper_end')){
	function humane_woocommerce_shop_cart_wrapper_end(){
		echo '</div>';
	}
}

/**
 * Move the loop price
 */

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 5 );

/**
 * Move the loop link close
 */

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );


add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 25 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10 );

/**
 * Related products
 */

add_filter( 'woocommerce_output_related_products_args', 'humane_woocommerce_related_products_args' );

if(!function_exists('humane_woocommerce_related_products_args')){
	function humane_woocommerce_related_products_args( $args ) {
		$args['posts_per_page'] = cs_get_option('ch_related_per_page', 3);
		$args['columns'] 		= cs_get_option('ch_shop_loop_column', 3);

		return $args;
	}
}

/**
 * Up Sell 
 */

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'humane_woocommerce_output_upsells', 15 );

if ( ! function_exists( 'humane_woocommerce_output_upsells' ) ) {
	function humane_woocommerce_output_upsells() {
	    woocommerce_upsell_display( cs_get_option('ch_related_per_page', 3), cs_get_option('ch_shop_loop_column', 3) );
	}
}


/**
 * Single product wrapper
 */

add_action( 'woocommerce_before_single_product_summary', 'humane_woocommerce_single_product_wrapper_start', 5 );

if(!function_exists('humane_woocommerce_single_product_wrapper_start')){
	function humane_woocommerce_single_product_wrapper_start(){
		echo '<div class="ch-single-product-wrapper-inner clearfix">';
	}
}


add_action( 'woocommerce_after_single_product_summary', 'humane_woocommerce_single_product_wrapper_end', 5 );

if(!function_exists('humane_woocommerce_single_product_wrapper_end')){
	function humane_woocommerce_single_product_wrapper_end(){
		echo '</div>';
	}
}


/**
 * Number of products in shop page
 */

add_filter( 'loop_shop_per_page', 'humane_woocommerce_shop_number_of_products', 20 );

if(!function_exists('humane_woocommerce_shop_number_of_products')){
	function humane_woocommerce_shop_number_of_products( $number ){
		return cs_get_option('ch_shop_number_of_products');
	}
}

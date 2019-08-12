<?php

/**
 * Give – Donation Plugin Functions
 * 
 * https://wordpress.org/plugins/give/
 */

/**
 * Enqueue styles
 */

if(!function_exists('humane_give_scripts')){
	function humane_give_scripts() {
		wp_enqueue_style( 'ch-give-main', get_template_directory_uri() . '/assets/css/ch-give-main.css', array(), '1.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'humane_give_scripts' );



/**
 * Donation meta add 
 */
add_action( 'give_single_form_summary', 'humane_give_template_single_meta', 6 );

if(!function_exists('humane_give_template_single_meta')){
	function humane_give_template_single_meta(){


 		$count_campaign_donations = get_post_meta( get_the_id(), '_give_form_sales', true );

		if( !empty($count_campaign_donations) ){
			$count_campaign_donations = count($count_campaign_donations);
		}else{
			$count_campaign_donations = '';
		}

		if( $count_campaign_donations == '' ){
			$count_campaign_donation_ending = esc_html__( 'No donation yet', 'humane' );
		}elseif( $count_campaign_donations == 1 ){
			$count_campaign_donation_ending = esc_html__( ' Donation', 'humane' );
		}else{
			$count_campaign_donation_ending = esc_html__( ' Donations', 'humane' );
		}

		?>	
			<div class="humane-campaign-meta">

				<?php if( cs_get_option('show_campaign_donation_count') == true ): ?>
					<div class="campaign-donation-count"><i class="lnr lnr-heart"></i> <?php echo esc_html( $count_campaign_donations . apply_filters( 'humane_campaign_donation_count_ending', $count_campaign_donation_ending, $count_campaign_donations ) ); ?></div>
				<?php endif;?>

			</div>
		<?php
	}
}



/**
 * Donation Form Page Title
 */
add_filter( 'xt_theme_page_title', 'humane_give_donation_page_title' );
if(!function_exists('humane_give_donation_page_title')){
	function humane_give_donation_page_title( $title ){
 		
 		if( is_singular( 'give_forms' ) || is_post_type_archive('give_forms') ){
			$post_type_obj 	= get_post_type_object( get_post_type() );
			if( $post_type_obj ){
				$title 			= apply_filters('post_type_archive_title', $post_type_obj->labels->name );        
				$archive_title 	= apply_filters('post_type_archive_title', $post_type_obj->labels->all_items);
				if( is_singular( 'give_forms' ) ){
					$title = esc_html( $title );
				}
				if( is_post_type_archive('give_forms') ){
					$title = esc_html( $archive_title );
				}
			}
		}
		return $title;
	}
}

/**
 * Single Give Form Sidebar
 */

add_action( 'give_sidebar', 'give_get_forms_sidebar' );

/**
 * Single Give Form Sidebar add class
 */

add_filter( 'give_forms_single_sidebar', 'give_forms_single_sidebar' );

if(!function_exists('give_forms_single_sidebar')){
	function give_forms_single_sidebar ( $sidebar_params ){

		$sidebar_params['before_widget'] = '<div id="%1$s" class="widget %2$s shadow blog_widget">';

		return $sidebar_params;
	}
}



/**
 * give default wrapper start
 */

add_filter( 'give_default_wrapper_start', 'humane_give_default_wrapper_start' );

if(!function_exists('humane_give_default_wrapper_start')){
	function humane_give_default_wrapper_start( $wrapper ){
 		ob_start();
			?>
				<div id="primary" class="content-area <?php echo esc_attr( apply_filters( 'humane_content_area_class', 'col-md-8' ) ); ?>">
				<main id="main" class="site-main">
			<?php
		return ob_get_clean();
	}
}


/**
 * give default wrapper start
 */

add_filter( 'give_default_wrapper_end', 'humane_give_default_wrapper_end' );

if(!function_exists('humane_give_default_wrapper_end')){
	function humane_give_default_wrapper_end( $wrapper ){
 		ob_start();
			?>
				</main><!-- #main -->
				</div><!-- #primary -->
			<?php
		return ob_get_clean();
	}
}



/**
 * Content area class for single form
 */

add_filter( 'humane_content_area_class', 'humane_form_content_area_class' );

if(!function_exists('humane_form_content_area_class')){
	function humane_form_content_area_class ( $class ) {

		global $post;

		if( is_singular( 'give_forms' ) || is_post_type_archive('give_forms') ){

			$donation_form_layout = humane_cs_get_option('donation_form_layout', 'right');

			if( $donation_form_layout == 'right' ){
				$class = 'col-md-8';
			}elseif ( $donation_form_layout == 'left' ) {
				$class = 'col-md-8 col-md-push-4';
			}elseif( $donation_form_layout = 'full_width' ){
				$class = 'col-md-12';
			}

		}

		if( function_exists('charitable_is_page') ){
			if( charitable_is_page('donation_receipt_page') ){
				$class = 'col-md-12';
			}
		}

		if( $post->post_name == 'charitable-ghost-forgot-password-page' ){
			$class = 'page_no_sidebar';
		}

		return $class;
	}
}

/**
 * Form Widget area class
 */

add_filter( 'humane_widget_area_class', 'humane_form_widget_area_class' );

if(!function_exists('humane_form_widget_area_class')){
	function humane_form_widget_area_class ( $class ) {
		
		if( is_singular( 'give_forms' ) || is_post_type_archive('give_forms') ){

			$donation_form_layout = humane_cs_get_option('donation_form_layout', 'right');

			if( $donation_form_layout == 'right' ){
				$class = 'col-md-4';
			}elseif ( $donation_form_layout == 'left' ) {
				$class = 'col-md-4 col-md-pull-8';
			}elseif( $donation_form_layout = 'full_width' ){
				$class = '';
			}

		}
		
		return $class;

	}
}



/**
 * VC Give form select option
 */

if(!function_exists('humane_give_vc_select_donation_form_options')){
	function humane_give_vc_select_donation_form_options(){

		$output = array();
 		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'give_forms', 
		);

		$give_forms = get_posts( $args );

		foreach ( $give_forms as $give_form ) {
			$output[get_the_title( $give_form->ID )] = $give_form->ID;
		}

		return $output;
	}
}

/**
 *  Give Archive Title
 */

add_filter( 'post_type_archive_title', 'give_forms_post_type_archive_title' );

if(!function_exists('give_forms_post_type_archive_title')){
	function give_forms_post_type_archive_title( $title ){

	    if( is_singular( 'give_forms' ) || is_post_type_archive('give_forms') || is_tax('give_forms_category') || is_tax('give_forms_tag') ){

	        $title = humane_cs_get_option('form_archive_title', esc_html__('Donation Forms', 'humane') );

	    }

	    return $title;

	}
}

<?php

/**
 * Functions for customize the charitable plugin
 */

/**
 * Campaigns loop, after the main title.
 *
 * @see     charitable_template_campaign_description()
 * @see     charitable_template_campaign_progress_bar()
 * @see     charitable_template_campaign_loop_donation_stats()
 */



if( !function_exists('humane_charitable_campaign_content_loop_content_customize') ){
	/**
	 * Customize cmapaign loop content
	 */
	
	function humane_charitable_campaign_content_loop_content_customize(){

		// Remove defaults
		remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_description', 4 );
		remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_progress_bar', 6 );
		remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_loop_donation_stats', 8 );

		// Adding custom
		add_action( 'charitable_campaign_content_loop_after', 'humane_charitable_template_campaign_progress_bar', 6 );
		add_action( 'charitable_campaign_content_loop_after', 'humane_charitable_template_campaign_short_description', 8 );
		add_action( 'charitable_campaign_content_loop_after', 'humane_charitable_template_campaign_loop_more_link', 10 );

		// Remove location from the grid
		remove_action( 'charitable_campaign_content_loop_after', 'charitable_geolocation_template_campaign_loop_location', 2 );

		// Responsive inline style
		remove_action( 'charitable_campaign_loop_before', 'charitable_template_responsive_styles', 10, 2 );
		

	}
	add_action( 'template_redirect', 'humane_charitable_campaign_content_loop_content_customize', 10 );
}


/**
 * Campaign Short Description
 */

if( !function_exists('humane_charitable_template_campaign_short_description') ){
	function humane_charitable_template_campaign_short_description(){
		echo wpautop( wp_trim_words( get_the_excerpt(), apply_filters( 'humane_charitable_campaign_short_description_length', 20 ) ) );
	}
}


/**
 * Campaign progress bar circular
 */

if( !function_exists('humane_charitable_template_campaign_progress_bar') ){
	function humane_charitable_template_campaign_progress_bar( $campaign ){
		if( function_exists('charitable_template_campaign_progress_bar') ){
			?>
			<div class="humane-donation-progress-bar clearfix">
	            <div class="cause-progress-bar" data-percent="<?php echo esc_html( $campaign->get_percent_donated_raw() ); ?>"></div>
	            <?php echo humane_charitable_template_campaign_loop_donation_stats( $campaign ); ?>
	        </div>
			<?php
		}
	}
}


/**
 * Campaign progress bar Default
 */

if( !function_exists('humane_charitable_template_campaign_progress_bar_default') ){
	function humane_charitable_template_campaign_progress_bar_default( $campaign ){
		if( function_exists('charitable_template_campaign_progress_bar') ){
			?>
			<div class="humane-donation-progress-bar-default">
		        <div class="humane-donation-progress-bar clearfix">
		            <span class="progress-val"><?php echo esc_html( $campaign->get_percent_donated() ) ?></span>
		            <div class="fund-process">
		            	
		            	<?php
	            		if ( ! $campaign->has_goal() ) :
							return;
						endif;
						?>

						<div class="campaign-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo esc_html( $campaign->get_percent_donated_raw() ); ?>">
							<span class="bar" title="<?php echo esc_html( $campaign->get_percent_donated_raw() ) ?>%"></span>
						</div>
		            	
		            </div>
		        </div>
		        <?php echo humane_charitable_template_campaign_loop_donation_stats( $campaign ); ?>
	        </div>
			<?php
		}
	}
}


/**
 * Campaign stats
 */

if( !function_exists('humane_charitable_template_campaign_loop_donation_stats') ){
	function humane_charitable_template_campaign_loop_donation_stats( $campaign ){

		$currency_helper = charitable_get_currency_helper();

		if ( $campaign->has_goal() ) {
			$ret = sprintf( _x( '<div class="ch-campaign-stats"><span class="ch-donation-raised">Raised: %1$s</span><span class="ch-donation-goal">Goal: %2$s</span></div>', 'Amount Donated of goal', 'humane' ),
				'<span class="amount main-color">' . $currency_helper->get_monetary_amount( $campaign->get_donated_amount() ) . '</span>',
				'<span class="goal-amount main-color">' . $currency_helper->get_monetary_amount( $campaign->get( 'goal' ) ) . '</span>'
			);
		} else {
			$ret = sprintf( _x( '<div class="ch-campaign-stats">%s donated</div>', 'amount donated', 'humane' ),
				'<span class="amount main-color">' . $currency_helper->get_monetary_amount( $campaign->get_donated_amount() ) . '</span>'
			);
		}

		return apply_filters( 'humane_donation_summary', $ret, $campaign );
	}
}

if( !function_exists('humane_charitable_template_campaign_loop_print_donation_stats') ){
	function humane_charitable_template_campaign_loop_print_donation_stats( $campaign ){
		echo humane_charitable_template_campaign_loop_donation_stats( $campaign );
	}
}



/**
 * Campaign progress bar
 */

if( !function_exists('humane_charitable_template_campaign_loop_more_link') ){
	function humane_charitable_template_campaign_loop_more_link( $campaign ){
		if( $campaign->has_ended() ){
			printf( '<a class="btn btn-border btn-lg" href="%s">%s</a>', esc_url(get_the_permalink()), esc_html( humane_cs_get_option( 'donate_button_text_expired', esc_html__( 'Details', 'humane' ) ) ) );
		}
	}
}

/**
 * Show campaign update bellow the campaign summary
 */

if( !function_exists('humane_get_campaign_update') ){
	function humane_get_campaign_update(){

		global $post;
		$updates = get_post_meta( $post->ID, '_campaign_updates', true );
		$content = '';

		if( class_exists('Charitable_Simple_Updates') && $updates ){
			$content .= '<div class="humane-campaign-updates shadow humane-shadow-padding">';
			$content .= sprintf( '<h3 class="humane-campaign-updates-title">%s</h3>', humane_cs_get_option( 'campaign_updates_title', 'Campaign Updates:' ) );
			$content .= do_shortcode( '[campaign_updates]' );
			$content .= '</div>';
		}

		return $content;
	}
}


/**
 * Campaign video width
 */

if( !function_exists('humane_campaign_video_width') ){
	function humane_campaign_video_width( $args ){
		
		$args['width'] = humane_cs_get_option( 'campaign_video_width', 710 );

		return $args;
	}
	add_filter( 'charitable_campaign_video_embed_args', 'humane_campaign_video_width' );
}


/**
 * Campaign post type archive
 */

if(!function_exists('humane_charitable_campaign_post_type_archive_enable')){
	add_filter( 'charitable_campaign_post_type', 'humane_charitable_campaign_post_type_archive_enable' );

	function humane_charitable_campaign_post_type_archive_enable( $args ){
		$args['has_archive'] = true;

		return $args;
	}
}

/**
 * Content area class for single campaign
 */

add_filter( 'humane_content_area_class', 'humane_campaign_content_area_class' );

if(!function_exists('humane_campaign_content_area_class')){
	function humane_campaign_content_area_class ( $class ) {

		global $post;

		if( is_singular( 'campaign' ) || is_post_type_archive('campaign') ){

			$campaign_layout = humane_cs_get_option('campaign_layout', 'right');

			if( $campaign_layout == 'right' ){
				$class = 'col-md-8';
			}elseif ( $campaign_layout == 'left' ) {
				$class = 'col-md-8 col-md-push-4';
			}elseif( $campaign_layout = 'full_width' ){
				$class = 'col-md-12';
			}

		}

		if( function_exists('charitable_is_page') ){
			if( charitable_is_page('donation_receipt_page') ){
				$class = 'col-md-12';
			}

			if ( charitable_is_page( 'forgot_password_page' ) ) {
				$class = 'page_no_sidebar';
			}
		}

		return $class;
	}
}


/**
 * Login & Registratin template post class filter
 */

add_filter( 'post_class', 'humane_charitable_login_template_setup');

if(!function_exists('humane_charitable_login_template_setup')){
	function humane_charitable_login_template_setup( $classes ) {
		global $post;

		if( has_shortcode( $post->post_content, 'charitable_login') || has_shortcode( $post->post_content, 'charitable_registration') ) {
			$classes[] = 'charitable-login-registration-page';
		}

		return $classes; 
	}
}


/**
 * Campaign Widget area class
 */

add_filter( 'humane_widget_area_class', 'humane_campaign_widget_area_class' );
if(!function_exists('humane_campaign_widget_area_class')){
	function humane_campaign_widget_area_class ( $class ) {
		
		if( is_singular( 'campaign' ) || is_post_type_archive('campaign') ){

			$campaign_layout = humane_cs_get_option('campaign_layout', 'right');

			if( $campaign_layout == 'right' ){
				$class = 'col-md-4';
			}elseif ( $campaign_layout == 'left' ) {
				$class = 'col-md-4 col-md-pull-8';
			}elseif( $campaign_layout = 'full_width' ){
				$class = '';
			}

		}
		
		return $class;

	}
}

/**
 * Campaign Page Title
 */


add_filter( 'xt_theme_page_title', 'humane_campaign_page_title' );

if(!function_exists('humane_campaign_page_title')){
	function humane_campaign_page_title( $title ){

		$campaign_page_title = humane_cs_get_option( 'campaign_page_title', esc_html__('Campaigns', 'humane') );

		if( is_singular( 'campaign' ) || is_post_type_archive('campaign') ){
			$title = esc_html( $campaign_page_title );
		}

		return $title;
	}
}
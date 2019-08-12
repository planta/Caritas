<?php

/**
 * XooThemes Core Functions for WordPress themes
 * Author : XooThemes
 */


/**
 *
 * Framework constants
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */

defined( 'CS_OPTION' )     or  define( 'CS_OPTION',     '_cs_options' );
defined( 'CS_CUSTOMIZE' )  or  define( 'CS_CUSTOMIZE',  '_cs_customize_options' );


/**
 *
 * Get customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_get_customize_option' ) ) {
  function cs_get_customize_option( $option_name = '', $default = '' ) {

    $options = apply_filters( 'cs_get_customize_option', get_option( CS_CUSTOMIZE ), $option_name, $default );

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}


/**
 *
 * Get option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_get_option' ) ) {
  function cs_get_option( $option_name = '', $default = '' ) {

    $options = apply_filters( 'cs_get_option', get_option( CS_OPTION ), $option_name, $default );

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}


/**
 * Get CS Customize value with default value
 * 
 * $id : (string) (Required) customize feild id
 * 
 * $default_value : (string) (Optional) customize feild default falue
 */

if( !function_exists('humane_cs_get_customize_option') ){
	function humane_cs_get_customize_option ( $id, $default_value = null ){

		$value = cs_get_customize_option( $id );

		if( $value == null &&  $default_value != null ){
			$value = $default_value;
		}

        return $value;
	}
}


/**
 * Get CS Option value with default value
 * 
 * $id : (string) (Required) option feild id
 * 
 * $default_value : (string) (Optional) option feild default falue
 */

if( !function_exists('humane_cs_get_option') ){
	function humane_cs_get_option ( $id, $default_value = null ){

		$value = cs_get_option( $id );

		if( $value == null &&  $default_value != null ){
			$value = $default_value;
		}

        return $value;
	}
}


/**
 * Get Sidebars for CS framework
 */

if( !function_exists('humane_sidebars_list_on_option') ){
	function humane_sidebars_list_on_option(){
		$result = array();

        foreach( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
            $result[ esc_attr( $sidebar['id'] ) ] = esc_html( $sidebar['name'] );      
        }
        
        unset($result['footer-widgets']);

        return $result;
	}
}


/**
 * PHP implode with key and value ( Owl carousel data attr )
 */

if( !function_exists('humane_owl_carousel_data_attr_implode') ){
	function humane_owl_carousel_data_attr_implode( $array ){
		
		foreach ($array as $key => $value) {
			$output[] = $key . '=' . esc_attr( $value ) ;
		}

        return implode( ' ', $output );
	}
}



/**
 * Get CS Meta value
 * 
 * $meta_section : (string) (Required) metabox section key
 * 
 * $meta_field : (string) (Required) metabox field key
 * 
 * $default_value : (string) (Optional) metabox default falue
 * 
 * $single : (bool) (Optional) Whether to return a single value. Default value: true

 * $id : int (Optional) Loop post id. Default value: null
 */

if( !function_exists('humane_get_post_meta') ){
	function humane_get_post_meta ( $meta_section, $meta_field, $default_value = null, $single = true, $id = null  ){

		if( !is_search() && !is_404() ){
			if( $id ){
				$values = get_post_meta( $id, $meta_section, true );
			}else{
				global $wp_query;
				$id = $wp_query->post->ID;
				$values = get_post_meta( $id, $meta_section, true );
			}

			$value = $default_value;

			if( isset($values) && is_array($values) ){
				if ( array_key_exists( $meta_field, $values ) ) {
		            $value = $values[$meta_field];
		        }
			}
		}else{
			$value = $default_value;
		}	

        return $value;
	}
}

/**
 * XT Get attachment meta
 */

if( !function_exists('humane_wp_get_attachment') ){
	function humane_wp_get_attachment( $attachment_id ) {

	    $attachment = get_post( $attachment_id );
	    return array(
	        'alt' 			=> get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
	        'caption' 		=> $attachment->post_excerpt,
	        'description' 	=> $attachment->post_content,
	        'href' 			=> get_permalink( $attachment->ID ),
	        'src' 			=> $attachment->guid,
	        'title' 		=> $attachment->post_title
	    );
	}	
}


/**
 * is Blog
 */

if(!function_exists('humane_is_blog')){
	function humane_is_blog () {
		global  $post;
		$posttype = get_post_type($post );
		return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
	}
}


/**
 * is Search has result
 */

if( !function_exists('humane_is_search_has_results') ){
	function humane_is_search_has_results() {
		return 0 != $GLOBALS['wp_query']->found_posts;
	}
}


/**
 * Page Layout setup
 */

add_filter( 'humane_container_class', 'humane_page_layout_setup' );

if( !function_exists('humane_page_layout_setup') ){
	function humane_page_layout_setup( $class ){

		if ( is_page() ){
			$page_layout = humane_get_post_meta( '_xt_page_side_options', 'page_layout', 'grid', true );

            if( $page_layout && $page_layout == 'grid' ){
            	$class = 'container';
            }else {
            	$class = 'fullwidth_page';
            }
		}

		return $class;
	}
}


/**
 * Content area class
 */

add_filter( 'humane_content_area_class', 'humane_contet_area_class' );
if(!function_exists('humane_contet_area_class')){
	function humane_contet_area_class ( $class ) {

		if( humane_is_blog() ){

			$blog_layout = cs_get_option( 'blog_layout', 'right' );

			if( $blog_layout == 'right' ){
				$class = 'col-md-8';
			}elseif ( $blog_layout == 'left' ) {
				$class = 'col-md-8 col-md-push-4';
			}elseif( $blog_layout = 'full_width' ){
				$class = 'col-md-12';
			}

		}

		if( is_page() ){

			$page_sidebar_position = humane_get_post_meta( '_xt_page_side_options', 'page_sidebar_position', 'no_sidebar', true );

			if( $page_sidebar_position == 'right' ){
				$class = 'col-md-8';
			}elseif ( $page_sidebar_position == 'left' ) {
				$class = 'col-md-8 col-md-push-4';
			}elseif( $page_sidebar_position = 'no_sidebar' ){
				$class = 'page_no_sidebar';
			}

		}

		return $class;
	}
}


/**
 * Widget area class
 */

add_filter( 'humane_widget_area_class', 'humane_widget_area_class' );
if(!function_exists('humane_widget_area_class')){
	function humane_widget_area_class ( $class ) {
		
		if( humane_is_blog() ){

			$blog_layout = cs_get_option( 'blog_layout', 'right' );

			if( $blog_layout == 'right' ){
				$class = 'col-md-4';
			}elseif ( $blog_layout == 'left' ) {
				$class = 'col-md-4 col-md-pull-8';
			}elseif( $blog_layout = 'full_width' ){
				$class = '';
			}

		}


		if( is_page() ){
			$page_sidebar_position = humane_get_post_meta( '_xt_page_side_options', 'page_sidebar_position', 'no_sidebar', true );

			if( $page_sidebar_position == 'right' ){
				$class = 'col-md-4';
			}elseif ( $page_sidebar_position == 'left' ) {
				$class = 'col-md-4 col-md-pull-8';
			}elseif( $page_sidebar_position = 'no_sidebar' ){
				$class = '';
			}
		}
		
		return $class;

	}
}


/**
 * Checks whether we are currently looking at the given page.
 *
 * Example usage:
 *
 * - charitable_is_page( 'campaign_donation_page' );
 * - charitable_is_page( 'login_page' );
 * - charitable_is_page( 'registration_page' );
 * - charitable_is_page( 'profile_page' );
 * - charitable_is_page( 'donation_receipt_page' );
 * - charitable_is_page( 'donation_cancellation_page' );
 *
 * @since  1.0.0
 *
 * @param  string $page The endpoint id.
 * @param  array  $args Optional array of arguments.
 * @return boolean
 */


function humane_charitable_is_page( $page, $args = array() ){
	if( function_exists('charitable') ){
		return charitable()->endpoints()->is_page( $page, $args );
	}else{
		return false;
	}
}

/**
 * Before Content
 */

add_action( 'humane_before_content', 'humane_before_main_content' );

if( !function_exists('humane_before_main_content') ){
	function humane_before_main_content(){
		$x_class = '';

		if( humane_is_blog() == true || is_post_type_archive() == true || is_singular() == true || is_404() == true || is_search() == true || humane_charitable_is_page( 'donation_receipt_page' ) || is_tax( 'campaign_category' ) || is_tax( 'campaign_tag' ) ){
			$x_class = ' row';
		}

		if( is_singular('page') ){
			$x_class = '';
		}
		?>
			<div class="humane-main-content-inner<?php echo esc_attr( apply_filters( 'humane_main_content_inner', $x_class ) ); ?>">
		<?php
	}
}


/**
 * After Content
 */

add_action( 'humane_after_content', 'humane_after_main_content' );

if( !function_exists('humane_after_main_content') ){
	function humane_after_main_content(){
		?>
			</div>
		<?php
	}
}


/**
 * Page main content inner class
 */

add_filter( 'humane_main_content_inner', 'humane_page_main_content_inner_class' );

if( !function_exists('humane_page_main_content_inner_class') ){
	function humane_page_main_content_inner_class( $class ){
		if ( is_page() ){
			$page_sidebar_position = humane_get_post_meta( '_xt_page_side_options', 'page_sidebar_position', 'no_sidebar', true );

			if( $page_sidebar_position != 'no_sidebar' ){
				$class = ' row';
			}
		}
		return $class;
	}
}


/**
 * Footer Bottom Bar
 */

add_action( 'humane_footer_bottom_bar', 'humane_footer_bottom_bar' );

if(!function_exists('humane_footer_bottom_bar')){
	function humane_footer_bottom_bar(){
		
		$need_footer_bottom_bar = cs_get_option('need_footer_bottom_bar');
		$footer_text = cs_get_option('footer_text');
		$footer_bottom_bar_social_icons = humane_cs_get_option( 'footer_bottom_bar_social_icons', '' );

		if( $need_footer_bottom_bar == 'on' ):
			if( $footer_text || !empty( $footer_bottom_bar_social_icons ) ):
				?>
				<div class="<?php echo esc_attr( apply_filters( 'humane_footer_site_info_container_class', 'container' ) ); ?>">
					<div class="row ch-footer-bottom-bar">
						<div class="copyright">
							<?php if ( $footer_text ):?>
		                   		<div class="col-md-12">
									<div class="coptyright-content">
										<?php echo wpautop( $footer_text ); ?>
									</div>
		                   		</div>
							<?php endif;?>
						</div>
					</div>
				</div>			
				<?php
			endif;
		endif;
	}
}


/**
 * Theme main header
 */

add_action( 'humane_theme_main_header', 'humane_theme_main_header_setup' );

if( !function_exists('humane_theme_main_header_setup') ){
	function humane_theme_main_header_setup(){
		$header_transparent = '';
		if( is_page() ){
			$header_transparent = humane_get_post_meta( '_xt_page_side_options', 'header_transparent', '', true );
		}
		$header_type = humane_cs_get_option( 'header_type', 'default' );
		$xt_menu_hover_border = cs_get_option( 'xt_menu_hover_border' );
		$classes = array();

		if( $header_transparent && is_page() ){
			$classes[] = 'header-transparent';
		}elseif( $header_type == 'transparent' ){
			$classes[] = 'header-transparent';
			$classes[] = 'global-header-transparent';
		}

		if( $xt_menu_hover_border == true ){
			$classes[] = 'xt-menu-hover-border';
		}

		$classes = array_unique($classes);
		$classes = implode (" ", $classes);

		$custom_logo_id 	= get_theme_mod( 'custom_logo' );
    	$custom_logo_url 	= wp_get_attachment_url($custom_logo_id);

		?>
		<header id="masthead" class="site-header-type-default site-header navbar navbar-default nav-scroll xt-navbar<?php echo esc_attr( $classes ? ' '.$classes : '' ); ?>">
			<?php do_action( 'humane_pre_header_bar' ); ?>
			<div class="site-header-wrapper">
				<div class="humane-navigation">
					<div class="<?php echo esc_attr( apply_filters( 'humane_site_header_container_class', 'container' ) ); ?>">
						<div class="site-header-inner clearfix">
							<div class="site-branding navbar-header <?php echo esc_attr( $custom_logo_url ? 'site-branding-custom-logo' : 'site-branding-site-title' ); ?>">
								<?php do_action( 'humane_logo_setup' ); ?>
							</div><!-- .site-branding -->

							<div class="xt-main-menu collapse navbar-collapse" id="js-navbar-menu">
								<?php do_action( 'humane_before_main_menu' ) ?>
								<?php 
									wp_nav_menu( array(
								        'menu'              => 'primary',
								        'theme_location'    => 'primary',
								        'depth'             => 4,
								        'container'       	=>  false,
								        'container_id'      => 'js-navbar-menu',
								        'menu_class'        => 'nav navbar-nav navbar-right',
                    					'menu_id'      	    => 'navbar-nav',
								        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								        'walker'            => new wp_bootstrap_navwalker())
								    );
								?>
								<?php do_action( 'humane_after_main_menu' ) ?>
							</div>
							<!-- Mobile Menu-->
						    <div class="ch-mobile-menu menu-spacing visible-xs">
						        <div class="mobile-menu-area visible-xs visible-sm">
						            <div class="mobile-menu">
							            <?php 
								            if ( has_nav_menu( 'primary' ) ) {
									            wp_nav_menu(array(
									                'menu'            =>  'primary',
									                'theme_location'  =>  'primary',
									                'depth'           =>   4,
									                'container'       =>  'nav',   
									                'container_id'    => 'mobile-menu-active',
									            ));
								            }
							            ?> 
						            </div>  
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="ch-mobile-menu-location"></div>
		</header><!-- #masthead -->
		<?php
	}
}



/**
 * Logo Setup
 */

add_action( 'humane_logo_setup','humane_logo_setup_function' );

if( !function_exists('humane_logo_setup_function') ){
    function humane_logo_setup_function(){
    	$custom_logo_id 	= get_theme_mod( 'custom_logo' );
    	$custom_logo_url 	= wp_get_attachment_url($custom_logo_id);
    	?>
        <div class="logo-wrapper" itemscope itemtype="http://schema.org/Brand">
            <?php 
            	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() && $custom_logo_url ) {
                    the_custom_logo();
                }else{
                    printf( '<h1 class="site-title"><a href="%s" rel="home">%s</a></h1>', esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'name' ) ) );
                }
            ?> 
        </div>
        <?php
    }
}

/**
 * Pre Header
 */

add_action( 'humane_pre_header_bar', 'humane_pre_header_bar_setup' );

if(!function_exists('humane_pre_header_bar_setup')){
	function humane_pre_header_bar_setup(){
		$ch_need_pre_header 				= cs_get_option( 'ch_need_pre_header' );
		$ch_need_pre_header_mobile 			= cs_get_option( 'ch_need_pre_header_mobile' );
		$ch_need_pre_header_btn 			= cs_get_option( 'ch_need_pre_header_btn' );
		$pre_header_btn_text 				= cs_get_option( 'pre_header_btn_text' );
		$pre_header_btn_url 				= cs_get_option( 'pre_header_btn_url' );
		$ch_pre_header_text 				= humane_cs_get_option( 'ch_pre_header_text' );
		$ch_pre_header_phone 				= humane_cs_get_option( 'ch_pre_header_phone' );
		$ch_pre_header_email 				= humane_cs_get_option( 'ch_pre_header_email' );
		$ch_pre_header_email 				= sanitize_email( $ch_pre_header_email );
		$ch_pre_header_right_content 		= humane_cs_get_option( 'ch_pre_header_right_content', 'social' );
		$ch_pre_header_right_menu 			= humane_cs_get_option( 'ch_pre_header_right_menu', '' );
		$ch_pre_header_right_text 			= humane_cs_get_option( 'ch_pre_header_right_text', '' );
		$ch_pre_header_right_social_icons 	= humane_cs_get_option( 'ch_pre_header_right_social_icons', '' );
		$conditional_pages 					= humane_cs_get_option( 'ch_pre_header_right_conditional_pages', '' );
		$ch_pre_header_left_content 		= humane_cs_get_option( 'ch_pre_header_left_content', 'informations' );
		$ch_pre_header_left_menu 			= humane_cs_get_option( 'ch_pre_header_left_menu', '' );
		$user 								= wp_get_current_user();
		if( is_user_logged_in() && array_intersect( array( 'campaign_creator' ) , $user->roles ) ){
			$ch_pre_header_left_menu = humane_cs_get_option( 'ch_pre_header_left_menu_campaign_creator', '' );
		}

		if( $ch_need_pre_header ):
			?>
			<div class="ch-pre-header<?php echo esc_attr( $ch_need_pre_header_mobile == true ? ' ch-pre-header-mobile-disable' : '' ); ?>">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-md-7 col-sm-12 ch-pre-header-item-left">
							<?php 
								switch ( $ch_pre_header_left_content ) {
									case 'informations':
										if( $ch_pre_header_text || $ch_pre_header_phone || $ch_pre_header_email ){
											
											if( $ch_pre_header_text ){
												printf( '<span>%s</span>', esc_html($ch_pre_header_text, 'humane') );
											}
										
											if( $ch_pre_header_phone ){
												printf( '<span class="ch-top-bar-mobile"><i class="lnr lnr-phone-handset"></i><a href="%s">%s</a></span>', 'tel:' . esc_attr( $ch_pre_header_phone ), esc_html( $ch_pre_header_phone, 'humane' ) );
											}
										
											if( $ch_pre_header_email ){
												printf( '<span class="ch-top-bar-email"><i class="lnr lnr-envelope"></i><a href="%s">%s</a></span>', 'mailto:' . antispambot( $ch_pre_header_email, 1 ), antispambot( $ch_pre_header_email ) );
											}
										}
									break;

									case 'menu':

										wp_nav_menu( array(
										    'menu'              => $ch_pre_header_left_menu,
										    'depth'             => 1,
										    'container'         => 'div',
										    'container_class'	=> 'ch-pre-header-menu',
										    'fallback_cb'		=> false
										));

									break;
								}	
							?>			
							
						</div>
						<div class="col-lg-4 col-md-5 col-sm-12 ch-pre-header-item-right text-right">
							<?php 
								switch ($ch_pre_header_right_content) {
									case 'menu':
											wp_nav_menu( array(
											    'menu'              => $ch_pre_header_right_menu,
											    'depth'             => 1,
											    'container'         => 'div',
										    	'container_class'	=> 'ch-pre-header-menu',
											    'fallback_cb'		=> false
											));
										break;
									
									case 'text':
										printf( '<span class="ch-pre-header-right-text">%s</span>', esc_html( $ch_pre_header_right_text, 'humane') );
										break;

									case 'social':
										?>
										<ul class="ch-pre-header-right-social">
											<?php 
												if( !empty($ch_pre_header_right_social_icons) ){
													foreach ($ch_pre_header_right_social_icons as $icon) {
														printf( '<li><a href="%s"><i class="%s"></i></a></li>', esc_url( $icon['url'] ), esc_attr( $icon['icon'] ) );
													}
												}
											?>
										</ul>
										<?php
										break;

									case 'conditional_pages':
										?>
										<ul class="ch-pre-header-conditional-pages">
											<?php 
												if( !empty($conditional_pages) ){
													foreach ( $conditional_pages as $conditional_page ) {
														if( $conditional_page['ch_select_condition'] == 'login' && is_user_logged_in() ){
															printf( '<li><a class="btn btn-fill" href="%s">%s</a></li>', esc_url( get_the_permalink( $conditional_page['ch_select_conditional_page'] ) ), esc_html( get_the_title($conditional_page['ch_select_conditional_page']) ) );
														}elseif( $conditional_page['ch_select_condition'] == 'not_login' && !is_user_logged_in() ){
															printf( '<li><a class="btn btn-fill" href="%s">%s</a></li>', esc_url( get_the_permalink( $conditional_page['ch_select_conditional_page'] ) ), esc_html( get_the_title($conditional_page['ch_select_conditional_page']) ) );
														}elseif( $conditional_page['ch_select_condition'] == 'always' ){
															printf( '<li><a class="btn btn-fill" href="%s">%s</a></li>', esc_url( get_the_permalink( $conditional_page['ch_select_conditional_page'] ) ), esc_html( get_the_title($conditional_page['ch_select_conditional_page']) ) );
														}
													}
												}
											?>
										</ul>
										<?php
										break;
								}
							?>

							<?php if( $ch_need_pre_header_btn == 'true' ): ?>
								<div class="ch-pre-header-btn">
									<a class="kc_button xt-theme-primary-btn btn btn-common" href="<?php echo esc_url( $pre_header_btn_url ) ?>"><?php echo esc_html( $pre_header_btn_text ) ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
}


/**
 * Page Title
 */

add_action( 'humane_after_header', 'humane_page_title' );

if( !function_exists('humane_page_title') ){
	function humane_page_title(){

		global $post;

		$title = get_the_title();

		if( is_search() ){
			if( humane_is_search_has_results() ){
				$title = esc_html__( 'Search result', 'humane' );
			}else{
				$title = esc_html__( 'Nothing Found', 'humane' );
			}
		}elseif( is_archive() ){
			$title = get_the_archive_title();
		}

		if( is_page() ){
			$need_page_title = humane_get_post_meta( '_xt_page_side_options', 'need_page_title', true, true );
		}else{
			$need_page_title = false;
		}

		if( is_home() ){
			$title = apply_filters( 'xt_blog_page_title', esc_html__( 'Blog','humane' ) );
		}

		if( is_404() ){
			$title = apply_filters( 'xt_not_found_page_title', esc_html__( '404','humane' ) );
		}

		if( humane_is_blog() ){
			$title = apply_filters( 'xt_blog_page_title', esc_html__( 'Blog','humane' ) );
		}

		$title = apply_filters( 'xt_theme_page_title', $title );


		$xt_show_breadcrumb = cs_get_option( 'xt_show_breadcrumb' );
		

		if( is_page() && $need_page_title != false || is_singular( 'post' ) || is_singular( 'product' ) || is_singular( 'xt_project' ) || is_singular( 'campaign' ) || is_singular( 'give_forms' ) || is_singular( 'tribe_events' ) || is_archive() || is_home() || is_search() || is_404() || humane_charitable_is_page('donation_receipt_page') || $post->post_name == 'charitable-ghost-forgot-password-page' ){
			?>
				<div class="xt-page-title-area">
					<div class="xt-page-title-overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-sm-12">		
								<div class="xt-page-title">
									<h1 class="entry-title"><?php echo esc_html( $title ); ?></h1>
								</div>
							</div>
							<?php if( $xt_show_breadcrumb == true ): ?>
								<div class="col-md-7 col-sm-12 xt-breadcrumb-wrapper">
									<?php do_action( 'humane_breadcrumb' );?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php
		}
	}
}
			

/**
 * Setup breadcrumb
 */

add_action( 'humane_breadcrumb', 'humane_breadcrumb_setup', 10 );

if( !function_exists('humane_breadcrumb_setup') ){
	function humane_breadcrumb_setup( $args = array() ){

		if( function_exists('breadcrumb_trail') && !is_front_page() ){
			$args = wp_parse_args( $args, apply_filters( 'humane_breadcrumb_defaults', array() ) );
			breadcrumb_trail( $args );
		}

	}
}

/**
 * Breadcrumb $args
 */


add_filter( 'humane_breadcrumb_defaults', 'humane_breadcrumb_args' );

if( !function_exists('humane_breadcrumb_args') ){
	function humane_breadcrumb_args( $args = array() ){

		$args = array(
		        'container'       => 'nav',
		        'before'          => '<div class="xt-breadcrumb">',
		        'after'           => '</div>',
		        'show_on_front'   => true,
		        'network'         => false,
		        'show_title'      => true,
		        'show_browse'     => false,
		        'echo'            => true,

		        'post_taxonomy' => array(
		            'post'  			=> 'post_tag',
		            'post'  			=> 'category',
		            'tribe_events'  	=> 'tribe_events_cat',
		        ),

		        'labels' => array(
		            'browse'              => '',
		            'aria_label'          => esc_attr_x( 'Breadcrumbs', 'breadcrumbs aria label', 'humane' ),
		            'home'                => esc_html__( 'Home',                                  'humane' ),
		            'error_404'           => esc_html__( '404 Not Found',                         'humane' ),
		            'archives'            => esc_html__( 'Archives',                              'humane' ),
		            'search'              => esc_html__( 'Search results for &#8220;%s&#8221;',   'humane' ),
		            'paged'               => esc_html__( 'Page %s',                               'humane' ),
		            'archive_minute'      => esc_html__( 'Minute %s',                             'humane' ),
		            'archive_week'        => esc_html__( 'Week %s',                               'humane' ),
		            'archive_minute_hour' => '%s',
		            'archive_hour'        => '%s',
		            'archive_day'         => '%s',
		            'archive_month'       => '%s',
		            'archive_year'        => '%s',
		        )
		);

		return $args;
	}
}

/**
 * WordPress Bootstrap pagination
 */

if( !function_exists('humane_wp_numeric_pagination') ):
    function humane_wp_numeric_pagination( $args = array() ) {
        
        $defaults = array(
            'range'           => 4,
            'custom_query'    => FALSE,
            'previous_string' => '<i class="fa fa-angle-double-left"></i>',
            'next_string'     => '<i class="fa fa-angle-double-right"></i>',
            'before_output'   => '<nav class="xt_theme_paignation"><ul class="pager">',
            'after_output'    => '</ul></nav>'
        );
        
        $args = wp_parse_args( 
            $args, 
            apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
        );
        
        $args['range'] = (int) $args['range'] - 1;
        if ( !$args['custom_query'] )
            $args['custom_query'] = $GLOBALS['wp_query'];
        $count = (int) $args['custom_query']->max_num_pages;
        $page  = intval( get_query_var( 'paged' ) );
        $ceil  = ceil( $args['range'] / 2 );
        
        if ( $count <= 1 )
            return FALSE;
        
        if ( !$page )
            $page = 1;
        
        if ( $count > $args['range'] ) {
            if ( $page <= $args['range'] ) {
                $min = 1;
                $max = $args['range'] + 1;
            } elseif ( $page >= ($count - $ceil) ) {
                $min = $count - $args['range'];
                $max = $count;
            } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
                $min = $page - $ceil;
                $max = $page + $ceil;
            }
        } else {
            $min = 1;
            $max = $count;
        }
        
        $echo = '';
        $previous = intval($page) - 1;
        $previous = esc_attr( get_pagenum_link($previous) );
        
        if ( $previous && (1 != $page) )
        	$echo .= sprintf ( '<li><a href="%s" class="previous" title="%s">%s</a></li>', esc_url( $previous ), esc_html__( 'previous', 'humane' ), $args['previous_string'] );
        
        if ( !empty($min) && !empty($max) ) {
            for( $i = $min; $i <= $max; $i++ ) {
                if ($page == $i) {
                    $echo .= sprintf ( '<li class="active"><span class="active">%s</span></li>', esc_html( str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) ) );
                } else {
                    $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
                }
            }
        }
        
        $next = intval($page) + 1;
        $next = esc_attr( get_pagenum_link($next) );
        if ($next && ($count != $page) )
        	$echo .= sprintf ( '<li><a href="%s" class="next" title="%s">%s</a></li>', esc_url( $next ), esc_html__( 'next', 'humane' ), $args['next_string'] );
        
        if ( isset($echo) )
            echo wp_kses_post( $args['before_output'] . $echo . $args['after_output'] );
    }
endif;

/**
 * Pagination RTL support
 */

add_filter( 'wp_bootstrap_pagination_defaults', 'humane_pagination_rtl_support' );

if(!function_exists('humane_pagination_rtl_support')){
	function humane_pagination_rtl_support($args){
		if( is_rtl() ){
			$args['next_string'] 		= '<i class="fa fa-angle-double-left"></i>';
			$args['previous_string'] 	= '<i class="fa fa-angle-double-right"></i>';
		}
		return $args;
	}
}


/**
 *  Author bio
 */

if ( ! function_exists( 'humane_get_author_bio' ) ) :
function humane_get_author_bio() {
	$description = get_the_author_meta( 'description' );

	if( $description != '' ){
	    ?>
	    <div class="xt-author-bio shadow">
	    	<div class="row">
		        <div class="humane-author-avatar col-sm-3">
		            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 320 ); ?>
		        </div>
		        <div class="humane-author-comment col-sm-9">
		            <h3 class="humane-author-name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h3>
		            <?php echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ); ?>
		            <?php printf( '<a class="btn btn-border btn-primary xt-btn-primary" href="%s">%s%s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), apply_filters( 'humane_author_all_post_btn_text', esc_html__( 'All Posts by ', 'humane' ) ), esc_html( get_the_author_meta( 'display_name' ) ) ); ?>
		        </div>
	        </div>
	    </div>
	    <?php
	}
}
endif;


/**
 * Comment list walker
 */

/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap Comment Walker
 * @version     1.0.0
 * @author      Edi Amin <to.ediamin@gmail.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/ediamin/wp-bootstrap-comment-walker
 */

if( !class_exists('humane_Bootstrap_Comment_Walker') ){
	class humane_Bootstrap_Comment_Walker extends Walker_Comment {
		/**
		 * Output a comment in the HTML5 format.
		 *
		 * @access protected
		 * @since 1.0.0
		 *
		 * @see wp_list_comments()
		 *
		 * @param object $comment Comment to display.
		 * @param int    $depth   Depth of comment.
		 * @param array  $args    An array of arguments.
		 */
		protected function html5_comment( $comment, $depth, $args ) {
			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
			?>		
			<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '' ); ?>>
				<div class="xt-media comment-body">
					<?php if ( 0 != $args['avatar_size'] ): ?>
						<div class="humane-media-left">
							<a href="<?php echo esc_url( get_comment_author_url() ); ?>" class="xt-media-object">
								<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
							</a>
						</div>
					<?php endif; ?>

					<div class="humane-media-body">
						<h4 class="humane-media-heading">
							<?php echo get_comment_author_link(); ?>
						</h4><!-- .xt-media-heading -->
						<div class="comment-metadata">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
								<time datetime="<?php esc_attr( comment_time( 'c' ) ); ?>">
									<?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'humane' ), get_comment_date(), get_comment_time() ); ?>
								</time>
							</a>
							<?php edit_comment_link( esc_html__( 'Edit', 'humane' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .comment-metadata -->

						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation label label-info"><?php esc_html_e( 'Your comment is awaiting moderation.', 'humane' ); ?></p>
						<?php endif; ?>				

						<div class="comment-content">
							<?php comment_text(); ?>
						</div><!-- .comment-content -->
						
						<?php
							comment_reply_link( array_merge( $args, array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<div class="reply-link"><i class="fa fa-reply" aria-hidden="true"></i>',
								'after'     => '</div>'
							) ) );	
						?>
					</div>	
				</div>	
			<?php
		}	
	}
}



/**
 * Page Body Class
 */

add_filter('body_class', 'humane_get_post_meta_page_body_classes');

if(!function_exists('humane_get_post_meta_page_body_classes')){
	function humane_get_post_meta_page_body_classes($classes) {

		if( is_page() ){
			$page_layout = humane_get_post_meta( '_xt_page_side_options', 'page_layout', 'grid', true );
			$need_page_title = humane_get_post_meta( '_xt_page_side_options', 'need_page_title', true, true );
			$page_sidebar_enable = humane_get_post_meta( '_xt_page_side_options', 'page_sidebar_enable', false, true );
			$page_sidebar_position = humane_get_post_meta( '_xt_page_side_options', 'page_sidebar_position', 'no_sidebar', true );

			if( $page_layout && $page_layout == 'grid' ){
				$classes[] = 'xt-page-layout-grid';
			}
			elseif( $page_layout && $page_layout == 'full_screen' ) {
				$classes[] = 'xt-page-layout-full-width';
			}

			if( $need_page_title && $need_page_title = true ){
				$classes[] = 'xt-has-page-title';
			}else{
				$classes[] = 'xt-no-page-title';
			}

			if( $page_sidebar_enable && $page_sidebar_enable = true ){
				$classes[] = 'xt-has-page-sidebar';
			}else{
				$classes[] = 'xt-no-page-sidebar';
			}

			if( $page_sidebar_position && $page_sidebar_position == 'left' ){
				$classes[] = 'xt-page-left-sidebar';
			}
			elseif( $page_sidebar_position && $page_sidebar_position == 'right' ) {
				$classes[] = 'xt-page-right-sidebar';
			}
		}

		if( humane_charitable_is_page( 'donation_receipt_page' ) ){
			$classes[] = 'xt-page-layout-grid';
		}
		
		if( humane_charitable_is_page('campaign_donation_page') ){
			$classes[] = 'xt-campaign-layout-grid';
		}

		$xt_need_preloader 		= cs_get_option( 'xt_need_preloader' );

		if( $xt_need_preloader == true ){
			$classes[] = 'xt-site-loading';
		}

		if( function_exists('has_blocks') ){
	    	if( is_single() || is_page() ){
		    	if ( has_blocks( get_the_id() ) ) {
		    		$classes[] = 'xt-has-gutenberg-blocks';
			    }
		    }
	    }

		return $classes;
	}
}



/**
 * Required Plugins
 */

add_action( 'tgmpa_register', 'humane_register_required_plugins' );

if(!function_exists('humane_register_required_plugins')){
	function humane_register_required_plugins() {
		$plugins = array(
			array(
				'name'      => esc_html__( 'KingComposer &#8208; Drag and Drop Page Builder', 'humane' ),
				'slug'      => 'kingcomposer',
				'required'  => true,
			),
			array(
				'name'               => esc_html__( 'Humane CPT and Shortcode', 'humane' ),
				'slug'               => 'xt-humane-cpt-shortcodes',
				'source'             => get_template_directory() . '/lib/plugins/xt-humane-cpt-shortcodes.zip',
				'required'           => true,
				'version'            => '1.0.8',
			),
			array(
				'name'      => esc_html__( 'Charitable Donation Plugin', 'humane' ),
				'slug'      => 'charitable',
				'required'  => false,
			),
			array(
				'name'      => esc_html__( 'WooCommerce', 'humane' ),
				'slug'      => 'woocommerce',
				'required'  => false,
			),
			array(
				'name'      => esc_html__( 'The Events Calendar', 'humane' ),
				'slug'      => 'the-events-calendar',
				'required'  => false,
			),
			array(
				'name'      => esc_html__( 'Contact Form 7', 'humane' ),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),
			array(
				'name'      => esc_html__( 'One Click Demo Import', 'humane' ),
				'slug'      => 'one-click-demo-import',
				'required'  => false,
			),
		);

		$config = array(
			'id'           => 'humane',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		);

		tgmpa( $plugins, $config );
	}
}


/**
 * Demo Installer
 * 
 * Using the plugin : https://wordpress.org/plugins/one-click-demo-import/
 *
 * Documentation : http://proteusthemes.github.io/one-click-demo-import/
 */

if(!function_exists('humane_import_theme_demo_files')){
	function humane_import_theme_demo_files() {
	  return array(
	    array(
	      'import_file_name'             => esc_html__( 'Demo Import', 'humane' ),
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/demo-data/demo-content.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/demo-data/widgets.json',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/demo-data/customizer.dat',
	      'import_notice'                => esc_html__( 'After importing the demo data, please follow this theme documentation step by step.', 'humane' ),
	    )
	  );
	}
}

add_filter( 'pt-ocdi/import_files', 'humane_import_theme_demo_files' );


/**
 *  page footer wrapper class
 *  action located at content-page.php
 */

add_action( 'humane_page_footer_wrapper_class', 'humane_page_footer_wrapper_class_setup' );

if(!function_exists('humane_page_footer_wrapper_class_setup')){
 	function humane_page_footer_wrapper_class_setup(){

 		$class = '';

		if ( is_page() ){
			$page_layout = humane_get_post_meta( '_xt_page_side_options', 'page_layout', 'grid', true );

			if( $page_layout && $page_layout == 'grid' ){
				$class = '';
			}else {
				$class = ' container';
			}
		}

		echo esc_attr( $class );
	}
}



/**
 * Excerpt more
 */

if(!function_exists('humane_excerpt_more')){
	function humane_excerpt_more( $more ) {
	    return '&#8230;';
	}
}
add_filter( 'excerpt_more', 'humane_excerpt_more' );
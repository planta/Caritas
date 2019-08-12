<?php

/**
 * Humane
 * Author : XooThemes
 */


if ( ! function_exists( 'humane_main_fonts_url' ) ) {
	function humane_main_fonts_url() {
	    $fonts_url = '';
	    $fonts     = array();
	    $subsets   = '';
	    if ( 'off' !== esc_html_x( 'on', 'Poppins font: on or off', 'humane' ) ) {
	        $fonts[] = 'Poppins:400,500,600,700';
	    }
	    if ( $fonts ) {
	        $fonts_url = add_query_arg( array(
	            'family' => urlencode( implode( '|', $fonts ) ),
	            'subset' => urlencode( $subsets ),
	        ), 'https://fonts.googleapis.com/css' );
	    }
	    return $fonts_url;
	}
}
/**
 * Enqueue Google Fonts styles
 */
add_action( 'wp_enqueue_scripts', 'humane_google_fonts_adding' );

if( !function_exists('humane_google_fonts_adding') ){
	function humane_google_fonts_adding() {
	    wp_enqueue_style( 'charity-main-fonts', humane_main_fonts_url(), array(), null );
	}
}



/**
 * Adding Custom Styles
 */


if(!function_exists('humane_add_inline_styles')){
	function humane_add_inline_styles() {
	
		$body_color                     = humane_cs_get_option( 'xt_body_color', '#767676' );
		$body_bg                        = humane_cs_get_option( 'xt_body_bg', '#f3f3f3' );
		$body_font_size                 = humane_cs_get_option( 'body_font_size', 16 );
		$body_line_height               = humane_cs_get_option( 'body_line_height', 26 );
		
		$xt_header_bg                   = humane_cs_get_option( 'xt_header_bg', '#ffffff' );
		$xt_default_menu_color          = humane_cs_get_option( 'xt_default_menu_color', '#363636' );
		$xt_default_menu_hover_color    = humane_cs_get_option( 'xt_default_menu_hover_color', '#fc2c62' );
		$xt_dropdown_menu_color         = humane_cs_get_option( 'xt_dropdown_menu_color', '#363636' );
		$xt_dropdown_menu_color_hover   = humane_cs_get_option( 'xt_dropdown_menu_color_hover', '#fc2c62' );
		$xt_dropdown_menu_bg            = humane_cs_get_option( 'xt_dropdown_menu_bg', '#ffffff' );
		$xt_dropdown_menu_border_color  = humane_cs_get_option( 'xt_dropdown_menu_border_color', '#eeeeee' );
		$xt_dropdown_menu_width         = humane_cs_get_customize_option( 'xt_dropdown_menu_width', 250 );
		
		$xt_page_header_bg              = humane_cs_get_option( 'xt_page_header_bg' );
		$xt_page_feature_img_header_bg  = cs_get_option( 'xt_page_feature_img_header_bg' );

	    if( $xt_page_header_bg ){
	    	$xt_page_header_bg 		    = wp_get_attachment_image_src( $xt_page_header_bg, 'full' );
	    	$xt_page_header_bg 		    = $xt_page_header_bg[0];
	    }

	    if( is_page() && has_post_thumbnail() && $xt_page_feature_img_header_bg ){
			$xt_page_header_bg 		    = get_the_post_thumbnail_url( get_the_id(), 'full' );
	    }
		
		$xt_page_header_bg_color        = humane_cs_get_option( 'xt_page_header_bg_color', 'rgba(0, 0, 0, 0.6)' );
		$xt_page_header_p_top           = humane_cs_get_option( 'xt_page_header_p_top', 26 );
		$xt_page_header_p_bottom        = humane_cs_get_option( 'xt_page_header_p_bottom', 26 );
		
		$footer_top_space               = humane_cs_get_option( 'footer_top_space', 60 );
		$footer_bottom_space            = humane_cs_get_option( 'footer_bottom_space', 45 );
		$footer_background_color        = humane_cs_get_option( 'footer_background_color', '#041025' );
		$footer_content_color           = humane_cs_get_option( 'footer_content_color', '#ffffff' );
		$footer_link_color              = humane_cs_get_option( 'footer_link_color', '#ffffff' );
		$footer_link_hover_color        = humane_cs_get_option( 'footer_link_hover_color', '#ffffff' );
		$bottom_bar_top_bottom_space    = humane_cs_get_option( 'bottom_bar_top_bottom_space', 35 );
		$bottom_bar_border_color        = humane_cs_get_option( 'bottom_bar_border_color', '#1e3051' );

	    /* Customizer Settings */
	    $xt_pre_header_bg 				= humane_cs_get_customize_option( 'xt_pre_header_bg', '#2a2f36' );
	    $pre_header_top_space 			= humane_cs_get_customize_option( 'pre_header_top_space', 12 );
	    $pre_header_bottom_space 		= humane_cs_get_customize_option( 'pre_header_bottom_space', 12 );
	    $header_top_space 				= humane_cs_get_customize_option( 'header_top_space', 30 );
	    $header_bottom_space 			= humane_cs_get_customize_option( 'header_bottom_space', 30 );
	    $logo_top_space 				= humane_cs_get_customize_option( 'logo_top_space', 17 );
	    $logo_bottom_space 				= humane_cs_get_customize_option( 'logo_bottom_space', 0 );
	    $logo_max_height 				= humane_cs_get_customize_option( 'logo_max_height', 45 );
	    $menu_left_space 				= humane_cs_get_customize_option( 'menu_left_space', 15 );
	    $menu_right_space 			 	= humane_cs_get_customize_option( 'menu_right_space', 15 );

	    $custom_css = '';

		$need_color_customizer  		= cs_get_option( 'need_color_customizer' );
		$xt_primary_color       		= cs_get_option( 'xt_primary_color' );
		$xt_primary_color_dark  		= cs_get_option( 'xt_primary_color_dark' );
		$xt_primary_color_light 		= cs_get_option( 'xt_primary_color_light' );

		if( $need_color_customizer == true ){

			/* default */
			$custom_css .= ".main-color,.ch-causes .cause-inner-content .give-goal-progress .raised .income,.ch-causes .cause-inner-content .give-goal-progress .raised .goal-text,.humane-donation-forms .give-goal-progress .raised .income,.humane-donation-forms .give-goal-progress .raised .goal-text,.xt_vc_row-color-white .humane-donation-cause-item .cause-inner .main-color,.ch-footer .footer-content ul li a:hover,.ch-footer .ch-widget-list ul li a:hover,footer .widget_nav_menu ul li a:hover:before,.edit-link a.post-edit-link:hover,.edit-link a.post-edit-link:focus,.edit-link a.post-edit-link:active,.blog_widget ul li a:hover,.btn.btn-fill,.ch-sidebar a:hover,.copyright .coptyright-content a:hover,.ch-client-testimonial .item blockquote h3,.ch-client .contact-form .section-title h2 span,.ch-client-testimonial .item blockquote p:before,.ch-client-testimonial .item blockquote p:after,.ch-client .contact-form .section-title h2 span,.navbar-nav>li>a:hover:before,.navbar-nav>li>a:focus:before,.navbar-nav>li>a:hover,.navbar-nav>li>a:focus,.navbar-nav li.active a:before,.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>.active>a,.navbar-nav li.active a,.navbar-nav li.current-menu-item a,.navbar-nav>li>.dropdown-menu li.current-menu-item a,.navbar-nav li.current_page_item a,.navbar-default .navbar-nav>.active>a:hover,.navbar-nav li.active a:hover,.navbar-nav li.current-menu-item a:hover,.navbar-default .navbar-nav li.current-menu-parent>a,.header-slider .slide-tablecell h1,.features-inner .each-details i:before,.section-title h2 span,.navbar-nav>li>.dropdown-menu li a:hover,a:focus,a:hover,.humane-blog-tags-n-share a:hover,.blog-content blockquote,.comment a,.comment-edit-link,.comment a:hover,.comment-edit-link:hover,.campaign-donation-stats .amount,.campaign-donation-stats .goal-amount,#charitable-donation-form .donation-amounts .donation-amount.suggested-donation-amount.selected>label:before,.widget_charitable_donate_widget #charitable-donation-amount-form .donation-amounts .donation-amount.suggested-donation-amount.selected label:before,body .charitable-donation-form .recurring-donation .recurring-donation-option.selected>label,body .campaign-raised .amount,body .campaign-figures .amount,body .donors-count,body .time-left,body .charitable-form-field a:not(.button),body .charitable-form-fields .charitable-fieldset a:not(.button),.xt_vc_row-background-primary .btn.btn-fill:hover,.ch-causes .cause-inner-content .btn,.ch-causes .cause-inner-content h3 a:hover,.ch-causes .cause-inner-content h3:hover,.btn-border.donate-button,.blog-content h2.entry-title a:hover,.btn-style-two:hover,.btn-style-five,.nav-previous a,.nav-next a,.charity-testimonial .slide-item .upper-content .fa,.default-portfolio-item .overlay-box .more-link:hover,.default-cause-box h3 a:hover,.default-cause-box .donate-box .donate-info .goal,.cause-box-two h3 a:hover,.cause-box-two .donate-info .goal,.cause-box-two .donate-info .goal-amount,.default-event-box h3 a:hover,.event-style-two h3 a:hover,.event-style-three h3 a:hover,.default-event-post .inner-box .post-header h3 a:hover,.default-event-post .post-meta li .fa,.style-one .time-countdown .counter-column .count,.charity-contact-info .icon,.news-style-one h3 a:hover,.news-style-one .post-meta ul li a:hover,.news-style-one .post-meta ul li a:hover .fa,.news-style-two .lower-content h3 a:hover,.news-style-two .post-meta ul li a:hover,.news-style-two .post-meta .share-btn a:hover,.btn-style-three:hover,.service-box .inner-box .icon-box,.contact-us-form input[type=submit]:hover,.kc_button.xt-theme-primary-btn:hover,.default-event-box .post-meta .tribe-address,.btn-border,.woocommerce ul.products li.product .ch-cart-wrapper .button,.sec-title-highlight,.kc_row .sec-title.section-title-color-white .sec-title-highlight,.product-categories a:hover,.single-tribe_events .tribe-events-schedule .tribe-events-cost,.charity-volunteer .charity-volunteer-content-box a.action-btn,.xt_kc_row_white_color .btn-border:hover,.xt_kc_row_white_color .btn-border:focus, .has-theme-primary-color-color{color:{$xt_primary_color}}";

			$custom_css .= "a.xt-btn-primary:hover,.give-btn,.give_submit,#give-register-form .button,.ch-blog.sticky .blog-content:before,.woocommerce-pagination li.active>span,.btn-border:hover,.btn-base,.ch-event .owl-prev,.humane-donation-causes-slider .owl-prev,.main-color-bg,.navbar-nav>li>a:hover:before,.navbar-nav>li>a:focus:before,.navbar-nav li.active a:before,.blog-content .entry-footer a.btn:focus,.blog-content .entry-footer a.btn:active,.ch-pagination .pagination>.active>a,.ch-pagination .pagination>.active>a:focus,.ch-pagination .pagination>.active>a:hover,.ch-pagination .pagination>.active>span,.ch-pagination .pagination>.active>span:focus,.ch-pagination .pagination>.active>span:hover,.mean-container .mean-nav ul li a.mean-expand,.mean-container .mean-nav ul li a.mean-expand:hover,.ch-blog .blog-banner .date,.features-inner .features-content,.ch-event .owl-next,.humane-donation-causes-slider .owl-next,.comment-respond .form-submit input[type=submit],.search-form .search-submit,.post-password-form input[type=submit],.button.button-primary,.button.button-secondary,.vc_row.xt_vc_row-background-primary,.post-password-form input[type=submit],.ch-causes .campaign-progress-bar .bar,.ch-event .event-banner .humane-event-price,body .campaign-progress-bar .bar,body .donate-button,body #charitable-donation-amount-form .donation-amount.selected,#tribe-events .tribe-events-button,#tribe-events .tribe-events-button:hover,#tribe_events_filters_wrapper input[type=submit],.tribe-events-button,.tribe-events-button.tribe-active:hover,.tribe-events-button.tribe-inactive,.tribe-events-button:hover,.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,#tribe-events-content .tribe-events-tooltip h4,.tribe-events-list .tribe-events-event-cost span,.xt-page-layout-full-width .charitable-user-campaigns .charitable-campaign .humane-campaign-status,.btn.btn-fill:hover,.ch-campaign-ajax-search-result-area li a:hover,.woocommerce span.onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce div.product div.images .woocommerce-product-gallery__trigger,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce-MyAccount-navigation ul li a,.vc_tta-container .vc_tta-accordion.xt-vc-tta-accordion-theme-default .vc_tta-panel.vc_active .vc_tta-panel-heading,.vc_tta-container .vc_tta-accordion.xt-vc-tta-accordion-theme-default.vc_tta.vc_general .vc_tta-panel .vc_tta-panel-heading:hover,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current,.xt_vc_row-color-white .ch-campaign-search .btn.btn-fill,.xt-menu-hover-border .navbar-nav>li>a:after,.header-slider .owl-theme .owl-dots .owl-dot.active,.card-profile .footer a:hover,.btn-style-five:hover,.nav-previous a:hover,.nav-next a:hover,.btn-style-one,.charitable-submit-field .button,.widget.widget_tag_cloud a:hover,.widget.widget_product_tag_cloud a:hover,.xt-media.comment-body .reply-link a:hover,.default-cause-box .donate-box .donate-bar .bar-inner .bar,.cause-box-two .links li a.donate-btn,.service-box .inner-box:hover,.default-event-post .inner-box .date,.news-style-two .lower-content .post-cat a,.ch-campaign-search button[type=submit],.kc_button.xt-theme-primary-btn,article.sticky .inner-box:before,.theme-feature:before,.woocommerce ul.products li.product .ch-cart-wrapper .button:hover,.pager li>span,.pager li>a:hover,.humane-event-slider.owl-carousel .owl-controls .owl-dot,.humane-donation-causes.owl-carousel .owl-controls .owl-dot,.humane-event-slider.owl-carousel .owl-controls .owl-dot.active,.humane-donation-causes.owl-carousel .owl-controls .owl-dot.active,.sec-title.text-center:before,.charity-volunteer.call-to-action,.xt_theme_paignation.xt-theme-page-links .pager .active a, .xt-back-to-top, .xt-back-to-top:hover, .xt-back-to-top:focus, .woocommerce.single-product .ch-woocommerce-page-content .woocommerce-message a.button, .has-theme-primary-color-background-color{background-color:{$xt_primary_color}}";

			$custom_css .= ".blog-content blockquote,.give-btn:hover,.give-btn:focus,.give_submit:hover,.give_submit:focus,#give-register-form .button:hover,#give-register-form .button:focus,.comment-form input[type=text]:focus,.comment-form input[type=url]:focus,.comment-form input[type=email]:focus,.comment-form input[type=email]:focus,.comment-form textarea:focus,.post-password-form input[type=password]:focus,a.xt-btn-primary,.nav-previous a,.nav-next a,a.xt-btn-primary:hover,.blog_widget select:focus,.btn-border,.ch-pagination .pagination li a,.ch-blog .blog-content .btn,.navbar-nav>li>a.sign-up,input[type=submit].btn-border,input[type=submit].btn-border:hover,input[type=submit].btn-border:focus,.form-control:focus,input[type=text]:focus,input[type=email]:focus,input[type=password]:focus,input[type=number]:focus,input[type=url]:focus,textarea:focus,.search-form input[type=search]:active,.search-form input[type=search]:focus,.xt_vc_row-color-white .ch-campaign-search .btn.btn-fill,.widget.widget_tag_cloud a,.widget.widget_product_tag_cloud a,.mean-container .mean-nav ul li,.button.button-secondary,.button.button-secondary:hover,.button.button-primary,.button.button-primary:hover,.widget_charitable_donate_widget #charitable-donation-amount-form .donation-amounts .donation-amount.suggested-donation-amount.selected,.widget_charitable_donate_widget #charitable-donation-amount-form .donation-amounts .donation-amount.suggested-donation-amount:hover,body #charitable-donation-form .donation-amount.selected,#charitable-donation-form .donation-amounts .donation-amount.suggested-donation-amount.selected,#charitable-donation-form .donation-amounts .donation-amount.suggested-donation-amount:hover,.tribe-events-list .tribe-events-event-cost span,.ch-campaign-search .btn,.widget_product_search .search-field:focus,.woocommerce-pagination li>a,.woocommerce-pagination li>span,.woocommerce .ch-woocommerce-shop-filter-wrapper .woocommerce-ordering select:focus,.woocommerce div.product form.cart .variations select:focus,.vc_tta-container .vc_tta-accordion.xt-vc-tta-accordion-theme-default .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-controls-icon:before,.select2-container--default .select2-search--dropdown .select2-search__field:focus,#give-recurring-form .form-row input[type=text]:focus,#give-recurring-form .form-row input[type=tel]:focus,#give-recurring-form .form-row input[type=email]:focus,#give-recurring-form .form-row input[type=password]:focus,#give-recurring-form .form-row select:focus,#give-recurring-form .form-row textarea:focus,form.give-form .form-row input[type=text]:focus,form.give-form .form-row input[type=tel]:focus,form.give-form .form-row input[type=email]:focus,form.give-form .form-row input[type=password]:focus,form.give-form .form-row select:focus,form.give-form .form-row textarea:focus,form[id*=give-form] .form-row input[type=text]:focus,form[id*=give-form] .form-row input[type=tel]:focus,form[id*=give-form] .form-row input[type=email]:focus,form[id*=give-form] .form-row input[type=password]:focus,form[id*=give-form] .form-row select:focus,form[id*=give-form] .form-row textarea:focus,.header-slider .owl-theme .owl-dots .owl-dot.active,.header-slider .slide-buttons .btn:hover,.btn-style-two:hover,.card-profile .footer a:hover,.btn-style-five,.nav-previous a,.nav-next a,.btn-style-one,.charitable-submit-field .button,.service-box .inner-box:hover,.blog-details blockquote,.pager li>span,.pager ul li span.current,.pager li>a:hover,.pager li>a.next:hover,.pager li>a.previous:hover,.btn-style-three,.kc_button.xt-theme-primary-btn,.xt_theme_paignation.xt-theme-page-links .pager .active a,.woocommerce ul.products li.product .ch-cart-wrapper .button,.pager li>a,.pager li>span,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-MyAccount-navigation ul li a,.btn.btn-fill,.give-btn,.give_submit,#give-register-form .button,.ch-pre-header .btn.btn-fill:hover,.humane-event-slider.owl-carousel .owl-controls .owl-dot,.humane-donation-causes.owl-carousel .owl-controls .owl-dot,.humane-event-slider.owl-carousel .owl-controls .owl-dot.active,.humane-donation-causes.owl-carousel .owl-controls .owl-dot.active,.sec-title.text-left,.sec-title.text-default,.sec-title.text-right,body.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .btn.btn-fill{border-color: {$xt_primary_color}}";

			/* dark */
			$custom_css .= ".btn.btn-fill:focus,.give-btn:hover,.give-btn:focus,.give_submit:hover,.give_submit:focus,#give-register-form .button:hover,#give-register-form .button:focus,.comment-respond .form-submit input[type=submit]:hover,.button.button-primary:hover,.button.button-secondary:hover,.post-password-form input[type=submit]:hover,body .humane-donation-causes .donate-button.btn.btn-fill:hover,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce-MyAccount-navigation ul li a:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.ch-campaign-search button[type=submit]:hover,.ch-pre-header-btn .kc_button.xt-theme-primary-btn:hover,.ch-pre-header-btn .kc_button.xt-theme-primary-btn:focus{background-color:{$xt_primary_color_dark}}";

			$custom_css .= ".woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-MyAccount-navigation ul li a,.give-btn,.give_submit,#give-register-form .button,.ch-pre-header .btn.btn-fill:hover,.woocommerce-MyAccount-navigation ul li a{border-color:{$xt_primary_color_dark}}";

			/* light */
			$custom_css .= ".ch-grid .ch-grid-item figure:hover figcaption, .default-portfolio-item .overlay-box{background-color:{$xt_primary_color_light}}";
					
			$custom_css .= ".ch-client-testimonial #quote-carousel .carousel-indicators li {border-color:{$xt_primary_color_light}}";	

		}

	    $custom_css .= "
			body {
				color: {$body_color};
				background: {$body_bg};
				line-height: {$body_line_height}px;
				font-size: {$body_font_size}px;
			}
		    ";

		$custom_css .= "
			.navbar.site-header-type-default {
				background: {$xt_header_bg};
			}
		    ";

		$custom_css .= "
			.navbar-default .navbar-nav li a {
				color: {$xt_default_menu_color};
			}
			.navbar-default .navbar-nav li a:hover {
				color: {$xt_default_menu_hover_color};
			}
			.navbar-nav > li > .dropdown-menu li a {
				color: {$xt_dropdown_menu_color};
			}
			.navbar-nav > li > .dropdown-menu li a:hover {
				color: {$xt_dropdown_menu_color_hover};
			}
			.navbar-nav > li .dropdown-menu {
				background: {$xt_dropdown_menu_bg};
			}
			.navbar-nav > li > .dropdown-menu li {
				border-bottom-color: {$xt_dropdown_menu_border_color};
			}
			.navbar-nav > li ul.dropdown-menu {
			    min-width: {$xt_dropdown_menu_width}px;
			}
		    ";

		if( $xt_page_header_bg ){
			$custom_css .= "
				.xt-page-title-area {
					background-image: url( $xt_page_header_bg );
					background-size: cover;
    				background-position: center center;
				}
			    ";
		}

		$custom_css .= "
			.xt-page-title-area .xt-page-title-overlay {
				background: {$xt_page_header_bg_color};
			}
			.xt-page-title-area {
				padding-top: {$xt_page_header_p_top}px;
				padding-bottom: {$xt_page_header_p_bottom}px;
			}
		    ";

		$custom_css .= "
			.site-footer-inner {
			  padding: {$footer_top_space}px 0 {$footer_bottom_space}px;
			}
			.footer-bg.site-footer {
			    background-color: {$footer_background_color};
			    color: {$footer_content_color};
			}
			.ch-footer .footer-content ul li a,
			.ch-footer .ch-widget-list ul li a {
				color: {$footer_link_color};
			}
			.ch-footer .footer-content ul li a:hover,
			.ch-footer .ch-widget-list ul li a:hover,
			footer .widget_nav_menu ul li a:hover:before {
				color: {$footer_link_hover_color};
			}
			.ch-footer-bottom-bar {
				padding: {$bottom_bar_top_bottom_space}px 0;
			}
			.site-footer .ch-hr {
			    border-color: {$bottom_bar_border_color};
			}
		    ";

		$custom_css .= "
			.ch-pre-header {
			    padding: {$pre_header_top_space}px 0 {$pre_header_bottom_space}px;
			    background: {$xt_pre_header_bg};
			}
			.humane-navigation .navbar-nav > li > a {
			    padding: {$header_top_space}px 0 {$header_bottom_space}px;
			}
			.humane-navigation .navbar-nav > li {
				padding: 0 {$menu_right_space}px 0 {$menu_left_space}px;
			}
			.ch-pre-header-btn .kc_button.xt-theme-primary-btn{
				margin-top: -{$pre_header_top_space}px;
				margin-bottom: -{$pre_header_bottom_space}px;
			}
		    ";  

		if( $logo_top_space ){
			$custom_css .= "
			.site-branding.navbar-header {
				margin-top: {$logo_top_space}px;
			}
		    ";
		} 

		if( $logo_bottom_space ){
			$custom_css .= "
			.site-branding.navbar-header {
				margin-bottom: {$logo_bottom_space}px;
			}
		    ";
		}
		if( $logo_max_height ){
			$custom_css .= "
			.logo-wrapper img{
				max-height: {$logo_max_height}px;
			}
		    ";
		}

		$custom_css = apply_filters( 'xt_theme_custom_css', $custom_css );    

	    wp_add_inline_style( 'humane-custom-style', $custom_css );

	}
}
add_action( 'wp_enqueue_scripts', 'humane_add_inline_styles' );


/**
 * Show first category
 */

if( !function_exists('humane_get_post_first_category') ){
	function humane_get_post_first_category ( $post_id, $taxonomy = null ){
		if( !$post_id ){
			$post_id = get_the_id();
		}

		if( $post_id &&  $taxonomy ){
			$terms = get_the_terms( $post_id, $taxonomy );
			$term_name = $term_link = '';
			if( $terms && !empty($terms) ){
				$term = array_shift($terms);
				$term_name = $term->name;
				$term_link = get_term_link($term->term_id);
			}
		}

		if( $term_name && $term_link ){
			return sprintf( '<a href="%s">%s</a>', esc_url( $term_link ), esc_html( $term_name ) );
		}else{
			return false;
		}
	}
}


/**
 * Setup Preloader & Back to top
 */

add_action( 'wp_footer', 'humane_setup_preloader_and_back_to_top' );

if(!function_exists( 'humane_setup_preloader_and_back_to_top' )){
	function humane_setup_preloader_and_back_to_top() {
		$xt_need_preloader 		= cs_get_option( 'xt_need_preloader' );
		$xt_need_back_to_top 	= cs_get_option( 'xt_need_back_to_top' );

		?>
			<?php if( $xt_need_back_to_top == true ): ?>
			    <a href="#" class="xt-back-to-top">
			      <i class="fa fa-arrow-up"></i>
			    </a>
			<?php endif; ?>

			<?php if( $xt_need_preloader == true && is_front_page() ): ?>
				<div class="xt-loader-wrapper">
					<div class="xt-loader"></div>
					<div class="xt-loader-section xt-loader-section-left"></div>
					<div class="xt-loader-section xt-loader-section-right"></div>
				</div>
			<?php endif; ?>
		<?php
	}
}


/**
 * Contact form 7 autop remove
 */

add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * The Event Calender clean up
 */

if ( class_exists( 'Tribe__Main' ) ) {
	remove_action( 'wp_footer', array( Tribe__Main::instance(), 'toggle_js_class' ) );
}
if ( function_exists( 'tribe' ) ) {
	remove_action( 'wp_head', array( tribe( 'tec.rest-v1.headers' ), 'add_header' ) );
}

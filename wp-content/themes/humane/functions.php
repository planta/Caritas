<?php
/**
 * humane functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Humane
 */

if ( ! function_exists( 'humane_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function humane_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on humane, use a find and replace
	 * to change 'humane' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'humane', get_template_directory() . '/languages' );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', humane_main_fonts_url() ) );
	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'humane-project-thumb','370', '430', true );

	add_image_size( 'humane-blog-thumb', humane_cs_get_option( 'feature_image_width', 770 ), humane_cs_get_option( 'feature_image_height', 380 ), true );

	add_image_size( 'humane-campaign-thumb', apply_filters( 'humane_campaign_image_width', 770 ), apply_filters( 'humane_campaign_image_height', 422 ), apply_filters( 'humane_campaign_image_hard_crop', true ) );

	add_image_size( 'humane-campaign-thumb-grid', apply_filters( 'humane_campaign_grid_image_width', 460 ), apply_filters( 'humane_campaign_grid_image_height', 330 ), apply_filters( 'humane_campaign_grid_image_hard_crop', true ) );

	add_image_size( 'humane-blog-thumb-grid', apply_filters( 'humane_blog_grid_image_width', 500 ), apply_filters( 'humane_campaign_grid_image_height', 350 ), apply_filters( 'humane_blog_grid_image_hard_crop', true ) );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> 	esc_html__( 'Primary', 'humane' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	* Enable support for Custom Logo.
	* See https://codex.wordpress.org/Theme_Logo
	*/
	add_theme_support( 'custom-logo', array(
		'height'      => 46,
		'width'       => 166,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// WooCommerce
	add_theme_support( 'woocommerce' );

	// Gutenberg Support
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );

	// Gutenberg editor color

	$xt_primary_color       		= cs_get_option( 'xt_primary_color' );

	add_theme_support( 'editor-color-palette', array(
        array(
            'name' 	=> esc_html__( 'Theme Primary Color', 'humane' ),
            'slug' 	=> 'theme-primary-color',
            'color' => $xt_primary_color,
        ),
        array(
            'name' 	=> esc_html__( 'White', 'humane' ),
            'slug' 	=> 'theme-white',
            'color' => '#ffffff',
        ),
    ));

    // Gutenberg editor font size

    add_theme_support( 'editor-font-sizes', array(
	    array(
	        'name' 		=> esc_html__( 'Small', 'humane' ),
	        'shortName' => esc_html__( 'S', 'humane' ),
	        'size' 		=> 12,
	        'slug' 		=> 'small'
	    ),
	    array(
	        'name' 		=> esc_html__( 'Regular', 'humane' ),
	        'shortName' => esc_html__( 'M', 'humane' ),
	        'size' 		=> 16,
	        'slug' 		=> 'regular'
	    ),
	    array(
	        'name' 		=> esc_html__( 'Large', 'humane' ),
	        'shortName' => esc_html__( 'L', 'humane' ),
	        'size' 		=> 36,
	        'slug' 		=> 'large'
	    ),
	    array(
	        'name' 		=> esc_html__( 'Larger', 'humane' ),
	        'shortName' => esc_html__( 'XL', 'humane' ),
	        'size' 		=> 50,
	        'slug' 		=> 'larger'
	    )
	));
}
endif;
add_action( 'after_setup_theme', 'humane_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function humane_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'humane_content_width', 640 );
}
add_action( 'after_setup_theme', 'humane_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function humane_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'humane' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here. It will be shown to the blog pages.', 'humane' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s shadow blog_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Donation Cause Sidebar', 'humane' ),
		'id'            => 'campaign',
		'description'   => esc_html__( 'It will be shown to the campaign pages.', 'humane' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s shadow blog_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Events Sidebar', 'humane' ),
		'id'            => 'events',
		'description'   => esc_html__( 'It will be shown to the events pages.', 'humane' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s shadow blog_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'humane' ),
		'id'            => 'footer-widgets',
		'description'   => esc_html__( 'Add widgets here. It will be shown to the footer area.', 'humane' ),
		'before_widget' => '<div id="%1$s" class="col-md-'. esc_attr( humane_cs_get_option( 'footer_widget_column', 3 ) ) .' col-sm-6 col-xs-12 ch-pages ch-widget-list widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title footer-widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'humane_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function humane_scripts() {
	wp_enqueue_style( 'humane-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7' );

	if( is_rtl() ){
		wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.css', array(), '3.3.7' );
	}

	wp_enqueue_style( 'linea', get_template_directory_uri() . '/assets/icons/linea/styles.css', array(), '1.0' );
	
	wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/assets/icons/linearicons/style.css', array(), '1.0' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'humane-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon.css', array(), '1.0' );

	wp_enqueue_style( 'lightcase', get_template_directory_uri() . '/assets/plugins/css/lightcase.css', array(), '2.4' );

	wp_register_style( 'animate', get_template_directory_uri() . '/assets/plugins/css/animate.css', array(), '1.0' );

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/plugins/css/owl.css', array(), '2.2.1' );

	wp_enqueue_style( 'humane-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0' );

	wp_enqueue_style( 'humane-color', get_template_directory_uri() . '/assets/css/color.css', array(), '1.0' );

	wp_enqueue_style( 'humane-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0' );

	wp_enqueue_style( 'humane-custom-style', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );

	wp_enqueue_script( 'humane-meanmenu', get_template_directory_uri() . '/assets/plugins/js/meanmenu.min.js', array('jquery'), '2.0.8', true );

	wp_enqueue_script( 'humane-circlechart', get_template_directory_uri() . '/assets/js/jquery.circlechart.js', array('jquery'), '1.0', false );

	wp_enqueue_script( 'lightcase', get_template_directory_uri() . '/assets/plugins/js/lightcase.min.js', array('jquery'), '2.4', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/plugins/js/owl.carousel.js', array('jquery'), '2.2.1', true );

	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/assets/plugins/js/jquery.matchHeight-min.js', array('jquery'), '0.7.2', true );

	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/assets/plugins/js/mixitup.js', array('jquery'), '2.1.10', true );

	wp_enqueue_script( 'humane-main', get_template_directory_uri() . '/assets/js/init.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'humane_scripts' );



/**
 * Enqueue styles for the block-based editor.
 *
 */

function humane_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'humane-block-editor-style', get_template_directory_uri() . '/assets/css/editor-blocks.css', array(), '20181230' );
	// Add custom fonts.
	wp_enqueue_style( 'charity-main-fonts', humane_main_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'humane_block_editor_styles' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Bootstrap Nav Walker Class
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * TGM Plugin Installer
 */
require get_template_directory() . '/admin/class-tgm-plugin-activation.php';

/**
 * Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs.php';


/**
 * Charitable functions 
 */
if ( class_exists( 'Charitable' ) ){
	require get_template_directory() . '/inc/charitable-functions.php';
}

/**
 * XooTheme Core Functions
 */
require get_template_directory() . '/inc/xt-core-functions.php';


/**
 * Theme Custom Functions
 */
require get_template_directory() . '/inc/theme-functions.php';


/**
 * Events functions 
 */

if ( class_exists( 'Tribe__Events__Main' ) ) {
	require get_template_directory() . '/inc/event-calender-functions.php';
}

/**
 * WooCommerce functions
 */

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/ch-woocommerce-functions.php';
}

/**
 * Give functions
 */

if ( class_exists( 'Give' ) ){
	require get_template_directory() . '/inc/give/give-functions.php';
	require get_template_directory() . '/inc/give/give-widgets.php';
}

/**
 * KingComposer Customizer
 */

if( defined('KC_VERSION') || isset( $GLOBALS['kc'] ) ) {
	require get_template_directory() . '/inc/kc-config.php';
}

/**
 * Adding Custom Icons to KC
 */

add_action('init', 'humane_kc_adding_custom_icons_adding');

if( !function_exists( 'humane_kc_adding_custom_icons_adding' ) ) {
	function humane_kc_adding_custom_icons_adding() {
	 
		if( function_exists( 'kc_add_icon' ) ) {
	 
			kc_add_icon( get_template_directory_uri().'/assets/fonts/flaticon.css' );
	 
		}
	 
	}
}
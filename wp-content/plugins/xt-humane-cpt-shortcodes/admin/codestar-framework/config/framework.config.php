<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => esc_html__('Theme Options', 'humane'),
  'menu_type'       => 'menu',
  'menu_slug'       => 'humane-options',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => sprintf( '%s <small>%s</small>', esc_html__('Humane ', 'humane'), 'by XooThemes' ),
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();


// ------------------------------
// Pre Header Setting                  -
// ------------------------------

$options[]      = array(
  'name'        => 'pre_header_settings',
  'title'       => esc_html__('Pre Header Settings', 'humane'),
  'icon'        => 'cs-icon fa fa-arrows-h',

  // begin: fields
  'fields'      => array(

    array(
      'id'      => 'ch_need_pre_header',
      'type'    => 'switcher',
      'title'   => esc_html__('Need pre header?', 'humane'),
      'desc'    => esc_html__('Enable or disable pre header bar.', 'humane'),
      'default' => false,
    ),

    array(
      'id'      => 'ch_need_pre_header_mobile',
      'type'    => 'switcher',
      'title'   => esc_html__('Disable on mobile?', 'humane'),
      'desc'    => esc_html__('Enable or disable pre header bar on mobile devices.', 'humane'),
      'default' => true
    ),
    array(
      'id'       => 'ch_pre_header_left_content',
      'type'     => 'select',
      'title'    => esc_html__('Header left content', 'humane'),
      'desc'     => esc_html__('Select a content type for header left.', 'humane'),
      'options'  => array(
        'none'              => esc_html__('No Content', 'humane'),
        'informations'      => esc_html__('Informations', 'humane'),
        'menu'              => esc_html__('Menu', 'humane'),
      ),
      'default'  => 'informations',
    ),
    array(
      'id'          => 'ch_pre_header_text',
      'type'        => 'text',
      'title'       => esc_html__('Header text', 'humane'),
      'desc'        => esc_html__('Will be shown in the header top bar.', 'humane'),
      'dependency'  => array( 'ch_pre_header_left_content', '==', 'informations' ),
    ),
    array(
      'id'          => 'ch_pre_header_phone',
      'type'        => 'text',
      'title'       => esc_html__('Phone number', 'humane'),
      'desc'        => esc_html__('Will be shown in the header top bar.', 'humane'),
      'dependency'  => array( 'ch_pre_header_left_content', '==', 'informations' ),
    ),
    array(
      'id'          => 'ch_pre_header_email',
      'type'        => 'text',
      'title'       => esc_html__('Email address', 'humane'),
      'desc'        => esc_html__('Will be shown in the header top bar.', 'humane'),
      'dependency'  => array( 'ch_pre_header_left_content', '==', 'informations' ),
    ),
    array(
      'id'          => 'ch_pre_header_left_menu',
      'type'        => 'select',
      'title'       => esc_html__('Header Left Menu', 'humane'),
      'desc'        => esc_html__('Select a menu for header left.', 'humane'),
      'options'     => 'menu',
      'dependency'  => array( 'ch_pre_header_left_content', '==', 'menu' ),
    ),
    array(
      'id'          => 'ch_pre_header_left_menu_campaign_creator',
      'type'        => 'select',
      'title'       => esc_html__('Header Left Menu for Campaign Creator', 'humane'),
      'desc'        => esc_html__('Select a menu for header left. If campaign creator users login then this menu will be shown. User Role : campaign_creator', 'humane'),
      'options'     => 'menu',
      'dependency'  => array( 'ch_pre_header_left_content', '==', 'menu' ),
    ),
    array(
      'id'       => 'ch_pre_header_right_content',
      'type'     => 'select',
      'title'    => esc_html__('Header right content', 'humane'),
      'desc'     => esc_html__('Select a content type for header right.', 'humane'),
      'options'  => array(
        'none'              => esc_html__('No Content', 'humane'),
        'text'              => esc_html__('Plain Text', 'humane'),
        'menu'              => esc_html__('Menu', 'humane'),
        'social'            => esc_html__('Social Icons', 'humane'),
        'conditional_pages'  => esc_html__('Selected Pages Link with condition', 'humane'),
      ),
      'default'  => 'social',
    ),
    array(
      'id'          => 'ch_pre_header_right_text',
      'type'        => 'text',
      'title'       => esc_html__('Header Right Text', 'humane'),
      'desc'        => esc_html__('Pre header right plain text.', 'humane'),
      'dependency'  => array( 'ch_pre_header_right_content', '==', 'text' ),
    ),
    array(
      'id'          => 'ch_pre_header_right_menu',
      'type'        => 'select',
      'title'       => esc_html__('Header Right Menu', 'humane'),
      'desc'        => esc_html__('Select a menu for header right.', 'humane'),
      'options'     => 'menu',
      'dependency'  => array( 'ch_pre_header_right_content', '==', 'menu' ),
    ),
    array(
      'id'              => 'ch_pre_header_right_social_icons',
      'type'            => 'group',
      'title'           => esc_html__('Top Bar Right Social Icons', 'humane'),
      'button_title'    => esc_html__('Add New', 'humane'),
      'accordion_title' => esc_html__('Add New Social Network', 'humane'),
      'dependency'      => array( 'ch_pre_header_right_content', '==', 'social' ),
      'fields'          => array(

        array(
          'id'      => 'icon',
          'type'    => 'icon',
          'title'   => esc_html__('Select an Icon', 'humane'),
        ),

        array(
          'id'          => 'url',
          'type'        => 'text',
          'title'       => esc_html__('Social Network URL', 'humane')
        ),

      ),
    ),
    array(
      'id'              => 'ch_pre_header_right_conditional_pages',
      'type'            => 'group',
      'title'           => esc_html__('Top Bar Right Conditional Pages', 'humane'),
      'button_title'    => esc_html__('Add New', 'humane'),
      'accordion_title' => esc_html__('Add New Page', 'humane'),
      'dependency'      => array( 'ch_pre_header_right_content', '==', 'conditional_pages' ),
      'fields'          => array(

        array(
          'id'      => 'ch_select_conditional_page',
          'type'    => 'select',
          'title'   => esc_html__('Select a Page', 'humane'),
          'options' => 'pages',
        ),
        array(
          'id'             => 'ch_select_condition',
          'type'           => 'select',
          'title'          => esc_html__('Show If', 'humane'),
          'options'        => array(
            'always'         => esc_html__('Show always', 'humane'),
            'login'          => esc_html__('If logged in', 'humane'),
            'not_login'      => esc_html__('If not logged in', 'humane'),
          ),
        ),

      ),
    ),
    array(
      'id'      => 'ch_need_pre_header_btn',
      'type'    => 'switcher',
      'title'   => esc_html__('Need button on pre header?', 'humane'),
      'desc'    => esc_html__('Enable or disable the button.', 'humane'),
    ),
    array(
      'id'          => 'pre_header_btn_text',
      'type'        => 'text',
      'title'       => esc_html__('Button Text', 'humane'),
      'desc'        => esc_html__('Pre header button text.', 'humane'),
      'dependency'  => array( 'ch_need_pre_header_btn', '==', 'true' ),
    ),
    array(
      'id'          => 'pre_header_btn_url',
      'type'        => 'text',
      'title'       => esc_html__('Button URL', 'humane'),
      'desc'        => esc_html__('Pre header button URL.', 'humane'),
      'dependency'  => array( 'ch_need_pre_header_btn', '==', 'true' ),
    ),
  )
);

// ------------------------------
// Header Setting                  -
// ------------------------------

$options[]      = array(
  'name'        => 'header_settings',
  'title'       => esc_html__('Header Settings', 'humane'),
  'icon'        => 'cs-icon fa fa-arrow-circle-up',

  // begin: fields
  'fields'      => array(
    array(
      'id'      => 'xt_header_bg',
      'type'    => 'color_picker',
      'title'   => esc_html__('Header background color', 'humane'),
      'desc'    => esc_html__('Default #ffffff.', 'humane'),
      'default' => '#ffffff',
      'rgba'    => true,
    ),
    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => sprintf( '<h3>%s</h3>', esc_html__('Default menu settings', 'humane') ),
    ),
    array(
      'id'      => 'xt_default_menu_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Menu color', 'humane'),
      'desc'    => esc_html__('Default #363636.', 'humane'),
      'default' => '#363636',
      'rgba'    => true,
    ),
    array(
      'id'      => 'xt_default_menu_hover_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Menu hover color', 'humane'),
      'desc'    => esc_html__('Default #fc2c62.', 'humane'),
      'default' => '#fc2c62',
      'rgba'    => true,
    ),
    array(
      'id'      => 'xt_menu_hover_border',
      'type'    => 'switcher',
      'title'   => esc_html__('Menu hover border', 'humane'),
      'default' => true,
      'desc'    => esc_html__('On menu hover show a border bellow the menu item. Default yes.', 'humane'),
    ),
    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => sprintf( '<h3>%s</h3>', esc_html__('Dropdown or megamenu settings', 'humane') ),
    ),
    array(
      'id'      => 'xt_dropdown_menu_bg',
      'type'    => 'color_picker',
      'title'   => esc_html__('Dropdown Background Color', 'humane'),
      'desc'    => esc_html__('Dropdown or megamenu background color. Default #ffffff.', 'humane'),
      'default' => '#ffffff',
      'rgba'    => true,
    ),
    array(
      'id'      => 'xt_dropdown_menu_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Dropdown Color', 'humane'),
      'desc'    => esc_html__('Dropdown color. Default #363636.', 'humane'),
      'default' => '#363636',
      'rgba'    => true,
    ),
    array(
      'id'      => 'xt_dropdown_menu_color_hover',
      'type'    => 'color_picker',
      'title'   => esc_html__('Dropdown Menu Hover Color', 'humane'),
      'desc'    => esc_html__('Dropdown menu hover color. Default #fc2c62.', 'humane'),
      'default' => '#fc2c62',
      'rgba'    => true,
    ),
     array(
      'id'      => 'xt_dropdown_menu_border_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Dropdown Border Color', 'humane'),
      'desc'    => esc_html__('Dropdown menu border color. Default #eeeeee.', 'humane'),
      'default' => '#eeeeee',
      'rgba'    => true,
    ),
  )
);


// ------------------------------
// Page Header Setting                  -
// ------------------------------

$options[]      = array(
  'name'        => 'page_header_settings',
  'title'       => esc_html__('Page Header Settings', 'humane'),
  'icon'        => 'cs-icon fa fa-window-minimize',

  // begin: fields
  'fields'      => array(
    array(
      'id'        => 'xt_page_header_bg',
      'type'      => 'image',
      'title'     => esc_html__('Page Header Background', 'humane'),
      'desc'      => esc_html__('Page header background image.', 'humane'),
      'add_title' => esc_html__('Add Image', 'humane'),
    ),
    array(
      'id'      => 'xt_page_feature_img_header_bg',
      'type'    => 'switcher',
      'title'   => esc_html__('Use Page Feature Image', 'humane'),
      'default' => true,
      'desc'    => esc_html__('If page, use page feature image as page background image. Default yes.', 'humane'),
    ),
    array(
      'id'      => 'xt_page_header_bg_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Page header background color overlay', 'humane'),
      'default' => 'rgba(0, 0, 0, 0.6)',
      'rgba'    => true,
    ),
    array(
      'id'        => 'xt_page_header_p_top',
      'type'      => 'slider',
      'default'   => 75,
      'title'     => esc_html__( 'Padding Top', 'humane' ),
      'desc'      => esc_html__('Page header padding top. Default 75px.', 'humane'),
      'options'   => array(
        'step'    => 1,
        'min'     => 5,
        'max'     => 200,
      )
    ),
    array(
      'id'        => 'xt_page_header_p_bottom',
      'type'      => 'slider',
      'default'   => 75,
      'title'     => esc_html__( 'Padding Bottom', 'humane' ),
      'desc'      => esc_html__('Page header padding bottom. Default 75px.', 'humane'),
      'options'   => array(
        'step'    => 1,
        'min'     => 5,
        'max'     => 200,
      )
    ),
    array(
      'id'      => 'xt_show_breadcrumb',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Breadcrumb', 'humane'),
      'desc'    => esc_html__('Show breadcrumb in page header. Default enable.', 'humane'),
      'default' => true,
    ),
  )
);    

// ------------------------------
// Style Setting                  -
// ------------------------------

$options[]      = array(
  'name'        => 'style_settings',
  'title'       => esc_html__('Style Settings', 'humane'),
  'icon'        => 'fa fa-cogs',

  // begin: fields
  'fields'      => array(
    array(
      'id'        => 'body_font_size',
      'type'      => 'slider',
      'default'   => 16,
      'title'     => esc_html__( 'Font size', 'humane' ),
      'desc'      => esc_html__('Body font size. Default 16px.', 'humane'),
      'options'   => array(
        'step'    => 1,
        'min'     => 5,
        'max'     => 100,
      )
    ),
    array(
      'id'        => 'body_line_height',
      'type'      => 'slider',
      'default'   => 26,
      'title'     => esc_html__( 'Line Height', 'humane' ),
      'desc'      => esc_html__('Body line height. Default 26px.', 'humane'),
      'options'   => array(
        'step'    => 1,
        'min'     => 5,
        'max'     => 100,
      )
    ),
    array(
      'id'      => 'xt_body_bg',
      'type'    => 'color_picker',
      'title'   => esc_html__('Body Background', 'humane'),
      'desc'    => esc_html__('Site body background color.', 'humane'),
      'default' => '#f3f3f3',
    ),
    array(
      'id'      => 'xt_body_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Body color', 'humane'),
      'desc'    => esc_html__('Site body color.', 'humane'),
      'default' => '#767676',
    ),
    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => sprintf( '<h3>%s</h3>', esc_html__('Color Customization', 'humane') ),
    ),
    array(
      'id'      => 'need_color_customizer',
      'type'    => 'switcher',
      'title'   => esc_html__('Need color customizer?', 'humane'),
      'default' => false
    ),
    array(
      'id'         => 'xt_primary_color',
      'type'       => 'color_picker',
      'title'      => esc_html__('Theme Primary Color', 'humane'),
      'default'    => '#fc2c62',
      'dependency' => array( 'need_color_customizer', '==', 'true' )
    ),
    array(
      'id'         => 'xt_primary_color_dark',
      'type'       => 'color_picker',
      'title'      => esc_html__('Theme Primary Color Dark', 'humane'),
      'default'    => '#e23360',
      'dependency' => array( 'need_color_customizer', '==', 'true' )
    ),
    array(
      'id'         => 'xt_primary_color_light',
      'type'       => 'color_picker',
      'title'      => esc_html__('Theme Primary Color Light', 'humane'),
      'default'    => 'rgba(252,44,98,0.85)',
      'dependency' => array( 'need_color_customizer', '==', 'true' )
    ),
  ),
);


// ------------------------------
// Blog Setting                  -
// ------------------------------

$options[]      = array(
  'name'        => 'blog_settings',
  'title'       => esc_html__('Blog Settings', 'humane'),
  'icon'        => 'fa fa-rss',

  // begin: fields
  'fields'      => array(
    array(
      'id'          => 'feature_image_width',
      'type'        => 'number',
      'title'       => esc_html__('Blog Feature Image Width', 'humane'),
      'desc'        => esc_html__('If you changed the image size, you have to regenerate thumbnails. You can use any regenerate thumbnails plugin for that.', 'humane'),
      'default'     => 770,
      'after'       => ' <i class="cs-text-muted">(px)</i>',
    ),
    array(
      'id'      => 'feature_image_height',
      'type'    => 'number',
      'title'   => esc_html__('Blog Feature Image Height', 'humane'),
      'default' => 380,
      'after'   => ' <i class="cs-text-muted">(px)</i>',
    ),
    array(
      'id'        => 'blog_layout',
      'type'      => 'image_select',
      'title'     => esc_html__('Blog Layout', 'humane'),
      'desc'      => esc_html__('Choose a layout for your blog, It will also work on single, archive, search pages.', 'humane'),
      'options'   => array(
        'full_width'  => esc_url( get_template_directory_uri().'/assets/images/admin/full-width.png' ),
        'left'        => esc_url( get_template_directory_uri().'/assets/images/admin/left.png' ),
        'right'       => esc_url( get_template_directory_uri().'/assets/images/admin/right.png' ),
      ),
      'radio'     => true,
      'default'   => 'right'
    ),
    array(
      'id'      => 'blog_author_bio',
      'type'    => 'switcher',
      'title'   => esc_html__('Author Bio', 'humane'),
      'default' => false,
      'desc'    => esc_html__('Show author bio on single blog post. Default yes.', 'humane'),
    ),
    array(
      'id'      => 'blog_post_nav',
      'type'    => 'switcher',
      'title'   => esc_html__('Post Nav', 'humane'),
      'default' => true,
      'desc'    => esc_html__('Show next / prev nav on single blog post. Default yes.', 'humane'),
    ),
  ),
);

// ------------------------------
// Charitable Settings
// ------------------------------


if ( class_exists( 'Charitable' ) ):

  $options[]   = array(
    'name'     => 'xt_campaign_settigs',
    'title'    => esc_html__('Donation Settings', 'humane'),
    'icon'     => 'fa fa-heart',
    'fields'   => array(

      array(
        'id'        => 'campaign_layout',
        'type'      => 'image_select',
        'title'     => esc_html__('Campaign Page Layout', 'humane'),
        'desc'      => esc_html__('Choose a layout for your shop page, It will also work on few others Campaign pages.', 'humane'),
        'options'   => array(
          'full_width'  => esc_url( get_template_directory_uri().'/assets/images/admin/full-width.png' ),
          'left'        => esc_url( get_template_directory_uri().'/assets/images/admin/left.png' ),
          'right'       => esc_url( get_template_directory_uri().'/assets/images/admin/right.png' ),
        ),
        'radio'     => true,
        'default'   => 'right'
      ),
      array(
        'id'          => 'campaign_page_title',
        'type'        => 'text',
        'title'       => esc_html__('Campaigns Page Text', 'humane'),
        'default'     => esc_html__('Campaigns', 'humane'),
      ),
      array(
        'id'          => 'donate_button_text',
        'type'        => 'text',
        'title'       => esc_html__('Donate Buttom Text', 'humane'),
        'default'     => esc_html__('Donate', 'humane'),
      ),
      array(
        'id'          => 'donate_button_text_expired',
        'type'        => 'text',
        'title'       => esc_html__('Donate Buttom Text Expired', 'humane'),
        'default'     => esc_html__('Details', 'humane'),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => sprintf( '<h3>%s</h3>', esc_html__('Single Campaign Page Setting', 'humane') ),
      ),
      array(
        'id'      => 'show_campaign_donation_count',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Campaign Donation Count', 'humane'),
        'desc'    => esc_html__('You can show or hide the campaign donation count on single campaign page bellow the title inside the donation stats.', 'humane'),
        'default' => true,
      ),
      array(
        'id'      => 'show_campaign_location',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Campaign Location', 'humane'),
        'desc'    => esc_html__('You can show or hide the campaign location on single campaign page bellow the title inside the donation stats.', 'humane'),
        'default' => true
      ),
      array(
        'id'      => 'show_campaign_donation_progress_bar',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Campaign Progress Bar', 'humane'),
        'desc'    => esc_html__('You can show or hide the campaign donation progress bar on single campaign page bellow the title.', 'humane'),
        'default' => true
      ),
      array(
        'id'      => 'show_campaign_updates',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Campaign Updates', 'humane'),
        'desc'    => esc_html__('Campaign updates has a shortcode, you can use that to show the updates aywhere in the content area of campaign. If you enable this updates will be show bellow the content. [ Required charitable simple updates addon ]', 'humane'),
        'default' => true
      ),
      array(
        'id'          => 'campaign_updates_title',
        'type'        => 'text',
        'title'       => esc_html__('Campaign Updates Title', 'humane'),
        'default'     => esc_html__('Campaign Updates:', 'humane'),
        'dependency'  => array( 'show_campaign_updates', '==', 'true' )
      ),
      array(
        'id'          => 'campaign_video_width',
        'type'        => 'number',
        'title'       => esc_html__('Campaign Video Width', 'humane'),
        'desc'        => esc_html__('Required charitable campaign video addon.', 'humane'),
        'default'     => 710,
      ),
    )
  );

endif;


// ------------------------------
// Give Settings
// ------------------------------


if ( class_exists( 'Give' ) ):

  $options[]   = array(
    'name'     => 'xt_give_settigs',
    'title'    => esc_html__('Give Donation Settings', 'humane'),
    'icon'     => 'dashicons dashicons-give',
    'fields'   => array(

      array(
        'id'        => 'donation_form_layout',
        'type'      => 'image_select',
        'title'     => esc_html__('Campaign Page Layout', 'humane'),
        'desc'      => esc_html__('Choose a layout for your shop page, It will also work on few others Campaign pages.', 'humane'),
        'options'   => array(
          'full_width'  => esc_url( get_template_directory_uri().'/assets/images/admin/full-width.png' ),
          'left'        => esc_url( get_template_directory_uri().'/assets/images/admin/left.png' ),
          'right'       => esc_url( get_template_directory_uri().'/assets/images/admin/right.png' ),
        ),
        'radio'     => true,
        'default'   => 'right'
      ),
      array(
        'id'          => 'form_archive_title',
        'type'        => 'text',
        'title'       => esc_html__('Form Archive Title', 'humane'),
        'default'     => esc_html__('Donation Forms', 'humane'),
      ),
    )
  );

endif;



// ------------------------------
// Events Settings
// ------------------------------


if ( class_exists( 'Tribe__Events__Main' ) ):

  $options[]   = array(
    'name'     => 'xt_events_settigs',
    'title'    => esc_html__('Events Settings', 'humane'),
    'icon'     => 'fa fa-calendar',
    'fields'   => array(

      array(
        'id'        => 'events_layout',
        'type'      => 'image_select',
        'title'     => esc_html__('Events Page Layout', 'humane'),
        'desc'      => esc_html__('Choose a layout for your events page, It will also work on few others event pages.', 'humane'),
        'options'   => array(
          'full_width'  => esc_url( get_template_directory_uri().'/assets/images/admin/full-width.png' ),
          'left'        => esc_url( get_template_directory_uri().'/assets/images/admin/left.png' ),
          'right'       => esc_url( get_template_directory_uri().'/assets/images/admin/right.png' ),
        ),
        'radio'     => true,
        'default'   => 'right'
      ),
    )
  );

endif;

// ------------------------------
// WooCommerce Settings
// ------------------------------


if ( class_exists( 'woocommerce' ) ):

  $options[]   = array(
    'name'     => 'ch_woocommerce_settigs',
    'title'    => esc_html__('WooCommerce Settings', 'humane'),
    'icon'     => 'fa fa-shopping-cart',
    'fields'   => array(

      array(
        'id'        => 'ch_shop_layout',
        'type'      => 'image_select',
        'title'     => esc_html__('Shop Page Layout', 'humane'),
        'desc'      => esc_html__('Choose a layout for your shop page, It will also work on few others WooCommerce pages.', 'humane'),
        'options'   => array(
          'full_width'  => esc_url( get_template_directory_uri().'/assets/images/admin/full-width.png' ),
          'left'        => esc_url( get_template_directory_uri().'/assets/images/admin/left.png' ),
          'right'       => esc_url( get_template_directory_uri().'/assets/images/admin/right.png' ),
        ),
        'radio'     => true,
        'default'   => 'right'
      ),
      array(
        'id'        => 'ch_product_layout',
        'type'      => 'image_select',
        'title'     => esc_html__('Product Page Layout', 'humane'),
        'desc'      => esc_html__('Choose a layout for your product page.', 'humane'),
        'options'   => array(
          'full_width'  => esc_url( get_template_directory_uri().'/assets/images/admin/full-width.png' ),
          'left'        => esc_url( get_template_directory_uri().'/assets/images/admin/left.png' ),
          'right'       => esc_url( get_template_directory_uri().'/assets/images/admin/right.png' ),
        ),
        'radio'     => true,
        'default'   => 'right'
      ),
      array(
        'id'          => 'ch_shop_number_of_products',
        'type'        => 'number',
        'title'       => esc_html__('Shop number of products', 'humane'),
        'desc'        => esc_html__('Number of products to show on the shop page, default 9 products.', 'humane'),
        'default'     => 9,
        'after'       => ' Products',
      ),
      array(
        'id'       => 'ch_shop_loop_column',
        'type'     => 'select',
        'title'    => esc_html__('Product column', 'humane'),
        'desc'     => esc_html__('Change number of products per row', 'humane'),
        'options'  => array(
          '1'  => esc_html__('1 column', 'humane'),
          '2'  => esc_html__('2 columns', 'humane'),
          '3'  => esc_html__('3 columns', 'humane'),
          '4'  => esc_html__('4 columns', 'humane'),
          '5'  => esc_html__('5 columns', 'humane'),
        ),
        'default'  => '3',
      ),
      array(
        'id'       => 'ch_related_per_page',
        'type'     => 'select',
        'title'    => esc_html__('Number of Related Products', 'humane'),
        'desc'     => esc_html__('Change number of products related products to show', 'humane'),
        'options'  => array(
          '1'  => esc_html__('1 Product', 'humane'),
          '2'  => esc_html__('2 Products', 'humane'),
          '3'  => esc_html__('3 Products', 'humane'),
          '4'  => esc_html__('4 Products', 'humane'),
          '5'  => esc_html__('5 Products', 'humane'),
          '6'  => esc_html__('6 Products', 'humane'),
          '7'  => esc_html__('7 Products', 'humane'),
        ),
        'default'  => '3',
      ),
      array(
        'id'      => 'ch_need_woo_zoom',
        'type'    => 'switcher',
        'title'   => esc_html__('Need Image Zoom?', 'humane'),
        'desc'    => esc_html__('Enable or disable image zooming. Default enable.', 'humane'),
        'default' => true
      ),
      array(
        'id'      => 'ch_need_woo_lightbox',
        'type'    => 'switcher',
        'title'   => esc_html__('Need Image Lightbox?', 'humane'),
        'desc'    => esc_html__('Enable or disable image lightbox. Default enable.', 'humane'),
        'default' => true
      ),
      array(
        'id'      => 'ch_need_woo_lightbox_slider',
        'type'    => 'switcher',
        'title'   => esc_html__('Need Image Gallery LightBox Slider?', 'humane'),
        'desc'    => esc_html__('Enable or disable image gallery lightbox slider. Default enable.', 'humane'),
        'default' => true
      ),
    )
  );

endif;


// ------------------------------
// General Setting                  -
// ------------------------------

$options[]      = array(
  'name'        => 'general_settings',
  'title'       => esc_html__('General Settings', 'humane'),
  'icon'        => 'cs-icon fa fa-lightbulb-o',

  // begin: fields

  'fields'      => array(
    array(
      'id'      => 'xt_need_preloader',
      'type'    => 'switcher',
      'title'   => esc_html__('Need Pre Loader', 'humane'),
    ),
    array(
      'id'      => 'xt_need_back_to_top',
      'type'    => 'switcher',
      'title'   => esc_html__('Need Back to Top', 'humane'),
      'default' => true,
    ),
  )
);


// ------------------------------
// Footer Setting                  -
// ------------------------------

$options[]      = array(
  'name'        => 'footer_settings',
  'title'       => esc_html__('Footer Settings', 'humane'),
  'icon'        => 'fa fa-chevron-circle-down',

  // begin: fields
  'fields'      => array(
    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => sprintf( '<h3>%s</h3>', esc_html__('Footer', 'humane') ),
    ),
    array(
      'id'        => 'footer_top_space',
      'type'      => 'slider',
      'default'   => 60,
      'title'     => esc_html__( 'Footer top paddings', 'humane' ),
      'options'   => array(
        'step'    => 1,
        'min'     => 0,
        'max'     => 300,
      )
    ),
    array(
      'id'        => 'footer_bottom_space',
      'type'      => 'slider',
      'default'   => 45,
      'title'     => esc_html__( 'Footer bottom paddings', 'humane' ),
      'options'   => array(
        'step'    => 1,
        'min'     => 0,
        'max'     => 300,
      )
    ),
    array(
      'id'             => 'footer_widget_column',
      'type'           => 'select',
      'title'          => esc_html__('Footer Widgets Columns', 'humane'),
      'options'        => array(
        '6'    => '2 Columns',
        '4'    => '3 Columns',
        '3'    => '4 Columns',
      ),
      'default'        => '3',
      'default_option' => esc_html__('Select an option', 'humane'),
    ),
    array(
      'id'      => 'footer_background_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Footer Background Color', 'humane'),
      'default' => '#041025',
    ),
    array(
      'id'      => 'footer_content_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Footer widget Content Color', 'humane'),
      'default' => '#ffffff',
    ),
    array(
      'id'      => 'footer_link_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Footer widget Link Color', 'humane'),
      'default' => '#ffffff',
    ),
    array(
      'id'      => 'footer_link_hover_color',
      'type'    => 'color_picker',
      'title'   => esc_html__('Footer Link Hover Color', 'humane'),
      'default' => '#fc2c62',
    ),
    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => sprintf( '<h3>%s</h3>', esc_html__('Bottom Bar', 'humane') ),
    ),
    array(
      'id'      => 'need_footer_bottom_bar',
      'type'    => 'switcher',
      'title'   => esc_html__('Need Footer Bottom', 'humane'),
      'default' => true
    ),
    array(
      'id'        => 'bottom_bar_top_bottom_space',
      'type'      => 'slider',
      'default'   => 35,
      'title'     => esc_html__( 'Footer top & bottom paddings', 'humane' ),
      'dependency'      => array( 'need_footer_bottom_bar', '==', true ),
      'options'   => array(
        'step'    => 1,
        'min'     => 0,
        'max'     => 100,
      )
    ),
    array(
      'id'         => 'footer_text',
      'type'       => 'textarea',
      'title'      => esc_html__('Footer Text', 'humane'),
      'default'    => esc_html__('&copy; Copyright Humane 2018', 'humane'),
      'sanitize'   => false,
      'dependency' => array( 'need_footer_bottom_bar', '==', true ),
      'attributes' => array(
          'style'    => 'min-height: 17px; line-height: 12px; padding: 10px 6px 0 6px;'
        ),
    ),
    array(
      'id'          => 'bottom_bar_border_color',
      'type'        => 'color_picker',
      'title'       => esc_html__('Footer Border Color', 'humane'),
      'dependency'  => array( 'need_footer_bottom_bar', '==', true ),
      'default'     => '#1e3051',
    ),
  ),
);


CSFramework::instance( $settings, $options );

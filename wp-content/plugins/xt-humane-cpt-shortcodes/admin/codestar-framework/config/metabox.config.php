<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();


// -----------------------------------------
// Page Side Metabox Options               -
// -----------------------------------------

$options[]    = array(
  'id'        => '_xt_page_side_options',
  'title'     => esc_html__('Page Settings', 'humane'),
  'post_type' => 'page',
  'context'   => 'side',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => '_ep_page_side_options_fields',
      'fields' => array(

        array(
          'id'        => 'page_layout',
          'type'      => 'image_select',
          'title'     => esc_html__('Page Layout', 'humane' ),
          'help'      => esc_html__('Default box layout, You can also select full screen layout.', 'humane'),
          'options'   => array(
            'full_screen' => esc_url( get_template_directory_uri().'/assets/images/admin/full-width-page.png' ),
            'grid'        => esc_url( get_template_directory_uri().'/assets/images/admin/box-layout-page.png' ),
          ),
          'default'    => 'grid',
        ),
        array(
          'id'      => 'need_page_title',
          'type'    => 'switcher',
          'title'   => esc_html__('Need Page Title ?', 'humane'),
          'help'    => esc_html__('Page title settings avaiable on theme option.', 'humane'),
        ),
        array(
          'id'          => 'page_sidebar_enable',
          'title'       => esc_html__('Need Sidebar?', 'humane' ),
          'type'        => 'switcher',
          'help'        => esc_html__('Set off, if you don\'t need sidebar on this page.', 'humane'),
          'default'     => false,
        ),
        array(
          'id'          => 'page_sidebar_position',
          'type'        => 'image_select',
          'title'       => esc_html__('Page Sidebar Position', 'humane' ),
          'desc'        => esc_html__('Options: Left, Right or No Sidebar.', 'humane' ),
          'options'     => array(
            'left'        => esc_url( get_template_directory_uri().'/assets/images/admin/left.png' ),
            'right'       => esc_url( get_template_directory_uri().'/assets/images/admin/right.png' ),
            'no_sidebar'  => esc_url( get_template_directory_uri().'/assets/images/admin/full-width.png' ),
          ),
          'default'     => 'no_sidebar',
          'dependency'  => array( 'page_sidebar_enable', '!=', '' ),
        ),
        array(
          'id'          => 'page_choose_sidebar',
          'type'        => 'select',
          'title'       => esc_html__('Select a sidebar for this plage.', 'humane' ),
          'help'        => esc_html__('Go to theme option for generating new sidebars.', 'humane' ),
          'options'     => humane_sidebars_list_on_option(),
          'default'     => 'sidebar-1',
          'dependency'  => array( 'page_sidebar_position_no_sidebar', '!=', 'true' ),
        ),
      ),
    ),

  ),
);


// -----------------------------------------
// Sider Metabox Options               -
// -----------------------------------------

$options[]    = array(
  'id'        => '_xt_sider_options',
  'title'     => esc_html__('Slider Options', 'humane'),
  'post_type' => 'xt_theme_slider',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'xt_slider_options_fields',
      'fields' => array(

        array(
          'id'      => 'slider_btn_text', 
          'type'    => 'text',
          'title'   => esc_html__('Slider Button Text', 'humane'),
          'desc'    => esc_html__('Add your slider button text', 'humane'),
          'default' => esc_html__('Donate Now', 'humane'),
        ),
        array(
          'id'      => 'slider_btn_url', 
          'type'    => 'text',
          'title'   => esc_html__('Slider Button URL', 'humane'),
          'desc'    => esc_html__('Add your slider button url', 'humane'),
        ),
      ),
    ),

  ),
);



// -----------------------------------------
// Testimonial Metabox Options               -
// -----------------------------------------

$options[]    = array(
  'id'        => '_xt_testimonial_options',
  'title'     => esc_html__('Testimonial Options', 'humane'),
  'post_type' => 'xt_testimonial',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'xt_testimonial_options_fields',
      'fields' => array(

        array(
          'id'      => 'clients_designation', 
          'type'    => 'text',
          'title'   => esc_html__('Client\'s Designation', 'humane'),
          'desc'    => esc_html__('Add your client\'s designation', 'humane'),
        ),
      ),
    ),

  ),
);



// -----------------------------------------
// VOLANTEERS Metabox Options               -
// -----------------------------------------

$options[]    = array(
  'id'        => '_xt_volanteer_options',
  'title'     => esc_html__('Volanteer\'s Options', 'humane'),
  'post_type' => 'xt_volanteers',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'xt_volanteer_options_fields',
      'fields' => array(
        array(
          'id'              => 'volanteer_all_social_icons',
          'type'            => 'group',
          'title'           => esc_html__('Volanteer\'s Social Icons', 'humane'),
          'button_title'    => esc_html__('Add New Social Icon', 'humane'),
          'accordion_title' => esc_html__('Add New Social Network', 'humane'),
          'fields'          => array(
            array(
              'id'      => 'volanteer_social_icons',
              'type'    => 'icon',
              'title'   => esc_html__('Select an Icon', 'humane'),
            ),
            array(
              'id'          => 'volanteer_social_icons_url',
              'type'        => 'text',
              'title'       => esc_html__('Social Network URL', 'humane')
            ),
          ),
          'default' => array(
            array(
              'volanteer_social_icons'       => 'fa fa-twitter',
              'volanteer_social_icons_url'   => '#',
            ),
            array(
              'volanteer_social_icons'       => 'fa fa-facebook',
              'volanteer_social_icons_url'   => '#',
            ),
            array(
              'volanteer_social_icons'       => 'fa fa-linkedin',
              'volanteer_social_icons_url'   => '#',
            ),           
          )
        ),
        array(
          'id'      => 'volunteer_designation', 
          'type'    => 'text',
          'title'   => esc_html__('Volunteer\'s Designation', 'humane'),
          'desc'    => esc_html__('Add your volunteer\'s designation', 'humane'),
        ),
      ),
    ),
  ),
);


// -----------------------------------------
// Project Metabox Options               -
// -----------------------------------------

$options[]    = array(
  'id'        => '_xt_project_options',
  'title'     => esc_html__('Project Options', 'humane'),
  'post_type' => 'xt_project',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(
    array(
      'name'   => 'xt_project_options_fields',
      'fields' => array(
        array(
          'id'      => 'project_details_link', 
          'type'    => 'text',
          'title'   => esc_html__('Project Details Link', 'humane'),
          'desc'    => esc_html__('Add your project details link. If you leave this field empty, it will link a lightbox of the project image.', 'humane'),
        ),
      ),
    ),
  ),
);


$options = apply_filters( 'humane_metabox_options', $options );

CSFramework_Metabox::instance( $options );

<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();

/**
 * Header
 */

$options[]            = array(
  'name'              => 'ch_header_options',
  'title'             => esc_html__('Header', 'humane'),
  'sections'          => array(
    array(
      'name'          => 'pre_header_section',
      'title'         => esc_html__('Pre Header Bar Settings', 'humane'),
      'settings'      => array( 

        array(
          'name'          => 'xt_pre_header_bg',
          'default'       => '#2a2f36',
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'color_picker',
              'desc'      => esc_html__('Default #2a2f36.', 'humane'),
              'title'     => esc_html__('Pre Header top bar background color', 'humane'),
            ),
          ),
        ),

        array(
          'name'          => 'pre_header_top_space',
          'default'       => 12,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 12 px.', 'humane'),
              'title'     => esc_html__('Pre header bar top space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),

        array(
          'name'          => 'pre_header_bottom_space',
          'default'       => 12,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 12 px.', 'humane'),
              'title'     => esc_html__('Pre header bar bottom space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),
      )
    ),
    array(
      'name'          => 'header_section',
      'title'         => esc_html__('Header Settings', 'humane'),
      'settings'      => array(  
        array(
          'name'          => 'header_top_space',
          'default'       => 30,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 30 px.', 'humane'),
              'title'     => esc_html__('Header top space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),
        array(
          'name'          => 'header_bottom_space',
          'default'       => 30,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 30 px.', 'humane'),
              'title'     => esc_html__('Header bottom space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),
      )
    ),
    array(
      'name'          => 'logo_section',
      'title'         => esc_html__('Logo Settings', 'humane'),
      'settings'      => array(
        array(
          'name'          => 'logo_max_height',
          'default'       => 45,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 45 px.', 'humane'),
              'title'     => esc_html__('Logo max height', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 200,
            ),
          ),
        ),
        array(
          'name'          => 'logo_top_space',
          'default'       => 17,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 17 px.', 'humane'),
              'title'     => esc_html__('Logo top space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),
        array(
          'name'          => 'logo_bottom_space',
          'default'       => 0,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 0 px.', 'humane'),
              'title'     => esc_html__('Logo bottom space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),
      )
    ),
    array(
      'name'          => 'menu_section',
      'title'         => esc_html__('Menu Settings', 'humane'),
      'settings'      => array(
        array(
          'name'          => 'menu_left_space',
          'default'       => 15,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 15 px.', 'humane'),
              'title'     => esc_html__('Menu item left space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),
        array(
          'name'          => 'menu_right_space',
          'default'       => 15,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'slider',
              'desc'      => esc_html__('Default 15 px.', 'humane'),
              'title'     => esc_html__('Menu item right space', 'humane'),
              'step'    => 1,
              'min'     => 1,
              'max'     => 100,
            ),
          ),
        ),
        array(
          'name'          => 'xt_dropdown_menu_width',
          'default'       => 250,
          'control'       => array(
            'type'        => 'cs_field',
            'options'     => array(
              'type'      => 'number',
              'desc'      => esc_html__('Default 250 px.', 'humane'),
              'title'     => esc_html__('Dropdown menu minimum width.', 'humane'),
            ),
          ),
        ),
      )
    ),

  ),    
);

CSFramework_Customize::instance( $options );

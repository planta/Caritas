<?php


/**
 * Slider Post Type
 */

if ( ! function_exists('humane_slider_post_type') ) {
	function humane_slider_post_type() {

		$labels = array(
			'name'                  => esc_html_x( 'Sliders', 'Post Type General Name', 'xt-humane-cpt-shortcode' ),
			'singular_name'         => esc_html_x( 'Slider', 'Post Type Singular Name', 'xt-humane-cpt-shortcode' ),
			'menu_name'             => esc_html__( 'Sliders', 'xt-humane-cpt-shortcode' ),
			'name_admin_bar'        => esc_html__( 'Post Type', 'xt-humane-cpt-shortcode' ),
			'archives'              => esc_html__( 'Slider Archives', 'xt-humane-cpt-shortcode' ),
			'attributes'            => esc_html__( 'Slider Attributes', 'xt-humane-cpt-shortcode' ),
			'parent_item_colon'     => esc_html__( 'Slider Item:', 'xt-humane-cpt-shortcode' ),
			'all_items'             => esc_html__( 'All Sliders', 'xt-humane-cpt-shortcode' ),
			'add_new_item'          => esc_html__( 'Add New Slider', 'xt-humane-cpt-shortcode' ),
			'add_new'               => esc_html__( 'Add New Slider', 'xt-humane-cpt-shortcode' ),
			'new_item'              => esc_html__( 'Add New Slider', 'xt-humane-cpt-shortcode' ),
			'edit_item'             => esc_html__( 'Edit Slider', 'xt-humane-cpt-shortcode' ),
			'update_item'           => esc_html__( 'Update Slider', 'xt-humane-cpt-shortcode' ),
			'view_item'             => esc_html__( 'View Slider', 'xt-humane-cpt-shortcode' ),
			'view_items'            => esc_html__( 'View Sliders', 'xt-humane-cpt-shortcode' ),
			'search_items'          => esc_html__( 'Search Slider', 'xt-humane-cpt-shortcode' ),
			'not_found'             => esc_html__( 'No Slider Found', 'xt-humane-cpt-shortcode' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'xt-humane-cpt-shortcode' ),
			'featured_image'        => esc_html__( 'Slider Image', 'xt-humane-cpt-shortcode' ),
			'set_featured_image'    => esc_html__( 'Set Slider image', 'xt-humane-cpt-shortcode' ),
			'remove_featured_image' => esc_html__( 'Remove Slider image', 'xt-humane-cpt-shortcode' ),
			'use_featured_image'    => esc_html__( 'Use as Slider featured image', 'xt-humane-cpt-shortcode' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'xt-humane-cpt-shortcode' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'xt-humane-cpt-shortcode' ),
			'items_list'            => esc_html__( 'Items list', 'xt-humane-cpt-shortcode' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'xt-humane-cpt-shortcode' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'xt-humane-cpt-shortcode' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Slider', 'xt-humane-cpt-shortcode' ),
			'description'           => esc_html__( 'Theme Slider', 'xt-humane-cpt-shortcode' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 80,
			'menu_icon'             => 'dashicons-slides',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'xt_theme_slider', $args );

	}
	add_action( 'init', 'humane_slider_post_type', 0 );
}


/**
 * Testimonial Post Type
 */

if ( ! function_exists('humane_testimonial_post_type') ) {
	function humane_testimonial_post_type() {

		$labels = array(
			'name'                  => esc_html_x( 'Testimonials', 'Post Type General Name', 'xt-humane-cpt-shortcode' ),
			'singular_name'         => esc_html_x( 'Testimonial', 'Post Type Singular Name', 'xt-humane-cpt-shortcode' ),
			'menu_name'             => esc_html__( 'Testimonial', 'xt-humane-cpt-shortcode' ),
			'name_admin_bar'        => esc_html__( 'Testimonial', 'xt-humane-cpt-shortcode' ),
			'archives'              => esc_html__( 'Testimonial Archives', 'xt-humane-cpt-shortcode' ),
			'attributes'            => esc_html__( 'Testimonial Attributes', 'xt-humane-cpt-shortcode' ),
			'parent_item_colon'     => esc_html__( 'Testimonial item:', 'xt-humane-cpt-shortcode' ),
			'all_items'             => esc_html__( 'All Testimonials', 'xt-humane-cpt-shortcode' ),
			'add_new_item'          => esc_html__( 'Add New Testimonial', 'xt-humane-cpt-shortcode' ),
			'add_new'               => esc_html__( 'Add Testimonial', 'xt-humane-cpt-shortcode' ),
			'new_item'              => esc_html__( 'New Testimonial', 'xt-humane-cpt-shortcode' ),
			'edit_item'             => esc_html__( 'Edit Testimonial', 'xt-humane-cpt-shortcode' ),
			'update_item'           => esc_html__( 'Update Testimonial', 'xt-humane-cpt-shortcode' ),
			'view_item'             => esc_html__( 'View Testimonial', 'xt-humane-cpt-shortcode' ),
			'view_items'            => esc_html__( 'View Testimonials', 'xt-humane-cpt-shortcode' ),
			'search_items'          => esc_html__( 'Search Testimonial', 'xt-humane-cpt-shortcode' ),
			'not_found'             => esc_html__( 'Not found', 'xt-humane-cpt-shortcode' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'xt-humane-cpt-shortcode' ),
			'featured_image'        => esc_html__( 'Featured Image', 'xt-humane-cpt-shortcode' ),
			'set_featured_image'    => esc_html__( 'Set testimonial featured image', 'xt-humane-cpt-shortcode' ),
			'remove_featured_image' => esc_html__( 'Remove testimonial featured image', 'xt-humane-cpt-shortcode' ),
			'use_featured_image'    => esc_html__( 'Use as Testimonial featured image', 'xt-humane-cpt-shortcode' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'xt-humane-cpt-shortcode' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this Testimonial', 'xt-humane-cpt-shortcode' ),
			'items_list'            => esc_html__( 'Testimonial list', 'xt-humane-cpt-shortcode' ),
			'items_list_navigation' => esc_html__( 'Testimonials list navigation', 'xt-humane-cpt-shortcode' ),
			'filter_items_list'     => esc_html__( 'Filter Testimonials list', 'xt-humane-cpt-shortcode' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Testimonial', 'xt-humane-cpt-shortcode' ),
			'description'           => esc_html__( 'Theme Testimonial', 'xt-humane-cpt-shortcode' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 80,
			'menu_icon'             => 'dashicons-id-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'xt_testimonial', $args );

	}
	add_action( 'init', 'humane_testimonial_post_type', 0 );
}

/**
 * Volunteer Post Type
 */


if ( ! function_exists('humane_volunteers_post_type') ) {
	function humane_volunteers_post_type() {

		$labels = array(
			'name'                  => esc_html_x( 'Volunteers', 'Post Type General Name', 'xt-humane-cpt-shortcode' ),
			'singular_name'         => esc_html_x( 'Volunteer', 'Post Type Singular Name', 'xt-humane-cpt-shortcode' ),
			'menu_name'             => esc_html__( 'Volunteer', 'xt-humane-cpt-shortcode' ),
			'name_admin_bar'        => esc_html__( 'Volunteer', 'xt-humane-cpt-shortcode' ),
			'archives'              => esc_html__( 'Volunteer Archives', 'xt-humane-cpt-shortcode' ),
			'attributes'            => esc_html__( 'Volunteer Attributes', 'xt-humane-cpt-shortcode' ),
			'parent_item_colon'     => esc_html__( 'Parent Volunteer:', 'xt-humane-cpt-shortcode' ),
			'all_items'             => esc_html__( 'All Volunteers', 'xt-humane-cpt-shortcode' ),
			'add_new_item'          => esc_html__( 'Add New Volunteer', 'xt-humane-cpt-shortcode' ),
			'add_new'               => esc_html__( 'Add New Volunteer', 'xt-humane-cpt-shortcode' ),
			'new_item'              => esc_html__( 'New Volunteer', 'xt-humane-cpt-shortcode' ),
			'edit_item'             => esc_html__( 'Edit Volunteer', 'xt-humane-cpt-shortcode' ),
			'update_item'           => esc_html__( 'Update Volunteer', 'xt-humane-cpt-shortcode' ),
			'view_item'             => esc_html__( 'View Volunteer', 'xt-humane-cpt-shortcode' ),
			'view_items'            => esc_html__( 'View Volunteers', 'xt-humane-cpt-shortcode' ),
			'search_items'          => esc_html__( 'Search Volunteer', 'xt-humane-cpt-shortcode' ),
			'not_found'             => esc_html__( 'Not found', 'xt-humane-cpt-shortcode' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'xt-humane-cpt-shortcode' ),
			'featured_image'        => esc_html__( 'Volunteer Featured Image', 'xt-humane-cpt-shortcode' ),
			'set_featured_image'    => esc_html__( 'Set Volunteer featured image', 'xt-humane-cpt-shortcode' ),
			'remove_featured_image' => esc_html__( 'Remove Volunteer featured image', 'xt-humane-cpt-shortcode' ),
			'use_featured_image'    => esc_html__( 'Use as Volunteer featured image', 'xt-humane-cpt-shortcode' ),
			'insert_into_item'      => esc_html__( 'Insert into Volunteer', 'xt-humane-cpt-shortcode' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this Volunteer', 'xt-humane-cpt-shortcode' ),
			'items_list'            => esc_html__( 'Volunteers list', 'xt-humane-cpt-shortcode' ),
			'items_list_navigation' => esc_html__( 'Volunteer list navigation', 'xt-humane-cpt-shortcode' ),
			'filter_items_list'     => esc_html__( 'Filter Volunteers list', 'xt-humane-cpt-shortcode' ),
		);

		$rewrite = array(
			'slug'                  => apply_filters( 'humane_volanteers_slug', 'xt_volanteers' ),
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);

		$args = array(
			'label'                 => esc_html__( 'Volunteer', 'xt-humane-cpt-shortcode' ),
			'description'           => esc_html__( 'Volunteer Description', 'xt-humane-cpt-shortcode' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'editor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 80,
			'menu_icon'             => 'dashicons-networking',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
		);
		register_post_type( 'xt_volanteers', $args );

	}
	add_action( 'init', 'humane_volunteers_post_type', 0 );
}

/**
 * Project Post Type
 */


if ( ! function_exists('humane_project_post_type') ) {
	function humane_project_post_type() {

		$labels = array(
			'name'                  => esc_html_x( 'Projects', 'Post Type General Name', 'xt-humane-cpt-shortcode' ),
			'singular_name'         => esc_html_x( 'Project', 'Post Type Singular Name', 'xt-humane-cpt-shortcode' ),
			'menu_name'             => esc_html__( 'Project', 'xt-humane-cpt-shortcode' ),
			'name_admin_bar'        => esc_html__( 'Project', 'xt-humane-cpt-shortcode' ),
			'archives'              => esc_html__( 'Project Archives', 'xt-humane-cpt-shortcode' ),
			'attributes'            => esc_html__( 'Project Attributes', 'xt-humane-cpt-shortcode' ),
			'parent_item_colon'     => esc_html__( 'Parent Project:', 'xt-humane-cpt-shortcode' ),
			'all_items'             => esc_html__( 'All Projects', 'xt-humane-cpt-shortcode' ),
			'add_new_item'          => esc_html__( 'Add New Project', 'xt-humane-cpt-shortcode' ),
			'add_new'               => esc_html__( 'Add New Project', 'xt-humane-cpt-shortcode' ),
			'new_item'              => esc_html__( 'New Project', 'xt-humane-cpt-shortcode' ),
			'edit_item'             => esc_html__( 'Edit Project', 'xt-humane-cpt-shortcode' ),
			'update_item'           => esc_html__( 'Update Project', 'xt-humane-cpt-shortcode' ),
			'view_item'             => esc_html__( 'View Project', 'xt-humane-cpt-shortcode' ),
			'view_items'            => esc_html__( 'View Projects', 'xt-humane-cpt-shortcode' ),
			'search_items'          => esc_html__( 'Search Project', 'xt-humane-cpt-shortcode' ),
			'not_found'             => esc_html__( 'Not found', 'xt-humane-cpt-shortcode' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'xt-humane-cpt-shortcode' ),
			'featured_image'        => esc_html__( 'Project Featured Image', 'xt-humane-cpt-shortcode' ),
			'set_featured_image'    => esc_html__( 'Set Project featured image', 'xt-humane-cpt-shortcode' ),
			'remove_featured_image' => esc_html__( 'Remove Project featured image', 'xt-humane-cpt-shortcode' ),
			'use_featured_image'    => esc_html__( 'Use as Project featured image', 'xt-humane-cpt-shortcode' ),
			'insert_into_item'      => esc_html__( 'Insert into Project', 'xt-humane-cpt-shortcode' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this Project', 'xt-humane-cpt-shortcode' ),
			'items_list'            => esc_html__( 'Projects list', 'xt-humane-cpt-shortcode' ),
			'items_list_navigation' => esc_html__( 'Project list navigation', 'xt-humane-cpt-shortcode' ),
			'filter_items_list'     => esc_html__( 'Filter Projects list', 'xt-humane-cpt-shortcode' ),
		);

		$rewrite = array(
			'slug'                  => apply_filters( 'humane_projects_slug', 'xt_project' ),
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);

		$args = array(
			'label'                 => esc_html__( 'Project', 'xt-humane-cpt-shortcode' ),
			'description'           => esc_html__( 'Project Description', 'xt-humane-cpt-shortcode' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'editor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 80,
			'menu_icon'             => 'dashicons-images-alt2',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
		);
		register_post_type( 'xt_project', $args );

	}
	add_action( 'init', 'humane_project_post_type', 0 );
	

	/**
	 * Portfolio post type Taxanomy
	 */
	function humane_projects_taxonomy() {
	    // Custom taxanomy for Portfolio Item 
	    register_taxonomy(
	        'xt_project_cat',  
	        'xt_project',                  
	        array(
	            'hierarchical'          => true,
	            'label'                 => esc_html__( 'Project Category', 'xt-humane-cpt-shortcode' ),
	            'query_var'             => true,
	            'show_admin_column'     => true,
	            'rewrite'               => array(
	                'slug'              => 'project-category', 
	                'with_front'    	=> true 
	            )
	        )
	    );
	}
	add_action( 'init', 'humane_projects_taxonomy');


}
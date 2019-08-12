<?php

/**
 * Check a plugin activate
 */

if( !function_exists('humane_plugin_active') ){
	function humane_plugin_active( $plugin ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( is_plugin_active( $plugin ) ) {
			return true;
		}

		return false;
	}
}


/**
 * Post Type column post ID
 */


add_action( 'init', 'humane_adding_post_id_columns_to_our_post_types' );

if(!function_exists('humane_adding_post_id_columns_to_our_post_types')){
	function humane_adding_post_id_columns_to_our_post_types(){
		$post_types = array( 'xt_theme_slider', 'xt_gallery', 'xt_testimonial', 'xt_volanteers' );

		foreach( $post_types as $post_type ) {
			add_action( 'manage_' . $post_type . '_posts_custom_column', 'humane_cutom_columns_content', 10, 2 );
			add_filter( 'manage_' . $post_type . '_posts_columns', 'humane_cutom_columns_head', 20 );        
		}
	}
}

if(!function_exists('humane_cutom_columns_head')){
	function humane_cutom_columns_head( $columns ) {

	    $columns['xt_post_id'] = esc_html__( 'ID', 'xt-humane-cpt-shortcode' );

	    return $columns;

	}
}

if(!function_exists('humane_cutom_columns_content')){
	function humane_cutom_columns_content( $column_name, $id ) {

	    if ( 'xt_post_id' == $column_name ) {

	        echo esc_attr( $id );

	    }

	}
} 


/**
 * Set Progress Bar color JS variable
 */

if( !function_exists('humane_progress_bar_color') ){
	function humane_progress_bar_color(){
		$xt_primary_color = cs_get_option( 'xt_primary_color' );
		?>
		<script>
			var cause_progress_color = "<?php echo esc_attr( $xt_primary_color ); ?>";
		</script>
		<?php
	}
}
add_action( 'wp_footer', 'humane_progress_bar_color' );



/**
 * Safari body class
 */

add_filter( 'body_class', 'humane_safari_ios_body_class' );
if(!function_exists('humane_safari_ios_body_class')){
	function humane_safari_ios_body_class($classes){

	    global $is_safari;

	    if ( ! wp_is_mobile() && $is_safari ) {
	        $classes[] = 'humane-safari';
	    }

	    if( wp_is_mobile() && $is_safari ){
	        $classes[] = 'humane-ios-safari';
	    }

	    return $classes;
	}
}



/**
 * Show Resize images
 * 
 * $thumb_id : thumbnail id, integer
 * $width : image width, integer
 * $height : image height, integer
 * $crop : image crop, boolean, default - true
 * $alt : image alt, string
 */


if(!function_exists('humane_get_aq_resize_thumbnail')){
	function humane_get_aq_resize_thumbnail( $width, $height, $thumb_id = null, $crop = null, $alt = null ){
		if( $thumb_id == null ){
			$thumb_id = get_post_thumbnail_id();
		}
		if( $crop == null ){
			$crop = true;
		}
		if( $alt != null ){
			$alt = get_the_title();
		}
		
		$img_url = wp_get_attachment_url( $thumb_id, 'full' );
		$resize_img_url = humane_aq_resize( $img_url, $width, $height, $crop );

		if( $resize_img_url ){
			return sprintf( '<img src="%s"'.( $alt ? ' alt="%s"' : '' ).'>', esc_url( $resize_img_url ), esc_html( $alt ) );
		}

	}
}


/**
 * Link Pages Bootstrap
 * @author toscha
 * @link http://wordpress.stackexchange.com/questions/14406/how-to-style-current-page-number-wp-link-pages
 * @param  array $args
 * @return void
 * Modification of wp_link_pages() with an extra element to highlight the current page.
 */

if( !function_exists('humane_bootstrap_link_pages') ):
	function humane_bootstrap_link_pages( $args = array () ) {
	    $defaults = array(
			'before' 			=> '<nav class="xt_theme_paignation"><ul class="pager">',
			'after' 			=> '</ul></nav>',
			'before_link' 		=> '<li>',
			'after_link' 		=> '</li>',
			'current_before' 	=> '<li class="active">',
			'current_after' 	=> '</li>',
	        'link_before' 		=> '',
	        'link_after'  		=> '',
	        'pagelink'    		=> '%',
	        'echo'        		=> 1
	    );
	    $r = wp_parse_args( $args, $defaults );
	    $r = apply_filters( 'wp_link_pages_args', $r );
	    extract( $r, EXTR_SKIP );
	    global $page, $numpages, $multipage, $more, $pagenow;
	    if ( ! $multipage )
	    {
	        return;
	    }
	    $output = $before;
	    for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
	    {
	        $j       = str_replace( '%', $i, $pagelink );
	        $output .= ' ';
	        if ( $i != $page || ( ! $more && 1 == $page ) )
	        {
	            $output .= "{$before_link}" . _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>{$after_link}";
	        }
	        else
	        {
	            $output .= "{$current_before}{$link_before}<a>{$j}</a>{$link_after}{$current_after}";
	        }
	    }
	    print $output . $after;
	}
endif;

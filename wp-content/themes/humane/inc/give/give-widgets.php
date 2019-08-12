<?php

/**
 * Give shortcodes widgets
 */



/**
 * Register widgets
 */

if(!function_exists('humane_register_give_widgets')){
	function humane_register_give_widgets() {
	    register_widget( 'humane_give_donation_list_widget' );
	    register_widget( 'humane_give_donation_tag_cat_widget' );
	}
}

add_action( 'widgets_init', 'humane_register_give_widgets' );


/**
 * Give Donation Forms List Widget
 */

if(!class_exists('humane_give_donation_list_widget')) {
	class humane_give_donation_list_widget extends WP_Widget {

		/* Widget name and description */
		
		function __construct() {
			parent::__construct(
				'humane_give_donation_list_widget',
				esc_html__( 'Give Donation Forms',  'humane' ),
				array( 'description' => esc_html__( 'Give Donation Forms List',  'humane' ), )
			);
		}


		/* Front-end display of widget */

		public function widget( $args, $instance ) {

			extract( $args );
			extract( $instance );

			echo  wp_kses_post($before_widget);

			if ( ! empty( $title ) ) {
				echo  wp_kses_post($before_title . apply_filters( 'widget_title', $title ). $after_title);
			}

			echo do_shortcode( '[xt_give_donation_list_widget post="'. $post_number .'" order="'. $order .'" orderby="'. $orderby .'" cause_stats="'. $cause_stats .'" show_image="'. $show_image .'"]' );

			echo  wp_kses_post($after_widget);
		}


		/* Back-end widget form */

		public function form( $instance ) {
			extract( $instance );
			if( !isset( $post_number ) ){
				$post_number = 5;
			}
			if( !isset( $order ) ){
				$order = 'ASC';
			}
			if( !isset( $orderby ) ){
				$orderby = 'date';
			}
			if( !isset( $cause_stats ) ){
				$cause_stats = 'on';
			}
			if( !isset( $cause_progress_bar ) ){
				$cause_progress_bar = 'on';
			}
			if( !isset( $show_image ) ){
				$show_image = 'on';
			}
			?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'humane' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php if( isset( $title ) ) echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><?php esc_html_e( 'Number of Forms:', 'humane' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="post_number" value="<?php if( isset( $post_number ) ) echo esc_attr( $post_number ); ?>">
				<span class="ep-widget-description"><?php esc_html_e( 'Default show 5 forms.', 'humane' ); ?></span>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Forms Orderby:', 'humane' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'orderby' ) ); ?>">
					<option value="none" <?php selected( $orderby, 'none' ) ?>><?php esc_html_e( 'None', 'humane' ); ?></option>
					<option value="ID" <?php selected( $orderby, 'ID' ) ?>><?php esc_html_e( 'ID', 'humane' ); ?></option>
					<option value="author" <?php selected( $orderby, 'author' ) ?>><?php esc_html_e( 'Author', 'humane' ); ?></option>
					<option value="title" <?php selected( $orderby, 'title' ) ?>><?php esc_html_e( 'Title', 'humane' ); ?></option>
					<option value="name" <?php selected( $orderby, 'name' ) ?>><?php esc_html_e( 'Name', 'humane' ); ?></option>
					<option value="date" <?php selected( $orderby, 'date' ) ?>><?php esc_html_e( 'Date', 'humane' ); ?></option>
					<option value="rand" <?php selected( $orderby, 'rand' ) ?>><?php esc_html_e( 'Rand', 'humane' ); ?></option>
					<option value="menu_order" <?php selected( $orderby, 'menu_order' ) ?>><?php esc_html_e( 'Menu order', 'humane' ); ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Forms order:', 'humane' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'order' ) ); ?>">
					<option value="ASC" <?php selected( $order, 'ASC' ) ?>><?php esc_html_e( 'Ascending', 'humane' ); ?></option>
					<option value="DESC" <?php selected( $order, 'DESC' ) ?>><?php esc_html_e( 'Descending', 'humane' ); ?></option>
				</select>
			</p>

			<p>
				<span style="display: block"><?php esc_html_e( 'Show Forms Image', 'humane' ); ?></span>
				<input class="checkbox" type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_image' ) ); ?>" <?php checked( $show_image, 'on' ) ?>>
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php esc_html_e( 'Yes', 'humane' ); ?></label>
			</p>

			<p>
				<span style="display: block"><?php esc_html_e( 'Show Donation Stats', 'humane' ); ?></span>
				<input class="checkbox" type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'cause_stats' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cause_stats' ) ); ?>" <?php checked( $cause_stats, 'on' ) ?>>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cause_stats' ) ); ?>"><?php esc_html_e( 'Yes', 'humane' ); ?></label>
			</p>


			<?php 
		}

		/* Sanitize widget form values as they are saved */

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] 				= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['post_number'] 		= ( ! empty( $new_instance['post_number'] ) ) ? strip_tags( $new_instance['post_number'] ) : '';
			$instance['order'] 				= ( ! empty( $new_instance['order'] ) ) ? strip_tags( $new_instance['order'] ) : '';
			$instance['orderby'] 			= ( ! empty( $new_instance['orderby'] ) ) ? strip_tags( $new_instance['orderby'] ) : '';
			$instance['cause_stats'] 		= ( ! empty( $new_instance['cause_stats'] ) ) ? strip_tags( $new_instance['cause_stats'] ) : '';
			$instance['show_image'] 		= ( ! empty( $new_instance['show_image'] ) ) ? strip_tags( $new_instance['show_image'] ) : '';

			return $instance;
		}

	}
}


/**
 * Give Donation tags / categories list widget
 */

if(!class_exists('humane_give_donation_tag_cat_widget')) {
	class humane_give_donation_tag_cat_widget extends WP_Widget {

		/* Widget name and description */
		
		function __construct() {
			parent::__construct(
				'humane_give_donation_tag_cat_widget',
				esc_html__( 'Give Donation tags / categories',  'humane' ),
				array( 'description' => esc_html__( 'Give Donation tags / categories list',  'humane' ), )
			);
		}


		/* Front-end display of widget */

		public function widget( $args, $instance ) {

			extract( $args );
			extract( $instance );

			echo wp_kses_post($before_widget);

			if ( ! empty( $title ) ) {
				echo wp_kses_post( $before_title . apply_filters( 'widget_title', $title ). $after_title );
			}

			echo wp_kses_post( do_shortcode( '[xt_give_donation_tag_cat post="'. $post_number .'" hide_empty="'. $hide_empty .'" taxonomy="'. $taxonomy .'"]' ) );

			echo wp_kses_post($after_widget);
		}


		/* Back-end widget form */

		public function form( $instance ) {
			extract( $instance );
			if( !isset( $post_number ) ){
				$post_number = 5;
			}
			if( !isset( $hide_empty ) ){
				$hide_empty = false;
			}
			if( !isset( $taxonomy ) ){
				$taxonomy = 'give_forms_category';
			}
			?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'humane' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php if( isset( $title ) ) echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><?php esc_html_e( 'Number of Categories / tags:', 'humane' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="post_number" value="<?php if( isset( $post_number ) ) echo esc_attr( $post_number ); ?>">
				<span class="ep-widget-description"><?php esc_html_e( 'Default show 5 forms.', 'humane' ); ?></span>
			</p>

			<p>
				<span style="display: block"><?php esc_html_e( 'Hide empty categories', 'humane' ); ?></span>
				<input class="checkbox" type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'hide_empty' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_empty' ) ); ?>" <?php if( $hide_empty && $hide_empty == 'on' ) echo 'checked';?>>
				<label for="<?php echo esc_attr( $this->get_field_id( 'hide_empty' ) ); ?>"><?php esc_html_e( 'Yes', 'humane' ); ?></label>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>"><?php esc_html_e( 'Taxonomy:', 'humane' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'taxonomy' ) ); ?>">
					<option value="give_forms_category" <?php selected( $taxonomy, 'give_forms_category' ) ?>><?php esc_html_e( 'give_forms_category', 'humane' ); ?></option>
					<option value="give_forms_tag" <?php selected( $taxonomy, 'give_forms_tag' ) ?>><?php esc_html_e( 'give_forms_tag', 'humane' ); ?></option>
				</select>
			</p>


			<?php 
		}

		/* Sanitize widget form values as they are saved */

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] 				= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['post_number'] 		= ( ! empty( $new_instance['post_number'] ) ) ? strip_tags( $new_instance['post_number'] ) : '';
			$instance['hide_empty'] 		= ( ! empty( $new_instance['hide_empty'] ) ) ? strip_tags( $new_instance['hide_empty'] ) : '';
			$instance['taxonomy'] 			= ( ! empty( $new_instance['taxonomy'] ) ) ? strip_tags( $new_instance['taxonomy'] ) : '';

			return $instance;
		}

	}
}
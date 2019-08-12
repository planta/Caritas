<?php

/**
 * Theme Custom Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Register widgets
 */

if(!function_exists('humane_register_theme_custom_widget')){
	function humane_register_theme_custom_widget() {
	    register_widget( 'humane_volunteer_cta_widget' );
	}
}

add_action( 'widgets_init', 'humane_register_theme_custom_widget' );


/**
 * Call to action Widget
 */


if(!class_exists('humane_volunteer_cta_widget')) {
	class humane_volunteer_cta_widget extends WP_Widget {

		/* Widget name and description */
		
		function __construct() {
			parent::__construct(
				'humane_volunteer_cta_widget',
				esc_html__( 'Volunteer Call to Action',  'xt-humane-cpt-shortcode' ),
				array( 'description' => esc_html__( 'Humane theme call to action widget.',  'xt-humane-cpt-shortcode' ), )
			);
		}


		/* Front-end display of widget */

		public function widget( $args, $instance ) {

			extract( $args );
			extract( $instance );

			echo $before_widget;

			?>
				<div class="charity-volunteer-ctc-widget charity-volunteer call-to-action shadow charity-volunteer-call-to-action-no-img">
					<div class="charity-volunteer-inner">
						<div class="charity-volunteer-content-box">

							<?php if ( ! empty( $title ) ): ?>
								<h2><?php echo esc_html( apply_filters( 'widget_title', $title ) ); ?></h2>
							<?php endif; ?>

							<?php if ( ! empty( $action_content ) ): ?>
								<div class="call-to-action-text"><?php echo esc_html( $action_content ); ?></div>
							<?php endif; ?>

							<?php if ( ! empty( $btn_text ) ): ?>
								<a class="action-btn shadow shadow-hover" href="<?php echo esc_url( $btn_url ); ?>" target="_self" title="<?php echo esc_html( $btn_text ); ?>"><?php echo esc_html( $btn_text ); ?></a>
							<?php endif; ?>		
						</div>
					</div>
				</div>
			<?php

			echo $after_widget;
		}


		/* Back-end widget form */

		public function form( $instance ) {
			extract( $instance );
			if( !isset( $action_content ) ){
				$action_content = '';
			}
			if( !isset( $btn_text ) ){
				$btn_text = '';
			}
			if( !isset( $btn_url ) ){
				$btn_url = '';
			}
			?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'xt-humane-cpt-shortcode' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php if( isset( $title ) ) echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'action_content' ) ); ?>"><?php esc_html_e( 'Content:', 'xt-humane-cpt-shortcode' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'action_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'action_content' ) ); ?>"><?php if( isset( $action_content ) ) echo esc_attr( $action_content ); ?></textarea>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>"><?php esc_html_e( 'Button Text:', 'xt-humane-cpt-shortcode' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_text' ) ); ?>" type="text" value="<?php if( isset( $btn_text ) ) echo esc_attr( $btn_text ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'btn_url' ) ); ?>"><?php esc_html_e( 'Button URL:', 'xt-humane-cpt-shortcode' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'btn_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_url' ) ); ?>" type="text" value="<?php if( isset( $btn_url ) ) echo esc_attr( $btn_url ); ?>">
			</p>


			<?php 
		}

		/* Sanitize widget form values as they are saved */

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] 			= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['action_content'] = ( ! empty( $new_instance['action_content'] ) ) ? strip_tags( $new_instance['action_content'] ) : '';
			$instance['btn_text'] 		= ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
			$instance['btn_url'] 		= ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';

			return $instance;
		}

	}
}
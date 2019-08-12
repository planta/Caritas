<?php
/**
 * The template for displaying form content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/single-give-form/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Fires in single form template, before the form.
 *
 * Allows you to add elements before the form.
 *
 * @since 1.0
 */
do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>
	<div id="give-form-<?php the_ID(); ?>-content" <?php post_class( array( 'ch-blog', 'ch-causes' ) ); ?>>

		<?php
		/**
		 * Fires in single form template, before the form summary.
		 *
		 * Allows you to add elements before the form summary.
		 *
		 * @since 1.0
		 */
		do_action( 'humane_give_before_single_form_summary' );
		?>

		<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'blog-inner item shadow' ); ?>">
		
			<?php if( has_post_thumbnail() && get_the_post_thumbnail_url() ) : ?>
				<div class="blog-banner">
					<?php
						if( is_single() ){
							the_post_thumbnail('humane-campaign-thumb', array('class' => 'img-responsive', 'alt' => get_the_title() ) );
						}else{
							printf( '<a href="%s">%s</a>', get_the_permalink(), get_the_post_thumbnail( get_the_id(), 'humane-blog-thumb', array( 'class' => 'img-responsive', 'alt' => get_the_title() ) ) );
						}
					?>
				</div>
			<?php endif; ?>	

			<div class="blog-content humane-campaign-content">

				<?php
				/**
				 * Fires in single form template, to the form summary.
				 *
				 * Allows you to add elements to the form summary.
				 *
				 * @since 1.0
				 */
				do_action( 'give_single_form_summary' );
				?>

			</div>

		</div>
		<!-- .summary -->

		<?php
		/**
		 * Fires in single form template, after the form summary.
		 *
		 * Allows you to add elements after the form summary.
		 *
		 * @since 1.0
		 */
		do_action( 'humane_give_after_single_form_summary' );
		?>

	</div><!-- #give-form-<?php the_ID(); ?> -->

<?php
/**
 * Fires in single form template, after the form.
 *
 * Allows you to add elements after the form.
 *
 * @since 1.0
 */
do_action( 'give_after_single_form' );
?>

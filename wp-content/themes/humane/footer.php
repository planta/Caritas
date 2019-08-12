<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Humane
 */

?>
		<?php do_action( 'humane_after_content' ) ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer ch-footer footer-bg">
	
		<?php if ( is_active_sidebar( 'footer-widgets' ) ): ?>
			<div class="<?php echo esc_attr( apply_filters( 'humane_footer_widget_container_class', 'container' ) ); ?>">
				<div class="row site-footer-inner">
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
				</div> <!-- end .row -->
				<hr class="ch-hr">
			</div> <!-- end .container -->
		<?php endif; ?>
		<?php do_action( 'humane_footer_bottom_bar' );?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

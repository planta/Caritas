<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Humane
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr( apply_filters( 'humane_content_area_class', 'col-md-8' ) ); ?>">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'campaign' );

			if( cs_get_option('show_campaign_updates') == true ){
				echo humane_get_campaign_update();
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('campaign');
get_footer();

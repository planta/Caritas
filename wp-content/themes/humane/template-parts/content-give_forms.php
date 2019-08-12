<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Humane
 */

?>

<?php 
	$give_form_content 		= get_post_meta( get_the_id(), '_give_form_content', true );
	$display_label_field 	= give_get_meta( get_the_id(), '_give_checkout_label', true );
	$display_label       	= ( ! empty( $display_label_field ) ? $display_label_field : esc_html__( 'Donate Now', 'humane' ) );
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'ch-blog', 'ch-causes', 'ch-give-form' ) ); ?>>
	<div class="blog-inner item shadow">
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
			<header class="entry-header">
				<?php
					if ( is_single() ) :
						the_title( '<h2 class="entry-title">', '</h2>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>

				<?php echo do_shortcode( '[give_goal id="'. get_the_id() .'" show_text="true" show_bar="true"]' );?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php

					if( $give_form_content ){
						echo wpautop( wp_trim_words( $give_form_content, 60 ) );
					}

					echo do_shortcode( '[give_form id="'.get_the_id().'" show_title="false" show_goal="false" show_content="none" display_style="modal"]' );


					if( function_exists('humane_bootstrap_link_pages') ){
						humane_bootstrap_link_pages( array(
							'before' => '<nav class="xt_theme_paignation xt-theme-page-links">' . esc_html__( 'Pages:', 'humane' ) . '<ul class="pager">',
							'after'  => '</ul></nav>',
						) );
					}else{
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'humane' ),
							'after'  => '</div>',
						) );
					}
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php humane_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->

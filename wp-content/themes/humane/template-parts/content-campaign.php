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
	$campaign = '';
	if( function_exists('charitable_get_campaign') ){
		$campaign = charitable_get_campaign( get_the_ID() );
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'ch-blog', 'ch-causes', ( $campaign->has_ended() ? 'ch-campaign-ended' : '' ) ) ); ?>>
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

		<div class="cause-inner-content">
			<header class="entry-header">
				<?php
					if ( is_single() ) :
						the_title( '<h2 class="entry-title">', '</h2>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>

				<?php
					if( !is_singular( 'campaign' ) && function_exists('humane_charitable_template_campaign_progress_bar_default') ){
						humane_charitable_template_campaign_progress_bar_default( $campaign );
					}	
				?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					if( is_single() ){
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'humane' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					}else{
						the_excerpt();
					}

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

			<footer class="entry-footer no-padding">
				<?php 

					if( !is_singular( 'campaign' ) ){
						if( function_exists('charitable_template_campaign_loop_donate_link') ){
               				charitable_template_campaign_loop_donate_link( $campaign, array() );
               			}
                		if( $campaign->has_ended() ){
                			printf( '<a class="btn btn-border btn-lg" href="%s">%s</a>', esc_url(get_the_permalink()), esc_html( humane_cs_get_option( 'donate_button_text_expired', esc_html__( 'Details', 'humane' ) ) ) );
                		}
					}

				?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->

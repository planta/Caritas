<?php

/**
 * Give Donation Plugin Custom Shortcodes
 */

/**
 * Give Donate stats
 */

if ( class_exists( 'Give' ) ){
	add_shortcode( 'xt_give_donation_stats', 'humane_give_donation_stats_shortcode' );

	if( !function_exists('humane_give_donation_stats_shortcode') ){
		function humane_give_donation_stats_shortcode($atts){
			extract(shortcode_atts(array(
				'column'  						=> 3,
				'show_campaign_count'  			=> 'on',
				'show_campaign_donated_amount'  => 'on',
				'show_campaign_donors_count'  	=> 'on',
				'campaigns_text_singular'  		=> esc_html__( 'Campaign', 'xt-humane-cpt-shortcode' ),
				'campaigns_text_plural'  		=> esc_html__( 'Campaigns', 'xt-humane-cpt-shortcode' ),
				'donor_text_singular'  			=> esc_html__( 'Donor', 'xt-humane-cpt-shortcode' ),
				'donor_text_plural'  			=> esc_html__( 'Donors', 'xt-humane-cpt-shortcode' ),
				'donated_text'  				=> esc_html__( 'Donated', 'xt-humane-cpt-shortcode' ),
		    ), $atts));

		    $campaigns_count 	= wp_count_posts('give_forms');
		    $campaigns_count 	= $campaigns_count->publish;
			$campaigns_text  	= 1 == $campaigns_count ? $campaigns_text_singular : $campaigns_text_plural;
			$donated_amount 	= give_currency_filter( give_format_amount( give_get_earnings_by_date( null, null, null ) ) );
			$donors_count 		= count( Give()->donors->get_donors( array( 'number' => 0 ) ) );
			$donors_text  		= 1 == $donors_count ? $donor_text_singular : $donor_text_plural;


			if( $column ){
				$column = 12/$column;
				$column = 'col-md-'.$column . ' col-sm-4 ch-donation-stats-item-column';
			}

			$column = apply_filters( 'humane_donation_stats_grid_column', $column );

			ob_start();

		?>	
			<div class="xt-donation-stats">
				<div class="row">
			        <?php 
						if( $show_campaign_count == 'on' ){
							printf( '<div class="%s"><div class="ch-donation-stats-item shadow"><i class="fa fa-heart"></i><span class="ch-campaign-count ch-campaign-stats-count">%d</span><span class="ch-campaign-stats-text">%s</span></div></div>', esc_attr($column), $campaigns_count, $campaigns_text );
						}
						if( $show_campaign_donated_amount == 'on' ){
							printf( '<div class="%s"><div class="ch-donation-stats-item shadow"><i class="fa fa-money"></i><span class="ch-campaign-donated-amount ch-campaign-stats-count">%s</span><span class="ch-campaign-stats-text">%s</span></div></div>', esc_attr($column), $donated_amount, $donated_text );
						}
						if( $show_campaign_donors_count == 'on' ){
							printf( '<div class="%s"><div class="ch-donation-stats-item shadow"><i class="fa fa-users"></i><span class="ch-campaign-donors-count ch-campaign-stats-count">%s</span><span class="ch-campaign-stats-text">%s</span></div></div>', esc_attr($column), $donors_count, $donors_text );
						}
					?>
		        </div>
	        </div>

			<?php
		    return ob_get_clean();
		}
	}
}

/**
 * Give Donation Form Search Process
 */

add_action('wp_ajax_nopriv_humane_ajax_campaign_search','humane_ajax_give_donation_search');
add_action('wp_ajax_humane_ajax_give_donation_search','humane_ajax_give_donation_search');

if(!function_exists('humane_ajax_give_donation_search')){
	function humane_ajax_give_donation_search(){
		$args = array (
			'post_type' 		=> 'give_forms',
			'post_status' 		=> 'publish',
			'order' 			=> 'DESC',
			'orderby' 			=> 'date',
			's' 				=> $_POST['term'],
			'posts_per_page' 	=> apply_filters( 'humane_campaign_search_number_of_post', 10 ),
		);
		 
		$query = new WP_Query( $args );
		 
		if($query->have_posts()){
			echo '<ul>';
				while ($query->have_posts()) {
					$query->the_post();
					printf( '<li><a href="%s">%s</a></li>', esc_url( get_the_permalink() ), esc_html( get_the_title() ) );
				}
			echo '</ul>';
		}else{
			printf( '<li><a href="#">%s</a></li>', esc_html__( 'No result found.', 'xt-humane-cpt-shortcode' ) );
		}

		wp_reset_postdata();
		exit;
	}
}

/**
 * Give Campaign Search
 */

if ( class_exists( 'Give' ) ){
	add_shortcode( 'xt_give_campaign_search', 'humane_give_campaign_search_shortcode' );

	if( !function_exists('humane_give_campaign_search_shortcode') ){
		function humane_give_campaign_search_shortcode( $atts ){
			extract(shortcode_atts(array(
				'placeholder'  					=> esc_html__( 'Search...', 'xt-humane-cpt-shortcode' ),
				'before_search_title'  			=> esc_html__( 'Search Campaigns', 'xt-humane-cpt-shortcode' ),
				'before_search_subtitle'  		=> '',
				'before_search_img'  			=> '',
				'after_search_stats'  			=> 'on',
				'show_campaign_count'  			=> 'on',
				'show_campaign_donated_amount'  => 'on',
				'show_campaign_donors_count'  	=> 'on',
				'x_class'  						=> '',
		    ), $atts));

			$campaigns_count 	= wp_count_posts('give_forms');
		    $campaigns_count 	= $campaigns_count->publish;
			$campaigns_text  	= 1 == $campaigns_count ? esc_html__( 'Campaign', 'xt-humane-cpt-shortcode' ) : esc_html__( 'Campaigns', 'xt-humane-cpt-shortcode' );
			$donated_amount 	= give_currency_filter( give_format_amount( give_get_earnings_by_date( null, null, null ) ) );
			$donors_count 		= count( Give()->donors->get_donors( array( 'number' => 0 ) ) );
			$donors_text  		= 1 == $donors_count ? esc_html__( 'Donor', 'xt-humane-cpt-shortcode' ) : esc_html__( 'Donors', 'xt-humane-cpt-shortcode' );

			if( $before_search_img ){
				$before_search_img = wp_get_attachment_image( $before_search_img, 'full' );
			}

			add_action( 'wp_footer', 'humane_ajax_course_search_base' );
			
		    ob_start();
		    ?>
				<div class="ch-campaign-search text-center<?php echo esc_attr( $x_class ? ' '.$x_class : '' ); ?>">
					<div class="ch-campaign-before-search">
						<?php echo ( $before_search_img ? '<div class="ch-search-logo">'.$before_search_img.'</div>' : '' ); ?>
						<?php echo ( $before_search_title ? '<h2>'. esc_html( $before_search_title ) .'</h2>' : '' ); ?>
						<?php echo ( $before_search_subtitle ? '<h4>'. esc_html( $before_search_subtitle ) .'</h4>' : '' ); ?>
					</div>
					<form role="search" action="<?php echo esc_url( site_url('/') ); ?>" method="get" id="searchform">
						<fieldset>
							<div class="input-group">
								<?php if( is_search() ):?>
									<input class="form-control ch-give-donation-form-search-field" type="text" name="s" value="<?php echo esc_attr(apply_filters('the_search_query', get_search_query())); ?>"/>
								<?php else:?>
									<input class="form-control ch-give-donation-form-search-field" type="text" name="s" placeholder="<?php echo esc_attr( $placeholder ); ?>"/>
								<?php endif;?>
								<input type="hidden" name="post_type" value="give_forms" />
								<span class="input-group-btn">
									<button type="submit" id="ch-campaign-search-btn" class="btn btn-fill btn-lg"><i class="fa fa-search" aria-hidden="true"></i></button>
								</span>
							</div>
						</fieldset>
					</form>
					<div class="ch-campaign-ajax-search-result-area"><div class="ch-campaign-ajax-search-result-inner shadow"></div></div>
					<?php if( $after_search_stats == 'on' ): ?>
						<ul class="ch-campaign-search-donation-stats">
								<?php 
									if( $show_campaign_count == 'on' ){
										printf( '<li><i class="fa fa-heart"></i><span class="ch-campaign-count">%d</span> %s</li>', $campaigns_count, $campaigns_text );
									}
									if( $show_campaign_donated_amount == 'on' ){
										printf( '<li><i class="fa fa-money"></i><span class="ch-campaign-donated-amount">%s</span> %s</li>', $donated_amount, esc_html__( 'Donated', 'xt-humane-cpt-shortcode' ) );
									}
									if( $show_campaign_donors_count == 'on' ){
										printf( '<li><i class="fa fa-users"></i><span class="ch-campaign-donors-count">%s</span> %s</li>', $donors_count, $donors_text );
									}
								?>
						</ul>

					<?php endif; ?>
				</div>
		    <?php
		    return ob_get_clean();
		}
	}

}




/**
 * Give Donation Form ShortCode
 */


if ( class_exists( 'Give' ) ){
	add_shortcode( 'xt_give_donation_forms', 'humane_give_donation_causes_shortcode' );

	if( !function_exists('humane_give_donation_causes_shortcode') ){
		function humane_give_donation_causes_shortcode( $atts ){
			extract(shortcode_atts(array(
				'post'  				=> 6,
				'order' 				=> 'ASC',
				'orderby' 				=> 'date',
				'autoplay'				=> 'true',
				'items'					=> 3,
				'desktopsmall'			=> 3,
				'tablet'				=> 2,
				'mobile'				=> 1,
				'navigation'			=> 'true',
				'pagination'			=> 'false',
				'loop'					=> 'true',
				'column'				=> 3,
				'causes_categories'		=> '', // comma separated categories id
				'causes_tags'			=> '', // comma separated tags id
				'post_in'				=> '', // comma separated causes ids
				'post_not_in'			=> '', // comma separated causes ids to exclude
				'type'					=> 'grid', // grid, slider, list
				'image_size_type'		=> 'default', // default / custom
				'image_width'			=> 450,
				'image_height'			=> 450,
				'donate_btn'			=> 'on',
				'cause_excerpt'			=> 'on',
				'cause_stats'			=> 'on',
				'cause_progress_bar'	=> 'on',
				'excerpt_length'		=> 10,
				'creator'          		=> '',

		    ), $atts));

		    $loop 			= ( $loop == 'yes' ? 'true' : 'false' );
		    $autoplay 		= ( $autoplay == 'yes' ? 'true' : 'false' );
		    $navigation 	= ( $navigation == 'yes' ? 'true' : 'false' );
		    $pagination 	= ( $pagination == 'yes' ? 'true' : 'false' );

			$post_in = ( $post_in ? explode( ',', $post_in ) : null );
			$post_not_in = ( $post_not_in ? explode( ',', $post_not_in ) : null );

			$args = array( 
				'post_type' 				=> 'give_forms', 
				'orderby' 					=> $orderby,
				'order' 					=> $order,
				'posts_per_page' 			=> $post,
				'post__in' 					=> $post_in,
				'post__not_in' 				=> $post_not_in,
			);


			// only form selected causes categories
			if( $causes_categories && $causes_categories != '' ){
				$causes_categories = explode(',', $causes_categories);
				$args['tax_query'][] = array(
					'taxonomy' 	=> 'give_forms_category',
			        'field'    	=> 'id',
					'terms'    	=> $causes_categories,
			        'operator' 	=> 'IN' 
				);
			}

			// only form selected causes tags
			if( $causes_tags && $causes_tags != '' ){
				$causes_tags = explode(',', $causes_tags);
				$args['tax_query'][] = array(
					'taxonomy' 	=> 'give_forms_tag',
			        'field'    	=> 'id',
					'terms'    	=> $causes_tags,
			        'operator' 	=> 'IN' 
				);
			}

			// only form selected author
			if( $creator && $creator != '' ){
				$args['author'] = $creator;
			}

			$wp_query = new WP_Query( $args );

			$row = ( $type == 'grid' ? ' row' : '' );

			if($column){
				$column = 12/$column;
				$column = 'col-lg-'.$column . ' col-md-4 col-sm-6';
			}

			$column = ( $type == 'grid' ? apply_filters( 'humane_causes_grid_column', $column ) : '' );

			ob_start();

			if ( $wp_query->have_posts() ): ?>

				<div class="humane-donation-causes humane-donation-causes-<?php echo esc_attr( $type.$row ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-items="<?php echo esc_attr( $items ); ?>" data-desktopsmall="<?php echo esc_attr( $desktopsmall ); ?>" data-tablet="<?php echo esc_attr( $tablet ); ?>" data-mobile="<?php echo esc_attr( $mobile ); ?>" data-navigation="<?php echo esc_attr( $navigation) ; ?>" data-pagination="<?php echo esc_attr( $pagination ); ?>" data-loop="<?php echo esc_attr( $loop ); ?>" data-direction="<?php echo esc_attr( ( is_rtl() ? 'true' : 'false' ) ); ?>">

					<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>

						<?php 
							global $post;
							$give_form_content  	= get_post_meta( get_the_id(), '_give_form_content', true );
							$display_label_field 	= give_get_meta( get_the_id(), '_give_checkout_label', true );
							$display_label       	= ( ! empty( $display_label_field ) ? $display_label_field : esc_html__( 'Donate Now', 'xt-humane-cpt-shortcode' ) );
						?>

						<div <?php post_class( array( 'humane-donation-cause-item', 'ch-causes', $column ) ) ?>>
							<div class="cause-inner clearfix">
								<?php if( has_post_thumbnail() ):?>
									<?php if( $type == 'list'): ?>
										<div class="col-md-5 padding-o">
									<?php endif; ?>
			                        	<a href="<?php esc_url( the_permalink() ); ?>">
											<?php
												if( $image_size_type == 'default' ){
													the_post_thumbnail( apply_filters( 'humane_causes_image_size', 'humane-campaign-thumb-grid' ), array( 'alt' => esc_attr( get_the_title() ) ) );
												}else{
													echo humane_get_aq_resize_thumbnail( $image_width, $image_height, get_post_thumbnail_id(), true, true );
												}
											?>
										</a>
									<?php if( $type == 'list'): ?>
										</div>
									<?php endif; ?>
		                        <?php endif;?>

		                        <?php if( $type == 'list'): ?>
									<div class="col-md-7 padding-o">
								<?php endif; ?>
		                        <div class="cause-inner-content">
		                            <h3>
										<a href="<?php esc_url( the_permalink() ) ?>"><?php the_title(); ?></a>
									</h3>	


		                            <?php
		                            	if( $cause_excerpt == 'on' && $give_form_content ){
		                            		echo wpautop( wp_trim_words( $give_form_content, $excerpt_length ) );
		                           		}

		                            	$give_goal_atts = array(
											'show_bar'  => ( $cause_progress_bar == 'on' ? 'true' : 'false' ),
		                            		'show_text' => ( $cause_stats == 'on' ? 'true' : 'false' ),
		                            	);

		                            	echo do_shortcode( '[give_goal id="'. get_the_id() .'" show_text="'. $give_goal_atts['show_text'] .'" show_bar="'. $give_goal_atts['show_bar'] .'"]' );

		                            	
		                            ?>

		                            <?php 

		                           		if( $donate_btn == 'on' && $type != 'list' ){
		                            		printf( '<a class="btn btn-border btn-lg" href="%s">%s</a>', esc_url(get_the_permalink()), esc_html( $display_label  ) );
			                            }

			                            if( $donate_btn == 'on' && $type == 'list' ){
			                            	echo do_shortcode( '[give_form id="'.get_the_id().'" show_title="false" show_goal="false" show_content="none" display_style="modal"]' );
			                            }
		                            ?>
		                        </div>
		                        <?php if( $type == 'list'): ?>
									</div>
								<?php endif; ?>
		                    </div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php
			endif;
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}





/**
 * Give Donation Form list widget
 */


if ( class_exists( 'Give' ) ){
	add_shortcode( 'xt_give_donation_list_widget', 'humane_give_donation_form_list_widget' );

	if( !function_exists('humane_give_donation_form_list_widget') ){
		function humane_give_donation_form_list_widget( $atts ){
			extract(shortcode_atts(array(
				'post'  				=> 5,
				'order' 				=> 'ASC',
				'orderby' 				=> 'date',
				'cause_stats'			=> 'on',
				'show_image'			=> 'on',

		    ), $atts));

			$args = array( 
				'post_type' 				=> 'give_forms', 
				'orderby' 					=> $orderby,
				'order' 					=> $order,
				'posts_per_page' 			=> $post,
			);

			$wp_query = new WP_Query( $args );

			ob_start();

			if ( $wp_query->have_posts() ): ?>

				<ul class="humane-donation-forms">

					<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>

						<li <?php post_class( array( 'humane-donation-form', ( $show_image == 'on' ? 'row' : '' ) ) ) ?>>

							<?php if($show_image): ?>
								<div class="col-sm-4 col-xs-4 padding-right-o">
									<?php the_post_thumbnail( 'thumbnail' ) ?>
								</div>

								<div class="col-sm-8 col-xs-8">
									<h4 class="campaign-title">
										<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
									</h4>
									<?php echo do_shortcode( '[give_goal id="'. get_the_id() .'" show_text="true" show_bar="false"]' ); ?>
								</div>
							<?php else: ?>	
								<h4 class="campaign-title">
									<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
								</h4>
								<?php echo do_shortcode( '[give_goal id="'. get_the_id() .'" show_text="true" show_bar="false"]' ); ?>
							<?php endif; ?>

						</li>

					<?php endwhile; ?>

				</ul>
			<?php endif;

			wp_reset_postdata();

			return ob_get_clean();
		}
	}
}




/**
 * Give Donation tags / categories widget
 */


if ( class_exists( 'Give' ) ){
	add_shortcode( 'xt_give_donation_tag_cat', 'humane_give_donation_tag_cat_widget' );

	if( !function_exists('humane_give_donation_tag_cat_widget') ){
		function humane_give_donation_tag_cat_widget( $atts ){
			extract(shortcode_atts(array(
				'post'  				=> 5,
				'order' 				=> 'ASC',
				'orderby' 				=> 'ID',
				'hide_empty' 			=> false,
				'taxonomy' 				=> 'give_forms_category', // give_forms_tag

		    ), $atts));

			$args = array( 
				'taxonomy' 					=> $taxonomy,
				'orderby' 					=> $orderby,
				'order' 					=> $order,
				'hide_empty' 				=> $hide_empty,
				'title_li'					=> '',
			);

			ob_start();

			?>

				<ul class="humane-donation-form-taxonomy">

					<?php wp_list_categories( $args ); ?>

				</ul>

			<?php

			return ob_get_clean();
		}
	}
}
<?php 


/**
 * Section Title ShortCode
 */

if( !function_exists( 'humane_section_title_shortcode' ) ){
	function humane_section_title_shortcode( $atts ){

		extract(shortcode_atts(array(
			'section_title'	  	  => '',
			'title_highlight'	  => '', 
			'section_subtitle'    => '',
			'title_align'   	  => 'center', // center, left, right, default
			'margin_bottom'   	  => 'medium', // no_margin small medium large
			'text_color'   	  	  => 'default' // white
	    ), $atts));

		ob_start();
	?>
        <div class="sec-title <?php echo esc_attr( 'text-' . $title_align ); ?> <?php echo esc_attr( 'section-title-margin-bottom-' . $margin_bottom ); ?> <?php echo esc_attr( 'section-title-color-' . $text_color ); ?>">
            <?php 
            	if( $section_title ){
            		if( $title_highlight ){
						printf( '<h2>%s <span class="sec-title-highlight">%s</span></h2>', wp_kses_post( $section_title ), wp_kses_post( $title_highlight ) );
            		}else{
            			printf( '<h2>%s</h2>', wp_kses_post( $section_title ) );
            		}
            	}
            	$section_subtitle ? printf( '<div class="desc-text">%s</div>', esc_attr( $section_subtitle ) ) : '';	
            ?>
        </div>

		<?php
	    return ob_get_clean();
	}
}
add_shortcode( 'xt_section_title', 'humane_section_title_shortcode' );



/**
 * Feature ShortCode
 */
if( !function_exists('humane_donate_shortcode') ){
	function humane_donate_shortcode($atts){
		extract(shortcode_atts(array(
			'icon'	              => '',
			'title'	              => '',
			'sub_title'	          => '',
			'donate_content'	  => '',
	    ), $atts));

		ob_start();

	?>

        <div class="service-box">
            <div class="inner-box">
            	<?php $icon ? printf( '<div class="icon-box"><span class="%s"></span></div>', esc_attr( $icon ) ) : ''; ?>
            	<?php if( $title || $sub_title ): ?>
	                <div class="title">
	                	<?php $title ? printf( '<h3>%s</h3>', esc_html( $title ) ) : ''; ?>
	                	<?php $sub_title ? printf( '<div class="txt">%s</div>', esc_html( $sub_title ) ) : ''; ?>
	                </div>
	            <?php endif; ?>

                <?php $donate_content ? printf( '<div class="service-box-content">%s</div>', wp_kses_post( wpautop( $donate_content ) ) ) : ''; ?>                   
            </div>
        </div>


		<?php
	    return ob_get_clean();
	}
}
add_shortcode( 'xt_features', 'humane_donate_shortcode' );


/**
 * Feature 2 Shortcode
 */
if( !function_exists('humane_feature_2_shortcode') ){
	function humane_feature_2_shortcode($atts){
		extract(shortcode_atts(array(
			'icon'	              => '',
			'title'	              => '',
			'feature_content'	  => '',
			'feature_bg_img'	  => '',
			'feature_link'	  	  => ''
	    ), $atts));

		$link	= ( '||' === $feature_link ) ? '' : $feature_link;

		if( function_exists('kc_parse_link') ){
			$link	= kc_parse_link($link);
		}
            
		if ( strlen( $link['url'] ) > 0 ) {
			$a_href 	= $link['url'];
			$a_title 	= $link['title'];
			$a_target 	= strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
		}

		if( !isset( $a_href ) )
			$a_href = "";

		if( isset( $a_href ) )
			$button_attr[] = 'href="'. esc_attr($a_href) .'"';

		if( isset( $a_target ) )
			$button_attr[] = 'target="'. esc_attr($a_target) .'"';

		if( isset( $a_title ) )
			$button_attr[] = 'title="'. esc_attr($a_title) .'"';

		$feature_bg_img_src = array();
		if( $feature_bg_img ){
			$feature_bg_img_src = wp_get_attachment_image_src( $feature_bg_img, 'large' );
		}

		ob_start();
		?>

			<div class="theme-feature shadow shadow-hover" <?php echo ( $feature_bg_img_src ? 'style="background-image: url('.esc_url( $feature_bg_img_src[0] ).')"' : '' ); ?>>
				<?php if( $a_href ): printf( '<a %s>', implode(' ', $button_attr) ); endif; ?>
		            <div class="theme-feature-inner">
		            	<?php $icon ? printf( '<i class="%s"></i>', esc_attr( $icon ) ) : ''; ?>
						<?php $title ? printf( '<h3>%s</h3>', esc_html( $title ) ) : ''; ?>
						<?php $feature_content ? printf('%s', wpautop( wp_kses_post( wp_trim_words( $feature_content ) ) ) ) : ''; ?>
		            </div>
	            <?php if( $a_href ): printf( '</a>' ); endif; ?>
	        </div>

		<?php
	    return ob_get_clean();
	}
}
add_shortcode( 'xt_mission', 'humane_feature_2_shortcode' );


/**
 * Call To Action ShortCode
 */
if( !function_exists('humane_cta_shortcode') ){
	function humane_cta_shortcode($atts){
		extract(shortcode_atts(array(
			'title'	              => '',
			'action_content'	  => '',
			'btn_text'	          => '',
			'btn_url'	          => '',
			'content_after'	      => '',
			'need_animation'	  => 'no',
	    ), $atts));



		ob_start();
	?>
		<?php 

	        $link	= ( '||' === $btn_url ) ? '' : $btn_url;

			if( function_exists('kc_parse_link') ){
				$link	= kc_parse_link($link);
			}
	            
			if ( strlen( $link['url'] ) > 0 ) {
				$a_href 	= $link['url'];
				$a_title 	= $link['title'];
				$a_target 	= strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
			}

			if( !isset( $a_href ) )
				$a_href = "#";

			if( isset( $a_href ) )
				$button_attr[] = 'href="'. esc_attr($a_href) .'"';

			if( isset( $a_target ) )
				$button_attr[] = 'target="'. esc_attr($a_target) .'"';

			if( isset( $a_title ) )
				$button_attr[] = 'title="'. esc_attr($a_title) .'"';

		?>
        <div class="charity-call-to-action">
        	<?php $action_content ? printf( '<h3>%s</h3>', wp_kses_post( $action_content ) ) : ''; ?>
        	<?php $title ? printf( '<h2>%s</h2>', esc_html( $title ) ) : ''; ?>
        	<?php $content_after ? printf( '<div class="charity-call-to-action-content">%s</div>', wpautop( $content_after ) ) : ''; ?>
        	<?php $a_title ? printf( '<a class="slide-btn btn btn-border btn-lg" %s>%s</a>', implode(' ', $button_attr), esc_html( $a_title ) ) : ''; ?>
        </div>

		<?php
	    return ob_get_clean();
	}
}
add_shortcode( 'xt_call_to_action', 'humane_cta_shortcode' );


/**
 * Volunteer Call To Action ShortCode
 */
if( !function_exists('humane_volunteer_cta_shortcode') ){
	function humane_volunteer_cta_shortcode($atts){
		extract(shortcode_atts(array(
			'title'	              => '',
			'title_highlight'	  => '', 
			'action_content'	  => '',
			'btn_url'	          => '',
			'image_width'	      => 650,
			'image_height'	      => 480,
			'action_img'	      => '',

	    ), $atts));

		ob_start();

	?>
		<?php 

	        $link	= ( '||' === $btn_url ) ? '' : $btn_url;

			if( function_exists('kc_parse_link') ){
				$link	= kc_parse_link($link);
			}
	            
			if ( strlen( $link['url'] ) > 0 ) {
				$a_href 	= $link['url'];
				$a_title 	= $link['title'];
				$a_target 	= strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
			}

			if( !isset( $a_href ) )
				$a_href = "#";

			if( isset( $a_href ) )
				$button_attr[] = 'href="'. esc_attr($a_href) .'"';

			if( isset( $a_target ) )
				$button_attr[] = 'target="'. esc_attr($a_target) .'"';

			if( isset( $a_title ) )
				$button_attr[] = 'title="'. esc_attr($a_title) .'"';

		?>

		<div class="charity-volunteer call-to-action shadow<?php echo esc_attr( $action_img ? '' : ' charity-volunteer-call-to-action-no-img' ); ?>">
			<div class="<?php echo esc_attr( $action_img ? 'row' : 'charity-volunteer-inner' ); ?>">
				<div class="charity-volunteer-content-box <?php echo esc_attr( $action_img ? 'col-md-4 padding-o' : '' ); ?>">
		        	<?php 
		        		if( $title ){
		            		if( $title_highlight ){
								printf( '<h2>%s <span class="sec-title-highlight">%s</span></h2>', wp_kses_post( $title ), wp_kses_post( $title_highlight ) );
		            		}else{
		            			printf( '<h2>%s</h2>', wp_kses_post( $title ) );
		            		}
		            	}
		        	?>

		        	<?php $action_content ? printf( '<div class="call-to-action-text">%s</div>', wp_kses_post( $action_content ) ) : ''; ?>

		        	<?php $a_title ? printf( '<a class="action-btn shadow shadow-hover" %s>%s</a>', implode(' ', $button_attr), esc_html( $a_title ) ) : ''; ?>
				</div>

				<?php if( $action_img ): ?>
					<div class="content-img col-md-8 padding-o">
						<?php echo humane_get_aq_resize_thumbnail( $image_width, $image_height, $action_img, true, true ); ?>
					</div>
				<?php endif; ?>
			</div>

		</div>

	<?php
    	return ob_get_clean();
	}
}
add_shortcode( 'xt_volunteer_cta', 'humane_volunteer_cta_shortcode' );


/**
 * About Us Section ShortCode
 */
if( !function_exists('humane_about_us_shortcode') ){
	function humane_about_us_shortcode($atts){
		extract(shortcode_atts(array(
			'title'	              => '',
			'action_content'	  => '',
			'btn_url'	          => ''
	    ), $atts));

		ob_start();

	?>
		<?php 

	        $link	= ( '||' === $btn_url ) ? '' : $btn_url;

			if( function_exists('kc_parse_link') ){
				$link	= kc_parse_link($link);
			}
	            
			if ( strlen( $link['url'] ) > 0 ) {
				$a_href 	= $link['url'];
				$a_title 	= $link['title'];
				$a_target 	= strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
			}

			if( !isset( $a_href ) )
				$a_href = "#";

			if( isset( $a_href ) )
				$button_attr[] = 'href="'. esc_attr($a_href) .'"';

			if( isset( $a_target ) )
				$button_attr[] = 'target="'. esc_attr($a_target) .'"';

			if( isset( $a_title ) )
				$button_attr[] = 'title="'. esc_attr($a_title) .'"';

		?>
        <div class="charity-about-section">
			<?php $title ? printf( '<h2>%s</h2>', esc_html( $title ) ) : ''; ?>
			<?php $action_content ? printf( '<div class="desc">%s</div>', wp_kses_post( wpautop( $action_content ) ) ) : ''; ?>
			<?php $a_title ? printf( '<a class="theme-btn btn-style-five" %s>%s</a>', implode(' ', $button_attr), esc_html( $a_title ) ) : ''; ?>
        </div>

		<?php
	    return ob_get_clean();
	}
}
add_shortcode( 'xt_about_us', 'humane_about_us_shortcode' );


/**
 * Stats ShortCode
 */
if( !function_exists('humane_stats_shortcode') ){
	function humane_stats_shortcode($atts){
		extract(shortcode_atts(array(
			'icon'	              => '',
			'title'	              => '',
			'number'	          => ''
	    ), $atts));

		ob_start();
	?>

		<div class="ch-fame">
			<div class="fame-item">
			    <div class="vl-icon">
			    	<?php $icon ? printf( '<i class="%s"></i>', esc_attr( $icon ) ) : ''; ?>
			    	<?php $number ? printf( '<h3 class="number aw">%s</h3>', esc_html( $number ) ) : ''; ?>
			    	<?php $title ? printf( '<span class="text">%s</span>', esc_html( $title ) ) : ''; ?>
			    </div>
			</div>
		</div>

		<?php
	    return ob_get_clean();
	}
}
add_shortcode( 'xt_stats', 'humane_stats_shortcode' );
 

/**
 * Contact Icon ShortCode
 */
if( !function_exists( 'humane_contact_icon_shortcode' ) ){
	function humane_contact_icon_shortcode( $atts ){
		extract(shortcode_atts(array(
			'icon'	              		  => '',
			'title'	              		  => '',
			'action_content'	          => ''
	    ), $atts));

		ob_start();
	?>		

		<div class="charity-contact-info">
			<?php $icon ? printf( '<div class="icon"><span class="%s"></span></div>', esc_attr( $icon ) ) : ''; ?>
			<?php $title ? printf( '<h4>%s</h4>', esc_html( $title ) ) : ''; ?>
			<?php echo ( $action_content ? wpautop( wp_kses_post( $action_content ) ) : '') ; ?>
		</div>

		<?php
	    return ob_get_clean();
	}
}
add_shortcode( 'xt_icon_scode', 'humane_contact_icon_shortcode' );



/**
 * Main Slider ShortCode
 */
if( !function_exists('humane_main_slider_shortcode') ){
	function humane_main_slider_shortcode( $atts ) {

		extract( shortcode_atts(
			array(
				'post'  				=> 3,
				'order' 				=> 'ASC',
				'orderby' 				=> 'menu_order',
				'loop'					=> 'true',
				'autoplay'				=> 'true',
				'navigation'			=> 'true',
				'pagination'			=> 'true',
				'post_in_ids'			=> '',
				'post_not_in_ids'		=> ''
			), $atts )
		);

		$post_in_ids = ( $post_in_ids ? explode( ',', $post_in_ids ) : null );
		$post_not_in_ids = ( $post_not_in_ids ? explode( ',', $post_not_in_ids ) : null );

		$args = array(
			'post_type' 				=> 'xt_theme_slider', 
			'orderby' 					=> $orderby,
			'order' 					=> $order,
			'posts_per_page' 			=> $post,
			'post__in' 					=> $post_in_ids,
			'post__not_in' 				=> $post_not_in_ids,
			'meta_query' 				=> array( array( 'key' => '_thumbnail_id' ) ) 
	    );

		$wp_query = new WP_Query( $args );

		wp_enqueue_style('animate');

		ob_start();
		
		if ( $wp_query->have_posts() ): ?>

        	<div class="header-slider header-slider-preloader">
            	<div class="theme-main-slider animation-slides owl-carousel owl-theme" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-loop="<?php echo esc_attr( $loop ); ?>" data-navigation="<?php echo esc_attr( $navigation) ; ?>" data-pagination="<?php echo esc_attr( $pagination ); ?>" data-direction="<?php echo esc_attr( ( is_rtl() ? 'true' : 'false' ) ); ?>">
				
				<?php while ($wp_query->have_posts()) : $wp_query->the_post();
					global $post;
					$slider_btn_text      = humane_get_post_meta( '_xt_sider_options', 'slider_btn_text', '', true, $post->ID );
					$slider_btn_url       = humane_get_post_meta( '_xt_sider_options', 'slider_btn_url', '', true, $post->ID );					
					$slider_featured_img  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array('1920','1280') );	

					if( has_post_thumbnail() && get_the_post_thumbnail_url() ){
						$slider_img = $slider_featured_img[0];					}

				?>

	                <div style="background-image:url(<?php echo esc_url( $slider_img ); ?>)" class="item">
	                    <div class="slide-table">
	                        <div class="slide-tablecell">
	                            <div class="container">
	                                <div class="row">
	                                    <div class="col-md-7 col-sm-10">
	                                        <div class="slide-text">
	                                           	<?php the_title( '<h2>', '</h2>' ); ?>
	                                           	<?php echo wpautop( get_the_content() ); ?>
												<?php $slider_btn_text ? printf( '<div class="slide-buttons"><a href="%s" class="slide-btn btn btn-border btn-lg">%s</a></div>', esc_url( $slider_btn_url ), esc_html( $slider_btn_text ) ) : ''; ?>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>

				<?php endwhile; ?>
				
				</div>
				<div class="slider_preloader">
	                <div class="slider_preloader_status">&nbsp;</div>
	            </div>
			</div>

		<?php

		endif;
		wp_reset_postdata();

		return ob_get_clean();
	}
}
add_shortcode( 'xt_main_slider', 'humane_main_slider_shortcode' );


/**
 * Project ShortCode
 */
if( !function_exists('humane_project_shortcode') ){
	function humane_project_shortcode( $atts ) {

		extract( shortcode_atts(
			array(
				'post'  				=> 8,
				'column'  				=> 3,
				'order' 				=> 'ASC',
				'orderby' 				=> 'menu_order',
				'post_in_ids'     		=> '',
                'post_not_in_ids'  		=> '',
                'type'					=> 'filter', // grid, filter
                'column'  				=> 3,
                'column_zero'  			=> 'no'
			), $atts )
		);

        $post_in_ids = ( $post_in_ids ? explode( ',', $post_in_ids ) : null );
        $post_not_in_ids = ( $post_not_in_ids ? explode( ',', $post_not_in_ids ) : null );

		$args = array(
			'post_type' 				=> 'xt_project', 
			'orderby' 					=> $orderby,
			'order' 					=> $order,
			'posts_per_page' 			=> $post,
			'meta_key' 					=> '_thumbnail_id',
			'post__in'          		=> $post_in_ids,
            'post__not_in'      		=> $post_not_in_ids,            
	    );

		$wp_query = new WP_Query( $args );

		ob_start();
		
		if ( $wp_query->have_posts() ):
		$column 	= 12/$column;
		$column 	= 'col-md-'.esc_attr( $column ). ' col-sm-6 col-xs-12';
		$rand_id 	= rand( 10,1000 );
		?>

		<div class="projects-section"<?php echo( $type == 'filter' ? ' data-mix="#theme-projects-'.$rand_id.'"' : '' ); ?>>
		    <div class="row clearfix">

			    <?php if( $type == 'filter' ) : ?>
		        	<?php $project_cats = get_terms( 'xt_project_cat' ); ?>
	                <?php if( ! empty( $project_cats ) && ! is_wp_error( $project_cats ) ) : ?> 
	                    <div class="filters text-center col-md-12">
	                        <ul class="filter-tabs filter-btns clearfix">
	                            <li class="filter active" data-role="button" data-filter="all"><?php echo esc_html__( 'All', 'xt-humane-cpt-shortcode' ); ?></li>
	                            <?php foreach ( $project_cats as $project_cat ) : ?>
	                            	<li class="filter" data-role="button" data-filter=".<?php echo esc_attr( $project_cat->slug ); ?>"><?php echo esc_html( $project_cat->name ); ?></li>
			                    <?php endforeach; ?>
	                        </ul>
	                    </div>
	                <?php endif; ?>
	            <?php endif; ?>

	            <div class="projects-items"<?php echo( $type == 'filter' ? ' id="theme-projects-'.$rand_id.'"' : '' ); ?>>

					<?php 
						while ($wp_query->have_posts()) : $wp_query->the_post();

						global $post;

				        $img_large 				= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );			       
				        $terms 					= get_the_terms( $post->ID, 'xt_project_cat' );
				        $project_classes 		= array( 'default-portfolio-item', $column,  );
				        $project_details_link  	= humane_get_post_meta( '_xt_project_options', 'project_details_link', '', false, $post->ID );

	                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) && $type == 'filter' ) : 

	                        foreach ( $terms as $term ) {
	                            $project_classes[]   = $term->slug;
	                        }

	                    endif;

	                    if( $column_zero == 'yes' ){
	                    	$project_classes[]   = 'charity-column-padding-zero';
	                    }

	                    if( $type == 'filter' ){
	                    	$project_classes[]   = 'mix';
	                    }

					?>

				        <div class="<?php echo esc_attr( join( " ", $project_classes ) ) ?>">

				            <div class="inner-box">

				                <figure class="image-box"><?php the_post_thumbnail( 'humane-project-thumb' ) ?></figure>

				                <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				                <div class="overlay-box">
				                    <div class="overlay-inner">
				                        <div class="content">
				                           	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				                           	<?php if( $project_details_link ): ?>
				                           		<a href="<?php echo esc_url( $project_details_link ); ?>" class="view-project-detail more-link" target="_blank"><span class="fa fa-plus"></span></a>
				                           	<?php else: ?>	
				                            	<a href="<?php echo esc_url( $img_large[0] ); ?>" class="view-project-detail more-link" data-rel="lightcase:charityproject:slideshow"><span class="fa fa-plus"></span></a>
				                        	<?php endif; ?>
				                        </div>
				                    </div>
				                </div>

				            </div>

				        </div>

					<?php endwhile; ?>
		        </div>
	        </div>
	    </div>

		<?php
		endif;
		wp_reset_postdata();
		return ob_get_clean();
	}
}
add_shortcode( 'xt_project', 'humane_project_shortcode' );


/**
 * volunteers ShortCode
 */
if( !function_exists('humane_volunteers_shortcode') ){
	function humane_volunteers_shortcode( $atts ) {

		extract( shortcode_atts(
			array(
				'post'  				=> 6,
				'order' 				=> 'ASC',
				'orderby' 				=> 'menu_order',
				'column' 				=> 3,
				'content_word_count' 	=> 20,
				'post_in_ids'			=> '',
				'post_not_in_ids'		=> '',
				'excerpt_length'		=> 15,
				'equalheight'			=> 'yes',
			), $atts )
		);

		$post_in_ids = ( $post_in_ids ? explode( ',', $post_in_ids ) : null );
		$post_not_in_ids = ( $post_not_in_ids ? explode( ',', $post_not_in_ids ) : null );

		$args = array(
			'post_type' 				=> 'xt_volanteers', 
			'orderby' 					=> $orderby,
			'order' 					=> $order,
			'posts_per_page' 			=> $post,
			'post__in' 					=> $post_in_ids,
			'post__not_in' 				=> $post_not_in_ids		
	    );

	    if( $column ){
			$column = 12/$column;
			$column = 'col-md-'.$column . ' col-sm-6';
		}

		$column = apply_filters( 'humane_volunteers_grid_column', $column );

		$wp_query = new WP_Query( $args );

		ob_start();
		
		if ( $wp_query->have_posts() ): ?>
			<div class="ch-volanteer row<?php echo esc_attr( $equalheight == 'yes' ? ' xt-equalheight-row' : '' )?>">
					
				<?php while ($wp_query->have_posts()) : $wp_query->the_post();

					global $post;
					$volanteer_img = '';
					$volanteer_social_icons      = humane_get_post_meta( '_xt_volanteer_options', 'volanteer_all_social_icons', '', false, $post->ID );
					$volanteer_designation       = humane_get_post_meta( '_xt_volanteer_options', 'volunteer_designation', '', false, $post->ID );
				?>

				<div class="humane-volanteer-item <?php echo esc_attr( $column ); ?>">
					<div class="shadow card-profile">
						<div class="card-content">
							<?php if( has_post_thumbnail() && get_the_post_thumbnail_url() ): ?>
								<div class="card-avatar shadow">
									<a href="<?php the_permalink() ?>">
										<?php the_post_thumbnail( 'thumbnail' ); ?>
									</a>
								</div>
							<?php endif; ?>
						
							<h3 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							<?php $volanteer_designation ? printf( '<h5 class="profile-designation text-muted">%s</h5>', esc_html( $volanteer_designation ) ) : ''; ?>
							<p class="card-description">
								<?php echo wp_trim_words( get_the_excerpt(), esc_html( $excerpt_length ) ); ?>
							</p>
							<?php if( is_array( $volanteer_social_icons ) ) : ?>
                            	<div class="footer">	                            
                                	<?php foreach ( $volanteer_social_icons  as $key => $volanteer_social_icon ) : ?>
								        <a href="<?php echo esc_url( $volanteer_social_icon['volanteer_social_icons_url'] ); ?>" class="btn btn-just-icon btn-round">
								            <i class="<?php echo esc_attr( $volanteer_social_icon['volanteer_social_icons'] ); ?>"></i>
								        </a>
                                    <?php endforeach; ?>
                            	</div>
                            <?php endif; ?>
						</div>
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
add_shortcode( 'xt_volunteer', 'humane_volunteers_shortcode' );


/**
 * Blog Post ShortCode
 */
if( !function_exists('humane_blog_post_shortcode') ){
	function humane_blog_post_shortcode( $atts ) {

		extract( shortcode_atts(
			array(
				'post'  				=> 2,
				'order' 				=> 'ASC',
				'orderby' 				=> 'menu_order',
				'image_size_type'		=> 'default', // default / custom
				'image_width'			=> 570,
				'image_height'			=> 450,
				'column' 		   		=> 2,
				'number_of_words' 		=> 30,
                'post_in_ids'      		=> '',
                'post_not_in_ids'  		=> '',
                'excerpt_length'		=> 15,
                'show_category'			=> 'yes',
                'post_has_image'		=> 'yes',
                'equalheight'			=> 'yes',
			), $atts )
		);

        $post_in_ids 		= ( $post_in_ids ? explode( ',', $post_in_ids ) : null );
        $post_not_in_ids 	= ( $post_not_in_ids ? explode( ',', $post_not_in_ids ) : null );

		$args = array(
			'post_type' 				=> 'post', 
			'orderby' 					=> $orderby,
			'order' 					=> $order,
			'posts_per_page' 			=> $post,
			'post__in'          		=> $post_in_ids,
            'post__not_in'     		 	=> $post_not_in_ids,
            'ignore_sticky_posts' 		=> 1
	    );

		if( $post_has_image == 'yes' ){
			$args['meta_key'] = '_thumbnail_id';
		}

		$wp_query = new WP_Query( $args );
		$column = 12/$column;
		$column = 'col-md-'.esc_attr( $column ). ' col-sm-12 col-xs-12';

		ob_start();
		
		if ( $wp_query->have_posts() ): ?>

			<div class="row<?php echo esc_attr( $equalheight == 'yes' ? ' xt-equalheight-row' : '' )?>">				
				<?php 
					while ($wp_query->have_posts()) : $wp_query->the_post();
					global $post;
				?>

		            <div class="news-style-two charity-blog-grid <?php echo esc_attr( $column ); ?>">
		                <div class="inner-box shadow">
		                	<?php if( has_post_thumbnail() && get_the_post_thumbnail_url() ): ?>
			                    <figure class="image">
			                    	<a href="<?php the_permalink(); ?>">
	            						<?php
											if( $image_size_type == 'default' ){
												the_post_thumbnail( apply_filters( 'humane_blog_image_size', 'humane-blog-thumb-grid' ) );
											}else{
												echo humane_get_aq_resize_thumbnail( $image_width, $image_height, get_post_thumbnail_id(), true, true );
											}
										?>
			                    	</a>
			                    </figure>
			                <?php endif; ?>
		                    <div class="lower-content">

		                    	<?php if( $show_category == 'yes' ): ?>
		                    		<div class="post-cat"><?php echo humane_get_post_first_category( get_the_id(), 'category' ); ?></div>
		                    	<?php endif; ?>

		                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		                       	<?php echo wpautop( wp_trim_words( wp_kses_post( get_the_excerpt() ), esc_html( $excerpt_length ) ) ); ?>

		                    </div>
		                    <div class="post-meta clearfix">
		                        <ul class="clearfix">
		                            <li><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><?php the_author_posts_link(); ?></li>
		                            <li><i class="fa fa-calendar"></i><?php echo get_the_date( get_option( 'date_format' ) ); ?></li>
		                        </ul>
		                    </div>
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
add_shortcode( 'xt_post', 'humane_blog_post_shortcode' );


/**
 * Testimonial ShortCode
 */
if( !function_exists('humane_testimonial_shortcode') ){
	function humane_testimonial_shortcode( $atts ) {

		extract( shortcode_atts(
			array(
				'post'  				=> 6,
				'type'					=> 'slider', // grid, slider
				'column'				=> 3,
				'order' 				=> 'ASC',
				'orderby' 				=> 'menu_order',
				'post_in_ids'     		=> '',
                'post_not_in_ids'  		=> '',
                'excerpt_length'		=> 20,
                'autoplay'				=> 'true',
				'items'					=> 3,
				'desktopsmall'			=> 3,
				'tablet'				=> 2,
				'mobile'				=> 1,
				'navigation'			=> 'true',
				'pagination'			=> '',
				'loop'					=> 'true',
			), $atts )
		);

        $post_in_ids = ( $post_in_ids ? explode( ',', $post_in_ids ) : null );
        $post_not_in_ids = ( $post_not_in_ids ? explode( ',', $post_not_in_ids ) : null );

		$args = array(
			'post_type' 				=> 'xt_testimonial', 
			'orderby' 					=> $orderby,
			'order' 					=> $order,
			'posts_per_page' 			=> $post,
			'post__in'          		=> $post_in_ids,
            'post__not_in'      		=> $post_not_in_ids,    
	    );

		$row = ( $type != 'slider' ? ' row' : '' );

		if( $column ){
			$column = 12/$column;
			$column = 'col-md-'.$column . ' col-sm-6 col-xs-12';
		}
		$column = ( $type == 'grid' ? apply_filters( 'humane_testimonial_grid_column', $column ) : '' );

		$wp_query = new WP_Query( $args );

		ob_start();       
		
		if ( $wp_query->have_posts() ): ?>
      	        
	        <div class="charity-testimonial testimonial-type-<?php echo esc_attr( $type.$row ); ?> <?php if( $type == 'slider' ){ echo ' owl-theme owl-carousel';} ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-items="<?php echo esc_attr( $items ); ?>" data-desktopsmall="<?php echo esc_attr( $desktopsmall ); ?>" data-tablet="<?php echo esc_attr( $tablet ); ?>" data-mobile="<?php echo esc_attr( $mobile ); ?>" data-navigation="<?php echo esc_attr( $navigation) ; ?>" data-pagination="<?php echo esc_attr( $pagination) ; ?>" data-loop="<?php echo esc_attr( $loop ); ?>" data-direction="<?php echo esc_attr( ( is_rtl() ? 'true' : 'false' ) ); ?>">
			<?php 
				while ($wp_query->have_posts()) : $wp_query->the_post();
				global $post;
				$designation      = humane_get_post_meta( '_xt_testimonial_options', 'clients_designation', '', true, $post->ID );
			?>

	            <div <?php post_class( array( 'slide-item', $column ) ); ?>>
	                <div class="inner">
	                	<?php if( has_post_thumbnail() && get_the_post_thumbnail_url() ): ?>
                        	<figure class="author-thumb img-circle"><?php the_post_thumbnail( 'thumbnail' ) ?></figure>
                    	<?php endif; ?>
	                    <div class="upper-content">
	                        <div class="text"><?php echo wpautop( wp_trim_words( get_the_content(), esc_html( $excerpt_length ) ) ); ?></div>
	                        <?php the_title( '<h4>', '</h4>' ); ?>
	                        <?php $designation ? printf('<div class="designation"> %s</div>', esc_html($designation) ) : ''; ?>     
	                    </div>
	                </div>
	            </div>

			<?php 
				endwhile;
				wp_reset_postdata();
			?>
            </div>

		<?php
		endif;
		wp_reset_postdata();
		return ob_get_clean();
	}
}
add_shortcode( 'xt_testimonial', 'humane_testimonial_shortcode' );


/**
 * Client's logo ShortCode
 */
if( !function_exists( 'humane_clients_logo_shortcode' ) ){
    function humane_clients_logo_shortcode( $atts, $content = null ){
    	$image = '';
        extract( shortcode_atts( array(
            'clients_logos'	  	=> '',
            'logo_url'	  	  	=> '',
            'autoplay'	  		=> 'yes',
            'loop'	  			=> 'yes',
            'items'	  			=> 5,
            'desktopsmall'		=> 4,
			'tablet'			=> 3,
			'mobile'			=> 1,
			'navigation'		=> 'no',
			'pagination'		=> 'no'
        ), $atts) );

        $slider_attr = array(
        	'data-autoplay' 	=> ( $autoplay == 'yes' ? 'true' : 'false' ),
        	'data-loop' 	    => ( $loop == 'yes' ? 'true' : 'false' ),
        	'data-items' 		=> $items,
        	'data-desktopsmall' => $desktopsmall,
        	'data-tablet' 		=> $tablet,
        	'data-mobile' 		=> $mobile,
        	'data-navigation' 	=> ( $navigation == 'yes' ? 'true' : 'false' ),
        	'data-pagination' 	=> ( $pagination == 'yes' ? 'true' : 'false' ),
        	'data-direction' 	=> ( is_rtl() ? 'true' : 'false' )
        );

    	wp_enqueue_style('owl-carousel');	  
    	wp_enqueue_script('owl-carousel');	 

        ob_start();
        ?>

        <?php if( $clients_logos ): ?>

	        <div class="client-logo-slider owl-carousel owl-theme" <?php echo humane_owl_carousel_data_attr_implode( $slider_attr ); ?>>
	   		
		        <?php foreach ( $clients_logos as $clients_logo ):	        		
	        		$logo_url = $clients_logo->logo_url;
		        ?>
		        	<div class="items">
		        		<a href="<?php echo esc_url( $logo_url );?>">
		        			<?php echo $logo_img = wp_get_attachment_image( $clients_logo->image, 'medium' ); ?>
		        		</a>
		        	</div>

			    <?php endforeach; ?>

			</div>

		<?php endif; ?>

	   	<?php 
        return ob_get_clean();
    }
}
add_shortcode( 'xt_clients', 'humane_clients_logo_shortcode' ); 



/**
 * Events grid / slider / list Shortcode
 */
if( humane_plugin_active( 'the-events-calendar/the-events-calendar.php' ) ){
	add_shortcode( 'xt_events', 'humane_events_shortcode_function' );

	if( !function_exists('humane_events_shortcode_function') ){
		function humane_events_shortcode_function( $atts ){
			extract(shortcode_atts(array(
				'x_class'  			=> '',
				'type'				=> 'grid', // grid, slider
				'image_size_type'	=> 'default', // default / custom
				'image_width'		=> 570,
				'image_height'		=> 450,
				'column'			=> 2,
				'event_categories'	=> '', // comma separated categories id
				'event_ids'			=> '', // comma separated events ids
				'not_in'			=> '', // comma separated events ids to exclude
				'post'  			=> 2,
				'order' 			=> 'ASC',
				'orderby' 			=> 'menu_order',
				'autoplay'			=> 'true',
				'items'				=> 3,
				'desktopsmall'		=> 3,
				'tablet'			=> 2,
				'mobile'			=> 1,
				'loop'				=> 'true',
				'navigation'		=> 'true',
				'pagination'		=> 'false',
				'show_cost'			=> 'on',
				'show_details_btn'	=> 'on',
				'show_excerpt'		=> 'on',
				'show_expired'		=> 'off',
				'details_btn_text'	=> esc_html__( 'Details', 'xt-humane-cpt-shortcode' )
		    ), $atts));

			$event_ids = ( $event_ids ? explode( ',', $event_ids ) : null );
			$not_in = ( $not_in ? explode( ',', $not_in ) : null );

			$args = array( 
				'post_type' 				=> 'tribe_events', 
				'orderby' 					=> $orderby,
				'order' 					=> $order,
				'posts_per_page' 			=> $post,
				'post__in' 					=> $event_ids,
				'post__not_in' 				=> $not_in,
			);

			if( $show_expired && $show_expired == 'on' ){
				$args['eventDisplay'] = 'custom';
			}

			// only form selected event categories
			if( $event_categories && $event_categories != '' ){
				$event_categories = explode(',', $event_categories);
				$args['tax_query'][] = array(
					'taxonomy' 	=> 'tribe_events_cat',
			        'field'    	=> 'id',
					'terms'    	=> $event_categories,
			        'operator' 	=> 'IN' 
				);
			}

			$row = ( $type != 'slider' ? ' row' : '' );
			
			if( $column ){
				$column = 12/$column;
				$column = 'col-md-'.$column . ' col-sm-6 col-xs-12';
			}

			$column = ( $type == 'grid' ? apply_filters( 'humane_event_grid_column', $column ) : '' );

			$wp_query = new WP_Query( $args );

			ob_start();
				if ( $wp_query->have_posts() ){
					?>
						<div class="ch-event humane-event-<?php echo esc_attr( $type.$row ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-items="<?php echo esc_attr( $items ); ?>" data-desktopsmall="<?php echo esc_attr( $desktopsmall ); ?>" data-tablet="<?php echo esc_attr( $tablet ); ?>" data-mobile="<?php echo esc_attr( $mobile ); ?>" data-navigation="<?php echo esc_attr( $navigation) ; ?>" data-pagination="<?php echo esc_attr( $pagination ); ?>" data-loop="<?php echo esc_attr( $loop ); ?>" data-direction="<?php echo esc_attr( ( is_rtl() ? 'true' : 'false' ) ); ?>">

							<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
								<?php if( $type == 'grid' || $type == 'slider' ): ?>

									<div <?php post_class( array( 'default-event-box', $column ) ); ?>>
							            <div class="inner-box shadow shadow-hover">
											<?php if( has_post_thumbnail() && get_the_post_thumbnail_url() ): ?>
												<figure class="image-box">
													<a href="<?php esc_url( the_permalink() ); ?>">
														<?php
															if( $image_size_type == 'default' ){
																the_post_thumbnail( apply_filters( 'humane_event_image_size', 'humane-campaign-thumb-grid' ) );
															}else{
																echo humane_get_aq_resize_thumbnail( $image_width, $image_height, get_post_thumbnail_id(), true, true );
															}
														?>
													</a>								
												</figure>
											<?php endif; ?>
						                    <div class="lower-content">

						                        <div class="post-meta">
						                        	<?php echo tribe_events_event_schedule_details( get_the_ID() ); ?>
						                        	<?php echo tribe_get_full_address();?>
						                        </div>

						                        <h3><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>

						                        <div class="event-excerpt"><?php echo wpautop( wp_trim_words( get_the_excerpt(), 15 ) ); ?></div>

						                        <a class="btn btn-border btn-lg" href="<?php the_permalink(); ?>"><?php echo apply_filters( 'xt_event_details_text', esc_html( $details_btn_text ) ) ?></a>
						                    </div>
							            </div>
							        </div>

						    	<?php endif; ?>

							<?php endwhile; ?>	
						</div>
					<?php
				}
			wp_reset_postdata();
		    return ob_get_clean();
		}
	}
}


/**
 * Donation Causes ShortCode
 */
if ( class_exists( 'Charitable' ) ){
	add_shortcode( 'xt_donation_causes', 'humane_donation_causes_shortcode' );

	if( !function_exists('humane_donation_causes_shortcode') ){
		function humane_donation_causes_shortcode( $atts ){
			extract(shortcode_atts(array(
				'post'  				=> 3,
				'order' 				=> 'ASC',
				'orderby' 				=> 'date',
				'autoplay'				=> 'false',
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
				'progress_bar_type'	    => 'circular', // default, circular
				'image_size_type'		=> 'default', // default / custom
				'image_width'			=> 460,
				'image_height'			=> 460,
				'donate_btn'			=> 'on',
				'cause_excerpt'			=> 'on',
				'cause_progress_bar'	=> 'on',
				'excerpt_length'		=> 10,
				'creator'          		=> '',
				'include_inactive' 		=> 'no',

		    ), $atts));

			$post_in 		= ( $post_in ? explode( ',', $post_in ) : null );
			$post_not_in 	= ( $post_not_in ? explode( ',', $post_not_in ) : null );

			$args = array( 
				'post_type' 				=> 'campaign', 
				'orderby' 					=> $orderby,
				'order' 					=> $order,
				'posts_per_page' 			=> $post,
				'post__in' 					=> $post_in,
				'post__not_in' 				=> $post_not_in
			);

			// only form selected causes categories
			if( $causes_categories && $causes_categories != '' ){
				$causes_categories = explode(',', $causes_categories);
				$args['tax_query'][] = array(
					'taxonomy' 	=> 'campaign_category',
			        'field'    	=> 'id',
					'terms'    	=> $causes_categories,
			        'operator' 	=> 'IN' 
				);
			}

			// only form selected causes tags
			if( $causes_tags && $causes_tags != '' ){
				$causes_tags = explode(',', $causes_tags);
				$args['tax_query'][] = array(
					'taxonomy' 	=> 'campaign_tag',
			        'field'    	=> 'id',
					'terms'    	=> $causes_tags,
			        'operator' 	=> 'IN' 
				);
			}

			// only form selected author
			if( $creator && $creator != '' ){
				$args['author'] = $creator;
			}

			/* Only include active campaigns if flag is set */
			if ( ( ! $include_inactive ) || ( $include_inactive == 'yes' ) ) {
				$args['meta_query'] = array(
					'relation' => 'OR',
					array(
						'key'       => '_campaign_end_date',
						'value'     => date( 'Y-m-d H:i:s' ),
						'compare'   => '>=',
						'type'      => 'datetime',
					),
					array(
						'key'       => '_campaign_end_date',
						'value'     => 0,
						'compare'   => '=',
					),
				);
			}

			$wp_query = new WP_Query( $args );

			$row 			= ( $type == 'grid' ? ' row' : '' );

			if( $column ){
				$column = 12/$column;
				$column = 'col-lg-'.$column . ' col-md-4 col-sm-6';
			}

			$column = ( $type == 'grid' ? apply_filters( 'humane_causes_grid_column', $column ) : '' );

			ob_start();

			if ( $wp_query->have_posts() ): ?>

				<div class="humane-donation-causes humane-donation-causes-<?php echo esc_attr( $type.$row ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-items="<?php echo esc_attr( $items ); ?>" data-desktopsmall="<?php echo esc_attr( $desktopsmall ); ?>" data-tablet="<?php echo esc_attr( $tablet ); ?>" data-mobile="<?php echo esc_attr( $mobile ); ?>" data-navigation="<?php echo esc_attr( $navigation) ; ?>" data-pagination="<?php echo esc_attr( $pagination ); ?>" data-loop="<?php echo esc_attr( $loop ); ?>" data-direction="<?php echo esc_attr( ( is_rtl() ? 'true' : 'false' ) ); ?>">

					<?php 
						while ($wp_query->have_posts()) : $wp_query->the_post();
						global $post;
						$campaign = charitable_get_campaign( get_the_ID() );
					?>

						<div <?php post_class( array( 'humane-donation-cause-item', 'ch-causes', $column ) ) ?>>
							<div class="cause-inner clearfix shadow shadow-hover">
								<?php if( has_post_thumbnail() ):?>
									<?php if( $type == 'list'): ?>
										<div class="col-md-6 padding-o">
									<?php endif; ?>
			                        	<a href="<?php esc_url( the_permalink() ); ?>">
											<?php
												if( $image_size_type == 'default' ){
													the_post_thumbnail( apply_filters( 'humane_causes_image_size', 'humane-campaign-thumb-grid' ) );
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
									<div class="col-md-6 padding-o">
								<?php endif; ?>
		                        <div class="cause-inner-content">
		                            <h3>
										<a href="<?php esc_url( the_permalink() ) ?>"><?php the_title(); ?></a>
									</h3>

		                            <?php 
			                            if( $cause_progress_bar == 'on' && $progress_bar_type == 'circular' && function_exists('humane_charitable_template_campaign_progress_bar') ){
			                            	humane_charitable_template_campaign_progress_bar( $campaign );
			                            }
		                            ?>

		                            <?php 
		                            	if( $cause_excerpt == 'on' ){
		                            		echo wpautop( wp_trim_words( get_the_excerpt(), $excerpt_length ) );
		                           		}

		                           		if( $cause_progress_bar == 'on' && $progress_bar_type == 'default' && function_exists('humane_charitable_template_campaign_progress_bar_default') ){
			                            	humane_charitable_template_campaign_progress_bar_default( $campaign );
			                            }

		                           		if( $donate_btn == 'on' ){
		                           			if( function_exists('charitable_template_campaign_loop_donate_link') ){
		                           				charitable_template_campaign_loop_donate_link( $campaign, array() );
		                           			}
		                            		if( $campaign->has_ended() ){
		                            			printf( '<a class="btn btn-border btn-lg" href="%s">%s</a>', esc_url(get_the_permalink()), esc_html( humane_cs_get_option( 'donate_button_text_expired', esc_html__( 'Details', 'xt-humane-cpt-shortcode' ) ) ) );
		                            		}
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
 * Campaign Search
 */
if ( class_exists( 'Charitable' ) ){
	add_shortcode( 'xt_campaign_search', 'humane_campaign_search' );

	if( !function_exists('humane_campaign_search') ){
		function humane_campaign_search( $atts ){
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

		    $campaigns_count = Charitable_Campaigns::query( array( 'posts_per_page' => -1, 'fields' => 'ids' ) )->found_posts;
			$campaigns_text  = 1 == $campaigns_count ? esc_html__( 'Campaign', 'xt-humane-cpt-shortcode' ) : esc_html__( 'Campaigns', 'xt-humane-cpt-shortcode' );
			$donated_amount = charitable_format_money( charitable_get_table( 'campaign_donations' )->get_total(), 0 );
			$donors_count = charitable_get_table( 'donors' )->count_donors_with_donations();
			$donors_text  = 1 == $donors_count ? esc_html__( 'Donor', 'xt-humane-cpt-shortcode' ) : esc_html__( 'Donors', 'xt-humane-cpt-shortcode' );

			if( $before_search_img ){
				$before_search_img = wp_get_attachment_image( $before_search_img, 'full' );
			}

			add_action( 'wp_footer', 'humane_ajax_course_search_base' );
			
		    ob_start();
		    ?>
				<div class="ch-campaign-search<?php echo esc_attr( $x_class ? ' '.$x_class : '' ); ?>">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<?php echo ( $before_search_img ? '<div class="ch-search-logo">'.$before_search_img.'</div>' : '' ); ?>
							<?php echo ( $before_search_title ? '<h2>'. esc_html( $before_search_title ) .'</h2>' : '' ); ?>
							<?php echo ( $before_search_subtitle ? '<h4>'. esc_html( $before_search_subtitle ) .'</h4>' : '' ); ?>
						</div>
					</div>
					<form role="search" action="<?php echo esc_url( site_url('/') ); ?>" method="get" id="searchform">
						<fieldset>
							<div class="input-group">
								<?php if( is_search() ):?>
									<input class="form-control ch-campaign-search-field" type="text" name="s" value="<?php echo esc_attr(apply_filters('the_search_query', get_search_query())); ?>"/>
								<?php else:?>
									<input class="form-control ch-campaign-search-field" type="text" name="s" placeholder="<?php echo esc_attr( $placeholder ); ?>"/>
								<?php endif;?>
								<input type="hidden" name="post_type" value="campaign" />
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
										printf( '<li><i class="fa flaticon-graphic"></i><span class="ch-campaign-count">%d</span> %s</li>', $campaigns_count, $campaigns_text );
									}
									if( $show_campaign_donated_amount == 'on' ){
										printf( '<li><i class="fa flaticon-money"></i><span class="ch-campaign-donated-amount">%s</span> %s</li>', $donated_amount, esc_html__( 'Donated', 'xt-humane-cpt-shortcode' ) );
									}
									if( $show_campaign_donors_count == 'on' ){
										printf( '<li><i class="fa flaticon-profile"></i><span class="ch-campaign-donors-count">%s</span> %s</li>', $donors_count, $donors_text );
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
 * Campaign Search Process
 */
add_action('wp_ajax_nopriv_humane_ajax_campaign_search','humane_ajax_campaign_search');
add_action('wp_ajax_humane_ajax_campaign_search','humane_ajax_campaign_search');

if(!function_exists('humane_ajax_campaign_search')){
	function humane_ajax_campaign_search(){
		$args = array (
			'post_type' 		=> 'campaign',
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
 * Define home url for ajax course search
 */
if(!function_exists('humane_ajax_course_search_base')){
	function humane_ajax_course_search_base(){
		?>
			<script type="text/javascript">var ep_home_url = "<?php echo esc_url( home_url() ) ?>";</script>
		<?php
	}
}


/**
 * Donate stats
 */
if ( class_exists( 'Charitable' ) ){
	add_shortcode( 'xt_donation_stats', 'humane_donation_stats_shortcode' );

	if( !function_exists('humane_donation_stats_shortcode') ){
		function humane_donation_stats_shortcode($atts){
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

		    $campaigns_count = Charitable_Campaigns::query( array( 'posts_per_page' => -1, 'fields' => 'ids' ) )->found_posts;
			$campaigns_text  = 1 == $campaigns_count ? $campaigns_text_singular : $campaigns_text_plural;
			$donated_amount = charitable_format_money( charitable_get_table( 'campaign_donations' )->get_total(), 0 );
			$donors_count = charitable_get_table( 'donors' )->count_donors_with_donations();
			$donors_text  = 1 == $donors_count ? $donor_text_singular : $donor_text_plural;


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
							printf( '<div class="%s"><div class="ch-donation-stats-item shadow"><i class="fa flaticon-graphic"></i><span class="ch-campaign-count ch-campaign-stats-count">%d</span><span class="ch-campaign-stats-text">%s</span></div></div>', esc_attr($column), $campaigns_count, $campaigns_text );
						}
						if( $show_campaign_donated_amount == 'on' ){
							printf( '<div class="%s"><div class="ch-donation-stats-item shadow"><i class="fa flaticon-money"></i><span class="ch-campaign-donated-amount ch-campaign-stats-count">%s</span><span class="ch-campaign-stats-text">%s</span></div></div>', esc_attr($column), $donated_amount, $donated_text );
						}
						if( $show_campaign_donors_count == 'on' ){
							printf( '<div class="%s"><div class="ch-donation-stats-item shadow"><i class="fa flaticon-profile"></i><span class="ch-campaign-donors-count ch-campaign-stats-count">%s</span><span class="ch-campaign-stats-text">%s</span></div></div>', esc_attr($column), $donors_count, $donors_text );
						}
					?>
		        </div>
	        </div>

			<?php
		    return ob_get_clean();
		}
	}
}






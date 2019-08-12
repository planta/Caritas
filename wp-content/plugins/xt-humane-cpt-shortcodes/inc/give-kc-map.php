<?php


/**
 * Donation Causes Addon
 */
if ( class_exists( 'Give' ) ){
	kc_add_map(					    
	    array(  
	        'xt_give_donation_forms' 	=> array(
	            'name' 					=> esc_html__('Give Donation Forms', 'xt-humane-cpt-shortcode'),
	            'description'			=> esc_html__('Donation Forms grid / list / slider (Theme Custom).', 'xt-humane-cpt-shortcode'),
	            'icon' 					=> 'fa-keyboard-o',
	            'category'				=> 'Give',
	            'params' 				=> array(
	            	esc_html__('General', 'xt-humane-cpt-shortcode') 	=> array(
	    				array(
							'label'   		=> esc_html__('Content type', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'type',	
							'type' 			=> 'select',  
							'options' 		=> array(    
								'grid' 		=> esc_html__( 'Grid', 'xt-humane-cpt-shortcode' ),
								'slider' 	=> esc_html__( 'Slider', 'xt-humane-cpt-shortcode' ),
								'list' 		=> esc_html__( 'List', 'xt-humane-cpt-shortcode' )
							),
							'value' 		=> 'grid', 
							'admin_label'	=> true,
							'description'	=> esc_html__('Cause content type. Grid / slider / list.', 'xt-humane-cpt-shortcode')
						),
						array(
							'label'   		=> esc_html__('Image Size', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'image_size_type',	
							'type' 			=> 'select',  
							'admin_label' 	=> true,
							'options' 		=> array(    
								'default' 	=> esc_html__( 'Default', 'xt-humane-cpt-shortcode' ),
								'custom' 	=> esc_html__( 'Custom Size', 'xt-humane-cpt-shortcode' ),
							),
							'value' 		=> 'default', 
							'description' 	=> esc_html__('Image size, If use use custom image size, make sure you upload larger image then the define size here.', 'xt-humane-cpt-shortcode'),
							'admin_label' 	=> true,
						),
						array(
						    'label' 		=> esc_html__('Image Width', 'xt-humane-cpt-shortcode'),
						    'name' 			=> 'image_width',
						    'type' 			=> 'number_slider',
						    'options' 		=> array(
						        'min' 		=> esc_html__('300', 'xt-humane-cpt-shortcode'),
						        'max'		=> esc_html__('1080', 'xt-humane-cpt-shortcode'),
						        'show_input'=> true
						    ),
						    'value'         => '450',
						    'description' 	=> esc_html__('Cause image width. Default 450.', 'xt-humane-cpt-shortcode'),
							'relation' 		=> array(
								'parent' 	=> 'image_size_type',
								'show_when' => 'custom'
							),
						    'admin_label'   => true
						),
						array(
						    'label' 		=> esc_html__('Image Height', 'xt-humane-cpt-shortcode'),
						    'name' 			=> 'image_height',
						    'type' 			=> 'number_slider',
						    'options' 		=> array(
						        'min' 		=> esc_html__('300', 'xt-humane-cpt-shortcode'),
						        'max'		=> esc_html__('1080', 'xt-humane-cpt-shortcode'),
						        'show_input'=> true
						    ),
						    'value'         => '450',
						    'description' 	=> esc_html__('Cause image height. Default 450.', 'xt-humane-cpt-shortcode'),
							'relation' 		=> array(
								'parent' 	=> 'image_size_type',
								'show_when' => 'custom'
							),
						    'admin_label'   => true
						),
						array(
							'label'   		=> esc_html__('Cause grid columns', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'column',	
							'type' 			=> 'select',  
							'options' 		=> array(    
								'6' 		=> esc_html__( '6 Columns', 'xt-humane-cpt-shortcode' ),
								'4' 		=> esc_html__( '4 Columns', 'xt-humane-cpt-shortcode' ),
								'3' 		=> esc_html__( '3 Columns', 'xt-humane-cpt-shortcode' ),
								'2' 		=> esc_html__( '2 Columns', 'xt-humane-cpt-shortcode' ),
								'1' 		=> esc_html__( '1 Columns', 'xt-humane-cpt-shortcode' ),
							),
							'value' 		=> '3', 
							'relation'	 	=> array(
								'parent' 	=> 'type',
								'show_when' => 'grid'
							),
							'description'	=> esc_html__('Default 3 columns.', 'xt-humane-cpt-shortcode'),
							'admin_label'	=> true,
						),
						array(
						    'label' 		=> esc_html__('Number of donation forms', 'xt-humane-cpt-shortcode'),
						    'name' 			=> 'post',
						    'type' 			=> 'number_slider',
						    'options' 		=> array(
						        'min' 		=> esc_html__('1', 'xt-humane-cpt-shortcode'),
						        'max'		=> esc_html__('15', 'xt-humane-cpt-shortcode'),
						        'show_input'=> true
						    ),
						    'value'         => '6',
						    'description' 	=> esc_html__('Number of Cause to show. Default 6.', 'xt-humane-cpt-shortcode'),
						    'admin_label'	=> true,
						),
						array(
							'label'   		=> esc_html__('Order by', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'orderby',	
							'type' 			=> 'select',  
							'admin_label' 	=> true,
							'options' 		=> array(    
								'menu_order'		=> esc_html__('Menu Order', 'xt-humane-cpt-shortcode'),
								'date' 				=> esc_html__('Date', 'xt-humane-cpt-shortcode'),
								'title' 			=> esc_html__('Title', 'xt-humane-cpt-shortcode'),
								'id' 				=> esc_html__('ID', 'xt-humane-cpt-shortcode'),
								'last_modified' 	=> esc_html__('Last modified', 'xt-humane-cpt-shortcode'),
								'random' 			=> esc_html__('Random', 'xt-humane-cpt-shortcode'),
							),
							'value' 		=> 'menu_order', 
							'description'	=> esc_html__('Donation forms orderby.', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Order', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'order',
							'type' 			=> 'select',  
							'admin_label' 	=> true,
							'options' 		=> array(    
								'ASC' 		=> esc_html__('Ascending', 'xt-humane-cpt-shortcode'),
								'DESC' 		=> esc_html__('Descending', 'xt-humane-cpt-shortcode'),
							),
							'value' 		=> 'ASC', 
							'description' 	=> esc_html__('Cause\'s order.', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'  		=> esc_html__('Donation Form Creator', 'xt-humane-cpt-shortcode'),
							'name' 		   	=> 'creator',
							'type'        	=> 'text',
							'description'  	=> esc_html__( 'Only show donation forms created by a certain user. Comma separated user IDs.', 'xt-humane-cpt-shortcode' ),
							'admin_label'  	=> true,
						),
						array(
							'label'   		=> esc_html__('Donation forms categories', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'causes_categories',
							'type'         	=> 'text',
							'description'  	=> esc_html__( 'Comma separated donation forms categories id. It will show donation forms form this categories only.', 'xt-humane-cpt-shortcode' ),
							'admin_label'  	=> true,
						),
						array(
							'label'   		=> esc_html__('Donation forms tags', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'causes_tags',
							'type'         	=> 'text',
							'description'  	=> esc_html__( 'Comma separated donation forms tags id. It will show donation forms form this tags only.', 'xt-humane-cpt-shortcode' ),
							'admin_label'  	=> true,
						),
						array(
							'label'  		=> esc_html__('Donation form ids', 'xt-humane-cpt-shortcode'),
							'name' 		   	=> 'post_in',
							'type'        	=> 'text',
							'description'  	=> esc_html__( 'Comma separated donation form ids. It will show this selected donation forms only.', 'xt-humane-cpt-shortcode' ),
							'admin_label'  	=> true,
						),
						array(
							'label'   		=> esc_html__('Donation form ids to exclude', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'post_not_in',
							'type'         	=> 'text',
							'description'  	=> esc_html__( 'Comma separated Donation form ids to exclude.', 'xt-humane-cpt-shortcode' ),
							'admin_label'  	=> true,
						),
					),

					esc_html__('Slider Settings', 'xt-humane-cpt-shortcode') => array(
						array(
							'label'   		=> esc_html__('Slider Autoplay', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'autoplay',	
							'type' 			=> 'toggle',  
							'admin_label'	=> true,
							'value' 		=> 'yes',
							'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Slider Navigation', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'navigation',	
							'type' 			=> 'toggle',  
							'admin_label'	=> true,
							'value' 		=> 'yes',
							'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Slider Pagination', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'pagination',	
							'type' 			=> 'toggle',  
							'admin_label'	=> true,
							'value' 		=> 'no',
							'description'	=> esc_html__('Default Off.', 'xt-humane-cpt-shortcode'),
						),
					    array(
							'label'   		=> esc_html__('Slider Loop', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'loop',	
							'type' 			=> 'toggle',  
							'admin_label'	=> true,
							'value' 		=> 'yes',
							'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Slider Columns Default', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'items',	
							'type' 			=> 'number',  
							'admin_label'	=> true,
							'value' 		=> '3',
							'description'	=> esc_html__('Number of slider columns in default screen. Default: 3.', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Slider Columns in Desktop Small', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'desktopsmall',	
							'type' 			=> 'number',  
							'admin_label'	=> true,
							'value' 		=> '3',
							'description'	=> esc_html__('Slider Columns in small desktop screen. Default: 3', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Slider Columns in Tablet', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'tablet',	
							'type' 			=> 'number',  
							'admin_label'	=> true,
							'value' 		=> '2',
							'description'	=> esc_html__('Slider Columns in tablet screen. Default: 2', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Slider Columns in Mobile', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'mobile',	
							'type' 			=> 'number',  
							'admin_label'	=> true,
							'value' 		=> '1',
							'description'	=> esc_html__('Slider Columns in Mobile screen. Default: 1', 'xt-humane-cpt-shortcode'),
						),
					),			

					esc_html__('Content settings', 'xt-humane-cpt-shortcode') => array(
						array(
							'label'   		=> esc_html__('Show Donation form short description', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'cause_excerpt',	
							'type' 			=> 'toggle_on_off',  
							'admin_label'	=> true,
							'value' 		=> 'on',
							'description'	=> esc_html__('Enable or disable the short description. Default: On.', 'xt-humane-cpt-shortcode')
						),
						array(
							'label'   		=> esc_html__('Donation form excerpt length', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'excerpt_length',	
							'type' 			=> 'number',  
							'admin_label'	=> true,
							'value' 		=> '10',
							'relation' 		=> array(
								'parent' 	=> 'cause_excerpt',
								'show_when' => 'yes'
							),
							'description'	=> esc_html__('Default 10 words.', 'xt-humane-cpt-shortcode'),
						),
						array(
							'label'   		=> esc_html__('Show Donate button', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'donate_btn',	
							'type' 			=> 'toggle_on_off',  
							'admin_label'	=> true,
							'value' 		=> 'on',
							'description'	=> esc_html__('Default yes, Check this to disable.', 'xt-humane-cpt-shortcode')
						),
						array(
							'label'   		=> esc_html__('Show Donation stats', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'cause_stats',	
							'type' 			=> 'toggle_on_off',  
							'admin_label'	=> true,
							'value' 		=> 'on',
							'description'	=> esc_html__('Default yes, Check this to disable.', 'xt-humane-cpt-shortcode')
						),
						array(
							'label'   		=> esc_html__('Show progress bar', 'xt-humane-cpt-shortcode'),
							'name' 			=> 'cause_progress_bar',	
							'type' 			=> 'toggle_on_off',  
							'admin_label'	=> true,
							'value' 		=> 'on',
							'description'	=> esc_html__('Default yes, Check this to disable.', 'xt-humane-cpt-shortcode')
						),

					),
	            ),
	        ),	 
	    ) 
	);
}


/**
 * Give Campaign Search Addon
 */
if ( class_exists( 'Give' ) ){			
	kc_add_map(					    
	    array(  
	        'xt_give_campaign_search' 	=> array(
	            'name' 					=> esc_html__('Donation Form Search', 'xt-humane-cpt-shortcode'),
	            'description'			=> esc_html__('Ajax search box for searching Give donaton forms.', 'xt-humane-cpt-shortcode'),
	            'icon' 					=> 'fa-keyboard-o',
	            'category'				=> 'Give',
	            'params' 				=> array(
		            array(
                        'label'        	=> esc_html__( 'Logo image', 'xt-humane-cpt-shortcode' ),
                        'type'         	=> 'attach_image',
                        'name'         	=> 'before_search_img',
                        'description'  	=> esc_html__( 'You can upload a image / logo here, it will show on top of the search box.', 'xt-humane-cpt-shortcode' ),
                    ),
	                array(
	                    'label'     	=> esc_html__( 'Title text', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'before_search_title',
	                    'type'        	=> 'text',
	                    'description'  	=> esc_html__( 'Title text, It will show on top of the search box.', 'xt-humane-cpt-shortcode' ),
	                    'admin_label' 	=> true,
	                    'value'		 	=> esc_html__( 'Search Campaigns', 'xt-humane-cpt-shortcode' ),
	                ),
	                array(
	                    'label'     	=> esc_html__( 'Subtitle text', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'before_search_subtitle',
	                    'type'        	=> 'text',
	                    'admin_label' 	=> true,
	                    'description'   => esc_html__( 'Subtitle text, It will show on top of the search box.', 'xt-humane-cpt-shortcode' )
	                ),
	                array(
	                    'label'     	=> esc_html__( 'Search placeholder', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'placeholder',
	                    'type'        	=> 'text',
	                    'admin_label' 	=> true,
	                    'description'   => esc_html__( 'Search box placeholder text.', 'xt-humane-cpt-shortcode' ),
	                    'value'  		=> esc_html__( 'Search...', 'xt-humane-cpt-shortcode' )
	                ),
				    array(
						'label'   		=> esc_html__('Show Donation Statics', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'after_search_stats',	
						'type' 			=> 'toggle_on_off',  
						'admin_label'	=> true,
						'value' 		=> 'on',
						'description'	=> esc_html__('Show donation statics bellow the search box. Default: Yes.', 'xt-humane-cpt-shortcode'),
					),
				    array(
						'label'   		=> esc_html__('Show Campaign Count', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_campaign_count',	
						'type' 			=> 'toggle_on_off',  
						'admin_label'	=> true,
						'value' 		=> 'on',
						'relation' 		=> array(
							'parent' 	=> 'after_search_stats',
							'show_when' => 'on'
						)
					),
				    array(
						'label'   		=> esc_html__('Show Campaign Donated Amount', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_campaign_donated_amount',	
						'type' 			=> 'toggle_on_off',  
						'admin_label'	=> true,
						'value' 		=> 'on',
						'relation' 		=> array(
							'parent' 	=> 'after_search_stats',
							'show_when' => 'on'
						)
					),
				    array(
						'label'   		=> esc_html__('Show Campaign Donors Count', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_campaign_donors_count',	
						'type' 			=> 'toggle_on_off',  
						'admin_label'	=> true,
						'value' 		=> 'on',
						'relation' 		=> array(
							'parent' 	=> 'after_search_stats',
							'show_when' => 'on'
						)
					),
					array(
	                    'label'     	=> esc_html__( 'Extra class', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'x_class',
	                    'type'        	=> 'text',
	                    'description'  	=> esc_html__( 'Extra css class.', 'xt-humane-cpt-shortcode' ),
	                    'admin_label' 	=> true,
	                ),				
	            ),
	        ),	 
	    ) 
	);
}


/**
 * Campaign stats [ Real Data ] Addon
 */
if ( class_exists( 'Give' ) ){			
	kc_add_map(					    
	    array(  
	        'xt_give_donation_stats' 	=> array(
	            'name' 					=> esc_html__('Give Donation Stats', 'xt-humane-cpt-shortcode'),
	            'description'			=> esc_html__('Charitable Give Donation statics.', 'xt-humane-cpt-shortcode'),
	            'icon' 					=> 'fa-keyboard-o',
	            'category'				=> 'Give',
	            'params' 				=> array(
					array(
						'label'   		=> esc_html__('Columns', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'column',	
						'type' 			=> 'select',  
						'admin_label'	=> true,
						'options' 		=> array(    
							'6' 		=> esc_html__( '6 Columns', 'xt-humane-cpt-shortcode' ),
							'4' 		=> esc_html__( '4 Columns', 'xt-humane-cpt-shortcode' ),
							'3' 		=> esc_html__( '3 Columns', 'xt-humane-cpt-shortcode' ),
							'2' 		=> esc_html__( '2 Columns', 'xt-humane-cpt-shortcode' ),
							'1' 		=> esc_html__( '1 Columns', 'xt-humane-cpt-shortcode' ),
						),
						'value' 		=> '3', 
						'description'	=> esc_html__('Default 3 columns.', 'xt-humane-cpt-shortcode'),
					),
				    array(
						'label'   		=> esc_html__('Show Campaign Count', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_campaign_count',	
						'type' 			=> 'toggle_on_off',  
						'admin_label'	=> true,
						'value' 		=> 'on',
					),
	                array(
	                    'label'     	=> esc_html__( 'Campaigns Text Singular', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'campaigns_text_singular',
	                    'type'        	=> 'text',
	                    'description'  	=> esc_html__( 'Campaigns text for singular number.', 'xt-humane-cpt-shortcode' ),
	                    'admin_label' 	=> true,
	                    'value'		 	=> esc_html__( 'Campaign', 'xt-humane-cpt-shortcode' ),
	                    'relation' 		=> array(
							'parent' 	=> 'show_campaign_count',
							'show_when' => 'on'
						)
	                ),
	                array(
	                    'label'     	=> esc_html__( 'Campaigns Text Plural', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'campaigns_text_plural',
	                    'type'        	=> 'text',
						'value'		 	=> esc_html__( 'Campaigns', 'xt-humane-cpt-shortcode' ),
	                    'description'  	=> esc_html__( 'Campaigns text for plural number.', 'xt-humane-cpt-shortcode' ),
	                    'admin_label' 	=> true,
	                    'relation' 		=> array(
							'parent' 	=> 'show_campaign_count',
							'show_when' => 'on'
						)
	                ),
				    array(
						'label'   		=> esc_html__('Show Campaign Donated Amount', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_campaign_donated_amount',	
						'type' 			=> 'toggle_on_off',  
						'admin_label'	=> true,
						'value' 		=> 'on',
					),
	                array(
	                    'label'     	=> esc_html__( 'Donated Text', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'donated_text',
	                    'type'        	=> 'text',
	                    'admin_label' 	=> true,
	                    'value'		 	=> esc_html__( 'Donated', 'xt-humane-cpt-shortcode' ),
	                    'relation' 		=> array(
							'parent' 	=> 'show_campaign_donated_amount',
							'show_when' => 'on'
						)
	                ),
				    array(
						'label'   		=> esc_html__('Show Campaign Donor Count', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_campaign_donors_count',	
						'type' 			=> 'toggle_on_off',  
						'admin_label'	=> true,
						'value' 		=> 'on',
					),
	                array(
	                    'label'     	=> esc_html__( 'Donor Text Singular', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'donor_text_singular',
	                    'type'        	=> 'text',
	                    'description'  	=> esc_html__( 'Donor text for singular number.', 'xt-humane-cpt-shortcode' ),
	                    'admin_label' 	=> true,
	                    'value'		 	=> esc_html__( 'Donor', 'xt-humane-cpt-shortcode' ),
	                    'relation' 		=> array(
							'parent' 	=> 'show_campaign_donors_count',
							'show_when' => 'on'
						)
	                ),
	                array(
	                    'label'     	=> esc_html__( 'Donor Text Plural', 'xt-humane-cpt-shortcode' ),
	                    'name'      	=> 'donor_text_plural',
	                    'type'        	=> 'text',
	                    'description'  	=> esc_html__( 'Donor text for plural number.', 'xt-humane-cpt-shortcode' ),
	                    'admin_label' 	=> true,
	                    'value'		 	=> esc_html__( 'Donors', 'xt-humane-cpt-shortcode' ),
	                    'relation' 		=> array(
							'parent' 	=> 'show_campaign_donors_count',
							'show_when' => 'on'
						)
	                ),				
	            ),
	        ),	 
	    ) 
	);
}


/**
 * Give Profile Editor Addon
 */
if ( class_exists( 'Give' ) ){			
	kc_add_map(					    
	    array(  
	        'give_profile_editor' 			=> array(
	            'name' 						=> esc_html__('Profile Editor', 'xt-humane-cpt-shortcode'),
	            'description'				=> esc_html__('Give plugin profile editor form.', 'xt-humane-cpt-shortcode'),
	            'icon' 						=> 'fa-keyboard-o',
	            'category'					=> 'Give',
	            'params' 					=> array(),
	            'show_settings_on_create'   => false,
	        ),	 
	    ) 
	);
}


/**
 * Charitable Login Addon
 */
if ( class_exists( 'Give' ) ){			
	kc_add_map(					    
	    array(  
	        'give_login' 					=> array(
	            'name' 						=> esc_html__('Give Login Form', 'xt-humane-cpt-shortcode'),
	            'description'				=> esc_html__('Give plugin login form.', 'xt-humane-cpt-shortcode'),
	            'icon' 						=> 'fa-keyboard-o',
	            'category'					=> 'Give',
	            'params' 					=> array(
	            	'label'     			=> esc_html__( 'Logging Redirect', 'xt-humane-cpt-shortcode' ),
                    'name'      			=> 'login-redirect',
                    'type'        			=> 'text',
                    'admin_label' 			=> true,
					'description'  			=> esc_html__( 'It is also possible to change the default page that people are redirected to after logging in.', 'xt-humane-cpt-shortcode' ),

	            ),
	        ),	 
	    ) 
	);
}


/**
 * Charitable Registration Addon
 */
if ( class_exists( 'Give' ) ){			
	kc_add_map(					    
	    array(  
	        'give_register' 				=> array(
	            'name' 						=> esc_html__('Give Registration Form', 'xt-humane-cpt-shortcode'),
	            'description'				=> esc_html__('Give plugin registration form.', 'xt-humane-cpt-shortcode'),
	            'icon' 						=> 'fa-keyboard-o',
	            'category'					=> 'Give',
	            'params' 					=> array(
	            	'label'     			=> esc_html__( 'Registration Redirect', 'xt-humane-cpt-shortcode' ),
                    'name'      			=> 'redirect',
                    'type'        			=> 'text',
                    'admin_label' 			=> true,
					'description'  			=> esc_html__( 'No Default value. Insert the url of the page you want to redirect your donors to upon successful registration.', 'xt-humane-cpt-shortcode' ),

	            ),
	        ),	 
	    ) 
	);
}


/**
 * Give Donation Form Addon
 */

$categories_options = array();
$categories = get_posts(array( 'post_type' => 'give_forms', 'posts_per_page'   => -1 ));
if( isset($categories) && !empty($categories) ){
    foreach ($categories as $category) {
        $categories_options[$category->ID] = esc_html( get_the_title( $category->ID ) );
    }
}

if ( class_exists( 'Give' ) ){			
	kc_add_map(					    
	    array(  
	        'give_form' 					=> array(
	            'name' 						=> esc_html__('Give Donation Form', 'xt-humane-cpt-shortcode'),
	            'description'				=> esc_html__('Give plugin donation form.', 'xt-humane-cpt-shortcode'),
	            'icon' 						=> 'fa-keyboard-o',
	            'category'					=> 'Give',
	            'params' 					=> array(
					array(
						'label' 		=> esc_html__( 'Form ID', 'xt-humane-cpt-shortcode' ),
						'name' 			=> 'id',
						'type' 			=> 'select',
						'description' 	=> esc_html__( 'The "id" is a required attribute for this shortcode. The "id" should be the post ID of a published donation form.', 'xt-humane-cpt-shortcode' ),
						'options' 		=> $categories_options,
						'admin_label' 	=> true,
					),
				    array(
						'label'   		=> esc_html__('Show Title', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_title',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'true',
						'description'	=> esc_html__('This allows you to display the form with or without the Title. The default is On.', 'xt-humane-cpt-shortcode'),
					),
				    array(
						'label'   		=> esc_html__('Show Goal', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_goal',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'true',
						'description'	=> esc_html__('This allows you to display the form with or without the goal. The default is On.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Show Content', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_content',	
						'type' 			=> 'select',  
						'admin_label' 	=> true,
						'options' 		=> array(    
							'' 			=> esc_html__( 'Select a option', 'xt-humane-cpt-shortcode' ),
							'above' 	=> esc_html__( 'Above', 'xt-humane-cpt-shortcode' ),
							'below' 	=> esc_html__( 'Below', 'xt-humane-cpt-shortcode' ),
							'none' 		=> esc_html__( 'None', 'xt-humane-cpt-shortcode' )
						),
						'description' 	=> esc_html__('Show donation content.', 'xt-humane-cpt-shortcode'),
						'admin_label' 	=> true,
					),
					array(
						'label'   		=> esc_html__('Display Style', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'display_style',	
						'type' 			=> 'select',  
						'admin_label' 	=> true,
						'options' 		=> array(    
							'' 			=> esc_html__( 'Select a option', 'xt-humane-cpt-shortcode' ),
							'onpage' 	=> esc_html__( 'onpage', 'xt-humane-cpt-shortcode' ),
							'modal' 	=> esc_html__( 'modal', 'xt-humane-cpt-shortcode' ),
							'reveal' 	=> esc_html__( 'reveal', 'xt-humane-cpt-shortcode' ),
							'button' 	=> esc_html__( 'button', 'xt-humane-cpt-shortcode' )
						),
						'description' 	=> esc_html__('This allows you to override the method of displaying the forms payment/additional fields.', 'xt-humane-cpt-shortcode'),
						'admin_label' 	=> true,
					),
					array(
						'label'  		=> esc_html__('Button Title', 'xt-humane-cpt-shortcode'),
						'name' 		   	=> 'continue_button_title',
						'type'        	=> 'text',
						'description'  	=> esc_html__( 'This enables the modal, button, and reveal buttons text to be customized, per shortcode.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
	            ),
	        ),	 
	    ) 
	);
}



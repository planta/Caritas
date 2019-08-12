<?php

/**
 * Mapping theme shortcodes to KingComposer 
 */


add_action('init', 'humane_shortcodes_kingcomposer_mapping', 99 );
 
if ( !function_exists('humane_shortcodes_kingcomposer_mapping') ) { 
	function humane_shortcodes_kingcomposer_mapping(){

		if (function_exists('kc_add_map')) {

			/**
			 * Section Title Addon
			 */
			kc_add_map(					    
			    array(  
			        'xt_section_title' 	=> array(
			            'name' 					=> esc_html__('Section Title', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('Section title and sub-title.', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-keyboard-o',
			            'category'				=> 'Humane',
			            'params' 				=> array(
			                array(
			                    'label'     	=> esc_html__( 'Title', 'xt-humane-cpt-shortcode' ),
			                    'name'      	=> 'section_title',
			                    'type'        	=> 'text',
			                    'admin_label' 	=> true,
			                ),
			                array(
			                    'label'     	=> esc_html__( 'Title Highlight', 'xt-humane-cpt-shortcode' ),
			                    'name'      	=> 'title_highlight',
			                    'description' 	=> esc_html__('Select text second part.', 'xt-humane-cpt-shortcode'),
			                    'type'        	=> 'text',
			                    'admin_label' 	=> true,
			                ),
			                array(
			                    'label'     	=> esc_html__( 'Sub Title', 'xt-humane-cpt-shortcode' ),
			                    'name'      	=> 'section_subtitle',
			                    'type'        	=> 'text',
			                    'admin_label' 	=> true,
			                ),
							array(
								'label'   		=> esc_html__('Title Align', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'title_align',	
								'type' 			=> 'select',  
								'options' 		=> array(    
									'center' 	=> esc_html__( 'Center', 'xt-humane-cpt-shortcode' ),
									'left' 		=> esc_html__( 'Left', 'xt-humane-cpt-shortcode' ),
									'right' 	=> esc_html__( 'Right', 'xt-humane-cpt-shortcode' ),
									'default' 	=> esc_html__( 'Default', 'xt-humane-cpt-shortcode' )
								),
								'value' 		=> 'center', 
								'description' 	=> esc_html__('Select text align for title. Default: Center', 'xt-humane-cpt-shortcode'),
								'admin_label' 	=> true,
							),
							array(
								'label'   		=> esc_html__('Title Margin Bottom', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'margin_bottom',	
								'type' 			=> 'select',  
								'options' 		=> array(    
									'no_margin' => esc_html__( 'No Margin', 'xt-humane-cpt-shortcode' ),
									'small' 	=> esc_html__( 'Small', 'xt-humane-cpt-shortcode' ),
									'medium' 	=> esc_html__( 'Medium', 'xt-humane-cpt-shortcode' ),
									'large' 	=> esc_html__( 'Large', 'xt-humane-cpt-shortcode' ),
								),
								'value' 		=> 'medium', 
								'description' 	=> esc_html__('Default: Medium.', 'xt-humane-cpt-shortcode'),
								'admin_label' 	=> true,
							),
							array(
								'label'   		=> esc_html__('Title Color', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'text_color',	
								'type' 			=> 'select',
								'options' 		=> array(    
									'default' 	=> esc_html__( 'Default', 'xt-humane-cpt-shortcode' ),
									'white' 	=> esc_html__( 'White', 'xt-humane-cpt-shortcode' ),
								),
								'value' 		=> 'default',
								'admin_label' 	=> true,
							),	
			            ),
			        ),	 
			    ) 
			);


			/**
			 * Feature Addon
			 */
			kc_add_map(			    
			    array(  
			        'xt_features' 	=> array(
			            'name' 				=> esc_html__('Main Feature', 'xt-humane-cpt-shortcode'),
			            'description'		=> esc_html__('Feature with icon', 'xt-humane-cpt-shortcode'),
			            'icon' 				=> 'fa-rocket',
			            'category'			=> 'humane',
						'description'     	=> esc_html__( 'Main feature, with icon, title, content and button.', 'xt-humane-cpt-shortcode' ),
			            'params' 			=> array(
			            	array(
			                    'label'     	=> esc_html__( 'Icon', 'xt-humane-cpt-shortcode' ),
			                    'name'      	=> 'icon',
			                    'type'      	=> 'icon_picker',
								'description' 	=> esc_html__('Select icon from library.', 'xt-humane-cpt-shortcode')
			                ),
							array(
								'label'     	=> esc_html__( 'Heading', 'xt-humane-cpt-shortcode' ),
								'name' 			=> 'title',
								'type' 			=> 'text',  
								'admin_label' 	=> true
							),
							array(
								'label'     	=> esc_html__( 'Sub-heading', 'xt-humane-cpt-shortcode' ),
								'name' 			=> 'sub_title',
								'type' 			=> 'text',  
								'admin_label' 	=> true
							),
							array(
								'label'     	=> esc_html__( 'Content', 'xt-humane-cpt-shortcode' ),
								'name' 			=> 'donate_content',
								'type' 			=> 'text',  
								'admin_label' 	=> true
							),
			            )
			        ),	 
			    ) 
			);


			/**
			 * Feature 2 addon
			 */
			kc_add_map(			    
			    array(  
			        'xt_mission' 			=> array(
			            'name' 					=> esc_html__('Feature 2', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('Feature with icon, title, content and link.', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-flash',
			            'category'				=> 'Humane',
			            'params' 				=> array(
			            	array(
		                        'label'         	=> esc_html__( 'Background Image', 'xt-humane-cpt-shortcode' ),
		                        'type'          	=> 'attach_image',
		                        'name'          	=> 'feature_bg_img',
		                        'description'   	=> esc_html__( 'Feature item background image.', 'xt-humane-cpt-shortcode' ),
		                    ),
			            	array(
			                    'label'        => esc_html__( 'Icon', 'xt-humane-cpt-shortcode' ),
			                    'name'         => 'icon',
			                    'type'         => 'icon_picker',
			                    'description'  => esc_html__('Add an icon.', 'xt-humane-cpt-shortcode'),
								'description'  => esc_html__('Select icon from library.', 'xt-humane-cpt-shortcode')
			                ),
							array(
								'label'        => esc_html__( 'Heading', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'title',
								'type' 		   => 'text',  
								'admin_label'  => true
							),
							array(
								'label'        => esc_html__( 'Content', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'feature_content',
								'type' 		   => 'textarea',
							),
							array(
								'label'     	=> esc_html__( 'URL ( optional )', 'xt-humane-cpt-shortcode' ),
								'name' 			=> 'feature_link',
								'type' 			=> 'link',  
								'admin_label'  	=> true
							),
			            )
			        ),	 
			    ) 
			);


			/**
			 * Call To Action Addon
			 */
			kc_add_map(			    
			    array(  
			        'xt_call_to_action' 		=> array(
			            'name' 					=> esc_html__('Call To Action', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('Call To Action Settings', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-bullhorn',
			            'category'				=> 'Humane',
			            'params' 				=> array(
			            	array(
								'label'        	=> esc_html__( 'Content Before Heading', 'xt-humane-cpt-shortcode' ),
								'name' 		   	=> 'action_content',
								'type' 		   	=> 'textarea',  
								'admin_label'  	=> true
							),
							array(
								'label'        	=> esc_html__( 'Heading', 'xt-humane-cpt-shortcode' ),
								'name' 		   	=> 'title',
								'type' 		   	=> 'text',  
								'admin_label'  	=> true
							),
							array(
								'label'        	=> esc_html__( 'Content After Heading', 'xt-humane-cpt-shortcode' ),
								'name' 		   	=> 'content_after',
								'type' 		   	=> 'textarea',  
								'admin_label'  	=> true
							),
                    		array(
								'label'     	=> esc_html__( 'Button', 'xt-humane-cpt-shortcode' ),
								'name' 			=> 'btn_url',
								'type' 			=> 'link',  
								'admin_label'  	=> true
							),
			            )
			        ),	 
			    ) 
			);


			/**
			 * Volunteer Call To Action Addon
			 */
			kc_add_map(			    
			    array(  
			        'xt_volunteer_cta' 	=> array(
			            'name' 					=> esc_html__('Volunteer Call To Action', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('Volunteer Call To Action Settings', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-mouse-pointer',
			            'category'				=> 'Humane',
			            'params' 				=> array(
							array(
								'label'        => esc_html__( 'Heading', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'title',
								'type' 		   => 'text',  
								'admin_label'  => true
							),
							array(
							    'label'     	=> esc_html__( 'Heading Highlight', 'xt-humane-cpt-shortcode' ),
							    'name'      	=> 'title_highlight',
							    'description' 	=> esc_html__('Heading text second part.', 'xt-humane-cpt-shortcode'),
							    'type'        	=> 'text',
							    'admin_label' 	=> true,
							),
							array(
								'label'        => esc_html__( 'Content', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'action_content',
								'type' 		   => 'textarea',  
								'admin_label'  => true
							),
                    		array(
								'label'        => esc_html__( 'Button', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'btn_url',
								'type' 		   => 'link',  
								'admin_label'  => true
							), 
							array(
		                        'label'         	=> esc_html__( 'Image', 'xt-humane-cpt-shortcode' ),
		                        'type'          	=> 'attach_image',
		                        'name'          	=> 'action_img',
		                        'description'   	=> esc_html__( 'Side Image Of Call To Action', 'xt-humane-cpt-shortcode' )
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
							    'value'         => '650',
							    'description' 	=> esc_html__('Minimum image width larger than 650px.', 'xt-humane-cpt-shortcode'),
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
							    'value'         => '480',
							    'description' 	=> esc_html__('Minimum image height larger than 480px.', 'xt-humane-cpt-shortcode'),
							    'admin_label'   => true
							)
			            )
			        ),	 
			    ) 
			);


			/**
			 * About Us Section AddOn
			 */
			kc_add_map(			    
			    array(  
			        'xt_about_us' 	=> array(
			            'name' 					=> esc_html__('About Us', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('About Us Settings.', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-users',
			            'category'				=> 'Humane',
			            'params' 				=> array(
							array(
								'label'        => esc_html__( 'Heading', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'title',
								'type' 		   => 'text',  
								'admin_label'  => true
							),
							array(
								'label'        => esc_html__( 'Content', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'action_content',
								'type' 		   => 'textarea',  
								'admin_label'  => true
							),
                    		array(
								'label'        => esc_html__( 'Button', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'btn_url',
								'type' 		   => 'link',  
								'admin_label'  => true
							), 
			            )
			        ),	 
			    ) 
			);


			/**
			 * Stats addon
			 */
			kc_add_map(			    
			    array(  
			        'xt_stats' 			=> array(
			            'name' 					=> esc_html__('Stats', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('Stats with amount, title and icon.', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-bar-chart',
			            'category'				=> 'Humane',
			            'params' 				=> array(
			            	array(
			                    'label'        => esc_html__( 'Icon', 'xt-humane-cpt-shortcode' ),
			                    'name'         => 'icon',
			                    'type'         => 'icon_picker',
			                    'description'  => esc_html__('Add an icon.', 'xt-humane-cpt-shortcode'),
								'description'  => esc_html__('Select icon from library.', 'xt-humane-cpt-shortcode')
			                ),
							array(
								'label'        => esc_html__( 'Number', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'number',
								'type' 		   => 'text',  
								'admin_label'  => true
							),
							array(
								'label'        => esc_html__( 'Title', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'title',
								'type' 		   => 'text',  
								'admin_label'  => true
							),
			            )
			        ),	 
			    ) 
			);


			/**
			 * Contact Icon Addon
			 */
			kc_add_map(			    
			    array(  
			        'xt_icon_scode' 		=> array(
			            'name' 					=> esc_html__('Contact Icon', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('Contact Icon Settings', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-envelope-open-o',
			            'category'				=> 'Humane',
			            'params' 				=> array(
			            	array(
			                    'label'        => esc_html__( 'Icon', 'xt-humane-cpt-shortcode' ),
			                    'name'         => 'icon',
			                    'type'         => 'icon_picker',
			                    'description'  => esc_html__('Add an icon.', 'xt-humane-cpt-shortcode')
			                ),
							array(
								'label'        => esc_html__( 'Heading', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'title',
								'type' 		   => 'text',  
								'admin_label'  => true
							),
							array(
								'label'        => esc_html__( 'Content', 'xt-humane-cpt-shortcode' ),
								'name' 		   => 'action_content',
								'type' 		   => 'textarea',  
								'admin_label'  => true
							)
			            )
			        ),	 
			    ) 
			);


			/**
			 * Client's logo Addon
			 */
		    kc_add_map(			    
		        array(  
		            'xt_clients' 	=> array(
		                'name' 						=> esc_html__('Clients logo', 'xt-humane-cpt-shortcode'),
		                'description'				=> esc_html__('Client Logo addon', 'xt-humane-cpt-shortcode'),
		                'icon' 						=> 'fa-sliders',
		                'category'					=> 'humane',
		                'params' 					=> array(
		                    esc_html__('General', 'xt-humane-cpt-shortcode') 	=> array(
		                        array(
		                            'label'         			=> esc_html__('Logo Images', 'xt-humane-cpt-shortcode'),
		                            'name'          			=> 'clients_logos',
		                            'type'      				=> 'group',
		                            'description'   			=> esc_html__( 'Repeat this fields with each item created, Each item corresponding client logo.', 'xt-humane-cpt-shortcode' ),
		                            'options'       			=> array(
		                            	'add_text' 				=> esc_html__('Add new logo', 'xt-humane-cpt-shortcode')),
		                            'params' 					=> array(                                                                          
		                                array(
		                                    'label'         	=> esc_html__( 'Logo image', 'xt-humane-cpt-shortcode' ),
		                                    'type'          	=> 'attach_image',
		                                    'name'          	=> 'image',
		                                    'description'   	=> esc_html__( 'Upload a image / logo here.', 'xt-humane-cpt-shortcode' ),
		                                    'admin_label'  		=> false,
		                                    'value'         	=> ''
		                                ),  
			                    		array(
											'label'     		=> esc_html__( 'Logo URL', 'xt-humane-cpt-shortcode' ),
											'name' 				=> 'logo_url',
											'type'         		=> 'text',
		                                    'admin_label' 	 	=> true
										),	
		                            ),
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
									'label'   		=> esc_html__('Slider Loop', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'loop',	
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
									'value' 		=> 'no',
									'description'	=> esc_html__('Default off.', 'xt-humane-cpt-shortcode'),
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
									'label'   		=> esc_html__('Slider Columns', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'items',	
									'type' 			=> 'number',  
									'admin_label'	=> true,
									'value' 		=> '5',
									'description'	=> esc_html__('Slider Columns in default screen. Default: 5', 'xt-humane-cpt-shortcode'),
								),
								array(
									'label'   		=> esc_html__('Slider Columns in Desktop Small', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'desktopsmall',	
									'type' 			=> 'number',  
									'admin_label'	=> true,
									'value' 		=> '4',
									'description'	=> esc_html__('Slider Columns in small desktop screen. Default: 3', 'xt-humane-cpt-shortcode'),
								),
								array(
									'label'   		=> esc_html__('Slider Columns in Tablet', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'tablet',	
									'type' 			=> 'number',  
									'admin_label'	=> true,
									'value' 		=> '3',
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
		                )
		            ),	 
		        ) 
		    );



			/**
			 * Main Slider addon
			 */			
		    kc_add_map(			    
		        array(  
		            'xt_main_slider'   	=> array(
		                'name' 					=> esc_html__('Main Slider', 'xt-humane-cpt-shortcode'),
		                'description'			=> esc_html__('Slider addon', 'xt-humane-cpt-shortcode'),
		                'icon' 					=> 'fa-file-image-o',
		                'category'				=> 'Humane',
		                'params' 				=> array(
		                	esc_html__('General', 'xt-humane-cpt-shortcode') 	=> array(
			                	array(
			                        'label' 		=> esc_html__('Number of sliders', 'xt-humane-cpt-shortcode'),
			                        'name' 			=> 'post',
			                        'type' 			=> 'number_slider',
			                        'options' 		=> array(
			                            'min' 		=> esc_html__('1', 'xt-humane-cpt-shortcode'),
			                            'max'		=> esc_html__('15', 'xt-humane-cpt-shortcode'),
			                            'show_input'=> true
			                        ),
			                        'value'         => '3',
			                        'description' 	=> esc_html__('Default 3', 'xt-humane-cpt-shortcode')
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
									'description'	=> esc_html__('Sliders orderby.', 'xt-humane-cpt-shortcode'),
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
									'description' 	=> esc_html__('Sliders order.', 'xt-humane-cpt-shortcode'),
								),
								array(
									'label'  		=> esc_html__('Specific Slide', 'xt-humane-cpt-shortcode'),
									'name' 		   	=> 'post_in_ids',
									'type'        	=> 'text',
									'description'  	=> esc_html__( 'You can put comma separated slider id for showing those specific sliders only.', 'xt-humane-cpt-shortcode' ),
									'admin_label'  	=> true,
								),
								array(
									'label'   		=> esc_html__('Specific Slide Exclude', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'post_not_in_ids',
									'type'         	=> 'text',
									'description'  	=> esc_html__( 'You can put comma separated slider id for excluding those specific sliders.', 'xt-humane-cpt-shortcode' ),
									'admin_label'  	=> true,
								),
		                	),
		                	esc_html__('Slider Settings', 'xt-humane-cpt-shortcode') => array(
							    array(
									'label'   		=> esc_html__('Slider Loop', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'loop',	
									'type' 			=> 'toggle',  
									'admin_label'	=> true,
									'value' 		=> 'yes',
									'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
								),
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
									'value' 		=> 'yes',
									'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
								),
		                	),
		                )
		            ),	 
		        ) 
		    );


		    /**
			 * Project Addon
			 */
		    kc_add_map(			    
		        array(  
		            'xt_project' 			=> array(
		                'name' 					=> esc_html__('Projects', 'xt-humane-cpt-shortcode'),
		                'description'			=> esc_html__('Projects addon', 'xt-humane-cpt-shortcode'),
		                'icon' 					=> 'fa-briefcase',
		                'category'				=> 'Humane',
		                'description'     		=> esc_html__( 'Projects Details.', 'xt-humane-cpt-shortcode' ),
		                'params' 				=> array(
							array(
								'label'   		=> esc_html__('Content type', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'type',	
								'type' 			=> 'select',  
								'options' 		=> array(    
									'grid' 		=> esc_html__( 'Only Projects Grid', 'xt-humane-cpt-shortcode' ),
									'filter' 	=> esc_html__( 'Projects Grid with Categories Filter', 'xt-humane-cpt-shortcode' )
								),
								'value' 		=> 'filter', 
								'admin_label'	=> true,
								'description'	=> esc_html__('Default: Projects Grid with Categories Filter.', 'xt-humane-cpt-shortcode')
							),
							array(
								'label'   		=> esc_html__('Column Padding Zero.', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'column_zero',	
								'type' 			=> 'toggle',  
								'admin_label'	=> true,
								'value' 		=> 'no',
								'description'	=> esc_html__('Default No.', 'xt-humane-cpt-shortcode'),
								'relation'	 	=> array(
									'parent' 	=> 'type',
									'show_when' => 'filter'
								),
							),
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
							    'label' 		=> esc_html__('Number of projects', 'xt-humane-cpt-shortcode'),
							    'name' 			=> 'post',
							    'type' 			=> 'number_slider',
							    'options' 		=> array(
							        'min' 		=> esc_html__('1', 'xt-humane-cpt-shortcode'),
							        'max'		=> esc_html__('30', 'xt-humane-cpt-shortcode'),
							        'show_input'=> true
							    ),
							    'value'         => '8',
							    'description' 	=> esc_html__('Number of Projects to show. Default 8.', 'xt-humane-cpt-shortcode')
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
								'description'	=> esc_html__('Projects orderby.', 'xt-humane-cpt-shortcode'),
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
								'description' 	=> esc_html__('Projects order.', 'xt-humane-cpt-shortcode'),
							),
							array(
								'label'  		=> esc_html__('Specific Project', 'xt-humane-cpt-shortcode'),
								'name' 		   	=> 'post_in_ids',
								'type'        	=> 'text',
								'description'  	=> esc_html__( 'You can put comma separated project post id for showing those specific slides only.', 'xt-humane-cpt-shortcode' ),
								'admin_label'  	=> true,
							),
							array(
								'label'   		=> esc_html__('Specific Project Exclude', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'post_not_in_ids',
								'type'         	=> 'text',
								'description'  	=> esc_html__( 'You can put comma separated project post id for excluding those specific slides.', 'xt-humane-cpt-shortcode' ),
								'admin_label'  	=> true,
							),
		                )
		            ),	 
		        ) 
		    );


		    /**
			 * Project Addon
			 */
		    kc_add_map(			    
		        array(  
		            'xt_volunteer' 		=> array(
		                'name' 					=> esc_html__('Volunteers', 'xt-humane-cpt-shortcode'),
		                'description'			=> esc_html__('Volunteers addon', 'xt-humane-cpt-shortcode'),
		                'icon' 					=> 'fa-heart-o',
		                'category'				=> 'Humane',
		                'description'     		=> esc_html__( 'Volanteers grid. Add Volunteer to the Volunteers post type.', 'xt-humane-cpt-shortcode' ),
		                'params' 				=> array(
							array(
							    'label' 		=> esc_html__('Number of Volanteers', 'xt-humane-cpt-shortcode'),
							    'name' 			=> 'post',
							    'type' 			=> 'number_slider',
							    'options' 		=> array(
							        'min' 		=> esc_html__('1', 'xt-humane-cpt-shortcode'),
							        'max'		=> esc_html__('30', 'xt-humane-cpt-shortcode'),
							        'show_input'=> true
							    ),
							    'value'         => '6',
							    'description' 	=> esc_html__('Number of volunteers to show. Default 6.', 'xt-humane-cpt-shortcode'),
							    'admin_label'   => true,
							),
							array(
								'label'   		=> esc_html__('Description excerpt length', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'excerpt_length',	
								'type' 			=> 'number',  
								'value' 		=> '15',
								'description'	=> esc_html__('Default 15 words.', 'xt-humane-cpt-shortcode'),
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
								'description'	=> esc_html__('Volunteers orderby.', 'xt-humane-cpt-shortcode'),
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
								'description' 	=> esc_html__('Volunteers order.', 'xt-humane-cpt-shortcode'),
							),
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
								'label'  		=> esc_html__('Specific Volunteer', 'xt-humane-cpt-shortcode'),
								'name' 		   	=> 'post_in_ids',
								'type'        	=> 'text',
								'description'  	=> esc_html__( 'You can put comma separated volunteer post id for showing those specific slides only.', 'xt-humane-cpt-shortcode' ),
								'admin_label'  	=> true,
							),
							array(
								'label'   		=> esc_html__('Specific volunteer Exclude', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'post_not_in_ids',
								'type'         	=> 'text',
								'description'  	=> esc_html__( 'You can put comma separated volunteer post id for excluding those specific slides.', 'xt-humane-cpt-shortcode' ),
								'admin_label'  	=> true,
							),
							array(
								'label'   		=> esc_html__('Equal Height', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'equalheight',	
								'type' 			=> 'toggle',  
								'admin_label'	=> true,
								'value' 		=> 'yes',
								'description'	=> esc_html__('Default Yes.', 'xt-humane-cpt-shortcode')
							),
		                )
		            ),	 
		        ) 
		    );


		    /**
			 * Blog Post Addon
			 */
		    kc_add_map(			    
		        array(  
		            'xt_post' 	=> array(
		                'name' 					=> esc_html__('Blog Post', 'xt-humane-cpt-shortcode'),
		                'description'			=> esc_html__('Blog post Settings.', 'xt-humane-cpt-shortcode'),
		                'icon' 					=> 'fa-pencil-square-o',
		                'category'				=> 'Humane',
		                'params' 				=> array(
							array(
								'label'   		=> esc_html__('Posts columns', 'xt-humane-cpt-shortcode'),
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
								'value' 		=> '2', 
								'description'	=> esc_html__('Default 2 columns.', 'xt-humane-cpt-shortcode'),
							),
							array(
								'label'   		=> esc_html__('Image Size', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'image_size_type',	
								'type' 			=> 'select',  
								'options' 		=> array(    
									'default' 	=> esc_html__( 'Default', 'xt-humane-cpt-shortcode' ),
									'custom' 	=> esc_html__( 'Custom Size', 'xt-humane-cpt-shortcode' ),
								),
								'value' 		=> 'default', 
								'description' 	=> esc_html__('Image size, If you use custom image size, make sure you upload larger image then the define size here.', 'xt-humane-cpt-shortcode'),
								'admin_label' 	=> true
							),
							array(
							    'label' 		=> esc_html__('Image Width', 'xt-humane-cpt-shortcode'),
							    'name' 			=> 'image_width',
							    'type' 			=> 'number_slider',
							    'options' 		=> array(
							        'min' 		=> esc_html__('400', 'xt-humane-cpt-shortcode'),
							        'max'		=> esc_html__('1080', 'xt-humane-cpt-shortcode'),
							        'show_input'=> true
							    ),
							    'value'         => '570',
							    'description' 	=> esc_html__('Posts image width. Default 570.', 'xt-humane-cpt-shortcode'),
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
							        'min' 		=> esc_html__('400', 'xt-humane-cpt-shortcode'),
							        'max'		=> esc_html__('1080', 'xt-humane-cpt-shortcode'),
							        'show_input'=> true
							    ),
							    'value'         => '450',
							    'description' 	=> esc_html__('Posts image height. Default 450.', 'xt-humane-cpt-shortcode'),
								'relation' 		=> array(
									'parent' 	=> 'image_size_type',
									'show_when' => 'custom'
								),
							    'admin_label'   => true
							),
							array(
							    'label' 		=> esc_html__('Number of Posts', 'xt-humane-cpt-shortcode'),
							    'name' 			=> 'post',
							    'type' 			=> 'number_slider',
							    'options' 		=> array(
							        'show_input'=> true
							    ),
							    'value'         => '2',
							    'description' 	=> esc_html__('Number of Posts to show. Default 2.', 'xt-humane-cpt-shortcode'),
							    'admin_label'   => true,
							),
							array(
								'label'   		=> esc_html__('Post excerpt length', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'excerpt_length',	
								'type' 			=> 'number',  
								'value' 		=> '30',
								'description'	=> esc_html__('Default 30 words.', 'xt-humane-cpt-shortcode'),
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
								'description'	=> esc_html__('Posts orderby.', 'xt-humane-cpt-shortcode'),
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
								'description' 	=> esc_html__('Posts order.', 'xt-humane-cpt-shortcode'),
							),
							array(
								'label'  		=> esc_html__('Specific Posts', 'xt-humane-cpt-shortcode'),
								'name' 		   	=> 'post_in_ids',
								'type'        	=> 'text',
								'description'  	=> esc_html__( 'You can put comma separated post post id for showing those specific slides only.', 'xt-humane-cpt-shortcode' ),
								'admin_label'  	=> true,
							),
							array(
								'label'   		=> esc_html__('Specific Post Exclude', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'post_not_in_ids',
								'type'         	=> 'text',
								'description'  	=> esc_html__( 'You can put comma separated post post id for excluding those specific slides.', 'xt-humane-cpt-shortcode' ),
								'admin_label'  	=> true,
							),
							array(
								'label'   		=> esc_html__('Show Blog Category', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'show_category',	
								'type' 			=> 'toggle',  
								'admin_label'	=> true,
								'value' 		=> 'yes',
								'description'	=> esc_html__('Default Yes.', 'xt-humane-cpt-shortcode'),
							),
							array(
								'label'   		=> esc_html__('Only show the posts with feature image.', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'post_has_image',	
								'type' 			=> 'toggle',  
								'admin_label'	=> true,
								'value' 		=> 'yes',
								'description'	=> esc_html__('Default Yes.', 'xt-humane-cpt-shortcode'),
							),
							array(
								'label'   		=> esc_html__('Equal Height', 'xt-humane-cpt-shortcode'),
								'name' 			=> 'equalheight',	
								'type' 			=> 'toggle',  
								'admin_label'	=> true,
								'value' 		=> 'yes',
								'description'	=> esc_html__('Default Yes.', 'xt-humane-cpt-shortcode')
							),
		                )
		            ),	 
		        ) 
		    );


			/**
			 * Testimonial Addon
			 */
			kc_add_map(		    
			    array(  
			        'xt_testimonial' 		=> array(
			            'name' 					=> esc_html__('Testimonial', 'xt-humane-cpt-shortcode'),
			            'description'			=> esc_html__('Testimonial addon', 'xt-humane-cpt-shortcode'),
			            'icon' 					=> 'fa-quote-left',
			            'category'				=> 'Humane',
			            'description'     		=> esc_html__( 'Testimonial Settings', 'xt-humane-cpt-shortcode' ),
			            'params' 				=> array(
			            	esc_html__('General', 'xt-humane-cpt-shortcode') 	=> array(
			    				array(
									'label'   		=> esc_html__('Content type', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'type',	
									'type' 			=> 'select',  
									'options' 		=> array(    
										'grid' 		=> esc_html__( 'Grid', 'xt-humane-cpt-shortcode' ),
										'slider' 	=> esc_html__( 'Slider', 'xt-humane-cpt-shortcode' )
									),
									'value' 		=> '3', 
									'admin_label'	=> true,
									'description'	=> esc_html__('Testimonials content type. Grid / Slider.', 'xt-humane-cpt-shortcode')
								),
								array(
									'label'   		=> esc_html__('Testimonials grid columns', 'xt-humane-cpt-shortcode'),
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
			                        'label' 		=> esc_html__('Number of testimonials', 'xt-humane-cpt-shortcode'),
			                        'name' 			=> 'post',
			                        'type' 			=> 'number_slider',
			                        'options' 		=> array(
			                            'min' 		=> esc_html__('1', 'xt-humane-cpt-shortcode'),
			                            'max'		=> esc_html__('15', 'xt-humane-cpt-shortcode'),
			                            'show_input'=> true
			                        ),
			                        'value'         => '6',
			                        'description' 	=> esc_html__('Number of testimonials to show. Default 6.', 'xt-humane-cpt-shortcode')
			                    ),
								array(
									'label'   		=> esc_html__('Description excerpt length', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'excerpt_length',	
									'type' 			=> 'number',  
									'value' 		=> '20',
									'description'	=> esc_html__('Default 20 words.', 'xt-humane-cpt-shortcode'),
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
									'description'	=> esc_html__('Testimonial\'s orderby.', 'xt-humane-cpt-shortcode'),
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
									'description' 	=> esc_html__('Testimonial\'s order.', 'xt-humane-cpt-shortcode'),
								),
								array(
									'label'  		=> esc_html__('Specific Testimonial', 'xt-humane-cpt-shortcode'),
									'name' 		   	=> 'post_in_ids',
									'type'        	=> 'text',
									'description'  	=> esc_html__( 'You can put comma separated testimonial id for showing those specific properties only.', 'xt-humane-cpt-shortcode' ),
									'admin_label'  	=> true,
								),
								array(
									'label'   		=> esc_html__('Specific Testimonial Exclude', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'post_not_in_ids',
									'type'         	=> 'text',
									'description'  	=> esc_html__( 'You can put comma separated testimonial id for excluding those specific properties.', 'xt-humane-cpt-shortcode' ),
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
									'label'   		=> esc_html__('Slider Loop', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'loop',	
									'type' 			=> 'toggle',  
									'admin_label'	=> true,
									'value' 		=> 'yes',
									'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
								),
								array(
									'label'   		=> esc_html__('Slider columns default', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'items',	
									'type' 			=> 'number',  
									'admin_label'	=> true,
									'value' 		=> '3',
									'description'	=> esc_html__('Slider Columns in default screen. Default: 3', 'xt-humane-cpt-shortcode'),
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
			            )
			        ),	 
			    ) 
			);


			/**
			 * Events grid / slider / list Addon
			 */
			if ( class_exists( 'Tribe__Events__Main' ) ) {
				kc_add_map(		    
				    array(  
				        'xt_events' 			=> array(
				            'name' 					=> esc_html__('Events', 'xt-humane-cpt-shortcode'),
				            'description'			=> esc_html__('Events addon', 'xt-humane-cpt-shortcode'),
				            'icon' 					=> 'fa-calendar-o',
				            'category'				=> 'Humane',
				            'description'     		=> esc_html__( 'Events Grid / slider / list.', 'xt-humane-cpt-shortcode' ),
				            'params' 				=> array(
				            	esc_html__('General', 'xt-humane-cpt-shortcode') 	=> array(
				    				array(
										'label'   		=> esc_html__('Content type', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'type',	
										'type' 			=> 'select',  
										'options' 		=> array(    
											'grid' 		=> esc_html__( 'Grid', 'xt-humane-cpt-shortcode' ),
											'slider' 	=> esc_html__( 'Slider', 'xt-humane-cpt-shortcode' ),
										),
										'value' 		=> 'grid', 
										'admin_label'	=> true,
										'description'	=> esc_html__('Events content type. Grid / slider.', 'xt-humane-cpt-shortcode')
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
									    'value'         => '570',
									    'description' 	=> esc_html__('Events image width. Default 570.', 'xt-humane-cpt-shortcode'),
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
									    'description' 	=> esc_html__('Events image height. Default 450.', 'xt-humane-cpt-shortcode'),
										'relation' 		=> array(
											'parent' 	=> 'image_size_type',
											'show_when' => 'custom'
										),
									    'admin_label'   => true
									),
									array(
										'label'   		=> esc_html__('Events grid columns', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'column',	
										'type' 			=> 'select',  
										'options' 		=> array(    
											'6' 		=> esc_html__( '6 Columns', 'xt-humane-cpt-shortcode' ),
											'4' 		=> esc_html__( '4 Columns', 'xt-humane-cpt-shortcode' ),
											'3' 		=> esc_html__( '3 Columns', 'xt-humane-cpt-shortcode' ),
											'2' 		=> esc_html__( '2 Columns', 'xt-humane-cpt-shortcode' ),
											'1' 		=> esc_html__( '1 Columns', 'xt-humane-cpt-shortcode' ),
										),
										'value' 		=> '2', 
										'relation'	 	=> array(
											'parent' 	=> 'type',
											'show_when' => 'grid'
										),
										'description'	=> esc_html__('Default 2 columns.', 'xt-humane-cpt-shortcode'),
										'admin_label'	=> true,
									),
				                	array(
				                        'label' 		=> esc_html__('Number of events', 'xt-humane-cpt-shortcode'),
				                        'name' 			=> 'post',
				                        'type' 			=> 'number_slider',
				                        'options' 		=> array(
				                            'min' 		=> esc_html__('1', 'xt-humane-cpt-shortcode'),
				                            'max'		=> esc_html__('30', 'xt-humane-cpt-shortcode'),
				                            'show_input'=> true
				                        ),
				                        'value'         => '2',
				                        'description' 	=> esc_html__('Number of events to show. Default 2.', 'xt-humane-cpt-shortcode')
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
										'description'	=> esc_html__('Event\'s orderby.', 'xt-humane-cpt-shortcode'),
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
										'description' 	=> esc_html__('Event\'s order.', 'xt-humane-cpt-shortcode'),
									),
									array(
										'label'  		=> esc_html__('Events categories', 'xt-humane-cpt-shortcode'),
										'name' 		   	=> 'event_categories',
										'type'        	=> 'text',
										'description'  	=> esc_html__( 'Comma separated event categories id. It will show events form this categories only.', 'xt-humane-cpt-shortcode' ),
										'admin_label'  	=> true,
									),
									array(
										'label'  		=> esc_html__('Events ids', 'xt-humane-cpt-shortcode'),
										'name' 		   	=> 'event_ids',
										'type'        	=> 'text',
										'description'  	=> esc_html__( 'Comma separated events id. It will show this selected events only.', 'xt-humane-cpt-shortcode' ),
										'admin_label'  	=> true,
									),
									array(
										'label'   		=> esc_html__('Show expired events?', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'show_expired',	
										'type' 			=> 'toggle_on_off',  
										'admin_label'	=> true,
										'value' 		=> 'off',
										'description'	=> esc_html__('Showing Past Events. Default Off.', 'xt-humane-cpt-shortcode'),
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
										'value' 		=> 'no',
										'description'	=> esc_html__('Default Off.', 'xt-humane-cpt-shortcode'),
									),
									array(
										'label'   		=> esc_html__('Slider columns default', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'items',	
										'type' 			=> 'number',  
										'admin_label'	=> true,
										'value' 		=> '3',
										'description'	=> esc_html__('Slider Columns in default screen. Default: 3', 'xt-humane-cpt-shortcode'),
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

								esc_html__('Content Settings', 'xt-humane-cpt-shortcode') => array(
				                    array(
										'label'   		=> esc_html__('Show events short description', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'show_excerpt',	
										'type' 			=> 'toggle',  
										'admin_label'	=> true,
										'value' 		=> 'yes',
										'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
									),
				                    array(
										'label'   		=> esc_html__('Show events cost', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'show_cost',	
										'type' 			=> 'toggle',  
										'admin_label'	=> true,
										'value' 		=> 'yes',
										'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
									),
				                    array(
										'label'   		=> esc_html__('Show events details button', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'show_details_btn',	
										'type' 			=> 'toggle',  
										'admin_label'	=> true,
										'value' 		=> 'yes',
										'description'	=> esc_html__('Default On.', 'xt-humane-cpt-shortcode'),
									),
									array(
										'label'  		=> esc_html__('Events details button text', 'xt-humane-cpt-shortcode'),
										'name' 		   	=> 'details_btn_text',
										'type'        	=> 'text',
										'value'  		=> esc_html__( 'Details', 'xt-humane-cpt-shortcode' ),
										'relation'	 	=> array(
											'parent' 	=> 'show_details_btn',
											'show_when' => 'yes'
										),
										'admin_label'  	=> true,
										'description'   => esc_html__( 'Default: Details.', 'xt-humane-cpt-shortcode' ),
									),
								),					
				            )
				        ),	 
				    ) 
				);
			}


			/**
			 * Donation Causes Addon
			 */
			if( humane_plugin_active( 'charitable/charitable.php' ) ){
				kc_add_map(					    
				    array(  
				        'xt_donation_causes' 	=> array(
				            'name' 					=> esc_html__('Donation Causes', 'xt-humane-cpt-shortcode'),
				            'description'			=> esc_html__('Donation cause grid / list / slider.', 'xt-humane-cpt-shortcode'),
				            'icon' 					=> 'fa-hand-lizard-o',
				            'category'				=> 'Humane',
				            'params' 				=> array(

								esc_html__('General', 'xt-humane-cpt-shortcode') 	=> array(
									array(
										'label'   		=> esc_html__('Content type', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'type',	
										'type' 			=> 'select',  
										'admin_label' 	=> true,
										'options' 		=> array(    
											'grid' 		=> esc_html__( 'Grid', 'xt-humane-cpt-shortcode' ),
											'slider' 	=> esc_html__( 'Slider', 'xt-humane-cpt-shortcode' ),
										),
										'value' 		=> 'grid', 
										'description' 	=> esc_html__('Campaign style options.', 'xt-humane-cpt-shortcode'),
										'admin_label' 	=> true
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
										'label'   		=> esc_html__('Include cause that have expired', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'include_inactive',	
										'type' 			=> 'toggle',  
										'admin_label'	=> true,
										'value' 		=> 'no',
										'description'	=> esc_html__('Default no, Check this to enable.', 'xt-humane-cpt-shortcode')
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
									    'value'         => '460',
									    'description' 	=> esc_html__('Cause image width. Default 460.', 'xt-humane-cpt-shortcode'),
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
									    'value'         => '460',
									    'description' 	=> esc_html__('Cause image height. Default 460.', 'xt-humane-cpt-shortcode'),
										'relation' 		=> array(
											'parent' 	=> 'image_size_type',
											'show_when' => 'custom'
										),
									    'admin_label'   => true
									),
									array(
									    'label' 		=> esc_html__('Number of Cause', 'xt-humane-cpt-shortcode'),
									    'name' 			=> 'post',
									    'type' 			=> 'number_slider',
									    'options' 		=> array(
									        'min' 		=> esc_html__('1', 'xt-humane-cpt-shortcode'),
									        'max'		=> esc_html__('30', 'xt-humane-cpt-shortcode'),
									        'show_input'=> true
									    ),
									    'value'         => '3',
									    'description' 	=> esc_html__('Number of Cause to show. Default 5.', 'xt-humane-cpt-shortcode')
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
										'description'	=> esc_html__('Cause\'s orderby.', 'xt-humane-cpt-shortcode'),
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
										'label'  		=> esc_html__('Cause Creator', 'xt-humane-cpt-shortcode'),
										'name' 		   	=> 'creator',
										'type'        	=> 'text',
										'description'  	=> esc_html__( 'Only show causes created by a certain user. Comma separated user IDs.', 'xt-humane-cpt-shortcode' ),
										'admin_label'  	=> true,
									),
									array(
										'label'   		=> esc_html__('Cause categories', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'causes_categories',
										'type'         	=> 'text',
										'description'  	=> esc_html__( 'Comma separated Cause categories id. It will show Causes form this categories only.', 'xt-humane-cpt-shortcode' ),
										'admin_label'  	=> true,
									),
									array(
										'label'   		=> esc_html__('Cause tags', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'causes_tags',
										'type'         	=> 'text',
										'description'  	=> esc_html__( 'Comma separated Cause tags id. It will show Causes form this tags only.', 'xt-humane-cpt-shortcode' ),
										'admin_label'  	=> true,
									),
									array(
										'label'  		=> esc_html__('Cause ids', 'xt-humane-cpt-shortcode'),
										'name' 		   	=> 'post_in',
										'type'        	=> 'text',
										'description'  	=> esc_html__( 'Comma separated Cause id. It will show this selected Causes only.', 'xt-humane-cpt-shortcode' ),
										'admin_label'  	=> true,
									),
									array(
										'label'   		=> esc_html__('Cause ids to exclude', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'post_not_in',
										'type'         	=> 'text',
										'description'  	=> esc_html__( 'Comma separated Cause ids to exclude.', 'xt-humane-cpt-shortcode' ),
										'admin_label'  	=> true,
									),
								),

								esc_html__('Slider Settings', 'xt-humane-cpt-shortcode') => array(
									array(
										'label'   		=> esc_html__('Slider Autoplay', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'autoplay',	
										'type' 			=> 'toggle',  
										'admin_label'	=> true,
										'value' 		=> 'no',
										'description'	=> esc_html__('Default No.', 'xt-humane-cpt-shortcode'),
									),
									array(
										'label'   		=> esc_html__('Slider Navigation', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'navigation',	
										'type' 			=> 'toggle',  
										'admin_label'	=> true,
										'value' 		=> 'yes',
										'description'	=> esc_html__('Default Yes.', 'xt-humane-cpt-shortcode'),
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
										'label'   		=> esc_html__('Show Cause short description', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'cause_excerpt',	
										'type' 			=> 'toggle_on_off',  
										'admin_label'	=> true,
										'value' 		=> 'on',
										'description'	=> esc_html__('Enable or disable the short description. Default: On.', 'xt-humane-cpt-shortcode')
									),
									array(
										'label'   		=> esc_html__('Cause excerpt length', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'excerpt_length',	
										'type' 			=> 'number',  
										'admin_label'	=> true,
										'value' 		=> '10',
										'relation' 		=> array(
											'parent' 	=> 'cause_excerpt',
											'show_when' => 'on'
										),
										'description'	=> esc_html__('Default 10 words.', 'xt-humane-cpt-shortcode'),
									),
									array(
										'label'   		=> esc_html__('Show cause donate button', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'donate_btn',	
										'type' 			=> 'toggle_on_off',  
										'admin_label'	=> true,
										'value' 		=> 'on',
										'description'	=> esc_html__('Default yes.', 'xt-humane-cpt-shortcode')
									),
									array(
										'label'   		=> esc_html__('Show progress bar', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'cause_progress_bar',	
										'type' 			=> 'toggle_on_off',  
										'admin_label'	=> true,
										'value' 		=> 'on',
										'description'	=> esc_html__('Default yes.', 'xt-humane-cpt-shortcode')
									),
									array(
										'label'   		=> esc_html__('Progress bar type', 'xt-humane-cpt-shortcode'),
										'name' 			=> 'progress_bar_type',	
										'type' 			=> 'select',  
										'admin_label' 	=> true,
										'options' 		=> array(    
											'circular' 		=> esc_html__( 'Circular', 'xt-humane-cpt-shortcode' ),
											'default' 		=> esc_html__( 'Default', 'xt-humane-cpt-shortcode' ),
										),
										'value' 		=> 'circular', 
										'admin_label' 	=> true,
										'relation' 		=> array(
											'parent' 	=> 'cause_progress_bar',
											'show_when' => 'on'
										),
									),
								),
							
				            ),
				        ),	 
				    ) 
				);
			}


			/**
			 * Campaign Search Addon
			 */
			if( humane_plugin_active( 'charitable/charitable.php' ) ){			
				kc_add_map(					    
				    array(  
				        'xt_campaign_search' 	=> array(
				            'name' 					=> esc_html__('Campaign Search', 'xt-humane-cpt-shortcode'),
				            'description'			=> esc_html__('Ajax search box for searching campaigns.', 'xt-humane-cpt-shortcode'),
				            'icon' 					=> 'fa-search',
				            'category'				=> 'Humane',
				            'params' 				=> array(
					            array(
			                        'label'         	=> esc_html__( 'Logo image', 'xt-humane-cpt-shortcode' ),
			                        'type'          	=> 'attach_image',
			                        'name'          	=> 'before_search_img',
			                        'description'   	=> esc_html__( 'You can upload a image / logo here, it will show on top of the search box.', 'xt-humane-cpt-shortcode' )
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
				                    'value'  		   => esc_html__( 'Search...', 'xt-humane-cpt-shortcode' )
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
			if( humane_plugin_active( 'charitable/charitable.php' ) ){			
				kc_add_map(					    
				    array(  
				        'xt_donation_stats' 	=> array(
				            'name' 					=> esc_html__('Campaign Stats', 'xt-humane-cpt-shortcode'),
				            'description'			=> esc_html__('Charitable campaigns statics.', 'xt-humane-cpt-shortcode'),
				            'icon' 					=> 'fa-area-chart',
				            'category'				=> 'Humane',
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
									'type' 			=> 'toggle',  
									'admin_label'	=> true,
									'value' 		=> 'yes',
								),
				                array(
				                    'label'     	=> esc_html__( 'Campaigns Text Singular', 'xt-humane-cpt-shortcode' ),
				                    'name'      	=> 'campaigns_text_singular',
				                    'type'        	=> 'text',
				                    'description'  => esc_html__( 'Campaigns text for singular number.', 'xt-humane-cpt-shortcode' ),
				                    'admin_label' 	=> true,
				                    'value'		 	=> esc_html__( 'Campaign', 'xt-humane-cpt-shortcode' ),
				                    'relation' 		=> array(
										'parent' 	=> 'show_campaign_count',
										'show_when' => 'yes'
									)
				                ),
				                array(
				                    'label'     	=> esc_html__( 'Campaigns Text Plural', 'xt-humane-cpt-shortcode' ),
				                    'name'      	=> 'campaigns_text_plural',
				                    'type'        	=> 'text',
				                    'description'  => esc_html__( 'Campaigns text for plural number.', 'xt-humane-cpt-shortcode' ),
				                    'admin_label' 	=> true,
				                    'value'		 	=> esc_html__( 'Campaigns', 'xt-humane-cpt-shortcode' ),
				                    'relation' 		=> array(
										'parent' 	=> 'show_campaign_count',
										'show_when' => 'yes'
									)
				                ),
				                array(
				                    'label'     	=> esc_html__( 'Show Campaign Donated Amount', 'xt-humane-cpt-shortcode' ),
				                    'name'      	=> 'show_campaign_donated_amount',
				                    'type'        	=> 'text',
				                    'description'  => esc_html__( 'Campaigns text for plural number.', 'xt-humane-cpt-shortcode' ),
				                    'admin_label' 	=> true,
				                    'value'		 	=> esc_html__( 'Donated', 'xt-humane-cpt-shortcode' ),
				                ),
							    array(
									'label'   		=> esc_html__('Show Campaign Donated Amount', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'show_campaign_donated_amount',	
									'type' 			=> 'toggle',  
									'admin_label'	=> true,
									'value' 		=> 'yes',
								),
				                array(
				                    'label'     	=> esc_html__( 'Donated Text', 'xt-humane-cpt-shortcode' ),
				                    'name'      	=> 'donated_text',
				                    'type'        	=> 'text',
				                    'admin_label' 	=> true,
				                    'value'		 	=> esc_html__( 'Donated', 'xt-humane-cpt-shortcode' ),
				                    'relation' 		=> array(
										'parent' 	=> 'show_campaign_donated_amount',
										'show_when' => 'yes'
									)
				                ),
							    array(
									'label'   		=> esc_html__('Show Campaign Donor Count', 'xt-humane-cpt-shortcode'),
									'name' 			=> 'show_campaign_donors_count',	
									'type' 			=> 'toggle',  
									'admin_label'	=> true,
									'value' 		=> 'yes',
								),
				                array(
				                    'label'     	=> esc_html__( 'Donor Text Singular', 'xt-humane-cpt-shortcode' ),
				                    'name'      	=> 'donor_text_singular',
				                    'type'        	=> 'text',
				                    'description'  => esc_html__( 'Donor text for singular number.', 'xt-humane-cpt-shortcode' ),
				                    'admin_label' 	=> true,
				                    'value'		 	=> esc_html__( 'Donor', 'xt-humane-cpt-shortcode' ),
				                    'relation' 		=> array(
										'parent' 	=> 'show_campaign_donors_count',
										'show_when' => 'yes'
									)
				                ),
				                array(
				                    'label'     	=> esc_html__( 'Donor Text Plural', 'xt-humane-cpt-shortcode' ),
				                    'name'      	=> 'donor_text_plural',
				                    'type'        	=> 'text',
				                    'description'  => esc_html__( 'Donor text for plural number.', 'xt-humane-cpt-shortcode' ),
				                    'admin_label' 	=> true,
				                    'value'		 	=> esc_html__( 'Donors', 'xt-humane-cpt-shortcode' ),
				                    'relation' 		=> array(
										'parent' 	=> 'show_campaign_donors_count',
										'show_when' => 'yes'
									)
				                ),				
				            ),
				        ),	 
				    ) 
				);
			}

		}
	}
}



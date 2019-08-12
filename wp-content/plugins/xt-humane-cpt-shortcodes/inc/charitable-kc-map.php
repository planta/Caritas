<?php


/**
 * Donation Campaign Addon
 */
if ( class_exists( 'Charitable' ) ){
	kc_add_map(			    
	    array(  
	        'campaigns' 	=> array(
	            'name' 				=> esc_html__('Donation Campaign', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
				'description'     	=> esc_html__( 'Charitable plugin donation Campaign.', 'xt-humane-cpt-shortcode' ),
	            'params' 			=> array(
				    array(
						'label'   		=> esc_html__('Include cause that have expired', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'include_inactive',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'false',
						'description'	=> esc_html__('Default false, Check this to enable.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Number of campaigns', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'number',	
						'type' 			=> 'number',  
						'admin_label'	=> true,
						'value' 		=> '3',
						'description'	=> esc_html__('Number of campaigns to show. Default 3.', 'xt-humane-cpt-shortcode'),
					),	
					array(
						'label'   		=> esc_html__('Columns', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'columns',	
						'type' 			=> 'number',  
						'admin_label'	=> true,
						'value' 		=> '3',
						'description'	=> esc_html__('Choose how many columns you want to display the campaigns in. Supports any number between 1 and 4', 'xt-humane-cpt-shortcode'),
					),	
					array(
						'label'   		=> esc_html__('Order by', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'orderby',	
						'type' 			=> 'select',  
						'admin_label' 	=> true,
						'options' 		=> array(    
							'menu_order'		=> esc_html__('Menu Order', 'xt-humane-cpt-shortcode'),
							'title' 			=> esc_html__('Title', 'xt-humane-cpt-shortcode'),
							'ID' 				=> esc_html__('ID', 'xt-humane-cpt-shortcode'),
							'modified' 			=> esc_html__('Last modified', 'xt-humane-cpt-shortcode'),
							'rand' 				=> esc_html__('Random', 'xt-humane-cpt-shortcode'),
							'dapost_datete' 	=> esc_html__('Post Date', 'xt-humane-cpt-shortcode'),
							'date' 				=> esc_html__('Date', 'xt-humane-cpt-shortcode'),
							'popular' 			=> esc_html__('Popular', 'xt-humane-cpt-shortcode'),
							'ending' 			=> esc_html__('Ending', 'xt-humane-cpt-shortcode'),
						),
						'value' 		=> 'post_date', 
						'description'	=> esc_html__('The order in which campaigns are displayed. Options include post_date, popular and ending.', 'xt-humane-cpt-shortcode'),
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
						'description' 	=> esc_html__('Change the direction in which campaigns are ordered. Accepts DESC or ASC. Defaults to DESC.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'  		=> esc_html__('Cause Creator', 'xt-humane-cpt-shortcode'),
						'name' 		   	=> 'creator',
						'type'        	=> 'text',
						'description'  	=> esc_html__( 'Only show campaigns created by a certain user. User must have their user ID passed.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
					array(
						'label'   		=> esc_html__('Categories', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'category',
						'type'         	=> 'text',
						'description'  	=> esc_html__( 'Only show campaigns within certain categories.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
					array(
						'label'   		=> esc_html__('Campaigns ids', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'id',
						'type'         	=> 'text',
						'description'  	=> esc_html__( 'Show specific campaigns. You can provide a single number or multiple IDs as a comma separated list.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
					array(
						'label'   		=> esc_html__('Campaigns ids to exclude', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'exclude',
						'type'         	=> 'text',
						'description'  	=> esc_html__( 'Exclude specific campaigns by their ID. Pass multiple IDs as a comma separated list to exclude more than one.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
				    array(
						'label'   		=> esc_html__('Responsive', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'responsive',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'true',
						'description'	=> esc_html__('Scale campaigns to a single-column layout on smaller screens. Default enable.', 'xt-humane-cpt-shortcode'),
					),
				    array(
						'label'   		=> esc_html__('Map', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'ik_map',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'false',
						'description'	=> esc_html__('Display campaigns on a map. Defaults to false. [ Campaigns Geolocation required. ]', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'  		=> esc_html__('Map Width', 'xt-humane-cpt-shortcode'),
						'name' 		   	=> 'width',
						'type'        	=> 'text',
						'description'  	=> esc_html__( 'Set how wide you want your map to be. This must be passed as a valid CSS width (400px, 100%, etc). Defaults to 100%.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
						'value'		  	=> '100%',
					),
					array(
						'label'  		=> esc_html__('Map Height', 'xt-humane-cpt-shortcode'),
						'name' 		   	=> 'height',
						'type'        	=> 'text',
						'description'  	=> esc_html__( 'Set how high you want your map to be. This must be passed as a valid CSS height. Defaults to 500px.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
						'value'		  	=> '500px',
					),
					array(
						'label'  		=> esc_html__('Map Zoom', 'xt-humane-cpt-shortcode'),
						'name' 		   	=> 'zoom',
						'type'        	=> 'text',
						'description'  	=> esc_html__( 'Set the initial zoom level you would like your map to display at. Defaults to auto, with the zoom level based on the pins that have been added to the map.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
						'value'		  	=> 'auto',
					),
	            )
	        ),	 
	    ) 
	);
}

/**
 * Charitable Login Addon
 */
if ( class_exists( 'Charitable' ) ){
	kc_add_map(			    
	    array(  
	        'charitable_login' 	=> array(
	            'name' 				=> esc_html__('Charitable Login', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
				'description'     	=> esc_html__( 'Charitable plugin login form.', 'xt-humane-cpt-shortcode' ),
	            'params' 			=> array(
					array(
						'label'   		=> esc_html__('Logged in Message', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'logged_in_message',
						'type'         	=> 'text',
						'description'  	=> esc_html__( 'You can optionally set the message that will be displayed to users when they are already logged in.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
						'value'		 	=> esc_html__( 'You are already logged in!', 'xt-humane-cpt-shortcode' ),
					),
					array(
						'label'   		=> esc_html__('Registration link text', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'registration_link_text',
						'type'         	=> 'text',
						'description'  	=> esc_html__( 'You can also customize the text used for the link to the registration page.  Set 0 to disable.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
						'value'		 	=> esc_html__( 'Register', 'xt-humane-cpt-shortcode' ),
					),
					array(
						'label'   		=> esc_html__('Logging Redirect', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'redirect',
						'type'         	=> 'text',
						'description'  => esc_html__( 'It is also possible to change the default page that people are redirected to after logging in.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
	            )
	        ),	 
	    ) 
	);
}


/**
 * Charitable Registration Addon
 */
if ( class_exists( 'Charitable' ) ){
	kc_add_map(			    
	    array(  
	        'charitable_registration' 	=> array(
	            'name' 				=> esc_html__('Charitable Registration', 'xt-humane-cpt-shortcode'),
	            'description'		=> esc_html__('Charitable plugin registration form.', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
	            'params' 			=> array(
					array(
						'label'   		=> esc_html__('Logged in Message', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'logged_in_message',
						'type'         	=> 'text',
						'description'  	=> esc_html__( 'You can optionally set the message that will be displayed to users when they are already logged in.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
						'value'		 	=> esc_html__( 'You are already logged in!', 'xt-humane-cpt-shortcode' ),
					),
					array(
						'label'   		=> esc_html__('Login Link Text', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'login_link_text',
						'type'         	=> 'text',
						'description'  	=> esc_html__( 'You can also customize the text used for the link to the login page. Set 0 to disable.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
						'value'		 	=> esc_html__( 'Signed up already? Login instead.', 'xt-humane-cpt-shortcode' ),
					),
					array(
						'label'   		=> esc_html__('Registration Redirect', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'redirect',
						'type'         	=> 'text',
						'description'  => esc_html__( 'By default, the user is redirected to the Profile page after registration or, if the Profile page has not been set up (see below), to the homepage. You can provide a default page for users to be redirected to.', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
	            )
	        ),	 
	    ) 
	);
}


/**
 * Charitable Donors Shortcode
 */

if ( class_exists( 'Charitable' ) ){
	kc_add_map(			    
	    array(  
	        'charitable_donors' 	=> array(
	            'name' 				=> esc_html__('Charitable Donors', 'xt-humane-cpt-shortcode'),
	            'description'		=> esc_html__('shortcode allows you to display a list of donors to one or all of your campaigns on a page.', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-users',
	            'category'			=> 'Charitable',
	            'params' 			=> array(
	            	array(
						'label'   		=> esc_html__('Number of donors to show', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'number',	
						'type' 			=> 'number',  
						'admin_label'	=> true,
						'value' 		=> '10',
						'description'	=> esc_html__('Default 10.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Order by', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'orderby',	
						'type' 			=> 'select',  
						'admin_label' 	=> true,
						'options' 		=> array(    
							'date'			=> esc_html__('date', 'xt-humane-cpt-shortcode'),
							'donations'		=> esc_html__('donations', 'xt-humane-cpt-shortcode'),
							'amount'		=> esc_html__('amount', 'xt-humane-cpt-shortcode'),
						),
						'value' 		=> 'date', 
						'description'	=> esc_html__('Default is date.', 'xt-humane-cpt-shortcode'),
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
						'value' 		=> 'DESC', 
						'description' 	=> esc_html__('Default is DESC.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Campaign', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'campaign',
						'type'         	=> 'text',
						'value' 		=> '0', 
						'description'  => esc_html__( 'May be set to the ID of a campaign, current to display the donors to the campaign currently being viewed, or all or 0 to display donors to any campaign. Default is 0 (donors to any campaigns).', 'xt-humane-cpt-shortcode' ),
						'admin_label'  	=> true,
					),
					array(
						'label'   		=> esc_html__('Distinct Donors', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'distinct_donors',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'false',
						'description'	=> esc_html__('Only show unique donors. May be set to false (do not show distinct) or true (show distinct). If a donor has donated more than once, they will only appear in the list once, with their donation amount calculated based on all their donations. Default is false.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Orientation', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'orientation',
						'type' 			=> 'select',  
						'admin_label' 	=> true,
						'options' 		=> array(    
							'vertical' 		=> esc_html__('Vertical', 'xt-humane-cpt-shortcode'),
							'horizontal' 	=> esc_html__('Horizontal', 'xt-humane-cpt-shortcode'),
						),
						'value' 		=> 'horizontal', 
						'description' 	=> esc_html__('May be vertical or horizontal. Default is horizontal.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Show Name', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_name',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'true',
						'description'	=> esc_html__('Whether the name should be shown. May be true (show) or false (do not show). Default is true.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Show Location', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_location',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'false',
						'description'	=> esc_html__('Whether the donors location should be shown. May be true (show) or false (do not show). Default is false.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Show Amount', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_amount',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'true',
						'description'	=> esc_html__('Whether the donors donated amount should be shown. May be true (show) or false(do not show). Default is true.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Show Avatar', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_avatar',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'true',
						'description'	=> esc_html__('Whether the donors avatar should be shown. May be true (show) or false (do not show). Default is true.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Hide if no donors', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'hide_if_no_donors',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'false',
						'description'	=> esc_html__('Whether the shortcode should display anything if no one has donated yet. May be true (hide) or false (do not hide). Default is false.', 'xt-humane-cpt-shortcode'),
					),
					array(
						'label'   		=> esc_html__('Show Gift Aid', 'xt-humane-cpt-shortcode'),
						'name' 			=> 'show_gift_aid',	
						'type' 			=> 'toggle_true_false',  
						'admin_label'	=> true,
						'value' 		=> 'false',
						'description'	=> esc_html__('Whether to display the Gift Aid amount for the donation. May be true (show) or false(do not show). Default is false.', 'xt-humane-cpt-shortcode'),
					),
	            )
	        ),	 
	    ) 
	);
}


/**
 * Charitable Profile Addon
 */
if ( class_exists( 'Charitable' ) ){
	kc_add_map(			    
	    array(  
	        'charitable_profile' 	=> array(
	            'name' 				=> esc_html__('Profile', 'xt-humane-cpt-shortcode'),
	            'description'		=> esc_html__('Charitable plugin registration form.', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
				'description'     	=> esc_html__( 'Charitable plugin profile form.', 'xt-humane-cpt-shortcode' ),
	            'params' 					=> array(),
	            'show_settings_on_create'   => false,
	        ),	 
	    ) 
	);
}


/**
 * Donations Table Addon
 */
if ( class_exists( 'Charitable' ) ){
	kc_add_map(			    
	    array(  
	        'charitable_my_donations' 	=> array(
	            'name' 				=> esc_html__('Donations Table', 'xt-humane-cpt-shortcode'),
	            'description'		=> esc_html__('Charitable plugin registration form.', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
				'description'     	=> esc_html__( 'Charitable plugin donations table.', 'xt-humane-cpt-shortcode' ),
	            'params' 					=> array(),
	            'show_settings_on_create'   => false,
	        ),	 
	    ) 
	);
}


/**
 * Charitable Ambassadors [ FrontEnd Campaign Submission ] Addon
 */
if ( is_plugin_active( 'charitable-ambassadors/charitable-ambassadors.php' ) ) {
	kc_add_map(			    
	    array(  
	        'charitable_submit_campaign' 	=> array(
	            'name' 				=> esc_html__('FrontEnd Campaign Submission', 'xt-humane-cpt-shortcode'),
	            'description'		=> esc_html__('Charitable plugin registration form.', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
				'description'     	=> esc_html__( 'Charitable Ambassadors [ FrontEnd Campaign Submission ].', 'xt-humane-cpt-shortcode' ),
	            'show_settings_on_create'   => false,
	        ),	 
	    ) 
	);
}


/**
 * Charitable Ambassadors [ My Campaigns ] Addon
 */
if ( is_plugin_active( 'charitable-ambassadors/charitable-ambassadors.php' ) ) {
	kc_add_map(			    
	    array(  
	        'charitable_my_campaigns' 	=> array(
	            'name' 				=> esc_html__('My Campaigns', 'xt-humane-cpt-shortcode'),
	            'description'		=> esc_html__('Charitable plugin registration form.', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
				'description'     	=> esc_html__( 'Charitable Ambassadors [ My Campaigns ].', 'xt-humane-cpt-shortcode' ),
	            'show_settings_on_create'   => false,
	        ),	 
	    ) 
	);
}


/**
 * Charitable Ambassadors [ My Donations Received Page ] Addon
 */
if ( is_plugin_active( 'charitable-ambassadors/charitable-ambassadors.php' ) ) {
	kc_add_map(			    
	    array(  
	        'charitable_creator_donations' 	=> array(
	            'name' 				=> esc_html__('My Donations Received Page', 'xt-humane-cpt-shortcode'),
	            'description'		=> esc_html__('Charitable plugin registration form.', 'xt-humane-cpt-shortcode'),
	            'icon' 				=> 'fa-flash',
	            'category'			=> 'Charitable',
				'description'     	=> esc_html__( 'Charitable Ambassadors [ My Donations Received Page ].', 'xt-humane-cpt-shortcode' ),
	            'show_settings_on_create'   => false,
	        ),	 
	    ) 
	);
}

<?php 

/**
 * KingComposer Configuration
 */

/**
 * KC Row Custom Param
 */

add_action('init', 'humane_kc_row_add_param', 99 );

if( !function_exists('humane_kc_row_add_param') ){
	function humane_kc_row_add_param(){
	 
		global $kc;
		$kc->add_map_param( 
			'kc_row', 
			array(
				'name' 			=> 'xt_row_padding',
				'label' 		=> esc_html__( 'Row Padding', 'humane' ),
				'type' 			=> 'toggle',
				'value' 		=> 'yes',
				'description' 	=> esc_html__( 'By default row has 60px padding on top & bottom. You can disable it here.', 'humane' ),
			),
		1 );

		$kc->add_map_param( 
			'kc_row', 
			array(
				'name' 			=> 'xt_row_color',
				'label' 		=> esc_html__( 'Row Color', 'humane' ),
				'type' 			=> 'select',  
				'admin_label' 	=> true,
				'options' 		=> array(    
					'default' 	=> esc_html__( 'Default', 'humane' ),
					'white' 	=> esc_html__( 'White', 'humane' ),
				),
				'value' 		=> 'center', 
				'description' 	=> esc_html__('Select row text color. You can select white, if you have background image or color.', 'humane'),
				'admin_label' 	=> true,
			),
		1 );
	}
}


/**
 * KC Button Custom Param
 */

add_action('init', 'humane_kc_button_add_param', 99 );

if( !function_exists('humane_kc_button_add_param') ){
	function humane_kc_button_add_param(){
	 
		global $kc;
		$kc->add_map_param( 
			'kc_button', 
			array(
				'name' 			=> 'xt_theme_primary_btn',
				'label' 		=> esc_html__( 'Theme Style Button', 'humane' ),
				'type' 			=> 'toggle',
				'value' 		=> 'yes',
				'description' 	=> esc_html__( 'If checked button style will be taken from theme style.', 'humane' ),
			),
		1 );
	}
}


/**
 * KC Single Image Custom Param
 */

add_action('init', 'humane_kc_single_image_add_param', 99 );

if( !function_exists('humane_kc_single_image_add_param') ){
	function humane_kc_single_image_add_param(){
	 
		global $kc;
		$kc->add_map_param( 
			'kc_single_image', 
			array(
				'name' 			=> 'xt_theme_primary_img',
				'label' 		=> esc_html__( 'Theme Style Image', 'humane' ),
				'type' 			=> 'toggle',
				'value' 		=> 'yes',
				'description' 	=> esc_html__( 'If checked Image style will be taken from theme style.', 'humane' ),
			),
		1 );
	}
}


/**
 *  CS Toggle on off
 */

add_action('init', 'xt_kc_add_custom_param', 99 );
 
function xt_kc_add_custom_param(){
 
    global $kc;
    $kc->add_param_type( 'toggle_on_off', 'xt_kc_param_type_toggle_on_off' );
}
 
function xt_kc_param_type_toggle_on_off(){
	
?>	<#
		if( data.options === undefined || data.options.label === undefined )
			data.options = { 'label': 'on|off' };
		data.options.label = data.options.label.split('|');
		
		if( data.value == 'on' )
			checked = 'checked';
		else checked = '';
		
	#>
	<div class="kc-toggle-field-wrp">
		<div class="switch">
			<input type="checkbox" {{checked}} value="on" name="{{data.name}}" class="toggle-button kc-param">
			<span class="toggle-label" data-on="{{data.options.label[0]}}" data-off="{{data.options.label[1]}}"></span>
			<span class="toggle-handle"></span>
			<input type="checkbox" checked class="kc-param kc-hidden kc-empty-param" value="" name="{{data.name}}" />
		</div>
	</div>
	<#
		data.callback = function( el, $ ){
			el.find('.toggle-button').on( 'click', el, function(e){

			    if( this.checked )
			        $(this).val('on');
			    else
			        $(this).val('off');
			});
		}
	#>
<?php
}



/**
 *  CS Toggle true false
 */

add_action('init', 'xt_kc_add_custom_param_toggle_true_false', 99 );
 
function xt_kc_add_custom_param_toggle_true_false(){
 
    global $kc;
    $kc->add_param_type( 'toggle_true_false', 'xt_kc_param_type_toggle_true_false' );
}
 
function xt_kc_param_type_toggle_true_false(){
	
?>	<#
		if( data.options === undefined || data.options.label === undefined )
			data.options = { 'label': 'true|false' };
		data.options.label = data.options.label.split('|');
		
		if( data.value == 'true' )
			checked = 'checked';
		else checked = '';
		
	#>
	<div class="kc-toggle-field-wrp">
		<div class="switch">
			<input type="checkbox" {{checked}} value="true" name="{{data.name}}" class="toggle-button kc-param">
			<span class="toggle-label" data-on="{{data.options.label[0]}}" data-off="{{data.options.label[1]}}"></span>
			<span class="toggle-handle"></span>
			<input type="checkbox" checked class="kc-param kc-hidden kc-empty-param" value="" name="{{data.name}}" />
		</div>
	</div>
	<#
		data.callback = function( el, $ ){
			el.find('.toggle-button').on( 'click', el, function(e){

			    if( this.checked )
			        $(this).val('true');
			    else
			        $(this).val('false');
			});
		}
	#>
<?php
}

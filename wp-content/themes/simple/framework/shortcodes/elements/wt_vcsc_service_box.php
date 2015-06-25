<?php

// File Security Check
if (!defined('ABSPATH')) die('-1');

/*
Register WhoaThemes shortcode.
*/

class WPBakeryShortCode_WT_service_box extends WPBakeryShortCode {
	
	private $wt_sc;
	
	public function __construct($settings) {
        parent::__construct($settings);
		$this->wt_sc = new WT_VCSC_SHORTCODE;
	}
				
	protected function content($atts, $content = null) {
		
		extract( shortcode_atts( array(
			'icon_type' 	    	=> 'wt_icon_type_1',
			'icon_style' 	    	=> 'simple',
			'service_icon' 	    	=> '',
			'service_title' 		=> '',
			//'service_text' 	    	=> '',
			'service_button_text'	=> '',
			'service_button_link' 	=> '',
			'icon_background'   	=> '',
			'icon_color'        	=> '',
    		'icon_align'        	=> 'left',
			'icon_margin' 	   		=> '',
			'icon_size'         	=> 32,
						
			'el_id'            		=> '',
			'el_class'         		=> '',
    		'css_animation'    		=> '',
    		'anim_type'        		=> '',
    		'anim_delay'       		=> '',			
			'css'              		=> ''		
		), $atts ) );
		
		$sc_class = 'wt_service_box_sc';	
					
		$id = mt_rand(9999, 99999);
		if (trim($el_id) != false) {
			$el_id = esc_attr( trim($el_id) );
		} else {
			$el_id = $sc_class . '-' . $id;
		}		
		
		$icon_margin = (int)$icon_margin;	
				
		if ( $icon_margin != '' ) {
			$icon_margin = 'margin: ' . $icon_margin . 'px;';
		}
		
		$el_style = '';				
						
		if (( $icon_background != '' ) || ($icon_style == 'simple')) {
			$icon_background = 'background: ' . $icon_background . ';border-color: ' . $icon_background . ';';
		} else {
			$icon_background = '';
		}
			
		if ( $icon_color != '' ) {
			$icon_color = 'color: ' . $icon_color . ';';
		}
		if ( $icon_background != '' || $icon_color != '' || $icon_margin != '' ) {
			$el_style = ' style="'. $icon_color . $icon_background . $icon_margin.'"';
		}
		
		$service_icon   = esc_html( $service_icon );
		$service_title  = esc_html( $service_title );
		// $service_text   = esc_textarea( $service_text );	
		$content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
		
		if($service_icon != '') {
			$service_icons = '<i'.$el_style.' class="'.$service_icon.'"></i>';
		} else {
			$service_icons = ''; }	
		if($service_title != '') {
			$service_title = '<h3>'.$service_title.'</h3>';
		} else {
			$service_title = ''; }	
		if($content != '') {
			$content = '<p>'.$content.'</p>';
		} else {
			$content = ''; }
		if($service_button_text != '') {
			if($service_button_link != '') {
				$service_button_text = '<a href="'.$service_button_link.'" class="wt_services_button">'.$service_button_text.'</a>';
			} else {
				$service_button_text = '<span class="wt_services_button">'.$service_button_text.'</span>';
			}
		} else {
			$service_button_text = ''; }
				
		$el_class = esc_attr( $this->getExtraClass($el_class) );
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $sc_class.$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);
		$css_class .= ' wt_services_item wt_align_'.$icon_align;		
		$css_class .= $this->wt_sc->getWTCSSAnimationClass($css_animation,$anim_type);
		$anim_data = $this->wt_sc->getWTCSSAnimationData($css_animation,$anim_delay);
		
			
		$output = '<div id="'.$el_id.'" class="'.$css_class.'"'.$anim_data.'>';
		if($service_icon != '') {
			$output .= '<div class="wt_icon wt_icon_'.$icon_size.' ' . $icon_type . ' ' . $icon_style . '">'; 
				$output .= $service_icons;
			$output .= '</div>';
		}
			$output .= '<div class="wt_service_details ' . $icon_type . '">'; 
				$output .= $service_title;
				$output .= $content;
				$output .= $service_button_text;
			$output .= '</div>';
		$output .= '</div>';
		
        return $output;
								
    }
	
}
	
/*
Register WhoaThemes shortcode within Visual Composer interface.
*/

if (function_exists('wpb_map')) {

	$add_wt_sc_func             = new WT_VCSC_SHORTCODE;
	$add_wt_extra_id            = $add_wt_sc_func->getWTExtraId();
	$add_wt_extra_class         = $add_wt_sc_func->getWTExtraClass();
	$add_wt_css_animation       = $add_wt_sc_func->getWTAnimations();
	$add_wt_css_animation_type  = $add_wt_sc_func->getWTAnimationsType();
	$add_wt_css_animation_delay = $add_wt_sc_func->getWTAnimationsDelay();
	
	wpb_map( array(
		'name'          => esc_html__('WT Service Box', 'wt_vcsc'),
		'base'          => 'wt_service_box',
		'icon'          => 'wt_vc_ico_service_box',
		'class'         => 'wt_vc_sc_service_box',
		'category'      => esc_html__('by WhoaThemes', 'wt_vcsc'),
		'description'   => esc_html__('Service box', 'wt_vcsc'),
		'params'        => array(
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Icon type', 'wt_vcsc'),
				'param_name'    => 'icon_type',
				'value' => array( 
					__('Type #1', 'wt_vcsc')   => 'wt_icon_type_1',
					__('Type #2', 'wt_vcsc')   => 'wt_icon_type_2', 
				),
				'description'   => esc_html__('Select service icon type.', 'wt_vcsc')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Service title', 'wt_vcsc'),
				'param_name'    => 'service_title',
				'description'   => esc_html__('Add title for your social box.', 'wt_vcsc')
			),
			/*array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Service text', 'wt_vcsc'),
				'param_name'    => 'content',
				'value'         => '<p>'. esc_html__('I am test text block. Click edit button to change this text.', 'wt_vcsc') .'</p>',
				'description'   => esc_html__('Add text for your social box.', 'wt_vcsc')
			),*/
			array(
				'type'          => 'textarea_html',
				'holder'        => 'div',
				'class'         => '',
				'heading'       => esc_html__('Service text', 'wt_vcsc'),
				'param_name'    => 'content',
				'value'         => '<p>'. esc_html__('I am test text block. Click edit button to change this text.', 'wt_vcsc') .'</p>',
				'description'   => esc_html__('Enter your content.', 'wt_vcsc')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Service button text', 'wt_vcsc'),
				'param_name'    => 'service_button_text',
				'description'   => esc_html__('Add a text for your social box button.', 'wt_vcsc')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Service button link', 'wt_vcsc'),
				'param_name'    => 'service_button_link',
				'description'   => esc_html__('Add a link for your social box button.', 'wt_vcsc')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Service icons', 'wt_vcsc'),
				'param_name'    => 'service_icon',
				'description'   => '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a>, <a href="http://entypo.com/" target="_blank">Entypo</a> or <a href="http://glyphicons.com/" target="_blank">Glyphicons</a> accepted. (use "fa-", "entypo-" or "glyphicon-" prefix - for example "<strong>fa-adjust, entypo-flag or glyphicon-leaf</strong>"'
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Icon style', 'wt_vcsc'),
				'param_name'    => 'icon_style',
				'value' => array( 
					__('Simple', 'wt_vcsc')    => 'wt_simple',
					__('Square', 'wt_vcsc')    => 'wt_square', 
					__('Rounded', 'wt_vcsc')   => 'wt_rounded',
					__('Circle', 'wt_vcsc')    => 'wt_circle',
				),
				'description'   => esc_html__('Select service icon style.', 'wt_vcsc')
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Icon background', 'wt_vcsc'),
				'param_name'    => 'icon_background',
				'description'   => esc_html__( 'Select service icon background.', 'wt_vcsc' )
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Icon color', 'wt_vcsc'),
				'param_name'    => 'icon_color',
				'description'   => esc_html__( 'Select service icon text color.', 'wt_vcsc' )
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Icons alignment', 'wt_vcsc'),
				'param_name'    => 'icon_align',
				'value'         => array( esc_html__('Align left', 'wt_vcsc') => 'left', esc_html__('Align right', 'wt_vcsc') => 'right', esc_html__('Align center', 'wt_vcsc') => 'center'),
				'std'           => 'center',
				'description'   => esc_html__('Select icons alignment.', 'wt_vcsc')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Icon margin', 'wt_vcsc'),
				'param_name'    => 'icon_margin',
				'std'           => '0',
				'description'   => esc_html__('Select icons margin. (in pixels)', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Icon size', 'wt_vcsc'),
				'param_name'    => 'icon_size',
				'value' => array( 
					'26' => '26',
					'32' => '32', 
					'38' => '38',
					'44' => '44',
					'50' => '50',
					'60' => '60',
					'70' => '70',
					'80' => '80',
				),
				'std'           => '32',
				'description'   => esc_html__('Select service icon size.', 'wt_vcsc')
			),
			
			$add_wt_extra_id,
			$add_wt_extra_class,
			$add_wt_css_animation,
			$add_wt_css_animation_type,
			$add_wt_css_animation_delay,
			
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Css', 'wt_vcsc'),
				'param_name'    => 'css',
				'group'         => esc_html__('Design options', 'wt_vcsc')
			)
		)
	));	
	
}
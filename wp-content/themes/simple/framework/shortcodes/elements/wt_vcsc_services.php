<?php

// File Security Check
if (!defined('ABSPATH')) die('-1');

/*
Register WhoaThemes shortcode.
*/

class WPBakeryShortCode_WT_services extends WPBakeryShortCode {
	
	private $wt_sc;
	
	public function __construct($settings) {
        parent::__construct($settings);
		$this->wt_sc = new WT_VCSC_SHORTCODE;
	}
				
	protected function content($atts, $content = null) {
		
		extract( shortcode_atts( array(
			'image' 	       => '',
			'img_size'         => 'thumbnail',
    		'style'            => '',
			'img_effect'       => '',
    		'border_color'     => '',
			'icon' 	           => '',
			'icon_type'		   => '',
			'icon_style'	   => '',
			'default_icon'     => '',
			'border_style'     => '',
			'icon_background'  => '',
			'icon_color'       => '',
			'icon_size'        => 32,			
    		'alignment'        => 'left',
			'empty_space'      => '',
			'title' 	       => '',
    		'button_text'     => '',
			'button_link'     => 32,
						
			'el_id'            => '',
			'el_class'         => '',
    		'css_animation'    => '',
    		'anim_type'        => '',
    		'anim_delay'       => '',			
			'css'              => ''		
		), $atts ) );
		
		$sc_class = 'wt_services_sc';	
					
		$id = mt_rand(9999, 99999);
		if (trim($el_id) != false) {
			$el_id = esc_attr( trim($el_id) );
		} else {
			$el_id = $sc_class . '-' . $id;
		}		
		
		$style        = ($style!='') ? $style : '';		
		$el_style     = '';	
		$inline_style = '';
		$img_output   = '';
		
		// Service Image Output
		if ( $border_color != '' ) {
			if ($style == 'vc_box_border' || $style == 'vc_box_border_circle' ) {
				$el_style = 'background-color:' . esc_attr( $border_color ) . ';';
			}
			if ($style == 'vc_box_outline' || $style == 'vc_box_outline_circle' ) {
				$el_style = 'border-color:' . esc_attr( $border_color ) . ';';
			}
		}
		
		$img_id = preg_replace('/[^\d]/', '', $image);
		
		if ( $border_color != '' && ($style == 'vc_box_border' || $style == 'vc_box_border_circle' || $style == 'vc_box_outline' || $style == 'vc_box_outline_circle') ) {
			$img = wt_wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => $style, 'style' => $el_style ));
		} else {
			$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => $style ));
		}
				
		$img_output = ($style=='vc_box_shadow_3d') ? '<span class="vc_box_shadow_3d_wrap">' . $img['thumbnail'] . '</span>' : $img['thumbnail'];			
		// Image hover Output
		if ( $img_effect == 'yes' ) {
			$wt_img_effect = ' wt_img_effect';
		} else {
			$wt_img_effect = '';
		}
			
		// Service Icon Output
		if ( $default_icon == 'yes' ) {
			$icon_default = ' wt_icon_default';
		} else {
			$icon_default = '';
		}
			
		if ( $icon_background != '' ) {
			$icon_background = 'background: ' . $icon_background . ';';
		}
			
		if ( $icon_color != '' ) {
			if ( $icon_type != 'wt_icon_type_3' ) {
				$icon_color = 'color: ' . $icon_color . ';';
			} else {
				$icon_color = 'color: ' . $icon_color . ';' . 'border-color: ' . $icon_color . ';'; 
			}
		}
		
		if ( $icon_background != '' || $icon_color != '' ) {
			$inline_style = ' style="'. $icon_color . $icon_background .'"';
		}
		
		if ( $icon_type != 'wt_icon_type_3' ) {
			$border_style = ''; // Add border style only for type_3 icons
		} else {
			$border_style = ' wt_icon_border_' . $border_style;
		}
		
		$icon  = esc_html( $icon );
		$title = esc_html( $title );
		$button_text = esc_html( $button_text );
		
		if ( $icon_type != 'wt_icon_type_2' && $icon_type != 'wt_icon_type_3' ) {
			$icon_style = ''; // Add icon style (rounded, squared and circle) ony for type2 and type3 icons
		} else {
			$icon_style = ' ' . $icon_style;
		}
		
		$icon_type = ' ' . $icon_type;
		$icon_size = ' wt_icon_' . $icon_size;
		
		if ( $icon != '' ) {
			$icon_out = '<i class="'.$icon.'"></i>';
		} else {
			$icon_out = ''; 
		}
		
		if ( $empty_space == 'yes' ) {
			$empty_space = ' wt_overflow_hidden';
		} else {
			$empty_space = '';
		}	
			
		if ( $title != '' ) {
			$title_out = '<h4>'.$title.'</h4>';
		} else {
			$title_out = ''; 
		}
		
		if ( $button_text != '' ) {
			
			// parse button link		
			$button_link = ($button_link=='||') ? '' : $button_link;
			$button_link = vc_build_link($button_link);
			$button_url = esc_url($button_link['url']);
			
			$button_title = $button_link['title'];
			$button_title_out = ($button_title!='') ? ' title="' . esc_attr( $button_title ) .'"' : '';	
			
			$button_target = $button_link['target'];
			$button_target_out = ($button_target!='') ? ' target="' . $button_target .'"' : '';	
			
			if ( $button_url != '' ) {		
				$button_out = '<a class="btn" href="'.$button_url.'"' . $button_title_out . $button_target_out .'>'.$button_text.'</a>';
			} else {
				$button_out = '<a class="btn" href="#">'.$button_text.'</a>';
			}
		} else {
			$button_out = ''; 
		}
		
		$el_class = esc_attr( $this->getExtraClass($el_class) );
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $sc_class.$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);
		$css_class .= ' wt_align_' .$alignment;		
		$css_class .= $this->wt_sc->getWTCSSAnimationClass($css_animation,$anim_type);
		$anim_data = $this->wt_sc->getWTCSSAnimationData($css_animation,$anim_delay);		
		
		$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content		
			
		$output = '<div id="'.$el_id.'" class="'.$css_class.'"'.$anim_data.'>';
			if ( $icon_out != '' ) {
				$output .= "\n\t" . '<div class="wt_icon'.$icon_type.$icon_style.$border_style.$icon_size.$icon_default.'"'.$inline_style.'>'; 
					$output .= $icon_out;
				$output .= "\n\t" . '</div>';
			}
			
			if ( $img_output != '' ) {
				$output .= "\n\t" . '<div class="wt_service_img'.$wt_img_effect.'">'; 
					$output .= $img_output;
					if ( $img_effect == 'yes' ) {
						$output .= '<span class="wt_mask"><span class="wt_zoom"></span></span>';
					} else {
						$output .= '';
					}
				$output .= "\n\t" . '</div>';
			}
			
			$output .= '<div class="wt_service_details'.$empty_space.'">'; 
				$output .= "\n\t" . $title_out;
				$output .= "\n\t" . $content;
				if ( $button_out != '' ) {
				$output .= "\n\t" . '<div class="wt_pricing_btn">'; 
					$output .= "\n\t\t" .  $button_out;
				$output .= "\n\t" . '</div>';
			}	
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
		'name'          => esc_html__('WT Services', 'wt_vcsc'),
		'base'          => 'wt_services',
		'icon'          => 'wt_vc_ico_services',
		'class'         => 'wt_vc_sc_services',
		'category'      => esc_html__('by WhoaThemes', 'wt_vcsc'),
		'description'   => esc_html__('Build an alternative services block', 'wt_vcsc'),
		'params'        => array(
			array(
				'type'		  => 'wt_separator',
				'heading'	  => esc_html__( '', 'wt_vcsc' ),
				"param_name"  => 'separator',
				'value'	      => 'Service Image & Styles'
			),
			array(
				'type'          => 'attach_image',
				'heading'       => esc_html__('Image', 'wt_vcsc'),
				'param_name'    => 'image',
				'value'         => '',
				'description'   => esc_html__('Select image from media library.', 'wt_vcsc')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Image size', 'wt_vcsc'),
				'param_name'    => 'img_size',
				'description'   => esc_html__('Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Image style', 'wt_vcsc'),
				'param_name'    => 'style',
				'value'         => WT_VCSC_getShared('single image styles')
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__('Image Hover Effect?','wt_vcsc'),
				'param_name'	=> 'img_effect',
				'value'			=> Array( esc_html__('Yes please.', 'wt_vcsc') => 'yes'),
				'description'   => esc_html__( 'Check this option to add a Image Hover Effect.', 'wt_vcsc' )
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Border color', 'wt_vcsc'),
				'param_name'    => 'border_color',
				'dependency'    => Array('element' => 'style', 'value' => array('vc_box_border', 'vc_box_border_circle', 'vc_box_outline', 'vc_box_outline_circle')),
				'description'   => esc_html__( 'Select border color for your image.', 'wt_vcsc' )
			),			
			array(
				'type'		  => 'wt_separator',
				'heading'	  => esc_html__( '', 'wt_vcsc' ),
				"param_name"  => 'separator_2',
				'value'	      => 'Service Icon & Styles'
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Icon', 'wt_vcsc'),
				'param_name'    => 'icon',
				'description'   => '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a>, <a href="http://entypo.com/" target="_blank">Entypo</a> or <a href="http://glyphicons.com/" target="_blank">Glyphicons</a> accepted. (use "fa-", "entypo-" or "glyphicon-" prefix - for example "<strong>fa-adjust, entypo-flag or glyphicon-leaf</strong>"'
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Icon type', 'wt_vcsc'),
				'param_name'    => 'icon_type',
				'value'         => array( 
					__('Simple', 'wt_vcsc')             		 => 'wt_icon_type_1',
					__('Background', 'wt_vcsc')         		 => 'wt_icon_type_2', 
					__('Background hover & border', 'wt_vcsc')   => 'wt_icon_type_3',
				),
				'description'   => esc_html__('Select service icon type.', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Icon style', 'wt_vcsc'),
				'param_name'    => 'icon_style',
				'value'         => array(
					__('Square', 'wt_vcsc')          => 'wt_icon_square', 
					__('Rounded', 'wt_vcsc')         => 'wt_icon_rounded',
					__('Circle', 'wt_vcsc')          => 'wt_icon_circle',
					__('Diamond', 'wt_vcsc')   	     => 'wt_icon_diamond',
					__('Diamond Rounded', 'wt_vcsc') => 'wt_icon_diamond wt_icon_rounded',
				),
				'std'           => 'wt_icon_circle',
				'dependency' 	=> array(
					'element' 	=> 'icon_type',
					'value' 	=> array('wt_icon_type_2', 'wt_icon_type_3')
				),
				'description'   => esc_html__('Select service icon style.', 'wt_vcsc')
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__('Default Icon?','wt_vcsc'),
				'param_name'	=> 'default_icon',
				'value'			=> Array( esc_html__('Yes please.', 'wt_vcsc') => 'yes'),
				'description'   => esc_html__( 'Check this option to add a default background / border color.', 'wt_vcsc' )
			),
			array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> esc_html__('Border Style','wt_vcsc'),
				'param_name'	=> 'border_style',
				'value'			=> array(
					__('Solid', 'wt_vcsc')	=> 'solid',
					__('Dotted', 'wt_vcsc')	=> 'dotted',
					__('Dashed', 'wt_vcsc')	=> 'dashed',
				),
				'dependency' 	=> array(
					'element' 	=> 'icon_type',
					'value' 	=> array('wt_icon_type_3')
				),
				'description'   => esc_html__('Select border style.', 'wt_vcsc')
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Icon background', 'wt_vcsc'),
				'param_name'    => 'icon_background',
				'dependency' 	=> array(
					'element' 	=> 'icon_type',
					'value' 	=> array('wt_icon_type_2', 'wt_icon_type_3')
				),
				'description'   => esc_html__( 'Select icon background.', 'wt_vcsc' )
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Icon color', 'wt_vcsc'),
				'param_name'    => 'icon_color',
				'description'   => esc_html__( 'Select icon color.', 'wt_vcsc' )
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Icon size', 'wt_vcsc'),
				'param_name'    => 'icon_size',
				'value'         => array( 
					'26' => '26',
					'30' => '30', 
					'32' => '32', 
					'38' => '38',
					'40' => '40',
					'42' => '42',
					'44' => '44',
					'50' => '50',
				),
				'std'           => '30',
				'description'   => esc_html__('Select icon size.', 'wt_vcsc')
			),				
			array(
				'type'		  => 'wt_separator',
				'heading'	  => esc_html__( '', 'wt_vcsc' ),
				"param_name"  => 'separator_3',
				'value'	      => 'Service Title & Content'
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Alignment', 'wt_vcsc'),
				'param_name'    => 'alignment',
				'value'         => array( esc_html__('Align left', 'wt_vcsc') => 'left', esc_html__('Align right', 'wt_vcsc') => 'right', esc_html__('Align center', 'wt_vcsc') => 'center'),
				'std'           => 'left',
				'description'   => esc_html__('Select service box alignment.', 'wt_vcsc')
			),	
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__('Empty space below icon?','wt_vcsc'),
				'param_name'	=> 'empty_space',
				'value'			=> Array( esc_html__('Yes please.', 'wt_vcsc') => 'yes'),
				'description'   => esc_html__( 'Check this option if you don\'t want to fill the space below icon with text.', 'wt_vcsc' )
			),	
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Service title', 'wt_vcsc'),
				'param_name'    => 'title',
				"admin_label"   => true,
				'description'   => esc_html__('Add title for your service box.', 'wt_vcsc')
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Service text', 'wt_vcsc'),
				'param_name'    => 'content',
				'value' 		=> '<p>' .esc_html__( 'I am text block. Click edit button to change this text.', 'wt_vcsc' ) . '</p>',
				'description'   => esc_html__('Add text for your service box.', 'wt_vcsc')
			),
			array(
				"type"		  => "textfield",
				"heading"	  => esc_html__( "Button: Text", "wt_vcsc" ),
				"param_name"  => "button_text",
				"value"		  => "Button Text",
				"description" => esc_html__( "Type button text here.", "wt_vcsc" )
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__('Button: Link', 'wt_vcsc'),
				'param_name'  => 'button_link',
				'value'       => '',
				'description' => esc_html__('Type button link here.', 'wt_vcsc')
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
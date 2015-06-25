<?php

// Removing shortcodes
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_message");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_progress_bar");




if(!function_exists('psGetPostsArray')) {
	function psGetPostsArray () {
		$output = '';
		$type = 'team';
		$args=array(
		  'post_type' => $type,
		  'post_status' => 'publish',
		  'orderby' => 'title',
		  'order' => 'ASC',
		  'posts_per_page' => -1
		 );
		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post();
    		$output[get_the_title()] = get_the_ID();			    
		endwhile;
		}
		wp_reset_query(); 
		return $output;
	}
}
add_action('init', 'psGetPostsArray',3);

if (!function_exists('getClientsCatsArray')){
	function getClientsCatsArray() {
    $terms = get_terms('clients-cats');	
	$catsClients = array('All' => 'all');	
    $count = count($terms);
	    if ( $count > 0 ):
        foreach ( $terms as $term ) {			
        	$catsClients[$term->name] = $term->slug;
		};
    endif;
    return $catsClients;
	}
}
add_action('init', 'getClientsCatsArray',3);
$teamPosts = psGetPostsArray('team');
$clientsCats = getClientsCatsArray();






$add_logo_cats = array(
      "type" => "dropdown",
      "heading" => __("Clients category", 'prodigystudio'),
      "param_name" => "logo_cats",
	  "admin_label" => true,
	  "value" => $clientsCats,
      "description" => __("Select a specific category of the clients logo", 'prodigystudio')
    );

// Add VC admin CSS styles
function load_custom_vc_admin_style() {
        wp_register_style( 'custom_vc_admin_css', get_template_directory_uri() . '/framework/vc_extend/ps_vc_admin.css', false, '' );
        wp_enqueue_style( 'custom_vc_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_vc_admin_style' );

//Add VC frontend styles
function load_custom_vc_frontend_style() {
		 wp_register_style( 'custom_vc_frontend_css', get_template_directory_uri().'/framework/vc_extend/ps_vc_frontend.css', array('js_composer_front'), '', 'screen' );
		 wp_enqueue_style( 'custom_vc_frontend_css' );
    }
add_action('wp_head', 'load_custom_vc_frontend_style', 6);

// Add custom functions and arrays
function icon_settings_field($settings, $value) {
   $dependency = vc_generate_dependencies_attributes($settings);
   $icon_id =uniqid("icon_");
   return '<div class="icon-selector-block">'
             .'<input data-preview ="previewicon-'.$icon_id.'" id="icon" name="'.$settings['param_name']
             .'" class="wpb_vc_param_value wpb-textinput '
             .$settings['param_name'].' '.$settings['type'].'_field" type="text" value="'
             .$value.'" ' . $dependency . '/>'.'</div>'.'<a href="#" class="iconbox button">Select icon</a><span class="previewicon" id="previewicon"><i class="'.$value.'"></i></span>
		 <div class="ps_panel_icons" style="display:none;">'.ps_generate_icon_cats().ps_generate_icons().'</div>';
}
add_shortcode_param('icon_selector', 'icon_settings_field', get_template_directory_uri().'/framework/vc_extend/ps_vc_js.js');

function ps_social_links($settings, $value) {
	$dependency = vc_generate_dependencies_attributes($settings);
		
}


$add_animation_effects = array(
  "type" => "dropdown",
  "heading" => __("CSS Animation", 'prodigystudio '),
  "param_name" => "ps_animation",
  "admin_label" => true,
  "value" => array ('noAnimation' => 'noAnimation','bounce' => 'bounce','flash' => 'flash','pulse' => 'pulse','rubberBand' => 'rubberBand','shake' => 'shake','swing' => 'swing','tada' => 'swing','wobble' => 'wobble','bounceIn' => 'bounceIn','bounceInDown' => 'bounceInDown','bounceInLeft' => 'bounceInLeft','bounceInRight' => 'bounceInRight','bounceInUp' => 'bounceInUp','bounceOut' => 'bounceOut','bounceOutDown' => 'bounceOutDown','bounceOutLeft' => 'bounceOutLeft','bounceOutRight' => 'bounceOutRight' ,'bounceOutUp' => 'bounceOutUp','fadeIn' => 'fadeIn','fadeInDown' => 'fadeInDown','fadeInDownBig' => 'fadeInDownBig','fadeInLeft' => 'fadeInLeft','fadeInLeftBig' => 'fadeInLeftBig','fadeInRight' => 'fadeInRight','fadeInRightBig' => 'fadeInRightBig','fadeInUp' => 'fadeInUp','fadeInUpBig' => 'fadeInUpBig','fadeOut' => 'fadeOut','fadeOutDown' => 'fadeOutDown','fadeOutDownBig' => 'fadeOutDownBig','fadeOutLeft' => 'fadeOutLeft','fadeOutLeftBig' => 'fadeOutLeftBig','fadeOutRight' => 'fadeOutRight','fadeOutRightBig' => 'fadeOutRightBig','fadeOutUp' => 'fadeOutUp','fadeOutUpBig' => 'fadeOutUpBig','flip' => 'flip','flipInX' => 'flipInX','flipInY' => 'flipInY','flipOutX' => 'flipOutX','flipOutY' => 'flipOutY','lightSpeedIn' => 'lightSpeedIn','lightSpeedOut' => 'lightSpeedOut','rotateIn' => 'rotateIn','rotateInDownLeft' => 'rotateInDownLeft','rotateInDownRight' => 'rotateInDownRight','rotateInUpLeft' => 'rotateInUpLeft','rotateInUpRight' => 'rotateInUpRight','rotateOut' => 'rotateOut','rotateOutDownLeft' => 'rotateOutDownLeft','rotateOutDownRight' => 'rotateOutDownRight','rotateOutUpLeft' => 'rotateOutUpLeft','rotateOutUpRight' => 'rotateOutUpRight','hinge' => 'hinge','rollIn' => 'rollIn','rollOut' => 'rollOut','zoomIn' => 'zoomIn','zoomInDown' => 'zoomInDown','zoomInLeft' => 'zoomInLeft','zoomInRight' => 'zoomInRight','zoomInUp' => 'zoomInUp','zoomOut' => 'zoomOut','zoomOutDown' => 'zoomOutDown','zoomOutLeft' => 'zoomOutLeft','zoomOutRight' => 'zoomOutRight','zoomOutUp' => 'zoomOutUp')
);


$add_animation_delay = array(
	"type" => "textfield",
	"heading" => __("Animation delay", 'prodigystudio '),
	"param_name" => "ps_animation_delay",	
	"value" => "",
	"admin_label" => true,
    "description" => __('Please, input the delay of the animation (200,400,600,800)', 'prodigystudio ')
);

$add_text_alignment =  array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __('Text align','prodigystudio'),
	"param_name" => "align_text",
	"value" => array(
		"Left" => "text-left",
		"Right" => "text-right",
		"Center" => "text-center"
	),
	"description" => "Select an alignment for all content in the column"

);
$add_colors =  array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __('Colors','prodigystudio'),
	"param_name" => "color",
	"value" => array(
		"Default" => "",
		"Green" => "green",
		"Blue" => "blue",
		"Yellow" => "yellow",
		"Red" => "red"
	),
	"description" => ""

);

if (!function_exists('psAnimation')){
	function psAnimation($animation) {
	$output = '';
	if ($animation != '') $output .= 'data-animate ="'.$animation.'"';
    return $output;
	}
}


//Add custom parameters to existing VC elements

//Animations
vc_remove_param("vc_single_image", "css_animation"); 							
vc_remove_param("vc_cta_button2", "css_animation"); 	
vc_remove_param("vc_column_text", "css_animation"); 				
vc_remove_param("vc_tabs","interval");
vc_remove_param("vc_tour","interval");
vc_remove_param("vc_accordion","active_tab");
vc_remove_param("vc_accordion","collapsible");
vc_remove_param("vc_video","link");
vc_remove_param("vc_video","title");

vc_add_param("vc_single_image", $add_animation_effects);
vc_add_param("vc_column_inner", $add_animation_effects);
vc_add_param("vc_column", $add_animation_effects);
vc_add_param("vc_tab", $add_animation_effects);
vc_add_param("vc_tab", $add_animation_effects);
vc_add_param("vc_tour", $add_animation_effects);
vc_add_param("vc_column_text", $add_animation_effects);
vc_add_param("vc_column", $add_animation_delay);
vc_add_param("vc_column_inner", $add_animation_delay);

vc_add_param("vc_video", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Video source", 'prodigystudio '),
	"param_name" => "video_source",
	"admin_label" => true,
	"value" => array(
		__('Vimeo' ,'prodigystudio ') => "vimeo",	
		__('Youtube','prodigystudio ') => "youtube"
		
	),
    "description" => __('Select the source of the video Vimeo or Youtube', 'prodigystudio ')
));

vc_add_param("vc_video", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video ID", 'prodigystudio '),
	"param_name" => "video_id",
	"admin_label" => true,
	"value" => "",
    "description" => __('Please, input the ID of the video', 'prodigystudio ')
));

//VC Row
vc_remove_param("vc_row", "el_class"); 
vc_add_param("vc_column_inner", $add_text_alignment);
vc_add_param("vc_column", $add_text_alignment);
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Contain Inner Columns",
	"value" => array("Inner columns" => "false" ),
	"param_name" => "inner_columns",
    "description" => __("Enable if will contain inner columns", 'prodigystudio ')
	));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Content Layout", 'prodigystudio '),
	"param_name" => "content_layout",
	"value" => array(
		__('Grid' ,'prodigystudio ') => "grid",	
		__('Full Width','prodigystudio ') => "full-width",
		__('Separator','prodigystudio ') => "separator"
		
	),
    "description" => __('Select "Full Width" if you want to display content on full size of the site (Works only with Full width page template)', 'prodigystudio ')
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
	"group" => 'PS Background Options',
    "heading" => __('Background types', 'prodigystudio'),
    "param_name" => "options_bg",
    "value" => array(
                        __("Default", 'prodigystudio') => 'default',
						__("Image background with Overlay", 'prodigystudio') => 'overlay',
						__("Parallax background", 'prodigystudio') => 'parallaxbg',
						__("Parallax background with Overlay", 'prodigystudio') => 'parallaxbgoverlay',
						__("Google map background", 'prodigystudio') => 'googlebg',
                        __("HTML5 video background", 'prodigystudio') => 'html5videobg',
						
                        //__('Youtube video background', 'prodigystudio') => 'ytvideobg'
                      ),
      "description" => __("Select a background video type for your row", 'prodigystudio'),
    ));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"group" => 'PS Background Options',
	"heading" => "WebM File URL",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "You must include this format & the mp4 format to render your video with cross browser compatibility. OGV is optional.
Video must be in a 16:9 aspect ratio.",
	"dependency" => array('element' => "options_bg", 'value' =>  array('html5videobg'))
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"group" => 'PS Background Options',
	"heading" => "MP4 File URL",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "Enter the URL for your mp4 video file here",
	"dependency" => array('element' => "options_bg", 'value' =>  array('html5videobg'))
	));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"group" => 'PS Background Options',
	"heading" => "OGV File URL",
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "Enter the URL for your ogv video file here",
	"dependency" => Array('element' => "options_bg", 'value' =>  array('html5videobg'))
	));


vc_add_param("vc_row", array(
    "type" => "dropdown",
	"class" => "",
	"group" => 'PS Background Options',
	"heading" => "Audio",
	"param_name" => "mute",
    "value" => array(
                        __("Muted", 'prodigystudio') => 'muted',
                        __("Unmuted", 'prodigystudio') => 'unmuted'
                      ),
    "description" => __("Select a video audio default stand", 'prodigystudio'),
	"dependency" => Array('element' => "options_bg", 'value' =>  array('html5videobg'))
	));
	
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"group" => 'PS Background Options',
	"heading" => "Google map latitude",
	"value" => "",
	"param_name" => "gmap_lat",
    "description" => __("Add google map latitude", 'prodigystudio '),
	"dependency" => Array('element' => "options_bg", 'value' => "googlebg")
	));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"group" => 'PS Background Options',
	"heading" => "Google map longitude",
	"value" => "",
	"param_name" => "gmap_long",
    "description" => __("Add google map longitude", 'prodigystudio '),
	"dependency" => Array('element' => "options_bg", 'value' => "googlebg")
	));
	
vc_add_param("vc_row", array(
		"type" => "attach_image",
		"group" => 'PS Background Options',
		"heading" => __("Marker", 'prodigystudio '),
		"param_name" => "gmap_marker",
		"value" => "",
		"description" => __("Upload your own marker","prodigystudio"),
		"dependency" => Array('element' => "options_bg", 'value' => "googlebg")
	));
		
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section ID",
	"value" => "",
	"param_name" => "section_id",
    "description" => __("Input an ID for the section", 'prodigystudio ')
	));

	

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "ROW",
	"value" => array("Wrap in row?" => "true" ),
	"param_name" => "wrapdiv",
    "description" => __("Enable to wrap inner row in div.row", 'prodigystudio ')
	));	
	
vc_add_param("vc_row", array(
        "type" => "textfield",
        "heading" => __("Extra class name", 'prodigystudio '),
        "param_name" => "el_class",
        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'prodigystudio '),
      ));

//VC Tab

vc_add_param("vc_tab", array(
				"type" => "icon_selector",
				"class" => "",
				"heading" => __("Icon", 'prodigystudio '),
				"param_name" => "icon",
				"description" => ""
				));

vc_add_param("vc_tab", array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Maleo Tabs description", 'prodigystudio '),
				"param_name" => "tab_description",
				"description" => ""
				));				

vc_add_param("vc_tabs", array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Tabs Position", 'prodigystudio '),
				"param_name" => "tabs_position",
				'value' => array( 
					"Top" => "top-tab",
					"Bottom" => "bottom-tab" 
				),
				"description" => "Select a desired position of the tabs"
				));
				
vc_add_param("vc_tabs", array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Tabs Style", 'prodigystudio '),
				"param_name" => "tabs_style",
				'value' => array( 
					"Default" => "",
					"Maleo" => "maleo-tab" 
				),
				"description" => "Select a style for the tabs"
				));

vc_add_param("vc_tour", array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Tabs Style", 'prodigystudio '),
				"param_name" => "tabs_style",
				'value' => array( 
					"Default" => "",
					"Accordion" => "accordion",
					"Maleo" => "maleo-index-tab" 
				),
				"description" => "Select a style for the tabs"
				));


vc_add_param("vc_tour", array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Tabs Position", 'prodigystudio '),
				"param_name" => "tabs_position",
				'value' => array( 
					"Left" => "left-tab",
					"Right" => "right-tab" 
				),
				"description" => "Select a desired position of the tabs"
				));
				

/* ProdigyStudio Separator/divider
---------------------------------------------------------- */

vc_map( array(
	'name' => __( 'PS Separator', 'prodigystudio' ),
	'base' => 'ps_separator',
	'icon' => 'icon-wpb-ui-separator',
	'show_settings_on_create' => true,
	'category' => array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
//"controls"	=> 'popup_delete',
	'description' => __( 'Horizontal separator line', 'prodigystudio' ),
	'params' => array(		
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'prodigystudio' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prodigystudio' )
		)
	)
) );

/* ProdigyStudio Teaser
---------------------------------------------------------- */

vc_map( array(
  "name" => __("PS Teaser", 'prodigystudio'),
  "base" => "ps_teaser",
  "icon" => "ps-teaser-icon",
  "category" =>array('By ProdigyStudio','Content'),
  "description" => __('Text box with image and link', 'prodigystudio'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Title", 'prodigystudio'),
      "param_name" => "title",
	  "admin_label" => true,
      "value" => __("Teaser title", 'prodigystudio')
    ),
	
	array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'prodigystudio' ),
			'param_name' => 'image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'prodigystudio' )
		),
	$add_animation_effects,	
	
	array(
			'type' => 'textfield',
			'heading' => __( 'Text on the link', 'prodigystudio' ),
			'param_name' => 'link_label',
			'value' => __( 'Text on the linke', 'prodigystudio' ),
			'description' => __( 'Text on the link.', 'prodigystudio' )
		),
	
	array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'prodigystudio' ),
			'param_name' => 'link',
			'description' => __( 'Button link.', 'prodigystudio' )
		),
	
	
	
    array(
      "type" => "textarea_html",
      "heading" => __("Content", 'prodigystudio'),
      "param_name" => "content",
      "value" => __("Teaser content.", 'prodigystudio')
    )   
  )
) );

/* ProdigyStudio Teaser
---------------------------------------------------------- */

vc_map( array(
  "name" => __("PS Numbered Box", 'prodigystudio'),
  "base" => "ps_numbered_box",
  "icon" => "ps-numbered-box",
  "category" =>array('By ProdigyStudio','Content'),
  "description" => __('Text numbered box with image', 'prodigystudio'),
  "params" => array(
    array(
		"type" => "textfield",
		"heading" => __("Title", 'prodigystudio'),
		"param_name" => "title",
		"admin_label" => true,
		"value" => __("Numbered box title", 'prodigystudio')
    ),
	
	array(
		'type' => 'attach_image',
		'heading' => __( 'Image', 'prodigystudio' ),
		'param_name' => 'image',
		'value' => '',
		'description' => __( 'Select image from media library.', 'prodigystudio' )
		),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Image alignment", 'prodigystudio '),
		"param_name" => "align",
			"value" => array(
				"Left" => "left",
				"Right" => "right",
				"Center" => "center",				
								
			),
		"description" => ""
	),	
	array(
		'type' => 'textfield',
		'heading' => __( 'Number', 'prodigystudio' ),
		'param_name' => 'process_number',
		'value' => __( '1', 'prodigystudio' ),
		"admin_label" => true,
		'description' => __( 'Box Number', 'prodigystudio' )
		),
	
    array(
      "type" => "textarea_html",
      "heading" => __("Content", 'prodigystudio'),
      "param_name" => "content",
      "value" => __("Numbered box content.", 'prodigystudio')
    ),
	
	array(
			'type' => 'textfield',
			'heading' => __( 'Text on the link', 'prodigystudio' ),
			'param_name' => 'link_label',
			'value' => __( 'Text on the linke', 'prodigystudio' ),
			'description' => __( 'Text on the link.', 'prodigystudio' )
		),
	
	array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'prodigystudio' ),
			'param_name' => 'link',
			'description' => __( 'Button link.', 'prodigystudio' )
		), 
	  
  )
) );


/* ProdigyStudio Alert boxes
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Alert Box", 'prodigystudio '),
  "base" => "ps_alert",
  "icon" => "icon-wpb-alertbox",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
  "description" => __('Alert boxes', 'prodigystudio '),
  "params" => array(
	array(
	  "type" => "dropdown",
	  "class" => "",
	  "heading" => __("Alert box type", 'prodigystudio '),
	  "admin_label" => true,
	  "param_name" => "alert_type",
			"value" => array(
				"Default" => "default",
				"Info" => "blue",
				"Success" => "green",
				"Warning" => "yellow",
				"Error" => "red"
								
			),
	  "description" => ""
	), 
	array(
	  "type" => "dropdown",
	  "class" => "",
	  "heading" => __("Alert border type", 'prodigystudio '),
	  "param_name" => "border",
			"value" => array(
				"Default" => "",
				"Radius" => "radius",
				"Round" => "round",
								
			),
	  "description" => ""
	),    
	array(
      "type" => "textarea_html",
      "heading" => __("Content", 'prodigystudio '),
      "param_name" => "content",
      "value" => __("Alert box content.", 'prodigystudio ')
    ),
	$add_animation_effects,
	$add_animation_delay,	
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", 'prodigystudio '),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'prodigystudio ')
    )
  )
) );

/* ProdigyStudio Headline
---------------------------------------------------------- */
		vc_map( array(
			'name' => __('PS Headline', 'prodigystudio '),
			'base' => 'ps_headline',
			'class' => '',
		  	'icon' => 'icon-wpb-heading',
		    'category' =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
      		'description' => __("Headline block", 'prodigystudio '),
			'params' => array(
				array(
					'type' => 'colorpicker',
					'heading' => __( 'Title font color', 'prodigystudio ' ),
					'param_name' => 'customtitlecolor',
					'description' => __( 'Select title font color.', 'prodigystudio ' )
				),
				array(
					"type" => "dropdown",
					"heading" => __("Heading Tag", 'prodigystudio '),
					"param_name" => "heading_tag",
					"value" => array(
						"Default" => "h3",
						"H1" => "h1",	
						"H2" => "h2",
						"H3" => "h3",
						"H4" => "h4",
						"H5" => "h5",
						"H6" => "h6",
					),
					"description" => "",
				),
			array(
				"type" => "textfield",
				"heading" => __("Headline title", 'prodigystudio '),
				"param_name" => "content",
				"admin_label" => true,
				"value" => "Heading",
				"value" => __("This is header", 'prodigystudio ')
			),
			array(
				"type" => "textfield",
				"heading" => __("Headline subtitle", 'prodigystudio '),
				"param_name" => "subtitle",
				"admin_label" => false,
				"value" => ""			
			),
			array(
			  "type" => "textfield",			  
			  "heading" => __("Custom CSS class", 'prodigystudio '),
			  "param_name" => "cssclass",
			  "description" => ""
	    ),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group' => __( 'Design options', 'js_composer' )
		)
	)
));

/* ProdigyStudio Progress bars container
---------------------------------------------------------- */

vc_map( array(
		"name" => __("PS Progress Bars", 'prodigystudio'),
		"base" => "ps_progress_trigger",   		
		"icon" => "icon-wpb-graph",
		"as_parent" => array('only' => 'ps_progress_bar'),
	  	"category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
    	"content_element" => true,
	    "show_settings_on_create" => false,		
		"description" =>  __('Progress bars container', 'prodigystudio'),
		"js_view" => 'VcColumnView',
		"params" => array(
			array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'prodigystudio' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prodigystudio' )
			),
		
		 )
) );	


/* ProdigyStudio Progress bar
---------------------------------------------------------- */

vc_map( array(
		"name" => __("PS Progress Bar", 'prodigystudio'),
		"base" => "ps_progress_bar",
   		'admin_enqueue_css' => array(get_template_directory_uri().'/framework/vc_extend/ps_vc_admin.css'),
		"icon" => "icon-wpb-graph",
		"content_element" => true,		
    	"as_child" => array('only' => 'ps_progress_trigger'), 
		"category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  		"description" => __('Animated progress bar', 'prodigystudio'),		
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Title", 'prodigystudio'),
				"admin_label" => true,
				"param_name" => "title",
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Percentage", 'prodigystudio'),
				"admin_label" => true,
				"param_name" => "percent",
				"description" => ""
			),
			$add_colors,
			array(
				"type" => "dropdown",
				"heading" => __("Type", 'prodigystudio'),
				"param_name" => "types",
				"admin_label" => true,
					"value" => array(
							"Default" => "",
							"Thin" => "thin",
							"Thermo" => "thermo",
					),
			  ),
		  array(
				"type" => "icon_selector",
				"class" => "",
				"heading" => __("Icon", 'prodigystudio'),
				"param_name" => "icon",
				"description" => "Leave blank if you don't want to display icon",
				"dependency" => array('element' => "types", 'value' =>  array('thermo'))
			),			
			$add_animation_effects,
			$add_animation_delay,
		)
) );
class WPBakeryShortCode_ps_progress_trigger extends WPBakeryShortCodesContainer {
}
class WPBakeryShortCode_ps_progress_bar extends WPBakeryShortCode {
}

/* ProdigyStudio Progress bar
---------------------------------------------------------- */

vc_map( array(
		"name" => __("PS Circular Bar", 'prodigystudio'),
		"base" => "ps_circular",   		
		"icon" => "icon-circular-graph",		
		"category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  		"description" => __('Animated circular bar', 'prodigystudio'),		
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Title", 'prodigystudio'),
				"admin_label" => true,
				"param_name" => "title",
				"description" => ""
			),						
			array(
				"type" => "dropdown",
				"heading" => __('Type','prodigystudio'),
				"param_name" => "types",
				"value" => array(
					"Default" => "",
					"Styled" => "2",					
				),
				"description" => ""			
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Percentage", 'prodigystudio'),
				"admin_label" => true,
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __('Colors','prodigystudio'),
				"param_name" => "color",
				"value" => array(
					"Default" => "",
					"Green" => "green",
					"Blue" => "blue",
					"Yellow" => "yellow",
					"Red" => "red",
					"White" => "white"
				),
				"description" => ""			
			)
		)
) );

/* ProdigyStudio single image
---------------------------------------------------------- */
vc_map( array(
	'name' => __( 'PS Single Image', 'prodigystudio' ),
	'base' => 'ps_single_image',
	'icon' => 'icon-wpb-single-image',
	'category' => array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
	'description' => __( 'Simple image with CSS animation', 'prodigystudio' ),
	'params' => array(		
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'prodigystudio' ),
			'param_name' => 'image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'prodigystudio' )
		),
		$add_animation_effects,
		array(
			'type' => 'textfield',
			'heading' => __( 'Image size', 'prodigystudio' ),
			'param_name' => 'img_size',
			'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'prodigystudio' )
		),		
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'prodigystudio' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prodigystudio' )
		)
	)
) );

/* PS Service grid-list */
vc_map( array(
    "name" => __("PS Service Grid List", 'prodigystudio '),
    "base" => "ps_service_grid_container",
	"icon" => "icon-ps-service-grid",
    "as_parent" => array('only' => 'ps_service_grid'),
  	"category" =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
    "content_element" => true,    
	"description" =>  __('Service list container', 'prodigystudio '),    
    "js_view" => 'VcColumnView',
		"params" => array(	
		array(
			  "type" => "textfield",
			  "heading" => __("Title", 'prodigystudio '),
			  "param_name" => "title",
			  "admin_label" => true,
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Title custom color', 'prodigystudio ' ),
			'param_name' => 'title_color',
			'description' => __( 'Select custom title color.', 'prodigystudio ' )
		),
		array(
			  "type" => "textfield",
			  "heading" => __("Subtitle", 'prodigystudio '),
			  "param_name" => "subtitle",
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'SubTitle custom color', 'prodigystudio ' ),
			'param_name' => 'subtitle_color',
			'description' => __( 'Select custom subtitle color.', 'prodigystudio ' )
		),		
		array(
        "type" => "dropdown",
        "heading" => __("Columns count", 'prodigystudio'),
        "param_name" => "columns",
        "admin_label" => true,
			"value" => array(
					"2" => "2",
					"3" => "3",
					"4" => "4",					
			),
		"default" => "2"
      ),
	)
) );

/* --- ProdigyStudio Service box --- */
vc_map( array(
    "name" => __("PS Service box", 'prodigystudio '),
    "base" => "ps_service_grid",
	"icon" => "icon-ps-service-item",
    "content_element" => true,
	"description" =>  __('Single service box', 'prodigystudio '),
    "as_child" => array('only' => 'ps_service_grid_container'), 
    "params" => array(	
	array(
		  "type" => "textfield",
		  "heading" => __("Title", 'prodigystudio '),
		  "param_name" => "title",
		  "admin_label" => true,
		),
	array(
		"type" => "icon_selector",
		"class" => "",
		"heading" => __("Icon", 'prodigystudio'),
		"param_name" => "icon",
		"description" => ""
	),
	$add_animation_effects,
	$add_animation_delay,
	
    array(
		"type" => "textarea_html",
		"heading" => __("Short Description", 'prodigystudio '),
		"param_name" => "content",
		"value" => __("Service box description", 'prodigystudio ')
	    ),
		
    )
) );

class WPBakeryShortCode_ps_service_grid_container extends WPBakeryShortCodesContainer {
}
class WPBakeryShortCode_ps_service_grid extends WPBakeryShortCode {
}

/* ProdigyStudio OWL carousel
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Portfolio OWL carousel", 'prodigystudio'),
  "base" => "ps_portfolio_carousel",
  "icon" => "icon-wpb-owl",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  "description" => __('Show portfolio items in carousel', 'prodigystudio'),
  "params" => array(   
	array(
      "type" => "textfield",
      "heading" => __("Items", 'prodigystudio'),
      "param_name" => "items",
      "description" => __("How many items should be displayed", 'prodigystudio')
    ), 
	array(
      "type" => "textfield",
      "heading" => __("Categories", 'prodigystudio'),
      "param_name" => "categories",
      "description" => __("Coma separated list of categories to display. If you leave this field blank all items will be displayed.", 'prodigystudio')
    ),   

  )
));

/* ProdigyStudio Portfolio Grid
---------------------------------------------------------- */

vc_map( array(
  "name" => __("PS Portfolio Grid", 'prodigystudio'),
  "base" => "ps_portfolio_grid",
  "icon" => "icon-wpb-portfolio-grid",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  "description" => __('Portfolio items grid', 'prodigystudio'),
  "params" => array(
   array(
      "type" => "textfield",
      "heading" => __("Items", 'prodigystudio'),
      "param_name" => "items",
      "description" => __("How many items should be displayed", 'prodigystudio')
    ),
   array(
        "type" => "dropdown",
        "heading" => __("Columns count", 'prodigystudio'),
        "param_name" => "columns",
        "admin_label" => true,
			"value" => array(
					"2" => "2",
					"3" => "3",
					"4" => "4",					
			),
      ),
	
	array(
        "type" => "dropdown",
        "heading" => __("Isotope", 'prodigystudio'),
        "param_name" => "isotope",
        "admin_label" => true,
			"value" => array(
					"Yes" => "yes",
					"No" => "no",
			),
      ),
	  
    array(
      "type" => "textfield",
      "heading" => __("Categories", 'prodigystudio'),
      "param_name" => "categories",
      "description" => __("Coma separated list of categories to display. If you leave this field blank all items will be displayed.", 'prodigystudio')
    ),
   array(
        "type" => "dropdown",
        "heading" => __("Display category filter", 'prodigystudio'),
        "param_name" => "filter",
        "admin_label" => true,
			"value" => array(
					"No" => "false",
					"Yes" => "true"	
			),
      ),
  )
));

/* ProdigyStudio Contanct Form
---------------------------------------------------------- */
	vc_map( array(
		'name' => __('PS Contact Form', 'prodigystudio '),
		'base' => 'ps_contact_form',
		'class' => '',
		'icon' => 'icon-ps-contact-form',
		'category' =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
		'description' => __("Custom Contact Form", 'prodigystudio '),
		'params' => array(				
		
		array(
			"type" => "textfield",
			"heading" => __("Title", 'prodigystudio '),
			"param_name" => "title",
			"admin_label" => true,
			"value" => ""
		),
		array(
			"type" => "textarea_html",
			"heading" => __("Description", 'prodigystudio '),
			"param_name" => "description",
			"value" => __("", 'prodigystudio ')
	    ) 
		
		
				
		
	)
));

/* ProdigyStudio Team box
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Team box", 'prodigystudio '),
  "base" => "ps_teambox",
  "icon" => "icon-wpb-teambox",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  "description" => __('Team member presentation box', 'prodigystudio '),
  "params" => array(

    array(
      "type" => "dropdown",
      "heading" => __("Member", 'prodigystudio '),
      "param_name" => "member_id",
	  "admin_label" => true,
      "value" => $teamPosts,
	  "description" => "Select a team member that you want to display"
    ),
	
	array(
		"type" => "icon_selector",
		"class" => "",
		"heading" => __("Icon", 'prodigystudio'),
		"param_name" => "icon",
		"description" => "Leave blank if you don't want to display icon"
	),
	array(
		"type" => "checkbox",
		"class" => "",
		"heading" => __("Show social", 'prodigystudio '),
		"param_name" => "enable_social",
		'value' => array( __( 'Yes', 'prodigystudio ' ) => 'true' ),
		"description" => "Enable this if want to show social icons"
		)

	
  )
) );

/* ProdigyStudio Team box 2
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Team box 2", 'prodigystudio '),
  "base" => "ps_teambox2",
  "icon" => "icon-wpb-teambox",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  "description" => __('Team member presentation box', 'prodigystudio '),
  "params" => array(

    array(
      "type" => "textfield",
      "heading" => __("Name", 'prodigystudio '),
      "param_name" => "name",
	  "admin_label" => true,
      "value" => __("John Smith", 'prodigystudio ')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Position", 'prodigystudio '),
	  "admin_label" => true,
      "param_name" => "position",
      "value" => __("Chief Executive Officer / CEO", 'prodigystudio ')
    ),
	 array(
      "type" => "attach_image",
      "heading" => __("Image", 'prodigystudio '),
      "param_name" => "image",
      "value" => "",
      "description" => __("Select image from media library.", 'prodigystudio ')
    ),
	array(
			'type' => 'dropdown',
			'heading' => __( 'Image alignment', 'prodigystudio' ),
			'param_name' => 'alignment',
			'value' => array(
				__( 'Align left', 'prodigystudio' ) => 'img-left',
				__( 'Align right', 'prodigystudio' ) => 'img-right',
			),
			'description' => __( 'Select image alignment.', 'prodigystudio' )
		),
    array(
      "type" => "textfield",
      "heading" => __("Twitter link", 'prodigystudio '),
      "param_name" => "twitter_url",
	  "description" => __("If you leave this field blank link will be not displayed", 'prodigystudio ')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Facebook link", 'prodigystudio '),
      "param_name" => "facebook_url",
	  "description" => __("If you leave this field blank link will be not displayed", 'prodigystudio ')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Google Plus link", 'prodigystudio '),
      "param_name" => "google_url",
	  "description" => __("If you leave this field blank link will be not displayed", 'prodigystudio ')
    ),
    array(
      "type" => "textarea_html",
      "heading" => __("Description", 'prodigystudio '),
      "param_name" => "content",
      "value" => __("", 'prodigystudio ')
    )  
  )
) );

/* ProdigyStudio OWL carousel
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Clients logo Grid", 'prodigystudio'),
  "base" => "ps_logo_grid",
  "icon" => "icon-wpb-owl",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  "description" => __('Show Clients logos or testimonie in carousel', 'prodigystudio'),
  "params" => array(
   $add_logo_cats,
	array(
      "type" => "textfield",
      "heading" => __("Items", 'prodigystudio'),
      "param_name" => "items",
      "description" => __("How many items should be displayed", 'prodigystudio')
    ),    

  )
));

/* ProdigyStudio Visual Composer Elements
---------------------------------------------------------- */
/* ProdigyStudio Buttons */

vc_map( array(
		"name" => __("PS Button", 'prodigystudio'),
		"base" => "ps_button",
		"category" => __('By ProdigyStudio', 'prodigystudio'),
		"icon" => "icon-wpb-ui-button",
		"description" => __('Custom button', 'prodigystudio'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Button Text", 'prodigystudio'),
				"param_name" => "content",
				"description" => "",
	  			"admin_label" => true,
				"value" => __("Button text", 'prodigystudio')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Size", 'prodigystudio'),
				"param_name" => "size",
				"value" => array(					
					"Small" => "small",	
					"Medium" => "medium",	
					"Large" => "large",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Color", 'prodigystudio'),
				"param_name" => "style",
				"value" => array(
					"Default" => "",	
					"Blue" => "blue",	
					"Green" => "green",						
					"Yellow" => "yellow",
					"Red" => "red",
					"White" => "white",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Corners", 'prodigystudio'),
				"param_name" => "corners",
				"value" => array(
					"Default" => "",	
					"Round" => "round",	
					"Radius" => "radius",						
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Borderd", 'prodigystudio'),
				"param_name" => "border",
				"value" => array(
					"No" => "",	
					"Yes" => "button-border",	

				),
				"description" => ""
			),

			array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'prodigystudio' ),
				'param_name' => 'link',
				'description' => __( 'Button link.', 'prodigystudio' )
			),
	
			array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group' => __( 'Design options', 'js_composer' )
		)
		)
) );

/* ProdigyStudio Featured box
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Featured Box", 'prodigystudio '),
  "base" => "ps_featured_icon",
  "icon" => "icon-ps-featuredbox",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
  "description" => __('Featured Box with icon', 'prodigystudio '),
  "params" => array(
     array(
		  "type" => "textfield",
		  "heading" => __("Title", 'prodigystudio '),
		  "param_name" => "title",
		  "admin_label" => true,
		  "value" => __("Featured Box", 'prodigystudio ')
    ),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Title custom color', 'prodigystudio ' ),
		'param_name' => 'customtitlecolor',
		'description' => __( 'Select custom title color.', 'prodigystudio ' )
	),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Featured box type", 'prodigystudio '),
		"param_name" => "box_type",
		"value" => array(
			"Default" => "default",
			"Special" => "special",
							
		),
		"description" => ""
	),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Size", 'prodigystudio'),
		"param_name" => "size",
		"value" => array(			
			"Small" => "small",	
			"Medium" => "medium",	
			"Large" => "large",					
		),
		"description" => "",
		"dependency" => array('element' => "box_type", 'value' =>  array('special'))
	),    
	 array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Icon position", 'prodigystudio '),
		"param_name" => "align",
			"value" => array(
				"Left" => "left",
				"Right" => "right",
				"Center" => "center",				
								
			),
		"description" => ""
	),		
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Shape", 'prodigystudio '),
		"param_name" => "shape",
			"value" => array(
				"No Shape" => "no-shape",	
				"Square" => "square-shape",
				"Circle" => "circle-shape",
				"Hexagon" => "hexagon-shape",
				"Shield" => "shield-shape",
				"Radius" => "radius-shape",
				"Cloud" => "cloud-shape",
				"Heart" => "heart-shape"						
			),
		"admin_label" => true,	
		"description" => "Select a badge for icon (If flat icon is used, select Flat icon)",
		"dependency" => array('element' => "box_type", 'value' =>  array('default'))
	),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __('Colors','prodigystudio'),
		"param_name" => "color",
		"value" => array(
			"Default" => "",
			"Green" => "green",
			"Blue" => "blue",
			"Yellow" => "yellow",
			"Red" => "red",
			"White" => "white"
		),
		"admin_label" => true,
		"description" => "",
		"dependency" => array('element' => "box_type", 'value' =>  array('default'))

),
	array(
		"type" => "icon_selector",
		"class" => "",
		"heading" => __("Icon", 'prodigystudio '),
		"param_name" => "icon",
		"description" => ""
		
		),
			 
    array(
		"type" => "textarea_html",
		"heading" => __("Content", 'prodigystudio '),
		"param_name" => "content",
		"value" => __("Featured box content.", 'prodigystudio ')
		),
		
    array(
		"type" => "textfield",
		"heading" => __("Extra class name", 'prodigystudio '),
		"param_name" => "el_class",
		"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'prodigystudio ')
    )
  )
) );

/* ProdigyStudio Call to action 
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Promo box", 'prodigystudio'),
  "base" => "ps_promo",
  "icon" => "icon-wpb-call-to-action",
  "category" =>array('By ProdigyStudio','Content'),
  "description" => __('Promo box with button and icon', 'prodigystudio'),
  "params" => array(
    array(
		'type' => 'textfield',
		'heading' => __( 'Heading first line', 'prodigystudio' ),
		'admin_label' => true,
		'param_name' => 'title',
		'value' => __( 'Hey! I am first heading line feel free to change me', 'prodigystudio' ),
		'description' => __( 'Text for the first heading line.', 'prodigystudio' )
	),
	array(
		'type' => 'textarea_html',
		'heading' => __( 'Promotional text', 'prodigystudio' ),
		'param_name' => 'content',
		'value' => __( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'prodigystudio' )
	),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __('Colors','prodigystudio'),
		"param_name" => "color",
		"value" => array(
			"Default" => "",
			"Green" => "green",
			"Blue" => "blue",
			"Yellow" => "yellow",
			"Red" => "red",
			"White" => "white"
		),
		"admin_label" => true,
		"description" => "",		

),
	$add_animation_effects,
	$add_animation_delay,
	array(
		"type" => "icon_selector",
		"class" => "",
		"heading" => __("Icon", 'prodigystudio'),
		"param_name" => "icon",
		"description" => ""
	),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Shape", 'prodigystudio '),
		"param_name" => "shape",
			"value" => array(				
				"Square" => "square-shape",
				"Circle" => "circle-shape",
				"Hexagon" => "hexagon-shape",
				"Shield" => "shield-shape",
				"Radius" => "radius-shape",
				"Cloud" => "cloud-shape",
				"Heart" => "heart-shape"						
			),
		"admin_label" => true,	
		"description" => "Select a shape for icon"		
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Text on the button', 'prodigystudio' ),
		'param_name' => 'link_label',
		'value' => __( 'Text on the button', 'prodigystudio' ),
		'description' => __( 'Text on the button.', 'prodigystudio' )
		),
	
	array(
		'type' => 'vc_link',
		'heading' => __( 'URL (Link)', 'prodigystudio' ),
		'param_name' => 'link',
		'description' => __( 'Button link.', 'prodigystudio' )
		),
	
		
	
  )
) );

/* PS Timeline */
vc_map( array(
    "name" => __("PS Timeline", 'prodigystudio '),
    "base" => "ps_timeline",
	"icon" => "icon-ps-timeline",
    "as_parent" => array('only' => 'ps_timeline_item'),
  	"category" =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
    "content_element" => true,
    "show_settings_on_create" => false,
	"description" =>  __('Timeline container', 'prodigystudio '),
    "params" => array(),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => __("PS Timeline Item", 'prodigystudio '),
    "base" => "ps_timeline_item",
	"icon" => "icon-wpb-timeline_item",
    "content_element" => true,
	"description" =>  __('Single timeline item', 'prodigystudio '),
    "as_child" => array('only' => 'ps_timeline'), 
    "params" => array(		
	array(
		"type" => "dropdown",
		"heading" => __("Timeline Item Type", "prodigystudio"),	
		"param_name" => "item_type",
		"value" => array(				
				"Custom" => "custom",
				"Blog Post" => "blog_post",
			),
		),
	
	array(
		"type" => "textfield",
		"heading" => __("Title", 'prodigystudio '),
		"param_name" => "title",
		"admin_label" => true,		
		"dependency" => array('element' => "item_type", 'value' =>  array('custom'))
	),
	array(
		"type" => "dropdown",
		"heading" => __("Enable fold", "prodigystudio"),	
		"param_name" => "enable_fold",
		"value" => array(				
				"No" => "no",
				"Yes" => "yes",
			),
		"dependency" => array('element' => "item_type", 'value' =>  array('custom'))
		),
	array(
		'type' => 'textfield',
		'heading' => __( 'Blog Post ID', 'prodigystudio' ),
		'param_name' => 'blog_post_id',
		"admin_label" => true,	
		'description' => __( 'Insert the Id of the post', 'prodigystudio' ),
		"dependency" => array('element' => "item_type", 'value' =>  array('blog_post'))
	),
	
	$add_animation_effects,
    
	array(
		"type" => "textarea_html",
		"heading" => __("Content", 'prodigystudio '),
		"param_name" => "content",
		"value" => __("Timeline box content.", 'prodigystudio '),
		"dependency" => array('element' => "item_type", 'value' =>  array('custom'))
    ),
	array(
		"type" => "icon_selector",
		"class" => "",
		"heading" => __("Icon", 'prodigystudio'),
		"param_name" => "icon",
		"description" => "",
		"dependency" => array('element' => "item_type", 'value' =>  array('custom'))
	),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Shape", 'prodigystudio '),
		"param_name" => "shape",
		"value" => array(				
				"Square" => "square-shape",
				"Circle" => "circle-shape",
				"Hexagon" => "hexagon-shape",
				"Shield" => "shield-shape",
				"Radius" => "radius-shape",
				"Cloud" => "cloud-shape",
				"Heart" => "heart-shape"						
			),
		"admin_label" => true,	
		"description" => "Select a shape for icon",
		"dependency" => array('element' => "item_type", 'value' =>  array('custom'))		
	),	
	array(
		"type" => "textfield",
		"heading" => __("Extra class name", 'prodigystudio '),
		"param_name" => "el_class",
		"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'prodigystudio ')
	)
    )
) );

class WPBakeryShortCode_ps_timeline extends WPBakeryShortCodesContainer {
}
class WPBakeryShortCode_ps_timeline_item extends WPBakeryShortCode {
}

/* PS Price plan */
vc_map( array(
    "name" => __("PS Price Plan", 'prodigystudio '),
    "base" => "ps_price_plan",
	"icon" => "icon-ps-price-plan",
    "as_parent" => array('only' => 'ps_price_column'),
  	"category" =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio ')),
    "content_element" => true,    
	"description" =>  __('Price list container', 'prodigystudio '),
    "params" => array(
		array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __('Columns','prodigystudio'),
		"param_name" => "columns",
		"value" => array(
			"3" => "3",
			"4" => "4",
			"5" => "5"
		),
		"description" => "Select how many columns will show price plan"
		),
	),
    "js_view" => 'VcColumnView'
) );

/* --- PS Price columns --- */
vc_map( array(
    "name" => __("PS Price Column", 'prodigystudio '),
    "base" => "ps_price_column",
	"icon" => "icon-ps-price-column",
    "content_element" => true,
	"description" =>  __('Single price column', 'prodigystudio '),
    "as_child" => array('only' => 'ps_price_plan'), 
    "params" => array(	
	array(
		"type" => "dropdown",
		"heading" => __('Style','prodigystudio'),
		"param_name" => "style",
		"value" => array(
			"Default" => "",
			"Style 2" => "style2",
			"Style 3" => "style3",
			"Style 4" => "style4",			
		),
		"description" => ""
		),
	array(
		  "type" => "textfield",
		  "heading" => __("Title", 'prodigystudio '),
		  "param_name" => "title",
		  "admin_label" => true,
		),
	array(
		  "type" => "textfield",
		  "heading" => __("Price", 'prodigystudio '),
		  "param_name" => "price",
		  "admin_label" => true,
		),
	array(
		  "type" => "textfield",
		  "heading" => __("Currency", 'prodigystudio '),
		  "param_name" => "currency",
		  "admin_label" => false,
		),
	array(
		"type" => "icon_selector",
		"class" => "",
		"heading" => __("Icon", 'prodigystudio'),
		"param_name" => "icon",
		"description" => "",
		"dependency" => array('element' => "style", 'value' =>  array('style3', 'style4'))
	),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Shape", 'prodigystudio '),
		"param_name" => "shape",
		"value" => array(				
				"Square" => "square-shape",
				"Circle" => "circle-shape",
				"Hexagon" => "hexagon-shape",
				"Shield" => "shield-shape",
				"Radius" => "radius-shape",
				"Cloud" => "cloud-shape",
				"Heart" => "heart-shape"						
			),
		"admin_label" => true,	
		"description" => "Select a shape for icon",
		"dependency" => array('element' => "style", 'value' =>  array('style3'))		
	),		
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __('Colors','prodigystudio'),
		"param_name" => "color",
		"value" => array(
			"Default" => "",
			"Blue" => "blue",
			"Green" => "green",
			"Yellow" => "yellow",			
			"Red" => "red",
			"White" => "white"
		),
		"description" => ""
		),			
    array(
      "type" => "textarea_html",
      "heading" => __("Description", 'prodigystudio '),
      "param_name" => "content",
      "value" => __("Price box content.", 'prodigystudio ')
    ),
	array(
		'type' => 'exploded_textarea',
		'heading' => __( 'Price list content', 'prodigystudio' ),
		'param_name' => 'items',
		'description' => __( 'Input values here. Divide values by pressing Enter. Example: <strong>10GB</strong> Disk Space,<strong>100GB</strong> Monthly Bandwidth;', 'prodigystudio' ),
		'value' => "<strong>10GB</strong> Disk Space,<strong>100GB</strong> Monthly Bandwidth,<strong>20</strong> Email Accounts,Unlimited subdomains"
	),
	array(
		'type' => 'vc_link',
		'heading' => __( 'URL (Link)', 'prodigystudio' ),
		'param_name' => 'link',
		'description' => __( 'Button link.', 'prodigystudio' )
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Text on the button', 'prodigystudio' ),
		'param_name' => 'link_label',
		'value' => __( 'Text on the button', 'prodigystudio' ),
		'description' => __( 'Buy Now', 'prodigystudio' )
	),
	$add_animation_effects,
	$add_animation_delay,
    )
) );

class WPBakeryShortCode_ps_price_plan extends WPBakeryShortCodesContainer {
}
class WPBakeryShortCode_ps_price_column extends WPBakeryShortCode {
}

/* ProdigyStudio Testimonial
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Testimonial", 'prodigystudio'),
  "base" => "ps_testimonie",
  "icon" => "icon-wpb-testimonial",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio '),__('Content', 'prodigystudio')),
  "description" => __('Testimonial post', 'prodigystudio '),
  "params" => array(
    array(
		"type" => "textfield",
		"heading" => __("Testimonie ID", 'prodigystudio '),
		"param_name" => "testimonie_id",
		"admin_label" => true
    ),
	array(
		"type" => "dropdown",
		"heading" => __('Style','prodigystudio'),
		"param_name" => "style",
		"value" => array(
			"Default" => "style1",
			"Style 2" => "style2",
			"Style 3" => "style3",
			"Style 4" => "style4",
			"Style 5" => "style5",
			"Style 6" => "style6",															
		),
		"admin_label" => true,
		"description" => ""
		),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __('Colors','prodigystudio'),
		"param_name" => "color",
		"value" => array(
			"Default" => "",
			"Blue" => "blue",
			"Green" => "green",
			"Yellow" => "yellow",			
			"Red" => "red",
			"White" => "white"
		),
		"admin_label" => true,
		"description" => ""
		),			
	   
  )
) );

/* ProdigyStudio OWL carousel
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Cliens carousel", 'prodigystudio'),
  "base" => "ps_custom_carousel",
  "icon" => "icon-wpb-owl",
  "category" =>array( __('By ProdigyStudio', 'prodigystudio'),__('Content', 'prodigystudio')),
  "description" => __('Show Clients logos in carousel', 'prodigystudio'),
  "params" => array(
   
    $add_logo_cats,
	array(
      "type" => "textfield",
      "heading" => __("Items", 'prodigystudio'),
      "param_name" => "items",
      "description" => __("How many items should be displayed", 'prodigystudio')
    ),
	$add_animation_effects    

  )
));

/* ProdigyStudio Counter Panel
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Counter", 'prodigystudio'),
  "base" => "ps_counter",
  "icon" => "ps-icon-counter",
  "category" =>array('By ProdigyStudio','Content'),
  "description" => __('Panel with counter', 'prodigystudio'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Title", 'prodigystudio'),
      "param_name" => "title",
	  "admin_label" => true,
      "value" => __("Counter Title", 'prodigystudio')
    ),
	
	array(
	"type" => "icon_selector",
	"class" => "",
	"heading" => __("Icon", 'prodigystudio'),
	"param_name" => "icon",
	"description" => ""
	),
	$add_colors,	 
    array(
      "type" => "textfield",
      "heading" => __("Number", 'prodigystudio'),
      "param_name" => "number",
	  "description" => "Insert a number here",
	  "admin_label" => true,
      "value" => __("450", 'prodigystudio')
    ) 
  )
) );

/* ProdigyStudio Panel with icon
---------------------------------------------------------- */
vc_map( array(
  "name" => __("PS Panel", 'prodigystudio'),
  "base" => "ps_panel_icon",
  "icon" => "ps-panel-icon",
  "category" =>array('By ProdigyStudio','Content'),
  "description" => __('Panel with Icon', 'prodigystudio'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Title", 'prodigystudio'),
      "param_name" => "title",
	  "admin_label" => true,
      "value" => __("Panel icon Title", 'prodigystudio')
    ),
	
	array(
	"type" => "icon_selector",
	"class" => "",
	"heading" => __("Icon", 'prodigystudio'),
	"param_name" => "icon",
	"description" => ""
	),
	$add_colors,	 
    array(
      "type" => "textarea_html",
      "heading" => __("Content", 'prodigystudio'),
      "param_name" => "content",
      "value" => __("Panel icon content.", 'prodigystudio')
    )   
  )
) );


?>
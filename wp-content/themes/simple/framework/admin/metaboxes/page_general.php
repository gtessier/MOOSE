<?php
$config = array(
	'title' => sprintf( esc_html__('Page General Options','wt_admin'),THEME_NAME),
	'id' => 'page_general',
	'pages' => array('page','post'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'low',
);
function get_sidebar_options(){
	$sidebars = wt_get_option('sidebar','sidebars');
	if(!empty($sidebars)){
		$sidebars_array = explode(',',$sidebars);
		
		$options = array();
		foreach ($sidebars_array as $sidebar){
			$options[$sidebar] = $sidebar;
		}
		return $options;
	}else{
		return array();
	}
}
$options = array(
	array(
		"name" => esc_html__("Page Intro Area Type",'wt_admin'),
		"desc" => esc_html__("Choose which type of header area you want to display on this page. Static images / videos are setted in the \"Featured Image\" / \"Whoathemes Featured Video\" areas.",'wt_admin'),
		"id" => "_intro_type",
		"options" => array(
			"default" => "Default",
			"title" => "Title only",
			"custom" => "Custom text only",
			"title_custom" => "Title with custom text",
			"disable" => "Disable",
		),
		"default" => "default",
		"chosen" => "true", 
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "intro_title",
		"group_class" => "intro_type",
	),
	array(
		"name" => esc_html__("Page Intro Custom Title",'wt_admin'),
		"desc" => esc_html__('If you enter a text here, this will override the default header title.','wt_admin'),
		"id" => "_custom_title",
		"default" => "",
		"class" => 'full',
		"type" => "wt_text"		
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "intro_text",
		"group_class" => "intro_type",
	),
	array(
		"name" => esc_html__("Page Intro Custom Text",'wt_admin'),
		"desc" => esc_html__('If you enter a text here, this will override your default header custom text only if custom text option above is selected.','wt_admin'),
		"id" => "_custom_introduce_text",
		"rows" => "2",
		"default" => "",
		"type" => "wt_textarea"
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"name" => esc_html__("Full Width Section",'wt_admin'),
		"desc" => esc_html__('If True this section will have full width.','wt_admin'),
		"id" => "_enable_fullwidth",
		"default" => false,
		"type" => "wt_toggle"
	),
	/*array(
		"name" => esc_html__("Display Full Width Contact Section",'wt_admin'),
		"desc" => esc_html__('This option enable Full Width Contact Section. Use only on your contact page.','wt_admin'),
		"id" => "_enable_fullcontact",
		"default" => false,
		"type" => "wt_toggle"
	),	
	array(
		"type" => "wt_group_start",
		"group_id" => "fullcontact_gmap",
		"group_class" => "fullcontact_gmap",
	),
	array(
		"name" => esc_html__("Gmap code for contact page",'wt_admin'),
		"desc" => esc_html__('Only for your contact page...','wt_admin'),
		"id" => "_fullcontact_gmap",
		"default" => "",
		"class" => 'full',
		"type" => "wt_textarea"		
	),
	array(
		"type" => "wt_group_end",
	),*/
	array(
		"name" => esc_html__("Disable Breadcrumbs",'wt_admin'),
		"desc" => esc_html__('This option disables breadcrumbs on a page/post.','wt_admin'),
		"id" => "_disable_breadcrumb",
		"label" => "Check to disable breadcrumbs on this post",
		"default" => "",
		"type" => "wt_tritoggle"
	),	
	array(
		"name" => esc_html__("Text Color Style",'wt_admin'),
		"desc" => esc_html__("Choose Text Color style for sections", 'wt_admin'),
		"id" => "_background_style",
		"default" => '',
		"prompt" => esc_html__("Choose Type",'wt_admin'),
		"options" => array(
			//"wt_section_default" => '',
			"wt_section_white" => esc_html__('White','wt_admin'),
			"wt_section_dark" => esc_html__('Dark','wt_admin'),
		),
		"type" => "wt_select",
	),	
	array( 
		"name" => esc_html__("Section (optional)",'wt_admin'), 
		"desc" => esc_html__("Only works on homepage.",'wt_admin'),
		"prompt" => esc_html__("Choose section",'wt_admin'),
		"id" => "_section", 
		"default" => array(), 
		"target" => 'wt_section', 
		"type" => "wt_select" 
	),
	array(
		"name" => esc_html__("Page Background Type",'wt_admin'),
		"desc" => esc_html__("Choose which type of background area you want to display on this section.",'wt_admin'),
		"id" => "_bg_type",
		"options" => array(
			"pattern" => "Pattern",
			"parallax" => "Parallax",
			"cover" => "Cover Image",
			"video" => "Video",
			"color" => "Color",
		),
		"default" => "color",
		"chosen" => "true", 
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "pattern",
		"group_class" => "bg_type",
	),
        array(
            "name" => esc_html__("Page Background Pattern Image",'wt_admin'),
			"desc" => esc_html__("You can paste the full URL of the image (including ") . "<code>http://</code>" . esc_html__("), to be used as a background image, or you can simply upload it using the button.",'wt_admin'),
            "id" => "_bg_style_image",
            "default" => "",
            "type" => "wt_upload"
        ),
        array(
            "name" => esc_html__("Page Background Position",'wt_admin'),
            "desc" => "Choose the background image position.",
            "id" => "_bg_style_position_x",
            "default" => 'center',
            "options" => array(
                "left" => esc_html__('Left','wt_admin'),
                "center" => esc_html__('Center','wt_admin'),
                "right" => esc_html__('Right','wt_admin'),
            ),
            "type" => "wt_select",
        ),
        array(
            "name" => esc_html__("Page Background Repeat",'wt_admin'),
            "desc" => "Choose the background image repeat style.",
            "id" => "_bg_style_repeat",
            "default" => 'no-repeat',
            "options" => array(
                "no-repeat" => esc_html__('No Repeat','wt_admin'),
                "repeat" => esc_html__('Repeat','wt_admin'),
                "repeat-x" => esc_html__('Repeat Horizontally','wt_admin'),
                "repeat-y" => esc_html__('Repeat Vertically','wt_admin'),
            ),
            "type" => "wt_select",
        ),
        array(
            "name" => esc_html__("Background Style Color",'wt_admin'),
            "desc" => esc_html__("Choose background style for sections", 'wt_admin'),
            "id" => "_background_style_color",
            "default" => '',
            "type" => "wt_color",
        ),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "parallax",
		"group_class" => "bg_type",
	),

        array(
            "name" => esc_html__("Page Background Parallax Image",'wt_admin'),
			"desc" => esc_html__("You can paste the full URL of the image (including ") . "<code>http://</code>" . esc_html__("), to be used as a background image, or you can simply upload it using the button.",'wt_admin'),
            "id" => "_bg_style_parallax",
            "default" => "",
            "type" => "wt_upload"
        ),
		/*array(
			"name" => esc_html__("Parallax",'wt_admin'),
			"desc" => esc_html__("Set the button ON if you want to have 'Parallax' for this separator section. You should upload a background image also.", 'wt_admin'),
			"id" => "_parallax",
			"default" => '',
			"type" => "wt_toggle",
		),*/
   	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "cover",
		"group_class" => "bg_type",
	),

        array(
            "name" => esc_html__("Page Background Cover Image",'wt_admin'),
			"desc" => esc_html__("You can paste the full URL of the image (including ") . "<code>http://</code>" . esc_html__("), to be used as a background image, or you can simply upload it using the button.",'wt_admin'),
            "id" => "_bg_style_cover",
            "default" => "",
            "type" => "wt_upload"
        ),
   	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "video",
		"group_class" => "bg_type",
	),
        array(
            "name" => esc_html__("Youtube Video Background",'wt_admin'),
			 "desc" => esc_html__( "You need to paste only the video ID (for example http://www.youtube.com/watch?v=<code>Ufnf0ecwzVI</code>).",'wt_admin'),
            "id" => "_bg_video",
            "default" => "",
            "type" => "wt_text"
        ),
   	array(
		"type" => "wt_group_end",
	),

	array(
		"type" => "wt_group_start",
		"group_id" => "color",
		"group_class" => "bg_type",
	),
        array(
            "name" => esc_html__("Background Style Color",'wt_admin'),
            "desc" => esc_html__("Choose background style for sections", 'wt_admin'),
            "id" => "_bg_style_color",
            "default" => '',
            "type" => "wt_color",
        ),
	array(
		"type" => "wt_group_end",
	),
	
	array(
		"name" => esc_html__("Background Overlay Color",'wt_admin'),
		"desc" => esc_html__("Choose background style for parallax overlay color", 'wt_admin'),
		"id" => "_bg_overlay",
		"default" => '',
		"type" => "wt_color",
	),
	array(
		"name" => esc_html__("Top section margin",'wt_admin'),
		"id" => "_top_margins",
		"min" => "0",
		"max" => "150",
		"step" => "1",
		"unit" => 'px',
		"default" => "60",
		"type" => "wt_range",
	),
	
	array(
		"name" => esc_html__("Bottom section margin",'wt_admin'),
		"id" => "_bottom_margins",
		"min" => "0",
		"max" => "150",
		"step" => "1",
		"unit" => 'px',
		"default" => "50",
		"type" => "wt_range",
	),
	array(
		"name" => esc_html__("Custom Sidebar",'wt_admin'),
		"desc" => esc_html__("If there are any custum sidebars created in your theme option panel then you can choose one of them to be displayed on this.",'wt_admin'),
		"id" => "_sidebar",
		"prompt" => esc_html__("Choose one...",'wt_admin'),
		"default" => '',
		"options" => get_sidebar_options(),
		"type" => "wt_select",
	),
	
);

new wt_metaboxes($config,$options);
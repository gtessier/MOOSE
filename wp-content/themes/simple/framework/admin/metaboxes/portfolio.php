<?php

$config = array(
	'title' => esc_html__('Portfolio Item Options','wt_admin'),
	'id' => 'portfolio',
	'pages' => array('wt_portfolio'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);
function get_sidebar_portfolio(){
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
	/*array(
		"name" => esc_html__("Page Intro Area Type",'wt_admin'),
		"desc" => esc_html__("Choose which type of header area you want to display on this post. Static images / videos are setted in the \"Featured Image\" / \"Whoathemes Featured Video\" areas.",'wt_admin'),
		"id" => "_intro_type",
		"options" => array(
			"default" => "Default",
			"title" => "Title only",
			"custom" => "Custom text only",
			"title_custom" => "Title with custom text",
			"slideshow" => "Slideshow",
			"static_image" => "Static Image",
			"static_video" => "Static Video",
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
		"type" => "wt_group_start",
		"group_id" => "intro_slideshow",
		"group_class" => "intro_type",
	),
	array(
		"name" => esc_html__("SlideShow Type",'wt_admin'),
		"desc" => esc_html__("Select which type of slideshow you want on this page/post.",'wt_admin'),
		"id" => "_slideshow_type",
		"prompt" => esc_html__("Choose Slideshow Type",'wt_admin'),
		"default" => '',
		"options" => array(
			"flex" => esc_html__('Flex Slider','wt_admin'),
			"nivo" => esc_html__('Nivo Slider','wt_admin'),
			"anything" => esc_html__('Anything Slider','wt_admin'),
			"cycle" => esc_html__('Cycle Slider','wt_admin'),
		),
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_end",
	),*/
	array(
		"name" => esc_html__("Featured Portfolio Entry",'wt_admin'),
		"desc" => esc_html__("Here you can choose to dispaly or not the Featured Portfolio Entry only for this portfolio item.",'wt_admin'),
		"id" => "_featured_image",
		"default" => '',
		"type" => "wt_tritoggle",
	),
	/*array(
		"name" => esc_html__("Layout",'wt_admin'),
		"desc" => esc_html__("Choose the layout for this portfolio item.",'wt_admin'),
		"id" => "_sidebar_alignment",
		"default" => 'default',
		"options" => array(
			"default" => esc_html__('Default','wt_admin'),
			"full" => esc_html__('Full Width','wt_admin'),
			"right" => esc_html__('Right Sidebar','wt_admin'),
			"left" => esc_html__('Left Sidebar','wt_admin'),
		),
		"type" => "wt_select",
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
		"name" => esc_html__("Portfolio Type",'wt_admin'),
		"desc" => sprintf(__("The lightbox supports just images and videos. If the portfolio is a document type then the thumbnail image is linked to the portfolio item.",'wt_admin'),THEME_NAME),
		"id" => "_portfolio_type",
		"default" => 'image',
		"options" => array(
			"image" => esc_html__('Image','wt_admin'),
			"video" => esc_html__('Video','wt_admin'),
			"doc" => esc_html__('Document','wt_admin'),
			"link" => esc_html__('Link','wt_admin'),
		),
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "portfolio_image",
		"group_class" => "portfolio_type",
	),
	array(
		"name" => esc_html__("Fullsize Image for Lightbox (optional)",'wt_admin'),
		"desc" => esc_html__("If this field is empty then the lightbox will be opened with the feature image. Otherwise you should upload a full size image to open the lightbox on click.",'wt_admin'),
		"id" => "_image",
		"button" => "Insert Image",
		"default" => '',
		"type" => "wt_upload",
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "portfolio_video",
		"group_class" => "portfolio_type",
	),
	array(
		"name" => esc_html__("Video Link for Lightbox",'wt_admin'),
		"desc" => esc_html__("If the portfolio is a video type one, you can paste here the full url of your video.",'wt_admin'),
		"size" => 30,
		"id" => "_video",
		"default" => '',
		"class" => 'full',
		"type" => "wt_text",
	),
	array(
		"name" => esc_html__("Video Width",'wt_admin'),
		"desc" => esc_html__("The width you specify here is going to override the global configuration.",'wt_admin'),
		"id" => "_video_width",
		"default" => '',
		"type" => "wt_text"
	),
	array(
		"name" => esc_html__("Video Height",'wt_admin'),
		"desc" => esc_html__("The height you specify here is going to override the global configuration.",'wt_admin'),
		"id" => "_video_height",
		"default" => '',
		"type" => "wt_text"
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "portfolio_document",
		"group_class" => "portfolio_type",
	),
	array(
		"name" => esc_html__("Document Target",'wt_admin'),
		"id" => "_doc_target",
		"default" => '_self',
		"options" => array(
			"_self" => esc_html__('Opens in the same window and same frame.','wt_admin'),
			"_top" => esc_html__('Opens in the same window, taking the full window if there is more than one frame.','wt_admin'),
			"_parent" => esc_html__('Opens in the parent frame.','wt_admin'),
			"_blank" => esc_html__('Opens in a new window.','wt_admin'),
		),
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "portfolio_link",
		"group_class" => "portfolio_type",
	),
	array(
		"name" => esc_html__("Link for Portfolio item",'wt_admin'),
		"desc" => esc_html__("If the portfolio is a link type one, you can paste here the full link.",'wt_admin'),
		"id" => "_portfolio_link",
		"default" => "",
		"shows" => array('page','cat','post','manually'),
		"type" => "wt_superlink"	
	),
	array(
		"name" => esc_html__("Link Target",'wt_admin'),
		"id" => "_portfolio_link_target",
		"default" => '_self',
		"options" => array(
			"_self" => esc_html__('Opens in the same window and same frame.','wt_admin'),
			"_top" => esc_html__('Opens in the same window, taking the full window if there is more than one frame.','wt_admin'),
			"_parent" => esc_html__('Opens in the parent frame.','wt_admin'),
			"_blank" => esc_html__('Opens in a new window.','wt_admin'),
		),
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"name" => esc_html__("Custom Sidebar",'wt_admin'),
		"desc" => esc_html__("If there are any custum sidebars created in your theme option panel then you can choose one of them to be displayed on this.",'wt_admin'),
		"id" => "_sidebar",
		"prompt" => esc_html__("Choose one...",'wt_admin'),
		"default" => '',
		"options" => get_sidebar_portfolio(),
		"type" => "wt_select",
	),
);
new wt_metaboxes($config,$options);
<?php 
	global $ps_opts; 	
	if(!empty($ps_opts['ps_custom_fav']['url'])) {$customFav = $ps_opts['ps_custom_fav']['url'];   } else { $customFav = get_template_directory_uri().'/img/favicon.ico'; }
	if($ps_opts['ps_theme_layout'] == 'boxed') {$custom_layout = 'box';} else {$custom_layout = '';}	
	if(isset($ps_opts['ps_header_type']) && !empty($ps_opts['ps_header_type'])) {$ps_header_type = $ps_opts['ps_header_type'];} else {$ps_header_type = 'type1';}
	if(isset($ps_opts['ps_body_pattern']) && !empty($ps_opts['ps_body_pattern'])) {$ps_pattern = 'style=background-image:url('.$ps_opts['ps_body_pattern'].')';} else {$ps_pattern = '';}	
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="prodigystudio.net">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo_rss('rss2_url'); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-icon.png" />
    <link rel="shortcut icon" href="<?php echo esc_url($customFav); ?>" type="image/x-icon" />    
    <?php wp_head();?>
</head>
<body <?php body_class(); echo ' '.esc_html($ps_pattern);?> >
<div id="mo-wrapper" class="<?php echo esc_html($custom_layout)?>">    
<?php
	get_template_part('header', $ps_header_type);
	if(!is_front_page()) get_template_part('header','single');
?>
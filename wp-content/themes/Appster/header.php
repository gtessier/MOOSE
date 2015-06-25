<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="eriktailor">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Pingback -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/font-awesome.min.css" />

	<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css">
	<![endif]-->	

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo ot_get_option('et_favicon'); ?>">
	
	<?php require_once( 'includes/et_color_scheme.php' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="color: <?php echo ot_get_option('et_body_font_color');?>;">
<!-- Primary Page Layout
================================================== -->

	<?php if( ot_get_option('et_site_load_anim') != "off"){ ?>
		<div id="et-loading" class="et-loading">
			<i class="fa <?php echo ot_get_option('et_site_load_anim_icon'); ?> et-loading-icon"></i>
			<div class="et-loading-progress"><span></span></div>
		</div>
	<?php } ?>

<!-- Site Wrapper -->
<div class="site-wrapper">

	<!-- Back Top Btn -->
	<?php $et_back_top_btn = ot_get_option('et_backtop_btn_display'); 
	if( $et_back_top_btn != "no" ) { ?><i class="fa fa-chevron-up back-top downscaled"></i><?php } ?>

	<!-- Header -->
	<header class="header" id="header">
	
		<!-- Logo Area -->
		<?php $et_logo_area = ot_get_option('et_navbar_layout'); 
		if( $et_logo_area != "no" ) { ?>
		<div class="logo-area"></div>
		<?php } ?>
	
		<!-- Container -->
		<div class="container">
		
			<!-- Logo & Mobile -->
			<div class="four columns">
				<div class="logo" <?php if( $et_logo_area == "no" ) {?>style="background: transparent;"<?php } ?>>
					<a href="<?php echo home_url(); ?>">
						<?php $et_brand = ot_get_option('et_logo'); 
						if($et_brand != ""){ ?>
							<img src="<?php echo ot_get_option('et_logo'); ?>" alt="<?php bloginfo('name'); ?>" />
						<?php } else { echo bloginfo('name'); } ?>
					</a>
				</div>
				<i class="fa fa-align-justify mobile-menu <?php if( $et_logo_area == "no" ) {?>colored<?php } ?>"></i>
			</div>
			
			<!-- Navigation -->
			<div class="twelve columns">
				<?php wp_nav_menu(array('container' => 'nav', 'container_id' => '', 'container_class' => 'nav', 'menu_class' => 'menu', 
				'theme_location' => 'top-menu', 'walker' => new description_walker(), 'depth' => 2 ) ); ?>				
			</div>

			<?php if(is_page_template('template-home.php')){?>
			<script type="text/javascript">
					(function($) {
					  "use strict";
						$(document).ready(function(){
						
							$('.menu-item > a').smoothScroll({
								speed: 950,
								offset: 0,
								easing: 'easeInExpo'
							}); 
						
						});
					})(jQuery);                            
			</script>
			<?php } ?>
			
		</div><!-- / Container -->
	
	</header><!-- / Header -->			
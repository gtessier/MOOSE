<?php
// initialize all the sidebars so they are widgetized
function prodigystudio_sidebars_init() {

    if ( !function_exists('register_sidebars') )
        return;

	register_sidebar(array(
	'name' => __('General Sidebar','prodigystudio'),
	'id' => 'sidebar',
	'description' => __('The main(primary) widget area, most often used as a sidebar','prodigystudio'),
	'before_widget' => '<aside id="%1$s" class="widget mo-animate %2$s" data-animate="fadeInRight">',
	'after_widget'  => '</aside>',
	'before_title' => '<h5 class="inline-heading-line"><span>',
	'after_title' => '</span></h5>'));
	
	register_sidebar(array(
	'name' => __('Contact us','prodigystudio'),
	'id' => 'contact-us-sidebar',
	'description' => __('Sidebar used in contact us page','prodigystudio'),
	'before_widget' => '',
	'after_widget'  => '',
	'before_title' => '',
	'after_title' => ''));
	
	register_sidebar(array(
	'name' => __('Megamenu widget 1','prodigystudio'),
	'id' => 'megamenu1',
	'description' => __('Use to display in Megamenu','prodigystudio'),
	'before_widget' => '<div class="mega-menu-sub-content">',
	'after_widget'  => '</div>',
	'before_title' => '<div class="mega-menu-title">',
	'after_title' => '</div>'));
	
	register_sidebar(array(
	'name' => __('Megamenu widget 2','prodigystudio'),
	'id' => 'megamenu2',
	'description' => __('Use to display in Megamenu','prodigystudio'),
	'before_widget' => '<div class="mega-menu-sub-content">',
	'after_widget'  => '</div>',
	'before_title' => '<div class="mega-menu-title">',
	'after_title' => '</div>'));
	
	$footers = 4;
		if ($footers > 0 ) {
			$i = 0; while ($i < $footers ) { $i++;
				register_sidebar(array(
				'name'          => 'Footer '.$i,
				'id'            => 'footer-'.$i,
				'description'   => __('Footer widgets section.','webincode'),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h6 class="heading-footer">',
				'after_title'   => '</h6>',
				));
				
			}
		};
			
}
add_action( 'widgets_init', 'prodigystudio_sidebars_init' );
?>
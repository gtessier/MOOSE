<?php // The theme functions

/* ================================================================
	DEFINE BASICS AND INCLUDE REQUIRED FILES
================================================================ */
	
	define( 'TEMPPATH', get_stylesheet_directory_uri() );
	define( 'IMAGES', TEMPPATH. "/img" );
	
	add_filter( 'show_admin_bar', '__return_false' );
	add_filter( 'ot_theme_mode', '__return_true' );
	
	include_once( 'option-tree/ot-loader.php' );
	include_once( 'includes/et_theme_options.php' );
	include_once( 'includes/et_options_backup.php' );
	include_once( 'includes/et_shortcodes.php' );
	include_once( 'includes/et_theme_functions.php' );
		
/* ================================================================
	NAV & TITLE SETTINGS
================================================================ */
		
	// Sanitize title
	function et_page_title() {
	$post_data = get_page($page->ID, ARRAY_A);
	$title = $post_data['post_title'];
		$chars = array("[color]","[/color]","<span>","</span>","<br/>","<br>");
		$substitute = array("");
		$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
							'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
							'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
							'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
							'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','Ğ'=>'G', 'İ'=>'I', 'Ş'=>'S', 'ğ'=>'g', 'ı'=>'i', 'ş'=>'s', 'ü'=>'u',
							'ă'=>'a', 'Ă'=>'A', 'ș'=>'s', 'Ș'=>'S', 'ț'=>'t', 'Ț'=>'T'  );
		$anchor = strtr( $title, $unwanted_array );
		$anchor = str_replace($chars,$substitute,$anchor);
		$anchor = str_replace(" ","-",$anchor);
		$anchor = preg_replace('/[^A-Za-z0-9\-]/', '', $anchor);
		$anchor = strtolower($anchor);
	return $anchor; 
	}

	function et_register_menus() {
		register_nav_menus( array( 'top-menu' => 'Top primary menu') );
	} add_action('init', 'et_register_menus');

	class description_walker extends Walker_Nav_Menu{
		  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
			   //global $wp_query;
			   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			   $class_names = $value = '';
			   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
			   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			   $class_names = ' class="'. esc_attr( $class_names ) . '"';
			   $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			   $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			   $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			   if($item->object == 'page'){
					$varpost = get_post($item->object_id);
					$attributes .= ' href="' . get_site_url() . '/' . $varpost->post_name . '"';
			   } else 
				$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
				$args = (object) $args;
				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );		        
		 }
	}	
	
/* ================================================================
	THEME SPECIFIC SETTINGS
================================================================ */

	add_theme_support( 'automatic-feed-links' );

	if ( ! isset( $content_width ) ){ $content_width = 600; }	

	add_theme_support('post-thumbnails');
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
	function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}

	function et_login_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo ot_get_option('et_login_logo'); ?>);
				padding-bottom: 30px;
				background-size: auto;
				height: 30px; width: auto;
			}
		</style>
	<?php } add_action( 'login_enqueue_scripts', 'et_login_logo' );		
	

/* ================================================================
	SIDEBAR SETTINGS
================================================================ */

	if ( function_exists( 'register_sidebar' ) ) {

		register_sidebar( array (
			'name' => __( 'Primary Sidebar', 'primary-sidebar' ),
			'id' => 'primary-widget-area',
			'description' => __( 'The primary widget area', 'dir' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}
	
/* ================================================================
	SCRIPTS & STYLES
================================================================ */	

	function et_register_scripts() {
			
		wp_register_script('waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js',array('jquery'),'1.0', TRUE);
		wp_register_script('waypointssticky', get_template_directory_uri() . '/assets/js/waypoints-sticky.min.js',array('jquery'),'1.0', TRUE);
		wp_enqueue_style('style', get_stylesheet_uri() );
		if( ot_get_option('et_responsive_enable') != "off"){ wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css' ); }
		wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js',array('jquery'),'1.0', TRUE);
		wp_register_script('countto', get_template_directory_uri() . '/assets/js/jquery.countTo.js',array('jquery'),'1.0', TRUE);
		wp_register_script('placeholder', get_template_directory_uri() . '/assets/js/jquery.placeholder.js',array('jquery'),'1.0', TRUE);	
		wp_register_script('loupe', get_template_directory_uri() . '/assets/js/jquery.loupe.min.js',array('jquery'),'1.0', TRUE);		
		wp_register_script('owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js',array('jquery'),'1.0', TRUE);
		wp_register_script('easing', get_template_directory_uri() . '/assets/js/jquery.easing.js',array('jquery'),'1.0', TRUE);	
		wp_register_script('smoothscroll', get_template_directory_uri() . '/assets/js/jquery.smooth-scroll.js',array('jquery'),'1.0', TRUE);


		wp_enqueue_script('jquery',TRUE);
		wp_enqueue_script('waypoints');		
		wp_enqueue_script('loupe');
		wp_enqueue_script('waypointssticky');
		wp_enqueue_script('countto');
		wp_enqueue_script('placeholder');			
		wp_enqueue_script('easing');
		wp_enqueue_script('owl');
		wp_enqueue_script('smoothscroll');	
		wp_enqueue_script('custom');
			
	} add_action('wp_enqueue_scripts', 'et_register_scripts');

	function et_single_scripts() {
		if(is_single()) { wp_enqueue_script( 'comment-reply' ); }
	} add_action('wp_enqueue_scripts', 'et_single_scripts');

	function et_fonts() {
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'et-myfonts', "$protocol://fonts.googleapis.com/css?family=Ubuntu:300,400,700|Open+Sans:400,300" );
	} add_action( 'wp_enqueue_scripts', 'et_fonts' );	


	
/* ================================================================
	TGM PLUGIN ACTIVATION
================================================================ */

	require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'et_required_plugins' );

	function et_required_plugins() {

		$plugins = array(
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => false,
			),			
		);

		$theme_text_domain = 'appster';

		$config = array(
			'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );

	}

/* ================================================================
	END OF DOCUMENT
================================================================ */
?>
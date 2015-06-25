<?php
define( 'OPTIONS_PATH', get_template_directory_uri() . '/framework/options/' );
if (!function_exists('redux_init')) :
	function redux_init() {
	/**
		ReduxFramework Sample Config File
		For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
	**/


	/**
	 
		Most of your editing will be done in this section.

		Here you can override default values, uncomment args and change their values.
		No $args are required, but they can be overridden if needed.
		
	**/
	$args = array();


	// For use with a tab example below
	$tabs = array();

	ob_start();

	$ct = wp_get_theme();
	$theme_data = $ct;
	$item_name = $theme_data->get('Name'); 
	$tags = $ct->Tags;
	$screenshot = $ct->get_screenshot();
	$class = $screenshot ? 'has-screenshot' : '';

	$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','prodigystudio' ), $ct->display('Name') );

	?>
	<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
		<?php if ( $screenshot ) : ?>
			<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
			<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
				<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
			</a>
			<?php endif; ?>
			<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		<?php endif; ?>

		<h4>
			<?php echo $ct->display('Name'); ?>
		</h4>

		<div>
			<ul class="theme-info">
				<li><?php printf( __('By %s','prodigystudio'), $ct->display('Author') ); ?></li>
				<li><?php printf( __('Version %s','prodigystudio'), $ct->display('Version') ); ?></li>
				<li><?php echo '<strong>'.__('Tags', 'prodigystudio').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
			</ul>
			<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
			<?php if ( $ct->parent() ) {
				printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
					__( 'http://codex.wordpress.org/Child_Themes','prodigystudio' ),
					$ct->parent()->display( 'Name' ) );
			} ?>
			
		</div>

	</div>

	<?php
	$item_info = ob_get_contents();
	    
	ob_end_clean();

	$sampleHTML = '';
	if( file_exists( dirname(__FILE__).'/info-html.html' )) {
		/** @global WP_Filesystem_Direct $wp_filesystem  */
		global $wp_filesystem;
		if (empty($wp_filesystem)) {
			require_once(ABSPATH .'/wp-admin/includes/file.php');
			WP_Filesystem();
		}  		
		$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
	}

	// BEGIN Sample Config

	// Setting dev mode to true allows you to view the class settings/info in the panel.
	// Default: true
	$args['dev_mode'] = false;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';

	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['dev_mode_icon_class'] = '';

	// Set a custom option name. Don't forget to replace spaces with underscores!
	$args['opt_name'] = 'ps_opts';

	// Setting system info to true allows you to view info useful for debugging.
	// Default: false
	//$args['system_info'] = true;


	// Set the icon for the system info tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['system_info_icon'] = 'info-sign';

	// Set the class for the system info tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['system_info_icon_class'] = 'icon-large';

	$theme = wp_get_theme();

	$args['display_name'] = $theme->get('Name');
	//$args['database'] = "theme_mods_expanded";
	$args['display_version'] = $theme->get('Version');

	// If you want to use Google Webfonts, you MUST define the api key.
	$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

	// Define the starting tab for the option panel.
	// Default: '0';
	//$args['last_tab'] = '0';

	// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
	// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
	// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
	// Default: 'standard'
	//$args['admin_stylesheet'] = 'standard';

	// Setup custom links in the footer for share icons
	/*$args['share_icons']['facebook'] = array(
	    'link' => 'https://www.facebook.com/prodigystudio',
	    'title' => 'Like us on Facebook', 
	    'img' => ReduxFramework::$_url . 'assets/img/social/Facebook.png'
	);
	$args['share_icons']['twitter'] = array(
	    'link' => 'https://twitter.com/prodigystudio',
	    'title' => 'Follow me on Twitter', 
	    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
	);*/

/*	$args['share_icons']['themeforest'] = array(
	    'link' => 'http://www.linkedin.com/profile/view?id=52559281',
	    'title' => 'Like us on Themeforest', 
	    'img' => ReduxFramework::$_url . 'assets/img/social/LinkedIn.png'
	); */

	// Enable the import/export feature.
	// Default: true
	//$args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['import_icon_class'] = '';

	/**
	 * Set default icon class for all sections and tabs
	 * @since 3.0.9
	 */
	//$args['default_icon_class'] = '';


	// Set a custom menu icon.
	//$args['menu_icon'] = '';

	// Set a custom title for the options page.
	// Default: Options
	$args['menu_title'] = __('Theme Options', 'prodigystudio');

	// Set a custom page title for the options page.
	// Default: Options
	$args['page_title'] = __('Theme Options', 'prodigystudio');

	// Set a custom page slug for options page (wp-admin/themes.php?page=***).
	// Default: redux_options
	$args['page_slug'] = 'prodigystudio_options';

	$args['default_show'] = false;
	$args['default_mark'] = '';

	// Set a custom page capability.
	// Default: manage_options
	//$args['page_cap'] = 'manage_options';

	// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
	// Default: menu
	$args['page_type'] = 'submenu';

	// Set the parent menu.
	// Default: themes.php
	// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	//$args['page_parent'] = 'options-general.php';

	// Set a custom page location. This allows you to place your menu where you want in the menu order.
	// Must be unique or it will override other items!
	// Default: null
	//$args['page_position'] = null;

	// Set a custom page icon class (used to override the page icon next to heading)
	//$args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$args['icon_type'] = 'image';

	// Disable the panel sections showing as submenu items.
	// Default: true
	//$args['allow_sub_menu'] = false;
	    
	// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
	/*$args['help_tabs'][] = array(
	    'id' => 'redux-opts-1',
	    'title' => __('Theme Information 1', 'prodigystudio'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'prodigystudio')
	);
	$args['help_tabs'][] = array(
	    'id' => 'redux-opts-2',
	    'title' => __('Theme Information 2', 'prodigystudio'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'prodigystudio')
	);*/

	// Set the help sidebar for the options page.                                        
	/*$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'prodigystudio');*/


	// Add HTML before the form.
	if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
		if (!empty($args['global_variable'])) {
			$v = $args['global_variable'];
		} else {
			$v = str_replace("-", "_", $args['opt_name']);
		}
		$args['intro_text'] = sprintf( __('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'prodigystudio' ), $v );
	} else {
		$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'prodigystudio');
	}

	// Add content after the form.
	$args['footer_text'] = __('<p>WordPress Theme by <a href="http://themeforest.net/user/ProdigyStudio">ProdigyStudio</a></p>', 'prodigystudio');

	// Set footer/credit line.
	//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'prodigystudio');


	$sections = array();              

	//Background Patterns Reader
	$sample_patterns_path = ReduxFramework::$_dir . 'sample/patterns/';
	$sample_patterns_url  = ReduxFramework::$_url . 'sample/patterns/';
	$sample_patterns      = array();

	if ( is_dir( $sample_patterns_path ) ) :
		
	  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
	  	$sample_patterns = array();

	    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

	      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
	      	$name = explode(".", $sample_patterns_file);
	      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
	      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
	      }
	    }
	  endif;
	endif;
	
	$sections[] = array(
		'icon' => 'el-icon-cogs',
		'title' => __('General Settings','prodigystudio'),
		'desc' => __('Basic theme parameters are configured here.', 'prodigystudio'),
		'fields' => array (
		
		array(
				'id'=>'ps_theme_style',
				'type' => 'select',
				'title' => __('Theme color', 'redux-framework-demo'), 
				'desc' => __('Select your desired theme color', 'redux-framework-demo'),
				'options' => array(
					'default.css'         => 'Default',
					'blue.css'         => 'Blue',
					'grass.css'        => 'Grass',
					'gray.css'         => 'Gray',
					'green.css'        => 'Green',
					'green-light.css'  => 'Green Light',
					'indigo.css'       => 'Indigo',
					'lime.css'         => 'Lime',
					'orange.css'       => 'Orange',
					'purple.css'       => 'Purple',
					'red.css'          => 'Red',
					'white.css'        => 'White',
					'yellow.css'       => 'Yellow',
					'yellow-light.css' => 'Yellow Light',
					'custom.css'       => 'Custom Color'					
					
				),
				'default' => 'default.css'
				),
				
				array(
				'id' => 'ps_custom_style',
				'type' => 'color',
				'title' => __('Theme Main Custom Color','prodigystudio'),
				'description' =>  __('Select a custom main accent color used for different page elements links, menu color etc. This color by default is used for all coloured elements', 'prodigystudio'),
				'required' => array('ps_theme_style','equals',array('custom.css')),			
				'output' => array(
				'background-color' => '.rowfull .left-bg, header .logo-content, .header2 .header-content:before, .header3 .header-content:before, .header3 .client-content .login, .header3 .client-content .signup:hover, .header2 .logo-content .logo img, .header3 .logo-content .logo img, .is-sticky .header2:before, .is-sticky .header3:before, .is-sticky .logo-content .logo img, .button, .slider-button.button, #service, #service .sub-service span, .heading-line, .inline-heading-line span, .tag-cloud a:hover, a.reply, a.reply:visited, h4.resp-accordion.resp-tab-active,
h4.resp-accordion.resp-tab-active:hover,.resp-tabs-list li.resp-tab-active,.resp-tabs-list li.resp-tab-active:hover, .label, .blog-info, footer .get-connect, footer .scroll-top:hover, .progress-bar .progress-content, .progress-bar.thin .progress-content .progress-meter, .mo-caption .content .preview,.mo-caption .content .permalink, kbd, .highlight, .panel.fold, .pricing-table .title, .pricing-table.style2 .title, .pricing-table.style4 .price, .testi.style2 .name, .testi.style2 .name:before, .testi.style3 .testi-container blockquote:before, .testi.style4 .name span, table.table thead, .dropcap.circle,.dropcap.square, .promo-box, .mejs-controls .mejs-time-rail .mejs-time-current,.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,.wp-caption p.wp-caption-text,a.comment-reply-link, a.comment-reply-link:visited,.wpcf7-submit',
				'color' => 'header .menu-trigger i, header .search-content .toggle-search, .header-info1 li.phone-info,
.header-info1 li.toggle-search, .header2 .header-info li i, .header3 .client-content .login:hover, .header3 .toggle-search, .button.link, #promo-home h2, .maleo-color, .breadcrumb .active, .about-team h3, .about-team span, .about-team .social-wrapper .social-feature li a:hover, #twitter-wrapper #twitter-feed .twitter-text a, #twitter-wrapper #twitter-feed .twitter-text .at, .service-value .text-currency, .date-post-info, .blog-media .carousel-nav .carousel-prev:hover, .blog-media .carousel-nav .carousel-next:hover, .blog-author ul.social-icon, .blog-author ul.social-icon li i, h4.resp-accordion:hover,h4.resp-accordion:focus,.resp-tabs-list li:hover,.resp-tabs-list li:focus, .maleo-index-tab h4.resp-accordion:hover h6, .maleo-index-tab h4.resp-accordion.resp-tab-active h6,.maleo-index-tab .resp-tabs-list li:hover h6,.maleo-index-tab .resp-tabs-list li.resp-tab-active h6, .maleo-index-tab h4.resp-accordion:hover, .maleo-index-tab h4.resp-accordion.resp-tab-active,.maleo-index-tab .resp-tabs-list li:hover,.maleo-index-tab .resp-tabs-list li.resp-tab-active,.maleo-index-tab h4.resp-accordion:focus h6,
.maleo-index-tab .resp-tabs-list li:focus h6, .mo-menu a.active,.mo-menu a.current,.mo-menu .current-menu-item > a,.mo-menu .current-menu-parent > a,.mo-menu a.current:hover,.mo-menu a.current:focus,.mo-menu a.current:active, p.blog-date a,p.blog-date a:visited, .post-type, .button.button-border, .svg-icon .icon-wrapper i,.svg-icon.style1 .icon-wrapper i,.svg-icon.style2 .icon-wrapper i,.no-shape i, .pricing-table.style4 .title, .promo-box .promo-button i, .pagination > .active > a,.pagination > .active > span,.pagination > .active > a:hover,.pagination > .active > span:hover,.pagination > .active > a:focus,.pagination > .active > span:focus,.image-post-info',
				'border-color' => 'ul.contact-form .form-control:focus,ul.comment-form .form-control:focus,.login-panel .form-control:focus,.header-info1 li.phone-info, .header-info1 li.toggle-search,.header3 .toggle-search,.date-post-info, .image-post-info,.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus'),				
				'default' => '#36c1c8',
				'validate' => 'color',
			
				),
				
				array(
				'id' => 'ps_custom_additional_style',
				'type' => 'color',
				'title' => __('Theme Additional Custom Color','prodigystudio'),
				'description' =>  __('Menu hover and links hover statement', 'prodigystudio'),
				'required' => array('ps_theme_style','equals',array('custom.css')),			
				'output' => array(
				'background-color' => '.slider-button.button:hover, .mo-caption .content .preview:hover,.mo-caption .content .permalink:hover, .button.button-border:hover,
.button.button-border:focus,.button.button-border:active,.button.button-border.active, .pricing-table.style2 .price, .button:hover,.button:focus,.button:active,.button.active',
				'color' => 'a:hover, .button.link:hover, .button.link:focus, .button.link:hover i, .button.link:focus i, #slider-wrapper .tp-leftarrow.default:hover, #slider-wrapper .tp-leftarrow.default:focus,#slider-wrapper .tp-rightarrow.default:hover,#slider-wrapper .tp-rightarrow.default:focus, #twitter-wrapper #twitter-feed .twitter-text a:hover, #twitter-wrapper #twitter-feed .twitter-text a:focus, #twitter-wrapper #twitter-feed .twitter-text .at:hover, #twitter-wrapper #twitter-feed .twitter-text .at:focus, .mo-menu a:hover, .mo-menu a:focus, .mo-menu a:active, .mo-menu a.highlighted, .mo-menu ul a:hover,.mo-menu ul a:focus,.mo-menu ul a:active,.mo-menu ul a.highlighted, .mo-menu a:hover span.sub-arrow:after,.mo-menu a:focus span.sub-arrow:after,.mo-menu a:active span.sub-arrow:after,.mo-menu a.highlighted span.sub-arrow:after, .mo-menu span.scroll-up:hover span.scroll-up-arrow:after, .mo-menu span.scroll-down:hover span.scroll-down-arrow:after, #portfolio-filter ul li a.selected, #portfolio-filter ul li a:hover, #portfolio-filter ul li a:focus, .blog-media2 .video-play:hover, #process-chart .button:hover, .post-info a:hover,.post-info a:focus, .pagination > li > a:hover,.pagination > li > span:hover,.pagination > li > a:focus,.pagination > li > span:focus',
				'border-color' => 'ul.contact-form .form-control:focus,ul.comment-form .form-control:focus,.login-panel .form-control:focus,.contact-form .form-control:focus,.wpcf7-form-control:focus,
.comment-form .form-control:focus,.login-panel .form-control:focus,.pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus'),				
				'default' => '#72d4d9',
				'validate' => 'color',
			
				),
				
		array(
				'id'=>'ps_theme_layout',
				'type' => 'image_select',
				'compiler'=>true,
				'title' => __('Theme Layout Style', 'webincode'), 
				'subtitle' => __('Select Theme Layout Style', 'webincode'),
				'options' => array(
						'wide' => array('alt' => 'wide', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
						'boxed' => array('alt' => 'boxed', 'img' => ReduxFramework::$_url.'assets/img/3cm.png')
						
					),
				'default' => 'wide'
			),
		
		array(
			'id'        => 'ps_body_pattern',
			'type'      => 'select_image',
			'title'     => __('Select Pattern', 'redux-framework-demo'), 
			'subtitle'  => __('Select a pattern to use as the body background or upload your own', 'redux-framework-demo'),						
			'compiler' => true,
			'mode'  => 'background-image',
			'output' => array( 'body' ),
			'required' => array('ps_theme_layout','equals',array('boxed')),			
			'options'   => $sample_patterns,
			//'default'   => 'pattern1.png',
		),	
		
		array(
			'id' => 'ps_body_background',
			'type' => 'background',
			'output' => array('body'),
			'title' => __('Body Background','prodigystudio'),
			'required' => array('ps_theme_layout','equals',array('boxed')),
			'subtitle' => __('Upload an image or use preinstalled patterns as the background','prodigystudio')
			
			
			),		
							        			 
        
        array(
            'id'=>'ps_sticky_header',
            'type' => 'switch', 
            'title' => __('Enable Sticky Header', 'prodigystudio'),
            'subtitle' => __('', 'prodigystudio'),
			'default'  => true
            ),
		array(
            'id'=>'ps_custom_logo_sticky',
            'type' => 'media', 
            'url'=> true,
            'title' => __('Logo For Sticky Header', 'prodigystudio'),
            'compiler' => 'true',
            'subtitle' => __('Upload logo for sticky header', 'prodigystudio'),
			'required' => array('ps_sticky_header','equals',array('1')),
            ),
		
		 array(
            'id'=>'ps_custom_logo_sticky_retina',
            'type' => 'media', 
            'url'=> true,
            'title' => __('Retina Logo for Sticky Header', 'prodigystudio'),
            'compiler' => 'true',
            'subtitle' => __('Upload retina logo for sticky header', 'prodigystudio'),
			'required' => array('ps_sticky_header','equals',array('1')),
            ),
			
		array(
				'id' => 'ps_sticky_logo_dimensions',
				'type' => 'dimensions',
				'title' => __('Sticky Logo Size', 'prodigystudio'),
				'output' => array('.is-sticky .logo img'),
				'required' => array('ps_sticky_header','equals',array('1')),
				'units' => 'px',
				'units_extended' => 'false',
				'default'  => array(
					//'Width'   => '104',
					//'Height'  => '79'
					),
			),		
				
			
		array(
            'id'=>'ps_breadcrumbs',
            'type' => 'switch', 
            'title' => __('Show Breadcrumbs', 'prodigystudio'),
            'subtitle' => __('Display dynamic breadcrumbs on each page of your website.', 'prodigystudio'),
			'default'  => true
            ),
		
		array(
				'id'=>'ps_contact_email',
				'type' => 'text', 
				'title' => __('Contact Form E-Mail', 'prodigystudio'),
				'subtitle'=> __('Enter your E-mail address to use on the Contact Form. Leave blank if want to use admin email', 'prodigystudio'),
				'validate' => 'email',
				'msg' => 'Please, input a valid email!',
				"default"       => '',
            ),
			
		array(
			'id'=>'ps_pagination_style',
			'type' => 'select',
			'title' => __('Pagination Style', 'webincode'), 
			'subtitle' => __('Select the style of pagination you would like to use on the blog.', 'webincode'),
			'options' => array('numeric' => 'Numeric', 'default' => 'Next/Prev' ),
			'default' => 'numeric',
			'width' => 'width:60%',
			),
		
		array(
				'id'=>'ps_custom_css',
				'type' => 'ace_editor',
				'title' => __('CSS Code', 'redux-framework-demo'), 
				'subtitle' => __('Paste your CSS code here.', 'redux-framework-demo'),
				'mode' => 'css',
	            'theme' => 'monokai',
				'desc' => '',
	            'default' => "#header{\nmargin: 0 auto;\n}"
				),				
            
		array(
			'id'=>'ps_tracking_code',
			'type' => 'textarea',					
			'title' => __('Tracking Code', 'prodigystudio'), 
			'subtitle' =>  __('Google Analytics or other', 'prodigystudio'),				
			'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'prodigystudio'),
		)
		
		)
	
	);
	
	$sections[] = array (
		'icon' => 'el-icon-tags',
		'title' => __('Branding options','prodigystudio'),
		'fields' => array (
			
			array(
				'id'=>'ps_logo_type',
				'type' => 'select',
				'title' => __('Theme logo type', 'redux-framework-demo'), 
				'desc' => __('Select a type of the logo', 'redux-framework-demo'),
				'options' => array(
					'theme_defined'       => 'Logo defined in CSS',
					'custom'              => 'Custom',
					'custom_with_retina'  => 'Custom with Retina',
					'none'                => 'None',					
					
				),
				'default' => 'theme_defined'
				),
				
			array(
				'id'=>'ps_custom_logo',
				'type' => 'media', 
				'url'=> true,
				'title' => __('Logo', 'prodigystudio'),
				'compiler' => 'true',
				'required' => array('ps_logo_type','equals',array('custom','custom_with_retina')),
				'subtitle' => __('Upload your Logo', 'prodigystudio'),
            ),
			
			array(
				'id' => 'ps_logo_dimensions',
				'type' => 'dimensions',
				'title' => __('Logo Size', 'prodigystudio'),
				'output' => array('header .logo img','.header2 .logo-content .logo img', '.header3 .logo-content .logo img'),
				'required' => array('ps_logo_type','equals',array('custom','custom_with_retina')),
				'units' => 'px',
				'units_extended' => 'false',
				'default'  => array(
					//'Width'   => '104',
					//'Height'  => '79'
					),
			),
		
		array(
			'id' => 'ps_logo_spacing',
			'type' => 'spacing',
			'title' => __('Logo Top Margin', 'prodigystudio'),
			'bottom' => 'false',
			'left' => 'false',
			'right' => 'false',
			'mode' => 'padding',
			'units' => array('px'),
			'units_extended' => 'false',
			'required' => array('ps_logo_type','equals',array('custom','custom_with_retina')),
			'output' => array('header .logo','.header2 .logo-content .logo', '.header3 .logo-content .logo'),
			'default'  => array(
      			//'padding-top'   => '25px'
			    ),
			),
						
		
		 array(
            'id'=>'ps_custom_logo_retina',
            'type' => 'media', 
            'url'=> true,
            'title' => __('Logo Retina', 'prodigystudio'),
            'compiler' => 'true',
			'required' => array('ps_logo_type','equals',array('custom_with_retina')),
            'subtitle' => __('Upload your Retina logo', 'prodigystudio'),
            ),	
			
		array(
            'id'=>'ps_custom_fav',
            'type' => 'media', 
            'url'=> true,
            'title' => __('Custom Favicon', 'prodigystudio'),
            'compiler' => 'true',
            'subtitle' => __('Upload a 16px x 16px ico image that will represent your website\'s favicon.', 'prodigystudio'),
            ),
		)
	
	);
	
	$sections[] = array (
		'icon' => 'el-icon-adjust-alt',
		'title' => 'Header options',
		'fields' => array (
			array(
				'id' => 'ps_header_type',
				'type'     => 'button_set',
				'title' => 'Header types',
				'subtitle' => 'Select one of the desired type of header',
				'options' => array(
					'type1' => 'Type 1',
					'type2' => 'Type 2',
					'type3' => 'Type 3'
				 ),
				'default' => 'type1'
			),
			array(
				'id'=>'ps_enable_search',
				'type' => 'switch', 
				'title' => __('Search Icon', 'prodigystudio'),
				'subtitle' => __('Enable/Disable search icon in header', 'prodigystudio'),
				'default'  => true
            ),
			array(
				'id'=>'ps_enable_login',
				'type' => 'switch', 
				'title' => __('Login form', 'prodigystudio'),
				'subtitle' => __('Enable/Disable login button in header', 'prodigystudio'),
				'required' => array('ps_header_type','equals',array('type3')),
				'default'  => true
            ),
			array(
				'id'=>'ps_enable_signup',
				'type' => 'switch', 
				'title' => __('Sign-up', 'prodigystudio'),
				'subtitle' => __('Enable/Disable sign-up button in header', 'prodigystudio'),
				'required' => array('ps_header_type','equals',array('type3')),
				'default'  => true
            ),
			array (
				'id' => 'ps_additional_info',
				'title' => __('Additional Info','prodigystudio'),
				'type' => 'sortable',
				'subtitle' =>__('Display in top left corner of the header','prodigystudio'),
				'required' => array('ps_header_type','equals',array('type2')),
				'options' => array(
		            'phonealt'  => 'Phone',
	    	        'envelope'  => 'Email',	        	    
					'default'  => '',
	    	    	)
			),
			
			array(
				'id' => 'ps_header_phone_text',
				'type' => 'text',
				'title' => __('Phone Number','prodigystudio'),
				'subtitle' => __('Input a phone number to display it in header, leave blank to not display','prodigystudio'),
				'required' => array('ps_header_type','equals',array('type1','type2')),
			),
						
			array(
				'id'=>'ps_social_header',
				'type' => 'switch', 
				'title' => __('Social Links', 'prodigystudio'),
				'subtitle' => __('Enable/Disable social links in footer', 'prodigystudio'),
				'required' => array('ps_header_type','equals',array('type2')),
				'default'  => true
            ),
			
			
			
					
			array(
	            'id' => 'ps_header_social_links',
		        'type' => 'sortable',
	    	    'title' => __('Social links', 'redux-framework-demo'),
	        	'subtitle' => __('Display your social link in footer', 'redux-framework-demo'),
				'required' => array('ps_social_header','equals',array('1')),				
	            'options' => array(
		            'facebook'  => '',
	    	        'twitter'   => '',
	        	    'google'    => '',
					'linkedin'  => '',
					'pinterest' => '',
					'dribbble'  => '',
					'vimeo'     => '',
					'behance'   => '',
					'lastfm'    => '',
					'instagram' => '',
					'evernote'  => '',
					'skype'     => '',
					'envato'    => ''
	    	    	)
        	),	
			
		)
	
	);
	
	
	$sections[] = array (
		'icon' => 'el-icon-fontsize',
		'title' => __('Typography','prodigystudio'),
		'fields' => array (
		
		array(
            'id'=>'ps_info_body_background',
            'type' => 'info',
            'desc' => __('Main font used in theme', 'prodigystudio'),
            ),
    	
		array(
			'id'=>'ps_maleo_font_adds',
			'type' => 'typography',
			'title' => __('Body Font', 'redux-framework-demo'),
			'subtitle' => __('', 'prodigystudio'),			
			'google'=>true,
			'output' => array('html, body'),
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'color' => false,
			'subsets' => false,
			'font-size' => true,
			'line-height' => false,
			'default' => array(
				'font-family'=>'Open Sans',				
				'font-weight'=>'400',
				'font-size'=> '16px',
				),
			),	
				
			
		array(
			'id'=>'ps_maleo_font_three',
			'type' => 'typography',
			'title' => __('Lead Paragraph Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the lead paragraph font properties.', 'prodigystudio'),
			'output' => array('p.lead'),			
			'google'=>true,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'default' => array(
				'font-family'=>'Goudy Bookletter 1911'				
				),
			),
			
			array(
			'id'=>'ps_header_one',
			'type' => 'typography',
			'title' => __('Header One Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the H1 font properties.', 'prodigystudio'),
			'output' => array('h1'),
			'google'=>true,
			'subsets'=>true, // Only appears if google is true and subsets not set to false
			'font-size'=>false,
			'font-style'=> false,
			'font-weight'=> false,
			'line-height'=>false,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'color'=>true,
			'preview'=>true, // Disable the previewer
			'default' => array(
				'font-family'=>'Montserrat',
				'color'=>'#525252',
						
			),
			),
		
		array(
			'id'=>'ps_header_two',
			'type' => 'typography',
			'title' => __('Header Two Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the H2 font properties.', 'prodigystudio'),
			'output' => array('h2'),
			'google'=>true,
			'subsets'=>true, // Only appears if google is true and subsets not set to false
			'font-size'=>false,
			'font-style'=> false,
			'font-weight'=> false,
			'line-height'=>false,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'color'=>true,
			'preview'=>true, // Disable the previewer
			'default' => array(
				'font-family'=>'Montserrat',
				'color'=>'#525252'				
				),
			),
			
			array(
			'id'=>'ps_header_three',
			'type' => 'typography',
			'title' => __('Header Three Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the H3 font properties.', 'prodigystudio'),
			'output' => array('h3'),
			'google'=>true,
			'subsets'=>true, // Only appears if google is true and subsets not set to false
			'font-size'=>false,
			'font-style'=> false,
			'font-weight'=> false,
			'line-height'=>false,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'color'=>true,
			'preview'=>true, // Disable the previewer
			'default' => array(
				'font-family'=>'Montserrat',
				'color'=>'#525252'				
				),
			),
			
			array(
			'id'=>'ps_header_four',
			'type' => 'typography',
			'title' => __('Header Four Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the H4 font properties.', 'prodigystudio'),
			'output' => array('h4'),
			'google'=>true,
			'subsets'=>true, // Only appears if google is true and subsets not set to false
			'font-size'=>false,
			'font-style'=> false,
			'font-weight'=> false,
			'line-height'=>false,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'color'=>true,
			'preview'=>true, // Disable the previewer
			'default' => array(
				'font-family'=>'Montserrat',
				'color'=>'#525252'				
				),
			),	
			
			array(
			'id'=>'ps_header_five',
			'type' => 'typography',
			'title' => __('Header Five Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the H5 font properties.', 'prodigystudio'),
			'output' => array('h5'),
			'google'=>true,
			'subsets'=>true, // Only appears if google is true and subsets not set to false
			'font-size'=>false,
			'font-style'=> false,
			'font-weight'=> false,
			'line-height'=>false,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'color'=>true,
			'preview'=>true, // Disable the previewer
			'default' => array(
				'font-family'=>'Montserrat',
				'color'=>'#525252'				
				),
			),
			
			array(
			'id'=>'ps_header_six',
			'type' => 'typography',
			'title' => __('Header Six Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the H6 font properties.', 'prodigystudio'),
			'output' => array('h6'),
			'google'=>true,
			'subsets'=>true, // Only appears if google is true and subsets not set to false
			'font-size'=>false,
			'font-style'=> false,
			'font-weight'=> false,
			'line-height'=>false,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'color'=>true,
			'preview'=>true, // Disable the previewer
			'default' => array(
				'font-family'=>'Montserrat',
				'color'=>'#525252'
				),
			),
			array(
			'id'=>'ps_maleo_font',
			'type' => 'typography',
			'title' => __('Load Open Sans', 'redux-framework-demo'),
			'subtitle' => __('Used to load font in the theme.', 'prodigystudio'),			
			'google'=>true,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'default' => array(
				'font-family'=>'Open Sans',
				'color'=>'#b3b3b3',
				'font-size'=>'13px',
				'font-weight'=>'300',
				'line-height'=>'24px'
				),
			),
			array(
			'id'=>'ps_maleo_font_two',
			'type' => 'typography',
			'title' => __('Load Montserrat', 'redux-framework-demo'),
			'subtitle' => __('Used to load font in the theme.', 'prodigystudio'),						
			'google'=>true,
			'text-align'=>false,
			'word-spacing'=>false, // Defaults to false
			'letter-spacing'=>false, // Defaults to false
			'default' => array(
				'font-family'=>'Montserrat',				
				),
			),		

		)
	);

	
	
	
	$sections[] = array (
		'icon' => 'el-icon-wrench',
		'title' => __('Miscellaneous', 'prodigystudio'),
		'fields' => array (
			array(
				'id'=>'ps_page_loader',
				'type' => 'switch', 
				'title' => __('Page preloader', 'prodigystudio'),
				'subtitle' => __('Enable/Disable preloader visible before the page is loaded', 'prodigystudio'),
				'default'  => true
            ),
			array(
				'id'=>'ps_info_404_info',
				'type' => 'info',
				'desc' => __('404 page settings', 'prodigystudio'),
            ),
			
			array(
				'id'=>'ps_custom_404_title',
				'type' => 'text',
				'title' => __('404 page title', 'prodigystudio'), 
				'subtitle' => __('Input a title for 404 error page', 'prodigystudio'),
				'default' => __('Page not Found','prodigystudio'),
			),			
			
			array(
				'id'=>'ps_seach_info',
				'type' => 'info',
				'desc' => __('Search Result page settings', 'prodigystudio'),
            ),
			
			array(
				'id'=>'ps_custom_search_title',
				'type' => 'text',
				'title' => __('Search Result page title', 'prodigystudio'), 
				'subtitle' => __('Input a title for search result page', 'prodigystudio'),
				'default' => __('Search for:','prodigystudio'),
			),
			
			array(
				'id'=>'ps_blog_info',
				'type' => 'info',
				'desc' => __('Blog page settings', 'prodigystudio'),
            ),
			
			array(
				'id'=>'ps_custom_blog_title',
				'type' => 'text',
				'title' => __('Blog page title', 'prodigystudio'), 
				'subtitle' => __('Input a title for blog page', 'prodigystudio'),
				'default' => __('Blog','prodigystudio'),
			),
						
		)
	);

	$sections[] = array (
		'icon' => 'el-icon-file-new',
		'title' => __('Sidebars Generator', 'prodigystudio'),
		'fields' => array (
			array(
				'id'=>'ps_sidebars',
				'type'=> 'multi_text',
				'title' => __('Generate a new sidebar','prodigystudio'),
				'subtitle' => __('Type the name of the new sidebar widget area', 'prodigystudio'),
			)			
		)
	);
	
	$sections[] = array (
		'icon' => 'el-icon-folder-open',
		'title' => __('Portfolio Settings', 'prodigystudio'),
		'fields' => array (
			
			array(
				'id'=>'ps_portfolio_tax_columns',
				'type' => 'image_select',
				'title' => __('Portfolio Taxonomy Layout', 'redux-framework-demo'), 
				'desc' => __('Select a layout for portfolio taxonomy', 'redux-framework-demo'),
				'options' => array(
								'2' => array('alt' => '2 Columns', 'img' => ReduxFramework::$_url.'assets/img/2-col-portfolio.png'),
								'3' => array('alt' => '3 Columns', 'img' => ReduxFramework::$_url.'assets/img/3-col-portfolio.png'),
								'4' => array('alt' => '4 Columns', 'img' => ReduxFramework::$_url.'assets/img/4-col-portfolio.png'),
									),//Must provide key => value(array:title|img) pairs for radio options
				'default' => '2'
				),
			
			array(
				'id'=>'ps_portfolio_item_rewrite',
				'type' => 'text',
				'title' => __('Portfolio Items URL Base', 'redux-framework-demo'),				
				'desc' => __('The base of all portfolio item URLs (visit the <a href="'.admin_url('options-permalink.php').'">Settings- Permalinks</a> screen after changing this setting).', 'redux-framework-demo'),
				'default' => 'portfolio'
				),
			
			array(
				'id'=>'ps_portfolio_tax_rewrite',
				'type' => 'text',
				'title' => __('Portfolio Taxonomy URL Base', 'redux-framework-demo'),				
				'desc' => __('The base of portfolio taxonomy URLs (visit the <a href="'.admin_url('options-permalink.php').'">Settings- Permalinks</a> screen after changing this setting).', 'redux-framework-demo'),
				'default' => 'portfolios'
				),	
			
			
		)
	);
	
if ( class_exists( 'woocommerce' ) ) {
	
	$sections[] = array(
		'icon' => 'el el-shopping-cart ',
		'title' => __('WooCommerce','redux-framework-demo'),
		'fields' => array(
		
			
			array(
				'id'=>'ps_woo_front_items',
				'type' => 'text',
				'title' => __('How many products to show', 'redux-framework-demo'), 
				'desc' => __('type how many products you want to show on shop page', 'redux-framework-demo'),
				'default' => '12'
			),	
	
		)

	);

}
	
	$sections[] = array(
		'icon' => 'el-icon-photo',
		'title' => __('Footer','prodigystudio'),
		'fields' => array (
			
			array(
				'id'=>'ps_logo_type_footer',
				'type' => 'select',
				'title' => __('Theme Footer logo type', 'redux-framework-demo'), 
				'desc' => __('Select a type of the logo to display in footer', 'redux-framework-demo'),
				'options' => array(
					'theme_defined'       => 'Logo defined in CSS',
					'custom'              => 'Custom',
					'none'                => 'None',					
					
				),
				'default' => 'theme_defined'
				),
				
			array(
				'id'=>'ps_custom_logo_footer',
				'type' => 'media', 
				'url'=> true,
				'title' => __('Footer Logo', 'prodigystudio'),
				'compiler' => 'true',
				'required' => array('ps_logo_type_footer','equals',array('custom')),
				'subtitle' => __('Upload your Logo', 'prodigystudio'),
            ),
			
			array(
				'id' => 'ps_logo_footer_dimensions',
				'type' => 'dimensions',
				'title' => __('Footer Logo Size', 'prodigystudio'),
				'output' => array('footer .footer-logo img'),
				'required' => array('ps_logo_type_footer','equals',array('custom')),
				'units' => 'px',
				'units_extended' => 'false',
				'default'  => array(
					//'Width'   => '104',
					//'Height'  => '79'
					),
			),
			
			array(
				'id'=>'ps_social_footer',
				'type' => 'switch', 
				'title' => __('Social Links', 'prodigystudio'),
				'subtitle' => __('Enable/Disable social links in footer', 'prodigystudio'),
				'default'  => true
            ),
		
			array(
				'id'=>'ps_social_label',
				'type' => 'text', 
				'title' => __('Social Label', 'prodigystudio'),
				'required' => array('ps_social_footer','equals',array('1')),
				'default'       => 'Get Connected',
				
			),
			array(
	            'id' => 'ps_footer_social_links',
		        'type' => 'sortable',
	    	    'title' => __('Social links', 'redux-framework-demo'),
	        	'subtitle' => __('Display your social link in footer', 'redux-framework-demo'),
				'required' => array('ps_social_footer','equals',array('1')),				
	            'options' => array(
		            'facebook'  => '',
	    	        'twitter'   => '',
	        	    'google'    => '',
					'linkedin'  => '',
					'pinterest' => '',
					'dribbble'  => '',
					'vimeo'     => '',
					'behance'   => '',
					'lastfm'    => '',
					'instagram' => '',
					'evernote'  => '',
					'skype'     => '',
					'envato'    => ''
	    	    	)
	        	),	
			
			array(
				'id'=>'ps_footer_copyright',
				'type' => 'editor',
				'title' => __('Footer Copyright Text', 'prodigystudio'), 
				'subtitle' => __('You can use the following shortcodes in your footer text: [copyright] [theme-credit] [wp-url] [site-url] [theme-url] [login-url] [logout-url] [site-name] [site-tagline] [current-year]', 'prodigystudio'),
				'default' => '[copyright] [current-year] [site-name] [theme-credit]',
			),
			
			array(
				'id' => 'ps_footer_bg',
				'type' => 'background',
				'title' => __('Footer Background','prodigystudio'),
				'description' => __('Use this option to customize the background of the footer','prodigystudio'),
				'background-size' => false,
				'default' => array(
					'background-color' => '#f6f7f9',				
					),
				'output' => array('footer .footer-content')
			),
			array(
            'id'=>'ps_footer_layout',
            'type' => 'image_select',
            'compiler' => false,
            'title' => __('Footer Widget Areas', 'webincode'), 
            'subtitle' => __('Select how many footer widget areas you want to display.', 'webincode'),
            'options' => array(
					'0' => array('alt' => 'None Column Layout', 'img' => ReduxFramework::$_url.'options/img/footer-widgets-0.png'),	
					'1' => array('alt' => 'One Columns Layout', 'img' => ReduxFramework::$_url.'options/img/footer-widgets-1.png'),
                    '2' => array('alt' => 'Two Columns Layout', 'img' => ReduxFramework::$_url.'options/img/footer-widgets-2.png'),
					'3' => array('alt' => 'Three Columns Layout', 'img' => ReduxFramework::$_url.'options/img/footer-widgets-3.png'),
					'4' => array('alt' => 'Four Columns Layout', 'img' => ReduxFramework::$_url.'options/img/footer-widgets-4.png'),
                    
                ),
            'default' => '4',
            ),
			
			array(
				'id'=>'ps_arrow_top',
				'type' => 'switch', 
				'title' => __('Arrow scroll to Top', 'prodigystudio'),
				'subtitle' => __('Enable/Disable arrow scroll to top in footer', 'prodigystudio'),
				'default'  => true
            ),
			
			
			
		),
	
	);	 
	
	
	


	if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
	    $tabs['docs'] = array(
			'icon' => 'el-icon-book',
			    'title' => __('Documentation', 'prodigystudio'),
	        'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
	    );
	}

	global $ReduxFramework;
	$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

	// END Sample Config
	}
	add_action('init', 'redux_init');
endif;

/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
if ( !function_exists( 'redux_add_another_section' ) ):
	function redux_add_another_section($sections){
	    //$sections = array();
	    $sections[] = array(
	        'title' => __('Section via hook', 'prodigystudio'),
	        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'prodigystudio'),
			'icon' => 'el-icon-paper-clip',
			    // Leave this as a blank section, no options just some intro text set above.
	        'fields' => array()
	    );

	    return $sections;
	}
	add_filter('redux/options/redux_demo/sections', 'redux_add_another_section');
	// replace redux_demo with your opt_name
endif;
/**

	Filter hook for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
if ( !function_exists( 'redux_change_framework_args' ) ):
	function redux_change_framework_args($args){
	    //$args['dev_mode'] = true;
	    
	    return $args;
	}
	add_filter('redux/options/redux_demo/args', 'redux_change_framework_args');
	// replace redux_demo with your opt_name
endif;
/**

	Filter hook for filtering the default value of any given field. Very useful in development mode.

**/
if ( !function_exists( 'redux_change_option_defaults' ) ):
	function redux_change_option_defaults($defaults){
	    $defaults['str_replace'] = "Testing filter hook!";
	    
	    return $defaults;
	}
	add_filter('redux/options/redux_demo/defaults', 'redux_change_option_defaults');
	// replace redux_demo with your opt_name
endif;

/** 

	Custom function for the callback referenced above

 */
if ( !function_exists( 'redux_my_custom_field' ) ):
	function redux_my_custom_field($field, $value) {
	    print_r($field);
	    print_r($value);
	}
endif;

/**
 
	Custom function for the callback validation referenced above

**/
if ( !function_exists( 'redux_validate_callback_function' ) ):
	function redux_validate_callback_function($field, $value, $existing_value) {
	    $error = false;
	    $value =  'just testing';
	    /*
	    do your validation
	    
	    if(something) {
	        $value = $value;
	    } elseif(something else) {
	        $error = true;
	        $value = $existing_value;
	        $field['msg'] = 'your custom error message';
	    }
	    */
	    
	    $return['value'] = $value;
	    if($error == true) {
	        $return['error'] = $field;
	    }
	    return $return;
	}
endif;
/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
if ( !function_exists( 'redux_test_compiler' ) ):
	function redux_test_compiler($options, $css) {
		echo "<h1>The compiler hook has run!";
		//print_r($options); //Option values
		print_r($css); //So you can compile the CSS within your own file to cache
	    $filename = dirname(__FILE__) . '/avada' . '.css';

			    global $wp_filesystem;
			    if( empty( $wp_filesystem ) ) {
			        require_once( ABSPATH .'/wp-admin/includes/file.php' );
			        WP_Filesystem();
			    }

			    if( $wp_filesystem ) {
			        $wp_filesystem->put_contents(
			            $filename,
			            $css,
			            FS_CHMOD_FILE // predefined mode settings for WP files
			        );
			    }

	}
	//add_filter('redux/options/redux_demo/compiler', 'redux_test_compiler', 10, 2);
	// replace redux_demo with your opt_name
endif;


/**

	Remove all things related to the Redux Demo mode.

**/
if ( !function_exists( 'redux_remove_demo_options' ) ):
	function redux_remove_demo_options() {
		
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
		}

		// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
		remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	

	}
	//add_action( 'redux/plugin/hooks', 'redux_remove_demo_options' );	
endif;
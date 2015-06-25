<?php 
/**
 * Themes scripts
 *
 * Scripts that are used in the theme, loads only when it is need.
 *
 *
 */

if ( !function_exists('ps_load_scripts') ) :
	function ps_load_scripts() {
		
		wp_enqueue_script('jquery'); // load the jquery library
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'));
		if(is_singular()) wp_enqueue_script( 'comment-reply' );

		wp_enqueue_script('ps-loader', get_template_directory_uri() . '/js/jquery.queryloader2.min.js', array('jquery'), '1.3',true);
		wp_enqueue_script('ps-smart-menu', get_template_directory_uri() . '/js/jquery.smartmenus/jquery.smartmenus.min.js', array('jquery'), '1.3',true);
		wp_enqueue_script('jquery-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.3',true);		
		wp_enqueue_script('jquery-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array('jquery'), '1.3',true);
		wp_enqueue_script('jquery-fancybox-media', get_template_directory_uri() . '/js/jquery.fancybox-media.js', array('jquery'), '1.3',true);
		wp_enqueue_script('jquery-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), '1.3',true);
		wp_enqueue_script('maleo-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.3',true);		
		//wp_enqueue_script('jquery-retina', get_template_directory_uri() . '/js/jquery.retina.js', array('jquery'), '1.3',true);		
		
		wp_enqueue_script('player', get_template_directory_uri() . '/js/jquery.player.js', array('jquery'), '1.1.3',true);
		
		wp_register_script('ps-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array('jquery'), '1.3',true);
		wp_register_script('google-map-api-js', 'http://maps.google.com/maps/api/js?sensor=true',true);
		wp_register_script('gmaps', get_template_directory_uri() . '/js/jquery.maps.js', array('jquery'), '1.3',true);
		wp_register_script('maleo-gmaps', get_template_directory_uri() . '/js/maleo-maps.js', array('jquery'), '1.3',true);
		wp_register_script('ps-parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array('jquery'), '1.1.3',true);

		wp_register_script('jquery-responsivetabs', get_template_directory_uri() . '/js/jquery.easyResponsiveTabs.js', array('jquery'), '1.3',true);
		
		wp_enqueue_script('jquery-easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.js', array('jquery'), '1.3',true);
		wp_enqueue_script('prettify', get_template_directory_uri() . '/js/prettify.js', array('jquery'), '1.3',true);
		wp_enqueue_script('ps-countto', get_template_directory_uri() . '/js/jquery.countTo.js', array('jquery'), '1.1.3',true);				
		
		wp_enqueue_script('ps-maleo', get_template_directory_uri() . '/js/maleo.js', array('jquery'), '1.3',true);
		
	}
endif;

if (!function_exists('ps_js_vars')) :
	function ps_js_vars() {
	global $ps_opts;
	if(isset($ps_opts['ps_page_loader']) && $ps_opts['ps_page_loader'] != '0') { $pagePreloader = 'true';} else {$pagePreloader = 'false';}
	$customColor = $ps_opts['ps_custom_style'];
	$colorScheme = $ps_opts['ps_theme_style'];	
	$bodyBack =  array(
		'default.css'      => '#36c1c8',
		'blue.css'         => '#3498db',
		'grass.css'        => '#8bc34a',
		'gray.css'         => '#95a5a6',
		'green.css'        => '#36c1c8',
		'green-light.css'  => '#86dade',
		'indigo.css'       => '#8c9eff',
		'lime.css'         => '#cddc39',
		'orange.css'       => '#f78f39',
		'purple.css'       => '#ea80fc',
		'red.css'          => '#ed4f4f',
		'white.css'        => '#f5f6f8',
		'yellow.css'       => '#f1c40f',
		'yellow-light.css' => '#f7dc6f',
		'custom.css' => $customColor
	);
	 ?>	
<script type='text/javascript'>
	var enablePreloader = <?php echo $pagePreloader; ?>;
	var PreloaderBackground = '<?php echo $bodyBack[$colorScheme]; ?>';
	var logo_src = '<?php if(!empty($ps_opts['ps_custom_logo']['url'])) {echo $ps_opts['ps_custom_logo']['url'];   } else { echo get_template_directory_uri().'/img/logo.png'; } ?>';
	var logo_retina = '<?php if(!empty($ps_opts['ps_custom_logo_retina']['url'])) {echo $ps_opts['ps_custom_logo_retina']['url'];   } else { echo get_template_directory_uri().'/img/logo@2x.png'; } ?>';
	var logo_sticky_src = '<?php if(!empty($ps_opts['ps_custom_logo_sticky']['url'])) {echo $ps_opts['ps_custom_logo_sticky']['url'];   } else { echo get_template_directory_uri().'/img/logo-alternative.png'; } ?>';		
	var logo_sticky_retina = '<?php if(!empty($ps_opts['ps_custom_logo_sticky_retina']['url'])) {echo $ps_opts['ps_custom_logo_sticky_retina']['url'];   } else { echo get_template_directory_uri().'/img/logo-alternative@2x.png'; } ?>';		
</script>	
<?php	}
endif;


if ( !function_exists('ps_load_styles') ) :
	function ps_load_styles() {
		
		wp_enqueue_style('ps-reset', get_template_directory_uri().'/css/reset.css');

		/* --- Maleo Framework --- */
		
		wp_enqueue_style('ps-whhg', get_template_directory_uri().'/css/whhg.css');
		wp_enqueue_style('ps-social-icon', get_template_directory_uri().'/css/social-icon.css');
		wp_enqueue_style('ps-small-icon', get_template_directory_uri().'/css/small-icon.css');
		wp_enqueue_style('ps-flat-icon', get_template_directory_uri().'/css/flat-icon.css');		
		
		
		/* --- Maleo Component CSS --- */
		
		wp_enqueue_style('fancybox', get_template_directory_uri().'/css/fancybox.css');
		wp_enqueue_style('ps-menu', get_template_directory_uri().'/css/components/menu.css');
		wp_enqueue_style('ps-mediaplayer', get_template_directory_uri().'/css/components/mediaplayer.css');
	
		wp_enqueue_style('maleo-revsettings', get_template_directory_uri().'/js/rs-plugin/css/settings.css');		
		wp_enqueue_style('ps-revolution-responsive', get_template_directory_uri().'/css/revolution-responsive.css');	
		wp_enqueue_style('ps-widgets', get_template_directory_uri().'/css/widgets.css');				
	    wp_enqueue_style('ps-maleo', get_template_directory_uri().'/css/maleo.css');
		
		/* --- Style CSS --- */
		
		wp_enqueue_style('ps-style', get_template_directory_uri().'/css/style.css');

		/* --- Maleo Theme --- */
		global $ps_opts;
		$maleo_style = $ps_opts['ps_theme_style'];
		wp_enqueue_style('ps-theme-color', get_template_directory_uri().'/css/theme/'.$maleo_style);
		}
		
				 
		
endif;


/* Add woocommerce maleo style */
function wp_enqueue_woocommerce_style(){
	wp_register_style( 'maleo-woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'maleo-woocommerce' );
	}
}


if ( !function_exists('ps_load_custom_styles') ) :
	function ps_load_custom_styles() {
		
		global $ps_opts;		
		if(!empty($ps_opts['ps_custom_css'])) { 		
		$output = $ps_opts['ps_custom_css']; 
		echo "\n".'<style type="text/css">'.stripslashes($output).'</style>'."\n"; 				
		}
	}
endif;

if ( !function_exists('ps_load_footer_scripts') ) :
function ps_load_footer_scripts() {
		global $ps_opts;		
		if(!empty($ps_opts['ps_tracking_code'])) { 		
		$output = $ps_opts['ps_tracking_code']; 
		echo stripslashes($output) . "\n"; 
		
		}
	}
endif;
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');
	$current_page_URL = $_SERVER["REQUEST_URI"];
    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => $current_page_URL,
        'loadingmessage' => __('Sending user info, please wait...','prodigystudio')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}
function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}
if ( !is_admin() ) {
	add_action('wp_enqueue_scripts', 'ps_load_styles');	
    add_action('wp_enqueue_scripts', 'ps_load_scripts');
	add_action('wp_head', 'ps_load_custom_styles',155);
	add_action('wp_head', 'ps_js_vars',155);
	add_action('wp_footer', 'ps_load_footer_scripts');	
}

function ps_admin_js($hook) {	
		wp_enqueue_style('metabox-style', get_template_directory_uri().'/lib/assets/css/metabox-style.css');
		wp_enqueue_style('tinymce-style', get_template_directory_uri().'/framework/tinymce/tinymce.css');
		wp_enqueue_script('ps-megamenu', get_template_directory_uri() . '/lib/megamenu/megamenu.js', array('jquery'), '1.3',true);
}
add_action('admin_enqueue_scripts','ps_admin_js',10,1);
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );

?>
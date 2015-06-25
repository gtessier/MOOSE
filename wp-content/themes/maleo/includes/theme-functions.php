<?php 
/*===================================================================================
 * Themes function
 * Additional functions for theme goes in this file
 * =================================================================================*/


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

 
if (!function_exists('prodigystudio_setup')) {
	function prodigystudio_setup() {



	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in Header and Footer location.	
	register_nav_menu( 'ps_primary_menu', __( 'Primary','prodigystudio' ) );	
	}
	
	add_theme_support( 'post-formats', array(
		'video', 'audio', 'quote', 'gallery',
	));
	
	load_theme_textdomain( 'prodigystudio', get_template_directory() . '/languages' );
	
add_action( 'after_setup_theme', 'prodigystudio_setup' );
}
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return get_bloginfo('name') . ' | ' . get_bloginfo( 'description' );
  }
  return $title . get_bloginfo('name');
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'ps_vcSetAsTheme' );
function ps_vcSetAsTheme() {
	vc_set_as_theme();
}
// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function requireVcExtend(){
		require_once locate_template('/framework/vc_extend/ps-extend-vc.php');	
	}
	add_action('init', 'requireVcExtend',2);
}

function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
  if ($tag=='vc_row' || $tag=='vc_row_inner') {	  
  $class_string = str_replace('vc_row-fluid', '', $class_string);
  }
  if ($tag=='vc_column' || $tag=='vc_column_inner') {
    $class_string = preg_replace('/vc_col-sm-(\d{1,2})/', 'large-$1 medium-$1', $class_string);
  }
  if ($tag=='vc_column') {
    $class_string = preg_replace('/vc_span(\d{1,2})/', '', $class_string);
  }
  if ($tag=='vc_column' || $tag=='vc_column_inner') {
    $class_string = preg_replace('/wpb_wrapper(\d{1,2})/', '', $class_string);
  }

    
  
  return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);
function vc_theme_before_column_inner($atts, $content = null) {
   return '';
}

// Allow to add skype protocol
function ps_allow_skype_protocol( $protocols ){
    $protocols[] = 'skype';
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'ps_allow_skype_protocol' );


/*===================================================================================
* WOOCOMMERCE STUFF
* =================================================================================*/

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  1.0.0
 */
function prodigystudio_loop_columns() {
	return apply_filters( 'prodigystudio_loop_columns', 4 ); // 3 products per row
}

/**
 * Cart Fragments
 * Ensure cart contents update when products are added to the cart via AJAX
 * @param  array $fragments Fragments to refresh via AJAX
 * @return array            Fragments to refresh via AJAX
 */
if ( ! function_exists( 'prodigystudio_cart_link_fragment' ) ) {
	function prodigystudio_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		prodigystudio_cart_link();

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
/**
 * Related Products Args
 * @param  array $args related products args
 * @since 1.0.0
 * @return  array $args related products args
 */
function prodigystudio_related_products_args( $args ) {
	$args = apply_filters( 'prodigystudio_related_products_args', array(
		'posts_per_page' => 3,
		'columns'        => 3,
	) );

	return $args;
}

/**
 * Product gallery thumnail columns
 * @return integer number of columns
 * @since  1.0.0
 */
function prodigystudio_thumbnail_columns() {
	return intval( apply_filters( 'prodigystudio_product_thumbnail_columns', 4 ) );
}

/**
 * Products per page
 * @return integer number of products
 * @since  1.0.0
 */
function prodigystudio_products_per_page() {
	global $ps_opts;
	$shop_items = $ps_opts['ps_woo_front_items'];
	return intval( apply_filters( 'prodigystudio_products_per_page', $shop_items ) );
}

add_filter( 'woocommerce_product_thumbnails_columns', 	'prodigystudio_thumbnail_columns' );
add_filter( 'woocommerce_output_related_products_args', 'prodigystudio_related_products_args' );
add_filter( 'loop_shop_per_page', 						'prodigystudio_products_per_page' );
add_filter( 'loop_shop_columns', 						'prodigystudio_loop_columns' );




/*===================================================================================
* WP 2.9, 3.0 POST THUMBNAILS
* =================================================================================*/

if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');

//BLOG, PORTFOLIO AND GALLERY IMAGES	

	
	add_image_size('largeThumbPost', 620, 300, true);

	add_image_size('contentGalleryPost', 620, 400, true);
	add_image_size('portfolioGrid', 800, 800, array( 'center', 'center' ));
	add_image_size('portfolioGallery', 1200, 800, true);

	add_image_size('relatedThumbs', 240, 240, true);
	
	add_image_size('contentThumbPost', 960, 480, true);

	add_image_size('carouselThumbs', 500, 410, true);
	add_image_size('portfolioCarouselThumbs', 166, 158, true);
	add_image_size('boxesImages', 176, 176, true);
	add_image_size('annotationThumbs', 96, 96, true);
	
	
	add_image_size('relatedLoopThumb', 202, 110, true);
	add_image_size('clientsLogo', 160, 68, true);
	add_image_size('GalleryThumbsSlide', 60, 60, true);
	add_image_size('GallerySlide', 650, 490, true);

//PORTFOLIO LANDSCAPE IMAGES 

	add_image_size('thumbs-two-columns', 460, 270, true);
	add_image_size('thumbs-three-columns', 300, 200, true);
	add_image_size('thumbs-four-columns', 220, 150, true);

//TABS IMAGES
	add_image_size('tabsLoopThumb', 60, 60, true);	

}

/*add_filter('get_avatar','change_avatar_css');
function change_avatar_css($class) {
	$class = str_replace("class='avatar", "class='mo-animate img-shadow img-border", $class) ;
return $class;
}*/

function get_gravatar_url( $email ) {
    $hash = md5( strtolower( trim ( $email ) ) );
    return 'http://gravatar.com/avatar/' . $hash;
}

add_filter('manage_testi_columns', 'ps_posts_columns_id', 5);
add_action('manage_posts_custom_column', 'ps_posts_custom_id_columns', 5, 2);
function ps_posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID','prodigystudio');
    return $defaults;
}
function ps_posts_custom_id_columns($column_name, $id){
        if($column_name === 'wps_post_id'){
                echo $id;
    }
}


function ps_parse_multi_attribute( $value, $default = array() ) {
	$result = $default;
	$params_pairs = explode( '|', $value );
	foreach ( $params_pairs as $pair ) {
		$param = preg_split( '/\:/', $pair );
		if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
			$result[$param[0]] = rawurldecode( $param[1] );
		}
	}
	return $result;
}
function ps_build_link( $value ) {
	return ps_parse_multi_attribute( $value, array( 'url' => '', 'title' => '', 'target' => '' ) );
}


// display the login message in the header
if (!function_exists('ps_login_head')) {
    function ps_login_head() {		
        if (is_user_logged_in()) :
			global $current_user, $facebook;
			$current_user = wp_get_current_user();
			if ( 'fb-' == substr( $current_user->user_login, 0, 3 ) ) {
				$logout_url = $facebook->getLogoutUrl( array( 'next' => wp_logout_url( home_url() ) ) );
        $display_user_name = $current_user->display_name;
			} else {
				$current_page_URL = $_SERVER["REQUEST_URI"];
				$logout_url = wp_logout_url($current_page_URL);
        $display_user_name = $current_user->user_login;
      }
			?>
         <li><a><?php _e('Hi, ','prodigystudio'); echo $display_user_name; ?></a></li>   
		<li> <a class="signup" href="<?php echo $logout_url; ?>"><i class="icon-off"></i> <?php _e('Log out','webincode'); ?></a> </li>
		<?php else : ?>
			<li><a class="login" href="#"><i class="icon-user"></i> <?php _e('Log in','webincode'); ?></a></li>
            <?php global $ps_opts; if(isset($ps_opts['ps_enable_signup'])) { $showSignupLink = $ps_opts['ps_enable_signup'];} else { $showSignupLink = '0'; }; 
		          if($showSignupLink == '1') {	
			?>
            <li><a class="signup" href="<?php echo wp_registration_url(); ?>"><?php _e('Sign Up','prodigystudio'); ?></a></li>
            <?php }; ?>
        <?php endif;

    }
}



// CUSTOM BUTTON READ MORE

function ps_the_read_more() {	
	global $post;
	if (strpos($post->post_content, '<!--more-->')) :
		$the_read_more = '<a class="button small green round" href="'.get_permalink().'">';
		$the_read_more .= ''.__('read more','prodigystudio').'';
		$the_read_more .= '</a>';		
		echo $the_read_more;
	endif;
}


if(!function_exists('ps_no_menu_message')) {
	function ps_no_menu_message() {

	return '<div class="alert-box yellow  mo-animate" data-animate="bounceIn"><i class="icon-warning-sign"></i>Please set your main navigation menu on the <strong><a href="'.get_admin_url().'nav-menus.php">Appearance > Menus</a></strong> page.<a data-component="alert" href="#" class="close">&times;</a></div>';	

	}
}

if ( !function_exists( 'prodigystudio_comment' ) ) :
function prodigystudio_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">	    
		<p><?php _e( 'Pingback:', 'prodigystudio' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'prodigystudio' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    	<article id="comment-<?php comment_ID(); ?>" class="comment mo-animate" data-animate="fadeInDown">
		<div class="avatar"><?php echo get_avatar( $comment, 80 );?></div>
        <div class="comment-text" >
			<h5><?php echo get_comment_author(); ?></h5>
		    <small><?php echo get_comment_date(); echo ' '; echo get_comment_time(); ?></small>
		    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'prodigystudio' ), 'after' => ' ', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	    <?php comment_text(); ?>
  </div>
        </article>
	<?php
		break;
	endswitch; // end comment_type check
}
endif;



/**
 *
 * Code used to shortcode buttons in TinyMCE editor
 *
 **/
function ps_add_tinymce_buttons() {
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
    // verify the post type
	// check if WYSIWYG is enabled
		add_filter("mce_external_plugins", "ps_add_tinymce_plugin");
		add_filter('mce_buttons', 'ps_register_shortcode_buttons');
}
function ps_add_tinymce_plugin($plugin_array) {
   	$plugin_array['PSWPShortcodes'] = get_template_directory_uri() . '/framework/tinymce/editor_plugin.js';
   	return $plugin_array;
}

function ps_register_shortcode_buttons($buttons) {
   array_push($buttons, "ps_style","ps_lists","ps_button","ps_table");
   return $buttons;
}
add_action('admin_init', 'ps_add_tinymce_buttons');




/*===================================================================================
 * prodigystudio Breadcrumbs Function
 * =================================================================================*/

if(!function_exists('ps_get_breadcrumbs')) {
function ps_get_breadcrumbs($id, $level, $title='', $linktitle='', $golink='') {    
   $pid = null;
    $parent = 0;
    if($id !== null) {
		 $pid = get_post($id);
        $parent = $pid->post_parent;		
    }
    if($parent != 0)
    { ps_get_breadcrumbs($parent, $level+1);    
    } else {echo '<li><a href="'.home_url().'">'.__('Home','prodigystudio').'</a></li>';}  
    if($level == 0)
    { if($linktitle != '') { echo '<li><a href="'.$golink.'"> '.$linktitle.'</a></li>'; }        
        if($title == '') { echo '<li class="active"><a href="'.get_permalink($pid->ID).'">'.$pid->post_title.'</a></li>';
        } else { echo '<li class="active"><a href="'.$golink.'">'.$title.'</a></li>'; }
    } else {echo '<li><a href="'.get_permalink($pid->ID).'" class="link">'.$pid->post_title.'</a></li>'; }     
	}
}

/*===================================================================================
 * prodigystudio Main Title Function
 * =================================================================================*/
if (!function_exists('prodigystudio_main_title')) :

	function prodigystudio_main_title() {
		global $post; 										
		$category = get_the_category($post->ID);
		if(is_category()): single_cat_title();
		elseif(is_tax() ): global $wp_query; $term = $wp_query->get_queried_object(); $title = $term->name;	echo $title;								
		elseif(is_single() && !empty($category['0']) ) : echo $category['0']->cat_name; 
		elseif(is_404() ) : _e ('404 page','prodigystudio');
		else: wp_title(''); endif;	

}
endif;

/*===================================================================================
 * Post Meta Function
 * =================================================================================*/

if (!function_exists('prodigystudio_entry_meta')) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 */
function prodigystudio_entry_meta() {
	
	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'prodigystudio' ), get_the_author() ) ),
		get_the_author()
	);
	
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'prodigystudio' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	
	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'prodigystudio' ) );
	
	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	$utility_text = __( '<span class="entry-time"> %3$s </span> <span class="divider-c">|</span> by <span class="author">%1$s</span>' , 'prodigystudio' );
	
	printf(
		$utility_text,
		$author,
		$categories_list,
		$date,
		$tag_list
	);
	
}
endif;


/*===================================================================================
 * ProdigyStudio Related Blog Posts
 * =================================================================================*/

if(!function_exists('prodigystudio_related_post')) {
	function prodigystudio_related_post() {
	
	global $post;

	$relatedType = get_post_meta( $post->ID, '_ps_related_posts', true );
	$relatedTitle = get_post_meta( $post->ID, '_ps_related_title', true );
	if(!$relatedTitle) {$relatedTitle = __('Related Posts','prodigystudio');}

	if( $relatedType != 'No' && $relatedType == 'related_tag') :	

		global $post;				
		$tags = wp_get_post_tags($post->ID);  
		$tagids = array();
	
		if ($tags) {
			$tagcount = count($tags);
				for ($i = 0; $i < $tagcount; $i++) {
					$tagids[$i] = $tags[$i]->term_id;
				} 		
		$args = array(
		'tag__in' => $tagids,
		'post__not_in' => array($post->ID),
		'showposts' => '4',					
		'posts_per_page' =>  -1,
		'ignore_sticky_posts'=> 1			
	);
	
		$the_query = null;
		$the_query = new wp_query($args);
	if( $the_query->have_posts() ) :					
		echo '<h4 class="heading-line"><span>'.$relatedTitle.'</span></h4>
  			  <div id="content-carousel" class="owl-carousel">'; 

	while ($the_query->have_posts()) : $the_query->the_post();
	
		$thumb = '';
		$charlimit = '60';
		$author = get_the_author_meta('user_nicename');
		$short_title = ps_short_title('...',23);
		$num_comments = get_comments_number();
			
		$content = get_the_content();
		$content = strip_tags($content); 
		$content = substr($content, 0, $charlimit).' ...';
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'carouselThumbs' );
		$full_size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );

	?>
	<div class="item cs-style-1">
      <figure>
        <div> <img src="<?php echo $thumb[0]; ?>" alt="<?php the_title(); ?>" class="img-radius"> </div>
        <figcaption> 
        	<a class="fancybox" href="<?php echo $full_size[0]; ?>" data-fancybox-group="gallery" title="<?php the_title(); ?>"> <i class="icon-search"></i> </a> 
            <a href="<?php the_permalink(); ?>"> <i class="icon-link"></i> </a> 
        </figcaption>
      </figure>
      <a href="<?php the_permalink() ?>"><h5><?php echo $short_title; ?></h5></a>
      <p><?php echo $content; ?></p>
      <ul class="post-info no-bullet">
        <li><i class="icon-clockalt-timealt"></i><?php echo mysql2date('M d, Y',get_post()->post_date); ?></li>
        <li><i class="icon-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php echo $author; ?></a></li>
        <li><i class="icon-comment"></i><a href="<?php echo get_comments_link(); ?>"><?php echo $num_comments; ?></a></li>
      </ul>
    </div>
    
		<?php endwhile; echo '</div>';	
			wp_reset_query(); endif;  };
			
		elseif($relatedType != 'No' && $relatedType == 'related_category'):

		global $post;
		$categories = get_the_category($post->ID);
		if ($categories) {
			$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	$args=array(
	'category__in' => $category_ids,
	'post__not_in' => array($post->ID),
	'showposts'=> '4', // Number of related posts that will be shown.
	'ignore_sticky_posts'=>1
	);
	
	$the_query = null;
	$the_query = new wp_query($args);
	if( $the_query->have_posts() ) :					
	
	echo '<h4 class="heading-line"><span>'.$relatedTitle.'</span></h4>
  		  <div id="content-carousel" class="owl-carousel">';
			  
	while ($the_query->have_posts()) : $the_query->the_post();	
		
		$thumb = '';
		$charlimit = '60';
		$author = get_the_author_meta('user_nicename');
		$short_title = ps_short_title('...',23);
		$num_comments = get_comments_number();
			
		$content = get_the_content();
		$content = strip_tags($content); 
		$content = substr($content, 0, $charlimit).' ...';
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'carouselThumbs' );
		$full_size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );
	
	?>
    
	<div class="item cs-style-1">
      <figure>
        <div> <img src="<?php echo $thumb[0]; ?>" alt="<?php the_title(); ?>" class="img-radius"> </div>
        <figcaption> 
        	<a class="fancybox" href="<?php echo $full_size[0]; ?>" data-fancybox-group="gallery" title="<?php the_title(); ?>"> <i class="icon-search"></i> </a> 
            <a href="<?php the_permalink(); ?>"> <i class="icon-link"></i> </a> 
        </figcaption>
      </figure>
      <a href="<?php the_permalink() ?>"><h5><?php echo $short_title; ?></h5></a>
      <p><?php echo $content; ?></p>
      <ul class="post-info no-bullet">
        <li><i class="icon-clockalt-timealt"></i><?php echo mysql2date('M d, Y',get_post()->post_date); ?></li>
        <li><i class="icon-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php echo $author; ?></a></li>
        <li><i class="icon-comment"></i><a href="<?php echo get_comments_link(); ?>"><?php echo $num_comments; ?></a></li>
      </ul>
    </div>
        
        
	<?php endwhile; echo '</div>';  	
	wp_reset_query(); endif;  
	}
	else {
		}
	endif;
	
	} 
}//end of function

/*===================================================================================
 * ProdigyStudio Related Portfolio Posts
 * =================================================================================*/
 
if(!function_exists('ps_related_portfolio')) {
	function ps_related_portfolio() {
	
	global $post;
	
	$project_related = get_post_meta($post->ID,'_ps_related_projects',true);
	$project_related_label = get_post_meta($post->ID,'_ps_related_label',true);
	if($project_related_label == '') {$project_related_label = __('Related Projects','prodigystudio');}	
	$custom_terms = wp_get_post_terms($post->ID, 'portfolios');	
	
	
	
	if( $custom_terms ){
    $tax_query = array();
	  if( count( $custom_terms > 1 ) )
        $tax_query['relation'] = 'OR' ;
       foreach( $custom_terms as $custom_term ) {

        $tax_query[] = array(
            'taxonomy' => 'portfolios',
            'field' => 'slug',
            'terms' => $custom_term->slug,
        );

    }
    $args = array( 'post_type' => 'portfolio',
                    'posts_per_page' => 4,
					'post__not_in' => array($post->ID),
                    'tax_query' => $tax_query );

    // finally run the query
    $loop = new WP_Query($args);
	$delay = 0;
    if( $loop->have_posts() ) { 
		
	
	?>
    
   <div class="mo-contentfull separator-inner"><div class="row"><hr></div></div>
   
   <section class="mo-content">
    <div class="row"> 
    <div class="large-12 columns">
    <!--span class="heading-line mo-animate" data-animate="bounceIn"></span>
    <h4 class="mo-animate" data-animate="fadeInLeft"><?php echo $project_related_label; ?></h4-->    
    <ul class="portfolio-container large-block-grid-4 medium-block-grid-4 medium-potrait-block-grid-2 small-block-grid-1">

    <?php while( $loop->have_posts() ) : $loop->the_post(); 
	
	
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'portfolioGrid' );
	$full_size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );
	
	?>
    <li class="mo-animate" data-animate="bounceIn" <?php if($delay != '0') echo 'data-delay="'.$delay.'"' ?> >
        <div class="mo-caption move">
	        <img src="<?php echo $thumb[0]; ?>" alt="">
    	    <div class="mask"></div>
            <div class="content">
                <a href="<?php echo $full_size[0]; ?>" class="preview fancybox" data-fancybox-group="gallery" title="<?php the_title(); ?>">
	                <i class="icon-search"></i>
                </a>
    	        <a href="<?php the_permalink(); ?>" class="permalink white"><i class="icon-link"></i></a>
            </div>
        </div>              
    </li>
        
        <?php 
		$delay +=300;
        endwhile; ?>
        
     </ul>
    </div>
  </div>
</section>
    <?php } 

	    wp_reset_query();
	
		}
	}
}
 
 
 
 

/*===================================================================================
 * prodigystudio limit excerpt and content
 * =================================================================================*/

if(!function_exists('ps_excerpt')) {
	function ps_excerpt($limit) {
	  $excerpt = explode(' ', get_the_excerpt(), $limit);
	  if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	  } else {
		$excerpt = implode(" ",$excerpt);
	  }	
	  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	  return $excerpt;
	}
}
if(!function_exists('ps_content')){
	function ps_content($limit) {
		$content = explode(' ', get_the_content(), $limit);
			if (count($content)>=$limit) {
				array_pop($content);
				$content = implode(" ",$content).'...';
			} else {
				$content = implode(" ",$content);
			}	
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}
}
/*===================================================================================
 * prodigystudio Get the Src of the image
 * =================================================================================*/

if(!function_exists('ps_get_image_src')) {
	function ps_get_image_src($size='full') {
		global $post;		
		$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size, false, '');
		$thumb = get_the_post_thumbnail($post->ID, $size);
		$pattern= "/(?<=src=['|\"])[^'|\"]*?(?=['|\"])/i";
		preg_match($pattern, $thumb, $thePath);
		if(isset($thePath[0])) {$theSrc = $thePath[0];} else {$theSrc = '';}		
		return $theSrc;
	}	
}

function ps_short_title($after = '', $length) {
	$mytitle = get_the_title();
	if ( strlen($mytitle) > $length ) {
	$mytitle = substr($mytitle,0,$length);
	return $mytitle . $after;
	} else {
	return $mytitle;
	}
}

/*===================================================================================
 * Share This Post
 * =================================================================================*/

if (!function_exists('prodigystudio_share_this')) {
	function prodigystudio_share_this(){
		global $post;
		$enableShareThis = get_post_meta( $post->ID, '_ps_share_this', true );
		if($enableShareThis == 'yes') {
?>
<div class="blog-share">
    <ul class="social-icon radius bg-light float">
        <li class="mo-animate" data-animate="bounceIn"><a class="social-facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>"></a></li>
        <li class="mo-animate" data-animate="bounceIn" data-delay="300"><a class="social-twitter" href="http://twitter.com/home?status=<?php the_permalink(); ?>"></a></li>
 <li class="mo-animate" data-animate="bounceIn" data-delay="600"><a class="social-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a></li>
        <li class="mo-animate" data-animate="bounceIn" data-delay="900"><a class="social-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo ps_get_image_src(); ?>&description=<?php echo get_the_excerpt(); ?>" class="pin-it-button" count-layout="horizontal"></a></li>
        <li class="mo-animate" data-animate="bounceIn" data-delay="1200"><a class="social-stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"></a></li>        
        <li class="mo-animate" data-animate="bounceIn" data-delay="1500"><a class="social-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>&amp;source=LinkedIn"></a></li>
        <li class="mo-animate" data-animate="bounceIn" data-delay="1800"><a class="social-rss" href="<?php bloginfo_rss('rss2_url'); ?>"></a></li>
    </ul>
</div>
<?php	}
	}

}

/*===================================================================================
 * Author Info
 * =================================================================================*/

if(!function_exists('prodigystudio_author_info')) {
function prodigystudio_author_info() { 
	global $post;
	$showAuthorInfo = get_post_meta( $post->ID, '_ps_post_author', true );
	if($showAuthorInfo == 'yes') {

?>
<!--AUTHOR INFO-->
<div class="blog-author mo-animate" data-animate="fadeInDown">
    <h6><span><?php _e('About the Author','prodigystudio'); ?></span></h6>
		<img class="mo-animate img-shadow img-border" data-animate="bounceIn" src="<?php echo get_gravatar_url( get_the_author_meta('email') ); ?>" />
	<h5><?php the_author_link(); ?></h5>
    <ul class="social-icon">
        <?php
    $facebook_profile = get_the_author_meta( 'facebook_profile' );
		if ( $facebook_profile && $facebook_profile != '' ) {
			echo '<li><a href="' . esc_url($facebook_profile) . '"><i class="social-facebook"></i>Facebook</a></li>';
		}
	$twitter_profile = get_the_author_meta( 'twitter_profile' );
		if ( $twitter_profile && $twitter_profile != '' ) {
			echo '<li><a href="' . esc_url($twitter_profile) . '"><i class="social-twitter"></i>Twitter</a></li>';
		}
	$google_profile = get_the_author_meta( 'google_profile' );
		if ( $google_profile && $google_profile != '' ) {
			echo '<li><a href="' . esc_url($google_profile) . '"><i class="social-google"></i>Google+</a></li>';
		}
	?>
    </ul>
    <p class="text-overflow"><?php the_author_meta('description'); ?></p>
</div>
<!--//END OF AUTHOR INFO-->
<?php	
		} //endif Showauthor = yes

	}
}

/*===================================================================================
 * Add Author Links
 * =================================================================================*/

function ps_add_to_author_profile($contactmethods) {
	
	$contactmethods['facebook_profile'] = __('Facebook Profile URL','prodigystydio');
	$contactmethods['twitter_profile'] = __('Twitter Profile URL','prodigystydio');
	$contactmethods['google_profile'] = __('Google Profile URL','prodigystydio');
	
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'ps_add_to_author_profile', 10, 1);
 ?>
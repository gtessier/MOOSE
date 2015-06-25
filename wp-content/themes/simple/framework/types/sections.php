<?php
/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types - Sections */
/*-----------------------------------------------------------------------------------*/
function wt_register_section_post_type(){
	// Rewriting Permalink Slug
	$permalink_slug = trim(wt_get_option('section','permalink_slug'));
	if ( empty($permalink_slug) ) {
		$permalink_slug = 'section';
	}
	register_post_type('wt_section', array(
		'labels' => array(
			'name' => esc_html_x('Sections', 'post type general name', 'wt_admin' ),
			'singular_name' => esc_html_x('Sections', 'post type singular name', 'wt_admin' ),
			'add_new' => esc_html_x('Add New', 'wt_section', 'wt_admin' ),
			'add_new_item' => esc_html__('Add New Section', 'wt_admin' ),
			'edit_item' => esc_html__('Edit Section', 'wt_admin' ),
			'new_item' => esc_html__('New Section', 'wt_admin' ),
			'view_item' => esc_html__('View Section', 'wt_admin' ),
			'search_items' => esc_html__('Search Section', 'wt_admin' ),
			'not_found' =>  esc_html__('No section found', 'wt_admin' ),
			'not_found_in_trash' => esc_html__('No section found in Trash', 'wt_admin' ), 
			'parent_item_colon' => '',
			'menu_name' => esc_html__('Sections', 'wt_admin' ),
		),
		'singular_label' => esc_html__('wt_section', 'wt_admin' ),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		//'menu_position' => 20,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor'),
		'has_archive' => false,
		'rewrite' => array( 'slug' => $permalink_slug, 'with_front' => true, 'pages' => true, 'feeds'=>false ),
		'query_var' => false,
		'can_export' => true,
		'show_in_nav_menus' => true,
	));

	//register taxonomy for portfolio
	/*register_taxonomy('wt_portfolio_category','wt_portfolio',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => esc_html_x( 'Portfolio Categories', 'taxonomy general name', 'wt_admin' ),
			'singular_name' => esc_html_x( 'Portfolio Category', 'taxonomy singular name', 'wt_admin' ),
			'search_items' =>  esc_html__( 'Search Categories', 'wt_admin' ),
			'popular_items' => esc_html__( 'Popular Categories', 'wt_admin' ),
			'all_items' => esc_html__( 'All Categories', 'wt_admin' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => esc_html__( 'Edit Portfolio Category', 'wt_admin' ), 
			'update_item' => esc_html__( 'Update Portfolio Category', 'wt_admin' ),
			'add_new_item' => esc_html__( 'Add New Portfolio Category', 'wt_admin' ),
			'new_item_name' => esc_html__( 'New Portfolio Category Name', 'wt_admin' ),
			'separate_items_with_commas' => esc_html__( 'Separate Portfolio category with commas', 'wt_admin' ),
			'add_or_remove_items' => esc_html__( 'Add or remove portfolio category', 'wt_admin' ),
			'choose_from_most_used' => esc_html__( 'Choose from the most used portfolio category', 'wt_admin' ),
			'menu_name' => esc_html__( 'Categories', 'wt_admin' ),
		),
		'public' => false,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_tagcloud' => false,
		'query_var' => true,
		'rewrite' => false,
		
	));*/
	
	
}
add_action('init','wt_register_section_post_type',0);

function wt_section_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'wt_section' ) {
		global $wp_query;
		$wp_query->is_home = false;
	}
	if ( get_query_var( 'taxonomy' ) == 'wt_section_category' ) {
		global $wp_query;
		$wp_query->is_404 = false;
		$wp_query->is_tax = true;
		$wp_query->is_archive = true;
	}
}
add_action( 'template_redirect', 'wt_section_context_fixer' );
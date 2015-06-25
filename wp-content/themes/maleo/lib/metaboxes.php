<?php
/**
 * @category prodigystudio Theme
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'prodigystudio_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
//add_filter('cmb_icomoon', 'cmb_icomoon');
add_filter( 'cmb_render_imag_select_taxonomy', 'imag_render_imag_select_taxonomy', 10, 2 );
function imag_render_imag_select_taxonomy( $field, $meta ) {

    wp_dropdown_categories(array(
            'show_option_none' => __( "All", 'prodigystudio' ),
            'hierarchical' => 1,
            'taxonomy' => $field['taxonomy'],
            'orderby' => 'name', 
            'hide_empty' => 0, 
            'name' => $field['id'],
            'selected' => $meta  

        ));
    if ( !empty( $field['desc'] ) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';
}
add_filter( 'cmb_render_imag_select_category', 'imag_render_imag_select_category', 10, 2 );
function imag_render_imag_select_category( $field, $meta ) {

    wp_dropdown_categories(array(
            'show_option_none' => __( "All Blog Posts", 'prodigystudio' ),
            'hierarchical' => 1,
            'taxonomy' => 'category',
            'orderby' => 'name', 
            'hide_empty' => 0, 
            'name' => $field['id'],
            'selected' => $meta  

        ));
    if ( !empty( $field['desc'] ) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';

}
add_filter( 'cmb_render_imag_select_sidebars', 'imag_render_imag_select_sidebars', 10, 2 );

function imag_render_imag_select_sidebars( $field, $meta ) {
	
	global $vir_sidebars;	
	 echo '<select name="', $field['id'], '" id="', $field['id'], '">';
  foreach ($vir_sidebars as $side) {
    echo '<option value="', $side['id'], '"', $meta == $side['id'] ? ' selected="selected"' : '', '>', $side['name'], '</option>';
  }
  echo '</select>';
	
    if ( !empty( $field['desc'] ) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';

}
function prodigystudio_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ps_';

	$meta_boxes[] = array(
				'id'         => 'post_metabox',
				'title'      => __("Post Options", 'prodigystudio'),
				'pages'      => array( 'post',), // Post type
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
			
			array(
				'name' => __('Share Box', 'prodigystudio'),
				'desc' => __('Display the share box?', 'prodigystudio'),
				'id'   => $prefix . 'share_this',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('Yes', 'prodigystudio'), 'value' => 'yes', ),
					array( 'name' => __('No', 'prodigystudio'), 'value' => 'no', ),
					
				),
			),
			array(
				'name' => __('Author Info', 'prodigystudio'),
				'desc' => __('Display the author info box?', 'prodigystudio'),
				'id'   => $prefix . 'post_author',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('Yes', 'prodigystudio'), 'value' => 'yes', ),
					array( 'name' => __('No', 'prodigystudio'), 'value' => 'no', ),
					
				),
			),	
			/*array(
				'name' => __('Related Posts', 'prodigystudio'),
				'desc' => __('Display related posts?', 'prodigystudio'),
				'id'   => $prefix . 'related_posts',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('No', 'prodigystudio'), 'value' => 'no', ),
					array( 'name' => __('Yes - Display Related Posts by Tags', 'prodigystudio'), 'value' => 'related_tag', ),
					array( 'name' => __('Yes - Display Related Posts by Category', 'prodigystudio'), 'value' => 'related_category', )
				),
				
			),
			array(
				'name' => __('Related Posts Title', 'prodigystudio'),
				'desc' => __('ex. Related Posts', 'prodigystudio'),
				'id'   => $prefix . 'related_title',
				'type' => 'text_medium',
			),
			array(
				'name' => __('Post Layout', 'prodigystudio'),
				'desc' => __('Select the layout you want on this specific post/page.', 'prodigystudio'),
				'id'   => $prefix . 'post_layout',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('Right Sidebar', 'prodigystudio'), 'value' => 'right-sidebar', ),
					array( 'name' => __('Left Sidebar', 'prodigystudio'), 'value' => 'left-sidebar', ),
					array( 'name' => __('FullWidth - No Sidebar', 'prodigystudio'), 'value' => 'full-width', )
				),
				
			),*/
		),
		
	);

$meta_boxes[] = array(
				'id'         => 'post_media_metabox',
				'title'      => __('Post Video Box', 'prodigystudio'),
				'pages'      => array( 'post',), // Post type
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
			
					array(
						'name' => __('If Video Post', 'prodigystudio'),
						'desc' => __('Place Embed Code Here, works with youtube, vimeo...', 'prodigystudio'),
						'id'   => $prefix . 'post_video',
						'type' => 'wysiwyg',
					),
				),
	);
$meta_boxes[] = array(
				'id'         => 'post_quote_metabox',
				'title'      => __('Post Quote', 'prodigystudio'),
				'pages'      => array( 'post',), // Post type
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
			
					array(
						'name' => __('Quote content', 'prodigystudio'),
						'desc' => __('', 'prodigystudio'),
						'id'   => $prefix . 'quote_content',
						'type' => 'textarea',
					),
					array(
						'name' => __('Quote source', 'prodigystudio'),
						'desc' => __('', 'prodigystudio'),
						'id'   => $prefix . 'quote_source',
						'type' => 'text_medium',
					),
					
				),
	);
	
	$meta_boxes[] = array(
				'id'         => 'post_audio_metabox',
				'title'      => __('Post Audio', 'prodigystudio'),
				'pages'      => array( 'post',), // Post type
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(
			
					array(
						'name' => __('MP3 File', 'prodigystudio'),
						'desc' => __('', 'prodigystudio'),
						'id'   => $prefix . 'mp3_file',
						'type' => 'file',
					),
					array(
						'name' => __('OGG File', 'prodigystudio'),
						'desc' => __('', 'prodigystudio'),
						'id'   => $prefix . 'ogg_file',
						'type' => 'file',
					),
					array(
						'name' => __('WAV File', 'prodigystudio'),
						'desc' => __('', 'prodigystudio'),
						'id'   => $prefix . 'wav_file',
						'type' => 'file',
					),
					
				),
	);	


$meta_boxes[] = array(
				'id'         => 'portfolio_metabox',
				'title'      => __("Portfolio Options", 'prodigystudio'),
				'pages'      => array( 'portfolio',), // Post type
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
				
				
				array(
				'name' => __('Subtitle description', 'prodigystudio'),
				'desc' => __('Subtitle description of the project', 'prodigystudio'),
				'id'   => $prefix . 'project_subtitle',
				'type'    => 'text',
				
			),
			
			array(
				'name'    => __("Project Type", 'prodigystudio' ),
				'desc'    => '',
				'id'      => $prefix . 'project_type',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __("Image", 'prodigystudio' ), 'value' => 'image', ),					
					array( 'name' => __("Slider gallery", 'prodigystudio' ), 'value' => 'gallery', ),												
				),
			),
			array(
				'name' => __('Date of project (optional)', 'prodigystudio'),
				'desc' => __('Input the date of project', 'prodigystudio'),
				'id'   => $prefix . 'project_date',
				'type'    => 'text_date_timestamp',
				
			),
			array(
				'name' => __('Client Name (optional)', 'prodigystudio'),
				'desc' => '',
				'id'   => $prefix . 'project_client',
				'type'    => 'text_medium',
				
			),
			array(
				'name' => __('Skills (optional)', 'prodigystudio'),
				'desc' => '',
				'id'   => $prefix . 'project_skills',
				'type'    => 'text_medium',
				
			),	
			array(
				'name' => __('WWW (optional)', 'prodigystudio'),
				'desc' => '',
				'id'   => $prefix . 'project_www',
				'type'    => 'text_medium',
				
			),	
			array(
				'name' => __('Project link (optional)', 'prodigystudio'),
				'desc' => '',
				'id'   => $prefix . 'project_url',
				'type'    => 'text_medium',
				
			),	
			array(
				'name' => __('Related Projects', 'prodigystudio'),
				'desc' => __('Display related project of portfolio?', 'prodigystudio'),
				'id'   => $prefix . 'related_projects',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('No', 'prodigystudio'), 'value' => 'no', ),
					array( 'name' => __('Yes', 'prodigystudio'), 'value' => 'yes', )
				),
				
			),
			array(
				'name' => __('Related Projects label', 'prodigystudio'),
				'desc' => __('ex. Related Projects', 'prodigystudio'),
				'id'   => $prefix . 'related_label',
				'type' => 'text_medium',
			),			
		),
		
	);


	
$meta_boxes[] = array(
				'id'         => 'post_testimonies_metabox',
				'title'      => __('Testimonies Options', 'prodigystudio'),
				'pages'      => array( 'testi',), // Post type
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(								
					array(
						'name' => __('Position', 'prodigystudio'),
						'desc' => __('Type the position', 'prodigystudio'),
						'id'   => $prefix . 'testi_position',
						'type' => 'text_medium',
					),
					array(
						'name' => __('Company', 'prodigystudio'),
						'desc' => __('Type the company', 'prodigystudio'),
						'id'   => $prefix . 'testi_company',
						'type' => 'text_medium',
					)					
				
		),
);	
	
$meta_boxes[] = array(
				'id'         => 'post_clients_metabox',
				'title'      => __('Client Logo Options', 'prodigystudio'),
				'pages'      => array( 'clients',), // Post type
				'context'    => 'normal',
				'priority'   => 'high',
				'show_names' => true, 
				'fields' => array(								
					array(
						'name' => __('URL', 'prodigystudio'),
						'desc' => __('Type the URL to link logo image', 'prodigystudio'),
						'id'   => $prefix . 'url_logo',
						'type' => 'text',
					),
				),
	);	

	
	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'initialize_showcase_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function initialize_showcase_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}
<?php

// File Security Check
if (!defined('ABSPATH')) die('-1');

/*
Register WhoaThemes shortcode.
*/

class WPBakeryShortCode_WT_blog_grid extends WPBakeryShortCode {
	
	private $wt_sc;
	
	public function __construct($settings) {
        parent::__construct($settings);
		$this->wt_sc = new WT_VCSC_SHORTCODE;
	}
			
	protected function content($atts, $content = null) {
		
		global $wp_filter;
		$the_content_filter_backup = $wp_filter['the_content'];
		
		extract( shortcode_atts( array(
			'pagination'	      => 'false',
			'columns'             => 1,
			'grid'                => 'false',
			'masonry'             => 'false',
			'count'               => 4,
			'overlay_img'         => 'false',
			'featured_entry'      => 'true',
			'featured_entry_type' => 'full',
			'title'               => 'true',
			'meta'                => 'true',
			'excerpt'             => 'true',
			'excerpt_length'	  => 15,
			'posts'               => '',
			'category'            => '',
			'category__and'       => '',
			'category__not_in'    => '',
			'author'              => '',
			'order'               => 'DESC',
			'orderby'             => 'date',
			'read_more'           => 'true',
			'read_more_text'      => esc_html__( 'Read more', 'wt_vcsc' ),
			'full'                => 'false',
			
			'el_id'               => '',
			'el_class'            => '',
    		'css_animation'       => '',
    		'css_animation_right' => '',
    		'anim_type'           => '',
    		'anim_delay'          => '',			
			'css'                 => ''		
		), $atts ) );
		
		$sc_class = 'wt_blog_grid_sc';
				
		$id = mt_rand(9999, 99999);
		if (trim($el_id) != false) {
			$el_id = esc_attr( trim($el_id) );
		} else {
			$el_id = $sc_class . '-' . $id;
		}
				
		$el_class = esc_attr( $this->getExtraClass($el_class) );		
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $sc_class.$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);			
		
		$columns        = (int)$columns;
		$count          = (int)$count;
		$excerpt_length = (int)$excerpt_length;			
		$read_more_text = esc_html($read_more_text);
																
		$query = array(
			'post_type'      =>'post',
			'posts_per_page' => $count,
			'order'			 => $order,
			'orderby'		 => $orderby,
		);
		if($category){
			$query['cat'] = $category;
		}
		if($category__and){
			$query['category__and'] = explode(',',$category__and);
		}
		if($category__not_in){
			$query['category__not_in'] = explode(',',$category__not_in);
		}
		if($author){
			$query['author'] = $author;
		}
		if($posts){
			$query['post__in'] = explode(',',$posts);
		}
		
		if ($pagination == 'true') {
			global $wp_version;
			global $paged;
			
			if (is_front_page() && version_compare($wp_version, "3.1", '>=')){//fix wordpress 3.1 paged query
				$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
			} else {
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			}
			$query['paged'] = $paged;
		} else {
			$query['showposts'] = $count;
			$paged = NULL;
		}
		
		$wt_query = new WP_Query($query);
	
		if($columns >= 5){
			$columns = 6;
		} elseif ($columns < 1){
			$columns = 1;
		}
		
		/* Display all post if count = -1 */
		if($count == '-1'){
			$query['posts_per_page'] = $wt_query->post_count;
		} 
			
		$posts_per_column = ceil($query['posts_per_page']/$columns);		
		
		$atts = array(
			'posts_per_column'    => $posts_per_column,
			'posts_per_page'      => $count,
			'excerpt'             => $excerpt,
			'excerpt_length'      => $excerpt_length,
			'overlay_img'         => $overlay_img,
			'title'               => $title,
			'meta'                => $meta,
			'featured_entry'      => $featured_entry,
			'featured_entry_type' => $featured_entry_type,
			'columns'             => $columns,
			'masonry'             => $masonry,
			'grid'	              => $grid,
			'read_more'           => $read_more,
			'read_more_text'      => $read_more_text,
			'full'                => $full,
			
    		'css_animation'       => $css_animation,
    		'css_animation_right' => $css_animation_right,
    		'anim_type'           => $anim_type,
    		'anim_delay'          => $anim_delay,
		);
				
		$output = '';
		
		$output .= '<div id="'.$el_id.'" class="'.$css_class.'"><div class="row">';
		
		if ($columns != 1){
			$class = array('half','third','fourth','sixth');
			$cssColumn = $class[$columns-2];
			
			if( $cssColumn == 'half' ) {
				$css = 'col-lg-6 col-md-6 col-sm-6';
			} elseif ( $cssColumn == 'third' ) {
				$css = 'col-lg-4 col-md-4 col-sm-4';
			} elseif ( $cssColumn == 'fourth' ) {
				$css = 'col-lg-3 col-md-3 col-sm-6';
			} elseif ( $cssColumn == 'sixth' ) {
				$css = 'col-lg-2 col-md-2 col-sm-6';
			}
			
			for($i=1; $i<=$columns; $i++){
				$output .= "<div class=\"{$css}\">".$this->WT_VCSC_BlogList($wt_query,$atts,$i)."</div>";
			}
		} else {
			$output .= $this->WT_VCSC_BlogList($wt_query,$atts,1);
		}
		$output .= "</div>"; // close row div
		$output .= "</div>"; // close blog_shortcode div
		
		if ($pagination == 'true') {
			ob_start();
			WT_VCSC_BlogPageNavi('', '', $wt_query, $paged);
			$output .= ob_get_clean();
		}
		
		// Set things back to normal
		wp_reset_postdata();		
		$wp_filter['the_content'] = $the_content_filter_backup;
		return $output;
    }
	
	protected function WT_VCSC_BlogList(&$wt_query, $atts, $current) {
		extract($atts);		
		
		$anim_class_left  = $this->wt_sc->getWTCSSAnimationClass($css_animation,$anim_type);
		$anim_class_right = $this->wt_sc->getWTCSSAnimationClass($css_animation_right,$anim_type);		
		$anim_data_left   = $this->wt_sc->getWTCSSAnimationData($css_animation,$anim_delay);
		$anim_data_right  = $this->wt_sc->getWTCSSAnimationData($css_animation_right,$anim_delay);
					
		if ($grid == 'true') {
			$class = array('half','third','fourth','sixth');
			$cssColumn = $class[$columns-2];
			
			if( $cssColumn == 'half' ) {
				$css = 'col-lg-6 col-md-6 col-sm-6';
			} elseif ( $cssColumn == 'third' ) {
				$css = 'col-lg-4 col-md-4 col-sm-4';
			} elseif ( $cssColumn == 'fourth' ) {
				$css = 'col-lg-3 col-md-3 col-sm-3';
			} elseif ( $cssColumn == 'sixth' ) {
				$css = 'col-lg-2 col-md-2 col-sm-2';
			}
		} else {
			$start = ($current-1) * $posts_per_column + 1;
			$end = $current * $posts_per_column;
			if( $wt_query->post_count < $start){
				return '';
			}
		}
		
		//global $layout;	
		$layout     = 'full';	
		$output     = '';
			
		// blog with overlay image
		if ($overlay_img == 'true') {
			$overlay_img = '<span class="wt_mask"><span class="wt_zoom"></span></span>';
		} else {
			$overlay_img = '';
		}
										
		// If sortable blog shortcode
		if ($masonry == 'true') {
			wp_enqueue_script('jquery-isotope');
			wp_enqueue_script('jquery-init-isotope');
			$output .= '<div class="wt_isotope">';
			$element = 'wt_element ';
		} else {
			$element = '';
		}
					
		$i = 0;
		// Get global $post var
		global $post;
		
		if ($wt_query->have_posts()):
			while ($wt_query->have_posts()) : 
				$i++;
				
				$anim_class = '';
				$anim_data  = '';
				
				if ($grid == 'false') {
					if($i < $start) continue;
					if($i > $end) break;
				}
							
				$wt_query->the_post();
				
				if ($grid == 'true' && $columns != 1) {
					$output .= "<div class=\"{$element}{$css}\">";
				}
				
					if ($columns == 1) {
						
						if($i&1) {
							$anim_class = $anim_class_left;
							$anim_data  = $anim_data_left;
						} else {
							$anim_class = $anim_class_right;
							$anim_data  = $anim_data_right;
						}
						
						$output .= '<article data-order="'.$i.'" id="post-'.get_the_ID().'" class="blogEntry '.$columns.''.$anim_class.' clearfix"'.$anim_data.'>';
					} else {
						$output .= '<article data-order="'.$i.'" id="post-'.get_the_ID().'" class="blogEntry clearfix">';
					}
					
					/* Display featured entry */
					if($featured_entry == 'true'){
						$output .= '<header class="blogEntry_frame entry_'.$featured_entry_type.'">';
						$thumbnail_type = get_post_meta($post->ID, '_thumbnail_type', true);
		
						// Default sizes for featured image / slide
						$width  = 705;
						$height = 560;
						
							switch($thumbnail_type){
							
								case "timage" : 
									$output .= '<figure class="wt_image_frame entry_image">';
									$output .= wt_theme_generator('wt_blog_featured_image',$featured_entry_type,$layout,$width,$height);
									$output .= '</figure>';
									$output .= $overlay_img;
									break;
								case "tvideo" : 
									$video_link = get_post_meta($post->ID,'_featured_video', true);
									$output .= '<div class="blog-thumbnail-video">';
									$output .= wt_video_featured($video_link,$featured_entry_type,$layout,$height='270',$width='480');
									$output .=  '</div>';							
									break;
								case "tplayer" :						
									wp_enqueue_script('mediaelementjs-scripts'); 
									$player_link = get_post_meta($post->ID,'_thumbnail_player', true);
									$output .= '<div class="blog-thumbnail-player">';
									$output .= wt_media_player($featured_entry_type,$layout,$player_link);
									$output .= '</div>';							
									break;
								case "tslide" : 
									$output .= '<div class="blog-thumbnail-slide">';
									$output .= wt_get_slide($featured_entry_type,$layout,$width,$height);	
									$output .= '</div>';	
									$output .= $overlay_img;						
									break;
						}
						$output .= '</header>';
					}
					
					
					/* Display description (post excerpt / content) */
					if($excerpt == 'false'){
						
						$output .= '<div class="blogEntry_content">';
						
							//$output .=  '<div class="wt_dates"><div class="entry_date">';
							//$output .=  '<a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'"><span class="day">'.get_the_time('d').'</span><span class="month">'.get_the_time('M Y').'</span></a></div>';
							//$output .=  '</div>';
							if ( $title == 'true' || $meta == 'true' ) {
								$output .= '<div class="wt_blog_info">'; }
							if ( $title == 'true' ) {
								$output .= '<h3 class="blogEntry_title"><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf( esc_html__("Permanent Link to %s", 'wt_vcsc'), get_the_title() ).'">'.get_the_title().'</a></h3>';
							}
							
							if ( $meta == 'true' ){
								$output .= '<footer class="blogEntry_metadata_sc">';								
								$output .= wt_theme_generator('wt_blog_meta');							
								$output .= '</footer>';			
							}
							if ( $title == 'true' || $meta == 'true' ) {
								$output .= '</div>'; }
								
							if ( $read_more == 'true' ) {		
								$readmore_link = '<p class="readMore"><a href="'. get_permalink( $id ) .'" title="'.$read_more_text .'" rel="bookmark" class="read_more_link">'.$read_more_text .' <span class="wt-readmore-rarr">&raquo;</span></a></p>';
								$output .= apply_filters( 'wt_readmore_link', $readmore_link );
							}
							if(wt_get_option('blog','meta_comment') && ($post->comment_count > 0 || comments_open())){
								ob_start();
								comments_popup_link( esc_html__(' 0 ','wt_front'), esc_html__(' 1 ','wt_front'), esc_html__(' % ','wt_front'),'');
											
								$output .= '<div class="entry_comments"><i class="fa fa-comments"></i>';
								$output .= ob_get_clean().'</div>' ;			
							}
						
						$output .= '</div>'; // End blogEntry_content div
					} else { /* If description is YES */	
						$output .= '<div class="blogEntry_content">';
						
							//$output .=  '<div class="wt_dates"><div class="entry_date">';
							//$output .=  '<a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'"><span class="day">'.get_the_time('d').'</span><span class="month">'.get_the_time('M Y').'</span></a></div>';
							//$output .=  '</div>';
							if ( $title == 'true' || $meta == 'true' ) {
								$output .= '<div class="wt_blog_info">'; }
							if ( $title == 'true' ) {
								$output .= '<h3 class="blogEntry_title"><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf( esc_html__("Permanent Link to %s", 'wt_vcsc'), get_the_title() ).'">'.get_the_title().'</a></h3>';
							}
							
							if ( $meta == 'true' ){
								$output .= '<footer class="blogEntry_metadata_sc">';							
								$output .= wt_theme_generator('wt_blog_meta');
								$output .= '</footer>';				
							}
							
							if ( $title == 'true' || $meta == 'true' ) {
								$output .= '</div>'; }
							/* Display all post content or post excerpt */
							if ( $full == 'true' ){
								global $more;
								$more = 0;
								$content = get_the_content( esc_html__("Read More", 'wt_vcsc'),false);
								$content = apply_filters('the_content', $content);
								$content = str_replace(']]>', ']]&gt;', $content);
								$output .= $content;
							} else {
								/*						
								$content = get_the_excerpt();
								$content = apply_filters('the_excerpt', $content);							
								$output .= '<div class="blogEntry_excerpt">'.$content.'</div>';
								$output .= '<p class="readMore"><a class="read_more_link" href="'.get_permalink().'">'. esc_html__('Read more &raquo;','wt_vcsc').'</a></p>';	
								*/
								if ( $read_more == 'true' ) {
									$read_more = true;
								} else {
									$read_more = false; 
								}
								$content = WT_VCSC_Excerpt( $excerpt_length, $read_more, $read_more_text );
								$output .= '<div class="blogEntry_excerpt">'.$content.'';
								if(wt_get_option('blog','meta_comment') && ($post->comment_count > 0 || comments_open())){
									ob_start();
									comments_popup_link( esc_html__(' 0 ','wt_front'), esc_html__(' 1 ','wt_front'), esc_html__(' % ','wt_front'),'');
												
									$output .= '<div class="entry_comments"><i class="icon icon-chat-bubble"></i> ';
									$output .= ob_get_clean().'</div>' ;			
								}
								$output .= '</div>';
							}
						$output .= '</div>'; // End blogEntry_content div
						
						if ( $featured_entry_type == 'left' ) {
							$output .= '<div class="wt_clearboth"></div>';
						}
					}
					
					$output .= '</article>';
				
				if ($grid == 'true' && $columns != 1) {
					$output .= '</div>';
				}
				
			endwhile;			
		endif;
			
		return $output;
	
	}
	
}

/*
Register WhoaThemes shortcode within Visual Composer interface.
*/

if (function_exists('wpb_map')) {

	$add_wt_sc_func             = new WT_VCSC_SHORTCODE;	
	$add_wt_extra_id            = $add_wt_sc_func->getWTExtraId();
	$add_wt_extra_class         = $add_wt_sc_func->getWTExtraClass();
	$add_wt_css_animation_type  = $add_wt_sc_func->getWTAnimationsType();
	$add_wt_css_animation_delay = $add_wt_sc_func->getWTAnimationsDelay();
	
	wpb_map( array(
		'name' => esc_html__('WT Blog Grid', 'wt_vcsc'),
		'base' => 'wt_blog_grid',
		'icon' => 'wt_vc_ico_blog_grid',
		'class' => 'wt_vc_sc_blog_grid',
		'category' => esc_html__('by WhoaThemes', 'wt_vcsc'),
		'description' => esc_html__('Recent blog posts grid', 'wt_vcsc'),
		'params' => array(
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Pagination', 'wt_vcsc'),
				'param_name'    => 'pagination',
				'value' => array( 
					__('No', 'wt_vcsc')    => 'false',
					__('Yes', 'wt_vcsc')   => 'true',
				),
				'description'   => esc_html__('Display pagination. Important: Pagination won\'t work on your homepage because of how WordPress works.', 'wt_vcsc')
			),
			array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> esc_html__( 'Columns', 'wt_vcsc' ),
				'param_name'	=> 'columns',
				'admin_label'	=> true,
				'value' 		=> array(
					__( 'One', 'wt_vcsc' )		=> '1',
					__( 'Two', 'wt_vcsc' )		=> '2',
					__( 'Three', 'wt_vcsc' )	=> '3',
					__( 'Four', 'wt_vcsc' )	=> '4',
					__( 'Six', 'wt_vcsc' )	=> '5',
				),
				'std'	        => '2',
				'description'	=> esc_html__( 'How many columns for your grid? Only \'1, 2, 3, 4, 6\' are accepted.', 'wt_vcsc' ),
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Grid Layout', 'wt_vcsc'),
				'param_name'    => 'grid',
				'value' => array( 
					__('Yes', 'wt_vcsc')   => 'true',
					__('No', 'wt_vcsc')    => 'false',
				),
				'description'   => esc_html__('Display posts in a grid layout. \'Columns\' above option should be other than \'One\'.', 'wt_vcsc')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Count (posts number)', 'wt_vcsc'),
				'param_name'    => 'count',
				'value'         => '4',
				'description'   => esc_html__('How many items do you wish to show? Set -1 to display all.', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Show featured entry?', 'wt_vcsc'),
				'param_name'    => 'featured_entry',
				'value' => array( 
					__('Yes', 'wt_vcsc')   => 'true',
					__('No', 'wt_vcsc')    => 'false',
				),
				'description'   => esc_html__('Display featured post entries? These could be: images, slides, videos or audios.', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Blog Image Overlay', 'wt_vcsc'),
				'param_name'    => 'overlay_img',
				'value' => array( 
					__('Yes', 'wt_vcsc')   => 'true',
					__('No', 'wt_vcsc')    => 'false',
				),
				'description'   => esc_html__('If selected, a background image will overlay the featured image / slide on hover.', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Title', 'wt_vcsc'),
				'param_name'    => 'title',
				'value' => array( 
					__('Yes', 'wt_vcsc')   => 'true',
					__('No', 'wt_vcsc')    => 'false',
				),
				'description'   => esc_html__('Display post title?', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Meta information', 'wt_vcsc'),
				'param_name'    => 'meta',
				'value' => array( 
					__('Yes', 'wt_vcsc')   => 'true',
					__('No', 'wt_vcsc')    => 'false',
				),
				'description'   => esc_html__('Display post meta information? These are: author, categories, tags, comments.', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Excerpt (post content)', 'wt_vcsc'),
				'param_name'    => 'excerpt',
				'value' => array( 
					__('Yes', 'wt_vcsc')   => 'true',
					__('No', 'wt_vcsc')    => 'false',
				),
				'description'   => esc_html__('Display post excerpt / content?', 'wt_vcsc')
			),
			array(
				'type'               => 'textfield',
				'heading'            => esc_html__('Excerpt (post content) length', 'wt_vcsc'),
				'param_name'         => 'excerpt_length',
				'value'              => '15',
				'param_holder_class' => 'border_box wt_dependency',
				'dependency'	     => Array(
					'element'	=> 'excerpt',
					'value'		=> 'true'
				),
				'description'        => esc_html__('Enter a custom excerpt length. Will trim the excerpt by this number of words.', 'wt_vcsc')
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__('Display full post?', 'wt_vcsc'),
				'param_name'    => 'full',
				'value' => array( 
					__('No', 'wt_vcsc')    => 'false',
					__('Yes', 'wt_vcsc')   => 'true',
				),
				'description'   => esc_html__('Display all posts content instead of the auto excerpt. Excerpt option above should be \'YES\'', 'wt_vcsc')
			),		
			array(
				'type'          => 'wt_multidropdown',
				'heading'       => esc_html__('Display specific posts (optional)', 'wt_vcsc'),
				'param_name'    => 'posts',
				'value'         => '',
				'target'        => 'post',
				'description'   => esc_html__('Display only specific / selected posts.', 'wt_vcsc') .'<b>' . esc_html__('Hold the \'Ctrl\' or \'Shift\' keys while clicking to select multiple items', 'wt_vcsc').'</b>.'
			),
			array(
				'type'          => 'wt_multidropdown',
				'heading'       => esc_html__('Display from category (optional)', 'wt_vcsc'),
				'param_name'    => 'category',
				'value'         => '',
				'target'        => 'category',
				'description'   => esc_html__('Display posts from selected categories.', 'wt_vcsc') .'<b>' . esc_html__('Hold the \'Ctrl\' or \'Shift\' keys while clicking to select multiple items', 'wt_vcsc').'</b>.'
			),
			array(
				'type'          => 'wt_multidropdown',
				'heading'       => esc_html__('Multiple Categories (optional)', 'wt_vcsc'),
				'param_name'    => 'category__and',
				'value'         => '',
				'target'        => 'category',
				'description'   => esc_html__('Display posts that are in multiple categories.', 'wt_vcsc') .'<b>' . esc_html__('Hold the \'Ctrl\' or \'Shift\' keys while clicking to select multiple items', 'wt_vcsc').'</b>.'
			),
			array(
				'type'          => 'wt_multidropdown',
				'heading'       => esc_html__('Exclude Categories (optional)', 'wt_vcsc'),
				'param_name'    => 'category__not_in',
				'value'         => '',
				'target'        => 'category',
				'description'   => esc_html__('Exclude selected categories.', 'wt_vcsc') .'<b>' . esc_html__('Hold the \'Ctrl\' or \'Shift\' keys while clicking to select multiple items', 'wt_vcsc').'</b>.'
			),
			array(
				'type'          => 'wt_multidropdown',
				'heading'       => esc_html__('Display by author (optional)', 'wt_vcsc'),
				'param_name'    => 'author',
				'value'         => '',
				'target'        => 'author',
				'description'   => esc_html__('Display posts by specific authors.', 'wt_vcsc') .'<b>' . esc_html__('Hold the \'Ctrl\' or \'Shift\' keys while clicking to select multiple items', 'wt_vcsc').'</b>.'
			),
			array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> esc_html__( 'Order', 'wt_vcsc' ),
				'param_name'	=> 'order',
				'description'	=> sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'wt_vcsc' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				'value'			=> array(
					 esc_html__( 'DESC', 'wt_vcsc')	=> 'DESC',
					 esc_html__( 'ASC', 'wt_vcsc' )	=> 'ASC',
				),
			),
			array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> esc_html__( 'Order By', 'wt_vcsc' ),
				'param_name'	=> 'orderby',
				'description'	=> sprintf( esc_html__( 'Select how to sort retrieved posts. More at %s.', 'wt_vcsc' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				'value'			=> array(
					__( 'None', 'wt_vcsc')			    => 'none',
					__( 'Id', 'wt_vcsc')			    => 'ID',
					__( 'Author', 'wt_vcsc' )			=> 'author',
					__( 'Title', 'wt_vcsc' )		    => 'title',
					__( 'Date', 'wt_vcsc')				=> 'date',
					__( 'Modified', 'wt_vcsc')			=> 'modified',
					__( 'Random', 'wt_vcsc')			=> 'rand',
					__( 'Comment Count', 'wt_vcsc' )	=> 'comment_count',
					__( 'Menu Order', 'wt_vcsc' )	    => 'menu_order',
				),
				'std'	        => 'date',
			),
			array(
				'type'			=> 'dropdown',
				'class'			=> '',
				'heading'		=> esc_html__( 'Read More', 'wt_vcsc' ),
				'param_name'	=> 'read_more',
				'value'			=> array(
					__( 'Yes', 'wt_vcsc')   => 'true',
					__( 'No', 'wt_vcsc' )	=> 'false',
				),
				'description'	=> esc_html__( 'Display post readmore button after excerpt?', 'wt_vcsc' ),
			),
			array(
				'type'			     => 'textfield',
				'class'			     => '',
				'heading'		     => esc_html__( 'Read More Text', 'wt_vcsc' ),
				'param_name'	     => 'read_more_text',
				'value'			     => '',
				'description'	     => esc_html__('Enter your custom text for the read more button.','wt_vcsc'),
				'param_holder_class' => 'border_box wt_dependency',
				'dependency'	     => Array(
					'element'	=> 'read_more',
					'value'		=> 'true'
				),
			),	
			
			$add_wt_extra_id,
			$add_wt_extra_class,
			
			array(
				"type" => "dropdown",
				"heading" => esc_html__("CSS WT Animation (Left Column)", "wt_vcsc"),
				"param_name" => "css_animation",
				"value" => array( esc_html__("No", "wt_vcsc") => '', esc_html__("Hinge", "wt_vcsc") => "hinge", esc_html__("Flash", "wt_vcsc") => "flash", esc_html__("Shake", "wt_vcsc") => "shake", esc_html__("Bounce", "wt_vcsc") => "bounce", esc_html__("Tada", "wt_vcsc") => "tada", esc_html__("Swing", "wt_vcsc") => "swing", esc_html__("Wobble", "wt_vcsc") => "wobble", esc_html__("Pulse", "wt_vcsc") => "pulse", esc_html__("Flip", "wt_vcsc") => "flip", esc_html__("FlipInX", "wt_vcsc") => "flipInX", esc_html__("FlipOutX", "wt_vcsc") => "flipOutX", esc_html__("FlipInY", "wt_vcsc") => "flipInY", esc_html__("FlipOutY", "wt_vcsc") => "flipOutY", esc_html__("FadeIn", "wt_vcsc") => "fadeIn", esc_html__("FadeInUp", "wt_vcsc") => "fadeInUp", esc_html__("FadeInDown", "wt_vcsc") => "fadeInDown", esc_html__("FadeInLeft", "wt_vcsc") => "fadeInLeft", esc_html__("FadeInRight", "wt_vcsc") => "fadeInRight", esc_html__("FadeInUpBig", "wt_vcsc") => "fadeInUpBig", esc_html__("FadeInDownBig", "wt_vcsc") => "fadeInDownBig", esc_html__("FadeInLeftBig", "wt_vcsc") => "fadeInLeftBig", esc_html__("FadeInRightBig", "wt_vcsc") => "fadeInRightBig", esc_html__("FadeOut", "wt_vcsc") => "fadeOut", esc_html__("FadeOutUp", "wt_vcsc") => "fadeOutUp", esc_html__("FadeOutDown", "wt_vcsc") => "fadeOutDown", esc_html__("FadeOutLeft", "wt_vcsc") => "fadeOutLeft", esc_html__("FadeOutRight", "wt_vcsc") => "fadeOutRight", esc_html__("fadeOutUpBig", "wt_vcsc") => "fadeOutUpBig", esc_html__("FadeOutDownBig", "wt_vcsc") => "fadeOutDownBig", esc_html__("FadeOutLeftBig", "wt_vcsc") => "fadeOutLeftBig", esc_html__("FadeOutRightBig", "wt_vcsc") => "fadeOutRightBig", esc_html__("BounceIn", "wt_vcsc") => "bounceIn", esc_html__("BounceInUp", "wt_vcsc") => "bounceInUp", esc_html__("BounceInDown", "wt_vcsc") => "bounceInDown", esc_html__("BounceInLeft", "wt_vcsc") => "bounceInLeft", esc_html__("BounceInRight", "wt_vcsc") => "bounceInRight", esc_html__("BounceOut", "wt_vcsc") => "bounceOut", esc_html__("BounceOutUp", "wt_vcsc") => "bounceOutUp", esc_html__("BounceOutDown", "wt_vcsc") => "bounceOutDown", esc_html__("BounceOutLeft", "wt_vcsc") => "bounceOutLeft", esc_html__("BounceOutRight", "wt_vcsc") => "bounceOutRight", esc_html__("RotateIn", "wt_vcsc") => "rotateIn", esc_html__("RotateInUpLeft", "wt_vcsc") => "rotateInUpLeft", esc_html__("RotateInDownLeft", "wt_vcsc") => "rotateInDownLeft", esc_html__("RotateInUpRight", "wt_vcsc") => "rotateInUpRight", esc_html__("RotateInDownRight", "wt_vcsc") => "rotateInDownRight", esc_html__("RotateOut", "wt_vcsc") => "rotateOut", esc_html__("RotateOutUpLeft", "wt_vcsc") => "rotateOutUpLeft", esc_html__("RotateOutDownLeft", "wt_vcsc") => "rotateOutDownLeft", esc_html__("RotateOutUpRight", "wt_vcsc") => "rotateOutUpRight", esc_html__("RotateOutDownRight", "wt_vcsc") => "rotateOutDownRight", esc_html__("RollIn", "wt_vcsc") => "rollIn", esc_html__("RollOut", "wt_vcsc") => "rollOut", esc_html__("LightSpeedIn", "wt_vcsc") => "lightSpeedIn", esc_html__("LightSpeedOut", "wt_vcsc") => "lightSpeedOut" ),
				"description" => esc_html__("Select type of animation (for left blog column) if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "wt_vcsc"),
				'group' => esc_html__('Extra settings', 'wt_vcsc')
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("CSS WT Animation (Right Column)", "wt_vcsc"),
				"param_name" => "css_animation_right",
				"value" => array( esc_html__("No", "wt_vcsc") => '', esc_html__("Hinge", "wt_vcsc") => "hinge", esc_html__("Flash", "wt_vcsc") => "flash", esc_html__("Shake", "wt_vcsc") => "shake", esc_html__("Bounce", "wt_vcsc") => "bounce", esc_html__("Tada", "wt_vcsc") => "tada", esc_html__("Swing", "wt_vcsc") => "swing", esc_html__("Wobble", "wt_vcsc") => "wobble", esc_html__("Pulse", "wt_vcsc") => "pulse", esc_html__("Flip", "wt_vcsc") => "flip", esc_html__("FlipInX", "wt_vcsc") => "flipInX", esc_html__("FlipOutX", "wt_vcsc") => "flipOutX", esc_html__("FlipInY", "wt_vcsc") => "flipInY", esc_html__("FlipOutY", "wt_vcsc") => "flipOutY", esc_html__("FadeIn", "wt_vcsc") => "fadeIn", esc_html__("FadeInUp", "wt_vcsc") => "fadeInUp", esc_html__("FadeInDown", "wt_vcsc") => "fadeInDown", esc_html__("FadeInLeft", "wt_vcsc") => "fadeInLeft", esc_html__("FadeInRight", "wt_vcsc") => "fadeInRight", esc_html__("FadeInUpBig", "wt_vcsc") => "fadeInUpBig", esc_html__("FadeInDownBig", "wt_vcsc") => "fadeInDownBig", esc_html__("FadeInLeftBig", "wt_vcsc") => "fadeInLeftBig", esc_html__("FadeInRightBig", "wt_vcsc") => "fadeInRightBig", esc_html__("FadeOut", "wt_vcsc") => "fadeOut", esc_html__("FadeOutUp", "wt_vcsc") => "fadeOutUp", esc_html__("FadeOutDown", "wt_vcsc") => "fadeOutDown", esc_html__("FadeOutLeft", "wt_vcsc") => "fadeOutLeft", esc_html__("FadeOutRight", "wt_vcsc") => "fadeOutRight", esc_html__("fadeOutUpBig", "wt_vcsc") => "fadeOutUpBig", esc_html__("FadeOutDownBig", "wt_vcsc") => "fadeOutDownBig", esc_html__("FadeOutLeftBig", "wt_vcsc") => "fadeOutLeftBig", esc_html__("FadeOutRightBig", "wt_vcsc") => "fadeOutRightBig", esc_html__("BounceIn", "wt_vcsc") => "bounceIn", esc_html__("BounceInUp", "wt_vcsc") => "bounceInUp", esc_html__("BounceInDown", "wt_vcsc") => "bounceInDown", esc_html__("BounceInLeft", "wt_vcsc") => "bounceInLeft", esc_html__("BounceInRight", "wt_vcsc") => "bounceInRight", esc_html__("BounceOut", "wt_vcsc") => "bounceOut", esc_html__("BounceOutUp", "wt_vcsc") => "bounceOutUp", esc_html__("BounceOutDown", "wt_vcsc") => "bounceOutDown", esc_html__("BounceOutLeft", "wt_vcsc") => "bounceOutLeft", esc_html__("BounceOutRight", "wt_vcsc") => "bounceOutRight", esc_html__("RotateIn", "wt_vcsc") => "rotateIn", esc_html__("RotateInUpLeft", "wt_vcsc") => "rotateInUpLeft", esc_html__("RotateInDownLeft", "wt_vcsc") => "rotateInDownLeft", esc_html__("RotateInUpRight", "wt_vcsc") => "rotateInUpRight", esc_html__("RotateInDownRight", "wt_vcsc") => "rotateInDownRight", esc_html__("RotateOut", "wt_vcsc") => "rotateOut", esc_html__("RotateOutUpLeft", "wt_vcsc") => "rotateOutUpLeft", esc_html__("RotateOutDownLeft", "wt_vcsc") => "rotateOutDownLeft", esc_html__("RotateOutUpRight", "wt_vcsc") => "rotateOutUpRight", esc_html__("RotateOutDownRight", "wt_vcsc") => "rotateOutDownRight", esc_html__("RollIn", "wt_vcsc") => "rollIn", esc_html__("RollOut", "wt_vcsc") => "rollOut", esc_html__("LightSpeedIn", "wt_vcsc") => "lightSpeedIn", esc_html__("LightSpeedOut", "wt_vcsc") => "lightSpeedOut" ),
				"description" => esc_html__("Select type of animation (for right blog column) if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "wt_vcsc"),
				'group' => esc_html__('Extra settings', 'wt_vcsc')
			),
			
			$add_wt_css_animation_type,
			$add_wt_css_animation_delay,
			
			array(
				'type' => 'css_editor',
				'heading' => esc_html__('Css', 'wt_vcsc'),
				'param_name' => 'css',
				'group' => esc_html__('Design options', 'wt_vcsc')
			)
		)
	));
	
}
<?php

/*	CREATE META BOXE	*/

$prefix = '_ps_';
global $themename;
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20");
$meta_boxes = array();

// BLOG PAGE TEMPLATE OPTIONS
$meta_boxes[0] = array(
	'id' => 'prodigystudio_sidebars_meta_box',
	'title' => $themename . ' - Custom Sidebars',
	'pages' => array('page','post'), // multiple post types
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => '',
			'desc' => 'Please, select a sidebar to display on this page/post.',
			'id' => $prefix . 'selected_sidebar',
			'type' => 'sidebars',
			'options' => ''
		)
		
	)
);

/*********************************

You should not edit the code below

*********************************/

foreach ($meta_boxes as $meta_box) {
	$my_box = new prodigystudio_meta_box($meta_box);
}

class prodigystudio_meta_box {

	protected $_meta_box;

	// create meta box based on given data
	function __construct($meta_box) {
		if (!is_admin()) return;
	
		$this->_meta_box = $meta_box;

		// fix upload bug: http://www.hashbangcode.com/blog/add-enctype-wordpress-post-and-page-forms-471.html
		$current_page = substr(strrchr($_SERVER['PHP_SELF'], '/'), 1, -4);
		if ($current_page == 'page' || $current_page == 'page-new' || $current_page == 'post' || $current_page == 'post-new') {
			add_action('admin_head', array(&$this, 'add_post_enctype'));
		}
		
		add_action('admin_menu', array(&$this, 'add'));

		add_action('save_post', array(&$this, 'save'));
	}
	
	function add_post_enctype() {
		echo '
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#post").attr("enctype", "multipart/form-data");
			jQuery("#post").attr("encoding", "multipart/form-data");
		});
		</script>';
	}

	/// Add meta box for multiple post types
	function add() {
		foreach ($this->_meta_box['pages'] as $page) {
			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
		}
	}

	// Callback function to show fields in meta box
	function show() {
		global $post;

		// Use nonce for verification
		echo '<input type="hidden" name="prodigystudio_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
		echo '<ul class="form-table">';

		foreach ($this->_meta_box['fields'] as $field) {
			// get current post meta data
			$meta = get_post_meta($post->ID, $field['id'], true);
		
			echo '<li>',
					'<label for="', $field['id'], '"><strong>', $field['name'], '</strong></label>',
					'';
			switch ($field['type']) {
				
				case 'text':
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" />',
						'<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
				
				case 'textarea':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4">', $meta ? $meta : $field['std'], '</textarea>',
						'<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
				
				case 'select':
					echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					foreach ($field['options'] as $option) {
						echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
					}
					echo '</select>','<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
				
				case 'sidebars':
					global $post;
					global $wp_registered_sidebars;
					$selected_sidebar = get_post_meta($post->ID, '_ps_selected_sidebar', true);
						
						echo '<p>', $field['desc'], '</p>';
						echo '<select name="_ps_selected_sidebar" id="ps_selected_sidebar">';
						$sidebars = $wp_registered_sidebars; // get all sidebars;
							if(is_array($sidebars) && !empty($sidebars)){
								foreach($sidebars as $sidebar){
										if($selected_sidebar == $sidebar['id']){
											echo "<option value='{$sidebar['id']}' selected=\"selected\">{$sidebar['name']}</option>\n";
										}else{
											echo "<option value='{$sidebar['id']}'>{$sidebar['name']}</option>\n";
										}
								}
							}else{
								echo '<option value="0"';  echo "selected"; echo '>No sidebars defined</option>';
							}
							
						echo '</select>','<br /><p>Create additional sidebars using <a href="' . admin_url('themes.php?page=prodigystudio_options') . '">Sidebars Generator</a></p>';
					break;
				
				
				case 'revsliders':
					
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					global $wpdb;
					$rs = $wpdb->get_results("SELECT id, title, alias FROM " . $wpdb->prefix . "revslider_sliders ORDER BY id ASC LIMIT 999");
					foreach ($rs as $slider) {
						echo '<option value="'.$slider->alias.'"', $meta == $slider->alias ? ' selected="selected"' : '', '>', $slider->title, '</option>';
					}
					echo '</select>','<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
					
				
				case 'cats-portfolio':
					global $post;
					$ps_get_portfolio = get_post_meta($post->ID, 'ps_portfolio_catsname', true);
					$ps_folio_cats = ( is_array( $ps_get_portfolio ) ) ? array_map( 'absint', $ps_get_portfolio ) : array();
					$terms = get_terms("portfolios-categories");
					
						if ($terms) {

							echo '<select style="height: 120px; min-width: 300px;" name="ps_portfolio_catsname[]" id="', $field['id'], '" multiple="multiple">';
									
								foreach ($terms as $term) {
	
									if (in_array($term->name, $ps_get_portfolio)) {	
										echo '<option value="'.$term->name.'" selected = "selected">'.$term->name.'</option>'; } 
									else {													
										echo '<option value="'.$term->name.'">'.$term->name.'</option>';							
									}
						
								}
							echo '</select>','<br /><p class="description-meta">', $field['desc'], '</p>';
						}
					
				break;
				
				case 'radio':
					foreach ($field['options'] as $option) {
						echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
					}
				break;
				
				case 'checkbox':
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />',
					'<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
				
				case 'colorpicker':
						
					$val = $field['std'];
					$stored  = get_option( $field['id'] );
					if ( $stored != "") { $val = $stored; }
				
					echo '<div id="' . $field['id'] . '_picker" class="colorSelector"><div></div></div>',
						'<input class="ps-color" name="'. $field['id'] .'" id="'. $field['id'] .'" type="text" value="'. $val .'" />',
						'<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
				
				case 'file':
					echo $meta ? "$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
						'<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
				
				case 'image':
					echo $meta ? "<img src=\"$meta\" width=\"150\" height=\"150\" /><br />$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
						'<br /><p class="description-meta">', $field['desc'], '</p>';
				break;
				case 'media-uploader':
				
					if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium'); $image = $image[0]; };
				echo '<input type="text" name="', $field['id'], '" id="uploadedImage" value="', $meta , '" size="30" />
				      <input name="uploadedImage" type="hidden" class="custom_upload_image" value="'.$meta.'" /> 
                      <input class="custom_upload_image_button button float_left" type="button" value="Upload an Image" /> 
                      <p style="margin-top:0px;">'.$field['desc'].'</p>
					  <div id="image-wrapper"';
					  if (!$meta) {echo 'class="hidden"'; }; echo '>
					  <img width="340" src="'.$meta.'" class="custom_preview_image" alt="" />
					  <a href="#" title="Remove Image" class="custom_clear_image_button">Remove Image</a>
					  </div>';
				
				break;
			}
			echo 	'</li>';
		}
	
		echo '</ul>';
	}

	// Save data from meta box
	function save($post_id) {
		// verify nonce
		
		
		if (!isset($_POST['prodigystudio_meta_box_nonce']) || !wp_verify_nonce($_POST['prodigystudio_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		foreach ($this->_meta_box['fields'] as $field) {
			$name = $field['id'];
			
			$old = get_post_meta($post_id, $name, true);			
			if(isset($_POST[$field['id']])) {$new = $_POST[$field['id']];} else {$new = '';}			
			
			if ($field['type'] == 'file' || $field['type'] == 'image') {
				$file = wp_handle_upload($_FILES[$name], array('test_form' => false));
				$new = $file['url'];
			}
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $name, $new);
			} elseif ('' == $new && $old && $field['type'] != 'file' && $field['type'] != 'image') {
				delete_post_meta($post_id, $name, $old);
			}
		}
	}
}

?>
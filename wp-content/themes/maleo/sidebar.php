<div class="large-4 medium-4 medium-potrait-12 small-12 columns">
<?php
	global $wp_query;
	if(is_singular()) {
		$thePostID = $wp_query->post->ID;
		$selected_sidebar = get_post_meta($thePostID, '_ps_selected_sidebar', true);
	} 
	else {
		$selected_sidebar = '0';
	}
	
	if($selected_sidebar != '0' && is_active_sidebar($selected_sidebar)) : dynamic_sidebar($selected_sidebar);
	elseif (!dynamic_sidebar('sidebar')) : 
		get_search_form(); 
	endif; // endif dynamic sidebar 
	 
 ?>  
</div>

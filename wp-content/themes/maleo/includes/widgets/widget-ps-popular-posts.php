<?php
/*===================================================================================
 * ProdigyStudio Widget Popular Posts
 * =================================================================================*/

class ps_PopularPosts extends WP_Widget {

	function ps_PopularPosts() {
		$widget_ops = array('classname' => 'ps-popular-posts', 'description' =>__('Show top commented posts','prodigystudio'));	
		$this->WP_Widget('ps-popular-posts',__('ProdigyStudio - Popular Posts','prodigystudio'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract ($args);

		$title = empty($instance['title']) ? __('Popular Posts','') : $instance['title'];
		$numbPosts = $instance['showposts_count'];
		if(empty($numbPosts)) {$numbPosts = '3'; }
		
		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo '<ul class="popular-list">';
			
			$query = new WP_Query( array( 
				'orderby' => 'comment_count',
				'order' => 'DESC',
				'posts_per_page' => $numbPosts) );
				
				$iconCriteria = 'cats';
				if($query->have_posts()) {
				while($query->have_posts()) : $query->the_post();
				
					
				$count = get_comments_number();
					
					echo '<li>';
					echo the_post_thumbnail('contentThumbPost');
					echo '<p class="popular-title"><a href="'.get_permalink().'">'.get_the_title().'</a></p>';
					echo '<p class="comment-count"><a href="'.get_comments_link().'">'.$count.' Comments</a></p>';	

					echo '</li>';
				endwhile;
				}
			else
			{
				echo '<p>'.__('No top commented posts founded','prodigystudio').'<p>'; 
			}
		echo '</ul>';
		echo $after_widget;
		
	}
function update($new_instance, $old_instance) {  
    	$instance['title'] = strip_tags($new_instance['title']);		
		$instance['showposts_count'] = (int)$new_instance['showposts_count'];

   
        return $new_instance;
    }
function form($instance) {
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' =>'','showposts_count' =>'' ) );

		$title	= empty($instance['title']) ? __('Popular Posts','prodigystudio') : $instance['title'];
		$numbPosts = (int)$instance['showposts_count'];
		if(empty($numbPosts)) {$numbPosts = '3'; }

?>	
	
    <p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','prodigystudio'); ?>:
		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" class="widefat" value="<?php echo esc_attr($title); ?>" />
    </label>    
	</p>
    
    <p>
		<label for="<?php echo $this->get_field_id('showposts_count'); ?>"><?php _e('How many posts to display','prodigystudio'); ?>
		<input size="3" type="text" name="<?php echo $this->get_field_name('showposts_count'); ?>" id="<?php echo $this->get_field_id('showposts_count'); ?>" value="<?php echo esc_attr($numbPosts); ?>" />
		</label>
	</p>
	
<?php
	}	
}
register_widget('ps_PopularPosts');

?>
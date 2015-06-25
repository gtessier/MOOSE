<?php
/*===================================================================================
 * ProdigyStudio Widget  - Feedburnes Subscribe
 * =================================================================================*/	
	

class ps_Newsletter extends WP_Widget {
 
	function ps_Newsletter() {
        $widget_ops = array('classname' => 'ps-subscribe', 'description' => __('Add a subscribe widget','prodigystudio') );
		$this->WP_Widget('ps_newsletter', __('ProdigyStudio - Subscribe','prodigystudio'), $widget_ops);
    
    }
 
    function widget($args, $instance) {        
        extract( $args );
        
        $title = strip_tags($instance['title']);
        $user  = empty($instance['user']) ? get_option('dn_newsletter') : $instance['user'];
        $text  = empty($instance['text']) ? __('Signup to our Newsletter','prodigystudio') : $instance['text'];		
       
 
    	echo $before_widget;
		 
		if($title != '' ) {$title_text = $before_title.$title.$after_title;}
		if($text != '' ) {$description_text = '<p class="gap-bottom8">'.$text.'</p>';} ?>
                
		<div class="newsletter-box">
        <?php echo $title_text; echo $description_text; ?>
        
        <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $user; ?>','popupwindow', 'scrollbars=yes,width=550,height=520');return true" id="comment-form">
		<fieldset> 
        	<input type="text" name="name" id="name" placeholder="Username" />
			<input type="email" name="email" id="email" placeholder="<?php _e('Your e-mail here','prodigystudio'); ?>" />
			<input type="hidden" value="<?php echo $user; ?>" name="uri" />
			<input type="hidden" name="loc" value="en_EN"/>   
			<div class="clear"></div> 
			<button type="submit" class="small round green" id="buttonsend"><?php _e('Subscribe', 'webincode'); ?></button>
		</fieldset>
		</form>
		</div>
    			
 
			<?php echo $after_widget; ?>
        <?php
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['user'] = strip_tags($new_instance['user']);
    	$instance['text'] = strip_tags($new_instance['text']);
                  
        return $new_instance;
    }
 
    function form($instance) {
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '', 'user' => '', 'text' => '') );
		$title 		= strip_tags($instance['title']);
		$user		= empty($instance['user']) ? get_option('dn_newsletter') : $instance['user'];
		$text		= empty($instance['text']) ? __('Signup to our Newsletter','prodigystudio') : $instance['text'];
		
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','prodigystudio'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('Enter your Feedburner feed User:','prodigystudio'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
			</label>
            <small><em>(http://feeds.feedburner.com/USER)</em></small>
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Enter your Feedburner feed User:','prodigystudio'); ?>
			<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_attr($text); ?></textarea>
			</label>
		</p>
        
		
<?php
	}

}
 
register_widget('ps_Newsletter');

?>
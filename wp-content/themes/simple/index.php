<?php
 get_header(); ?>
<?php
$homeContent = wt_get_option('general', 'home_page');
$layout = wt_get_option('general','layout');
$slogan = wt_get_option('general','intro_slogan');
$slogan_button_text = wt_get_option('general','intro_button_text');
$slogan_button_link = wt_get_option('general','intro_button_link');
$stype = wt_get_option('general','slideshow_type');
?>
</div> <!-- End headerWrapper -->
<?php 
if (is_home() && !is_blog()){
} ?>
<div id="wt_containerWrapper" class="clearfix">
<?php
//if ($stype != 'disable') { wt_theme_generator('wt_slideShow',$stype); } ?>
    
    <?php 
   if ( ( $locations = get_nav_menu_locations() ) && $locations['primary-menu'] && (!empty($homeContent)) && (!is_front_page() || !is_blog()  )) {
			require_once (THEME_FILES . '/homeSection.php');
			$menu = wp_get_nav_menu_object( $locations['primary-menu'] );
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			$include = array();
			foreach($menu_items as $item) {
				if($item->object == 'page')
					$include[] = $item->object_id;
			}
			query_posts( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
			$i = 1;
			
			
			while (have_posts()) : 
			the_post();
			$intro_type = get_post_meta($post->ID, '_intro_type', true);
			$section_color = get_post_meta($post->ID, '_background_style', true);
			$section_img_custom = get_post_meta($post->ID, '_bg_style_image', true);
			$section_position_custom = get_post_meta($post->ID, '_bg_style_position_x', true);
			$section_repeat_custom = get_post_meta($post->ID, '_bg_style_repeat', true);
			$section_color_custom = get_post_meta($post->ID, '_background_style_color', true);
			$section_bg_color = get_post_meta($post->ID, '_bg_style_color', true);
			$section_parallax_custom = get_post_meta($post->ID, '_bg_style_parallax', true);
			$section_img_cover = get_post_meta($post->ID, '_bg_style_cover', true);
			$bgType = get_post_meta($post->ID, '_bg_type', true);
			$top_margins = get_post_meta($post->ID, '_top_margins', true);
			$bottom_margins = get_post_meta($post->ID, '_bottom_margins', true);
			$parallax = get_post_meta($post->ID, '_parallax', true);
			$section_bg_overlay = get_post_meta($post->ID, '_bg_overlay', true);
			$full_sections = get_post_meta($post->ID, '_enable_fullwidth', true);
			if ($parallax==='true') {
				$parallax = ' wt_parallax';
			}
			if(!empty($section_bg_color) && $section_bg_color != "transparent"){
				$section_bg_color = 'background-color:'.$section_bg_color.';';
			}else{
				$section_bg_color = '';
			}
			if(!empty($section_color_custom) && $section_color_custom != "transparent"){
				$section_color_custom = 'background-color:'.$section_color_custom.';';
			}else{
				$section_color_custom = '';
			}
			if(!empty($section_img_custom)){
				$section_img_custom = 'background-image:url('.$section_img_custom.');background-position:top '.$section_position_custom.';background-repeat:'.$section_repeat_custom.'';
			}else{
				$section_img_custom = '';
			}
			if ($top_margins != '0') {
				$top_margins = 'padding-top:'.$top_margins.'px; ';
			} else {
				$top_margins = ''; 
			}
			if ($bottom_margins != '0') {
				$bottom_margins = 'padding-bottom:'.$bottom_margins.'px; ';
			} else {
				$bottom_margins = ''; 
			}
			if ($full_sections==='true') {
				$full_sections = ' wt_section_full';
			}
			if(!empty($section_bg_overlay) && $section_bg_overlay != "transparent"){
				$section_bg_overlay = 'background-color:'.$section_bg_overlay.';';
			}else{
				$section_bg_overlay = '';
			}
			?>
            
			<?php if(!wt_is_enabled(get_post_meta($post->ID, '_enable_fullcontact', true))): ?>
			<div class="wt_sections wt_section_<?php echo (int)$i;?>">
			    <?php 
				// if section with parallax
				if($bgType == 'parallax'): ?>
                    <section id="<?php echo esc_attr( $post->post_name );?>" class="wt_section_area wt_parallax <?php echo esc_attr( $full_sections . $section_color ); ?>"<?php if(!empty($section_parallax_custom) || $top_margins != '0' || $bottom_margins != '0') {echo' style="'. $top_margins .  $bottom_margins.'background-image:url('.$section_parallax_custom.');"';} ?>>
                    <?php
                    if(!empty($section_bg_overlay)) {
                        echo ' <div class="wt_section_overlay" style="'.$section_bg_overlay.'"></div>';
                    } ?>
			   <?php 
				// if section with color
				elseif($bgType == 'color'): ?>
					<section id="<?php echo esc_attr( $post->post_name );?>" class="wt_section_area <?php echo esc_attr( $full_sections . $section_color ); ?>"<?php if(!empty($section_bg_color) || $top_margins != '0' || $bottom_margins != '0') {echo ' style="'. $top_margins . $bottom_margins.''.$section_bg_color.'"';	} ?>>
				   <?php
                    if(!empty($section_bg_overlay)) {
                        echo ' <div class="wt_section_overlay" style="'.$section_bg_overlay.'"></div>';
                    } ?>
				<?php
				// if section with cover
				elseif($bgType == 'cover'): ?>
					<section id="<?php echo esc_attr( $post->post_name );?>" class="wt_section_area <?php echo esc_attr( $full_sections . $section_color ); ?>"<?php if(!empty($section_img_cover) || $top_margins != '0' || $bottom_margins != '0') {echo ' style="'. $top_margins . $bottom_margins.'background-image:url('.$section_img_cover.'); background-attachment: fixed; background-size: cover;"';	} ?>>
				   <?php
                    if(!empty($section_bg_overlay)) {
                        echo ' <div class="wt_section_overlay" style="'.$section_bg_overlay.'"></div>';
                    } ?>
			   <?php
				// if section with pattern
				elseif($bgType == 'pattern'): ?>
					<section id="<?php echo esc_attr( $post->post_name );?>" class="wt_section_area <?php echo esc_attr( $full_sections . $section_color ); ?>"<?php if(!empty($section_color_custom) || !empty($section_img_custom) || $top_margins != '0' || $bottom_margins != '0') {echo' style="'. $top_margins . $bottom_margins.''.$section_color_custom.''.$section_img_custom.'"';} ?>>
				   <?php
                    if(!empty($section_bg_overlay)) {
                        echo ' <div class="wt_section_overlay" style="'.$section_bg_overlay.'"></div>';
                    } ?>
				<?php
				// if section with pattern
				elseif($bgType == 'video'):
					wp_enqueue_script( 'jquery-youtube');
					$videoId = get_post_meta($post->ID, '_bg_video', true);
				?>
                   <div class="bg_video_section wt_video_section wt_video_<?php echo (int)$i; ?>"><div class="wt_pattern_overlay"></div><a id="bgndVideo_<?php echo (int)$i; ?>" class="wt_youtube_player" data-property="{videoURL:'http://www.youtube.com/watch?v=<?php echo esc_attr( $videoId ) ?>', autoPlay:true, containment:'.wt_video_<?php echo (int)$i; ?>', mute:true, startAt:0, opacity:1, ratio:'4/3', addRaster:true, showControls:false}"></a> <a class="video-volume" onclick="jQuery('#bgndVideo_<?php echo (int)$i; ?>').toggleVolume()"><i class="fa fa-volume-down"></i></a>
                        <section id="<?php echo esc_attr( $post->post_name );?>" class="wt_video wt_section_area <?php echo esc_attr( $full_sections . $section_color ); ?>"<?php if(!empty($section_color_custom) || !empty($section_img_custom) || $top_margins != '0' || $bottom_margins != '0') {echo' style="'. $top_margins . $bottom_margins.''.$section_color_custom.''.$section_img_custom.'"';} ?>>
                   <?php
                    if(!empty($section_bg_overlay)) {
                        echo ' <div class="wt_section_overlay" style="'.$section_bg_overlay.'"></div>';
                    } ?>
				<?php else: ?>
					<section id="<?php echo esc_attr( $post->post_name );?>" class="wt_section_area<?php echo esc_attr( $full_sections )?>" style=" <?php echo  $top_margins . $bottom_margins; ?>;">
				    <?php
                    if(!empty($section_bg_overlay)) {
                        echo ' <div class="wt_section_overlay" style="'.$section_bg_overlay.'"></div>';
                    } ?>
				<?php endif; ?>
	
					<div class="container">
						<div class="row">
							<?php if($intro_type != 'disable'): ?>
								<?php wt_theme_generator('wt_custom_title',$post->ID); ?>
                            <?php endif; ?>
						</div>
					</div>
					<?php if(!wt_is_enabled(get_post_meta($post->ID, '_enable_fullwidth', true))): ?>
                        <div class="container">
					<?php endif; ?>
					
                    <?php the_content(); ?>
                    
					<?php if(!wt_is_enabled(get_post_meta($post->ID, '_enable_fullwidth', true))): ?>
                        </div> <!-- End container-->
					<?php endif; ?>
                    
				</section>
				<?php wt_theme_generator('wt_section',$post->ID); ?>
			</div>
			<?php else: ?>
			<div class="wt_section_<?php echo (int)$i;?>">
				<section id="<?php echo esc_attr( $post->post_name );?>">
					<?php if($intro_type != 'disable'): ?>
						<?php wt_theme_generator('wt_custom_title',$post->ID); ?>
                    <?php endif; ?>
				<div class=" wt_section_contact">
					<?php echo apply_filters('the_content', get_post_meta($post->ID, '_fullcontact_gmap', true)); ?>
					<div class="wt_section_contact_inner">
						<?php the_content(); ?>
					</div>
				</div>
				</section>
			</div>
			<?php endif; ?>
		<?php $i++; 
		endwhile; 
		wp_reset_query();
		 } else { 
		   return require(THEME_DIR . "/blog.php"); }
	?>

<?php if(!get_post_meta($post->ID, '_enable_fullcontact', true)): ?>
</div> <!-- End containerWrapper -->
<?php endif; ?>
<?php get_footer(); ?>
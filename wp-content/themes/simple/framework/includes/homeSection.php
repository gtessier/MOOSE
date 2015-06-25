<?php 
$homeContent = wt_get_option('general','home_page');
$scrollNext = wt_get_option('general','scroll_to_next');
$bgType = wt_get_option('background','background_type');
$youtubeLink = wt_get_option('background','video_link');
$slide_bg_1 = wt_get_option('background','slide_bg_1');
$slide_bg_2 = wt_get_option('background','slide_bg_2');
$slide_bg_3 = wt_get_option('background','slide_bg_3');
$slide_bg_4 = wt_get_option('background','slide_bg_4');
$slide_bg_5 = wt_get_option('background','slide_bg_5');
$video_bg = wt_get_option('background','video_link');
$overlayType = wt_get_option('general','overlay_type');
?>
<?php if($bgType == 'layerSlider'): ?>
<section id="wt_section_home" class="wt_layerSlider wt_section_area">
<?php elseif($bgType == 'pattern'): ?>
<section id="wt_section_home" class="wt_pattern wt_section_area">
<?php elseif($bgType == 'surface'): ?>
<section id="wt_section_home" class="wt_surface wt_section_area">
<?php elseif($bgType == 'image_bg'): ?>
<section id="wt_section_home" class="wt_home_image wt_section_area">
<?php elseif($bgType == 'video'): ?>
<section id="wt_section_home" class="wt_video_home wt_section_area">
<?php elseif($bgType == 'slideshow'): ?>
<section id="wt_section_home" class="wt_slider_home wt_section_area">
<?php else: ?>
<section id="wt_section_home" class="wt_section_area">
<?php endif; ?>
<?php if($overlayType =='pattern') :?>
      <div class="wt_pattern_overlay"></div>
  <?php endif; ?>
   <?php if($overlayType =='color') :?>
      <div class="wt_color_overlay"></div>
  <?php endif; ?>
<?php if($bgType == 'layerSlider') :?>
    <div id="wt_home_content">
    <?php if($scrollNext == true) :?>
    	<div class="wt_center">
          <div class="wt_call_action_alt">
            <a class="btn-start wt_scroll" href="#about"><i class="entypo-down-dir"></i></a>
          </div>
        </div>
	<?php endif; ?>
   <?php  echo do_shortcode('[layerslider id="'.wt_get_option('background', 'layerS_slideshow').'"]'); ?>
    </div>
</section>
<?php elseif($bgType == 'surface') :?>
<?php
$mesh_ambient = wt_get_option('background','mesh_ambient');
$mesh_diffuse = wt_get_option('background','mesh_diffuse');
$light_ambient = wt_get_option('background','light_ambient');
$light_diffuse = wt_get_option('background','light_diffuse');
echo '<div id="wt_fss" data-mesh-ambient="'.$mesh_ambient.'" data-mesh-diffuse="'.$mesh_diffuse.'" data-light-ambient="'.$light_ambient.'" data-light-diffuse="'.$light_diffuse.'"></div>';
wp_enqueue_script( 'jquery-fss');
wp_enqueue_script( 'jquery-fss-settings');
?>
    <div id="wt_home_content">
        <div class="container">
            <div class="row">
			   <?php 
                $the_query = new WP_Query( 'page_id='.$homeContent.'' );
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();
                        the_content();
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
<?php elseif($bgType == 'pattern') :?>
    <div id="wt_home_content">
    <?php if($scrollNext == true) :?>
    	<div class="wt_center">
          <div class="wt_call_action_alt">
            <a class="btn-start wt_scroll" href="#about"><i class="entypo-down-dir"></i></a>
          </div>
        </div>
	<?php endif; ?>
        <div class="container">
            <div class="row">
			   <?php 
                $the_query = new WP_Query( 'page_id='.$homeContent.'' );
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();
                        the_content();
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
<?php elseif($bgType == 'image_bg') :?>
  <div id="wt_home_content">
    <?php if($scrollNext == true) :?>
    	<div class="wt_center">
          <div class="wt_call_action_alt">
            <a class="btn-start wt_scroll" href="#about"><i class="entypo-down-dir"></i></a>
          </div>
        </div>
	<?php endif; ?>
    <div class="container">
        <div class="row">
            <?php 
			$the_query = new WP_Query( 'page_id='.$homeContent.'' );
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
					the_content();
			endwhile;
			wp_reset_postdata();
			?>
        </div>
    </div>
  </div>
</section>
<?php elseif($bgType == 'video') :?>
<?php
wp_enqueue_script( 'jquery-youtube');
?>
  <div class="wt_bg_video">
	<a id="bgndVideo_home" class="wt_youtube_player" data-property="{videoURL:'<?php echo esc_url( $youtubeLink ); ?>', containment:'.wt_bg_video', autoPlay:true, mute:true, startAt:0, opacity:1, ratio:'4/3', addRaster:true, showControls:false}"></a>
   </div>
  <a class="video-volume" onclick="jQuery('#bgndVideo_home').toggleVolume()"><i class="fa fa-volume-down"></i></a>
  <div id="wt_home_content">
    <?php if($scrollNext == true) :?>
    	<div class="wt_center">
          <div class="wt_call_action_alt">
            <a class="btn-start wt_scroll" href="#about"><i class="entypo-down-dir"></i></a>
          </div>
        </div>
	<?php endif; ?>
    <div class="container">
        <div class="row">
            <?php 
			$the_query = new WP_Query( 'page_id='.$homeContent.'' );
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
					the_content();
			endwhile;
			wp_reset_postdata();
			?>
        </div>
    </div>
  </div>
</section>
<?php elseif($bgType == 'slideshow') :?>
<?php
wp_enqueue_script( 'jquery-supersized');
wp_enqueue_script( 'jquery-supersized-shutter');
?>
  <div class="wt_fullscreen_slider" data-images='["<?php if(!empty($slide_bg_1)) { echo esc_url( $slide_bg_1 ) .'"'; } ?><?php if(!empty($slide_bg_2)) { echo ', "' . esc_url( $slide_bg_2 ) .'"'; } ?><?php if(!empty($slide_bg_3)) { echo ', "' . esc_url( $slide_bg_3 ) .'"';  }?><?php if(!empty($slide_bg_4)) { echo ', "' . esc_url( $slide_bg_4 ) .'"'; } ?><?php if(!empty($slide_bg_5)) { echo ', "' . esc_url( $slide_bg_5 ) .'"'; } ?>]' data-autoplay="true" data-slideinterval="7000" data-transitionspeed="1500" data-transition="1">
    <div id="progress-back" class="load-item">
      <div id="progress-bar"></div>
    </div>
  </div>
  <div id="wt_home_content">
    <?php if($scrollNext == true) :?>
    	<div class="wt_center">
          <div class="wt_call_action_alt">
            <a class="btn-start wt_scroll" href="#about"><i class="entypo-down-dir"></i></a>
          </div>
        </div>
	<?php endif; ?>
    <div class="container">
        <div class="row">
            <?php 
			$the_query = new WP_Query( 'page_id='.$homeContent.'' );
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
					the_content();
			endwhile;
			wp_reset_postdata();
			?>
        </div>
    </div>
  </div>
</section>
<?php endif; ?>
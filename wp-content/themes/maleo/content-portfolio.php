<?php
	
	global $post;
	
	$project_subtitle = get_post_meta($post->ID,'_ps_project_subtitle',true);
	$project_type = get_post_meta($post->ID,'_ps_project_type',true);
	$project_date = get_post_meta($post->ID,'_ps_project_date',true);			
	$project_client = get_post_meta($post->ID,'_ps_project_client',true);
	$project_skills = get_post_meta($post->ID,'_ps_project_skills',true);
	$project_www =  get_post_meta($post->ID,'_ps_project_www',true);
	$project_url = get_post_meta($post->ID,'_ps_project_url',true);
	
	$project_gallery = get_post_meta($post->ID,'_ps_image_gallery',true);
	
	$thumb = get_the_post_thumbnail($post->ID,'portfolioGallery');
	$pattern= "/(?<=src=['|\"])[^'|\"]*?(?=['|\"])/i";
	preg_match($pattern, $thumb, $thePath);
	$theSrc = $thePath[0]

?>

<section class="mo-content">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="mo-animate" data-animate="fadeInLeft"><?php the_title(); ?></h3>
      <?php if($project_subtitle != '') { ?><p class="lead mo-animate" data-animate="fadeInUp"><?php echo esc_html($project_subtitle); ?></p><?php } ?>
    </div>
    
    <div class="large-12 columns">
      
      <?php switch($project_type) {
		  case "image":  ?>
      
      <ul class="img-shadow img-border mo-animate" data-animate="bounceIn">      
	      <li><img alt="" src="<?php echo esc_url($theSrc);?>"></li>  
      </ul>
      
      <?php
      	break;
		case "gallery":
	  ?>
      
      <ul class="portosingle-slide img-shadow img-border mo-animate" data-animate="bounceIn">      
       <?php
		  $attachments = array_filter( explode( ',', $project_gallery ) );
             if ( $attachments )
    	        foreach ( $attachments as $attachment_id ) {
					$image_data = wp_get_attachment_image_src( $attachment_id, 'portfolioGallery');
					$image_src = $image_data['0'];
	  	          echo '<li><img src="'.esc_url($image_src).'"></li>';
        	} 
			?>            
      </ul> 
      <?php break;  } ?>

    </div>
  </div>
  
  
  <div class="row">
    <div class="large-8 medium-7 medium-potrait-12 columns">
    <span class="heading-line mo-animate" data-animate="bounceIn"></span>
      <h4 class="mo-animate" data-animate="fadeInLeft"><?php _e('Project Detail','prodigystudio'); ?></h4>
  		<?php the_content(); ?>
    </div>
    
<div class="large-4 medium-5 medium-potrait-12 columns mo-animate" data-animate="fadeInRight">
<?php if($project_client != '' || $project_date != '' || $project_skills != '' ) : ?>
      <div class="panel fold">
        <h4>
          <?php _e('Client Info','prodigystydio'); ?>
        </h4>
        <ul class="list-type25 gap" data-bottom="10">
          <?php if($project_client != '') { echo '<li>'.__('Client - ','prodigystudio').esc_html($project_client).'</li>'; } ?>
          <?php if($project_date != '') { $project_date = date("M d, Y", $project_date); echo '<li>'.__('Date - ','prodigystudio').esc_html($project_date).'</li>'; } ?>
          <?php if($project_skills != '') { echo '<li>'.__('Skills - ','prodigystudio').$project_skills.'</li>'; } ?>
        </ul>
        <?php if($project_www != '' && $project_url != '') { ?>
        <a href="<?php echo esc_url($project_url); ?>" class="button small white radius"><?php echo esc_html($project_www); ?></a>
        <?php } ?>
      </div>
<?php endif; ?>

    </div>	    
  </div>
</section>

<?php echo ps_related_portfolio(); ?>
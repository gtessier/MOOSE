<?php
	$mp3_source = get_post_meta($post->ID, '_ps_mp3_file', true);
	$ogg_source = get_post_meta($post->ID, '_ps_ogg_file', true);
	$wav_source = get_post_meta($post->ID, '_ps_wav_file', true);
?>
<div class="mo-media audio">
  <audio controls>
	<?php if($mp3_source != '') { ?><source src="<?php echo esc_url($mp3_source); ?>"><?php } ?>
    <?php if($ogg_source != '') { ?><source src="<?php echo esc_url($ogg_source); ?>"><?php } ?>
    <?php if($wav_source != '') { ?><source src="<?php echo esc_url($wav_source); ?>"><?php } ?>    
  </audio>
</div>
<?php echo ps_excerpt(15); ?>
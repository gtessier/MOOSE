<?php
	$video_source = get_post_meta($post->ID, '_ps_post_video', true);
?>
<div class="blog-video">
  <?php echo apply_filters( 'get_the_content', $video_source ); ?>
</div>

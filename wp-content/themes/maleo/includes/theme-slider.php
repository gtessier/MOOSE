<?php
	global $post;
	
	$id = ( isset( $post->ID ) ? get_the_ID() : NULL );
		if ( isset( $id ) && get_post_meta( $id, '_ps_enable_rev', true) ) {
			$enable_rev = get_post_meta( $id, '_ps_enable_rev', true);
			$rev_aliase = get_post_meta( $id, '_ps_rev_alias', true);
		} 
		else {
			$enable_rev = 'disabled'; 
			$rev_aliase = '';
		}
	if($enable_rev == 'enabled') :   	
 ?>
<!-- Slideshow start here -->
<section id="slide-wrapper">
<?php 
	if(function_exists('putRevSlider')) {
		putRevSlider($rev_aliase);
	}
?>
</section>
<?php endif; ?>
<?php
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
?>

<?php 
get_header(); 
get_template_part('slider');
?>


	<!-- 404 -->
	<section id="fourohfour">
	
		<!-- Container -->
		<div class="container">
		
				<!-- Section Title -->
				<div class="sixteen columns section-title">
					<h1><?php _e( '404', 'appster' ); ?>
					<span><?php _e( 'page not found', 'appster' ); ?></span></h1>
					<div class="title-bullet"><span></span></div>
				</div>
										
		</div><!-- / Container -->
		
	</section><!-- / 404 -->

<?php get_footer(); ?>
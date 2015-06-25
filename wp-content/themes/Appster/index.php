<?php // The blog index

get_header(); 

?>

	<!-- Page Heading -->
	<section class="page-heading">	
	
		<div class="container">		
		
			<div class="sixteen columns">		
				<h1><?php _e( 'The Blog', 'appster' ); ?></h1>	
				
			</div>	
			
		</div>	
		
	</section>

	<!-- The Blog -->
	<section id="blog">

		<div class="container">	
		
			<!-- Posts -->
			<div class="eleven columns">
			
			<?php // The Loop
			if (have_posts()) : while (have_posts()) : the_post(); 
				$et_post_format = get_post_format(); 					
				get_template_part( 'content', $et_post_format ); 
			endwhile; endif; ?>

			<nav class="pagination">
				<?php next_posts_link(__('&larr; Older posts', 'appster')); ?>
				<?php previous_posts_link(__('Newer posts &rarr;', 'appster')); ?>
			</nav>				
			
			</div>
			
			<!-- Sidebar -->
			<div class="four columns offset-by-one">
			
				<?php get_sidebar(); ?>
				
			</div>			
		
		</div><!-- / Container -->

	</section><!-- / The Blog -->

<?php get_footer(); ?>
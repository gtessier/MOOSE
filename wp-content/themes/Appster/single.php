<?php // Single post

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
			
				<!-- Single Post -->
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">

							<?php // The Loop
							while ( have_posts() ) : the_post();
								global $et_post_format;
								get_template_part( 'content', $et_post_format );				
								et_post_nav(); 
								comments_template(); 
							endwhile; ?>

					</div>
				</div><!-- Single Post -->
				
			</div><!-- Single Post -->
				
			<!-- Sidebar -->
			<div class="four columns offset-by-one">
			
				<?php get_sidebar(); ?>
				
			</div>			
		
		</div><!-- / Container -->

	</section><!-- / The Blog -->				

<?php get_footer(); ?>
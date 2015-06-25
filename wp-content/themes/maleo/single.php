<?php
	get_header(); 
?>
<section class="mo-content">
    <div class="row">
	    <div class="large-8 medium-8 tp-12 columns">
		<?php while ( have_posts() ) : the_post(); 
        
				/*
				* Include the post format-specific template for the content. If you want to
				* use this in a child theme, then include a file called called content-___.php
				* (where ___ is the post format) and that will be used instead.
				*/
				get_template_part( 'content', get_post_format() );
			
			endwhile; 			
							
        ?>
		</div>
         <?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>

<?php
/*
Template Name: Page Without sidebat
*/ 
get_header(); 

?>
            <section class="mo-content">
                <?php while ( have_posts() ) : the_post();
				
				 get_template_part( 'content', 'page' ); 
				 
				 
				endwhile; // end of the loop. ?>
            </section>
            <!-- Content end here -->
<?php get_footer(); ?>
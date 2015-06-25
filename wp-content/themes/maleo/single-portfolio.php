<?php 
/**
 *
 * Single portfolio
 *
 **/
get_header(); 

?>
        <?php while ( have_posts() ) : the_post();
				 get_template_part( 'content', 'portfolio' ); 
   	    endwhile; // end of the loop. ?>
<?php get_footer(); ?>
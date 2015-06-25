<?php
/*
	Default page template
*/ 
get_header(); 

?>

          <!-- Content start here -->
    <section class="mo-content">
        <div class="row">
            <div class="large-8 medium-8 tp-12 columns">
                <?php while ( have_posts() ) : the_post();
				
				 get_template_part( 'content', 'page' ); 
				 
				endwhile; // end of the loop. ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </section>
    <!-- Content end here -->
<?php get_footer(); ?>
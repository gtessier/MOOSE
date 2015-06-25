<?php 
/*
	Template Name: Blog
*/ 
	global $ps_opts;
	$paginationStyle = $ps_opts['ps_pagination_style'];
	if($paginationStyle == '' ) {$paginationStyle = 'numeric';}
	
	get_header(); 

?>
    <!-- Content start here -->
    <section class="mo-content">
        <div class="row">
            <div class="large-8 medium-8 tp-12 columns">
		<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
			$args = array(
				'paged'=>$paged,
				'cat' =>'0'
			);
			query_posts($args);
					
//				if($blog_cats != '') { $args['cat'] = $blog_cats; } else { $args['cat'] = '0'; }
  //          if($excluded_cats != '') { $args['category__not_in'] = $excluded_cats; }
					
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
			endwhile;

				if($paginationStyle == 'numeric') {
					if(function_exists('wp_pagenavi')) wp_pagenavi();
				} 
				else { ?>
					<ul class="pagination">
                        <li class="alignleft"><?php previous_posts_link( '&laquo; Previous Entries' ); ?></li>
                        <li class="alignright"><?php next_posts_link( 'Next Entries &raquo;', '' ); ?></li>
					</ul>
				<?php }
				
				// Reset Query
					wp_reset_query();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
	
				endif;
						
					
					?>
                    </div>

            <?php get_sidebar(); ?>
        </div>
    </section>
    <!-- Content end here -->
<?php get_footer(); ?>
<?php
/**
 * The template used for displaying page content in page.php
 *
 * @since Maleo 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'webincode' ), 'after' => '</div>' ) ); 
		
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		
		?>
    </div><!-- .entry-content -->		
</article><!-- #post -->

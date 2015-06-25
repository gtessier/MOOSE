<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php woocommerce_content(); ?>
    </div><!-- .entry-content -->		
</article><!-- #post -->

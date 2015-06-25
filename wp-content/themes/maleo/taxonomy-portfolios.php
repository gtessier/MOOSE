<?php
/*
	Taxonomy Portfolios Page
*/ 

	global $ps_opts;
	if(isset($ps_opts['ps_portfolio_tax_columns'])) {$taxonomyColumns =  $ps_opts['ps_portfolio_tax_columns'];} else { $taxonomyColumns = '2';}
	
	get_header(); 

?>  
<section class="mo-content">
  <div class="row">
   
    <div class="large-12 columns">
    <ul class="portfolio-container large-block-grid-<?php echo esc_html($taxonomyColumns); ?> medium-block-grid-<?php echo esc_html($taxonomyColumns); ?> medium-potrait-block-grid-2 small-block-grid-2 small-potrait-block-grid-1 no-gutter gap" data-top="60" data-bottom="30">
	<?php 
		
		while ( have_posts() ) : the_post(); 
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'portfolioGrid' );
		$full_size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );
	
	?>
				
	 <li>
          <div class="mo-caption move">
              <img alt="" src="<?php echo esc_url($thumb['0']); ?>">
              <div class="mask"></div>
              <div class="content">
                  <a title="<?php the_title(); ?>" data-fancybox-group="gallery" href="<?php echo esc_url($full_size['0']); ?>" class="preview fancybox"> <i class="icon-search"></i> </a> 
                  <a href="<?php the_permalink(); ?>" class="permalink white"> <i class="icon-link"></i> </a> 
              </div>
          </div>
    </li>
				 
	<?php endwhile; // end of the loop. ?>        
      </ul>
    </div>
    <?php if(function_exists('wp_pagenavi')) wp_pagenavi();
			// Reset Query
			wp_reset_query();			
	?>
  </div>
</section>
<?php get_footer(); ?>
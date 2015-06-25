<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-info-left mo-animate" data-animate="fadeInLeft">
    <div class="post-info-description">
      <div class="date-post-info"><?php echo mysql2date('j',get_post()->post_date); ?> <small><?php echo mysql2date('M',get_post()->post_date); ?></small></div>
      <div class="image-post-info"><i class="icon-quote"></i></div>
    </div>
  </div>
  <?php
	$quote_content = get_post_meta($post->ID, '_ps_quote_content', true);
	$quote_source = get_post_meta($post->ID, '_ps_quote_source', true);
 ?>
  <div class="blog-content mo-animate" data-animate="bounceIn">
    <div class="quote-note">
      <blockquote>
        <p><?php echo esc_html($quote_content); ?></p>
        	<?php if($quote_source != '') { ?><cite><?php echo esc_html($quote_source); ?></cite> <?php } ?>
        </blockquote>
      <div class="clear"></div>
    </div>
    
    <a class="mo-animate" data-animate="fadeInDown" href="<?php the_permalink(); ?>">
            <h3 class="maleo-color"><?php the_title(); ?></h3>
    </a>
    
    <ul class="post-info mo-animate" data-animate="fadeInDown">
          <li><i class="icon-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></li>
          <li><i class="icon-tag"></i><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'prodigystudio' ) ); ?></li>
          <li><i class="icon-comment"></i><a href="<?php echo get_comments_link(); ?>"><?php echo get_comments_number(); ?></a></li>
        </ul>
    
<?php 
	if(!is_single() ) {
		if(!empty($post->post_excerpt)) :
			echo '<p class="mo-animate" data-animate="fadeInDown">'. get_the_excerpt(). '</p>';
			 echo '<a href="'.get_the_permalink().'" class="button link read-more mo-animate" data-animate="fadeInDown">'.__('Read more','prodigystudio').'<i class="icon-circleright"></i></a><div class="line-separator mo-animate" data-animate="bounceIn"><hr></div>';
		 else: 
			$page_content = apply_filters('the_content', $post->post_content); echo substr($page_content, 0, strpos($page_content, "<!--more-->"));
			if (strpos($post->post_content, '<!--more-->')) : ?>
                <a href="<?php the_permalink(); ?>" class="button link read-more mo-animate" data-animate="fadeInDown"> <?php _e('Read more', 'prodigystudio'); ?> <i class="icon-circleright"></i> </a>
                <div class="line-separator mo-animate" data-animate="bounceIn">
                  <hr>
                </div>
	<?php endif;
		endif;
	} else {
		the_content();
		
		prodigystudio_share_this();
				
		prodigystudio_author_info();
			
		comments_template();	  
	}
?>
</div>
</article>
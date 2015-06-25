<?php
 /*
	Template Name: Sitemap
*/ 

get_header(); 
?>


            <!-- Content start here -->
            <section class="mo-content">
                <div class="row">
                    <div class="large-4 medium-4 medium-potrait-6 columns">
                        <h3 class="mo-animate" data-animate="fadeInLeft">Pages</h3>
                        <ul class="list-type12 mo-animate" data-animate="fadeInLeft">
                        	<?php 
								$pages = get_pages(); 
								foreach ( $pages as $page ) {
								$option = '<li><a href="' . get_page_link( $page->ID ) . '">';
								$option .= $page->post_title;
								$option .= '</a></li>';
								echo $option;
							  }
							?>
                            <?php // wp_list_pages('title_li=&depth=1'); ?> 
                        </ul>   
                    </div>

                    <div class="large-4 medium-4 medium-potrait-6 columns">
                        <h3 class="mo-animate" data-animate="fadeInLeft">Blog Archives</h3>                
                       <h5 class="mo-animate" data-animate="fadeInLeft">Archives by Month</h5>
                       <ul class="list-type12 mo-animate" data-animate="fadeInLeft">
                            <?php wp_get_archives('type=monthly'); ?>
                        </ul>
                        
                       <h5 class="mo-animate" data-animate="fadeInLeft">Archives by Category</h5>
                       <ul class="list-type12 mo-animate" data-animate="fadeInLeft">
                            <?php wp_list_categories('title_li=&show_count=0'); ?>
                        </ul>
						<?php
                                if(get_the_tag_list()) {
                                        echo '<h5 class="mo-animate" data-animate="fadeInLeft">'._e('Archives by Tag','prodigystudio').'</h5>';
                                        echo get_the_tag_list('<ul  class="list-type12 mo-animate" data-animate="fadeInLeft"><li>','</li><li>','</li></ul>');
                                }
                        ?>
                        
                        <h5 class="mo-animate" data-animate="fadeInLeft">Archives by Author</h5>
                        <ul class="list-type12 mo-animate" data-animate="fadeInLeft">
                             <?php wp_list_authors('show_fullname=1'); ?> 
                        </ul>     
                        
                        <h5 class="mo-animate" data-animate="fadeInLeft"><?php _e('Feeds','prodigystudio'); ?></h5>
                        <ul class="list-type12 mo-animate" data-animate="fadeInLeft">
                            <li><a class="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main Rss</a></li>
                            <li><a class="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>
                        </ul>
                    </div>
					<div class="large-4 medium-4 medium-potrait-12 columns">
						<?php    
							$latest_posts = new WP_Query("showposts=20");
							if ($latest_posts->have_posts()) :			 ?>

	               <h3 class="mo-animate" data-animate="fadeInLeft">Latest 20 Posts</h3>
    	           <ul class="list-type12 mo-animate" data-animate="fadeInLeft">
                   					<?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							</ul>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- Content end here -->       
<?php
	get_footer(); 
?>        
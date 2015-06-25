<?php
	global $post;
	global $ps_opts;
	
	if(is_category()) {
			$category = get_the_category($post->ID);
			$custom_title = single_cat_title("", false);
		}
		elseif(is_tax()) {
			global $wp_query; 
			$term = $wp_query->get_queried_object(); 
			$custom_title = $term->name;			
		}
		elseif(is_author()) {
			$custom_title = __( 'All posts by ', 'prodigystudio' ).get_the_author();			
		}
		elseif(is_archive()) {
			if ( is_day() ) :
				 $custom_title = __( 'Daily Archives: ', 'prodigystudio' ).get_the_date();

			elseif ( is_month() ) :
				 $custom_title = __( 'Monthly Archives: ', 'prodigystudio' ).get_the_date( _x( 'F Y', 'monthly archives date format', 'prodigystudio' ));

			elseif ( is_year() ) :
				 $custom_title = __( 'Yearly Archives: ', 'prodigystudio' ).get_the_date( _x( 'Y', 'yearly archives date format', 'prodigystudio' )  );
				 
			elseif ( is_post_type_archive('product') ) :
				$shop_page_id = wc_get_page_id( 'shop' );
				$custom_title   = get_the_title( $shop_page_id ); 
			else :
				 $custom_title = __( 'Archives', 'twentyfourteen' );

				endif;			
		}
		
		
		
		elseif(is_search()) {
			if(!$ps_opts['ps_custom_search_title']) { $custom_title = __( 'Search for: ', 'prodigystudio').get_search_query(); } else {$custom_title = $ps_opts['ps_custom_search_title'].get_search_query();}
			
		}
		elseif(is_404()){ 			
			if(!$ps_opts['ps_custom_404_title']) { $custom_title = __('Page not Found','prodigystudio'); } else {$custom_title = $ps_opts['ps_custom_404_title'];}			
		}
		elseif(is_home()){ 			
			if(!$ps_opts['ps_custom_blog_title']) { $custom_title = __('Blog','prodigystudio'); } else {$custom_title = $ps_opts['ps_custom_blog_title'];}
		}
		else  {
			$custom_title = get_post_meta( $post->ID, '_ps_custom_title', true );
			if(!$custom_title) {$custom_title = get_the_title();}
		}
?>
<section class="mo-content" id="page-header">
  <div class="row">
    <div class="large-12 columns page-title mo-animate" data-animate="fadeInDown">
      <div class="heading-wrapper"> <span class="heading-line"></span> </div>
      <h3><?php echo esc_html($custom_title); ?></h3>
      <?php 
			//START BREADCRUMBS
			global $ps_opts;
			if(isset($ps_opts['ps_breadcrumbs'])) { $showBreadcrumbs = $ps_opts['ps_breadcrumbs'];} else { $showBreadcrumbs = '0'; }
			if($showBreadcrumbs == '1') {
		  ?>
		   
			<ol class="breadcrumb">
				<?php 
					global $post;					
					$portoflio_terms = '';
					$link_term = '';
					if(is_singular(array( 'portfolio')) || is_tax()) {$portoflio_terms = wp_get_object_terms($post->ID, 'portfolios');}
					if(is_array($portoflio_terms) && isset($portoflio_terms[0]) ) { 
						$p_term_name =  $portoflio_terms[0]->name; 									
						$link_term = get_term_link($portoflio_terms[0]->slug, 'portfolios'); 
						} 
							else 
						{
							$p_term_name = '';
							$link_term='';
						}
					if($link_term) { $extlink =  $link_term; } else {$extlink = '';}
					if( is_page()) : ps_get_breadcrumbs($post->ID, 0);
					elseif(is_search()) : ps_get_breadcrumbs(null, 0,__('Search Results'));
					elseif(is_home()) : ps_get_breadcrumbs(null, 0,__('Blog'));					
					elseif(is_404()) : ps_get_breadcrumbs(null, 0,__('404'));
					elseif(is_singular(array( 'portfolio')) ) : 
						ps_get_breadcrumbs($post->ID, 0, '', $p_term_name, $link_term);						
					elseif(is_single() ) : $catlist = wp_get_post_categories($post->ID); $count_cat = count($catlist);  
						$extname = '';
						$extlink = '';
						if($count_cat > 0)
							{
							   $cat = get_category($catlist[0]);
							   $extname = $cat->name;
							   $extlink = get_category_link($catlist[0]); 
							}      	
							ps_get_breadcrumbs($post->ID, 0, '', $extname, $extlink);
					elseif(is_category()): $categoryid = (get_query_var('cat')) ? get_query_var('cat') : '';
										   $category = get_category($categoryid);
							ps_get_breadcrumbs($post->ID, 0, ' '.$category->name);
					elseif(is_tax('portfolios')): 
							$portfolio_cat_slug = (get_query_var('portfolios')) ? get_query_var('portfolios') : '';
							$portfolio_cat_info = get_term_by('slug', $portfolio_cat_slug, 'portfolios', OBJECT); 
							ps_get_breadcrumbs($post->ID, 0, ' '.$portfolio_cat_info->name);
					elseif(is_tax('product_cat')): 
							$portfolio_cat_slug = (get_query_var('product_cat')) ? get_query_var('product_cat') : '';
							$portfolio_cat_info = get_term_by('slug', $portfolio_cat_slug, 'product_cat', OBJECT); 
							ps_get_breadcrumbs($post->ID, 0, ' '.$portfolio_cat_info->name);
							
					elseif(is_author()) : ps_get_breadcrumbs(null, 0,get_the_author());
					elseif(is_post_type_archive('product')) : 
						$shop_page_id = wc_get_page_id( 'shop' );
            			$page_title   = get_the_title( $shop_page_id ); 
						ps_get_breadcrumbs(null, 0, $page_title );
					elseif(is_archive()) : ps_get_breadcrumbs(null, 0,__('Archive'));
					endif;
					
				?>
				</ol>

		   <?php } //END BREADCRUMBS ?>
      
    </div>
  </div>
</section>

<?php
/*
	WooCommerce page template
*/ 
get_header(); 

?>
          <!-- Content start here -->
    <section class="mo-content">
        <div class="row">
            <div class="large-12 medium-12 tp-12 columns">
              <?php  
				 	get_template_part( 'content', 'woocommerce' ); 
				 ?>
            </div>
        </div>
    </section>
    <!-- Content end here -->
<?php get_footer(); ?>
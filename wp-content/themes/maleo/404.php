<?php
	get_header(); 
?>
            <!-- Content start here -->
            <section class="mo-content">
                <div class="row">
                    <div class="large-6 medium-6 medium-potrait-push-2 medium-potrait-10 small-12 small-center columns">
                        <div id="error404-left">
                            <h1 class="mo-animate" data-animate="shake"><?php _e('oops! 404','prodigystudio');?> <i class="icon-ghost"></i></h1>
                            <p class=" mo-animate" data-animate="fadeInDown"><?php _e('The page you are looking for might have been removed<br/>had its name changed or is temporarily unavailable','prodigystudio');?></p>
                            <a href="<?php echo home_url();?>" class="button mo-animate radius" data-animate="bounceIn"><?php _e('Go to Homepage','prodigystudio')?></a>
                        </div>
                    </div>
                    
                    <div class="large-push-1 large-5 medium-push-1 medium-5 medium-potrait-push-2 medium-potrait-7 small-12 columns">                    
                        <div id="error404-right">
                            <div class="panel fold mo-animate" data-animate="bounceIn">
                                <h4><?php _e('Alternative links','prodigystudio')?></h4>
                                <ul class="list-type25">
                               <?php 
								$args = array(
									'depth' => 1,
									'title_li'  => '', 
								);
								wp_list_pages( $args ); 
								?>
                                </ul>
                            </div>
                        </div>                    
                    </div>     
                </div>
            </section>
            <!-- Content end here -->
<?php 
	get_footer(); 
?>
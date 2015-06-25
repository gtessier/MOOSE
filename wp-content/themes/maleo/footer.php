<?php 
	global $ps_opts;
	if(!empty($ps_opts['ps_custom_logo_footer']['url'])) {$footerLogo = $ps_opts['ps_custom_logo_footer']['url'];   } else { $footerLogo = get_template_directory_uri().'/img/logo-footer.png'; }
	$showFooterLogo = $ps_opts['ps_logo_type_footer'];
?>  
<footer>
        <?php
        	if(isset($ps_opts['ps_social_footer']) && $ps_opts['ps_social_footer'] != '0') {
			$socialLabel = $ps_opts['ps_social_label'];	
			$footerSocials = $ps_opts['ps_footer_social_links'];
		?>
        <section class="social-bg-content">
            <div class="mo-contentfull content-bg" id="footer-bg">
            <div class="rowfull">
               <div class="left-bg"></div>
               <div class="right-bg"></div>
            </div>
         </div>
            <div class="row">
                <div class="large-3 medium-3 columns get-connect medium-potrait-hide small-hide">
                    <h6><?php echo esc_html($socialLabel); ?></h6>
                </div>
                <div class="large-9 medium-9 columns medium-potrait-12 social-content">
                    <ul class="social-icon cube">
                        <?php 
							foreach($footerSocials as $key => $url) {
								if($url) {
									echo '<li>
											<div class="front"><a class="social-'.esc_html($key).'" href="'.esc_url($url).'"></a></div>
											<div class="back"><a class="social-'.esc_html($key).'" href="'.esc_url($url).'"></a></div>
										</li>';							
								}
							}
							
						?>
                    </ul>
                </div>
            </div>
        </section> 
        <?php } ?>
        
        <?php 
		$footers = $ps_opts['ps_footer_layout'];
	    if ( ( is_active_sidebar( 'footer-1' ) ||
    		   is_active_sidebar( 'footer-2' ) ||
		       is_active_sidebar( 'footer-3' ) ||
		       is_active_sidebar( 'footer-4' ) ) && $footers > 0 ) {
		
		$columnsNumber = array(
			'0' => '12',
			'1' => '12',
			'2' => '6',
			'3' => '4',
			'4' => '3'
		)		   
	    ?>        

         <section class="mo-content footer-content">            
            <div class="row">
			<?php $i = 0; 
				while ( $i < $footers ) { $i++; 
					if($i == 1 && !is_active_sidebar( 'footer-' . $i )) { ?>
						<div class="large-<?php echo esc_html($columnsNumber[$footers]); ?> medium-<?php echo esc_html($columnsNumber[$footers]); ?> medium-potrait-12 columns">
                          <div class="footer-logo"> 
                          <?php if($showFooterLogo != 'none') { ?>
                              <a href="<?php echo home_url('/'); ?>"> <img src="<?php echo esc_url($footerLogo); ?>" alt="<?php echo bloginfo('name'); ?>" class="retina"> </a> 
                         <?php } ?>
                              <span class="logo-text"><?php $footer_copyright = $ps_opts['ps_footer_copyright']; if($footer_copyright) { echo do_shortcode(esc_html($footer_copyright)); } ?></span> 
                          </div>
                          
                        </div>
					<?php } elseif ( is_active_sidebar( 'footer-' . $i ) ) { ?>
						<div class="large-<?php echo esc_html($columnsNumber[$footers]); ?> medium-<?php echo esc_html($columnsNumber[$footers]); ?> medium-potrait-12 columns">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
				<?php } 
			} 			
			if(isset($ps_opts['ps_arrow_top']) && $ps_opts['ps_arrow_top'] != '0') {
			?>
			   <div class="scroll-top">
				  <a id="top" class="scroll"><i class="icon-chevron-up"></i></a>
			   </div>
		  <?php } ?> 
               
            </div>            
         </section>
         
      <?php }; ?>       
      </footer>

<div style="clear:both;"></div>
   </div>      

<?php wp_footer(); ?>
</body>
</html>
<?php $et_showcase_display = ot_get_option('et_showcase_display'); 
if( $et_showcase_display !="off" ) { ?>

	<!-- Showcase -->
	<section class="showcase-wrap" id="<?php echo ot_get_option('et_showcase_id'); ?>">	

			<?php if ( function_exists( 'ot_get_option' ) ) {						  
			$et_showcases = ot_get_option( 'et_showcases', array() );						  
				if ( ! empty( $et_showcases ) ) {
					foreach( $et_showcases as $et_showcase ) {
					 echo	'<section class="showcase '. $et_showcase['et_showcase_contrast'] .' '. $et_showcase['et_showcase_align'] .'">
								<div class="container">
									<div class="nine columns showcase-content">
										<h1>'. $et_showcase['et_showcase_title_large'] .'<span>'. $et_showcase['et_showcase_title_small'] .'</span></h1>
										<div class="title-bullet"><span></span></div>
										<div class="showcase-desc">'. $et_showcase['et_showcase_desc'] .'</div>
									</div>
									<div class="seven columns showcase-model">
										<img src="'. $et_showcase['et_showcase_img'] .'" alt="'. $et_showcase['title'] .'" />
									</div>					
								</div>
							</section>';
					}
				}
			} ?>
			
			<!-- Animations -->
			<script type="text/javascript">
				(function($) { "use strict";
					$(document).ready(function(){					
						$('.showcase').each(function(){
							$(this).waypoint(function(){
								$(this).find('.showcase-model > img').addClass('animated <?php echo ot_get_option('et_showcase_anim'); ?>').css({'opacity':'1','filter':'alpha(opacity=100)'});
							}, {offset: 400});
						});						
					});
				})(jQuery);				
			</script>			
			
			
			
		
	</section><!-- / Showcase -->

<?php } ?>
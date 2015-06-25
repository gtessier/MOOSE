<?php global $et_animations; ?>

<?php $et_intro_display = ot_get_option('et_intro_display'); 
if( $et_intro_display !="off" ) { ?>

<!-- Intro -->
<?php $et_intro_bg = ot_get_option('et_intro_bg'); ?>
<section class="slider" id="<?php echo ot_get_option('et_intro_id'); ?>" style="background-image: url('<?php echo $et_intro_bg; ?>');">

	<!-- Container -->
	<div class="container">
	

              <div id="owl-demo" class="owl-carousel">
                
					<?php if ( function_exists( 'ot_get_option' ) ) {						  
					$et_islides = ot_get_option( 'et_intro_slider', array() );						  
						if ( ! empty( $et_islides ) ) {
							foreach( $et_islides as $et_islide ) {
							 echo	'	<div class="owl-item">
											<div class="slide-content">
												<h1>'. $et_islide['et_intro_heading_one'] .'</h1>
												<h2>'. $et_islide['et_intro_heading_two'] .'</h2>
												<div>'. $et_islide['et_intro_desc'] .'</div>
											</div>
											<div class="slide-model">
												<img class="slide-model-a" alt="' . $et_islide['title'] . '" src="'. $et_islide['et_intro_image_one'] .'">						
												<img class="slide-model-b" alt="' . $et_islide['title'] . '" src="'. $et_islide['et_intro_image_two'] .'">		
											</div>	
										</div>';
							}
						}
					} ?>
				
              </div>

		<!-- Animations -->
		<script type="text/javascript">
			(function($) { "use strict";
				$(document).ready(function(){
				
					$(".owl-item").each(function(){
						$(this).children(".slide-content").addClass("animated <?php echo ot_get_option('et_intro_desc_anim'); ?>");
						$(this).children(".slide-model").children(".slide-model-a").addClass("animated <?php echo ot_get_option('et_intro_model_a_anim'); ?>");
						$(this).children(".slide-model").children(".slide-model-b").addClass("animated <?php echo ot_get_option('et_intro_model_b_anim'); ?>");
					});
				});
			})(jQuery);				
		</script>	
	
	</div><!-- / Container -->

</section><!-- / Slider -->
<?php } ?>
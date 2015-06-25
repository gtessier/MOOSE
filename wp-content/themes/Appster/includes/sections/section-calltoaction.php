<?php $et_cta_display = ot_get_option('et_cta_display'); 
if( $et_cta_display !="off" ) { ?>
		
	<!-- Call to Action -->
	<section class="call-to-action" data-stellar-background-ratio="-0.5" id="<?php echo ot_get_option('et_cta_id'); ?>" style="background-image: url('<?php echo ot_get_option('et_cta_bg'); ?>');">
	
		<!-- Overlay -->
		<div class="overlay"></div>
	
		<!-- Container -->
		<div class="container">

			<div class="sixteen columns call-to-action-content">
				<?php $et_cta_content = ot_get_option('et_cta_content'); 
				echo do_shortcode( $et_cta_content ); ?>
				<?php $et_cta_btn_text = ot_get_option('et_cta_btn_text'); 
				if( $et_cta_btn_text != "" ) {?>
					<p style="text-align: center;"><a href="<?php echo ot_get_option('et_cta_btn_link'); ?>" class="button white cta-btn"><?php echo $et_cta_btn_text; ?></a></p>
				<?php } ?>				
			</div>
								
			<!-- Animations -->
			<script type="text/javascript">
				(function($) { "use strict";
					$(document).ready(function(){
						$('section.call-to-action').waypoint(function(){
							$('.cta-btn').addClass('animated <?php echo ot_get_option('et_cta_btn_anim'); ?>');
						}, {offset: 400});				
					});
				})(jQuery);				
			</script>			
		
		</div><!-- / Container -->
	
	</section><!-- / Call to Action -->

<?php } ?>
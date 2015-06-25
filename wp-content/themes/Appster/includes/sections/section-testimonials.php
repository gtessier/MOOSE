<?php $et_testimonials_display = ot_get_option('et_testimonials_display'); 
if( $et_testimonials_display !="off" ) { ?>
		
	<!-- Testimonials -->
	<?php $et_testimonials_bg = ot_get_option('et_testimonials_bg'); ?>
	<section class="testimonials" id="<?php echo ot_get_option('et_testimonials_id'); ?>" style="background-image: url('<?php echo $et_testimonials_bg; ?>');">
	
		<!-- Overlay -->
		<div class="overlay"></div>
	
		<!-- Container -->
		<div class="container">	

			<div class="sixteen columns">
				<span class="quote-sign"></span>
			</div>
			
			<!-- Testimonial -->
			<div class="sixteen columns">
			<?php if ( function_exists( 'ot_get_option' ) ) {
			$et_testimonials = ot_get_option( 'et_testimonials', array() );
			$et_testimonials_anim = ot_get_option('et_testimonials_anim');
				if ( ! empty( $et_testimonials ) ) {
					foreach( $et_testimonials as $et_testimonial ) {
					 echo	'<blockquote class="quote-slide">
								<h3>'. $et_testimonial['et_testimonials_desc'] .'</h3>
								<small>
									<span class="px-divider"></span> <span class="client-name">'. $et_testimonial['title'] .'</span> <span class="px-divider"></span>
								</small>
							</blockquote>';
					}
				}
			} ?></div>
			
			<div class="sixteen columns">
				<!-- Controls -->
				<div class="quote-slider-controls"></div>
			</div>
			
			<!-- Animations -->
			<script type="text/javascript">
				(function($) { "use strict";
					$(document).ready(function(){
						$('section.testimonials').waypoint(function(){
							$('.quote-slide').addClass('animated <?php echo ot_get_option('et_testimonials_anim'); ?>');
						}, {offset: 400});				
					});
				})(jQuery);				
			</script>			
	
		</div><!-- / Container -->
	
	</section><!-- / Testimonials -->	

<?php } ?>
<?php global $et_animations; ?>

<?php $et_magnifier_display = ot_get_option( 'et_magnifier_display' );
$et_tablet_zoomer_img = ot_get_option( 'et_tablet_zoomer_img' ); 
if( $et_magnifier_display != "off") { ?>

	<!-- Magnifier -->	
	<section class="tablet-magnifier <?php echo ot_get_option('et_magnifier_contrast'); ?>" id="<?php echo ot_get_option('et_magnifier_id'); ?>">
		<div class="container">
	
			<div class="sixteen columns zoomer">
				<div class="zoomer-frame">
					<a class="zoomer-image" href="<?php echo $et_tablet_zoomer_img ?>">
					  <img src="<?php echo $et_tablet_zoomer_img ?>" alt="Zoomer Image" />
					</a>
				</div>
			</div>
			
			<div class="clear"></div>

		</div><!-- / Container -->

		<!-- Zoomer Bg & Shadow -->			
		<div class="zoomer-bg" data-stellar-background-ratio="0.7" style="background-image: url('<?php echo ot_get_option('et_tablet_zoomer_bg'); ?>');">
			<div class="overlay"></div>
		</div><div class="zoomer-shadow"></div>
		
		
	</section><!-- / Magnifier -->

	<!-- Animations -->
	<script type="text/javascript">
		(function($) { "use strict";
			$(document).ready(function(){
				$('section.tablet-magnifier').waypoint(function(){
					$('.zoomer-frame').addClass('animated <?php echo ot_get_option('et_tablet_frame_anim'); ?>');
				}, {offset: 400});				
			});
		})(jQuery);				
	</script>
		
<?php } ?>
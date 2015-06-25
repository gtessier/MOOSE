<?php $et_screenshots_display = ot_get_option('et_screenshots_display'); 
if( $et_screenshots_display != "off" ) { ?>

	<!-- Shots -->
	<section class="shots <?php echo ot_get_option('et_screenshots_contrast'); ?>" id="<?php echo ot_get_option('et_screenshots_id'); ?>">
	
		<!-- Container -->
		<div class="container">
		
			<!-- Section Title -->
			<?php $et_screenshots_title_large = ot_get_option('et_shots_title_large'); 
			$et_screenshots_title_small = ot_get_option('et_shots_title_small');
			if( $et_screenshots_title_large || $et_screenshots_title_small != "" ) { ?>
				<div class="sixteen columns section-title">
					<h1><?php echo ot_get_option('et_shots_title_large'); ?><span><?php echo ot_get_option('et_shots_title_small'); ?></span></h1>
					<div class="title-bullet"><span></span></div>			
				</div>
			<?php } ?>
	
			<!-- Screenshot -->
			<?php if ( function_exists( 'ot_get_option' ) ) {
			$et_screenshots = ot_get_option( 'et_shots', array() );
				if ( ! empty( $et_screenshots ) ) {
					foreach( $et_screenshots as $et_screenshot ) {
					 echo	'<div class="four columns">
								<div class="screenshot">
									<img src="'. $et_screenshot['et_shots_img'] .'" alt="'. $et_screenshot['title'] .'" />
									<div class="overlay"></div>
									<i class="fa fa-plus screenshot-zoom"></i>
								</div>
							</div>';
					}
				}
			} ?>
			
			<!-- Animations -->
			<script type="text/javascript">
				(function($) { "use strict";
					$(document).ready(function(){
						$('.shots').waypoint(function(){
							$('.screenshot').addClass('animated <?php echo ot_get_option('et_screenshots_anim'); ?>').css({'opacity':'1','filter':'alpha(opacity=100)'});
						}, {offset: 400});						
					});
				})(jQuery);				
			</script>			
	
		<!-- Lightbox -->
		<div class="lightbox">
			<span class="lightbox-close">
				<i class="fa fa-times"></i>
			</span>
			<img src="assets/img/shots/screenshot_01.jpg" alt="App Screenshot" />
		</div>
		
		<!-- Lightbox Overlay-->
		<div class="lightbox-overlay"></div>

		</div><!-- / Container -->
	
	</section><!-- / Shots -->	

<?php } ?>
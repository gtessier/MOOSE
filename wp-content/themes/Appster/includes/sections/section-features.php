<?php $et_features_display = ot_get_option('et_features_display'); 
if( $et_features_display !="off" ) { ?>
		
	<!-- Features -->
	<section class="features <?php echo ot_get_option('et_features_contrast'); ?>" id="<?php echo ot_get_option('et_features_id'); ?>">
	
		<!-- Container -->
		<div class="container">

			<?php $et_features_title_large = ot_get_option('et_features_title_large'); 
			$et_features_title_small = ot_get_option('et_features_title_small');
			if( $et_features_title_large || $et_features_title_small != "" ) { ?>
			<div class="sixteen columns section-title">
				<h1><?php echo ot_get_option('et_features_title_large'); ?><span><?php echo ot_get_option('et_features_title_small'); ?></span></h1>
				<div class="title-bullet"><span></span></div>			
			</div><?php } ?>
		
			<!-- Icon Boxes -->
			<?php if ( function_exists( 'ot_get_option' ) ) {						  
			$et_feature_icon_boxes = ot_get_option( 'et_feature_icon_boxes', array() );
				if ( ! empty( $et_feature_icon_boxes ) ) {
					foreach( $et_feature_icon_boxes as $et_feature_icon_box ) {
						echo '<div class="one-third column feature-icon-box">
						<i class="fa '. $et_feature_icon_box['et_feature_icon'] .'"></i>
						<h3>'. $et_feature_icon_box['title'] .'</h3>
						<p>'. $et_feature_icon_box['et_feature_desc'] .'</p>
						</div>';
					}
				}
			} ?>

			<!-- Animations -->
			<script type="text/javascript">
				(function($) { "use strict";
					$(document).ready(function(){
						$('section.features').waypoint(function(){
							$('.feature-icon-box').addClass('animated <?php echo ot_get_option('et_features_anim'); ?>');
						}, {offset: 600});				
					});
				})(jQuery);				
			</script>
			
		</div><!-- / Container -->	
	
	</section><!-- / Features -->	
<?php } ?>
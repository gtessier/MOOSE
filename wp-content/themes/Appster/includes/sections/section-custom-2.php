<?php $et_custom_2_display = ot_get_option('et_custom_2_display'); 
if( $et_custom_2_display !="off" ) { ?>
		
	<!-- custom -->
	<section class="custom-section <?php echo ot_get_option('et_custom_2_contrast'); ?>" id="<?php echo ot_get_option('et_custom_2_id'); ?>">
	
		<!-- Container -->
		<div class="container">

			<?php $et_custom_2_title_large = ot_get_option('et_custom_2_title_large'); 
			$et_custom_2_title_small = ot_get_option('et_custom_2_title_small');
			if( $et_custom_2_title_large || $et_custom_2_title_small != "" ) { ?>
			<div class="sixteen columns section-title">
				<h1><?php echo ot_get_option('et_custom_2_title_large'); ?><span><?php echo ot_get_option('et_custom_2_title_small'); ?></span></h1>
				<div class="title-bullet"><span></span></div>			
			</div><?php } ?>
		
			<?php $et_custom_2_content = ot_get_option('et_custom_2_content'); 
			echo do_shortcode( $et_custom_2_content ); ?>			
							
		</div><!-- / Container -->	
	
	</section><!-- / Custom 2 -->	
<?php } ?>
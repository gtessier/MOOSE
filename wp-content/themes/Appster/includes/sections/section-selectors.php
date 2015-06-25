<?php $et_selector_display = ot_get_option('et_selector_display'); 
if( $et_selector_display !="off" ) { ?>

	<!-- Feature Selectors -->
	<section class="feature-selectors <?php echo ot_get_option('et_selector_contrast'); ?>" id="<?php echo ot_get_option('et_selector_id'); ?>">
	
		<!-- Container -->
		<div class="container">
		
			<!-- Selector Buttons -->
			<div class="eight columns selector-contents">
				
				<!-- Section Title -->
				<?php $et_selector_title_large = ot_get_option('et_selector_title_large'); 
				$et_selector_title_small = ot_get_option('et_selector_title_small');
				if( $et_selector_title_large || $et_selector_title_small != "" ) { ?>
					<div class="sixteen columns section-title">
						<h1><?php echo ot_get_option('et_selector_title_large'); ?><span><?php echo ot_get_option('et_selector_title_small'); ?></span></h1>
						<div class="title-bullet"><span></span></div>			
					</div>
				<?php } ?>	

				<!-- Buttons -->
				<ul class="feature-selector-buttons">			
				<?php if ( function_exists( 'ot_get_option' ) ) {
				$et_selectors = ot_get_option( 'et_selectors', array() );
					if ( ! empty( $et_selectors ) ) {
						foreach( $et_selectors as $et_selector ) {
						 echo	'<li data-fselector=" ">
									<span class="selector-body"><i class="fa '. $et_selector['et_selector_icon'] .'"></i>'. $et_selector['title'] .'</span>
									<span class="selector-triangle"></span>
								</li>';
						}
					}
				} ?></ul>

			</div><!-- / Selector Buttons -->	
		
			<!-- Selector Images -->
			<div class="eight columns">
				<div class="feature-selector-frame">
					<div class="feature-selector-mask">
					<?php if ( function_exists( 'ot_get_option' ) ) {
					$et_selectors = ot_get_option( 'et_selectors', array() );
						if ( ! empty( $et_selectors ) ) {
							foreach( $et_selectors as $et_selector ) {
							 echo	'<img src="'. $et_selector['et_selector_img'] .'" alt="'. $et_selector['title'] .'" data-fselector=" " />';
							}
						}
					} ?></div>
				</div>
			</div>
		
		</div><!-- / Container -->
	
	</section><!-- Feature Selectors -->

<?php } ?>
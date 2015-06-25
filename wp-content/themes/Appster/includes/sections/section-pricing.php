<?php $et_pricing_display = ot_get_option('et_pricing_display'); 
if( $et_pricing_display != "off" ) { ?>
	
	<!-- Pricing -->
	<section class="pricing <?php echo ot_get_option('et_pricing_contrast'); ?>" id="<?php echo ot_get_option('et_pricing_id'); ?>">
	
		<!-- Container -->
		<div class="container">
		
			<?php $et_pricing_title_large = ot_get_option('et_pricing_title_large'); 
			$et_pricing_title_small = ot_get_option('et_pricing_title_small');
			if( $et_pricing_title_large || $et_pricing_title_small != "" ) { ?>
			<div class="sixteen columns section-title">
				<h1><?php echo ot_get_option('et_pricing_title_large'); ?><span><?php echo ot_get_option('et_pricing_title_small'); ?></span></h1>
				<div class="title-bullet"><span></span></div>			
			</div><?php } ?>	

			<!-- Pricing Tables -->
			<?php if ( function_exists( 'ot_get_option' ) ) {
			$et_pricing_tables = ot_get_option( 'et_pricing', array() );
			$et_pricing_layout = ot_get_option('et_pricing_layout');
				if ( ! empty( $et_pricing_tables ) ) {
					foreach( $et_pricing_tables as $et_pricing_table ) {
					 echo	'<div class="'. $et_pricing_layout .'">
								<div class="price-table '. $et_pricing_table['et_pricing_emphasize'] .'">
									<header class="price-table-header">
										<h3>'. $et_pricing_table['title'] .'</h3>
										<span>'. $et_pricing_table['et_pricing_price'] .'</span>
									</header>
									<div class="price-table-body">
										<ul>
											<li><i class="fa '. $et_pricing_table['et_pricing_feature_one_icon'] .'"></i>'. $et_pricing_table['et_pricing_feature_one_text'] .'</li>
											<li><i class="fa '. $et_pricing_table['et_pricing_feature_two_icon'] .'"></i>'. $et_pricing_table['et_pricing_feature_two_text'] .'</li>
											<li><i class="fa '. $et_pricing_table['et_pricing_feature_three_icon'] .'"></i>'. $et_pricing_table['et_pricing_feature_three_text'] .'</li>
											<li><i class="fa '. $et_pricing_table['et_pricing_feature_four_icon'] .'"></i>'. $et_pricing_table['et_pricing_feature_four_text'] .'</li>
										</ul>
										<a href="'. $et_pricing_table['et_pricing_btn_link'] .'" class="button color">'. $et_pricing_table['et_pricing_btn_text'] .'</a>
									</div>
								</div>
							</div>';
					}
				}
			} ?>			
			
		</div><!-- / Container -->	
	
	</section><!-- / Pricing -->

<?php } ?>
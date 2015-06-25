<?php $et_counters_display = ot_get_option('et_counters_display'); 
if( $et_counters_display !="off" ) { ?>
		
	<!-- Counters -->
	<section class="counters <?php echo ot_get_option('et_counters_contrast'); ?>" id="<?php echo ot_get_option('et_counters_id'); ?>" style="background-image: url('<?php echo ot_get_option('et_counters_bg'); ?>'); background-repeat: no-repeat; background-size: cover; -webkit-background-size: cover;">                
	
		<!-- Container -->
		<div class="container">
		
			<?php if ( function_exists( 'ot_get_option' ) ) {
			$et_counters = ot_get_option( 'et_counters', array() );
			$et_counters_anim = ot_get_option('et_counters_anim');
				if ( ! empty( $et_counters ) ) {
					foreach( $et_counters as $et_counter ) {
						echo	'<div class="four columns counter">
									<h4 data-from="0" data-to="'. $et_counter['et_counters_amount'] .'">'. $et_counter['et_counters_amount'] .'</h4>
									<span>'. $et_counter['title'] .'</span>
								</div>';
					}
				}
			} ?>		
		
		</div><!-- / Container -->
	
	</section><!-- Counters -->

<?php } ?>
<?php $et_clients_display = ot_get_option('et_clients_display'); 
if( $et_clients_display !="off" ) { ?>
		
	<!-- Clients -->
	<section class="clients <?php echo ot_get_option('et_clients_contrast'); ?>" id="<?php echo ot_get_option('et_clients_id'); ?>">                
	
		<!-- Container -->
		<div class="container">
		
			<?php if ( function_exists( 'ot_get_option' ) ) {
			$et_clients = ot_get_option( 'et_clients', array() );
			$et_clients_anim = ot_get_option('et_clients_anim');
				if ( ! empty( $et_clients ) ) {
					foreach( $et_clients as $et_client ) {
					 echo	'<div class="four columns">
								<a class="client-link" href="'. $et_client['et_clients_link'] .'" target="_blank">
								<img src="'. $et_client['et_clients_img'] .'" alt="'. $et_client['title'] .'" class="client-logo" />
								</a>
							</div>';
					}
				}
			} ?>		
		
		</div><!-- / Container -->
	
	</section><!-- / Clients -->

<?php } ?>
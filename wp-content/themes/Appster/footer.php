
	<!-- Socials Bar -->	
	<?php $et_socials_display = ot_get_option('et_footer_socials_display'); 
	if( $et_socials_display != "off" ) {?>
	<section class="social-networks" id="social-networks">
		<div class="container">
			<div class="sixteen columns">
				<ul class="social-network-links">
					<?php if ( function_exists( 'ot_get_option' ) ) {						  
					$et_socials = ot_get_option( 'et_footer_socials', array() );						  
						if ( ! empty( $et_socials ) ) {
							foreach( $et_socials as $et_social ) {
							 echo	'<li><a href="'. $et_social['et_footer_socials_link'] .'"><i class="fa '. $et_social['et_footer_socials_icon'] .'"></i></a></li>';
							}
						}
					} ?>					
				</ul>
			</div>		
		</div>	
	</section><?php } ?>
		
	<!-- Contact Bar -->
	<?php $et_contact_display = ot_get_option('et_footer_contact_display'); 
	if( $et_contact_display != "off" ) { ?>
	<section class="subscribe" id="<?php echo ot_get_option('et_contact_id'); ?>">
		<div class="container">
						
			<!-- Mailchimp Subscribe Form -->
			<?php $et_contact_type = ot_get_option('et_footer_contact_type'); 
			if( $et_contact_type == "subscribe_form" ) { ?>
			<div class="sixteen columns subscribe-form">
				<h2><?php echo ot_get_option('et_mailchimp_title'); ?></h2>
				<div id="mc_embed_signup">
					<form action="<?php echo ot_get_option('et_mailchimp_unique_link'); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<input type="email" value="" name="EMAIL" class="email textfield" id="mce-EMAIL" placeholder="<?php echo ot_get_option('et_mailchimp_placeholder'); ?>" required>
						<input type="submit" value="<?php echo ot_get_option('et_mailchimp_btn'); ?>" name="subscribe" id="mc-embedded-subscribe" class="button color">
					</form>
				</div>
			</div><?php } ?>
			
			<!-- Contact Form 7 Form -->
			<?php if( $et_contact_type == "contact_form" ) { ?>			
			<div class="sixteen columns contact-form">
				<h2><?php echo ot_get_option('et_contact_form_title'); ?></h2>
				<?php $et_contact_form_code = ot_get_option('et_contact_form_code'); 
				echo do_shortcode( $et_contact_form_code ); ?>
			</div><?php } ?>
						
		</div>	
	</section><?php } ?>
	
	<!-- Animations -->
	<script type="text/javascript">
		(function($) { "use strict";
			$(document).ready(function(){
				$('section.subscribe').waypoint(function(){
					$('.contact-form').addClass('animated <?php echo ot_get_option('et_contact_anim'); ?>');
				}, {offset: 400});				
			});
		})(jQuery);				
	</script>	
	
	<!-- Copyright Bar -->
	<?php $et_footer_copyright = ot_get_option('et_footer_copyright_text'); 
	if( $et_footer_copyright !="" ) { ?>
	<footer class="footer" id="footer">	
		<div class="container"><h6 class="copyright-text"><?php echo $et_footer_copyright ?></h6></div>	
	</footer><?php } ?>
	
</div><!-- / Site Wrapper -->

	<!--[if IE]>
		<script type="text/javascript">			
			(function($) { "use strict";
				$(document).ready(function(){
					$(".site-wrapper, .magnifier, .zoomer-frame").css('opacity','1');
					$(".wpcf7-submit").css('display','block');
					$(".lightbox img").css('display','block');
					$(".lightbox i").click(function(){
						$(".lightbox, .lightbox-overlay").hide();
					});
				});
			})(jQuery);			
		</script>
	<![endif]-->
	
<!-- End Document
================================================== -->
<?php wp_footer(); ?>
</body>
</html>
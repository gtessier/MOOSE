<?php $et_team_display = ot_get_option('et_team_display'); 
if( $et_team_display !="off" ) { ?>

	<!-- Team -->
	<section class="team <?php echo ot_get_option('et_team_contrast'); ?>" id="<?php echo ot_get_option('et_team_id'); ?>">
	
		<!-- Container -->
		<div class="container">

			<!-- Section Title -->
			<?php $et_team_title_large = ot_get_option('et_team_title_large'); 
			$et_team_title_small = ot_get_option('et_team_title_small');
			if( $et_team_title_large || $et_team_title_small != "" ) { ?>
			<div class="sixteen columns section-title">
				<h1><?php echo ot_get_option('et_team_title_large'); ?><span><?php echo ot_get_option('et_team_title_small'); ?></span></h1>
				<div class="title-bullet"><span></span></div>			
			</div><?php } ?>	
						
			<?php if ( function_exists( 'ot_get_option' ) ) {						  
			$et_team_members = ot_get_option( 'et_team_members', array() );	
			$et_team_layout = ot_get_option('et_team_layout');			
				if ( ! empty( $et_team_members ) ) {
					foreach( $et_team_members as $et_team_member ) {
					 echo	'<div class="'. $et_team_layout .'">
								<div class="team-member">
									<div class="team-member-image">
										<img src="'. $et_team_member['et_team_member_img'] .'" alt="'. $et_team_member['title'] .'" />
									</div>
									<span class="team-member-bullet"><i class="fa fa-plus"></i></span>
									<div class="team-member-desc">
										<h5>'. $et_team_member['title'] .'</h5>
										<div class="team-member-dropdown">
											<p>'. $et_team_member['et_team_member_desc'] .'</p>
											<ul class="team-member-socials">
												<li><a href="'. $et_team_member['et_team_member_facebook_link'] .'"><i class="fa fa-facebook-square"></i></a></li>
												<li><a href="'. $et_team_member['et_team_member_twitter_link'] .'"><i class="fa fa-twitter-square"></i></a></li>
												<li><a href="'. $et_team_member['et_team_member_google_link'] .'"><i class="fa fa-google-plus-square"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>';
					}
				}
			} ?>		
		
		</div><!-- / Container -->
	
	</section><!-- Team -->

<?php } ?>
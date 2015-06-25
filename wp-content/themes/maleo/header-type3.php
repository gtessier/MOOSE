<?php 
	global $ps_opts;
	if(!empty($ps_opts['ps_custom_logo']['url'])) {$customLogo = $ps_opts['ps_custom_logo']['url'];   } else { $customLogo = get_template_directory_uri().'/img/logo-alternative.png'; }
	if(isset($ps_opts['ps_sticky_header']) && $ps_opts['ps_sticky_header'] != 0) {$stickyHeader = 'sticky-menu';} else {$stickyHeader = '';}
?>
<header class="header3 <?php echo $stickyHeader; ?>">
         <div class="header-content">
            <div class="row">
               <div class="large-3 medium-3 medium-potrait-4 small-12 columns logo-content">
                  <div class="logo">
                     <a href="<?php echo home_url('/'); ?>"><img src="<?php echo $customLogo; ?>" alt="<?php bloginfo('name'); ?>" class="retina" /></a>
                  </div>
               </div>

               <div class="large-9 medium-9 medium-potrait-8 small-12 columns menu-move-sticky">
                  
                  <?php if(isset($ps_opts['ps_enable_search'])) { $showSearchIcon = $ps_opts['ps_enable_search'];} else { $showSearchIcon = '0'; }; 
		          if($showSearchIcon == '1') {	
					?>
                  <div class="toggle-search-wrapper">
                     <div class="toggle-search search-header3"><i class="icon-search"></i></div>
                  </div>   
                  <?php }; ?>

                  <div class="search-content">
                  <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                     <div class="input-group">
                        <input type="text" value="" name="s" id="s" class="form-control" placeholder="<?php echo esc_attr(__('type and hit enter','prodigystudio')); ?>">
                        <span class="input-group-addon toggle-search search-header3 active"><i class="icon-search"></i></span>
                     </div>
                 </form>
                  </div>                                    
               </div>
            </div>
         </div>

         <div class="menu-content-wrapper">
            <div class="row">
               <div class="large-12 columns">
                  <nav class="menu-content">
                      <?php 
			if (has_nav_menu( 'ps_primary_menu' )) { 
				wp_nav_menu(array(
							'container' => '',
							'container_class' => 'menu-primary-container',
							'theme_location' => 'ps_primary_menu',
							'menu_class' => 'sm mo-menu',
							'menu_id' => 'menu',
							'walker' => new PSMenuWalker()															
						));
			}					
			else {
					echo ps_no_menu_message();
			}
			?>
                  </nav>
                  <div class="client-content small-hide">
                  <?php if(isset($ps_opts['ps_enable_login'])) { $showLoginLink = $ps_opts['ps_enable_login'];} else { $showLoginLink = '0'; }; 
		          if($showLoginLink == '1') {	
					?>
                     <ul>
                     	<?php echo ps_login_head(); ?>
                     </ul>
                     <?php }; ?>
                     <div class="login-panel">
                        <form id="login" action="login" method="post">
                           <h5><?php _e('Login to your Account','prodigystudio'); ?></h5>
                           <p class="status"></p>
                           <div class="form-group name-ico">
                              <input name="username" type="text" class="form-control" id="username" placeholder="username">
                           </div>

                           <div class="form-group email-ico">
                              <input id="password" type="password" name="password" class="form-control" placeholder="password">
                           </div>
                           
                           <div class="form-group">
                              <a class="lost" href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost your password?','prodigystudio'); ?></a>
                           </div>

                           <div class="form-inline submit-content">
                              <button type="submit" class="button radius button-block small"><?php _e('Login','prodigystudio'); ?> <i class="icon-circleright"></i></button>
                           </div>
                           <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                        </form>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </header>
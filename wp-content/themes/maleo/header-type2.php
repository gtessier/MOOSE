<?php 
	global $ps_opts;
	if(!empty($ps_opts['ps_custom_logo']['url'])) {$customLogo = $ps_opts['ps_custom_logo']['url'];   } else { $customLogo = get_template_directory_uri().'/img/logo-alternative.png'; }
	if(isset($ps_opts['ps_sticky_header']) && $ps_opts['ps_sticky_header'] != 0) {$stickyHeader = 'sticky-menu';} else {$stickyHeader = '';}
?>
<header class="header2 <?php echo $stickyHeader; ?>">
         <div class="header-content">
            <div class="row">
               <div class="large-6 medium-6 medium-potrait-6 small-12 columns">
                  
                  <?php
                  	if(isset($ps_opts['ps_additional_info']) && !empty($ps_opts['ps_additional_info'])) {
					$headerAddInfo = $ps_opts['ps_additional_info'];						
				  ?>
                  <ul class="header-info">
                  	<?php
                    	foreach($headerAddInfo as $key => $addInfo) {
							if($addInfo) {	
								echo '<li><i class="icon-'.esc_html($key).'"></i>'.esc_html($addInfo).'</li>';						
							}
						}
					?>
                  </ul>
                  <?php }; ?>
                  
               </div>
               
               <?php if(isset($ps_opts['ps_social_header']) && $ps_opts['ps_social_header'] != '0') { ?>
               <div class="large-6 medium-6 medium-potrait-6 small-hide columns">
                  <ul class="social-header social-icon hover-social">
			   <?php 
                    $socialHeader = $ps_opts['ps_header_social_links'];
                    foreach($socialHeader as $key => $url) {
                        if($url) {
                            echo '<li><a class="social-'.esc_html($key).'" href="'.esc_url($url).'"></a></li>';							
                        }
                    }	
                ?>                     
                  </ul>
               </div>
               <?php } ?>
               
            </div>
         </div>
         <div class="row">
            <div class="large-3 medium-3 medium-potrait-12 columns logo-content">
               <div class="logo">
                  <a href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url($customLogo); ?>" alt="<?php bloginfo('name'); ?>" class="retina" /></a>
               </div>
            </div>

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
               <ul class="header-info1">   
                  <?php if(!empty($ps_opts['ps_header_phone_text'])) {?>
	        <li class="phone-info"> <i class="icon-phoneold"></i> <a href="tel:<?php echo esc_attr($ps_opts['ps_header_phone_text']); ?>"><?php echo esc_html($ps_opts['ps_header_phone_text']); ?></a> </li>
        <?php }; ?>
        <?php if(isset($ps_opts['ps_enable_search']) && $ps_opts['ps_enable_search'] != '0' ) { ?>
                  <li class="toggle-search">
                     <i class="icon-search"></i>
                  </li>
           <?php } ?>
               </ul>
            </nav>

            <div class="large-9 medium-9 medium-potrait-12 columns search-content">
               <form action="#">   
                  <div class="input-group">
                     <input type="text" name="search" class="form-control input-search" placeholder="search">
                     <span class="input-group-addon toggle-search"><i class="icon-search"></i></span>
                  </div>
               </form>
            </div>
         </div>
      </header>
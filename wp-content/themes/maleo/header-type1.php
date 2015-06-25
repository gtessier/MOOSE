<?php 
	global $ps_opts;
	if(!empty($ps_opts['ps_custom_logo']['url'])) {$customLogo = $ps_opts['ps_custom_logo']['url'];   } else { $customLogo = get_template_directory_uri().'/img/logo.png'; }
	if(isset($ps_opts['ps_sticky_header']) && $ps_opts['ps_sticky_header'] != 0 ) {$stickyHeader = 'class="sticky-menu"';} else {$stickyHeader = '';}
?>
<!--Star header-->
<header <?php echo $stickyHeader; ?>>
  <div class="mo-contentfull" id="header-bg">
    <div class="rowfull">
      <div class="left-bg"></div>
      <div class="right-bg"></div>
    </div>
  </div>
  <div class="row">
    <div class="large-3 medium-3 medium-potrait-12 small-12 columns logo-content">
      <div class="logo"> <a href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url($customLogo); ?>" alt="<?php bloginfo('name'); ?>" class="retina" /></a> </div>
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
        <?php if(isset($ps_opts['ps_enable_search'])) { $showSearchIcon = $ps_opts['ps_enable_search'];} else { $showSearchIcon = '0'; }; 
	          if($showSearchIcon == '1') {	
		?>
        	<li class="toggle-search"> <i class="icon-search"></i> </li>
        <?php }; ?>
        
      </ul>
    </nav>
    <div class="large-9 medium-9 medium-potrait-12 small-12 columns search-content">
      <?php get_search_form(); ?>
    </div>
  </div>
</header>

<?php



global $et_animations;
$et_animations = array(
	array('value'   => 'no-anim',           'label' => 'none'),
	array('value'   => 'flash',     	    'label' => 'flash'),
	array('value'   => 'bounce',     	    'label' => 'bounce'), 
	array('value'   => 'shake',     	    'label' => 'shake'),
	array('value'   => 'tada',      		'label' => 'tada'),
	array('value'   => 'swing',             'label' => 'swing'), 
	array('value'   => 'wobble',    	    'label' => 'wobble'), 
	array('value'   => 'pulse',             'label' => 'pulse'), 
	array('value'   => 'flip',              'label' => 'flip'), 
	array('value'   => 'flipInX',           'label' => 'flipInX'), 
	array('value'   => 'flipInY',           'label' => 'flipInY'), 
	array('value'   => 'fadeIn',            'label' => 'fadeIn'), 
	array('value'   => 'fadeInUp',          'label' => 'fadeInUp'), 
	array('value'   => 'fadeInDown',        'label' => 'fadeInDown'), 
	array('value'   => 'fadeInLeft',        'label' => 'fadeInLeft'), 
	array('value'   => 'fadeInRight',       'label' => 'fadeInRight'), 
	array('value'   => 'fadeInUpBig',       'label' => 'fadeInUpBig'), 
	array('value'   => 'fadeInDownBig',     'label' => 'fadeInDownBig'), 
	array('value'   => 'fadeInLeftBig',     'label' => 'fadeInLeftBig'), 
	array('value'   => 'fadeInRightBig',    'label' => 'fadeInRightBig'), 
	array('value'   => 'bounceIn',          'label' => 'bounceIn'), 
	array('value'   => 'bounceInDown',      'label' => 'bounceInDown'), 
	array('value'   => 'bounceInUp',        'label' => 'bounceInUp'), 
	array('value'   => 'bounceInLeft',      'label' => 'bounceInLeft'), 
	array('value'   => 'bounceInRight',     'label' => 'bounceInRight'), 
	array('value'   => 'rotateIn',          'label' => 'rotateIn'), 
	array('value'   => 'rotateInDownLeft',  'label' => 'rotateInDownLeft'), 
	array('value'   => 'rotateInDownRight', 'label' => 'rotateInDownRight'), 
	array('value'   => 'rotateInUpLeft',    'label' => 'rotateInUpLeft'), 
	array('value'   => 'rotateInUpRight',   'label' => 'rotateInUpRight'), 
	array('value'   => 'rollIn',            'label' => 'rollIn') 	
);



/**
 * Initialize the custom Theme Options.
 */
add_action( 'admin_init', 'et_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function et_theme_options() {

  global $et_animations;

  $saved_settings = get_option( 'option_tree_settings', array() );

  $custom_settings = array( 
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => sprintf( __( '%s General', 'appster' ), '<span class="et-nav-icon" style="background-position: 0 -71px;"></span>' )
      ),
      array(
        'id'          => 'intro',
        'title'       => sprintf( __( '%s Intro', 'appster' ), '<span class="et-nav-icon" style="background-position: 0 -217px;"></span>' )
      ),
      array(
        'id'          => 'features',
        'title'       => sprintf( __( '%s Features', 'appster' ), '<span class="et-nav-icon" style="background-position: -327px -144px"></span>' )
      ),
      array(
        'id'          => 'magnifier',
        'title'       => sprintf( __( '%s Magnifier', 'appster' ), '<span class="et-nav-icon" style="background-position: -254px -71px;"></span>' )
      ),
      array(
        'id'          => 'showcase',
        'title'       => sprintf( __( '%s Showcase', 'appster' ), '<span class="et-nav-icon" style="background-position: -109px -580px;"></span>' )
      ),
      array(
        'id'          => 'screenshots',
        'title'       => sprintf( __( '%s Screenshots', 'appster' ), '<span class="et-nav-icon" style="background-position: -290px -471px;"></span>' )
      ),
      array(
        'id'          => 'testimonials',
        'title'       => sprintf( __( '%s Testimonials', 'appster' ), '<span class="et-nav-icon" style="background-position:  -328px -1089px;"></span>' )
      ),
      array(
        'id'          => 'selector',
        'title'       => sprintf( __( '%s Selector', 'appster' ), '<span class="et-nav-icon" style="background-position: -141px -580px"></span>' )
      ),
      array(
        'id'          => 'team',
        'title'       => sprintf( __( '%s Team', 'appster' ), '<span class="et-nav-icon" style="background-position:  -109px -143px;"></span>' )
      ),
      array(
        'id'          => 'clients',
        'title'       => sprintf( __( '%s Clients', 'appster' ), '<span class="et-nav-icon" style="background-position: -109px 0px;"></span>' )
      ),	  
      array(
        'id'          => 'pricing',
        'title'       => sprintf( __( '%s Pricing', 'appster' ), '<span class="et-nav-icon" style="background-position: -37px -144px;"></span>' )
      ),
      array(
        'id'          => 'counters',
        'title'       => sprintf( __( '%s Counters', 'appster' ), '<span class="et-nav-icon" style="background-position: -254px -180px;"></span>' )
      ),	  
      array(
        'id'          => 'cta',
        'title'       => sprintf( __( '%s Call to Action', 'appster' ), '<span class="et-nav-icon" style="background-position: -328px -1016px;"></span>' )
      ),
      array(
        'id'          => 'custom',
        'title'       => sprintf( __( '%s Custom Section', 'appster' ), '<span class="et-nav-icon" style="background-position: 0 -109px;"></span>' )
      ),
      array(
        'id'          => 'custom_2',
        'title'       => sprintf( __( '%s Custom 2 Section', 'appster' ), '<span class="et-nav-icon" style="background-position: 0 -109px;"></span>' )
      ),	  
      array(
        'id'          => 'footer',
        'title'       => sprintf( __( '%s Footer', 'appster' ), '<span class="et-nav-icon" style="background-position: 0px -726px;"></span>' )
      )	  
    ),
    'settings'        => array(
	  /* ================================================================
	     GENERAL
	  ================================================================ */	  
      array(
        'id'          => 'et_logo',
        'label'       => __( 'Site Logo', 'appster' ),
        'desc'        => __( 'Upload your logo (120x25px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_login_logo',
        'label'       => __( 'Login Logo', 'appster' ),
        'desc'        => __( 'Upload your wp login logo (100x45px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_favicon',
        'label'       => __( 'Site Favicon', 'appster' ),
        'desc'        => __( 'Upload site favicon (16x16px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_color_scheme',
        'label'       => __( 'Color Scheme', 'appster' ),
        'desc'        => __( 'Choose color scheme for the site', 'appster' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),      
	  array(
        'id'          => 'et_body_font_color',
        'label'       => __( 'Body Font Color', 'appster' ),
        'desc'        => __( 'Choose font color for body texts', 'appster' ),
        'std'         => 'A6A6A6',
        'type'        => 'colorpicker',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_backtop_btn_display',
		'label'       => __( 'Back Top Button', 'appster' ),
		'desc'        => __( 'Display back top button', 'appster' ),
		'std'         => 'yes',
		'type'        => 'radio',
		'section'     => 'general',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'yes',
			'label'       => __( 'Yes', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'no',
			'label'       => __( 'No', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
	  array(
		'id'          => 'et_navbar_layout',
		'label'       => __( 'Navigation Layout', 'appster'),
		'desc'        => __( 'Choose navigation bar layout', 'appster'),
		'std'         => 'yes',
		'section'     => 'general',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'yes',
			'label'       => __( 'Display color section in menu', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'no',
			'label'       => __( 'Hide color section in menu', 'appster' ),
			'src'         => ''
		  )
		)		
	  ),
      array(
        'id'          => 'et_responsive_enable',
        'label'       => __( 'Responsiveness', 'appster' ),
        'desc'        => __( 'Enable / Disable responsivity', 'appster' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	     
	  array(
        'id'          => 'et_site_load_anim',
        'label'       => __( 'Site Loading Anim', 'appster' ),
        'desc'        => __( 'Enable / Disable site loading progress bar', 'appster' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
        'id'          => 'et_site_load_anim_icon',
        'label'       => __( '', 'appster' ),
        'desc'        => __( 'Type the name of the loading icon', 'appster' ),
        'std'         => 'fa-code',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'et_home_sections',
        'label'       => __( 'Home Sections', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_add_home_section',
            'label'       => __( 'Icon', 'appster' ),
            'desc'        => __( 'Select a section', 'appster'),
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => 'section-intro',
				'label'       => __( 'Intro Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-features',
				'label'       => __( 'Features Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-magnifier',
				'label'       => __( 'Magnifier Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-showcase',
				'label'       => __( 'Showcase Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-screenshots',
				'label'       => __( 'Screenshots Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-testimonials',
				'label'       => __( 'Testimonials Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-selectors',
				'label'       => __( 'Selectors Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-team',
				'label'       => __( 'Team Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-pricing',
				'label'       => __( 'Pricing Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-counters',
				'label'       => __( 'Counters Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-clients',
				'label'       => __( 'Clients Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-custom',
				'label'       => __( 'Custom Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-custom-2',
				'label'       => __( 'Custom 2 Section', 'appster' )
			  ),
			  array(
				'value'       => 'section-calltoaction',
				'label'       => __( 'Call to Action Section', 'appster' )
			  ),			  
			)			
          ),		  
        )
      ),	  
	  
	  
	  /* ================================================================
	     INTRO
	  ================================================================ */
      array(
        'id'          => 'et_intro_display',
        'label'       => __( 'Intro Section', 'appster' ),
        'desc'        => __( 'Display intro section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'intro',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_intro_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'intro',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'et_intro_bg',
        'label'       => __( 'Intro Background', 'appster' ),
        'desc'        => __( 'Upload background image (2000x615px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'intro',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_intro_slider',
        'label'       => __( 'Intro Slider', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'intro',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_intro_heading_one',
            'label'       => __( 'Intro heading 1', 'appster' ),
            'desc'        => __( 'Intro heading first line', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),          
		  array(
            'id'          => 'et_intro_heading_two',
            'label'       => __( '', 'appster' ),
            'desc'        => __( 'Intro heading second line', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
		  array(
            'id'          => 'et_intro_desc',
            'label'       => __( 'Intro heading', 'appster' ),
            'desc'        => __( 'Intro heading second line', 'appster'),
            'std'         => '',
            'type'        => 'textarea',
            'rows'        => '6',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
		  array(
			'id'          => 'et_intro_image_one',
			'label'       => __( 'Intro Images', 'appster' ),
			'desc'        => __( 'Upload first intro image (430x500px optional)', 'appster' ),
			'std'         => '',
			'type'        => 'upload',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),		  
		  array(
			'id'          => 'et_intro_image_two',
			'label'       => __( '', 'appster' ),
			'desc'        => __( 'Upload second intro image (430x500px optional)', 'appster' ),
			'std'         => '',
			'type'        => 'upload',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),  
		),
	),
	  array(
		'id'          => 'et_intro_desc_anim',
		'label'       => __( 'Intro Texts Anim', 'appster' ),
		'desc'        => __( 'Intro texts animation', 'appster'),
		'std'         => '',
		'type'        => 'select',
		'section'     => 'intro',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations
	  ),	  
	  array(
		'id'          => 'et_intro_model_a_anim',
		'label'       => __( 'Model Images Anim', 'appster' ),
		'desc'        => __( 'Model image A animation', 'appster'),
		'std'         => '',
		'type'        => 'select',
		'section'     => 'intro',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations
	  ),	  
	  array(
		'id'          => 'et_intro_model_b_anim',
		'label'       => __( '', 'appster' ),
		'desc'        => __( 'Model image B animation', 'appster'),
		'std'         => '',
		'type'        => 'select',
		'section'     => 'intro',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations
	  ),		
	
	
	  

	  /* ================================================================
	     FEATURES
	  ================================================================ */
      array(
        'id'          => 'et_features_display',
        'label'       => __( 'Features Section', 'appster' ),
        'desc'        => __( 'Display features section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'features',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_features_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'features',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'et_features_title_large',
		'label'       => __( 'Section Title', 'appster' ),
		'desc'        => __( 'Large highlighted word', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'features',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_features_title_small',
		'label'       => '',
		'desc'        => __( 'The rest of the title', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'features',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),	  
	  array(
		'id'          => 'et_features_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'features',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),	  
      array(
        'id'          => 'et_feature_icon_boxes',
        'label'       => __( 'Icon Boxes', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'features',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_feature_icon',
            'label'       => __( 'Icon', 'appster' ),
            'desc'        => __( 'Type the name of the wished icon. See the <a href="http://fontawesome.io/icons/" target="_blank">icon reference</a> for details.', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_feature_desc',
            'label'       => __( 'Description', 'appster' ),
            'desc'        => __( 'Enter description for this icon box', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )		  
        )
      ),
	  array(
		'id'          => 'et_features_anim',
		'label'       => 'Icon Boxes Animation',
		'desc'        => __( 'Choose animation for icon boxes', 'appster'),
		'std'         => '',
		'section'     => 'features',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations			
	  ),
	  /* ================================================================
	     MAGNIFIER
	  ================================================================ */
      array(
        'id'          => 'et_magnifier_display',
        'label'       => __( 'Magnifier Section', 'appster' ),
        'desc'        => __( 'Display magnifier section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'magnifier',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_magnifier_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'magnifier',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'et_magnifier_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'magnifier',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
      array(
        'id'          => 'et_tablet_zoomer_bg',
        'label'       => '',
        'desc'        => __( 'Upload background image for section (2000x900px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'magnifier',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_tablet_frame_anim',
		'label'       => __( 'Tablet Zoomer', 'appster'),
		'desc'        => __( 'Tablet zoomer animation', 'appster'),
		'std'         => '',
		'section'     => 'magnifier',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations			
	  ),	  
      array(
        'id'          => 'et_tablet_zoomer_img',
        'label'       => '',
        'desc'        => __( 'Upload image for tablet zoomer (1024x482px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'magnifier',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  	  
	  /* ================================================================
	     SHOWCASE
	  ================================================================ */	  
      array(
        'id'          => 'et_showcase_display',
        'label'       => __( 'Showcases Section', 'appster' ),
        'desc'        => __( 'Display showcases section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'showcase',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_showcase_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'showcase',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'et_showcases',
        'label'       => __( 'Showcases', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'showcase',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_showcase_title_large',
            'label'       => __( 'Section Title', 'appster' ),
            'desc'        => __( 'Large highlighted word', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_showcase_title_small',
            'label'       => '',
            'desc'        => __( 'The rest of the title', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
		  array(
			'id'          => 'et_showcase_contrast',
			'label'       => __( 'Section Contrast', 'appster' ),
			'desc'        => '',
			'std'         => 'light',
			'type'        => 'radio',
			'section'     => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => 'light',
				'label'       => __( 'Light', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'dark',
				'label'       => __( 'Dark', 'appster' ),
				'src'         => ''
			  )
			)
		  ),
		  array(
			'id'          => 'et_showcase_align',
			'label'       => __( 'Alignment', 'appster' ),
			'desc'        => '',
			'std'         => 'right',
			'type'        => 'radio',
			'section'     => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => 'right',
				'label'       => __( 'Image on the right', 'appster' ),
				'src'         => ''
			  ),			
			  array(
				'value'       => 'left',
				'label'       => __( 'Image on the left', 'appster' ),
				'src'         => ''
			  )
			)
		  ),
          array(
            'id'          => 'et_showcase_desc',
            'label'       => __( 'Description', 'appster'),
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_showcase_img',
            'label'       => 'Model Image',
            'desc'        => __( 'Upload showcase model image  (382x416px optional)', 'appster'),
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
        )
      ),
	  array(
		'id'          => 'et_showcase_anim',
		'label'       => __( 'Showcase Images Animation', 'appster'),
		'desc'        => __( 'Choose animation for model images', 'appster'),
		'std'         => '',
		'type'        => 'select',
        'section'     => 'showcase',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations			
	  ),	  
	  /* ================================================================
	     SCREENSHOTS
	  ================================================================ */
      array(
        'id'          => 'et_screenshots_display',
        'label'       => __( 'Screenshots Section', 'appster' ),
        'desc'        => __( 'Display screenshots section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'screenshots',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_screenshots_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'screenshots',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'et_shots_title_large',
		'label'       => __( 'Section Title', 'appster' ),
		'desc'        => __( 'Large highlighted word', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'screenshots',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_shots_title_small',
		'label'       => '',
		'desc'        => __( 'The rest of the title', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'screenshots',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),	  
	  array(
		'id'          => 'et_screenshots_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'screenshots',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
	  array(
		'id'          => 'et_screenshots_anim',
		'label'       => 'Screenshots Animation',
		'desc'        => __( 'Choose animation for screenshots', 'appster'),
		'std'         => '',
		'section'     => 'screenshots',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations			
	  ),
      array(
        'id'          => 'et_shots',
        'label'       => __( 'Screenshots', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'screenshots',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_shots_img',
            'label'       => __( 'Image', 'appster' ),
            'desc'        => __( 'Upload screenshot image (560x560px optional)', 'appster'),
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
        )
      ),	  
	  /* ================================================================
	     TESTIMONIALS
	  ================================================================ */	  
      array(
        'id'          => 'et_testimonials_display',
        'label'       => __( 'Testimonials Section', 'appster' ),
        'desc'        => __( 'Display testimonials section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'testimonials',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_testimonials_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'testimonials',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_testimonials_bg',
        'label'       => __( 'Background Image', 'appster' ),
        'desc'        => __( 'Upload background image (2000x900px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'testimonials',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'blue_overlay',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'et_testimonials',
        'label'       => __( 'Testimonials', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'testimonials',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_testimonials_desc',
            'label'       => __( 'Quote', 'appster' ),
            'desc'        => __( 'Add text for this quote', 'appster'),
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
        )
      ),
	  array(
		'id'          => 'et_testimonials_anim',
		'label'       => __( 'Testimonials Animation', 'appster'),
		'desc'        => __( 'Choose animation for quotes', 'appster'),
		'std'         => '',
		'section'     => 'testimonials',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations			
	  ),	  
	  /* ================================================================
	    SELECTORS
	  ================================================================ */	  
      array(
        'id'          => 'et_selector_display',
        'label'       => __( 'Selectors Section', 'appster' ),
        'desc'        => __( 'Display testimonials section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'selector',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_selector_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'selector',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_selector_title_large',
		'label'       => __( 'Section Title', 'appster' ),
		'desc'        => __( 'Large highlighted word', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'selector',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_selector_title_small',
		'label'       => '',
		'desc'        => __( 'The rest of the title', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'selector',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_selector_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'dark',
		'type'        => 'radio',
		'section'     => 'selector',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),	  
      array(
        'id'          => 'et_selectors',
        'label'       => __( 'Feature Selectors', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'selector',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_selector_icon',
            'label'       => __( 'Icon', 'appster' ),
            'desc'        => __( 'Type the name of the wished icon. See the <a href="http://fontawesome.io/icons/" target="_blank">icon reference</a> for details.', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		
          array(
            'id'          => 'et_selector_img',
            'label'       => __( 'Image', 'appster' ),
            'desc'        => __( 'Upload image for feature (220x385px optional)', 'appster'),
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
        )
      ),	  
	  /* ================================================================
	    TEAM
	  ================================================================ */
      array(
        'id'          => 'et_team_display',
        'label'       => __( 'Team Section', 'appster' ),
        'desc'        => __( 'Display team section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'team',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_team_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'team',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_team_title_large',
		'label'       => __( 'Section Title', 'appster' ),
		'desc'        => __( 'Large highlighted word', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'team',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_team_title_small',
		'label'       => '',
		'desc'        => __( 'The rest of the title', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'team',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_team_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'team',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
	  array(
		'id'          => 'et_team_layout',
		'label'       => __( 'Layout', 'appster' ),
		'desc'        => __( 'Choose team members layout', 'appster' ),
		'std'         => 'one-third column',
		'type'        => 'radio-image',
		'section'     => 'team',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'eight columns',
			'label'       => __( 'Two Columns', 'appster' ),
			'src'         => 'http://www.eriktailor.com/tf_assets/et_framework/2col.png'
		  ),
		  array(
			'value'       => 'one-third column',
			'label'       => __( 'Three Columns', 'appster' ),
			'src'         => 'http://www.eriktailor.com/tf_assets/et_framework/3col.png'
		  ),
		  array(
			'value'       => 'four columns',
			'label'       => __( 'Four Columns', 'appster' ),
			'src'         => 'http://www.eriktailor.com/tf_assets/et_framework/4col.png'
		  )
		)
	  ),	  
      array(
        'id'          => 'et_team_members',
        'label'       => __( 'Team Members', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'team',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_team_member_img',
            'label'       => __( 'Member Avatar', 'appster' ),
            'desc'        => __( 'Upload team member avatar (300x200px optional)', 'appster'),
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_team_member_desc',
            'label'       => __( 'Description', 'appster' ),
            'desc'        => __( 'Add brief description for member', 'appster'),
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_team_member_facebook_link',
            'label'       => __( 'Social Links', 'appster' ),
            'desc'        => __( 'Facebook profile url', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_team_member_twitter_link',
            'label'       => '',
            'desc'        => __( 'Twitter profile url', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_team_member_google_link',
            'label'       => '',
            'desc'        => __( 'Google+ profile url', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
        )
      ),
	  /* ================================================================
	     TWITTER FEED
	  ================================================================ */	  
      array(
        'id'          => 'et_twitter_display',
        'label'       => __( 'Twitter Feed Section', 'appster' ),
        'desc'        => __( 'Display twitter feed section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'twitter',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_twitter_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_twitter_bg',
        'label'       => __( 'Background Image', 'appster' ),
        'desc'        => __( 'Upload background image', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'twitter',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_twitter_consumer_key',
        'label'       => __( 'Twitter Api Keys', 'appster' ),
        'desc'        => __( 'Consumer key', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_twitter_consumer_secret',
        'label'       => '',
        'desc'        => __( 'Consumer secret', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_twitter_access_token',
        'label'       => '',
        'desc'        => __( 'Access token', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_twitter_access_secret',
        'label'       => '',
        'desc'        => __( 'Access secret', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'twitter',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  /* ================================================================
	    CLIENTS
	  ================================================================ */
      array(
        'id'          => 'et_clients_display',
        'label'       => __( 'Clients Section', 'appster' ),
        'desc'        => __( 'Display clients section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'clients',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_clients_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'clients',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_clients_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'clients',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
      array(
        'id'          => 'et_clients',
        'label'       => __( 'Clients', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'clients',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_clients_img',
            'label'       => __( 'Client Logo', 'appster' ),
            'desc'        => __( 'Upload client logo (150x75px optional)', 'appster'),
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),          
		  array(
            'id'          => 'et_clients_link',
            'label'       => __( 'Client Website', 'appster' ),
            'desc'        => __( 'Link to the website of client', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
        )
      ),	  
	  /* ================================================================
	    PRICING
	  ================================================================ */
      array(
        'id'          => 'et_pricing_display',
        'label'       => __( 'Pricing Section', 'appster' ),
        'desc'        => __( 'Display pricing section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'pricing',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_pricing_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pricing',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_pricing_title_large',
		'label'       => __( 'Section Title', 'appster' ),
		'desc'        => __( 'Large highlighted word', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'pricing',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_pricing_title_small',
		'label'       => '',
		'desc'        => __( 'The rest of the title', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'pricing',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_pricing_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'pricing',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
	  array(
		'id'          => 'et_pricing_layout',
		'label'       => __( 'Layout', 'appster' ),
		'desc'        => __( 'Choose pricing table layout', 'appster' ),
		'std'         => 'one-third column',
		'type'        => 'radio-image',
		'section'     => 'pricing',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'eight columns',
			'label'       => __( 'Two Columns', 'appster' ),
			'src'         => 'http://www.eriktailor.com/tf_assets/et_framework/2col.png'
		  ),
		  array(
			'value'       => 'one-third column',
			'label'       => __( 'Three Columns', 'appster' ),
			'src'         => 'http://www.eriktailor.com/tf_assets/et_framework/3col.png'
		  ),
		  array(
			'value'       => 'four columns',
			'label'       => __( 'Four Columns', 'appster' ),
			'src'         => 'http://www.eriktailor.com/tf_assets/et_framework/4col.png'
		  )
		)
	  ),
      array(
        'id'          => 'et_pricing',
        'label'       => __( 'Pricing Tables', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'pricing',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 		
          array(
            'id'          => 'et_pricing_price',
            'label'       => __( 'Price', 'appster' ),
            'desc'        => __( 'Enter price for this pricing table', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_one_text',
            'label'       => __( 'Features', 'appster' ),
            'desc'        => __( 'Enter first feature', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_one_icon',
            'label'       => '',
            'desc'        => __( 'First feature icon name', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_two_text',
            'label'       => '',
            'desc'        => __( 'Enter second feature', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_two_icon',
            'label'       => '',
            'desc'        => __( 'Second feature icon name', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_three_text',
            'label'       => '',
            'desc'        => __( 'Enter third feature', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_three_icon',
            'label'       => '',
            'desc'        => __( 'Third feature icon name', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_four_text',
            'label'       => '',
            'desc'        => __( 'Enter fourth feature', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_feature_four_icon',
            'label'       => '',
            'desc'        => __( 'Fourh feature icon name', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_btn_text',
            'label'       => __( 'Button', 'appster' ),
            'desc'        => __( 'Add button text', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'et_pricing_btn_link',
            'label'       => '',
            'desc'        => __( 'Add button link', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
		  array(
			'id'          => 'et_pricing_emphasize',
			'label'       => __( 'Emphasize', 'appster' ),
			'desc'        => __( 'Emphasize this pricing table', 'appster' ),
			'std'         => '',
			'type'        => 'radio',
			'section'     => 'pricing',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => 'large',
				'label'       => __( 'Yes', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => '',
				'label'       => __( 'No', 'appster' ),
				'src'         => ''
			  )
			)
		  ),		  
        )
      ),
	  /* ================================================================
	    COUNTERS
	  ================================================================ */
      array(
        'id'          => 'et_counters_display',
        'label'       => __( 'Counters Section', 'appster' ),
        'desc'        => __( 'Display counters section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'counters',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_counters_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'counters',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_counters_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'counters',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
      array(
        'id'          => 'et_counters_bg',
        'label'       => __( 'Background Image', 'appster' ),
        'desc'        => __( 'Upload background image (2000x900px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'counters',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	 
      array(
        'id'          => 'et_counters',
        'label'       => __( 'Counters', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'counters',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_counters_amount',
            'label'       => __( 'Counter Amount', 'appster' ),
            'desc'        => __( 'Set a numeric value where ends the count up', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
        )
      ),	  
	  /* ================================================================
	     CALL TO ACTION
	  ================================================================ */	  
      array(
        'id'          => 'et_cta_display',
        'label'       => __( 'Call to Action Section', 'appster' ),
        'desc'        => __( 'Display call to action section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'cta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_cta_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'cta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_cta_bg',
        'label'       => __( 'Background Image', 'appster' ),
        'desc'        => __( 'Upload background image (2000x900px optional)', 'appster' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'cta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_cta_content',
        'label'       => __( 'Content', 'appster' ),
        'desc'        => __( 'Add content for call to action section', 'appster' ),
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'cta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'et_cta_btn_text',
		'label'       => __( 'Call to Action Button', 'appster'),
		'desc'        => __( 'Add text for call to action button', 'appster'),
		'std'         => '',
		'section'     => 'cta',
		'type'        => 'text',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'			
	  ),
      array(
        'id'          => 'et_cta_btn_link',
        'label'       => '',
        'desc'        => __( 'Add link for call to action button', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'cta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'et_cta_btn_anim',
		'label'       => '',
		'desc'        => __( 'Choose animation for call to action button', 'appster'),
		'std'         => '',
		'section'     => 'cta',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations			
	  ),	  
	  /* ================================================================
	    CUSTOM
	  ================================================================ */
      array(
        'id'          => 'et_custom_display',
        'label'       => __( 'Custom Section', 'appster' ),
        'desc'        => __( 'Display custom section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'custom',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_custom_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'custom',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_custom_title_large',
		'label'       => __( 'Section Title', 'appster' ),
		'desc'        => __( 'Large highlighted word', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'custom',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_custom_title_small',
		'label'       => '',
		'desc'        => __( 'The rest of the title', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'custom',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_custom_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'custom',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
	  array(
		'id'          => 'et_custom_content',
		'label'       => __( 'Content', 'appster' ),
		'desc'        => '',
		'std'         => '',
		'type'        => 'textarea',
        'section'     => 'custom',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  /* ================================================================
	    CUSTOM 2
	  ================================================================ */
      array(
        'id'          => 'et_custom_2_display',
        'label'       => __( 'Custom 2 Section', 'appster' ),
        'desc'        => __( 'Display custom 2 section', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'custom_2',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_custom_2_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'custom_2',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	  array(
		'id'          => 'et_custom_2_title_large',
		'label'       => __( 'Section Title', 'appster' ),
		'desc'        => __( 'Large highlighted word', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'custom_2',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_custom_2_title_small',
		'label'       => '',
		'desc'        => __( 'The rest of the title', 'appster'),
		'std'         => '',
		'type'        => 'text',
        'section'     => 'custom_2',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),
	  array(
		'id'          => 'et_custom_2_contrast',
		'label'       => __( 'Section Contrast', 'appster' ),
		'desc'        => '',
		'std'         => 'light',
		'type'        => 'radio',
		'section'     => 'custom_2',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'light',
			'label'       => __( 'Light', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'dark',
			'label'       => __( 'Dark', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
	  array(
		'id'          => 'et_custom_2_content',
		'label'       => __( 'Content', 'appster' ),
		'desc'        => '',
		'std'         => '',
		'type'        => 'textarea',
        'section'     => 'custom_2',		
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	  ),	  	  
	  /* ================================================================
	     FOOTER
	  ================================================================ */
      array(
        'id'          => 'et_footer_copyright_text',
        'label'       => __( 'Copyright Text', 'appster' ),
        'desc'        => __( 'Add copyright text for footer', 'appster' ),
        'std'         => 'Appster 2014 | All rights reserved.',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_contact_id',
        'label'       => '',
        'desc'        => __( 'Unique section ID', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_footer_contact_display',
        'label'       => __( 'Contact Bar', 'appster' ),
        'desc'        => __( 'Display contact bar', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'et_footer_contact_type',
		'label'       => __( 'Contact Type', 'appster' ),
		'desc'        => '',
		'std'         => 'subscribe_form',
		'type'        => 'radio',
		'section'     => 'footer',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => array( 
		  array(
			'value'       => 'subscribe_form',
			'label'       => __( 'MailChimp Subscribe', 'appster' ),
			'src'         => ''
		  ),
		  array(
			'value'       => 'contact_form',
			'label'       => __( 'Contact Form 7 Form', 'appster' ),
			'src'         => ''
		  )
		)
	  ),
      array(
        'id'          => 'et_mailchimp_title',
        'label'       => __( 'Mailchimp', 'appster' ),
        'desc'        => __( 'Enter subscribe form title', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'et_mailchimp_unique_link',
        'label'       => '',
        'desc'        => __( 'Enter unique mailchimp link. <a href="http://eriktailor.com/tf_assets/appster_wp/mailchimp_subscribe.jpg" target="_blank">more info</a>', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_mailchimp_placeholder',
        'label'       => '',
        'desc'        => __( 'Enter subscribe field placeholder', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_mailchimp_btn',
        'label'       => '',
        'desc'        => __( 'Enter text for subscribe button', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_contact_form_title',
        'label'       => __( 'Contact Form', 'appster' ),
        'desc'        => __( 'Enter contact form title', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_contact_form_code',
        'label'       => '',
        'desc'        => __( 'Paste contact form 7 shortcode', 'appster' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'et_contact_anim',
		'label'       => __( 'Contact Animation', 'appster'),
		'desc'        => __( 'Choose animation for contact / subscribe form', 'appster'),
		'std'         => '',
		'section'     => 'footer',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => $et_animations			
	  ),	  
      array(
        'id'          => 'et_footer_socials_display',
        'label'       => __( 'Social Networks Bar', 'appster' ),
        'desc'        => __( 'Display social networks bar', 'appster' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'et_footer_socials',
        'label'       => __( 'Social Networks', 'appster' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'et_footer_socials_icon',
            'label'       => __( 'Icon', 'appster' ),
            'desc'        => __( 'Select network', 'appster'),
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
			'choices'     => array( 
			  array(
				'value'       => '',
				'label'       => __( '-- Choose One --', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-facebook-square',
				'label'       => __( 'Facebook', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-twitter-square',
				'label'       => __( 'Twitter', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-flickr',
				'label'       => __( 'Flickr', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-google-plus-square',
				'label'       => __( 'Google Plus', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-github-square',
				'label'       => __( 'Github', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-pinterest-square',
				'label'       => __( 'Pinterest', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-youtube-square',
				'label'       => __( 'Youtube', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-instagram',
				'label'       => __( 'Instagram', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-vimeo-square',
				'label'       => __( 'Vimeo', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-linkedin-square',
				'label'       => __( 'Linkedin', 'appster' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'fa-tumblr-square',
				'label'       => __( 'Tumblr', 'appster' ),
				'src'         => ''
			  )
			)			
          ),
          array(
            'id'          => 'et_footer_socials_link',
            'label'       => '',
            'desc'        => __( 'Add url of the social profile', 'appster'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )		  
        )
      ),

	  
	  
	  
	  
	  
	  
	  
	  
	  
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}
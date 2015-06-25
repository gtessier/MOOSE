<?php

/**
* ProdigyStudio functions
*
* Load framework and theme functions.
*
* @since 1.0
*/


/*===================================================================================
 * SET THEME NAME AND SLUG
 * =================================================================================*/

$themename = "Maleo";
$themeslug = "maleo";

/*===================================================================================
 * SET PRODIGYSTUDIO SHORTNAME
 * =================================================================================*/

$shortname = "ps";


/*===================================================================================
 * DEFINE CONSTANS
 * =================================================================================*/

define ('PS_FRAMEWORK_DIR', '/framework');
define ('PS_INC_DIR', '/includes');
define ('PS_LIB_DIR', '/lib'); 
 

/*===================================================================================
 * LOAD FRAMEWORK
 * =================================================================================*/

require_once locate_template( PS_FRAMEWORK_DIR .'/framework.php');
require_once locate_template( PS_FRAMEWORK_DIR .'/options.php');
require_once locate_template( PS_FRAMEWORK_DIR .'/vc_extend/icons/icons.php');

/*===================================================================================
 * LOAD THEME FUNCTIONS
 * =================================================================================*/

require_once locate_template ( PS_INC_DIR .'/theme-functions.php');
require_once locate_template ( PS_INC_DIR .'/theme-enqueue.php');
require_once locate_template ( PS_INC_DIR .'/theme-sidebars.php');
require_once locate_template ( PS_INC_DIR .'/sidebar-generator.php');
require_once locate_template ( PS_LIB_DIR . '/metaboxes.php');     		      // Custom metaboxes
require_once locate_template ( PS_INC_DIR .'/theme-metaboxes.php');
require_once locate_template ( PS_LIB_DIR .'/gallery-metabox.php');     		// Custom metaboxes
require_once locate_template ( PS_LIB_DIR .'/social-metabox/social-metabox.php');

/*===================================================================================
 * ADD MEGA MENU
 * =================================================================================*/

include_once locate_template ( PS_LIB_DIR .'/megamenu/class.menu.walker.setup.php');
include_once locate_template ( PS_LIB_DIR .'/megamenu/class.menu.walker.edit.php');
include_once locate_template ( PS_LIB_DIR .'/megamenu/class.menu.walker.php');


/*================================================================================*/

require_once locate_template ( PS_LIB_DIR .'/post-format-selector-meta.php');
require_once locate_template ( PS_LIB_DIR .'/pscf/pscf.php'); // Load ProdigyStydio Contact Form Templates

require_once locate_template ( PS_INC_DIR .'/theme-widgets.php');

require_once locate_template ( PS_LIB_DIR .'/wp-pagenavi.php');
require_once locate_template ( PS_LIB_DIR .'/class-tgm-plugin-activation.php');
require_once locate_template ( PS_LIB_DIR .'/maleoplugins-activate.php');



?>
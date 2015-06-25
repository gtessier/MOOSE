<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", 'prodigystudio'));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/icon_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/ps_selectBox.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/spectrum/spectrum.js"></script>
   
 <script type="text/javascript">
	jQuery(document).ready( function () {
		var iconsize ='small';						 
		jQuery('#ps_icon_boxes_badge').change(function(){
			if ( jQuery(this).val() == '0' ) {
				  jQuery("#badgecolor_panel").slideUp("fast");
			}
			if ( jQuery(this).val() == '1' ) {
				 jQuery("#badgecolor_panel").slideDown("slow");
			}
		});
		jQuery('#ps_icon_boxes_icon').change(function(){
			icon =jQuery(this).val();
			jQuery ('.previewicon').html('<i class="'+ icon + '"></i>') 
		});
		
	});
	</script>
    <base target="_self" />
   
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/entyposocials.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/whhg.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/spectrum/spectrum.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $themename.'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper height300">
				<table border="0" cellpadding="4" cellspacing="0">
				 
				 <tr>
					<td nowrap="nowrap" width="240"><label for="ps_icon_boxes_size" >Select icon size:</label></td>
					<td> 
                    
                    <select name="ps_icon_boxes_size" id="ps_icon_boxes_size" class="width120">
                    		<option value="tiny">Small Icon </option>
                            <option value="small">Small Icon </option>
                    		<option value="medium">Medium Icon </option>
                            <option value="large">Large Icon</option>
                    </select>
					
					</td>
				  </tr>
                </table>
                
                  <table border="0" cellpadding="4" cellspacing="0">
                <tr>
				   <td nowrap="nowrap"  width="240"><label >Icon: </label></td>
				   <td><?php echo printIconSelect('ps_icon_boxes_icon') ?></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
				   <td><span style="font-size:9px;">Please select icon. Full list of available icons <a href="http://www.dynamicpresss.pl/documentation/icons_splash/" target="_blank">here</a></span></td>
                 </tr>
                  </table>
				<table border="0" cellpadding="4" cellspacing="0">
                  <tr>
					<td nowrap="nowrap" width="240"><label for="ps_icon_boxes_iconcolor" >Select icon color:</label></td>
					                
    				<td width="140"><input type="text" size="27" id="icon_color"  value="#777777" /></td>
    				<td width="60"><input type="text" id="icon_color_picker"  /></td>
				  </tr>
					</td>
				  </tr>
                  </table>
				<table border="0" cellpadding="4" cellspacing="0">
                  <tr>
					<td nowrap="nowrap"><label for="ps_icon_boxes_badge" >Round Badge in the Icon Background:</label></td>
					<td> 
                    
                    <select name="ps_icon_boxes_badge" id="ps_icon_boxes_badge" class="width120">
                    		<option value="0">No</option>
                            <option value="1">Yes</option>
                    </select>
					
					</td>
				  </tr>
				</table>
<div id="badgecolor_panel" style="display:none">
				<table border="0" cellpadding="4" cellspacing="0">
                  <tr>
					<td nowrap="nowrap" width="240"><label for="ps_icon_boxes_badgecolor" >Select Badge Background Color:</label></td>
					                
    				<td width="140"><input type="text"  size="27" id="badge_bg"  value="#D95B33" /></td>
    				<td width="60"><input type="text" id="badge_bg_picker"  /></td>
				  </tr>
					</td>
				  </tr>
                  </table>
</div>                  
                  
                   
	<p class="usage">Select all shortcode options and click the "Insert" button to add it to your page.</p>
				
	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php echo "Cancel"; ?>" onClick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php echo "Insert"; ?>" onClick="insertShortcode();" />
		</div>
	</div>
</form>
<script>
	$(document).ready( function() {
		
		jQuery('#ps_button_icon').change(function () {
			var showicons = jQuery(this).find('option:selected').val();					
			jQuery('.previewicon i').removeClass().addClass(showicons);

		});
					
});
			
</script>
</body>
</html>
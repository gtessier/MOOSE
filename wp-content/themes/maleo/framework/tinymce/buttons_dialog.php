<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here", 'prodigystudio')); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/buttons_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/ps_selectBox.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/spectrum/spectrum.js"></script>
    
    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/social-icon.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/whhg.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/js/back-end/libraries/spectrum/spectrum.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $themename .'_shortcode'; ?>" action="#">
	
<div class="panel_wrapper height280"> 
           
	       <table border="0" cellpadding="4" cellspacing="0">
				 <tr>
				   <td align="right" nowrap="nowrap"><label >Button text: </label></td>
				   <td>
				     <input type="text" name="ps_button_text" id="ps_button_text" class="width260">
			      </td>
				   <td align="right"><label>Icon: </label></td>
				   <td><?php echo printIconSelect('ps_button_icon') ?></td>
                   
			      </tr>
                  
				 
				 <tr>
				   <td align="right" nowrap="nowrap"><label >Link URL:  </label></td>
				   <td><input type="text" name="ps_button_url" id="ps_button_url" class="width260"></td>
				   <td><label >Open in: </label></td>
				   <td align="right"><select name="ps_button_target" id="ps_button_target" class="width1300" >
				       <option value="_self">The same window</option>
				       <option value="_blank">New window</option>
		           </select></td>
				     
         </tr>
				 <tr>
					<td align="right" nowrap="nowrap"><label >Select Color: </label></td>
					<td><select name="ps_button_style" id="ps_button_style" class="width220" >
                      <option value="">Default</option>
                      <option value="blue">Blue</option>					  
					  <option value="green">Green</option>                      
                      <option value="yellow">Yellow</option>                      
                      <option value="red">Red</option>
                      <option value="white">White</option>

				    </select></td>
					<td align="right"><label >Size: </label></td>
					<td><select name="ps_button_size" id="ps_button_size" class="width130" >					  
                      <option value="small">Small</option>
					  <option value="medium">Medium</option>
                      <option value="large">Large</option>
				    </select></td>
				  </tr>
                  <tr>
					<td align="right" nowrap="nowrap"><label >Corners: </label></td>
					<td><select name="ps_button_corners" id="ps_button_corners" class="width220" >
                      <option value="">Default</option>
                      <option value="round">Round</option>					  
					  <option value="radius">Radius</option>                      

				    </select></td>
					<td align="right"><label >Border: </label></td>
					<td><select name="ps_button_border" id="ps_button_border" class="width130" >					  
                      <option value="">No</option>
					  <option value="yes">Yes</option>
				    </select></td>
				  </tr>
				</table>
				<p class="usage">Select all options and click the "Insert" button to add it to your page.</p>
	
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
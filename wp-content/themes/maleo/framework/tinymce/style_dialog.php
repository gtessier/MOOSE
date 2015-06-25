<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here",'prodigystudio'));
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/style_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/ps_selectBox.js"></script>
<script type="text/javascript">
	jQuery(document).ready( function () {								 
		jQuery('#ps_typography').change(function(){
			if (jQuery(this).val() == 'blockquote') {

				jQuery('#blockquote').slideDown("slow");
				jQuery('#dropcaps').slideUp("fast");
				jQuery('#panel').slideUp("fast");
				jQuery('#pullquote').slideUp("fast");

			} else if (jQuery(this).val() == 'dropcaps') {

				jQuery('#blockquote').slideUp("fast");
				jQuery('#dropcaps').slideDown("slow");
				jQuery('#panel').slideUp("fast");
				jQuery('#pullquote').slideUp("fast");

			} else if(jQuery(this).val() == 'pullquote') {
				jQuery('#blockquote').slideUp("fast");
				jQuery('#dropcaps').slideUp("fast");
				jQuery('#panel').slideUp("fast");
				jQuery('#pullquote').slideDown("slow");			
			
			} else if(jQuery(this).val() == 'panel') {
				jQuery('#blockquote').slideUp("fast");
				jQuery('#dropcaps').slideUp("fast");
				jQuery('#pullquote').slideUp("fast");
				jQuery('#panel').slideDown("slow");			
			}
			else {
				jQuery('#blockquote').slideUp("fast");
				jQuery('#dropcaps').slideUp("fast");
				jQuery('#pullquote').slideUp("fast");
				jQuery('#panel').slideUp("fast");			
				
			}
		});		
	});
	</script>
    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $themename .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper height255">
					           
			<h3>Typography</h3><br/>
				<table border="0" cellpadding="4" cellspacing="0">
				 <tr>
					<td nowrap="nowrap"><label for="ps_typography" >Select One:</label></td>
					<td> 
                   <select name="ps_typography" id="ps_typography" class="width220" >
                           <option value="blockquote">Blockquote</option>
                           <option value="dropcaps">Dropcaps</option>
                           <option value="highlight">Highlight</option>
                           <option value="lead">Lead paragraph</option>
                           <option value="pullquote">Pullquote</option>
                           <option value="panel">Panel</option>                           
                    </select>
					</td>
				  </tr>
                  
                  <tr id="blockquote">
				    <td nowrap="nowrap"><label for="cite" >Cite:</label></td>
				    <td width="140"><input type="text"  size="27" id="cite"  value="" /></td>
				  </tr>
                  
                   <tr  id="dropcaps" style="display:none">
	                <td nowrap="nowrap"><label for="style_dropcap" >Style of dropcas</label></td>
                	<td><select name="style_dropcap" class="width220" id="style_dropcap">
                        <option value="default">Default</option>
                        <option value="circle">Circle</option>
                        <option value="square">Square</option>
		                </select>
                </td>
                </tr>
                
                <tr id="pullquote" style="display:none">
                <td nowrap="nowrap"><label for="alignment_pullquote" >Alignment:</label></td>
                <td><select name="alignment_pullquote" class="width220" id="alignment_pullquote">
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                </select>
                </td>
                </tr>
                
                <tr id="panel" style="display:none">
                <td nowrap="nowrap"><label for="color_panel" >Style:</label></td>
                <td><select name="color_panel" class="width220" id="color_panel">
                        <option value="">Default</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="grey">Grey</option>
                        <option value="Red">Red</option>
                        <option value="yellow">Yellow</option>
                </select>
                <br /><br /><label for="fold_panel" >Fold:</label><input type="checkbox" name="fold_panel" value="true" checked="checked" id="fold_panel">
                </td>

                </tr>
                
				</table>
				
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
</body>
</html>

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
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/table_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/ps_selectBox.js"></script>
    <base target="_self" />
<link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">
<link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $themename .'_shortcode'; ?>" action="#">
    <div class="panel_wrapper height255">
			<h3>Styled Table</h3><br/>
				<table border="0" cellpadding="4" cellspacing="0">
				 <tr>
					<td nowrap="nowrap"><label for="ps_styled_table" >Select One:</label></td>
					<td> 
                   <select name="ps_styled_table" id="ps_styled_table" class="width220" >
                           <option value="">Select a color</option>
                           <option value="default">Default</option>
                           <option value="blue">Blue</option>
                           <option value="green">Green</option>                           
                           <option value="red">Red</option>
                           <option value="yellow">Yellow</option>                           
                    </select>
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

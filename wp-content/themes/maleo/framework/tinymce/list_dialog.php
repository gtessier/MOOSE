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
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/tinymce/js/list_dialog.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/jquery.selectBox.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-end/ps_selectBox.js"></script>
    <base target="_self" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/back-end/jquery.selectBox.css" rel="stylesheet" type="text/css">   
     <link href="dialog_style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<form name="<?php echo $themename .'_shortcode'; ?>" action="#">
	
    <div class="panel_wrapper height280">
			
				<h3>Styled list</h3><br/>
				<table border="0" cellpadding="4" cellspacing="0">
				 <tr>
					<td nowrap="nowrap"><label for="ps-styled-list" >Select One:</label></td>
					<td> 
                    
                    <select name="ps-styled-list" id="ps-styled-list" class="width420">
                       		<option value="no-bullet">No bullet</option>
                            <option value="disc">Disc</option>
                            <option value="square">Square</option>
                            <?php 
								for ($i = 1; $i <= 60; $i++) {
							    echo '<option value="list-type'.$i.'">Type '.$i.'</option>';
								}
							?>	                            
                            
                    </select>
					
					</td>
				  </tr>
                  <tr>
					<td nowrap="nowrap"><label for="ps-el-class" >Extra class name:</label></td>
					<td> 
                    
                    <input type="text" name="ps-el-class" id="ps-el-class"  class="width420" />					
					</td>
				  </tr>
				</table>
				<p class="usage">Select a style and click the "Insert" button to add it to your page.</p>
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
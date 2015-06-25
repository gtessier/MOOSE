// Menu additional fields
    jQuery(document).ready(function () {
	jQuery(".megamenu-options-togle").click(function(){
		var id = jQuery(this).attr("data-id");
		var panelid = "#mega-menu-options-panel-" + id;
		jQuery(this).parent().siblings('.mega-menu-options-panel').toggle("slow");
		if (jQuery(this).hasClass('active')) {jQuery(this).removeClass('active'); jQuery(this).find('span:first').text('Show mega menu options')} else {jQuery(this).addClass('active'); jQuery(this).find('span:first').text('Hide mega menu options')}; 

  	});			 
	jQuery('.menu-upload-image').each(
		function() {
			var btnid = 'menu-item-image-button-' + jQuery(this).attr('data-parentid');
			var clearid = 'menu-item-image-clear-' + jQuery(this).attr('data-parentid');
			var imgid = 'edit-menu-item-image-' + jQuery(this).attr('data-parentid');
			var imgurl = '';
			if (jQuery('#'+imgid).val().length == 0) jQuery('#'+clearid).hide(); 
			jQuery('#'+btnid).click(function() {
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			  window.send_to_editor = function(html) {
				imgurl = jQuery('img',html).attr('src');
				jQuery('#'+imgid).val(imgurl);
				tb_remove();
			  }
			  return false;

			});
			jQuery('#'+clearid).click(function() {
				jQuery('#'+imgid).val('');
				jQuery(this).hide();
				return false;
			});
		}
	);	});
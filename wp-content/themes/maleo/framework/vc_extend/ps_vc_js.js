// JavaScript Document

jQuery(document).ready(function(){
		jQuery('.iconbox').on('click', function() {						
		jQuery('.ps_panel_icons').show();
		var showicons = jQuery('.ps_icon_cats').find('option:selected').val();
		jQuery('.'+showicons).show();
		return false
		});
		
		jQuery('.ps-container-icons, .ps_panel_icons').hide();
		var showicons = jQuery('.ps_icon_cats').find('option:selected').val();
		jQuery('.'+showicons).show();
		
		jQuery('.ps_icon_cats').change(function () {
			var showicons = jQuery(this).find('option:selected').val();					
			jQuery('.ps-container-icons').hide();
			jQuery('.'+showicons).show();

		});
				
		
		// add the classname of the selected icon
		jQuery('.ps-list-icons li').on('click', function() {			
			var icon = jQuery(this).find('a').attr('title');
			jQuery('input#icon').val(icon);
			var preview_icon = jQuery('input#icon').val()
			jQuery('.previewicon i').removeClass().addClass(preview_icon);
			jQuery('.ps-container-icons, .ps_panel_icons').hide();			
			
			return false;
		});
		
		

});

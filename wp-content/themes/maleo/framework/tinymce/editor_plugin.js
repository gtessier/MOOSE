(function() {
    tinymce.PluginManager.add('PSWPShortcodes', function( editor, url ) {
        editor.addButton( 'ps_style', {
			icon: 'ps-style',
			title: 'Popular HTML Tags',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/style_dialog.php',
					width : 430 + editor.getLang('ps_style.delta_width', 0),
					height : 320 + editor.getLang('ps_style.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });
		 editor.addButton( 'ps_table', {
			icon: 'table',
			title: 'Styled Tables',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/table_dialog.php',
					width : 430 + editor.getLang('ps_table.delta_width', 0),
					height : 320 + editor.getLang('ps_table.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'ps_button', {
			icon: 'ps-button',
			title: 'Button Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/buttons_dialog.php',
					width : 750 + editor.getLang('ps_columns.delta_width', 0),
					height : 340 + editor.getLang('ps_columns.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });
		

		editor.addButton( 'ps_lists', {
			icon: 'ps-lists',
			title: 'Styled list',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/list_dialog.php',
					width : 750 + editor.getLang('ps_columns.delta_width', 0),
					height : 340 + editor.getLang('ps_columns.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'ps_icon', {
			icon: 'ps-icon',
			title: 'Icons',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/icon_dialog.php',
					width : 750 + editor.getLang('ps_columns.delta_width', 0),
					height : 340 + editor.getLang('ps_columns.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'ps_map', {
			icon: 'ps-map',
			title: 'Google Map Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/map_dialog.php',
					width : 570 + editor.getLang('ps_maps.delta_width', 0),
					height : 555 + editor.getLang('ps_maps.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'ps_vimeo', {
			icon: 'ps-vimeo',
			title: 'Vimeo Video Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/vimeo_dialog.php',
					width : 380 + editor.getLang('ps_vimeo.delta_width', 0),
					height : 160 + editor.getLang('ps_vimeo.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

        editor.addButton( 'ps_youtube', {
			icon: 'ps-youtube',
			title: 'Youtube Video Shortcode',
            onclick: function() {
				editor.windowManager.open({
					file : url + '/youtube_dialog.php',
					width : 380 + editor.getLang('ps_youtube.delta_width', 0),
					height : 160 + editor.getLang('ps_youtube.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url 
				});
            }
        });

    });
})();


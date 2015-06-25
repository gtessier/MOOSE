function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function insertShortcode() {
	
	var shortcodeText;
	var blockquote_cite = document.getElementById('cite').value;
	var style_dropcap = document.getElementById('style_dropcap').value;
	var alignment_pullquote = document.getElementById('alignment_pullquote').value;
	
	var color_panel = document.getElementById('color_panel').value;
	var fold_panel = document.getElementById('fold_panel').value;
	
	
	var shortcodeId = document.getElementById('ps_typography').value;
	
	
	    if (shortcodeId != 0 && shortcodeId == 'blockquote' ){
			if (blockquote_cite != 0) {
				shortcodeText = "<blockquote> blockquote content... <cite>"+blockquote_cite+"</cite></blockquote>"+" ";	
			} else {
				shortcodeText = "<blockquote> blockquote content...</blockquote>"+" ";
			}
		}
		
		if (shortcodeId != 0 && shortcodeId == 'dropcaps' ){
			shortcodeText = '<span class="dropcap '+style_dropcap+'">D</span>';	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'highlight' ){
			shortcodeText = '<span class="highlight">this is highlight text</span>';	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'lead' ){
			shortcodeText = '<p class="lead">this is Lead paragraph</p>';	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'pullquote' ){
			shortcodeText = '<span class="pullquote-'+alignment_pullquote+'">This is pullquote align to '+alignment_pullquote+'</span>';	
		}
		
		if (shortcodeId != 0 && shortcodeId == 'panel' ){
			if(fold_panel == 'true') {
				
				shortcodeText = '<div class="panel '+color_panel+' fold">This is content in panel</div>';		
				
				} else {
				
				shortcodeText = '<div class="panel '+color_panel+'">This is content in panel</div>';	
				
				}
		}
		
		
		if ( shortcodeId == 0 ){
			tinyMCEPopup.close();
		}	
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}

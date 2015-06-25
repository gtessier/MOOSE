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
	var buttonText = document.getElementById('ps_button_text').value;
	var buttonIcon = document.getElementById('ps_button_icon').value;
	var buttonUrl = document.getElementById('ps_button_url').value;
	var buttonTarget = document.getElementById('ps_button_target').value;
	var buttonStyle = document.getElementById('ps_button_style').value;
	var buttonSize = document.getElementById('ps_button_size').value;
	var buttonCorners = document.getElementById('ps_button_corners').value;
	var buttonBorder = document.getElementById('ps_button_border').value;
	
		
		if ( buttonBorder == 0 ) {
			buttonBorder ='';	
		} else {
			buttonBorder = 'button-border';	
		}
		
		
		if ( buttonCorners == 0 ) {
			buttonCorners ='';	
		} 
	
		if ( buttonText == 0 ){
			buttonText ='';
		}
		if ( buttonUrl == 0 ){
			buttonUrl ='#';
		}
	    
		if ( buttonIcon == 0 ) {
			shortcodeText = '<a class="button '+buttonBorder+' '+buttonStyle+' '+buttonSize+' '+buttonCorners+'" target="'+buttonTarget+'" href="'+buttonUrl+'">'+buttonText+'</a>';
		} else {
			shortcodeText = '<a class="button '+buttonBorder+' '+buttonStyle+' '+buttonSize+' '+buttonCorners+'" target="'+buttonTarget+'" href="'+buttonUrl+'">'+buttonText+'<i class="'+buttonIcon+'"></i></a>';
		}
					
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	return;
}

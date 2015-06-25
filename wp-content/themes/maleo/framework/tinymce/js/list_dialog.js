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
	
	var shortcodeText, listclass;
	var listclass = document.getElementById('ps-styled-list').value;
	var custom_class = document.getElementById('ps-el-class').value;
	
		shortcodeText = "<ul class='"+listclass+" "+custom_class+"'><li>List item</li><li>List item</li><li>List item</li></ul>";
		
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	return;
}

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
	var shortcodeId = document.getElementById('ps_styled_table').value;
	
	

			if (shortcodeId != 0 && shortcodeId != 'default' ) {
				shortcodeText = '<table class="table '+shortcodeId+'"><thead><tr><th class="text-center">#</th><th>First Name</th><th>Last Name</th><th>Username</th></tr></thead><tbody><tr><td class="text-center">1</td><td>John</td><td>Doe</td><td>@johndoe</td></tr><tr><td class="text-center">2</td><td>Mark</td><td>Otto</td><td>@markotto</td></tr><tr><td class="text-center">3</td><td>Jacob</td><td>Thornton</td><td>@thornton</td></tr></tbody></table>';	
			} else if (shortcodeId == 'default'){
				shortcodeText = '<table class="table"><thead><tr><th class="text-center">#</th><th>First Name</th><th>Last Name</th><th>Username</th></tr></thead><tbody><tr><td class="text-center">1</td><td>John</td><td>Doe</td><td>@johndoe</td></tr><tr><td class="text-center">2</td><td>Mark</td><td>Otto</td><td>@markotto</td></tr><tr><td class="text-center">3</td><td>Jacob</td><td>Thornton</td><td>@thornton</td></tr></tbody></table>';
			} else {			
				shortcodeText = '<table><thead><tr><th class="text-center">#</th><th>First Name</th><th>Last Name</th><th>Username</th></tr></thead><tbody><tr><td class="text-center">1</td><td>John</td><td>Doe</td><td>@johndoe</td></tr><tr><td class="text-center">2</td><td>Mark</td><td>Otto</td><td>@markotto</td></tr><tr><td class="text-center">3</td><td>Jacob</td><td>Thornton</td><td>@thornton</td></tr></tbody></table>';
				
			}
		
		
		tinyMCEPopup.editor.insertContent(shortcodeText);		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();

	return;
}

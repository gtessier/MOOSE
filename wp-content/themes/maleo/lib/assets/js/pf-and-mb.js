jQuery(document).ready(function($) 
{  
	// START UP
	show_hide_post_format_divs( $('#post-formats-select input[type="radio"]:checked').val() );

	// LIVE CHANGES
	$('#post-formats-select input[type="radio"]')
		.live( 'change', function(){ show_hide_post_format_divs( $(this).val() ); } );

	// DO HIDE/SHOW
	function show_hide_post_format_divs( val )
	{
		// WORKAROUND FOR FIRST BUTTON
		if( val === '0' )
			val = pfs.first_radio;
		
		for( var prop in pfs.formats )
		{
			// Current post format
			if( prop == val )
				$( pfs.formats[prop] ).show();
			// All others
			else 
				$( pfs.formats[prop] ).hide();	
		}
	}
});
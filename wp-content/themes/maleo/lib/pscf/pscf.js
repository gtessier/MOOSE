jQuery( document ).ready(function() {	
	jQuery( "#contactform" ).submit(function(event) {
	jQuery('.loading').css('display','inline-block').fadeIn('fast');
	
	  var name = jQuery("#name").val();  
      if (name == "") {  
			  jQuery('.loading').fadeOut('fast');	
			  jQuery('#name').css({"background":"#FFFCFC","border":"2px solid #ffadad"}); 
			  jQuery('label[for="name"] span').css({"border":"none", "background":"#ffadad"}); 
			  
      return false;  
     } 
	 
	 var email = jQuery("input#email").val();  
		 if (email == "") {  
			 jQuery('.loading').fadeOut('fast');
			 jQuery('#email').css({"background":"#FFFCFC","border":"2px solid #ffadad"}).next('.require').text(' !');
 			 jQuery('label[for="email"] span').css({"border":"none", "background":"#ffadad"});
			 
	   return false;  
     } 
	 
	 var message = jQuery("#message").val();  
      if (message == "") {  
			  jQuery('.loading').fadeOut('fast');
			  jQuery('#message').css({"background":"#FFFCFC","border":"2px solid #ffadad"}); 
			  jQuery('label[for="message"] span').css({"border":"none", "background":"#ffadad"}); 
			  
      return false;  
     }
	  
	
		
	jQuery('.loading').fadeIn('fast');
		var posting = jQuery.post( PSCF.ajaxurl, jQuery("#contactform :input").serialize() )
		 .done(function() {
			jQuery('.loading').fadeOut('fast');						
			jQuery('.success-contact').fadeIn();
			jQuery('.success-contact').fadeOut(5000, function(){ $(this).remove(); });
		})
		 .fail(function() {
			jQuery('.loading').fadeOut('fast');
			jQuery(".formmessage p").html('<span class="">Oops, something went wrong.');
		});
		event.preventDefault();
	});
		
});
<?php
function pscf_html($title,$description = null) { ?>
<div id="contact-content">         
 	           <span class="heading-line mo-animate" data-animate="bounceIn"></span>
               <h3 class="heading-contact mo-animate" data-animate="fadeInDown"><?php echo $title; ?></h3>

			<?php if($description) { ?>
               <p class="mo-animate" data-animate="fadeInDown"><?php echo $description?></p>
            <?php } ?>
               
               <div class="alert-box radius success-contact">
                  <i class="icon-circleselect"></i> Your message has been sent <strong>successfully</strong> Thank you!
                  <a data-component="alert" href="#" class="close">&times;</a>
               </div>

               <form id="contactform" action="#" class="mo-animate" data-animate="fadeInLeft">
                  <ul class="contact-form">
                   
                     <li class="input-half left name-ico">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                     </li>
                     
                     <li class="input-half right email-ico">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                     </li>
                     
                     <li class="subj-ico">
                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Your Subject">
                     </li>
                     
                     <li>                     
                        <textarea name="message" class="form-control" id="message" rows="8" placeholder="Your Message"></textarea>
                        <input name="action" type="hidden" value="simple_contact_form" />
		                <?php wp_nonce_field( 'pscf_html', 'pscf_nonce' ); ?>
                     </li>
                     
                     <li>
                        <button class="button radius" data-animate="bounceIn" id="buttonsend">Send Message</button>
                        <span class="loading"></span>
                     </li>
                     
                  </ul>
                  
               </form>
               </div>
               

<?php }

function pscf_enqueue() {

	//Enqueue jQuery if not already loaded
	wp_enqueue_script('jquery');
	wp_enqueue_script('pscfjs', get_template_directory_uri().'/lib/pscf/pscf.js', array('jquery'));

	$localize = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
		);
	wp_localize_script('pscfjs', 'PSCF', $localize);
}
add_action( 'wp_enqueue_scripts', 'pscf_enqueue' );
function pscf_ajax_simple_contact_form() {

	if ( isset( $_POST['pscf_nonce'] ) && wp_verify_nonce( $_POST['pscf_nonce'], 'pscf_html' ) ) {
        $name = sanitize_text_field($_POST['name']);
		$email = sanitize_email($_POST['email']);
		$subject = sanitize_text_field($_POST['subject']);
		$message = wp_kses_data($_POST['message']);		
		$message = "Message: $message \r \n From: $name  \r \n Reply to: $email";
		//$headers = "From: $name <$email> \r\n ";

	 //$headers[] = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	  //$headers[] = 'Content-type: text/html' . "\r\n"; //Enables HTML ContentType. Remove it for Plain Text Messages
	  global $ps_opts;
	  $email = $ps_opts['ps_contact_email'];
	  if($email != '') { $to = $email; } else { $to = get_option('admin_email');}

		wp_mail( $to, $subject, $message, $headers );
	}		
	die(); // Important
}
add_action( 'wp_ajax_simple_contact_form', 'pscf_ajax_simple_contact_form' );
add_action( 'wp_ajax_nopriv_simple_contact_form', 'pscf_ajax_simple_contact_form' );
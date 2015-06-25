<?php

require('../../../wp-blog-header.php');

// Get the id of the page that sent the request
$id = $_GET['set'];

// to
$to = get_post_meta($id,'vk_contact_email',true);
if ( !isset($to) || $to=='' ){ $to = get_option('admin_email'); }

// subject
$subject = get_post_meta($id,'vk_contact_subject',true);
if ( !isset($subject) || $subject == '' ){ $subject = 'Website Contact Form'; }

// name
if(isset($_POST['author'])) {
	$author = strip_tags($_POST['author']);
} else {
	$author='';
}

// email
if(isset($_POST['email'])) {
	$email = strip_tags($_POST['email']);
} else {
	$email='';
}

// website
if(isset($_POST['url'])) {
	$url = strip_tags($_POST['url']);
} else {
	$url='';
}

// message
if(isset($_POST['comment'])) {
	$comment = strip_tags($_POST['comment']);
} else {
	$comment='';
}

// validator
if(isset($_POST['validator'])) {
	$validator = strip_tags($_POST['validator']);
} else {
	$validator='fail';
}

// headers
$headers = 'From: ' . $author . ' <' . $email . ">\r\n";
$headers .= "Reply-To: ". $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// email markup
$message = '<html><body>';
$message .= '<h2><strong>' . $subject . '</strong></h2>';
$message .= '<p><strong>Name:</strong> ' . $author . '</p>';
$message .= '<p><strong>Email:</strong> ' . $email . '</p>';
$message .= '<p><strong>Website:</strong> ' . $url . '</p>';
$message .= '<p>' . $comment . '</p>';
$message .= '</body></html>';

// only send if has information and validator is empty
if($comment!='' && $validator=='') {

	wp_mail( $to, $subject, $message, $headers );

} ?>

</body>
</html>
<?php
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$to = 'your_email@example.com';
	$headers = "From: $email \r\n";
	$headers .= "Reply-To: $email \r\n";
	$message_body = "From: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";
	
	if(mail($to, $subject, $message_body, $headers)) {
		// If email sent successfully
		$msg = "Thank you for contacting us. We will get back to you shortly.";
		$msg_class = "alert-success";
	} else {
		// If email sending fails
		$msg = "Oops! Something went wrong. Please try again later.";
		$msg_class = "error";
	}
	
	// Redirect back to the contact form page
	header('Location: contact.php?msg=' . urlencode($msg) . '&msg_class=' . $msg_class);
	exit;
}


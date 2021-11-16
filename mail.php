<?php 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$formcontent="From: $name \n Message: $message";
	$recipient = "info@lumatas.com";
	$subject = "Contact Form";
	$mailheader = "From: $email \r\n";
	if(mail($recipient, $subject, $formcontent, $mailheader)) echo "Thank you"(['success'=>true]);
	else echo Lumatas_encode(['success'=>false]);
	
	<!--echo "Thank You!" . " -" . "<a href='form.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
?>
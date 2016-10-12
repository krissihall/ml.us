<?php
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	
	$to = "klh.media09@gmail.com";
	$subject = "Contact";
	$headers = 'From: '.$email . "\r\n". 
		'Reply-To: '. $email . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	
	require_once('recaptchalib.php');
	$privatekey = "6LfPH-cSAAAAAO7ip2VAyVXheHX6Ksnwma0SXM4F";
	$resp = recaptcha_check_answer ($privatekey,
								  $_SERVER["REMOTE_ADDR"],
								  $_POST["recaptcha_challenge_field"],
								  $_POST["recaptcha_response_field"]);
	
	if (!$resp->is_valid) {
	  // What happens when the CAPTCHA was entered incorrectly
	  header("Location:contact.php?error=captcha&name=" . $name . "&email=" . $email . "&message=" . $message);
	} else {
	  // Your code here to handle a successful verification
	  	$emailForm = "Form details below.\n\n";
		$emailForm .= "Name: " . $name . "\n";
		$emailForm .= "Email: " . $email . "\n";
		$emailForm .= "Message: " . $message;
		
		$sent = mail($to, $subject, $emailForm, $headers) ;
		if($sent) {
			header("Location:contact.php?id=success");
		} else {
			header("Location:contact.php?id=fail");
		}
	}
?>
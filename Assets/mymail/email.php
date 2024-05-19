<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'solemates.bd.2024@gmail.com';				
	$mail->Password = 'adfzrukqegtwdsxu';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('solemates.bd.2024@gmail.com', 'Sole Mates');		
	$mail->addAddress('albarhossain@gmail.com');
	// $mail->addAddress('recipient2@example.com', 'Name');
	
	$mail->isHTML(true);								
	$mail->Subject = 'Test Email';
	$mail->Body = 'HTML message body in <b>bold</b> ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
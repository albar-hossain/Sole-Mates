<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';
require '../mymail/vendor/autoload.php';

function signUpConfirmationEmailOld($email, $userName) {
    $to = $email;
    $subject = "Welcome to Bangladesh's premier sneaker marketplace";
    $message = "Welcome to Sole Mates $userName! We're glad you joined us.";
    // $message = '
    // <html>
    // <head>
    // <title>Welcome to Stadium Goods! We\'re glad you joined us.</title>
    // </head>
    // <body>
    // <br>
    // <p>To log in when visiting our site click Login or My Account, and then enter your email address and password. To access your account on mobile, click "Sign In/Register" in the menu on the top lefthand corner.
    // When you log in to your account, you will be able to do the following:
    // <br>
    // <br>
    // Proceed through checkout faster when making a purchase
    // Check the status of orders
    // View past orders
    // Make changes to your account information
    // Change your password
    // Store alternative addresses (for shipping to multiple family members and friends!)
    // <br>
    // If you have any questions, please feel free to contact us at support@stadiumgoods.com or by phone at US: (646) 512-8868 | UK: +44 20 3974 2362..</p>
    // </body>
    // </html>
    // ';
    $header = "From: Sole Mates";

    if ( mail($to, $subject, $message, $header)) {
        echo "Email Sent Succesfully";
    } else {
        echo "Email Failed";
    }
}


function signUpConfirmationEmail($email, $userName) {

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
	$mail->addAddress($email);
	// $mail->addAddress('recipient2@example.com', 'Name');
	
	$mail->isHTML(true);								
	$mail->Subject = 'Welcome to Bangladesh\'s premier sneaker marketplace';
	$mail->Body = '
    <html>
    <body>
    <h2> Welcome to Sole Mates! We\'re glad you joined us. </h2>
    <p>To log in when visiting our site click Login or My Account, and then enter your email address and password. To access your account on mobile, click "Sign In/Register" in the menu on the top lefthand corner.
    When you log in to your account, you will be able to do the following:
    <br>
    If you have any questions, please feel free to contact us at <a href="#"> support@solemates.com> or by phone at US: (646) 512-8868 | UK: +44 20 3974 2362.</p>
    </body>
    <style>
    body {
        font-family: ProximaNova, sans-serif;
    }</style>
    </html>
    ';
	$mail->AltBody = 'Welcome to Sole Mates $userName! We\'re glad you joined us.';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>
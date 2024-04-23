<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';
require '../mymail/vendor/autoload.php';

function signUpConfirmationEmailOld($email, $userName) {
    $to = $email;
    $subject = "Welcome to Bangladesh's premier sneaker marketplace";
    $message = "Welcome to Sole Mates $userName! We're glad you joined us.";
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
	$mail->addAddress('albarhossain@gmail.com', 'Albar Hossain');
	
	$mail->isHTML(true);								
	$mail->Subject = 'Welcome to Bangladesh\'s premier sneaker marketplace';
	$mail->Body = '<body style="font-family: ProximaNova, sans-serif">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <table class="content" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <!-- Header -->
                    <tr>
                        <td class="header" style="background-color: #313131; padding: 40px; text-align: center; color: white; font-size: 22px;">
                        Welcome to Sole Mates! We\'re glad you joined us.
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="body" style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.6;">
                        To log in when visiting our site click Login or My Account, and then enter your email address and password. 
                        </td>
                    </tr>

                    <!-- Call to action Button -->
                    <tr>
                        <td style="padding: 0px 20px 0px 20px; text-align: center;">
                            <!-- CTA Button -->
                            <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                <tr>
                                    <td align="center" style="background-color: #313131; padding: 10px 20px; border-radius: 5px;">
                                        <a href="http://localhost/SoleMates/Views/customerSignUp.html" target="_blank" style="color: #ffffff; text-decoration: none; font-weight: bold;">Login to continue</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="body" style="padding: 20px; text-align: left; font-size: 16px; line-height: 1.6;">
                        When you log in to your account, you will be able to do the following:
                        <ul>
                        <li>Proceed through checkout faster when making a purchase</li>
                        <li>Check the status of orders</li>
                        <li>View past orders</li>
                        <li>Make changes to your account information</li>
                        <li>Change your password</li>
                            </ul>             
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td class="footer" style="background-color: #313131; padding: 40px; text-align: center; color: white; font-size: 14px;">
                        Copyright &copy; 2024 | Sole Mates
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>';
	$mail->AltBody = 'Welcome to Sole Mates! We\'re glad you joined us.';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	//echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>
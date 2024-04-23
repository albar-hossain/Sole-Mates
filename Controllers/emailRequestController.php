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
	$mail->Body = '<body style="font-family: \'Poppins\', Arial, sans-serif">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <table class="content" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <!-- Header -->
                    <tr>
                        <td class="header" style="background-color: #345C72; padding: 40px; text-align: center; color: white; font-size: 24px;">
                        Responsive Email Template
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                        Hello, All! <br>
                        Lorem odio soluta quae dolores sapiente voluptatibus recusandae aliquam fugit ipsam.
                        <br><br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam corporis sint eum nemo animi velit exercitationem impedit. Incidunt, officia facilis  atque? Ipsam voluptas fugiat distinctio blanditiis veritatis.            
                        </td>
                    </tr>

                    <!-- Call to action Button -->
                    <tr>
                        <td style="padding: 0px 40px 0px 40px; text-align: center;">
                            <!-- CTA Button -->
                            <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                <tr>
                                    <td align="center" style="background-color: #345C72; padding: 10px 20px; border-radius: 5px;">
                                        <a href="https://www.yourwebsite.com" target="_blank" style="color: #ffffff; text-decoration: none; font-weight: bold;">Book a Free Consulatation</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam corporis sint eum nemo animi velit exercitationem impedit.             
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td class="footer" style="background-color: #333333; padding: 40px; text-align: center; color: white; font-size: 14px;">
                        Copyright &copy; 2024 | Your brand name
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>';
	$mail->AltBody = 'Welcome to Sole Mates $userName! We\'re glad you joined us.';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>
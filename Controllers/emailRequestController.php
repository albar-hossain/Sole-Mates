<?php

function signUpConfirmationEmail($email, $userName) {
    $to = $email;
    $subject = "Welcome to the Bangladesh's premier sneaker and streetwear marketplace";
    $message = "Welcome to Sole Mates! We're glad you joined us.\nTo log in when visiting our site click Login or My Account, and then enter your email address and password. To access your account on mobile, click Sign In/Register in the menu on the top lefthand corner.\nWhen you log in to your account, you will be able to do the following:\nProceed through checkout faster when making a purchase.";
    $header = "From: Sole Mates";

    if ( mail($to, $subject, $message, $header)) {
        echo "Email Sent Succesfully";
    } else {
        echo "Email Failed";
    }
}

?>
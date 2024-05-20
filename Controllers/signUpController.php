<?php
require_once '../Models/db.php';
require_once '../Models/userModel.php';
require_once '../Controllers/emailController.php';

$fname = "";
$err_fname = "";
$uname = "";
$err_uname = "";
$pass = "";
$err_pass = "";
$email = "";
$err_email = "";
$ad = "";
$err_ad = "";
$type = "";
$hasError = false;

function validateEmail($email)
{
    $pos_at = strpos($email, "@");
    $pos_dot = strpos($email, ".", $pos_at + 1);
    if ($pos_at < $pos_dot) {
        return true;
    }
    return false;
}

function validPass($password)
{
    $hasUpper = false;
    $hasLower = false;
    $hasNum = false;
    $hasQM = false;
    $hasHash = false;
    for ($i = 0; $i < strlen($password); $i++) {
        if (ctype_upper($password[$i])) {
            $hasUpper = true;
        }
        if (ctype_lower($password[$i])) {
            $hasLower = true;
        }
        if ($password[$i] >= '0' && $password[$i] <= '9') {
            $hasNum = true;
        }
        if ($password[$i] == '#') {
            $hasHash = true;
        }
        if ($password[$i] == '?') {
            $hasQM = true;
        }
        if ($hasUpper && $hasLower && $hasHash || $hasQM && $hasNum) {
            return true;
        }
    }
    return false;



}

if (isset($_POST["sign_up"])) {

    if (empty($_POST["fname"])) {
        $err_fname = "Full Name Required";
        $hasError = true;
    } else {
        $fname = htmlspecialchars($_POST["fname"]);
    }
    if (empty($_POST["uname"])) {
        $err_uname = "Username Required";
        $hasError = true;
    } elseif (strlen($_POST["uname"]) < 6) {
        $err_uname = "Username must contain at least 6 characters ";
        $hasError = true;
    } elseif (strpos($_POST["uname"], " ")) {
        $err_uname = "space is not allowed";
        $hasError = true;
    } else {
        $uname = htmlspecialchars($_POST["uname"]);

    }
    if (empty($_POST["pass"])) {
        $err_pass = "Password Required";
        $hasError = true;
    } elseif (strlen($_POST["pass"]) < 8) {
        $err_pass = "Password must be at least 8 characters";
        $hasError = true;
    } elseif (!validPass($_POST["pass"])) {

        $err_pass = "Password Must Contain 1 Uppercase,1 Lowercase, 1 Number & (# or ?)";
        $hasError = true;
    } else {
        $pass = $_POST["pass"];
    }

    if (empty($_POST["email"])) {
        $err_email = "Email Required";
        $hasError = true;
    } elseif (!validateEmail($_POST["email"])) {
        $err_email = "Not a valid email";
        $hasError = true;
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["ad"])) {
        $err_ad = "Address Required";
        $hasError = true;
    } else {
        $ad = htmlspecialchars($_POST["ad"]);
    }
    if (checkDuplicateEmail($email)) {
        echo '<script>alert("Duplicate Email!");
        window.location.href=("../Views/login.php");
        </script>';
        $hasError = true;
    }
    if (checkDuplicateUserName($uname)) {
        echo '<script>alert("User already registered!");
        window.location.href=("../Views/login.php");
        </script>';
        $hasError = true;
    }
    if (!$hasError) {

        signUp($uname, $fname, $ad, $email, $pass);
        signUpConfirmationEmail($email, $uname);
        echo '<script>alert("User registered!");
        window.location.href=("../Views/login.php");
        </script>';

    }
}

?>
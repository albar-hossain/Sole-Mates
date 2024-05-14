<?php
// header("location:../Views/customerLogin.php");
require_once ("../Models/db.php");
$uname = "";
$err_uname = "";
$pass = "";
$err_pass = "";
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

    if (empty($_POST["fullName"])) {
        $err_fname = "Full Name Required";
        $hasError = true;
    } else {
        $fname = htmlspecialchars($_POST["fullName"]);
    }
    if (empty($_POST["userName"])) {
        $err_uname = "Username Required";
        $hasError = true;
    } elseif (strlen($_POST["userName"]) < 6) {
        $err_uname = "Username must contain at least 6 characters ";
        $hasError = true;
    } elseif (strpos($_POST["userName"], " ")) {
        $err_uname = "space is not allowed";
        $hasError = true;
    } else {
        $uname = htmlspecialchars($_POST["userName"]);

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
    if (!$hasError) {

        insertUser('$uname', '$name', '$email', '$pass');
        header("Location:../Views/login.php");

    }
}

if (isset($_POST["login"])) {


    if (empty($_POST["userName"])) {
        $err_uname = "Username Required";
        $hasError = true;
    } elseif (strlen($_POST["userName"]) < 6) {
        $err_uname = "Username Must be 6 Characters Long";
        $hasError = true;
    } elseif (strpos($_POST["userName"], " ")) {
        $err_uname = "Username should not contain white space";
        $hasError = true;
    } else {
        $uname = htmlspecialchars($_POST["userName"]);
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
        $pass = htmlspecialchars($_POST["pass"]);
    }
    if (!$hasError) {
        $user = authenticateUser($uname, $pass);
        $type = $user["type"];

        if ($user) {
            session_start();
            $_SESSION["loggedin"] = $user["fullName"];
            $_SESSION["username"] = $user["userName"];
            header("Location:../home.php");
        }
    }
}


function insertUser($uname, $name, $email, $pass)
{
    $query = "INSERT INTO users VALUES ('$uname','$name','$email','$pass')";
    execute($query);
    signUpConfirmationEmail($email, $uname);
}

function authenticateUser($uname, $pass)
{
    $query = "SELECT * FROM users WHERE uname='$uname' and pass='$pass'";
    $result = get($query);
    if (count($result) > 0) {
        return $result[0];
    }
    return false;
}

?>
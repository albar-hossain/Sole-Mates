<?php
require_once('../Models/customerModel.php');

if (isset($_POST['Register'])) {
$name = $_POST['name'];
$userName = $_POST['userName'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if (empty($userName) || empty($name) || empty($email) || empty($pass)) {
    echo "Fill up the form first";
} else if (strlen($pass) < 8) {
    echo "password must be atleast 8 characters long";
    } else {
        $valid_signUp_request = true;
        $result = signUp($valid_signUp_request, $userName, $name, $email, $pass);
        if ($result) {
            echo "Sign-Up Compeleted";
        }
    }
}




?>
<?php
session_start();
require_once ('../models/customerModel.php');
$userName = $_REQUEST['userName'];
$password = $_REQUEST['pass'];

if ($userName == "" || $password == "") {
    echo "Empty userName or password!";
} else {
    $status = login($userName, $password);
    if ($status) {
        $_SESSION['flag'] = 'true';
        $_SESSION['username'] = $userName;
        $_SESSION['password'] = $password;
        header("location: ../Views/home.php");
    } else {
        echo "Invalid User!";
    }
}

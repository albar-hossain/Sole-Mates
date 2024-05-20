<?php
include_once ("../Models/userModel.php");
include_once ("../Models/db.php");
// session_destroy();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['purchase'])) {

        checkout($_POST['fullname'], $_POST['email'], $_POST['address'], $_POST['cash_payment']);
    }

}
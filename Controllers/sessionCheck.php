<?php
session_start();
if (!isset($_SESSION['currentUserName'])) {
    header('Location: Home.php');
    exit();
}
?>
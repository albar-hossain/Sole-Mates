<?php
require_once '../Models/db.php';
require_once '../Models/userModel.php';
require_once 'logController.php';
require_once 'signUpController.php';

$uname = "";
$err_uname = "";
$email = "";
$err_email = "";
$comment = "";
$err_comment = "";
$hasError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["uname"])) {
		$err_uname = "**Username Required.";
		$hasError = true;
	} else if (strlen($_POST["uname"]) < 6) {
		$err_uname = "**Username must be greater than 7 charachters.";
		$hasError = true;
	} else {
		$uname = htmlspecialchars($_POST["uname"]);
	}

	function validateEmail($email)
	{
		$pos_at = strpos($email, "@");
		$pos_dot = strpos($email, ".", $pos_at + 1);
		if ($pos_at < $pos_dot) {
			return true;
		} else
			return false;
	}
	if (empty($_POST["email"])) {
		$err_email = "**Email Required.";
		$hasError = true;
	} elseif (!validateEmail($_POST["email"])) {
		$err_email = "**Email should contain '@' and a '.' after '@'";
		$hasError = true;
	} else {
		$email = htmlspecialchars($_POST["email"]);
	}

	if (empty($_POST["comment"])) {
		$err_comment = "**Comment can not be blank";
		$hasError = true;
	} else {
		$comment = htmlspecialchars($_POST["comment"]);
	}
	if (!$hasError) {
		review($uname, $email, $comment);
		header("Location: ../Home.php");
	}
}
?>
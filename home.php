<?php
session_start();
if (empty($_SESSION['id'])) {
	header("location:Views/Login.php");
} else if (isset($_GET['out'])) {
	session_destroy();
	header("location:Views/Login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
</head>

<body>

	<center><br>
		Welcome, <?php echo $_SESSION['id']; ?>

		<a href="Controllers/logController.php">Login</a><br><br><br><br>
		<a href="Controllers/signUpController.php">Sign-Up</a><br><br><br><br>
		<form>
			<button name='add'>Add Employee</button>
			<button name="out">LogOut</button>
		</form>
	</center>

</body>

</html>
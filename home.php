<?php
// session_start();
// if (empty($_SESSION['id'])) {
// 	header("location:Views/Login.php");
// } else if (isset($_GET['out'])) {
// 	session_destroy();
// 	header("location:Views/Login.php");
// }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
</head>

<body>
	Welcome, <?php echo $_SESSION['id']; ?>
	<center><br>
		<a href="Controllers/logController.php">Login</a><br><br><br><br>
		<a href="Controllers/signUpController.php">Sign-Up</a><br><br><br><br>
		<form>
			<button name="out">LogOut</button>
		</form>
	</center>

</body>

</html>
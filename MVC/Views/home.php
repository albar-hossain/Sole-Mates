<?php
session_start();
if (empty($_SESSION['id'])) {
	header("location:login.php");
} else if (isset($_GET['out'])) {
	session_destroy();
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
</head>

<body>
	Welcome, <?php echo $_SESSION['id']; ?>
	<form>
		<button name="out">LogOut</button>
	</form>
</body>

</html>
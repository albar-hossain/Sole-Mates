<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="..\Assets\css\customerSignUp.css">
	<title>Sign-Up</title>
</head>

<body>
	<div class="signUpBox">
		<h2 class="greet">Welcome to Sole Mates</h2>
		<form action="../Controllers/logCheckController.php"" method=" post">
			<br>
			<input type="text" name="userName" value="" id="userName" placeholder="User Name*"><br />
			<br>
			<input type="password" name="pass" value="" id="pass" placeholder="Password*"><br />
			<input type="submit" name="Login" value="Login">
		</form>
		<center>
			<p><a href="#">Forgot Password?</a> | <a href="../Controllers/signUpController.php">Create an Account</a>
			</p>
		</center>
	</div>
</body>

</html>
<?php
require_once ("../Controllers/logController.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="..\Assets\css\login.css">
	<link rel="stylesheet" type="text/css" href="..\Assets\css\home.css">
	<script src="https://kit.fontawesome.com/92d70a2fd8.js"></script>
	<title>Sign-Up</title>
</head>

<body>
	<div class="nav">


		<div class="logo">Sole<span class="mates">Mate</span></div>
		<a href="">Home</a>
		<a href="">Men</a>
		<a href="">Women</a>
		<a href="">Children</a>
		<a href="">Accessories</a>

		<div class="nav-icons">
			<a href=""> <i class="fa-solid fa-magnifying-glass"></i></a>
			<a href="#"><i class="fa-solid fa-user"></i></a>

			<a href=""><i class="fa-solid fa-cart-shopping"></i></a>
		</div>

	</div>
	<div class="signUpBox">
		<h2 class="greet">Welcome to Sole Mates</h2>
		<form action="../Controllers/logCheckController.php"" method=" post">
			<br>
			<input type="text" name="userName" value="" id="userName" placeholder="Username*"><br />
			<br>
			<span><?php echo $err_uname; ?></span>
			<input type="password" name="pass" value="" id="pass" placeholder="Password*"><br />
			<span><?php echo $err_pass; ?></span>
			<center><input type="submit" name="Login" value="Login"></center>
		</form>
		<center>
			<p><a href="#">Forgot Password?</a> | <a href="../Controllers/signUpController.php">Create an Account</a>
			</p>
		</center>
	</div>
	</form>

	<footer class="footer">
		<div class="container10">
			<div class="row">
				<div class="footer-col">
					<h4>Service</h4>
					<ul>
						<li><a href="#">Men's Shoes</a></li>
						<li><a href="#">Women's Shoes</a></li>
						<li><a href="#">Kid's Shoes</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Support</h4>
					<ul>
						<li><a href="#">Pricing Plan</a></li>
						<li><a href="#">Documentation</a></li>
						<li><a href="#">Guide</a></li>

					</ul>
				</div>
				<div class="footer-col">
					<h4>company</h4>
					<ul>
						<li><a href="#">About</a></li>
						<li><a href="#">Press</a></li>
						<li><a href="#">Partner</a></li>
					</ul>
				</div>

				<div class="footer-col">
					<h4>Legal</h4>
					<ul>
						<li><a href="#">Claim</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Terms</a></li>
					</ul>
				</div>
			</div>
		</div>


	</footer>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.getElementById('scrollBtn').addEventListener('click', function () {
				window.scrollBy(0, window.innerHeight); // Scrolls down by the height of the viewport
			});
		});
	</script>

</body>

</html>
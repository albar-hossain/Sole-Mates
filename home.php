<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sole Mates Website</title>
	<link rel="stylesheet" type="text/css" href="Assets\css\home.css">
	<script src="https://kit.fontawesome.com/92d70a2fd8.js"></script>


</head>

<body>
	<?php echo $_SESSION["loggedin"]; ?>
	<?php echo $_SESSION["username"]; ?>

	<form>

		<div class="nav">


			<div class="logo">Sole<span class="mates">Mate</span></div>
			<a href="">Home</a>
			<a href="">Men</a>
			<a href="">Women</a>
			<a href="">Children</a>
			<a href="">Accessories</a>

			<div class="nav-icons">
				<a href=""> <i class="fa-solid fa-magnifying-glass"></i></a>
				<a href="Views\Login.php"><i class="fa-solid fa-user"></i></a>

				<a href=""><i class="fa-solid fa-cart-shopping"></i></a>
			</div>

		</div>




		</div>

		<div class="content">

			<div class="Homebox1">

				<h1>OUR POPULAR PRODUCT</h1>
				<p>Lorem ipsum is simply dummy lorem ipsum</p>
				<p>Lorem ipsum is simply dummy lorem ipsum</p>

				<div class="rec1"></div>
				<div class="rec2"></div>
				<div class="rec3"></div>
				<div class="rec4"></div>
				<div class="rec5"></div>
				<div class="rec6"></div>

				<input type="submit" name="" value="SHOW MORE">


			</div>
			<div class="search-box">
				<div class="row">
					<input type="text" id="input-box" placeholder="Search shoes here" autocomplete="off">
					<button>Search</button>
				</div>






				<div class="Homebox">
					<div class="image-container">
						<img src="Assets\Images\blue.png" alt="image 4" height="650px" width="650px">
						<div class="image-container2">
							<img src="Assets\Images\orange.png" alt="image 5" height="200px" width="200px">
						</div>
						<div class="image-container3">
							<img src="Assets\Images\black.png" alt="image 6" height="200px" width="200px">

						</div>
					</div>
					<div class="circle">

					</div>



					<div class="Textanime">
						<h1><span class="sole">SOLE</span> <span class="mates">MATES</span></h1>
						<h2>WEBSITE</h2>

						<p>VERSATILE SHOES WITH A SPRINGY FEEL,</p>
						<p>MADE IN PART WITH RECYCLED MATERIALS</p>
						<p>Go for that walk around the neighborhood or head to</p>
						<p>the gym in a pair of adidas for that walk around the neighborhood </p>
						<p> or head to the gym in a pair of sole mates</p><br>
						<input type="submit" id="scrollBtn" value="SHOP NOW"><br><br><br>
						<div class="image-container1">
							<img src="Assets\Images\orange.png" alt="Image 1" height="140px" width="140px">
							<img src="Assets\Images\blue.png" alt="Image 2" height="140px" width="140px">
							<img src="Assets\Images\black.png" alt="Image 3" height="140px" width="140px">
							<div class="line"></div>
						</div>




					</div>
				</div>





			</div>
		</div>



		</div>

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



	</form>


	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.getElementById('scrollBtn').addEventListener('click', function () {
				window.scrollBy(0, window.innerHeight); // Scrolls down by the height of the viewport
			});
		});
	</script>








</body>

</html>
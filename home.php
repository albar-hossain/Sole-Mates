<?php
session_start();
// require_once ("Controllers/sessionCheck.php");
require_once ("Models/userModel.php");
$user = getUser($_SESSION['username']);
if (isset($user)) {
    $username = $user['userName'];

} else {
    $username = "Guest";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sole Mates Website</title>
    <link rel="stylesheet" type="text/css" href="Assets//css//style.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js"></script>


</head>

<body>


    <form>

        <div class="nav">



            <div class="logo">Sole<span class="mates">Mate</span></div>
            <a href="">Home</a>
            <a href="Views/browse.php">Men</a>
            <a href="Views/browse.php">Women</a>
            <a href="Views/browse.php">Children</a>
            <a href="Views/browse.php">Accessories</a>
            <div class="nav-icons">
                <a href=""> <i class="fa-solid fa-magnifying-glass"></i></a>

                <a href="Views/login.php"><i class="fa-solid fa-user"></i></a>

                <a href="Views/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>

                <div class="logout">
                    <?php if ($username != "Guest") { ?>

                        <?php echo "<a href='Views/logout.php'> Welcome $username, Logout?</a>" ?>
                    <?php } else { ?>
                        <?php echo "<a href='#'> Welcome $username</a>" ?>

                    <?php } ?>
                </div>

            </div>



        </div>






        <div class="content">

            <div class="Homebox1">

                <h1>OUR POPULAR PRODUCT</h1>
                <p>Lorem ipsum is simply dummy lorem ipsum</p>



                <div class="rec1">
                    <a href="Views/details.php"><img src="Assets//Images//orange.png" alt="Shoe 1">
                        <p class="bold">Nike Shoes</p>
                        <p>Leather shoes for men</p>
                        <p>2,190 BDT | 50% discount</p>

                    </a>
                    <div class="discount-label">50% discount</div>
                </div>
                <div class="rec2">
                    <a href="Views/details.php"><img src="Assets//Images//black.png" alt="Shoe 2">

                        <p>Nike Shoes</p>
                        <p>Leather shoes for men</p>
                        <p>2,190 BDT | 50% discount</p>

                    </a>image
                    <div class="discount-label1">50% discount</div>

                </div>
                <div class="rec3">
                    <a href="Views/details.php"><img src="Assets//Images//blue.png" alt="Shoe 3">
                        <p>Nike Shoes</p>
                        <p>Leather shoes for men</p>
                        <p>2,190 BDT | 50% discount</p>
                    </a>
                    <div class="discount-label2">50% discount</div>
                </div>
                <div class="rec4">
                    <a href="Views/details.php"><img src="Assets//Images//orange.png" alt="Shoe 4">
                        <p>Nike Shoes</p>
                        <p>Leather shoes for men</p>
                        <p>2,190 BDT | 50% discount</p>

                    </a>
                    <div class="discount-label3">50% discount</div>
                </div>
                <div class="rec5">
                    <a href="Views/details.php"><img src="Assets//Images//orange.png" alt="Shoe 5">

                        <p>Nike Shoes</p>
                        <p>Leather shoes for men</p>
                        <p>2,190 BDT | 50% discount</p>
                    </a>
                    <div class="discount-label4">50% discount</div>
                </div>
                <div class="rec6">
                    <a href="Views/details.php"><img src="Assets//Images//black.png" alt="Shoe 6">

                        <p>Nike Shoes</p>
                        <p>Leather shoes for men</p>
                        <p>2,190 BDT | 50% discount</p>


                    </a>
                    <div class="discount-label5">50% discount</div>
                </div>
                <a href="Views//catalog.php">

                    <a href="#" onclick="scrollToElement('scrollBtn')">SHOW MORE</a>
                </a>


            </div>







            <div class="Homebox">
                <div class="image-container">
                    <img src="Assets//Images//blue.png" alt="image 4" height="650px" width="650px">
                    <div class="image-container2">
                        <img src="Assets//Images//orange.png" alt="image 5" height="200px" width="200px">
                    </div>
                    <div class="image-container3">
                        <img src="Assets//Images//black.png" alt="image 6" height="200px" width="200px">

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
                        <img src="Assets//Images//orange.png" alt="Image 1" height="140px" width="140px">
                        <img src="Assets//Images//blue.png" alt="Image 2" height="140px" width="140px">
                        <img src="Assets//Images//black.png" alt="Image 3" height="140px" width="140px">
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
                            <li><a href="Views/browse.php">Men's Shoes</a></li>
                            <li><a href="Views/browse.php">Women's Shoes</a></li>
                            <li><a href="Views/browse.php">Kid's Shoes</a></li>
                            <li><a href="Views/browse.php">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="Views/faq.php">Pricing Plan</a></li>
                            <li><a href="Views/faq.php">Documentation</a></li>
                            <li><a href="Views/faq.php">Guide</a></li>

                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>company</h4>
                        <ul>
                            <li><a href="Views/faq.php">About</a></li>
                            <li><a href="Views/faq.php">Press</a></li>
                            <li><a href="Views/faq.php">Partner</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Legal</h4>
                        <ul>
                            <li><a href="Views/faq.php">Claim</a></li>
                            <li><a href="Views/faq.php">Privacy</a></li>
                            <li><a href="Views/faq.php">Terms</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </footer>



    </form>




    <script>
        function scrollToElement(elementId) {
            var element = document.getElementById(elementId);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    </script>






</body>

</html>
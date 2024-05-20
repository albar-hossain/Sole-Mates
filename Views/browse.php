<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once ("../Models/userModel.php");


if (isset($_SESSION['username'])) {
    $user = getUser($_SESSION['username']);
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
    <link rel="stylesheet" type="text/css" href="../Assets/css/browse.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js"></script>


</head>

<body>


    <form>

        <div class="nav">
            <div class="logo">Sole<span class="mates">Mate</span></div>
            <a href="../Home.php">Home</a>
            <a href="cart.php">Men</a>
            <a href="cart.php">Women</a>
            <a href="cart.php">Children</a>
            <a href="cart.php">Accessories</a>
            <div class="nav-icons">
                <a href="#"> <i class="fa-solid fa-magnifying-glass"></i></a>

                <a href="login.php"><i class="fa-solid fa-user"></i></a>

                <?php
                $count = 0;
                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                } ?>
                <a href="myCart.php"><i class="fa-solid fa-cart-shopping"><span
                            class="item_count"><?php echo $count ?></span></i></a>
                <div class="logout">
                    <?php if ($username != "Guest") { ?>
                        <?php echo "<a href='logout.php'> Welcome $username, Logout?</a>" ?>
                    <?php } else { ?>
                        <?php echo "<a href='logout.php'> Welcome $username</a>" ?>
                    <?php } ?>
                </div>
            </div>



        </div>


        </div>

        <div class="Productbox1">
            <div class="rec1">
                <a href="../Views/details.php"><img src="../Assets//Images//orange.png" alt="Shoe 1">
                    <p class="bold">Nike Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>

                </a>
                <div class="discount-label">50% discount</div>
            </div>
            <div class="rec2">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 2">

                    <p>Bata Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>

                </a>image
                <div class="discount-label1">50% discount</div>

            </div>
            <div class="rec3">
                <a href="../Views/details.php"><img src="../Assets//Images//blue.png" alt="Shoe 3">
                    <p>Sneakers Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>
                </a>
                <div class="discount-label2">50% discount</div>
            </div>

            <div class="rec4">
                <a href="../Views/details.php"><img src="../Assets//Images//orange.png" alt="Shoe 4">
                    <p>Strike Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>

                </a>
                <div class="discount-label3">50% discount</div>
            </div>
            <div class="rec5">
                <a href="../Views/details.php"><img src="../Assets//Images//orange.png" alt="Shoe 5">

                    <p>Bata Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>
                </a>
                <div class="discount-label4">50% discount</div>
            </div>
            <div class="rec6">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Srut Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec7">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 7">

                    <p>Catwalk Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec8">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Nike Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec9">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Bata Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec10">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Boot Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec11">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Sneaker Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec12">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Srut Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec13">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Solina Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec14">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Bata Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec15">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Strike Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

            <div class="rec16">
                <a href="../Views/details.php"><img src="../Assets//Images//black.png" alt="Shoe 6">

                    <p>Sneakers Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,190 BDT | 50% discount</p>


                </a>
                <div class="discount-label5">50% discount</div>
            </div>

        </div>




    </form>
</body>

</html>
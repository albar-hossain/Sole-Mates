<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once ("../Models/userModel.php");
require_once ("../Controllers/cartController.php");


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
    <link rel="stylesheet" type="text/css" href="../Assets/css/cart.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="nav">
        <div class="logo">Sole<span class="mates">Mate</span></div>
        <a href="../Home.php">Home</a>
        <a href="browse.php">Men</a>
        <a href="browse.php">Women</a>
        <a href="browse.php">Children</a>
        <a href="browse.php">Accessories</a>
        <div class="nav-icons">
            <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
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

    <div class="Productbox1">
        <form action="../Controllers/cartController.php" method="POST">
            <div class="rec1">
                <a href="details.php"><img src="../Assets/Images/orange.png" alt="Shoe 1">
                    <p class="bold">Nike Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,000 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Nike Shoes">
                <input type="hidden" name="Price" value="2000">
            </div>
        </form>
        <form action="../Controllers/cartController.php" method="POST">
            <div class="rec2">
                <a href="details.php"><img src="../Assets/Images/black.png" alt="Shoe 2">
                    <p>Bata Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>2,200 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Bata Shoes">
                <input type="hidden" name="Price" value="2200">
            </div>
        </form>
        <form action="../Controllers/cartController.php" method="POST">
            <div class="rec3">
                <a href="details.php"><img src="../Assets/Images/blue.png" alt="Shoe 3">
                    <p>Sneakers Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>3,190 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Sneakers Shoes">
                <input type="hidden" name="Price" value="3190">
            </div>
        </form>
        <!-- <form action="../Controllers/cartController.php" method="POST">
            <div class="rec4">
                <a href="../Views/details.php"><img src="../Assets/Images/orange.png" alt="Shoe 4">
                    <p>Strike Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>4,000 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Strike Shoes">
                <input type="hidden" name="Price" value="4000">
            </div>
        </form>
        <form action="../Controllers/cartController.php" method="POST">
            <div class="rec5">
                <a href="../Views/details.php"><img src="../Assets/Images/orange.png" alt="Shoe 5">
                    <p>Bata Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>3,200 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Bata Shoes">
                <input type="hidden" name="Price" value="3200">
            </div>
        </form>
        <form action="../Controllers/cartController.php" method="POST">
            <div class="rec6">
                <a href="../Views/details.php"><img src="../Assets/Images/black.png" alt="Shoe 6">
                    <p>Srut Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>5,000 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Srut Shoes">
                <input type="hidden" name="Price" value="5000">
            </div>
        </form>
        <form action="../Controllers/cartController.php" method="POST">
            <div class="rec7">
                <a href="../Views/details.php"><img src="../Assets/Images/black.png" alt="Shoe 7">
                    <p>Catwalk Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>7,200 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Catwalk Shoes">
                <input type="hidden" name="Price" value="7200">
            </div>
        </form>
        <form action="../Controllers/cartController.php" method="POST">
            <div class="rec8">
                <a href="../Views/details.php"><img src="../Assets/Images/black.png" alt="Shoe 8">
                    <p>Nike Shoes</p>
                    <p>Leather shoes for men</p>
                    <p>8,000 BDT | 50% discount</p>
                </a>
                <div class="discount-label">50% discount</div>
                <button class="add_to_cart" name="add_to_cart">Add To Cart</button>
                <input type="hidden" name="Item_name" value="Nike Shoes">
                <input type="hidden" name="Price" value="8000">
            </div> -->
        </form>
    </div>
</body>

</html>
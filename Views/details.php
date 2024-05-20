<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once ("../Controllers/reviewController.php");
require_once ("../Controllers/logController.php");


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
    <link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../Assets/css/reviews.css">
    <link rel="stylesheet" type="text/css" href="../Assets/css/details.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js"></script>
</head>

<body>
    <form>
        <div class="nav">
            <div class="logo">Sole<span class="mates">Mate</span></div>
            <a href="..\home.php">Home</a>
            <a href="browse.php">Men</a>
            <a href="browse.php">Women</a>
            <a href="browse.php">Children</a>
            <a href="browse.php">Accessories</a>
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

        <div class="Detailbox">
            <!-- Shoe Picture -->
            <img src="../Assets/Images/orange.png" alt="Shoe Picture" width="700px">
            <!-- Product Details -->
            <div class="product-details">
                <h2><strong>PRODUCT DETAILS</strong></h2>
                <h3>Material:</h3>
                <p>
                    UPPER: 52% Synthetic, 48% Textile<br>
                    OUTSOLE: Synthetic Rubber
                </p>
                <p><strong>Care instructions:</strong> Hand Wash</p>
                <p><strong>Sole material:</strong> Synthetic Rubber</p>
                <p><strong>Shaft height:</strong> Ankle</p>
            </div>


            <div class="additional-text">
                <h2><strong>NIKE SHOES 4</strong></h2>
                <h3>“Midnight Navy”</h3>
                <p><strong>2,190 BDT</strong></p>
                <p><strong>Promotion:</strong> 50% OFF</p>
                <!-- Buttons -->
                <button class="add_to_cart_btn">ADD TO CART</button>
                <button class="buy_now_btn">BUY NOW</button><br>

                <select class="size-selector">
                    <option value="6">Size 6</option>
                    <option value="7">Size 7</option>
                    <option value="8">Size 8</option>
                    <option value="9">Size 9</option>

                </select>
                <!-- Quantity Selector -->
                <input type="number" class="quantity-selector" value="1" min="1" max="10">
            </div>
        </div>
        </div>

        <!-- Reviews Section -->
        <div class="re-div">
            <fieldset>

                <center>
                    <h1>Customer Review</h1>
                </center>

                <form action="" onsubmit="return validateData()" method="post">
                    <table>
                        <tr>
                            <td><span>Username</span></td>
                            <td>:</td>
                            <td><input type="text" name="uname" id="uname" value="<?php echo $uname; ?>"
                                    placeholder="Username"> </td>
                            <td><span><?php echo $err_uname; ?></span><span id="err_uname" </span></td>
                        </tr>
                        <tr>
                            <td><span>Email</span></td>
                            <td>:</td>
                            <td><input type="text" name="email" id="email" value="<?php echo $email; ?>"
                                    placeholder="Email"> </td>
                            <td><span><?php echo $err_email; ?></span><span id="err_email" </span></td>
                        </tr>
                        <tr>
                            <td><span>Comment</span></td>
                            <td>:</td>
                            <td><textarea name="comment" id="comment"></textarea></td>
                            <td><span><?php echo $err_comment; ?></span><span id="err_comment" </span></td>
                        </tr>
                        <tr>
                            <td colspan="5" align="center">
                                <br>
                                <input type="Submit" name="submit" value="Submit">
                            </td>
                        </tr>
                    </table>
            </fieldset>
        </div>
    </form>
    </center>

    <!-- footer -->



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
</body>
<script src="../Assets/JS/reviewValidation.js"></script>

</html>
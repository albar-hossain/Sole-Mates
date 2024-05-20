<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once ("../Controllers/cartController.php");
require_once ("../Controllers/purchaseController.php");
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
    <link rel="stylesheet" type="text/css" href="../Assets/css/cart.css">
    <link rel="stylesheet" type="text/css" href="../Assets/css/myCart.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js"></script>
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

    <div class="container">
        <div class="tables-container">
            <table class="cart">
                <tr>
                    <th colspan="6">
                        <h1>MY CART</h1>
                    </th>
                </tr>
                <tr>
                    <th>Serial No.</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                $totalBill = 0;
                if (isset($_SESSION["cart"])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $totalBill += $value['Price'];
                        $sr = $key + 1;
                        echo "
                    <tr>
                <td>$sr</td>
                <td>$value[Item_name]</td>
                <td>$value[Price]&#2547;<input type='hidden' class='iprice' value='$value[Price]'></td>
                <td>
                    <form action='../Controllers/cartController.php' method='POST'>
                    <input class='iquantity'style='text-align:center;' name='Mod_Quantity' onchange='this.form.submit();' type='number' min='1' max ='10' value = '$value[Quantity]' >
                    <input type='hidden' name='Item_name' value='$value[Item_name]';>
                    </form>
                </td>
                <td class='itotal'></td>
                <td>
                <form action='../Controllers/cartController.php' method='POST'>
                <button name='remove_item'>REMOVE</button>
                <input type='hidden' name='Item_name' value='$value[Item_name]';>
                </form>
                </td>
            </tr>";
                    }
                }
                ?>
            </table>

            <div class="bill">

                <table class="purchase">
                    <tr>
                        <th colspan="4">
                            <h2>Grand Total:</h2>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <h2 id="gtotal"></h2>
                        </td>
                    </tr>
                    <?php
                    if (isset($_SESSION["cart"]) && count($_SESSION['cart']) > 0) { ?>
                        <form action="../Controllers/purchaseController.php" method="POST">
                            <tr>

                                <td><label>Full Name</label>
                                    <input type="text" name="fullname">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Email</label>
                                    <input type="text" name="email">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Address</label>
                                    <input type="text" name="address">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="cash_payment" id="cash_payment" class="cash_payment"
                                        value="COD" checked>
                                    <label for="cash_payment">Cash On Delivery</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="purchase" name="purchase">Make Purchase</button>
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>

    <script src="../Assets/JS/myCart.js"></script>
    <script>
        subTotal();
    </script>
</body>

</html>
<?php
session_start();
require_once ("../Controllers/cartController.php");
// require_once ('../controllers/sessionCheck.php');
// $userName = $_SESSION['currentUserName'];

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
        <a href="">Home</a>
        <a href="">Men</a>
        <a href="">Women</a>
        <a href="">Children</a>
        <a href="">Accessories</a>
        <div class="nav-icons">
            <a href=""> <i class="fa-solid fa-magnifying-glass"></i></a>

            <a href=""><i class="fa-solid fa-user"></i></a>

            <a href=""><i class="fa-solid fa-cart-shopping"><span class="item_count">(0)</span></i></a>
        </div>



    </div>

    </div>

    <div class="container">
        <table class="cart">
            <tr>
                <th colspan="5">
                    <h1>MY CART</h1>
                </th>
            </tr>

            <tr>
                <th>Serial No.</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Quantity</th>
            </tr>
            <tr>
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
                <td>$value[Price] &#2547;</td>
                <td><input style='text-align:center;' type='number' min='1' max ='10' value = '$value[Quantity]'></td>
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
            <h3>Total:</h3>
            <h4><?php echo $totalBill ?></h4>
            <form action="">
                <!-- <input type="radio" name="cash_payment" id="cash_payment" checked>
                <label for="cash_payment"><span class="text">Cash On Delivery</span></label> -->
                <button class="purchase">Make Purchase</button>

            </form>
        </div>

    </div>
    </div>









</body>

</html>
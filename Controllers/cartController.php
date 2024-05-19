<?php
session_start();
// session_destroy();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $my_items = array_column($_SESSION['cart'], 'Item_name');
            if (in_array($_POST['Item_name'], $my_items)) {
                echo '<script>alert("Item Already Added");
                window.location.href=("../Views/cart.php");
                </script>';

            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo '<script>alert("Item Added");
                window.location.href=("../Views/cart.php");
                </script>';
                // print_r($_SESSION['cart']);
            }
        } else {
            $_SESSION["cart"][0] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
            echo '<script>alert("Item Added");
                window.location.href=("../Views/cart.php");
                </script>';
            // print_r($_SESSION['cart']);
        }
    }

    // if (isset($_POST['remove_item'])) {
    //     foreach ($_SESSION['cart'] as $key => $value) {
    //         if ($value['Item_name'] == $_POST['Item_name']) {
    //             unset($_SESSION['cart'][$key]);
    //             $_SESSION['cart'] = array_values($_SESSION['cart']);
    //             echo '<script>alert("Item Removed");
    //             window.location.href=("../Views/myCart.php");
    //             </script>';


    //         }

    //     }

    // }

    if (isset($_POST['remove_item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_name'] == $_POST['Item_name']) {
                unset($_SESSION['cart'][$key]);
                // Re-index the array to ensure there are no gaps in the keys
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo '<script>
                    alert("Item Removed");
                    window.location.href = "../Views/myCart.php";
                </script>';
                break; // Exit the loop after removing the item
            }
        }
    }


}
?>
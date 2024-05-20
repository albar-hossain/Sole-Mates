<?php
session_start();
require_once ('db.php');

function login($username, $password)
{
    $con = getConnection();
    $sql = "select * from users where userName='{$username}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $user = mysqli_fetch_array($result);
    if ($count == 1) {
        session_start();
        $_SESSION['username'] = $row['UserName'];
        $_SESSION['currentUserName'] = $row['UserName'];
        $_SESSION['password'] = $row['Password'];
        $_SESSION['flag'] = "true";
        return true;

    } else {
        return false;
    }
}

function getUser($userName)
{
    $con = getConnection();
    $sql = "select * from users where userName='{$userName}'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        return NULL;
    }

    $user = mysqli_fetch_assoc($result);
    return $user;
}

function authenticateUser($uname, $pass)
{
    $query = "SELECT * FROM users WHERE userName='$uname' and password='$pass'";
    $result = get($query);
    if (count($result) > 0) {
        return $result[0];
    }
    return false;
}


function get($query)
{
    $con = getConnection();
    $result = mysqli_query($con, $query);
    $data = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}


function signUp($userName, $name, $ad, $email, $pass)
{
    $con = getConnection();
    // $sql = "INSERT INTO users ('name','userName','address','email','password','role') VALUES ('$name','$userName','$ad',$email','$pass','customer');";
    $sql = "INSERT INTO users VALUES (NULL,'$name','$userName','$ad','$email','$pass','customer');";
    $res = mysqli_query($con, $sql);
}

function review($userName, $email, $comment)
{
    $con = getConnection();
    $sql = "INSERT INTO reviews VALUES ('$userName','$email', '$comment');";
    $res = mysqli_query($con, $sql);
}

function checkDuplicateUserName($userName)
{
    $query = "select * from users where userName='{$userName}'";
    $result = get($query);
    if (count($result) > 0) {
        return true;
    }
    return false;
}

function checkDuplicateEmail($email)
{
    $query = "select * from users where email='{$email}'";
    $result = get($query);
    if (count($result) > 0) {
        return true;
    }
    return false;
}

function checkout($name, $email, $add, $pay)
{
    $con = getConnection();
    $sql = "INSERT INTO `order_manager`(`Name`, `Email`, `Address`, `Payment_Mode`) VALUES ('$name','$email','$add','$pay')";


    $result = mysqli_query($con, $sql);
    if ($result) {
        $Order_Id = mysqli_insert_id($con);
        $sql2 = "INSERT INTO `user_orders`(`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
        $stmp = mysqli_prepare($con, $sql2);
        if ($stmp) {
            mysqli_stmt_bind_param($stmp, "isii", $Order_Id, $Item_Name, $Price, $Quantity);
            foreach ($_SESSION['cart'] as $key => $values) {
                $Item_Name = $values['Item_name'];
                $Price = $values['Price'];
                $Quantity = $values['Quantity'];
                mysqli_stmt_execute($stmp);
                unset($_SESSION['cart']);
                echo '<script>alert("Order Placed");
                window.location.href=("../Home.php");
                </script>';
            }

        } else {
            echo '<script>alert("SQL Query Prepare Error");
        window.location.href=("../Views/cart.php");
        </script>';
        }
    } else {
        echo '<script>alert("SQL Error");
        window.location.href=("../Views/cart.php");
        </script>';
    }
}

?>
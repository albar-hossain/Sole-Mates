<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once ("../Models/userModel.php");

if (isset($_SESSION['currentUserName'])) {
    echo '<script type="text/javascript">
           window.onload = function () { 
               alert("You are already Logged In."); 
               window.location.replace("../Home.php"); 
           }; 
    </script>';
}


if (isset($_POST['Login'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    if (empty($userName) || empty($password)) {
        echo '<script>alert("Empty Username or Password.");
        window.location.href=("../Views/login.php");
        </script>';
    } else {
        $status = login($userName, $password);
        if ($status) {
            $_SESSION['flag'] = 'true';
            $_SESSION['currentUserName'] = $userName;
            $_SESSION['username'] = $userName;

            $user = authenticateUser($userName, $password);
            $role = $user["role"];

            if ($user) {
                if ($role == "customer") {
                    header("Location: ../Home.php");
                } elseif ($role == "admin") {
                    header("Location: ../Views/admin.php");
                } elseif ($role == "supplier") {
                    header("Location: ../Views/supplier.php");
                }


            }
        } else {
            echo '<script>alert("Invalid User!");
        window.location.href=("../Views/login.php");
        </script>';
        }
    }
}

?>
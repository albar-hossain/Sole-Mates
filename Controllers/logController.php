<?php
// session_start();
require_once ("../Models/userModel.php");

// Check if the user is already logged in
if (isset($_SESSION['currentUserName'])) {
    echo '<script type="text/javascript">
           window.onload = function () { alert("You are already Logged In."); window.location.href = "../Home.php"; } 
    </script>';

}

// Handle login attempt
if (isset($_POST['Login'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    if (empty($userName) || empty($password)) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Empty username or password"); } 
        </script>';
    } else {
        $status = login($userName, $password);
        if ($status) {
            $_SESSION['flag'] = 'true';
            $_SESSION['currentUserName'] = $userName;
            $_SESSION['username'] = $userName;
            $_SESSION['password'] = $password;

            $user = authenticateUser($userName, $password);
            $type = $user["role"];

            if ($user) {
                if ($type == "customer") {
                    session_start();
                    header("Location: ../Home.php");
                } elseif ($type == "admin") {
                    session_start();
                    header("Location: ../Views/details.php");
                } elseif ($type == "supplier") {
                    session_start();
                    header("Location: ../Views/catalog.php");
                }
                // header("Location: ../Home.php");
                exit();
            }
        } else {
            echo '<script type="text/javascript">
        window.onload = function () { alert("Invalid User!"); } 
        </script>';
        }
    }
}


// if (isset($_POST["Login"])) {
//     $userName = $_POST['userName'];
//     $password = $_POST['password'];

//     if (empty($userName)) {
//         $err_uname = "Username Required";
//         $hasError = true;
//     } elseif (strlen($userName) < 6) {
//         $err_uname = "Username Must be 6 Characters Long";
//         $hasError = true;
//     } elseif (strpos($userName, " ")) {
//         $err_uname = "Username should not contain white space";
//         $hasError = true;
//     } else {
//         $userName = htmlspecialchars($userName);
//     }
//     if (empty($password)) {
//         $err_pass = "Password Required";
//         $hasError = true;
//     } elseif (strlen($password) < 8) {
//         $err_pass = "Password must be at least 8 characters";
//         $hasError = true;
//     } elseif (!validPass($password)) {

//         $err_pass = "Password Must Contain 1 Uppercase,1 Lowercase, 1 Number & (# or ?)";
//         $hasError = true;
//     } else {
//         $pass = htmlspecialchars($password);
//     }
//     if (!$hasError) {
//         $user = authenticateUser($userName, $password);
//         $type = $user["type"];

//         if ($user) {
//             if ($type == "user") {
//                 session_start();
//                 $_SESSION["loggedin"] = $user["fname"];
//                 $_SESSION["username"] = $user["uname"];
//                 header("Location:homepage.php");
//             } elseif ($type == "admin") {
//                 session_start();
//                 $_SESSION["adminlogin"] = $user["fname"];
//                 header("Location:admin.php");
//             } elseif ($type == "deliveryman") {
//                 session_start();
//                 $_SESSION["deliverylogin"] = $user["fname"];
//                 header("Location: deliveryman.php");
//             } elseif ($type == "seller") {
//                 session_start();
//                 $_SESSION["sellerlogin"] = $user["fname"];
//                 header("Location: seller.php");
//             }



//         }



//     }
// }
?>
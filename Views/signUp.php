<?php
session_start();
require_once ("../Controllers/signUpController.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Assets\css\style.css">
    <link rel="stylesheet" href="..\Assets\css\customerSignUp.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js"></script>
    <title>Sign-Up</title>
</head>

<body>
    <div class="nav">

        <div class="logo">Sole<span class="mates">Mate</span></div>
        <a href="../Home.php">Home</a>
        <a href="">Men</a>
        <a href="">Women</a>
        <a href="">Children</a>
        <a href="">Accessories</a>
        <div class="nav-icons">
            <a href="#"> <i class="fa-solid fa-magnifying-glass"></i></a>

            <a href="#"><i class="fa-solid fa-user"></i></a>

            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>



    </div>



    <div class="signUpBox">
        <h2 class="greet">Looks like you are new here.<br>
            We need some info.</h2>
        <!-- <form action="../Controllers/signUpController.php" onsubmit="return validateRegistration()" method="post"> -->
        <form action="" onsubmit="return validateRegistration()" method="post">
            <table align="center">
                <tr>
                    <td><span><b>Name:<b></span></td>
                    <td><input type="text" id="fname" name="fname" value="<?php echo $fname; ?>"
                            placeholder="Full Name">
                        <span id="err_fname"> </span> <span><?php echo $err_fname; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><span><b>Username:</b></span></td>
                    <td><input type="text" name="uname" id="uname" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <td><span><b>Address:</b></span></td>
                    <td><input type="text" name="ad" id="ad" value="<?php echo $ad; ?>" placeholder="Address">
                        <span id="err_ad"></span> <span><?php echo $err_ad; ?></span>
                    </td>
                </tr>

                <tr>
                    <td><span><b>Email:</b></span></td>
                    <td><input type="text" value="<?php echo $email; ?>" name="email" id="email" placeholder="Email">
                        <span id="err_email"></span> <span><?php echo $err_email; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><span><b>Password:</b></span></td>
                    <td><input type="password" name="pass" id="pass" value="<?php echo $pass; ?>"
                            placeholder="Password">
                        <span id="err_pass"></span> <span><?php echo $err_pass; ?></span>
                    </td>
                </tr>

            </table>
            <input type="submit" name="sign_up" value="Register">
            <center><a href="login.php" target="">Already Registered?</a></center>
        </form>
    </div>
</body>


</html>
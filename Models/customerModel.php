<?php 
    require_once('db.php');


function signUp($valid_signUp_request, $userName, $name, $email, $pass)
{
    $con = getConnection();
    // $sql = "select * from users where UserName='{$username}' and password='{$password}'";
    // $result = mysqli_query($con, $sql);
    // $count = mysqli_num_rows($result);
    // $row = mysqli_fetch_assoc($result);
    // $user = mysqli_fetch_array($result);
    // if ($count == 1) {
    //     session_start();
    //     setcookie('username', $row['UserName'], time() + 3600, '/');
    //     //setcookie('flag', 'true', time()+3600, '/');
    //     $_SESSION['username'] = $row['UserName'];
    //     $_SESSION['currentUserName'] = $row['UserName'];
    //     $_SESSION['password'] = $row['Password'];
    //     $_SESSION['flag'] = "true";
    //     return true;

    // } else {
    //     return false;
    // }
    if ($valid_signUp_request == true) {

        // $sql = "INSERT INTO users ('user_name','name','email','pass') VALUES ('$userName','$name','$email','$pass');";
        $sql = "INSERT INTO users VALUES ('$userName','$name','$email','$pass');";
        $res = mysqli_query($con, $sql);
        return true;

    } else {
        return false;
    }
}

?>
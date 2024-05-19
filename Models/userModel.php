<?php

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





function searchUser($userName)
{
    $con = getConnection();
    $sql = "select * from Users where userName like '%{$userName}%'";
    $result = mysqli_query($con, $sql);

    return $result;
}


function deleteUser($userName)
{
    $con = getConnection();
    $sql = "delete from Users where userName = '{$userName}'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        return false;
    } else {
        return true;
    }

}

function updateUser($currentUserName, $user)
{
    $con = getConnection();

    $balance = $user['balance'];
    $dateOfBirth = $user['dateOfBirth'];
    $email = $user['email'];
    $firstName = $user['firstName'];
    $gender = $user['gender'];
    $joiningDate = $user['joiningDate'];
    $lastName = $user['lastName'];
    $phoneNumber = $user['phoneNumber'];
    $profilePicture = $user['profilePicture'];
    $totalViews = $user['totalViews'];
    $type = $user['type'];
    $userName = $user['userName'];
    $password = $user['password'];

    $sql = "update Users set balance = '{$balance}', dateOfBirth = '{$dateOfBirth}', email = '{$email}', firstName = '{$firstName}', gender = '{$gender}', joiningDate = '{$joiningDate}', lastName = '{$lastName}', phoneNumber = '{$phoneNumber}', profilePicture = '{$profilePicture}', totalViews = {$totalViews}, type = '{$type}', userName = '{$userName}', password = '{$password}' where userName = '{$currentUserName}'";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        return false;
    } else {
        return true;
    }
}

function checkDuplicateUserName($userName)
{
    $con = getConnection();
    $sql = "select * from Users where userName='{$userName}'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        return NULL;
    }

    $user = mysqli_fetch_assoc($result);
    return $user;
}

function checkDuplicateEmail($email)
{
    $con = getConnection();
    $sql = "select * from Users where email='{$email}'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        return NULL;
    }

    $user = mysqli_fetch_assoc($result);
    return $user;
}



?>
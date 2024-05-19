<?php
$dbhost = "localhost:3325";
// $dbhost = "localhost";
$dbname = "solemates";
$dbuser = "root";
$dbpass = "";


function getConnection()
{
    global $dbhost;
    global $dbname;
    global $dbpass;
    global $dbuser;
    return $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}


function execute($query)
{
    global $db_server, $db_user, $db_password, $db_name;
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    mysqli_query($conn, $query);
}
?>
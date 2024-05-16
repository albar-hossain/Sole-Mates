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
    return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}

function get($query)
{
    global $db_server, $db_user, $db_password, $db_name;
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    $result = mysqli_query($conn, $query);
    $data = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function execute($query)
{
    global $db_server, $db_user, $db_password, $db_name;
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    mysqli_query($conn, $query);
}
?>
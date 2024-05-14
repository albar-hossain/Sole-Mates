<?php
    $dbhost = "localhost";
    $dbname = "solemates";
    $dbuser = "root";
    $dbpass = "";

    function getConnection(){
        global $dbhost;
        global $dbname;
        global $dbpass;
        global $dbuser;
        return  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
?>
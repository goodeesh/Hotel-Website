<?php
$host = "localhost";
$dbname = "login_db";
$username = "user";
$password = "userpassword";
$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli -> connect_errno){
    die("Problem mit der Verbindung " .$mysqli->connect_error);
}
return $mysqli;
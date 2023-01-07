<?php
session_start();
$host = "localhost";
$db = "student";
$user = "root";
$password = "";

try {
    $con = new PDO("mysql:host=$host; dbname=$db;", $user, $password);

    // echo "<h1>Connection Successfull</h1>";
} catch (Exception $e) {
    echo "Connection Failed" . $e->getMessage();
}

?>
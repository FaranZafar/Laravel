<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "umsproject";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if ($conn) {
    echo "<script>alert('Connection built successfully');</script>";
} else {
    $error = mysqli_connect_error();
    echo "<script>alert('Connection failed: " . addslashes($error) . "');</script>";
    exit();
}

?>
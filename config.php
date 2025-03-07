<?php
$host = "localhost";
$user = "root";  // Default MySQL user
$pass = "";      // Default MySQL password is empty
$dbname = "milkdaily_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

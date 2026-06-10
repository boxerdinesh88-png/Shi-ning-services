<?php
$servername = "localhost"; 
$username = "yourusername_furniuser"; 
$password = "Sahil@1234"; 
$dbname = "yourusername_furnituredb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "SAHIL#1234";
$dbname = "furnituredb";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = htmlspecialchars(trim($_POST['name'] ?? ''));
$phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));
$message = htmlspecialchars(trim($_POST['message'] ?? ''));

if (empty($name) || empty($phone) || empty($email) || empty($message)) {
    die("All fields are required.");
}

$sql = "INSERT INTO contacts (name, phone, email, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $phone, $email, $message);

if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
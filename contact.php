<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";
$messageClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db_connect.php';
    
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $messageContent = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($phone) || empty($email) || empty($messageContent)) {
        $message = "All fields are required.";
        $messageClass = "error";
    } else {
        $sql = "INSERT INTO contacts (name, phone, email, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssss", $name, $phone, $email, $messageContent);
            if ($stmt->execute()) {
                $message = "Message sent successfully!";
                $messageClass = "success";
            } else {
                $message = "Insert Failed: " . $stmt->error;
                $messageClass = "error";
            }
            $stmt->close();
        } else {
            $message = "Statement Error: " . $conn->error;
            $messageClass = "error";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Response</title>
    <style>
        /* Your existing CSS */
    </style>
</head>
<body>
<div class="message-container">
    <h2>Contact Us Response</h2>
    <?php if (!empty($message)): ?>
        <div class="message-box <?php echo $messageClass; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <a href="index.html" class="back-btn">Go Back</a>
</div>
</body>
</html>
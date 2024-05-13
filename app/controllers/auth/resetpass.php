<?php
require "Database.php";
$config = require "config.php";
require "Validator.php";

// Create Database instance
$db = new Database($config);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $gmail = $_POST['gmail'];

    // Generate a random token for password reset
    $reset_token = bin2hex(random_bytes(32));

    // Set the expiration time for the token (e.g., 1 hour from now)
    $reset_token_expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Update the user record with the reset token and expiry time
    $sql = "UPDATE `user` SET `reset_token` = '$reset_token', `reset_token_expiry` = '$reset_token_expiry' WHERE `username` = '$username' AND `gmail` = '$gmail'";

    // Execute SQL query
    $result = $db->execute($sql);

    if ($result) {
        // Send the password reset link to the user's email
        // Implement your email sending logic here
        echo "Password reset link has been sent to your email.";
    } else {
        echo "Error: Failed to generate reset token.";
    }
}
require "views/auth/resetpass.view.php"
?>
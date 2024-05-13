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
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into database
    $sql = "INSERT INTO `user` (`username`, `gmail`, `password`) VALUES ('$username', '$gmail', '$hashed_password')";

    // Execute SQL query
    $result = $db->execute($sql);

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: Registration failed.";
    }
}
require "views/auth/register.view.php";
?>

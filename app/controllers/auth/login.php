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
    $password = $_POST['password'];

    // Fetch user data from the database
    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $user = $db->fetch($sql);

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        echo "Login successful!";
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}
require "views/auth/login.view.php";
?>

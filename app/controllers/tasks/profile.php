<?php
require_once '../app/models/User.php'; // Assuming this is the correct path to your User class

// Check if user is logged in, retrieve user data
if(isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $user = new User();
    $userData = $user->getUserById($user_id); // Assuming this method exists in your User class
    // Pass user data to the view
    require "../app/views/profile.view.php";
} else {
    // Redirect to login if user is not logged in
    header("Location: /login");
    exit();
}
?>

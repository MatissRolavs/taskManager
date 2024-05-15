<?php
guest();
require "../app/models/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();

    $result = $user->register($username,$password);

    if ($result) {
        header("Location: /login");
        die();
    } else {
        
    }
}
require "../app/views/auth/register.view.php";
?>

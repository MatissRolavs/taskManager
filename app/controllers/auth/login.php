<?php
guest();
require "../app/models/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $errors = [];

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $result = $user->login($username,$password);

    if ($result) {
        $_SESSION["user"] = true;
        $_SESSION["userID"] = $result["id"];
        $_SESSION["username"] = $result["username"];
        header("Location: /");
    }
    else{
        $errors["login"] = "Username or password is incorrect";
    }
}
require "../app/views/auth/login.view.php";
?>

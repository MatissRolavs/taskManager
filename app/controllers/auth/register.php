<?php
guest();
use App\Validators\Validator;
require "../app/core/Validator.php";
require "../app/models/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();

    $result = $user->register($username,$password);
    if (!Validator::string($password, min:6)) {
        $errors["password"] = "Password must be atleast 6 characters";
    }
    if (empty($errors)) {
        header("Location: /login");
        die();
    }
}
require "../app/views/auth/register.view.php";
?>

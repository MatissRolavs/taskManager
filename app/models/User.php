<?php

use App\Validators\Validator;

require "../app/core/Database.php";
require "../app/core/Validator.php";

class User {
    
    public $db;
    public $config; 

    public function __construct() {
        $this->config = require "../config.php";
        $this->db = new Database($this->config);
    }

    public function register($username, $password) {
        
        if (!Validator::string($password, min:6)) {
            $errors["password"] = "Password must be atleast 6 characters";
        }
        if(empty($errors)){
            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $params = [":username" => $username,
                    ":password" => password_hash($password, PASSWORD_BCRYPT)];
            $result = $this->db->execute($query,$params);
            if($result) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $params = [":username" => $username];
        $result = $this->db->execute($query,$params)->fetch();
        if(!$result){
            echo "this username doesnt exist";
        }
        else{
            $hashed_password = $result["password"];
            if($result && password_verify($password, $hashed_password)) {
                return $result;
            } else {
                return false;
            }
        }
    }
}
?>

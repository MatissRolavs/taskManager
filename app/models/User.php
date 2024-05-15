<?php
require "../core/Database.php";


class User {

    public $db;
    public $config; 

    public function __construct() {
        $this->config = require "../config.php";
        $this->db = new Database($config);
    }

    public function register($username, $password) {
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $params = [":username" => $username,
                ":password" => password_hash($password, PASSWORD_BCRYPT)];
        $this->db->execute($query,$params);
        if($this->db->execute($query,$params)) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $params = [":username" => $username];
        $result = $this->db->execute($query,$params)->fetch();

        $hashed_password = $result["password"];
        if($result && password_verify($password, $hashed_password)) {
            return true;
        } else {
            return false;
        }
    }
}
?>

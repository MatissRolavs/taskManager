<?php

require_once "../app/core/Database.php";


class User {
    
    public $db;
    public $config; 

    public function __construct() {
        $this->config = require "../config.php";
        $this->db = new Database($this->config);
    }

    public function register($username, $password) {
        
        
        
            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $params = [":username" => $username,
                    ":password" => password_hash($password, PASSWORD_BCRYPT)];
            $result = $this->db->execute($query,$params);
            if($result) {
                return true;
            }
        
    }

    public function login($username, $password) {
        $errors =[];
        $query = "SELECT * FROM users WHERE username = :username";
        $params = [":username" => $username];
        $result = $this->db->execute($query,$params)->fetch();
        if(!$result){
            $errors["login"] = "this username doesnt exist";
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
    public function getUserById($id){
        $query = 'SELECT * FROM users WHERE id = :id';
        $params = [':id' => $id];
        $result = $this->db->execute($query, $params)->fetch();
        return $result;
    }
    
    public function getAll(){
        $query = 'SELECT * FROM users';
        $params = [];
        $users = $this->db->execute($query, $params)->fetchAll();
        return $users;
    }
}
?>

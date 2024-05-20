<?php

require_once '../app/core/Database.php';

class TaskManager {
    private $db;

    public function __construct(){
        $config = require "../config.php";
        $this->db = new Database($config); 
    }

    // Create task
    public function create($title, $description, $due, $completed, $user_id){
        $query = 'INSERT INTO tasks (title, description, due, completed, user_id) VALUES (:title, :description, :due, :completed, :user_id)';
        $params= [
            ':title' => $title,
            ':description' => $description,
            ':due' => $due,
            ':completed' => $completed,
            ':user_id' => $user_id
        ];

        // Execute
        if($this->db->execute($query, $params)){
            return true;
        } else {
            return false;
        }
    }

    // Delete task
    public function delete($id){
        $query = 'DELETE FROM tasks WHERE id = :id';
        $params = [':id' => $id];

        // Execute
        if($this->db->execute($query, $params)){
            return true;
        } else {
            return false;
        }
    }

    // Edit task
    public function edit($id, $title, $description, $due, $completed){
        $query = 'UPDATE tasks SET title = :title, description = :description, due = :due, completed = :completed WHERE id = :id';
        $params= [
            ':id' => $id,
            ':title' => $title,
            ':description' => $description,
            ':due' => $due,
            ':completed' => $completed
        ];

        // Execute
        if($this->db->execute($query, $params)){
            return true;
        } else {
            return false;
        }
    }

    // Get task by ID
    public function getTaskById($id){
        $query = 'SELECT * FROM tasks WHERE id = :id';
        $params = [':id' => $id];
        $result = $this->db->execute($query, $params)->fetch();
        return $result;
    }

    // Get all tasks
    public function getAll(){
        $query = 'SELECT * FROM tasks';
        $params = [];
        $tasks = $this->db->execute($query, $params)->fetchAll();
        return $tasks;
    }
    
    
}
?>

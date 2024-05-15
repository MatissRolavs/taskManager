<?php 

/// Include the Database class
require_once '../app/core/Database.php';

class TaskManager {
    private $db;

    public function __construct(){
        $config = require "../config.php";
        $this->db = new Database($config); 
    }

    // Create task
    public function create($title, $description, $due, $completed, $user_id){
        $this->db->query('INSERT INTO tasks (title, description, due, completed, user_id) VALUES (:title, :description, :due, :completed, :user_id)');
        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->bind(':due', $due);
        $this->db->bind(':completed', $completed);
        $this->db->bind(':user_id', $user_id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Delete task
    public function delete($id){
        $this->db->query('DELETE FROM tasks WHERE id = :id');
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Edit task
    public function edit($id, $title, $description, $due, $completed){
        $this->db->query('UPDATE tasks SET title = :title, description = :description, due = :due, completed = :completed WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->bind(':due', $due);
        $this->db->bind(':completed', $completed);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Get task by ID
    public function getTaskById($id){
        $this->db->query('SELECT * FROM tasks WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    // Get all tasks
    public function getAll(){
        $this->db->query('SELECT * FROM tasks');
        $results = $this->db->resultSet();
        return $results;
    }
}




<?php

require_once '../app/core/Database.php';

class TaskManager {
    private $db;

    public function __construct(){
        $config = require "../config.php";
        $this->db = new Database($config); 
    }

    // Create task
    public function create($title, $description, $due, $completed, $priority, $user_id){
        $query = 'INSERT INTO tasks (title, description, due, completed, priority, user_id) VALUES (:title, :description, :due, :completed,:priority, :user_id)';
        $params= [
            ':title' => $title,
            ':description' => $description,
            ':due' => $due,
            ':completed' => $completed,
            ':priority' => $priority,
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
    public function edit($id, $title, $description, $due, $priority, $completed){
        $query = 'UPDATE tasks SET title = :title, description = :description, due = :due,priority=:priority, completed = :completed WHERE id = :id';
        $params= [
            ':id' => $id,
            ':title' => $title,
            ':description' => $description,
            ':due' => $due,
            ':priority' => $priority,
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
    public function updateTaskCompletion($taskId, $completed) {
        $query = "UPDATE tasks SET completed = :completed WHERE id = :id";
        $params = [
            ':completed' => $completed,
            ':id' => $taskId
        ];

        return $this->db->execute($query, $params);
    }
    public function searchTasks($title){
        $query = 'SELECT * FROM tasks WHERE title LIKE :title';
        $params = [':title' => '%' . $title . '%'];
        return $this->db->execute($query, $params)->fetchAll();
    }
    
    
}
?>

<?php
auth();
// Include the TaskManager class
require_once '../app/models/taskList.php';

// Instantiate the TaskManager
$taskManager = new TaskManager();

// Check if task ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Task ID not provided.";
    exit;
}

// Get task details by ID
$task_id = $_GET['id'];
$task = $taskManager->getTaskById($task_id);


// Include the show view
require "../app/views/tasks/show.view.php";
?>

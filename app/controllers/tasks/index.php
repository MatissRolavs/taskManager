<?php
auth();
// Include the TaskManager class
require_once '../app/models/taskList.php';

// Create a new TaskManager instance
$taskManager = new TaskManager();

// Get all tasks
$tasks = $taskManager->getAll();

// Include the view file only if $tasks is not null
if ($tasks !== null) {
    require "../app/views/tasks/index.view.php";
} else {
    // Handle error if tasks are not retrieved
    echo "Failed to retrieve tasks.";
}
?>
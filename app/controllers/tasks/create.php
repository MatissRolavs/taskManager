<?php
auth();

require_once '../app/models/taskList.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $due = $_POST["due"];
    $completed = 0;

    // For demonstration purposes, assuming a default user ID (replace with your logic)
    $user_id = $_SESSION["userID"]; // You need to replace this with the actual user ID

    // Check if due date is in the past
    if (new DateTime($due) < new DateTime()) {
        $error_message = "Due date cannot be in the past.";
    } else {
        // Create a new TaskManager instance
        $taskManager = new TaskManager();

        // Call the create method to add the task
        if ($taskManager->create($title, $description, $due, $completed, $user_id)) {
            // Redirect to index view
            header("Location: /");
            exit();
        } else {
            // Handle error, if any
            $error_message = "Failed to create task.";
        }
    }
}

// Load the create view
require_once '../app/views/tasks/create.view.php';
?>

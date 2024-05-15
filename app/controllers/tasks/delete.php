<?php
require_once '../app/models/taskList.php';
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the 'id' parameter is set in the POST request
    if (isset($_POST["id"])) {
        // Get the task ID from the POST request
        $task_id = $_POST["id"];

        // Create a new TaskManager instance
        $taskManager = new TaskManager();

        // Call the delete method to delete the task with the given ID
        if ($taskManager->delete($task_id)) {
            // Redirect to the index page after deleting the task
            header("Location: /");
            exit();
        } else {
            // Handle error, if any
            echo "Failed to delete task.";
        }
    }
}

?>
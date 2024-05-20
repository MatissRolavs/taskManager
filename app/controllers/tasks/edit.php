<?php
auth();
// Include the TaskManager class
require_once '../app/models/taskList.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $task_id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $due = $_POST["due"];
    $completed = isset($_POST["completed"]) ? 1 : 0;

    // Create TaskManager instance
    $taskManager = new TaskManager();

    // Call edit method to update task
    if ($taskManager->edit($task_id, $title, $description, $due, $completed)) {
        // Redirect to task list page
        header("Location: /");
        exit();
    } else {
        // Handle error
        echo "Failed to update task.";
    }
}
?>

<?php
// Include the TaskManager class
require_once '../app/models/taskList.php';

// Check if task ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Task ID not provided.";
    exit;
}

// Get task details by ID
$task_id = $_GET['id'];
$taskManager = new TaskManager();
$task = $taskManager->getTaskById($task_id);

// Include the head and navbar components
require "../app/views/components/head.php";
require "../app/views/components/navbar.php";

// Include the edit view
require "../app/views/tasks/edit.view.php";
?>

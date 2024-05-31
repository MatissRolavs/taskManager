<?php
auth();
require_once '../app/models/taskList.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the input data
  $input = json_decode(file_get_contents('php://input'), true);

  // Validate input
  if (isset($input['id']) && isset($input['completed'])) {
    $taskId = (int)$input['id'];
    $completed = (int)$input['completed'];

    // Update the task
    $taskManager = new TaskManager();
    $success = $taskManager->updateTaskCompletion($taskId, $completed);

    // Send a response
    header('Content-Type: application/json');
    echo json_encode(['success' => $success]);
  } else {
    // Invalid input
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
  }
}
?>

<?php
// Include the TaskManager class
require_once '../app/models/taskList.php';

// Instantiate the TaskManager
$taskManager = new TaskManager();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    // Get the title from the POST request
    $title = $_POST['title'];

    // Get tasks by title
    $tasks = $taskManager->searchTasks($title);
} else {
    // Get all tasks
    $tasks = $taskManager->getAll();
}

// Include the head and navbar components
require "../app/views/components/head.php";
require "../app/views/components/navbar.php";
?>

<form action="/" method="POST" class="flex justify-center items-center rounded-md p-2 mx-auto w-1/4">
  <input type="text" name="title" placeholder="Search tasks..." class="border-2 border-gray-300 rounded-md p-2 flex-grow mr-2">
  <button type="submit" class="border-2 border-gray-300 rounded-md p-2">Search</button>
</form>

<div class="container mt-8 mx-auto px-4">
  <h1 class="mb-8 text-4xl text-center">Task list</h1>
  <div class="flex flex-wrap -mx-2">
    <?php foreach ($tasks as $task) { ?>
      <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 mb-4">
        <div class="task-item border border-gray-300 rounded-md p-4 flex flex-col justify-between" style="background-color: <?= $task['completed'] ? 'green' : 'red'; ?>">
          <h2>Name: <?= htmlspecialchars($task['title']) ?></h2>
          <p>Description: <?= htmlspecialchars($task['description']) ?></p>
          <p>Due Date: <?= htmlspecialchars($task['due']) ?></p>
          <div class="button-group mt-2 flex justify-between">
            <a href="/show?id=<?= $task['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-20 text-center">Show</a>
            <input type="checkbox" id="checkbox<?= $task['id'] ?>" name="id" value="<?= $task['id'] ?>" <?= $task['completed'] ? 'checked' : '' ?> class="form-checkbox h-5 w-5 text-green-500" onchange="updateTask(this, <?= $task['id'] ?>)">
            <span id="status<?= $task['id'] ?>"><?= $task['completed'] ? 'Completed' : '' ?></span>
            <form method="POST" action="/delete" class="button-form inline">
              <button name="id" value="<?= $task['id'] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block w-20 text-center">Delete</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<script>
function updateTask(checkbox, taskId) {
  let taskItem = checkbox.closest('.task-item');
  let completed = checkbox.checked ? 1 : 0;
  taskItem.style.backgroundColor = checkbox.checked ? 'green' : '#FF0800';

  // Update the status text
  let statusText = document.getElementById('status' + taskId);
  statusText.textContent = checkbox.checked ? 'Completed' : '';

  fetch('/updateTask', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ id: taskId, completed: completed }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log('Task updated successfully');
    } else {
      console.error('Failed to update task');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
}
</script>

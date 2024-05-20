<?php
// Include the TaskManager class
require_once '../app/models/taskList.php';

// Instantiate the TaskManager
$taskManager = new TaskManager();

// Get all tasks
$tasks = $taskManager->getAll();

// Include the head and navbar components
require "../app/views/components/head.php";
require "../app/views/components/navbar.php";
?>

<div class="container mt-8 mx-auto px-4">
  <h1 class="mb-8 text-4xl text-center">Task list</h1>
  <div class="flex flex-wrap -mx-2">
    <?php foreach ($tasks as $task) { ?>
      <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 mb-4">
        <div class="task-item border border-gray-300 rounded-md p-4 flex flex-col justify-between" style="background-color: <?= $task['completed'] ? 'green' : 'red'; ?>">
          <h2>Name: <?= $task['title'] ?></h2>
          <p>Description: <?= $task['description'] ?></p>
          <p>Due Date: <?= $task['due'] ?></p>
          <div class="button-group mt-2 flex justify-between">
            <a href="/show?id=<?= $task['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-20 text-center">Show</a>
            <input type="checkbox" name="id" value="<?= $task['id'] ?>" <?= $task['completed'] ? 'checked' : '' ?> class="form-checkbox h-5 w-5 text-green-500" onchange="updateTask(this, <?= $task['id'] ?>)">
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
  if (checkbox.checked) {
    taskItem.style.backgroundColor = 'green';
  } else {
    taskItem.style.backgroundColor = '#FF0800';
  }

  

}

</script>
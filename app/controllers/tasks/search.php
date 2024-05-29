<?php
// Include the TaskManager class
require_once '../app/models/taskList.php';
require_once "../app/models/User.php";

// Instantiate the TaskManager
$taskManager = new TaskManager();
$user= new User();
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

<form action="/search" method="POST" class="flex justify-center items-center rounded-md p-2 mx-auto w-1/4">
  <input type="text" name="title" placeholder="Search tasks..." class="border-2 border-gray-300 rounded-md p-2 flex-grow mr-2">
  <button type="submit" class="border-2 border-gray-300 rounded-md p-2">Search</button>
</form>

<div class="container mt-8 mx-auto px-4">
  <h1 class="mb-8 text-4xl text-center">Task list</h1>
  <div class="flex flex-wrap -mx-2">
    <?php foreach ($tasks as $task) { ?>
      <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 mb-4">
        <div class="task-item border border-gray-300 rounded-md p-4 flex flex-col justify-between" style="background-color: <?= $task['completed'] ? 'green' : 'red'; ?>">
          <h2>Title: <?= $task['title'] ?></h2>
          <p>Due Date: <?= $task['due'] ?></p>
          <p>Created By: <?php $result = $user->getUserById($task['user_id']); echo $result["username"]; ?></p>
          <p>Priority: <?php if($task['priority']== 1){
            echo "⭐";
          } 
          if($task['priority']== 2){
            echo "⭐⭐";
          }
          if($task['priority']== 3){
            echo "⭐⭐⭐";
          }
          if($task['priority']== 4){
            echo "⭐⭐⭐⭐";
          }
          if($task['priority']== 5){
            echo "⭐⭐⭐⭐⭐";
          }
          ;?></p>
          <div class="button-group mt-2 flex justify-between">
            <a href="/show?id=<?= $task['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-20 text-center">Show</a>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block w-full text-center" onclick="toggleCompletion(<?= $task['id'] ?>, <?= $task['completed'] ?>)">
              <?= $task['completed'] ? 'Completed' : 'Not Completed' ?>
            </button>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<script>
function toggleCompletion(taskId, completed) {
  let newStatus = completed ? 0 : 1;
  fetch('/updateTask', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ id: taskId, completed: newStatus }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log('Task updated successfully');
      // Reload the page to reflect the changes
      location.reload();
    } else {
      console.error('Failed to update task');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
}
</script>

<?php require "../app/views/components/footer.php" ?>

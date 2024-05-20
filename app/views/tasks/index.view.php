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
<form action="/logout" method="POST">
  <button class="logout-button">Logout</button>
</form>


<div class="container mt-8 mx-auto px-4"> <!-- Added mx-auto for horizontal centering and px-4 for horizontal padding -->
  <img src="../public/shit.png" alt="mr poopie" width="600" height="600">
  <h1 class="mb-8 text-4xl text-center">Task list</h1> <!-- Added text-center for centering -->
  <div class="flex flex-wrap -mx-2"> <!-- Added flex-wrap to allow containers to wrap and -mx-2 to add horizontal margin between containers -->
    <?php foreach ($tasks as $task) { ?>
      <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 mb-4"> <!-- Added px-2 for horizontal margin between containers and mb-4 for vertical margin -->
        <div class="task-item border border-gray-300 rounded-md p-4 flex flex-col justify-between"> <!-- Added flex, flex-col, and justify-between to align buttons -->
          <h2>Name: <?= $task['title'] ?></h2>
          <p>Description: <?= $task['description'] ?></p>
          <p>Due Date: <?= $task['due'] ?></p>
          <p>Status: <?= $task['completed'] ? 'Completed' : 'Pending' ?></p>
          <div class="button-group mt-2 flex justify-between"> 
            <a href="/show?id=<?= $task['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-20 text-center">Show</a> 
            <form method="POST" action="/delete" class="button-form inline">
              <button name="id" value="<?= $task['id'] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block w-20 text-center">Delete</button> 
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php require "../app/views/components/footer.php" ?>

<?php
require_once '../app/models/taskList.php';
require_once "../app/models/User.php";

$user = new User();

// Include the head and navbar components
require "../app/views/components/head.php";
require "../app/views/components/navbar.php";
?>

<div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Create Task</h1>
    <form method="POST" action="/create" class="space-y-4">
      <div>
        <label for="title" class="block font-medium">Title:</label>
        <input type="text" id="title" name="title" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
      </div>
      
      <div>
        <label for="description" class="block font-medium">Description:</label>
        <input type="text" id="description" name="description" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
      </div>
      
      <div>
        <label for="due" class="block font-medium">Due Date:</label>
        <input type="datetime-local" id="due" name="due" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
        <span id="due-error" class="text-red-500"></span> 
      </div>
      <div>
        <label for="priority" class="block font-medium">Priority:</label>
        <select id="priority" name="priority" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
          <option value="1">⭐</option>
          <option value="2">⭐⭐</option>
          <option value="3">⭐⭐⭐</option>
          <option value="4">⭐⭐⭐⭐</option>
          <option value="5">⭐⭐⭐⭐⭐</option>
        </select>
      </div>
      <div id="userContainer"> 
        <label for="assignedUser" class="block font-medium">Assigned User:</label>
        <div class="flex items-center space-x-2">
          <select id="assignedUser" name="assignedUser" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            <option value="0"></option>  
            <?php foreach($users as $user) {?>
            <option value=<?= $user["id"] ?>><?= $user["username"] ?></option>
            <?php } ?>
          </select> 
        </div>
      </div>
      <button type="button" id="addUserButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            +
      </button>
      <button type="button" id="removeUserButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            -
      </button>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Create Task</button>
    </form>
  </div>
</div>

<?php require "../app/views/components/footer.php" ?>
<link rel="stylesheet" href="style.css"> 
<script>
  var usersData = <?php echo json_encode($users); ?>;
</script>
<script src="scriptAddButton.js"></script>

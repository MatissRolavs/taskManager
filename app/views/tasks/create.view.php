<?php require "../app/views/components/head.php" ?>
<?php require "../app/views/components/navbar.php" ?>

<div class="container mt-8">
  <div class="task-list">
    <div class="task-item">
      <form method="POST" action="/create" class="task-form">
        <label>Title:</label>
        <input type="text" name="title" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br>
        
        <label>Description:</label>
        <input type="text" name="description" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br>
        
        <label>Due Date:</label>
        <input type="datetime-local" name="due" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br> 
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
      </form>
    </div>
  </div>
</div>

<?php require "../app/views/components/footer.php" ?>

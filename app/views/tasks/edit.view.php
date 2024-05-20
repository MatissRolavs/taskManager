<div class="container mt-8">
  <div class="task-list">
    <h1>Edit Task</h1>
    <form method="POST" action="/edit" class="task-form">
      <input type="hidden" name="id" value="<?= $task['id'] ?>">
      <label>Title:</label>
      <input type="text" name="title" value="<?= $task['title'] ?>" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br>
      
      <label>Description:</label>
      <input type="text" name="description" value="<?= $task['description'] ?>" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br>
      
      <label>Due Date:</label>
      <input type="datetime-local" name="due" value="<?= $task['due'] ?>" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br> 
      
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Task</button>
    </form>
  </div>
</div>
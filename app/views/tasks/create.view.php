<?php require "../app/views/components/head.php" ?>
<?php require "../app/views/components/navbar.php" ?>
<div class="container mt-8">
  <div class="task-list">
    <h1>Create Task</h1>
    <form method="POST" action="/create" class="task-form">
      <label>Title:</label>
      <input type="text" name="title" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br>
      
      <label>Description:</label>
      <input type="text" name="description" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br>
      
      <label>Due Date:</label>
      <input type="datetime-local" id="due" name="due" required class="border border-gray-300 rounded-md px-3 py-2 mb-2"><br> 
      
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const dueInput = document.getElementById('due');
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');

    dueInput.min = `${year}-${month}-${day}T${hours}:${minutes}`;
  });
</script>


<?php require "../app/views/components/footer.php" ?>

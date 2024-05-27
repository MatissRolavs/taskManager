<?php require "../app/views/components/head.php" ?>
<?php require "../app/views/components/navbar.php" ?>

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
      </div>
      
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Create Task</button>
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

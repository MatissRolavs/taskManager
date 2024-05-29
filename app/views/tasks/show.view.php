<?php require "../app/views/components/head.php"; ?>
<?php require "../app/views/components/navbar.php"; ?>
<link rel="stylesheet" href="style.css"> 

<div class="container mt-8">
  <div class="task-list">
    <h1>Task Details</h1>
    <div class="task-item border border-gray-300 rounded-md p-4 mb-4">
      <h2><?= $task['title'] ?></h2>
      <p>Description: <?= $task['description'] ?></p>
      <p>Due Date: <?= date('Y-m-d H:i', strtotime($task['due'])) ?></p> <!-- Modified line for due date -->
    
      <div class="button-group mt-2">
        <a href="/edit?id=<?= $task['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
      </div>
      <form method="POST" action="/delete" class="button-form inline">
              <button name="id" value="<?= $task['id'] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block w-20 text-center">Delete</button>
            </form>
    </div>
  </div>
</div>

<?php require "../app/views/components/footer.php"; ?>

<?php require "../app/views/components/head.php" ?>
<?php require "../app/views/components/navbar.php"; ?>

<div class="container mt-8">
  <div class="task-list">
    <h1>Task Details</h1>
    <div class="task-item border border-gray-300 rounded-md p-4 mb-4">
      <h2><?= $task['title'] ?></h2>
      <p>Description: <?= $task['description'] ?></p>
      <p>Due Date: <?= $task['due'] ?></p>
      <p>Status: <?= $task['completed'] ? 'Completed' : 'Pending' ?></p>
      <div class="button-group mt-2">
        <a href="/edit?id=<?= $task['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
      </div>
    </div>
  </div>
</div>

<?php require "../app/views/components/footer.php"; ?>

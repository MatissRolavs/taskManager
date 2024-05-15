<?php require "../app/views/components/head.php" ?>
<?php require "../app/views/components/navbar.php" ?>

<div class="container mt-8 flex flex-col items-center"> 
  <h1 class="mb-8 text-4xl">Task list</h1> 
  <div class="task-list w-full">
    <?php foreach ($tasks as $task) { ?>
      <div class="task-item border border-gray-300 rounded-md p-4 mb-4">
        <h2><?= $task->title ?></h2>
        <p>Description: <?= $task->description ?></p>
        <p>Due Date: <?= $task->due ?></p>
        <p>Status: <?= $task->completed ? 'Completed' : 'Pending' ?></p>
          <div class="button-group mt-2">
            <form method="POST" action="/delete" class="button-form">
              <button name="id" value="<?= $task->id ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
          </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php require "../app/views/components/footer.php" ?>

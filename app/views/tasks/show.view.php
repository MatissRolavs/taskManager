<?php require "../app/views/components/head.php" ?>
<?php require "../app/views/components/navbar.php"; ?>
<link rel="stylesheet" href="style.css"> 

<div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Task Details</h1>
    <div class="border border-gray-300 rounded-md p-4 mb-4">
      <h2 class="text-xl font-medium"><?= $task['title'] ?></h2>
      <p class="mt-2"><span class="font-medium">Description:</span> <?= $task['description'] ?></p>
      <p class="mt-2"><span class="font-medium">Due Date:</span> <?= date('Y-m-d H:i', strtotime($task['due'])) ?></p>
      <p>Priority: <?php if($task['priority']== 1){
            echo "⭐★★★★";
          } 
          if($task['priority']== 2){
            echo "⭐⭐★★★";
          }
          if($task['priority']== 3){
            echo "⭐⭐⭐★★";
          }
          if($task['priority']== 4){
            echo "⭐⭐⭐⭐★";
          }
          if($task['priority']== 5){
            echo "⭐⭐⭐⭐⭐";
          }
          ;?></p>
    
      <div class="mt-4 flex justify-between">
        <a href="/edit?id=<?= $task['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        <form method="POST" action="/delete" class="inline">
          <button name="id" value="<?= $task['id'] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require "../app/views/components/footer.php" ?>
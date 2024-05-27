<?php require "../app/views/components/head.php"; ?>
<?php require "../app/views/components/navbar.php"; ?>

<div class="container mt-8">
    <div class="task-list">
        <h1 class="text-2xl font-semibold mb-4">Task Details</h1>
        <div class="task-item border border-gray-300 rounded-md p-4 mb-4">
            <h2 class="text-lg font-semibold"><?= $task['title'] ?></h2>
            <p class="text-gray-600"><?= $task['description'] ?></p>
            <p class="text-gray-600">Due Date: <?= date('Y-m-d H:i', strtotime($task['due'])) ?></p>
            <!-- Modified line for due date -->

            <div class="mt-4">
                <a href="/edit?id=<?= $task['id'] ?>"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                    Edit
                </a>
                <form method="POST" action="/delete" class="inline">
                    <button name="id" value="<?= $task['id'] ?>"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../app/views/components/footer.php"; ?>

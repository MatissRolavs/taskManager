<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Calendar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
    <style>
        /* Additional styles */
      
    </style>
</head>
<?php require "../app/views/components/navbar.php" ?>
<body>
    <!-- Navbar -->
    <div class="container mt-8 mx-auto px-4"> 
        <h2 class="text-2xl text-center mb-4">Task Calendar</h2>
        <div class="flex justify-between mb-4">
            <a href="?month=<?= $prevMonth ?>&year=<?= $prevYear ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">&lt;&lt; Previous Month</a>
            <a href="?month=<?= $nextMonth ?>&year=<?= $nextYear ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next Month &gt;&gt;</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-200">
                <?= $calendarHtml ?> 
            </table>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Calendar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Link to the external CSS file -->
</head>
<?php require "../app/views/components/navbar.php" ?>
<body>
    
    <div class="container mt-24 mx-auto px-4"> <!-- Added mt-24 to push content below the navbar -->
        <h2 class="text-3xl text-center mb-6">Task Calendar</h2>
        <div class="nav">
            <a href="?month=<?= $prevMonth ?>&year=<?= $prevYear ?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">&lt;&lt; Previous Month</a>
            <a href="?month=<?= $nextMonth ?>&year=<?= $nextYear ?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next Month &gt;&gt;</a>
        </div>
        <table class="calendar">
            <?= $calendarHtml ?> <!-- This will render the calendar -->
        </table>
    </div>
</body>
</html>

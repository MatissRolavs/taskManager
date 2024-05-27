<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Calendar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .calendar {
            border-collapse: collapse;
            width: 100%;
        }
        .calendar th, .calendar td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .calendar th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .calendar td {
            text-align: center;
            vertical-align: top;
            height: 100px;
        }
        .task {
            margin: 5px;
            padding: 5px;
            border-radius: 3px;
        }
        .completed {
            background-color: #d4edda;
            color: #155724;
        }
        .not-completed {
            background-color: #f8d7da;
            color: #721c24;
        }
        .nav {
            text-align: center;
            margin-bottom: 20px;
        }
        .nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #007BFF;
        }
        .nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<?php require "../app/views/components/navbar.php" ?>
<body>

<div class="text-center text-2xl">
  <h2>Task Calendar</h2>
</div>

    <div class="nav">
        <a href="?month=<?= $prevMonth ?>&year=<?= $prevYear ?>">&lt;&lt; Previous Month</a>
        <a href="?month=<?= $nextMonth ?>&year=<?= $nextYear ?>">Next Month &gt;&gt;</a>
    </div>
    <?= $calendarHtml ?> <!-- This will render the calendar -->
    
    <!-- Rest of your HTML content -->
    
</body>
</html>

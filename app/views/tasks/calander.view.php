
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Calendar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .calendar {
            border-collapse: collapse;
            width: 100%;
            background: url('/photo.jpeg') no-repeat center center;
            background-size: cover;
            opacity: 1; /* Background image is fully visible */
        }
        .calendar th, .calendar td {
            border: 1px solid #ddd;
            padding: 8px;
            background-color: rgba(255, 255, 255, 0.7); /* Slightly more transparent */
        }
        .calendar th {
            background-color: rgba(242, 242, 242, 0.7);
            text-align: center;
        }
        .calendar td {
            text-align: center;
            vertical-align: top;
            height: 100px;
            position: relative; /* Added to position the image inside the cell */
        }
        .task {
            margin: 5px;
            padding: 10px; /* increased padding for better readability */
            border-radius: 5px;
            font-weight: bold; /* bold text for better readability */
            color: #fff; /* white text color */
        }
        .task-details {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            box-sizing: border-box;
        }
        .task:hover .task-details {
            display: block;
        }
        .completed {
            background-color: rgba(40, 167, 69, 0.9); /* dark green background */
        }
        .not-completed {
            background-color: rgba(220, 53, 69, 0.9); /* dark red background */
        }
        .nav {
            text-align: center;
            margin-bottom: 20px;
        }
        .calendar-img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%; /* Adjust the width as needed */
            opacity: 0.3; /* reduced opacity for better visibility of tasks */
        }
    </style>
</head>
<?php require "../app/views/components/navbar.php"; ?>
<body>
    <!-- Navbar -->
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
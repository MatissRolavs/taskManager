<?php
require "../app/core/Database.php";
$config = require "../config.php";

// Create Database instance
$db = new Database($config);

// Fetch tasks from the database
$sql = "SELECT id, title, description, due, completed FROM tasks";
$query = $db->execute($sql, []);
$tasks = $query->fetchAll();

function build_calendar($month, $year, $tasks) {
    // Create array to store tasks by date
    $task_dates = [];
    foreach ($tasks as $task) {
        $date = date('Y-m-d', strtotime($task['due']));
        $task_dates[$date][] = $task;
    }

    // Array containing names of all days in a week
    $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    // First day of the month
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    // Number of days in the month
    $numberDays = date('t', $firstDayOfMonth);

    // Information about the first day of the month
    $dateComponents = getdate($firstDayOfMonth);

    // Name of the month
    $monthName = $dateComponents['month'];

    // HTML table to display calendar
    $calendar = "<table class='calendar table-auto'>";
    $calendar .= "<caption class='text-lg'>$monthName $year</caption>";
    $calendar .= "<thead><tr>";

    // Create the calendar headers
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr></thead><tbody><tr>";

    // Loop through all the days of the month
    $dayOfWeek = $dateComponents['wday']; // Index value 0-6 of the first day of the month
    $currentDay = 1;
    $rowOpen = false; // To keep track if <tr> tag is open or not

    // If the first day of the month is not Sunday, create blank cells before the first day
    if ($dayOfWeek > 0) {
        $calendar .= "<td colspan='$dayOfWeek'></td>";
    }

    while ($currentDay <= $numberDays) {
        // Start a new row on Sundays
        if ($dayOfWeek == 0) {
            $calendar .= "</tr><tr>";
            $rowOpen = true;
        }

        $currentDate = sprintf('%04d-%02d-%02d', $year, $month, $currentDay);
        $calendar .= "<td class='day' rel='$currentDate'>$currentDay";

        // Add tasks for the current day
        if (isset($task_dates[$currentDate])) {
            foreach ($task_dates[$currentDate] as $task) {
                $taskClass = $task['completed'] ? 'completed' : 'not-completed';
                $calendar .= "<div class='task $taskClass'><a href='show?id={$task['id']}'>{$task['title']}</a></div>";
            }
        }

        $calendar .= "</td>";

        // Move to the next day
        $currentDay++;
        $dayOfWeek = ($dayOfWeek + 1) % 7; // Increment and wrap around to 0 after 6
    }

    // Close any open row
    if ($rowOpen) {
        $remainingDays = 7 - $dayOfWeek; // Calculate remaining days to fill the last row
        $calendar .= "<td colspan='$remainingDays'></td>";
    }

    $calendar .= "</tr>";
    $calendar .= "</tbody></table>";

    return $calendar;
}

// Get the current month and year from URL parameters, if present
if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = intval($_GET['month']);
    $year = intval($_GET['year']);
} else {
    $dateComponents = getdate();
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
}

// Calculate previous and next month
$prevMonth = $month - 1;
$nextMonth = $month + 1;
$prevYear = $year;
$nextYear = $year;

if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear--;
}

if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear++;
}

$prevMonthString = sprintf('%02d', $prevMonth);
$nextMonthString = sprintf('%02d', $nextMonth);

// Generate the calendar HTML with tasks
$calendarHtml = build_calendar($month, $year, $tasks);

// Include the view file
require "../app/views/tasks/calander.view.php";
?>

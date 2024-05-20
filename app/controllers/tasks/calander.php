<?php
require "../app/core/Database.php";
$config = require "../config.php";

// Create Database instance
$db = new Database($config);

// Fetch tasks from the database
$sql = "SELECT title, description, due, completed FROM tasks";
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
    $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    // First day of the month
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    // Number of days in the month
    $numberDays = date('t', $firstDayOfMonth);

    // Information about the first day of the month
    $dateComponents = getdate($firstDayOfMonth);

    // Name of the month
    $monthName = $dateComponents['month'];

    // Index value 0-6 of the first day of the month
    $dayOfWeek = $dateComponents['wday'];

    // Current date
    $dateToday = date('Y-m-d');

    // HTML table to display calendar
    $calendar = "<table class='calendar'>";
    $calendar .= "<caption>$monthName $year</caption>";
    $calendar .= "<tr>";

    // Create the calendar headers
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    // Create the rest of the calendar
    $currentDay = 1;
    $calendar .= "</tr><tr>";

    // If the first day of the month is not Sunday, create blank cells before the first day
    if ($dayOfWeek > 0) {
        $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
    }

    // Loop through all the days of the month
    while ($currentDay <= $numberDays) {
        // If it's Sunday, start a new row
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        // Format the current day with leading zeros
        $currentDate = sprintf('%04d-%02d-%02d', $year, $month, $currentDay);

        // Add the day to the calendar
        $calendar .= "<td class='day' rel='$currentDate'>$currentDay";

        // Add tasks for the current day
        if (isset($task_dates[$currentDate])) {
            foreach ($task_dates[$currentDate] as $task) {
                $taskClass = $task['completed'] ? 'completed' : 'not-completed';
                $calendar .= "<div class='task $taskClass'>{$task['title']}</div>";
            }
        }

        $calendar .= "</td>";

        // Increment counters
        $currentDay++;
        $dayOfWeek++;
    }

    // Complete the row of the last week in the month if necessary
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

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

$calendarHtml = build_calendar($month, $year, $tasks);

// Include the view file
require "../app/views/tasks/calander.view.php";
?>

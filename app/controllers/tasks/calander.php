<?php
require "../app/core/Database.php";
$config = require "../config.php";


$db = new Database($config);


$sql = "SELECT id, title, description, due, completed FROM tasks";
$query = $db->execute($sql, []);
$tasks = $query->fetchAll();

function build_calendar($month, $year, $tasks) {

    $task_dates = [];
    foreach ($tasks as $task) {
        $date = date('Y-m-d', strtotime($task['due']));
        $task_dates[$date][] = $task;
    }


    $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];


    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);


    $numberDays = date('t', $firstDayOfMonth);


    $dateComponents = getdate($firstDayOfMonth);


    $monthName = $dateComponents['month'];


    $calendar = "<table class='calendar table-auto'>";
    $calendar .= "<caption class='text-lg'>$monthName $year</caption>";
    $calendar .= "<thead><tr>";

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr></thead><tbody><tr>";


    $dayOfWeek = $dateComponents['wday']; // Index value 0-6 of the first day of the month
    $currentDay = 1;
    $rowOpen = false; // To keep track if <tr> tag is open or not


    if ($dayOfWeek > 0) {
        $calendar .= "<td colspan='$dayOfWeek'></td>";
    }

    while ($currentDay <= $numberDays) {

        if ($dayOfWeek == 0) {
            $calendar .= "</tr><tr>";
            $rowOpen = true;
        }

        $currentDate = sprintf('%04d-%02d-%02d', $year, $month, $currentDay);
        $calendar .= "<td class='day' rel='$currentDate'>$currentDay";


        if (isset($task_dates[$currentDate])) {
            foreach ($task_dates[$currentDate] as $task) {
                $taskClass = $task['completed'] ? 'completed' : 'not-completed';
                $calendar .= "<div class='task $taskClass'><a href='show?id={$task['id']}'>{$task['title']}</a></div>";
            }
        }

        $calendar .= "</td>";


        $currentDay++;
        $dayOfWeek = ($dayOfWeek + 1) % 7; // Increment and wrap around to 0 after 6
    }


    if ($rowOpen) {
        $remainingDays = 7 - $dayOfWeek; // Calculate remaining days to fill the last row
        $calendar .= "<td colspan='$remainingDays'></td>";
    }

    $calendar .= "</tr>";
    $calendar .= "</tbody></table>";

    return $calendar;
}


if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = intval($_GET['month']);
    $year = intval($_GET['year']);
} else {
    $dateComponents = getdate();
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
}


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


require "../app/views/tasks/calander.view.php";
?>

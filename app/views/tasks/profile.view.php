<?php
require "../app/views/components/head.php";
require "../app/views/components/navbar.php";
?>

<div class="flex flex-col items-center mt-16"> <!-- Adjusted top margin with mt-16 -->
    <h1 class="text-4xl font-bold mb-8">User Profile</h1>
    <p class="text-center">Username: <?= $_SESSION["username"] ?></p>
</div>

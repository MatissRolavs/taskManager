<?php require "../app/views/components/head.php" ?>
<div>
<h1 class="text-orange-200  bg-black">This is index ble!</h1>
    <p class="mt-10 text-orange-200"><?= $_SESSION["username"] ?></p>
    <form action="/logout" method="POST">
        <button class="logout-button">Logout</button>
    </form>
  <?php require "../app/views/components/footer.php" ?>
</div>



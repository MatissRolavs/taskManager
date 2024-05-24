

<?php require "../app/views/components/head.php" ?>
<body class="flex flex-col min-h-screen overflow-hidden">
    <div class="flex-grow flex items-center justify-center">
        <div class="p-8 rounded shadow-md w-80">
        <h1 class="text-2xl font-bold mb-8 text-center">Register</h1>
            <form method="POST">
                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm">Username:</label>
                    <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded-md focus:outline-none">
                </div>
                <div class="mb-5">
                    <?php if (isset($errors["password"])){?>
                        <p><?= $errors["password"] ?></p>
                    <?php } ?>
                    <label for="password" class="block mb-2 text-sm">Password:</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded-md focus:outline-none">
                </div>
                <input type="submit" value="Register" class="w-full px-3 py-2 rounded-md">
            </form>
            <a href="/login">Login</a>
        </div>
    </div>
</body>
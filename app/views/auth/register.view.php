<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add any other necessary head elements here -->
</head>
<body class="flex flex-col min-h-screen overflow-hidden">
    <div class="flex-grow flex items-center justify-center">
        <div class="p-8 rounded shadow-md w-80">
            <h1 class="text-2xl font-bold mb-8 text-center">Register</h1>
            <form method="POST">
                <div class="mb-5 rounded-md">
                    <label for="username" class="block mb-2 text-sm">Username</label>
                    <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded-md focus:outline-none">
                </div>
                <div class="mb-5 rounded-md">
                    <label for="password" class="block mb-2 text-sm">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded-md focus:outline-none">
                </div>
                <?php if (isset($errors["password"])) { ?>
                    <p><?= $errors["password"] ?></p>
                <?php } ?>
                <input type="submit" value="Register" class="w-full px-3 py-2 rounded-md bg-blue-500 text-white">
            </form>
            <a href="/login" class="text-blue-500 hover:underline">Login</a>
        </div>
    </div>
</body>
</html>

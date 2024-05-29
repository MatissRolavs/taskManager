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
            <h2 class="text-2xl font-bold mb-8 text-center">Login</h2>
            <form action="/login" method="POST">
                <div class="mb-5  rounded-md">
                    <label for="username" class="block mb-2 text-sm ">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-md focus:outline-none" required>
                </div>
                <div class="mb-5  rounded-md">
                    <label for="password" class="block mb-2 text-sm ">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:outline-none" required>
                </div>
                <?php if (isset($errors["login"])) { ?>
                    <p><?= $errors["login"] ?></p>
                <?php } ?>
                <button type="submit" class="w-full px-3 py-2 rounded-md bg-blue-500 text-white">Login</button>
            </form>
            <a href="/register" class="text-blue-500 hover:underline">Register</a>
        </div>
    </div>
</body>
</html>

<?php require "../app/views/components/head.php" ?>
<body class="flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center">
        <div class="p-8 rounded shadow-md w-80">
            <h2 class="text-2xl font-bold mb-8 text-center">Login</h2>
            <form action="/login" method="POST">
                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-md focus:outline-none" required>
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:outline-none" required>
                </div>
                <button type="submit" class="w-full px-3 py-2 rounded-md">Login</button>
            </form>
            <a href="/register">Register</a>
        </div>
    </div>
    <?php require "../app/views/components/footer.php" ?>
</body>

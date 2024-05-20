<?php require "../app/views/components/head.php" ?>
<body class="bg-blue-100 flex items-center justify-center h-screen overflow-hidden relative">
    <div class="absolute top-0 left-0 w-full h-full bg-blue-200 mix-blend-multiply" style="clip-path: polygon(0 0, 100% 0, 50% 100%, 0 100%);"></div>
    <div class="absolute top-0 right-0 w-full h-full bg-blue-300 mix-blend-multiply" style="clip-path: polygon(50% 0, 100% 0, 100% 100%, 0 100%);"></div>
    <div class="bg-white p-8 rounded shadow-md w-80 z-10">
        <h2 class="text-2xl font-bold mb-8 text-blue-500 text-center">Login</h2>
        <form action="/login" method="POST">
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm text-gray-600">Username</label>
                <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="w-full px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Login</button>
        </form>
        <a href="/register">Register</a>
    </div>
</body>
<?php require "../app/views/components/footer.php" ?>

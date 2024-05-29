<div class="flex flex-col mb-20">
  <nav class="bg-gray-800 py-4 w-full fixed top-0 z-50">
    <div class="px-4 flex justify-between items-center h-full">
      <div class="flex justify-between flex-grow">
        <a href="/" class="text-white hover:text-gray-300 flex-grow text-center">Home</a>
        <a href="/create" class="text-white hover:text-gray-300 flex-grow text-center">Create Task</a>
        <a href="/calander" class="text-white hover:text-gray-300 flex-grow text-center">Calendar</a>
      </div>
      <div class="relative">
        <p class="text-white cursor-pointer" onclick="toggleDropdown()">👤 <?= $_SESSION["username"] ?></p>
        <div id="dropdownMenu" class="hidden absolute bg-white border border-gray-300 mt-2 py-2 w-24 right-0 z-10">
          <form action="/logout" method="POST">
            <button class="text-gray-800 hover:text-gray-600 block w-full text-left px-4 py-2" type="submit">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </nav>
</div>

<script src="scriptNav.js"></script>

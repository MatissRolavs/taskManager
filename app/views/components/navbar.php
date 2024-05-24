<div class="flex flex-col mb-20">
  <nav class="bg-gray-800 py-4 w-full fixed top-0 z-50">
    <div class="px-4 flex justify-between items-center h-full">
      <div class="flex justify-between flex-grow">
        <a href="/" class="text-white hover:text-gray-300 flex-grow text-center">Home</a>
        <a href="/create" class="text-white hover:text-gray-300 flex-grow text-center">Create Task</a>
        <a href="/calander" class="text-white hover:text-gray-300 flex-grow text-center">Calendar</a>
      </div>
      <form action="/logout" method="POST" class="ml-4">
        <button class="text-white hover:text-gray-300">Logout</button>
      </form>
    </div>
  </nav>
</div>

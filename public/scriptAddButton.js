document.addEventListener("DOMContentLoaded", function () {
  const addUserButton = document.getElementById("addUserButton");
  const userContainer = document.getElementById("userContainer"); // Add an ID to the container div

  addUserButton.addEventListener("click", function () {
    const newUserSelect = document.createElement("select");
    newUserSelect.name = "assignedUser"; // Set the name attribute
    newUserSelect.className =
      "border border-gray-300 rounded-md px-3 py-2 w-full";

    // Populate options dynamically
    usersData.forEach(function (user) {
      const option = document.createElement("option");
      option.value = user.id;
      option.textContent = user.username;
      newUserSelect.appendChild(option);
    });

    // Append the new select input to the container
    userContainer.appendChild(newUserSelect);
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const addUserButton = document.getElementById("addUserButton");
  const removeUserButton = document.getElementById("removeUserButton"); // Add this line
  const userContainer = document.getElementById("userContainer");

  addUserButton.addEventListener("click", function () {
    // ... (existing code to add a new dropdown input)
  });

  removeUserButton.addEventListener("click", function () {
    const selectInputs = userContainer.querySelectorAll(
      "select[name='assignedUser']"
    );
    if (selectInputs.length > 0) {
      // Remove the last select input
      userContainer.removeChild(selectInputs[selectInputs.length - 1]);
    }
  });
});

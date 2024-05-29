// Function to set the minimum value of the due date input field to the current date and time
function setMinDate() {
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    const hours = String(currentDate.getHours()).padStart(2, '0');
    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
    const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    document.getElementById('due').min = minDateTime;
}

// Call the function to set the minimum date when the page loads
setMinDate();

// Add event listener to due date input field to set the minimum date dynamically
document.getElementById('due').addEventListener('focus', setMinDate);

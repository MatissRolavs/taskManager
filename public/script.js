document.addEventListener('DOMContentLoaded', function () {
    const toggleCompletionButtons = document.querySelectorAll('.toggle-completion');
    
    toggleCompletionButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            const taskId = this.getAttribute('data-task-id');
            const completed = this.getAttribute('data-completed') === '1';
            toggleCompletion(taskId, completed);
        });
    });
});

function toggleCompletion(taskId, completed) {
    let newStatus = completed ? 0 : 1;
    fetch('/updateTask', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: taskId, completed: newStatus }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Task updated successfully');
            // Toggle the button text and background color
            const button = document.querySelector(`.toggle-completion[data-task-id="${taskId}"]`);
            const taskItem = document.querySelector(`.task-item[data-task-id="${taskId}"]`);
            button.textContent = newStatus ? 'Completed' : 'Not Completed';
            button.setAttribute('data-completed', newStatus ? '1' : '0');
            taskItem.style.backgroundColor = newStatus ? 'green' : 'red';
        } else {
            console.error('Failed to update task');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

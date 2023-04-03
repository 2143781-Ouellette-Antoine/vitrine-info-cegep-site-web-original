const notification = document.getElementById('notification');
const dismissButton = document.getElementById('dismiss-button');

dismissButton.addEventListener('click', () => {
    notification.remove();
});
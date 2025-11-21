document.addEventListener('DOMContentLoaded', function () {
    const alertBox = document.getElementById('alert-message');
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.opacity = '0';
            setTimeout(() => alertBox.remove(), 500); // removes after fade
        }, 3500); // 3.5 seconds
    }
});
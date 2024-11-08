document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('notification-popup');
    const notificationNav = document.getElementById('notification-nav');
    const closePopupButton = document.getElementById('close-popup');

    function showPopup() {
        popup.classList.remove('hidden');
    }


    function hidePopup() {
        popup.classList.add('hidden');
    }

    function togglePopup() {
        if (popup.classList.contains('hidden')) {
            showPopup();
        } else {
            hidePopup();
        }
    }


    notificationNav.addEventListener('click', togglePopup);


    //closePopupButton.addEventListener('click', hidePopup);
});
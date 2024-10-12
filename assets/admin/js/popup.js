document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('notification-popup');
    const notificationNav = document.getElementById('notification-nav');
    const closePopupButton = document.getElementById('close-popup');

    // Funktion zum Anzeigen des Popups
    function showPopup() {
        popup.classList.remove('hidden');
    }

    // Funktion zum Verbergen des Popups
    function hidePopup() {
        popup.classList.add('hidden');
    }

    // Funktion zum Umschalten des Popups
    function togglePopup() {
        if (popup.classList.contains('hidden')) {
            showPopup();
        } else {
            hidePopup();
        }
    }

    // Event-Listener für das notification-nav-Element
    notificationNav.addEventListener('click', togglePopup);

    // Event-Listener für den Schließen-Button
    closePopupButton.addEventListener('click', hidePopup);
});
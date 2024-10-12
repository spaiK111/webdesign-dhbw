<?php
$notifications = [
    [
        'type' => 'danger',
        'message' => 'Benachrichtigung 1',
        'description' => 'Es besteht aktuell keine Verbindung zur Datenbank!'
    ],
    [
        'type' => 'warning',
        'message' => 'Benachrichtigung 2',
        'description' => 'Die Webseite ist noch nicht fertig!'
    ],
    [
        'type' => 'success',
        'message' => 'Benachrichtigung 3',
        'description' => 'Die Datenbankverbindung wurde erfolgreich hergestellt!'
    ]
];

function getNotificationIcon($type) {
    switch ($type) {
        case 'danger':
            return '😱'; // Smiley für Gefahr
        case 'warning':
            return '⚠️'; // Smiley für Warnung
        case 'success':
            return '😊'; // Smiley für Erfolg
        default:
            return '';
    }
}
?>
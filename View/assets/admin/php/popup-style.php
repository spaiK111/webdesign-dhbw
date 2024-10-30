<?php
$notifications = [
    [
        'type' => 'danger',
        'message' => 'Gefahr',
        'description' => 'Es besteht aktuell keine Verbindung zur Datenbank!'
    ],
    [
        'type' => 'warning',
        'message' => 'Warnung',
        'description' => 'Die Webseite ist noch nicht fertig!'
    ],
    [
        'type' => 'success',
        'message' => 'Erfolg',
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
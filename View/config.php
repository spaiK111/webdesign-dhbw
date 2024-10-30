<?php
// Datenbankkonfiguration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_data";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Fehlerbehandlung bei der Verbindung
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen.");
}
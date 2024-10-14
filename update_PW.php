<?php
// Datenbankverbindung herstellen
$conn = new mysqli("localhost", "root", "", "admin_data");

// Passwort hashen
$passwordToHash = "test";
$hashedPassword = password_hash($passwordToHash, PASSWORD_DEFAULT);

// Update des Passworts in der Datenbank
$sql = "UPDATE login SET password = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $hashedPassword, $username); // Ersetze $username durch den entsprechenden Benutzernamen

if ($stmt->execute()) {
    echo "Passwort erfolgreich gehasht und aktualisiert.";
} else {
    echo "Fehler beim Aktualisieren des Passworts: " . $stmt->error;
}

$stmt->close();
$conn->close();
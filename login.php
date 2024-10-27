<?php
// Konfigurationsdatei (config.php) einbinden. 
// Hier sollten die Datenbankverbindungsdaten gespeichert sein.
require_once 'config.php';

// Funktion zum Einloggen eines Benutzers
function loginUser($username, $password) {
    global $conn; // Zugriff auf die Datenbankverbindung aus config.php

    // SQL-Abfrage zum Abrufen des Passwort-Hashes und des Salts für den gegebenen Benutzernamen.
    // Prepared Statements werden verwendet, um SQL-Injection zu verhindern.
    $sql = "SELECT PASSWORT, salt FROM login WHERE username=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // "s" gibt an, dass der Parameter ein String ist
    $stmt->execute();
    $result = $stmt->get_result();

    // Überprüfen, ob ein Benutzer mit dem gegebenen Benutzernamen gefunden wurde.
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc(); // Daten aus dem Ergebnis abrufen
        $storedHash = $row['PASSWORT']; // Gespeicherter Passwort-Hash
        $salt = $row['salt']; // Zugehöriger Salt

        // Passwort überprüfen mit password_verify(). 
        // Diese Funktion vergleicht das eingegebene Passwort mit dem gespeicherten Hash unter Berücksichtigung des Salts.
        if (password_verify($password . $salt, $storedHash)) { 
            // Erfolgreicher Login
            session_start(); // Session starten
            $_SESSION['loggedin'] = true; // Login-Status in der Session speichern
            $_SESSION['username'] = $username; // Benutzername in der Session speichern
            return true; // Login erfolgreich
        }
    }
    return false; // Login fehlgeschlagen
}

// HTML-Formular für den Login
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <?php
        // Fehlermeldung anzeigen, falls vorhanden
        if (isset($_GET['error'])) {
            echo "<p style='color: red;'>".$_GET['error']."</p>"; 
        }
        ?>
        <label for="username">Benutzername:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Formular abrufen
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Benutzer einloggen und Ergebnis ausgeben
    if (loginUser($username, $password)) {
        header('Location: success.php'); // Weiterleitung zur Erfolgsseite
        exit(); 
    } else {
        header("Location: login.php?error=Falsches+Passwort+oder+Benutzername"); // Weiterleitung zurück zum Login mit Fehlermeldung
        exit();
    }
}
?>
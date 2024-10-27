<?php
// Konfigurationsdatei (config.php)
require_once 'config.php';

// Funktion zum Registrieren eines neuen Benutzers
function registerUser($username, $email, $password) {
    global $conn;

    // Validierung der Eingaben
    if (empty($username) || empty($email) || empty($password)) {
        return "Bitte alle Felder ausfüllen.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Ungültige E-Mail-Adresse.";
    }

    // Überprüfen, ob der Benutzername oder die E-Mail bereits existiert
    $sql = "SELECT * FROM login WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "Benutzername oder E-Mail ist bereits vergeben.";
    }

    // Passwort hashen mit einem starken Algorithmus und hohem Kostenfaktor
    $salt = bin2hex(random_bytes(16));
    $hashedPassword = password_hash($password . $salt, PASSWORD_DEFAULT, ['cost' => 13]);

    // SQL-Abfrage zum Einfügen eines neuen Benutzers
    $sql = "INSERT INTO login (username, email, PASSWORT, salt, ERSTELLDATUM, AENDERUNGSDATUM) VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $salt);

    if ($stmt->execute()) {
        return "Registrierung erfolgreich!";
    } else {
        return "Ein Fehler ist aufgetreten.";
    }
}

// HTML-Formular
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrierung</title>
</head>
<body>
    <h1>Registriere dich</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php
        if (isset($_GET['error'])) {
            echo "<p style='color: red;'>".$_GET['error']."</p>";
        }
        ?>
        <label for="username">Benutzername:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Registrieren">
    </form>
</body>
</html>

<?php
// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Formular abrufen
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Benutzer registrieren und Ergebnis ausgeben
    $result = registerUser($username, $email, $password);
    if ($result !== "Registrierung erfolgreich!") {
        header("Location: registrieren.php?error=".$result);
        exit();
    }
}
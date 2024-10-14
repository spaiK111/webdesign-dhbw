<?php
// Konfigurationsdatei (config.php)
require_once 'config.php';

// Funktion zum Einloggen eines Benutzers
function loginUser($username, $password) {
    global $conn;

    // SQL-Abfrage zum Überprüfen der Anmeldedaten
    $sql = "SELECT PASSWORT, salt FROM login WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedHash = $row['PASSWORT'];
        $salt = $row['salt'];

        // Passwort überprüfen
        if (password_verify($password . $salt, $storedHash)) {
            // Erfolgreicher Login
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            return true;
        }
    }
    return false;
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
        header('Location: success.php');
        exit();
    } else {
        header("Location: login.php?error=Falsches+Passwort+oder+Benutzername");
        exit();
    }
}
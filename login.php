<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Einloggen</title>
  <link rel="stylesheet" href="/assets/login/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  
  <?php
  // Datenbankverbindungsdaten (ersetzen Sie durch Ihre eigenen)
  $servername = "localhost";
  $username = "yourusername";
  $password = "yourpassword";
  $dbname = "mydatabase";

  // Verbindung zur Datenbank herstellen
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Überprüfen, ob das Formular abgesendet wurde
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Empfangen der Daten aus dem Formular
      $username = $_POST['username'];
      $password = $_POST['password'];

      // SQL-Abfrage vorbereiten und ausführen
      $sql = "SELECT * FROM users WHERE username = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $username);
      $stmt->execute();

      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          // Benutzer gefunden, Passwort überprüfen
          $row = $result->fetch_assoc();
          if (password_verify($password, $row['password'])) {
              // Login erfolgreich (Hier können Sie weitere Aktionen durchführen, z.B. Session starten)
              echo "Login erfolgreich!";
          } else {
              echo "Falsches Passwort!";
          }
      } else {
          echo "Benutzername nicht gefunden!";
      }

      $stmt->close();
  }
  ?>

  <div class="wrapper">
    <form method="post">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Password vergessen</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Haben Sie noch keinen Account? <a href="#">Registrieren</a></p>
      </div>
    </form>
  </div>
</body>
</html>
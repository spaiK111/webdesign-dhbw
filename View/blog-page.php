<?php
// Empfange die Parameter login und password
$login = isset($_GET['login']) ? $_GET['login'] : (isset($_COOKIE['login']) ? $_COOKIE['login'] : '');
$hashedPassword = isset($_GET['hashedPassword']) ? $_GET['hashedPassword'] : (isset($_COOKIE['password']) ? $_COOKIE['password'] : '');
$_id = isset($_GET['_id']) ? $_GET['_id'] : '';
if (!$login || !$hashedPassword) {
    die('Login und Passwort sind erforderlich.');
}
if (!$_id) {
    die('ID ist erforderlich.');
}
// Funktion zum Senden einer HTTPS-Anfrage
$apiUrl = "http://localhost:5000/api/posts/getBlogById/?_id=$_id";

    // cURL initialisieren
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // API-Anfrage ausführen und Antwort speichern
    $response = curl_exec($ch);
    curl_close($ch);

    // Antwort in ein Array umwandeln
    $data = json_decode($response, true);
    if ($data) {
      echo "login successful";
	}
	else {
		echo "Bad Request";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/blog/blog-page.css">
</head>
<body>
    <header>
        <div class="navigation-bar">
            <?php include "navbar.php"; ?>
        </div>
    </header>
    <main>
        <div class="blog-page-container">
            <!--Image Part-->
            <div class= "blog-page-image">
            <?php if ($data): ?>
                <img src="<?php echo htmlspecialchars($data['image']); ?>">
            </div>
            <!--Text Part-->
            <div class ="blog-page-text-container">

                <div class="blog-page-heading">
                    <h2><?php echo htmlspecialchars($data['heading']); ?></h2>
                </div>

                <div class="blog-page-short-description">
                    <span><?php echo htmlspecialchars($data['short_dsc']); ?></span>
                </div>

                <div class="blog-page-long-description">
                    <p><?php echo htmlspecialchars($data['long_dsc']); ?></div>
            <?php endif; ?>
            </div>

        </div>
        
        


    </main>
    
    <footer>
        <div class="footer">
            <?php include "footer.php"; ?>
        </div>
    </footer>
</body>
</html>
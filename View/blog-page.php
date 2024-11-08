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
    $likes = count($data['likes']);
    $isLiked = in_array($login, $data['likes']);
    $heading = $data['heading'];
    $short_dsc = $data['short_dsc'];
    $long_dsc = $data['long_dsc'];
    $image = $data['image'];

    if (!$data) {
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
    <link rel="stylesheet" href="assets/like-button/like-button.css">
    <script src="assets/blog/js/main.js"></script>
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
                <?php if (isset($data)): ?>
                <img src="<?php echo $image ?>">
            </div>
            <!--Text Part-->
            <div class ="blog-page-text-container">

                <div class="blog-page-heading">
                    <h2><?php echo $heading ?></h2>
                </div>

                <div class="blog-page-short-description">
                    <span><?php echo $short_dsc ?></span>
                    <div class="blog-like-button">
                        <?php include "like-button.php"; ?>
                    </div>
                    
                </div>

                <div class="blog-page-long-description">
                    <p><?php echo $long_dsc ?></div>
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
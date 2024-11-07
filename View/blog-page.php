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

    if ($data) {
        echo "blog found";
        echo count($data['likes']);
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
    <link rel="stylesheet" href="assets/like-button/like-button.css">
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
                <?php  if ($data): ?>
                <img src="<?php echo htmlspecialchars($data['image']); ?>"
                
            </div>
            <!--Text Part-->
            <div class ="blog-page-text-container">

                <div class="blog-page-heading">
                    <h2><?php echo htmlspecialchars($data['heading']); ?></h2>
                    <h2>lol</h2>
                    
                </div>

                <div class="blog-page-short-description">
                    <span><?php echo htmlspecialchars($data['short_dsc']); ?></span>
                    <div class="blog-like-button">
                        <div class="like-button">
                            <input class="on" id="heart" type="checkbox" <?php echo $isLiked ? 'checked' : ''; ?>>
                            <label class="like" for="heart">
                            <svg
                            class="like-icon"
                            fill-rule="nonzero"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"
                            ></path>
                            </svg>
                            <span class="like-text">Likes</span>
                            </label>
                                <span><?php echo $likes ?></span>
                            
                        </div>
                    </div>
                    
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
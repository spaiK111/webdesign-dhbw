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
                        <?php include "like-button.php"; ?>
                    </div>
                    
                </div>

                <div class="blog-page-long-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elit magna, tincidunt sed porta eu, facilisis ac libero. Proin eget odio blandit neque consequat feugiat et mattis ipsum. Donec auctor tincidunt ligula, at feugiat urna consectetur vel. Donec lacinia urna eu enim rhoncus viverra. Nam id accumsan justo. Praesent orci felis, sodales at sodales in, ornare vitae metus. Fusce diam neque, facilisis a semper efficitur, gravida quis arcu. Nunc nec commodo nulla. Duis pretium mauris et eros dictum, et pretium nisi lacinia. In lobortis in arcu placerat molestie. Fusce ac blandit urna. Duis quis magna velit. Donec vel condimentum leo.

Aenean eu condimentum risus. Nunc nisl augue, posuere vitae placerat ornare, tristique et leo. Nam blandit semper justo in ultrices. Suspendisse et ipsum sodales, vestibulum urna nec, vehicula nisi. Integer efficitur, risus egestas eleifend condimentum, lacus nisl cursus felis, in finibus dui massa in arcu. Cras accumsan leo in metus varius dictum. Nunc a elementum libero.

Aliquam quis augue lacinia, finibus eros vel, euismod arcu. Cras velit eros, facilisis a ornare non, accumsan nec eros. Duis vitae eleifend nisi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla finibus nisl lobortis sollicitudin ultricies. Vestibulum condimentum, est vitae sagittis luctus, velit arcu consectetur diam, egestas consectetur ante libero vitae magna. Fusce lacinia libero vitae turpis dictum cursus in eget urna. Morbi sodales lorem id accumsan ullamcorper. Etiam quis vestibulum ante, eu placerat nisi. Integer commodo ornare sem, venenatis iaculis eros volutpat ut. Vestibulum nec interdum nibh, id semper mi.

Nam lacinia arcu sed diam rhoncus ultricies. Donec nulla quam, porttitor nec luctus placerat, fringilla vitae metus. Suspendisse pellentesque, felis sed tempus semper, risus nibh volutpat risus, et dictum ante tellus id enim. Donec non mattis orci, id suscipit leo. Phasellus ac tincidunt justo. Donec gravida dui eget rutrum congue. Nam justo massa, finibus quis dui in, facilisis rutrum dui. Praesent posuere dignissim nunc, vitae tincidunt libero tristique eget. Etiam facilisis lorem eu velit aliquam consequat. Morbi consectetur euismod enim, ac luctus ligula iaculis in. Sed dui turpis, fermentum a massa et, rhoncus imperdiet eros. Nullam accumsan porta nunc ac tincidunt. Phasellus venenatis turpis tortor, et semper erat porta vitae. Maecenas tristique vitae leo sed sollicitudin.

Ut facilisis laoreet placerat. Nam ullamcorper arcu convallis nisi sollicitudin eleifend a id metus. Nulla suscipit risus vitae ante venenatis, in auctor nisi condimentum. Duis rutrum sed mauris ac blandit. In bibendum blandit nisl, ut fringilla quam vestibulum eget. Donec sed turpis vestibulum, finibus tortor vel, pulvinar urna. Ut odio ligula, dapibus ut lectus id, gravida placerat nisl. Praesent efficitur nulla non tellus semper finibus. Duis in suscipit lacus.</p>
                </div>
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
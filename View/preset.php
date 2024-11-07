<?php
// Überprüfen, ob die ID als URL-Parameter übergeben wurde
$uid = isset($_GET['uid']) ? $_GET['uid'] : null;
if ($uid) {
    // API-URL mit der übergebenen ID
    $apiUrl = "http://localhost:5000/api/posts/getCarById/?uid=$uid";

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
        // Daten erfolgreich abgerufen
        $make = htmlspecialchars($data['make']);
        $model = htmlspecialchars($data['model']);
        $year = htmlspecialchars($data[ 'year']);
        $kw = htmlspecialchars($data['kw']);
        $category = htmlspecialchars($data['category']);
        $engine = htmlspecialchars($data['engine']);
        $fuelType = htmlspecialchars($data['fuelType']);
        $image_1 = htmlspecialchars($data['image_1']);
        $image_2 = htmlspecialchars($data['image_2']);
        $image_3 = htmlspecialchars($data['image_3']);
        $image_4 = htmlspecialchars($data['image_4']);
    } else {
        echo "Fehler beim Abrufen der Daten.";
        exit;
    }
} else {
    echo "Keine ID übergeben.";
    exit;
}
?>
<html>
    <link rel="stylesheet" href="test.css">
    <!DOCTYPE html>
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AutoInsider®</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font awesome icon -->
        <link rel="stylesheet" href="assets/preset/css/item.css">
        <link rel="stylesheet" href="assets/preset/css/style.css">
        <link rel="stylesheet" href="assets/preset/css/test.css">
        <link rel="stylesheet" href="assets/preset/css/slider.css">

      </head>
      <body>
        <!-- header -->
        <header>
          <nav class = "navbar">
            <div class = "container">
              <a href = "index.php" class = "navbar-brand">AutoInsider®</a>
              <div class = "navbar-nav">
                <a href = "/index.php">home</a>
                <a href = "/blog.php">blog</a>
                <a href = "/login.php">login</a>
                <a href = "/kontakt.php">kontakt</a>     <!-- Entweder separate Kontakt-Seite oder Diret-Link zu Email? -->
                <a href = "/admin.php">admin</a>
              </div>
            </div>
          </nav>
        </header>
    <!-- end of header -->
<section class="white section-first">
    <div class="container">
        <div class="card-auto_wrapper used-auto_new">

            <div class="card-auto_used">
                <div class="card-auto_used-top flex-block" style="margin-top: 0">
                    <div class="card-auto_used-top_info flex-block">
                        <h1><?php echo $make; ?></h1>
                        <div class="used-info_main flex-block">
                            <ul class="list flex-block">
                                <li><?php echo $year?></li>
                                <li><span><?php echo $engine; ?></span> km</li>
                                <li><?php echo $model; ?></li>
                            </ul>
                            <a class="link card-auto_phone--link-new">+49 (123) 345-23-22</a>
                            <a class="btn btn_blue btn_mini modal-open">Kontakt aufnehmen</a>
                            <a class="btn btn_contur-blue btn-chat icon_wrapper-svg" >
                                <img class="icon icon-hover" src="assets/preset/images/like.svg" alt="">
                                <img class="icon icon-hover" src="assets/preset/images/like.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="card-auto_used-top_price">

                        <div class="now-price this-number">
                            <div class="now-price-text semibold">
                                <span>Preis auf Anfrage</span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Slider -->

                    <h2 class="w3-center">Manual Slideshow</h2>

                    <div class="w3-content w3-display-container">
                        <img class="mySlides" src="<?php echo $image_1?>" style="width:100%">
                        <img class="mySlides" src="<?php echo $image_2?>" style="width:100%">
                        <img class="mySlides" src="<?php echo $image_3?>" style="width:100%">
                        <img class="mySlides" src="<?php echo $image_4?>" style="width:100%">

                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                    <script>
                            var slideIndex = 1;
                            showDivs(slideIndex);

                            function plusDivs(n) {
                            showDivs(slideIndex += n);
                            }

                            function showDivs(n) {
                            var i;
                            var x = document.getElementsByClassName("mySlides");
                            if (n > x.length) {slideIndex = 1}
                            if (n < 1) {slideIndex = x.length}
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";  
                            }
                            x[slideIndex-1].style.display = "block";  
                            }
                    </script>
                
                <!-- Slider end -->

                <!-- small info -->
                <div class="card-auto_used-main flex-block">
                    <div class="card-auto_used-main_left">
                        <ul class="card-auto_used-statistics list flex-block">
                            <li>№ 1786113</li>
                            <li>22 Oktober</li>
                            <li>Reviews: 23</li>
                        </ul>

                        <div class="card-auto_used-advantages flex-block">

                            <div class="card-auto_used-advantage flex-block">
                                <img src="assets/preset/images/top-file.svg" alt="">
                                <div class="text flex-block">
                                    <div class="text_main text-uppercase flex-block">
                                        <span>EXTRA</span>
                                        <span>Garantie</span>
                                    </div>
                                    <div class="text_sub">18 Monate gratis</div>
                                </div>
                            </div>
                            <div class="card-auto_used-advantage flex-block">
                                <img src="assets/preset/images/convertible-car.svg" alt="">
                                <div class="text flex-block">
                                    <div class="text_main text-uppercase flex-block">
                                        <span>EXTRA</span>
                                        <span>Trade-in</span>
                                    </div>
                                    <div class="text_sub">Gebrauchtwagen</div>
                                </div>
                            </div>
                            <div class="card-auto_used-advantage flex-block">
                                <img src="assets/preset/images/warranty.svg" alt="">
                                <div class="text flex-block">
                                    <div class="text_main text-uppercase flex-block">
                                        <span>EXTRA</span>
                                        <span>Lieferung</span>
                                    </div>
                                    <div class="text_sub">Free Delivery</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-auto_used-characteristics">
                            <h2 class="heading_black">Charakteristiken</h2>
                            <div class="card-auto_used-characteristics_items flex-block">

                                <div class="card-auto_used-characteristics_item" data-before="VIN">
                                    <div>***********701531</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="Farbe">
                                    <div>gray metallic</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="Erstzulassung">
                                    <div>2015</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="KM-Stand">
                                    <div class=" this-number"><span>113 274</span> km</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="Fahrzeugtyp">
                                    <div>Crossover 5d</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="Engine">
                                    <div>1.6 l, 110 ps., Benzin Injektor</div>
                                </div>
                                <div class="card-auto_used-characteristics_item" data-before="Transmission">
                                    <div>Automatisch</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="Antrieb">
                                    <div>Vorderantrieb</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="Zustand">
                                    <div>Keine Reparatur notwendig</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="Fahrzeughalter">
                                    <div>3</div>
                                </div>

                                <div class="card-auto_used-characteristics_item" data-before="MwST">
                                    <div>19%</div>
                                </div>

                            </div>
                        </div>
                        <div class="card-auto_used-descript flex-block">
                            <h2 class="heading_black">Beschreibung</h2>
                            <div class="card-auto_used-descript-list">
                                <div class="semibold">Vorteile</div>
                                <ul class="list">
                                    <li class="list_item">
                                        Perfekter äußerer Zustand </li>

                                    <li class="list_item">
                                        Sauberes und gut gewartetes Auto </li>

                                    <li class="list_item">
                                        Restyling </li>

                                    <li class="list_item">
                                        Geräumiger Kofferraum </li>

                                    <li class="list_item">
                                        Ideal als Erstwagen </li>

                                    <li class="list_item">
                                        Verzinkter Körper </li>

                                    <li class="list_item">
                                        Federung für schlechte Straßen </li>

                                    <li class="list_item">
                                        Praktische Karosseriefarbe </li>

                                    <li class="list_item">
                                        Zuverlässiger und bewährter Motor </li>

                                    <li class="list_item">
                                        Einfach und kostengünstig zu warten </li>

                                </ul>
                            </div>

                            <div class="card-auto_used-descript-list">
                                <div class="semibold">Weitere Vorteile</div>
                                <ul class="list">
                                    <li class="list_item">
                                        Werkseitige Karosserielackierung </li>
                                    <li class="list_item">
                                        Ursprünglicher Kilometerstand </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-auto_used-main_right">
                        <div class="card-auto_used-interact flex-block">
                            <a class="interact_link-download flex-block semibold">
                                <img src="assets/preset/images/download-folder.svg" alt="">
                                <span>Auto Daten download</span>
                            </a>
                        </div>
                        <div class="card-auto_used-price">
                            <div class="used-price_top">
                                <div class="now-price this-number flex-block">
                                    <div class="now-price-text semibold">
                                        <span> Preis auf Anfrage</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-auto_used-check">
                            <h2 class="heading_black">VIN Nummer Prüfung</h2>
                            <div class="description_wrapper">
                                <div class="description_item">
                                    Charackteristiken stimmen mit VIN überein
                                </div>
                                <div class="description_item">
                                    Fahrzeughalter & Fahrzeugverbote
                                </div>
                                <div>weitere 16 Prüfungen</div>
                            </div>

                            <div class="btn_wrapper">
                                <a class="btn btn_contur-blue btn_uppercase modal-open" >Anfrage senden</a>
                            </div>

                        </div>

                        <div class="card-auto_sevice-banner">
                            <a>
                                <img src="assets/preset/images/about-us-p1.jpg" alt="">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer -->
<footer>
    <div class = "social-links">
      <a href = "#"><i class = "fab fa-facebook-f"></i></a>
      <a href = "#"><i class = "fab fa-twitter"></i></a>
      <a href = "#"><i class = "fab fa-instagram"></i></a>
      <a href = "#"><i class = "fab fa-pinterest"></i></a>
    </div>
    <span>AutoInsider®</span>
  </footer>
  <!-- end of footer -->
  
  <script src="assets/preset/js/search-bar.js"></script>
  <script src="assets/preset/js/slider.js"></script>

</body>
</html>
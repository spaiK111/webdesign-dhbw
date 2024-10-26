<?php
// Überprüfen, ob die ID als URL-Parameter übergeben wurde
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // API-URL mit der übergebenen ID
    $apiUrl = "http://localhost:5000/api/posts/$id";

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
        $year = htmlspecialchars($data['year']);
        $color = htmlspecialchars($data['color']);
        $engine = htmlspecialchars($data['engine']);
        $price = htmlspecialchars($data['price']);
        $imageFront = htmlspecialchars($data['image_front']);
        $imageBack = htmlspecialchars($data['image_back']);
        $imageSide = htmlspecialchars($data['image_side']);
        $imageInterior = htmlspecialchars($data['image_interior']);
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
        <link rel="stylesheet" href="test.css">
        <link rel="stylesheet" href="/assets//car-page/css/item.css">
        <link rel="stylesheet" href="/assets//car-page/css/style.css">
        <link rel="stylesheet" href="/assets//car-page/css/test.css">
        <link rel="stylesheet" href="/assets//preset/slider.css">
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
                                <li><?php echo $year; ?></li>
                                <li><span><?php echo $engine; ?></span> km</li>
                                <li><?php echo $model; ?></li>
                            </ul>
                            <a class="link card-auto_phone--link-new">+49 (123) 345-23-22</a>
                            <a class="btn btn_blue btn_mini modal-open">Kontakt aufnehmen</a>
                            <a class="btn btn_contur-blue btn-chat icon_wrapper-svg" >
                                <img class="icon icon-hover" src="/assets/car-page/images/like.svg" alt="">
                                <img class="icon icon-hover" src="/assets/car-page/images/like.svg" alt="">
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


                <div id="page">
<div class="wrapper">
  <div class="bottom">
    <!--   images got deleted :'(   -->
        <img src="<?php echo $imageInterior; ?>" draggable="false"/>
  </div>
  <div class="middle">
        <img src="<?php echo $imageBack; ?>" draggable="false"/> 
  </div>
  <div class="scroller scroller-middle">
    <svg class="scroller__thumb" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><polygon points="0 50 37 68 37 32 0 50" style="fill:#FFCCBC"/><polygon points="100 50 64 32 64 68 100 50" style="fill:#FFCCBC"/></svg>
  </div>
  <div class="top">
    <img src="<?php echo $imageFront; ?>" draggable="false"/>
  </div>
  <div class="scroller scroller-top">
    <svg class="scroller__thumb" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><polygon points="0 50 37 68 37 32 0 50" style="fill:#FFAB91"/><polygon points="100 50 64 32 64 68 100 50" style="fill:#FFAB91"/></svg>
  </div>
</div>
</div>


                
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
                                <img src="/assets/car-page/images/top-file.svg" alt="">
                                <div class="text flex-block">
                                    <div class="text_main text-uppercase flex-block">
                                        <span>EXTRA</span>
                                        <span>Garantie</span>
                                    </div>
                                    <div class="text_sub">18 Monate gratis</div>
                                </div>
                            </div>
                            <div class="card-auto_used-advantage flex-block">
                                <img src="/assets/car-page/images/convertible-car.svg" alt="">
                                <div class="text flex-block">
                                    <div class="text_main text-uppercase flex-block">
                                        <span>EXTRA</span>
                                        <span>Trade-in</span>
                                    </div>
                                    <div class="text_sub">Gebrauchtwagen</div>
                                </div>
                            </div>
                            <div class="card-auto_used-advantage flex-block">
                                <img src="/assets/car-page/images/warranty.svg" alt="">
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
                                <img src="/assets/car-page/images/download-folder.svg" alt="">
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
                                <img src="/assets/car-page/images/about-us-p1.jpg" alt="">
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
  
  <script src="/assets/home/js/search-bar.js"></script>
  <script src="/assets/preset/slider.js"></script>

</body>
</html>
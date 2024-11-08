<?php
// Überprüfen, ob die ID als URL-Parameter übergeben wurde
$uid = isset($_GET['uid']) ? $_GET['uid'] : null;
if ($uid) {
    // API-URL mit der übergebenen ID
    $apiUrl = "http://localhost:5000/api/posts/getCarByUid/?uid=$uid";

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

      </head>
      <body>
        <!-- header -->
        <header>
          <div class="navbar-preset">
            <?php include "navbar.php"; ?>
          </div>
                
            
          
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
                          
                            
                        </div>
                    </div>
                    
                </div>
                <!-- Slider -->

                    

                    <div class="w3-content w3-display-container">
                        <img class="mySlides" src="<?php echo $image_1?>" style="width:100%">
                        <img class="mySlides" src="<?php echo $image_2?>" style="width:100%">
                        <img class="mySlides" src="<?php echo $image_3?>" style="width:100%">
                        <img class="mySlides" src="<?php echo $image_4?>" style="width:100%">

                        <div class="button-container">
                            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                        </div>

                        
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
                <div class="card-auto_used-interact flex-block">
                            <a class="interact_link-download flex-block semibold">
                                <img src="assets/preset/images/download-folder.svg" alt="">
                                <span id="download-pdf">Auto Daten download</span>

                                <script>
                                    document.getElementById('download-pdf').addEventListener('click', () => {
                                    const { jsPDF } = window.jspdf;
                                    const doc = new jsPDF();

                                    // Wähle den Abschnitt aus, der in das PDF aufgenommen werden soll
                                    const section = document.querySelector('.white.section-first');

                                    // Füge den Inhalt des Abschnitts zum PDF hinzu
                                    let y = 10;
                                    doc.setFontSize(16);
                                    doc.setTextColor(0, 0, 255);
                                    doc.text('Auto Daten', 10, y);
                                    y += 10;

                                    doc.setFontSize(12);
                                    doc.setTextColor(0, 0, 0);
                                    const lines = section.innerText.split('\n');
                                    lines.forEach(line => {
                                        doc.text(line.trim(), 10, y);
                                        y += 10;
                                    });

                                    // Speichere das PDF
                                    doc.save('auto_daten.pdf');
                                    })
                                </script>


                            </a>
                </div>

                <!-- small info -->
                <div class="card-auto_used-main flex-block">
                    <div class="card-auto_used-main_left">
                        <ul class="card-auto_used-statistics list flex-block">
                            <li>№ 1786113</li>
                            <li>22 Oktober</li>
                            <li>Reviews: 23</li>
                        </ul>

                        
                            
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
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer -->
<footer>
    <?php include "footer.php"; ?>
  </footer>
  <!-- end of footer -->
  
  <script src="assets/preset/js/search-bar.js"></script>
  <script src="assets/preset/js/slider.js"></script>

</body>
</html>
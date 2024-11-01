<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AutoInsider®</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets//home/css/style.css">
    <link rel="stylesheet" href="assets/home/css/search-box.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets//home/css/item.css">
    <link rel="stylesheet" href="assets//home/css/pagination.css">
  </head>
  <body>
 
    <!-- header -->
    <header>
      <nav class = "navbar">
        <div class = "container">
          <a href = "index.php" class = "navbar-brand">AutoInsider®</a>
          <div class = "navbar-nav">
            <a href = "index.php">home</a>
            <a href = "blog.php">blog</a>
            <a href = "login-old.php">login</a>
            <a href = "kontakt.php">kontakt</a>     <!-- Entweder separate Kontakt-Seite oder Diret-Link zu Email? -->
            <a href = "admin.php">admin</a>
          </div>
        </div>
      </nav>
      <div class = "banner">
        <div class = "container">
          <h1 class = "banner-title">
            <span>real</span> AutoInsider
          </h1>
          <p>Von Experten für Enthusiasten: Alles, was du über Autos wissen musst!</p>
          <form>
            <input type = "text" class = "search-input" placeholder="Durchsuche unsere Blogbeiträge...">
            <button type = "submit" class = "search-button">
              <span></span>
                <svg viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"></path></svg>
              </span>
              <!--<i class = "fas fa-search"></i> Obsolete -->
            </button>
          </form>
        </div>
      </div>
    </header>
    <!-- end of header -->

    <section class="search-filter-box">
      <div class="search-container" id ="search-container-box">

        <!--Search Items-->
        
        <div class="search-container-item">
          <label>Marke</label>
          <div class="search-selection-item">
            
            <select class="search-selection" id="make">
              <option selected value =""> Beliebig </option>
              <optgroup label = "Top-Marken">
              <?php
                $top = true;
                include "assets/home/php/createDynamicOptions.php";
              ?>
              </optgroup>
              <optgroup label = "Alle Marken">
              <?php include "assets/home/php/createDynamicOptions.php"; ?>
              </optgroup>
              
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>



        <div class="search-container-item">
          <label>Modell</label>
          <div class="search-selection-item">
            <select class="search-selection" id ="model" disabled>
              <option selected value =""> Beliebig </option>
              
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>



        <div class="search-container-item">
          <label>Erscheinungsjahr</label>
          <div class="search-selection-item">
            <input class="search-selection" list="jahre" id="jahr" name="jahr" placeholder="z. B. 2025" />
            <datalist id="jahre">
              <option value="1999"></option>
              <option value="2000"></option>
              <option value="2001"></option>
              <!-- Weitere Jahre... -->
              <option value="2024"></option>
            </datalist>

            <!--<select class="search-selection">
              <option selected value =""> Beliebig </option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              
            </select>-->
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>


        <div class="search-container-item">
          <label>Farbe</label>
          <div class="search-selection-item">
            <select class="search-selection">
              <option selected value =""> Beliebig </option>
              
                
              <option value="red">Rot</option>
              <option value="orange">Orange</option>
              <option value="yellow">Gelb</option>
              <option value="green">Grün</option>
              <option value="blue">Blau</option>
              <option value="indigo">Indigo</option>
              <option value="violet">Violett</option>
              <option value="purple">Lila</option>
              <option value="pink">Pink</option>
              <option value="brown">Braun</option>
              <option value="black">Schwarz</option>
              <option value="white">Weiß</option>
              <option value="gray">Grau</option>
              <option value="cyan">Cyan</option>
              <option value="magenta">Magenta</option>
              <option value="lime">Limette</option>
              <option value="maroon">Bordeaux</option>
              <option value="navy">Marineblau</option>
              <option value="teal">Türkis</option>
              <option value="olive">Olive</option>
            
              
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>


        <div class="search-container-item">
          <label>Motor</label>
          <div class="search-selection-item">
            <select class="search-selection">
              <option selected value =""> Beliebig </option>
              <option value="1.0L">1.0L</option>
              <option value="1.2L">1.2L</option>
              <option value="1.4L">1.4L</option>
              <option value="1.5L Turbo">1.5L Turbo</option>
              <option value="1.6L">1.6L</option>
              <option value="1.8L">1.8L</option>
              <option value="2.0L">2.0L</option>
              <option value="2.0L Turbo">2.0L Turbo</option>
              <option value="2.5L">2.5L</option>
              <option value="2.5L Turbo">2.5L Turbo</option>
              <option value="3.0L">3.0L</option>
              <option value="3.0L Turbo">3.0L Turbo</option>
              <option value="3.5L">3.5L</option>
              <option value="4.0L">4.0L</option>
              <option value="4.0L Twin-Turbo">4.0L Twin-Turbo</option>
              <option value="5.0L">5.0L</option>
              <option value="5.0L Supercharged">5.0L Supercharged</option>
              
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>


        <div class="search-container-item">
          <label>Kraftstoffart</label>
          <div class="search-selection-item">
            <select class="search-selection">
              <option selected value =""> Beliebig </option>
              <option value="gasoline">Benzin</option>
              <option value="diesel">Diesel</option>
              <option value="electric">Elektrisch</option>
              <option value="hybrid">Hybrid</option>
              <option value="plug-in-hybrid">Plug-in-Hybrid</option>
              <option value="natural-gas">Erdgas (CNG)</option>
              <option value="propane">Flüssiggas (LPG)</option>
              <option value="biofuel">Biokraftstoff</option>
              <option value="ethanol">Ethanol (E85)</option>
              <option value="hydrogen">Wasserstoff-Brennstoffzelle</option>
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>


        <div class="search-container-item">
          <label>Getriebeart</label>
          <div class="search-selection-item">
            <select class="search-selection">
              <option selected value =""> Beliebig </option>
              <option value="manual">Manuell</option>
              <option value="automatic">Automatisch</option>
              <option value="semi-automatic">Halbautomatisch</option>
              <option value="cvt">CVT (Stufenloses Getriebe)</option>
              <option value="dual-clutch">Doppelkupplungsgetriebe</option>
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>


        <div class="search-container-item">
          <label>Kilometerstand-Kategorie</label>
          <div class="search-selection-item">
            <select class="search-selection">
              <option selected value =""> Beliebig </option>
              <option value="under-5000">Unter 5.000 km</option>
              <option value="5000-20000">5.000 - 20.000 km</option>
              <option value="20000-50000">20.000 - 50.000 km</option>
              <option value="50000-100000">50.000 - 100.000 km</option>
              <option value="over-100000">Über 100.000 km</option>
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>



        <!--End of Search Items-->
        <!--Reset Button-->
        <div class="reset-button">
          <i class="fa-solid fa-rotate-right" id="reset-button-one"></i>
          <a id="reset-button-two">Auswahl zurücksetzen</a>
        </div>
        
        <script>
          document.getElementById('reset-button-one').addEventListener('click', function() {
              // Alle Select-Elemente zurücksetzen
              const selects = document.querySelectorAll('select');
              selects.forEach(select => {
                  select.selectedIndex = 0; // Setze die Auswahl auf die erste Option
              });
      
              // Alle Input-Felder zurücksetzen
              const inputs = document.querySelectorAll('input');
              inputs.forEach(input => {
                  input.value = ''; // Setze den Wert auf leer
              });
          });

          document.getElementById('reset-button-two').addEventListener('click', function() {
              // Alle Select-Elemente zurücksetzen
              const selects = document.querySelectorAll('select');
              selects.forEach(select => {
                  select.selectedIndex = 0; // Setze die Auswahl auf die erste Option
              });
      
              // Alle Input-Felder zurücksetzen
              const inputs = document.querySelectorAll('input');
              inputs.forEach(input => {
                  input.value = ''; // Setze den Wert auf leer
              });
          });

          
      </script>
      <!--END of Reset Button-->
      <div class = "search-button-one" id="filter-button">
        <button>Suchen</button>
      </div>

      </div>
    </section>
    
    <!-- design -->
    <section class = "design" id = "design">
      <div class = "container">
        <div class = "title">
          <h2>Neuste Blogeinträge</h2>
          <p>Neuste Blogeinträge zu den aktuellen Themen</p>
        </div>
  <div class = "blog-content-modern">
          <!-- items -->
     <div class ="item-list" id ="item-list">
    </div>

    <!-- Pagination -->

    <ul class="pagination2 border size" id="pagination">

      <!-- wird gebaut aus dem Script-->

      <!-- <li href="#"><a>«</a></li>
      <li href="#"><a class="active">1</a></li>
      <li href="#"><a>2</a></li>
      <li href="#"><a>3</a></li>
      <li href="#"><a>4</a></li>
      <li href="#"><a>5</a></li>
      <li href="#"><a>6</a></li>
      <li href="#"><a href="#">7</a></li>
      <li href="#"><a href="#">»</a></li> -->
  </ul>

  </div>
      </div>
    </section>
    <!-- end of blog -->

    <!-- about -->
    <section class = "about" id = "about">
      <div class = "container">
        <div class = "about-content">
          <div>
            <img src = "assets/home/images/about-us-p1.jpg" alt = "">
          </div>
          <div class = "about-text">
            <div class = "title">
              <h2>Maksim Bogachenkov</h2>
              <p>Autos, die wir lieben</p>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id totam voluptatem saepe eius ipsum nam provident sapiente, natus et vel eligendi laboriosam odit eos temporibus impedit veritatis ut, illo deserunt illum voluptate quis beatae quod. Necessitatibus provident dicta consectetur labore!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam corrupti natus, eos quia recusandae voluptatem veniam modi officiis minima provident rem sint porro fuga quos tempora ea suscipit vero velit sed laudantium eaque necessitatibus maxime!</p>
          </div>
        </div>
      </div>
    </section>
    <!-- end of about -->

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
    
    <script type="module" src="assets/home/js/classes/Main.js"></script>
  </body>
</html>


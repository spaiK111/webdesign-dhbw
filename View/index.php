<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AutoInsider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/home/css/style.css">
    <link rel="stylesheet" href="assets/home/css/search-box.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/home/css/item.css">
    <link rel="stylesheet" href="assets/home/css/pagination.css">
    <link rel="stylesheet" href="assets/home/css/notification.css">
  </head>
  <body>

  <div class="alert" id="error">
    <strong>Danger! </strong> <p> Indicates a dangerous or potentially negative action. </p>
    <span class="closebtn">×</span>
  </div>
 
    <!-- header -->
    <header>
      <div class="navigation-bar">
        <?php include "navbar.php"; ?>
      </div>
      <div class = "banner">
        <div class = "banner-container">
          <h1 class = "banner-title">
            <span>real</span> AutoInsider
          </h1>
          <p>Von Experten für Enthusiasten: Alles, was du über Autos wissen musst!</p>
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
              <!--Hier PHP-->
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
              <option selected value ="" default> Beliebig </option>

              
            </select>
            <div class ="search-box">
              <svg   version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
              </svg>
            </div>
          </div>
        </div>



        <div class="search-container-item" id ="search-container-leistungsbereich">
    <label>Leistungsbereich</label>
    <div class="search-selection-item" id ="leistungsbereich-selection" >
        <input class="search-selection" list="leistungsbereich1" id="ps1" name="ps1" placeholder="Beliebig" />
        <datalist id="leistungsbereich1">
            <option value="20"></option>
            <option value="40"></option>
            <option value="60"></option>
            <option value="80"></option>
            <option value="100"></option>
            <option value="120"></option>
        </datalist>

        <span class="search-selection-span">bis</span>

        <input class="search-selection" list="leistungsbereich2" id="ps2" name="ps2" placeholder="Beliebig" />
        <datalist id="leistungsbereich2">
            <option value="140"></option>
            <option value="160"></option>
            <option value="180"></option>
            <option value="200"></option>
            <option value="220"></option>
            <option value="240"></option>
        </datalist>

        <div class="search-box">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="292.362px" height="292.362px" viewBox="0 0 292.362 292.362">
                <path d="M286.935,69.377c-3.614-3.617-7.898-5.424-12.848-5.424H18.274c-4.952,0-9.233,1.807-12.85,5.424 C1.807,72.998,0,77.279,0,82.228c0,4.948,1.807,9.229,5.424,12.847l127.907,127.907c3.621,3.617,7.902,5.428,12.85,5.428 s9.233-1.811,12.847-5.428L286.935,95.074c3.613-3.617,5.427-7.898,5.427-12.847C292.362,77.279,290.548,72.998,286.935,69.377z"/>
            </svg>
        </div>
    </div>
</div>


        <div class="search-container-item">
          <label>Fahrzeugkategorie</label>
          <div class="search-selection-item">
            <select class="search-selection" id="category">
              <option selected value =""> Beliebig </option>
              
                
              <option value="red">Limousine</option>
              <option value="orange">Kombi</option>
              <option value="yellow">SUV </option>
              <option value="green">Coupe</option>
              <option value="blue">Cabriolet</option>
              <option value="indigo">Roadster</option>
              <option value="violet">Sportwagen </option>
              <option value="purple">Minivan</option>
              <option value="pink">Pick Up</option>
              <option value="brown">Kompaktwagen</option>
              <option value="black">Kleinwagen</option>
              <option value="white">Crossover</option>
              <option value="gray">Van</option>
              
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
            <select class="search-selection" id="fueltype">
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
      <!--End of search-container-->


      <!--VIET search-container first search-->
      <div class = "first-search-container">

        <div class="search-container-item" id="hsn-container-item">
          <label>Herstellerschlüsselnummer (HSN)</label>
          <div class="search-selection-item">
            <input type="text" class="search-selection" placeholder="Bitte angeben" id="hsn-input">
          </div>
        </div>

        <div class="search-container-item" id="tsn-container-item">
          <label>Typschlüsselnummer (TSN)</label>
          <div class="search-selection-item">
            <input type="text" class="search-selection" placeholder="Bitte angeben" id="tsn-input">
          </div>
        </div>

        <!--Reset Button-->
        <div class="reset-button" id="first-search-reset-button">
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
        <div class = "search-button-one" id="first-filter-button" id="search-tsn-hsn">
          <button type="reset" id="first-filter-button-btn">Suchen</button>
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
    <div class="footer">
        <?php include "footer.php"; ?>
    </div>
    <!-- end of footer -->
    
    <script type="module" src="assets/home/js/classes/Main.js"></script>
    <script src="assets/home/js/classes/searchHsnTsn.js"></script>
  </body>
</html>


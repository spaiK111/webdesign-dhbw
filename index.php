<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AutoInsider®</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets//home/css/style.css">
    
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
    
    <!-- design -->
    <section class = "design" id = "design">
      <div class = "container">
        <div class = "title">
          <h2>Recent Cars & Designs</h2>
          <p>recent cars & designs on the blog</p>
        </div>

        <div class = "design-content">
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "/assets/home/images/news-blogpage-bg1.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Car Blog</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome car portfolio</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "/assets/home/images/news-blogpage-bg2.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Car Blog</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome car portfolio </a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "/assets/home/images/news-blogpage-bg3.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Car Blog</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome car portfolio </a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "/assets/home/images/news-blogpage-bg4.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Car Blog</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome car portfolio</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "/assets/home/images/news-blogpage-bg5.jpg" alt = ""class="cover-image">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Car Blog</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome car portfolio</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "/assets/home/images/news-blogpage-bg6.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Car Blog</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome car portfolio </a>
            </div>
          </div>
          <!-- end of item -->
        </div>
      </div>
    </section>
    <!-- end of design -->


    <!-- blog -->
    <section class = "blog" id = "blog">
      <div class = "container">
        <div class = "title">
          <h2>Neuste Blogeinträge</h2>
          <p>Neuste Blogeinträge zu den aktuellen Themen</p>
        </div>
        <div class = "blog-content-modern">
          <!-- items -->
          <div class = "blog-list-modern">
            <div class="blog-item-modern-outside">
              <div class = "blog-item-modern-inside">
                <div class ="blog-img-modern">
                  <img src = "/assets/home/images/cars-blogpage-bg6.jpg" alt = "">
                </div>
                <div class = "data-modern">
                  <span>Audi-Q5</span>
                  <span>12.12.2021</span>
                </div>
                <div class = "blog-price-modern">
                  <a href = "#">Preis: 4000$</a>
              </div>
            </div>    
              <div class = "blog-additional-info-modern">
                <a href = "#">Airbags</a>
              </div> 
              <div class ="blog-buttons-contact"> 
                <a href = "#">Kontaktieren</a>
                <a href = "#">Mehr</a>
              </div> 
          </div>


          <!-- end of items -->
          </div>
          
        </div>
      </div>
    </section>
    <!-- end of blog -->

    <!-- about -->
    <section class = "about" id = "about">
      <div class = "container">
        <div class = "about-content">
          <div>
            <img src = "/assets/home/images/about-us-p1.jpg" alt = "">
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
    
    <script src="/assets/home/js/search-bar.js"></script>
  </body>
</html>
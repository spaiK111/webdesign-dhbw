<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Car.Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font awesome icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/blog/blog.css" />
  </head>

  <body>
    <!-- Header Section -->
    <header>
      <nav class="navbar">
        <div class="container">
          <a href="index.html" class="navbar-brand">Car.Blog</a>
          <div class="navbar-nav">
            <a href="index.html">home</a>
            <a href="blog.php">blog</a>
            <a href="login-old.php">login</a>
            <a href="kontakt.php">kontakt</a>
            <!-- Entweder separate Kontakt-Seite oder Diret-Link zu Email? -->
            <a href="admin.php">admin</a>
          </div>
        </div>
      </nav>

      <div class="blog-topcontent-grid">
        <div class="blog-topcontent-topStory">
          <div class="blog-topcontent-topStory-item">
            <a href="#"
              ><img src="assets/blog/images/cars-blogpage-bg6.jpg" alt=""
            /></a>
          </div>
          <div class="blog-topcontent-topStory-item-title">
            <h1><a href="#">Platz 1</a></h1>
            <p>
              <a href="#"
                >dfjfdkjflkflskdlldfsklfsldkldfdkslkfldklsdfdlskflklsdfkkfsdjklfjdslkjfdslkfjkl</a
              >
            </p>
            <p>
              <a href="#"
                >dfjfdkjflkflskdlldfsklfsldkldfdkslkfldklsdfdlskflklsdfkkfsdjklfjdslkjfdslkfjkl</a
              >
            </p>
          </div>
        </div>

        <div class="blog-topcontent-latestBlog">
          <h1>Neuesten Blogs</h1>
          <div class="blog-topcontent-latestBlog-item">
            <h2 class="blog-topcontent-latestBlog-item-heading">LOL</h2>
            <p class="blog-topcontent-latestBlog-item-paragraph">
              dhjfhdshfjsdhjfdhdjshfdjhsj
            </p>
            <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
          </div>
          <div class="blog-topcontent-latestBlog-item">
            <h2 class="blog-topcontent-latestBlog-item-heading">LOL</h2>
            <p class="blog-topcontent-latestBlog-item-paragraph">
              dhjfhdshfjsdhjfdhdjshfdjhsj
            </p>
            <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
          </div>
          <div class="blog-topcontent-latestBlog-item">
            <h2 class="blog-topcontent-latestBlog-item-heading">LOL</h2>
            <p class="blog-topcontent-latestBlog-item-paragraph">
              dhjfhdshfjsdhjfdhdjshfdjhsj
            </p>
            <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
          </div>
          <div class="blog-topcontent-latestBlog-item">
            <h2 class="blog-topcontent-latestBlog-item-heading">LOL</h2>
            <p class="blog-topcontent-latestBlog-item-paragraph">
              dhjfhdshfjsdhjfdhdjshfdjhsj
            </p>
            <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
          </div>
          <div class="blog-topcontent-latestBlog-item">
            <h2 class="blog-topcontent-latestBlog-item-heading">LOL</h2>
            <p class="blog-topcontent-latestBlog-item-paragraph">
              dhjfhdshfjsdhjfdhdjshfdjhsj
            </p>
            <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
          </div>
        </div>
      </div>
    </header>

    <main>
      <div class="content">
        <section class="blog-gallery">
          <div class="blog-gallery-container">
            <div class="blog-gallery-item" id="gallery-item-one">
              <a href=""
                ><img src="assets/blog/images/news-blogpage-bg1.jpg"
              /></a>
            </div>
            <div class="blog-gallery-item" id="gallery-item-two">
              <a href=""
                ><img src="assets/blog/images/news-blogpage-bg1.jpg"
              /></a>
            </div>
            <div class="blog-gallery-item" id="gallery-item-three">
              <a href=""
                ><img src="assets/blog/images/news-blogpage-bg1.jpg"
              /></a>
            </div>
            <div class="blog-gallery-item" id="gallery-item-four">
              <a href=""
                ><img src="assets/blog/images/news-blogpage-bg1.jpg"
              /></a>
            </div>
            <div class="blog-gallery-item" id="gallery-item-five">
              <a href=""
                ><img src="assets/blog/images/news-blogpage-bg1.jpg"
              /></a>
            </div>
            <div class="blog-gallery-item" id="gallery-item-six">
              <a href=""
                ><img src="assets/blog/images/news-blogpage-bg1.jpg"
              /></a>
            </div>
          </div>
        </section>

        <section class="blog-part">
          <div class="blog-header">
            <h1>Blogeinträge</h1>

            <div class="banner">
              <div class="container">
                <form>
                  <input
                    type="text"
                    class="search-input"
                    placeholder="Suche Blogbeitrag..."
                  />
                  <button type="submit" class="search-button">
                    <span>
                      <svg
                        viewBox="0 0 24 24"
                        height="24"
                        width="24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"
                        ></path>
                      </svg>
                    </span>
                    <!--<i class = "fas fa-search"></i> Obsolete -->
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="blog-grid">
            <div class="blog-item">
              <h3>Blog Title 1</h3>
              <p>Kurze Beschreibung des Blogbeitrags 1.</p>
            </div>
            <div class="blog-item">
              <h3>Blog Title 2</h3>
              <p>Kurze Beschreibung des Blogbeitrags 2.</p>
            </div>
            <div class="blog-item">
              <h3>Blog Title 3</h3>
              <p>Kurze Beschreibung des Blogbeitrags 3.</p>
            </div>
            <div class="blog-item">
              <h3>Blog Title 4</h3>
              <p>Kurze Beschreibung des Blogbeitrags 4.</p>
            </div>
            <div class="blog-item">
              <h3>Blog Title 5</h3>
              <p>Kurze Beschreibung des Blogbeitrags 5.</p>
            </div>
            <div class="blog-item">
              <h3>cluster.überschrift</h3>
              <p>Kurze Beschreibung des Blogbeitrags 6.</p>
            </div>
          </div>
        </section>
      </div>
    </main>

    <!-- footer -->
    <footer>
      <div class="social-links">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
      </div>
      <span>Car Blog Page</span>
    </footer>
    <!-- end of footer -->
  </body>
</html>

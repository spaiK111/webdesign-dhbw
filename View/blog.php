<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>AutoInsider®</title>
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

      <div class="navigation-bar">
        <?php include "navbar.php"; ?>
      </div>

      <div class="blog-topcontent-grid">

        <!--Top Blog-->
        <div class="blog-topcontent-topBlog">
          <div class="blog-topcontent-topBlog-title">
            <h1>Top Blog</h1>
          </div>
          <div class ="blog-topcontent-topBlog-item">
            <div class="blog-topcontent-topBlog-item-image">
              <a href="#"><img src="assets/blog/images/cars-blogpage-bg6.jpg" alt=""/></a>
            </div>

            <div class="blog-topcontent-topBlog-item-heading">
              <h2>LOL</h2>
            </div>

            <div class="blog-topcontent-topBlog-item-paragraph">
              <p>dhjfhdshfjsdhjfdhdjshfdjhs</p>
            </div>
          </div>
          
            
        
        </div>
        <!--End of TopBlog-->

        <!--Latest Blog-->
        <div class="blog-topcontent-latestBlog">
          <div class="blog-topcontent-latestBlog-title">
            <h1>Neuesten Blogs</h1>
          </div>
          
          <div class="blog-topcontent-latestBlog-item-box">
            


            <div class="blog-topcontent-latestBlog-item">
              <div class="blog-topcontent-latestBlog-item-heading">
                <h2>LOL</h2>
              </div>

              <div class="blog-topcontent-latestBlog-item-paragraph">
                <p>dhjfhdshfjsdhjfdhdjshfdjhs</p>
              </div>

              <div class="blog-topcontent-latestBlog-item-image">
                <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
              </div> 
            </div>


            <div class="blog-topcontent-latestBlog-item">
              <div class="blog-topcontent-latestBlog-item-heading">
                <h2>LOL</h2>
              </div>

              <div class="blog-topcontent-latestBlog-item-paragraph">
                <p>dhjfhdshfjsdhjfdhdjshfdjhs</p>
              </div>

              <div class="blog-topcontent-latestBlog-item-image">
                <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
              </div> 
            </div>


            <div class="blog-topcontent-latestBlog-item">
              <div class="blog-topcontent-latestBlog-item-heading">
                <h2>LOL</h2>
              </div>

              <div class="blog-topcontent-latestBlog-item-paragraph">
                <p>dhjfhdshfjsdhjfdhdjshfdjhs</p>
              </div>

              <div class="blog-topcontent-latestBlog-item-image">
                <img src="assets/blog/images/cars-blogpage-bg1.jpg" />
              </div> 
            </div>

          </div>
        </div>
        <!--End of latest blog-->
      </div>
    </header>

    <main>
      <div class="content">
        <section class="blog-gallery">
          <div class="blog-gallery-title">
            <h1>Im Trend</h1>
          </div>

          <div class="blog-gallery-container">

            

            <!--first item-->
            <div class="blog-gallery-item" id="C">
              <div class="blog-gallery-image">
                <img src="assets/blog/images/cars-blogpage-bg1.jpg">
              </div>
              <div class="blog-gallery-text-title">
                <h2>Titel</h2>
              </div>
              <div class="blog-gallery-text">
                <p>jsddhskdjskjdlfkdslfkldskfldkslfkldsklfksldkkfldksl</p>
              </div>
            </div>
            

            <!--second item-->
            <div class="blog-gallery-item-reverse" id="blog-gallery-item-two">
              <div class="blog-gallery-image">
                <img src="assets/blog/images/cars-blogpage-bg1.jpg">
              </div>
              <div class="blog-gallery-text-title">
                <h2>Titel</h2>
              </div>
              <div class="blog-gallery-text">
                <p>jsddhskdjskjdlfkdslfkldskfldkslfkldsklfksldkkfldksl</p>
              </div>
            </div>

            <!--third item-->
            <div class="blog-gallery-item"  id="blog-gallery-item-three">
              <div class="blog-gallery-image">
                <img src="assets/blog/images/cars-blogpage-bg1.jpg">
              </div>
              <div class="blog-gallery-text-title">
                <h2>Titel</h2>
              </div>
              <div class="blog-gallery-text">
                <p>jsddhskdjskjdlfkdslfkldskfldkslfkldsklfksldkkfldksl</p>
              </div>
            </div>


          </div>
        </section>

        <section class="blog-part">
          <div class="blog-container">
            <div class="blog-header">

              <div class="blog-header-title">
                <h1>Blogeinträge</h1>
              </div>

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

          </div>
          
        </section>
      </div>
    </main>

    <!-- footer -->
    <div class="footer">
        <?php include "footer.php"; ?>
    </div>
    <!-- end of footer -->
  </body>
</html>

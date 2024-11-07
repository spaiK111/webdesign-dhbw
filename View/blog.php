<?php
// Empfange die Parameter login und password
$login = isset($_GET['login']) ? $_GET['login'] : (isset($_COOKIE['login']) ? $_COOKIE['login'] : '');
$hashedPassword = isset($_GET['hashedPassword']) ? $_GET['hashedPassword'] : (isset($_COOKIE['password']) ? $_COOKIE['password'] : '');



// Funktion zum Senden einer HTTPS-Anfrage
$apiUrl = "http://localhost:5000/api/posts/getUserData/?login=$login&hashedPassword=$hashedPassword";

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
		echo "Nicht eingeloggt";
	}

  $apiUrl2 = "http://localhost:5000/api/posts/getBlogs";

    // cURL initialisieren
    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $apiUrl2);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);

    // API-Anfrage ausführen und Antwort speichern
    $blogs = curl_exec($ch1);
    curl_close($ch1);

    // Antwort in ein Array umwandeln
    $data_blogs = json_decode($blogs, true);
    if ($data_blogs) {
      echo "blogs found";
      $topBlog = $data_blogs[0];
      $blog1 = $data_blogs[1];
      $blog2 = $data_blogs[2];
      $blog3 = $data_blogs[3];
      $blog4 = $data_blogs[4];
      $blog5 = $data_blogs[5];
      $blog6 = $data_blogs[6];
    }
    else {
      echo "blogs not found";
    }

?>

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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.querySelector('.search-input');
            const blogItems = document.querySelectorAll('.blog-item');

            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();

                blogItems.forEach(item => {
                    const heading = item.querySelector('h3').textContent.toLowerCase();
                    const description = item.querySelector('p').textContent.toLowerCase();

                    if (heading.includes(searchTerm) || description.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
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
            <?php if (isset($topBlog)): ?>
              
            <h1>Der beste Blog</h1>
          </div>
          <div class ="blog-topcontent-topBlog-item">
            <div class="blog-topcontent-topBlog-item-image">
              <a href="/View/blog-page.php?_id=<?php echo urlencode($topBlog["_id"]); ?>">
                <img src="<?php echo htmlspecialchars($topBlog['image']); ?>" alt=""/>
              </a>
            </div>

            <div class="blog-topcontent-topBlog-item-heading">
                <h2><?php echo htmlspecialchars($topBlog['heading']); ?></h2>
            </div>

            <div class="blog-topcontent-topBlog-item-paragraph">
              <p><?php echo htmlspecialchars(string: $topBlog['short_dsc']); ?></p>
            <?php endif; ?>
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
              <?php if (isset($blog1)): ?>
                  <h2><?php echo htmlspecialchars($blog1['heading']); ?></h2>
              </div>

              <div class="blog-topcontent-latestBlog-item-paragraph">
                <p><?php echo htmlspecialchars($blog1['short_dsc']); ?></p>
              <?php endif; ?>
              </div>

              <div class="blog-topcontent-latestBlog-item-image">
                <a href="/View/blog-page.php?_id=<?php echo urlencode($blog1["_id"]); ?>">
                <img src="<?php echo htmlspecialchars($blog1['image']); ?>" /> 
              </div> 
            </div>


            <div class="blog-topcontent-latestBlog-item">
            <?php if (isset($blog2)): ?>
                  <h2><?php echo htmlspecialchars($blog2['heading']); ?></h2>
              </div>

              <div class="blog-topcontent-latestBlog-item-paragraph">
                <p><?php echo htmlspecialchars($blog2['short_dsc']); ?></p>
              
              </div>

              <div class="blog-topcontent-latestBlog-item-image">
                <a href="/View/blog-page.php?_id=<?php echo urlencode($blog2["_id"]); ?>">
                <img src="<?php echo htmlspecialchars($blog2['image']); ?>" /> 
              </div> 
            <?php endif; ?>
            </div>


            <div class="blog-topcontent-latestBlog-item">
              <?php if (isset($blog3)): ?>
                  <h2><?php echo htmlspecialchars($blog3['heading']); ?></h2>
              </div>

              <div class="blog-topcontent-latestBlog-item-paragraph">
                <p><?php echo htmlspecialchars($blog3['short_dsc']); ?></p>
              
              </div>

              <div class="blog-topcontent-latestBlog-item-image">
                <a href="/View/blog-page.php?_id=<?php echo urlencode($blog3["_id"]); ?>">
                 <img src="<?php echo htmlspecialchars($blog3['image']); ?>" /> 
              <?php endif; ?>
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
            <div class="blog-gallery-item" id="blog-gallery-item-one">
              <div class="blog-gallery-image">
                <a href="/View/blog-page.php?_id=<?php echo urlencode($blog4["_id"]); ?>">
                <img src="<?php echo htmlspecialchars($blog4['image']); ?>">
              </div>
              <div class="blog-gallery-text-title">
              <?php if (isset($blog4)): ?>
                <h2><?php echo htmlspecialchars($blog4['heading']); ?></h2>
              </div>
              <div class="blog-gallery-text">
                <p><?php echo htmlspecialchars($blog4['short_dsc']); ?></p>
              <?php endif; ?>
              </div>
            </div>
            

            <!--second item-->
            <div class="blog-gallery-item-reverse" id="blog-gallery-item-two">
              <div class="blog-gallery-image">
                <a href="/View/blog-page.php?_id=<?php echo urlencode($blog5["_id"]); ?>">
                <img src="<?php echo htmlspecialchars($blog5['image']); ?>">
              </div>
              <?php if (isset($blog5)): ?>
                <h2><?php echo htmlspecialchars($blog5['heading']); ?></h2>
              </div>
              <div class="blog-gallery-text">
                <p><?php echo htmlspecialchars($blog5['short_dsc']); ?></p>
              <?php endif; ?>
            </div>

            <!--third item-->
            <div class="blog-gallery-item"  id="blog-gallery-item-three">
            <?php if (isset($blog6)): ?>
              <div class="blog-gallery-image">
                <a href="/View/blog-page.php?_id=<?php echo urlencode($blog6["_id"]); ?>">
                <img src="<?php echo htmlspecialchars($blog6['image']); ?>">
              </div>
                <h2><?php echo htmlspecialchars($blog6['heading']); ?></h2>
              </div>
              <div class="blog-gallery-text">
                <p><?php echo htmlspecialchars($blog6['short_dsc']); ?></p>
              <?php endif; ?>
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
    <?php if ($data_blogs && count($data_blogs) > 6): ?>
        <?php for ($i = 6; $i < count($data_blogs); $i++): ?>
            <?php if (isset($data_blogs[$i]['_id'], $data_blogs[$i]['image'], $data_blogs[$i]['heading'], $data_blogs[$i]['short_dsc'])): ?>
                <div class="blog-item" href="/View/blog-page.php?_id=<?php echo urlencode($data_blogs[$i]['_id']); ?>" style="background-image: url('<?php echo htmlspecialchars($dadata_blogsta[$i]['image']); ?>'); object-fit: cover">
                    <h3><?php echo htmlspecialchars($data_blogs[$i]['heading']); ?></h3>
                    <p><?php echo htmlspecialchars($data_blogs[$i]['short_dsc']); ?></p>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    <?php else: ?>
        <p>Keine weiteren Blogeinträge gefunden.</p>
    <?php endif; ?>
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

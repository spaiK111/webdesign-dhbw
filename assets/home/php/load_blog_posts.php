<?php
      $apiUrl = 'http://localhost:5000/api/posts';
      $response = file_get_contents($apiUrl);
      $data = json_decode($response, true);

      if ($data) {
        $maxItems = 3;
        $itemsCount = 0;

        foreach ($data as $post) {
          if ($itemsCount >= $maxItems) {
            break;
          }

          echo '<div class="blog-item">';
          echo '  <div class="blog-img">';
          echo '    <img src="' . htmlspecialchars($post['img']) . '" alt="">';
          echo '    <span><i class="far fa-heart"></i></span>';
          echo '  </div>';
          echo '  <div class="blog-text">';
          echo '    <span>' . date('d F, Y', strtotime($post['date'])) . '</span>';
          echo '    <h2>' . htmlspecialchars($post['title']) . '</h2>';
          echo '    <h3>' . htmlspecialchars($post['subtitel']) . '</h3>';
          echo '    <p>' . htmlspecialchars($post['content']) . '</p>';
          echo '    <div class="author">';
          echo '      <img src="' . htmlspecialchars($post['author_img']) . '" alt="' . htmlspecialchars($post['author']) . '">';
          echo '      <span>' . htmlspecialchars($post['author']) . '</span>';
          echo '    </div>';
          echo '    <a href="#">Mehr erfahren</a>';
          echo '  </div>';
          echo '</div>';

          $itemsCount++;
        }

        if (count($data) > $maxItems) {
          echo '<a href="#" class="all-blogs-button">Zu allen Blogs</a>';
        }
      } else {
        echo '<p>Fehler beim Abrufen der Daten.</p>';
      }
      ?>
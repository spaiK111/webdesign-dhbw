
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/navbar/navbar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMK2F1qhH7d/6c9Zbb5ED1j4h6V7B5tC/zC8zZ" crossorigin="anonymous">

    
  </head>
  <body>
    <nav class="navbar">
      <div class="container">
        <a href="index.php" class="navbar-brand">AutoInsider®</a>

        <div class="navbar-nav">
          <a  href="index.php">home</a>
          <a  href="blog.php">blog</a>
          <a  href="login-old.php">login</a>
          <a  href="registrieren-old.php">registrieren</a>
          <!-- Entweder separate Kontakt-Seite oder Diret-Link zu Email? -->
          <a href="admin.php">admin</a>
          <svg onclick= showSidebar() class="navbar-icon" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#fffFFF"><path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg>
        </div>
      </div>
      <div class="sidebar">
        <div class="navbar-nav" id="responsive-navbar">
          <svg class= "navbar-close-icon" onclick= hideSidebar() xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#fffFFF"><path d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg>
          <a href="index.php">home</a>
          <a href="blog.php">blog</a>
          <a href="login-old.php">login</a>
          <a href="registrieren-old.php">registrieren</a>
          <!-- Entweder separate Kontakt-Seite oder Diret-Link zu Email? -->
          <a href="admin.php">admin</a>
        </div>
      </div>
      <script>
        function showSidebar(){
          const sidebar= document.querySelector('.sidebar')
          sidebar.style.display = 'flex'
        }

        function hideSidebar(){
          const sidebar= document.querySelector('.sidebar')
          sidebar.style.display = 'none'
        }


      </script>
    </nav>
  </body>
</html>

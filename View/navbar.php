
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
          <div class= "icon-container">
            <a href="index.php">home</a>
            <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#fffFFF"><path d="M220-180h150v-250h220v250h150v-390L480-765 220-570v390Zm-60 60v-480l320-240 320 240v480H530v-250H430v250H160Zm320-353Z"/></svg></a>
          </div>
          <div class="icon-container">
          <a href="blog.php">blog</a>
          <a href="blog.php"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#fffFFF"><path d="M560-574v-48q33-14 67.5-21t72.5-7q26 0 51 4t49 10v44q-24-9-48.5-13.5T700-610q-38 0-73 9.5T560-574Zm0 220v-49q33-13.5 67.5-20.25T700-430q26 0 51 4t49 10v44q-24-9-48.5-13.5T700-390q-38 0-73 9t-67 27Zm0-110v-48q33-14 67.5-21t72.5-7q26 0 51 4t49 10v44q-24-9-48.5-13.5T700-500q-38 0-73 9.5T560-464ZM248-300q53.57 0 104.28 12.5Q403-275 452-250v-427q-45-30-97.62-46.5Q301.76-740 248-740q-38 0-74.5 9.5T100-707v434q31-14 70.5-20.5T248-300Zm264 50q50-25 98-37.5T712-300q38 0 78.5 6t69.5 16v-429q-34-17-71.82-25-37.82-8-76.18-8-54 0-104.5 16.5T512-677v427Zm-30 90q-51-38-111-58.5T248-239q-36.54 0-71.77 9T106-208q-23.1 11-44.55-3Q40-225 40-251v-463q0-15 7-27.5T68-761q42-20 87.39-29.5 45.4-9.5 92.61-9.5 63 0 122.5 17T482-731q51-35 109.5-52T712-800q46.87 0 91.93 9.5Q849-781 891-761q14 7 21.5 19.5T920-714v463q0 27.89-22.5 42.45Q875-194 853-208q-34-14-69.23-22.5Q748.54-239 712-239q-63 0-121 21t-109 58ZM276-489Z"/></svg></a>
          </div>
          <div class="icon-container">
          <a href="login-old.php">login</a>
          <a href="login-old.php"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#fffFFF"><path d="M481-120v-60h299v-600H481v-60h299q24 0 42 18t18 42v600q0 24-18 42t-42 18H481Zm-55-185-43-43 102-102H120v-60h363L381-612l43-43 176 176-174 174Z"/></svg></a>
          </div>
          <div class="icon-container">
          <a href="registrieren-old.php">registrieren</a>
          <a href="registrieren-old.php"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#fffFFF"><path d="M80-160v-94q0-34 17-62.5t51-43.5q72-32 132-46t120-14q29 0 61.5 3.5T528-404l-49 49q-20-2-39.5-3.5T400-360q-58 0-105.5 10.5T172-306q-17 8-24.5 23t-7.5 29v34h319l60 60H80Zm545 16L484-285l42-42 99 99 213-213 42 42-255 255ZM400-482q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42Zm59 262Zm-59-322q39 0 64.5-25.5T490-632q0-39-25.5-64.5T400-722q-39 0-64.5 25.5T310-632q0 39 25.5 64.5T400-542Zm0-90Z"/></svg></a>
          </div>
          
          <!-- Entweder separate Kontakt-Seite oder Diret-Link zu Email? -->
          <div class="icon-container">
          <a href="admin.php">admin</a>
          <a href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#fffFFF"><path d="M690.88-270q25.88 0 44-19T753-333.88q0-25.88-18.12-44t-44-18.12Q665-396 646-377.88q-19 18.12-19 44T646-289q19 19 44.88 19Zm-1.38 125q33.5 0 60.5-14t46-40q-26-14-51.96-21t-54-7q-28.04 0-54.54 7T584-199q19 26 45.5 40t60 14ZM480-80q-138-32-229-156.5T160-522v-239l320-120 320 120v270q-14-7-30-12.5t-30-7.5v-208l-260-96-260 96v197q0 76 24.5 140T307-269.5q38 48.5 84 80.5t89 46q6 12 18 27t20 23q-9 5-19 7.5T480-80Zm212.5 0Q615-80 560-135.5T505-267q0-78.43 54.99-133.72Q614.98-456 693-456q77 0 132.5 55.28Q881-345.43 881-267q0 76-55.5 131.5T692.5-80ZM480-479Z"/></svg></a>
          </div>
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

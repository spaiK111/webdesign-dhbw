<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Einloggen</title>
  <link rel="stylesheet" href="assets/login/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
</head>
<body>
  <!--navigation bar-->
  <div class="navigation-bar">
    <?php include "navbar.php"; ?>
  </div>
  <!--end of navigation bar-->

  <div class="wrapper-container">
    <div class="wrapper">
      <form action="">
        <h1>Login</h1>
        <div class="input-box">
          <input type="text" placeholder="E-Mail" required id="login">
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Passwort" required id="password">
          <i class='bx bxs-lock-alt' ></i>
        </div>
         <div class="remember-forgot">
       <!--    <label><input type="checkbox">Eingeloggt bleiben</label> -->
          <a href="#">Passwort vergessen</a>
        </div>
        <button type="button" class="btn" id="submit">Login</button>
        <div class="register-link">
          <p>Haben Sie noch keinen Account? <a href="/registrieren-old.php">Jetzt registrieren</a></p>
        </div>
      </form>
    </div>
  </div>


  

  

  <div class="alert" id="error">
    <strong>Danger! </strong> <p> Indicates a dangerous or potentially negative action. </p>
    <span class="closebtn">×</span>
  </div>

  <script src="assets/login/js/validateLogin.js""></script>

  <!-- footer -->
  <div class="footer">
        <?php include "footer.php"; ?>
  </div>
  <!-- end of footer -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Einloggen</title>
  <link rel="stylesheet" href="assets//login/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" required id="login">
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" required id="password">
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Password vergessen</a>
      </div>
      <button type="button" class="btn" id="submit">Login</button>
      <div class="register-link">
        <p>Haben Sie noch keinen Account? <a href="#">Registrieren</a></p>
      </div>
    </form>
  </div>

  <div class="alert" id="error">
    <strong>Danger! </strong> <p> Indicates a dangerous or potentially negative action. </p>
    <span class="closebtn">×</span>
  </div>

  <script src="assets/login/js/validateLogin.js""></script>
</body>
</html>
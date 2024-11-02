<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Einloggen</title>
  <link rel="stylesheet" href="assets//registrieren/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="">
      <h1>Registrieren</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" id="login" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" id="password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <button type="button" id="submit" class="btn">Registrieren</button>
    </form>
  </div>

  <div class="alert" id="error">
    <strong>Danger! </strong> <p> Indicates a dangerous or potentially negative action. </p>
    <span class="closebtn">×</span>
  </div>

  <script src="assets/registrieren/js/register.js""></script>
</body>
</html>
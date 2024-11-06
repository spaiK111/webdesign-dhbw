<?php
// // Empfange die Parameter login und password
// $login = isset($_GET['login']) ? $_GET['login'] : '';
// $hashedPassword = isset($_GET['hashedPassword']) ? $_GET['hashedPassword'] : '';

// if (!$login || !$hashedPassword) {
//     die('Login und Passwort sind erforderlich.');
// }

// // Funktion zum Senden einer HTTPS-Anfrage
// $apiUrl = "http://localhost:5000/api/posts/getUserData/?login=$login&hashedPassword=$hashedPassword";

//     // cURL initialisieren
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $apiUrl);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//     // API-Anfrage ausführen und Antwort speichern
//     $response = curl_exec($ch);
//     curl_close($ch);

//     // Antwort in ein Array umwandeln
//     $data = json_decode($response, true);
//     if ($data) {

// 	}
// 	else {
// 		echo "Bad Request";
// 	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets//userPage/css/style.css">

	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section class="sidebar">
		<a href="/index.html" class="brand">
			<span class="text">CarBlog</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" id="new-blog">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Neuer Blog</span>
				</a>
			</li>

		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Ausloggen</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section class="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" id ="notification-nav" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="/assets/admin/images/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main class ="main">
			<div class="head-title">
				<div class="left">
					<h1><i class='bx bxs-dashboard' ></i> Dashboard</h1>

		

			<!-- Neue Eingabefelder -->
	<div class="input-fields">
        <div class="input-group small-input">
            <label for="brand">Heading</label>
            <input type="text" id="entry-heading" name="brand" class="small-input">
        </div>
        <div class="input-group  small-input">
            <label for="year">Kurzbeschreibung</label>
            <input type="text" id="entry-short-dsc" name="year">
        </div>
        <div class="input-group large-input">
            <label for="link">Großbeschreibung</label>
            <input type="text" class="large-input" id="entry-long-dsc" name="entry-long-dsc">
        </div>
		<div class="input-group small-input">
            <label for="brand">Hauptbild</label>
            <input type="text" id="entry-main-image" name="brand" class="small-input">
        </div>
		<div class="btn-group">
			<div class ="btn-wrapper">
				<button class="btn" id="add_blog_txt">Hinzufügen</button>
				<button class="btn" id="clear_blog">Clear</button>
			</div>
		</div>

    </div>
            <!-- notification popup -->
			<div id="notification-popup" class="popup hidden">
				<div class="popup-header">
					<h3>Notifications</h3>
				</div>
				
				<div class="popup-content">
					<?php include 'assets\admin\php\popup-style.php'; ?>
					<?php foreach ($notifications as $notification): ?>
						<div class="notification <?php echo $notification['type']; ?>" style="background-color: <?php echo $notification['type'] === 'danger' ? 'red' : ($notification['type'] === 'success' ? 'green' : 'yellow'); ?>;">
							<p><?php echo getNotificationIcon($notification['type']) . ' ' . $notification['message']; ?></p>
							<a><?php echo $notification['description']; ?></a>
						</div>
					<?php endforeach; ?>
				</div>
				
					<!-- Weitere Benachrichtigungen -->
				</div>
			</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="assets//userPage/js/script.js"></script>
	<script src="assets//userPage/js/popup.js"></script>
	<script src="assets//userPage/js/main.js"></script>
	<script src="assets//userPage/js/input.js"></script>
</body>
</html>
<?php
// Empfange die Parameter login und password
$login = isset($_GET['login']) ? $_GET['login'] : (isset($_COOKIE['login']) ? $_COOKIE['login'] : '');
$hashedPassword = isset($_GET['hashedPassword']) ? $_GET['hashedPassword'] : (isset($_COOKIE['password']) ? $_COOKIE['password'] : '');

if (!$login || !$hashedPassword) {
    die('Login und Passwort sind erforderlich.');
}

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
		$firstName = $data['firstName'];
		$lastName = $data['lastName'];
		echo "login successful";
	}
	else {
		echo "Bad Request";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets//admin/css/style.css">

	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section class="sidebar">
		<a href="/View/index.php" class="brand">
			<span class="text">CarBlog</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" id="dashboard">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#" id="new-blog-car">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Neuer Car Blog</span>
				</a>
			</li>
			<li>
				<a href="#" id="new-blog">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Neuer Blog</span>
				</a>
			</li>
			<li>
				<a href="#" id="stats">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Statistik</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" id="config">
					<i class='bx bxs-cog' ></i>
					<span class="text">Einstellungen</span>
				</a>
			</li>
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
					<ul class="breadcrumb">
						<li>
							
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#"> <i class='bx bxs-dashboard' ></i> Dashboard</a>
						</li>
					</ul>

			<ul class="box-info" id="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Blogeinträge</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Besucher</p>
					</span>
				</li>
			</ul>


			<div class="table-data" id="table-data">
				<div class="order" id="div-order">
					<div class="head">
						<h3>Interessante Informationen</h3>
						<div class="search-filter-buttons">
							<i class='bx bx-search' ></i>
							<i class='bx bx-filter' ></i>
						</div>
					</div>

				</div>
				<div class="todo">
					<div class="head">
						<h3>Mehr Sachen idk</h3>
						<div class="search-filter-buttons">
							<i class='bx bx-plus' ></i>
							<i class='bx bx-filter' ></i>
						</div>	
					</div>
				</div>
				<div class="insert">
					<div class="head">
						<h3>Blogeinträge hinzufügen</h3>
						<div class="search-filter-buttons">
							<i class='bx bx-plus' ></i>
							<i class='bx bx-filter' ></i>
						</div>	
					</div>
				</div>
			</div>

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
			<button class="btn" id="add_blog_txt" authorFirstname="<?php echo $firstName; ?>" authorLastname="<?php echo $lastName; ?>">Hinzufügen</button>
				<button class="btn" id="clear_blog">Clear</button>
			</div>
		</div>

    </div>

			<div class = "input-blog" style="display: none; padding: 20px; border: 1px solid #ccc;" id="new-blog-new">

				<h2>Geben Sie die IDs ein</h2>

				<p><strong>HSN: </strong> <input class="input" value="2345622" type="number" id="entry-hsn"></p>

				<p><strong>TSN: </strong> <input class="input" value="6543223" type="number" id="entry-tsn"></p>

				<h2>Weitere Daten</h2>

				<p><strong>Make: </strong> <textarea class="textarea resize-ta" id="entry-make-area">BMW</textarea></p>

				<p><strong>Model: </strong> <textarea class="textarea resize-ta" id="entry-model-area">318i</textarea></p>

				<p><strong>Jahr: </strong> <textarea class="textarea resize-ta" id="entry-year-area">2014</textarea></p>

				<p><strong>KW: </strong> <textarea class="textarea resize-ta" id="entry-kw-area">147</textarea></p>

				<p><strong>Kategorie: </strong>
					<select class="textarea resize-ta" id="entry-category">
						<option value="Limousine" default>Limousine</option>
						<option value="Kombi">Kombi</option>
						<option value="Cabrio">Cabrio</option>
					</select>
				</p>

				<p><strong>Engine: </strong> <textarea class="textarea resize-ta" id="entry-engine">1.9TFSI</textarea></p>

				<p><strong>Kraftstoffart: </strong>
					<select class="textarea resize-ta" id="entry-fueltype">
						<option value="Benzin" default>Benzin</option>
						<option value="Diesel">Diesel</option>
						<option value="Elektro">Elektro</option>
					</select>
				</p>

				<p><strong>Hubraum: </strong> <textarea class="textarea resize-ta" id="entry-hubraum-area">1993</textarea></p>
				
				<p><strong>CO2-Emission: </strong> <textarea class="textarea resize-ta" id="entry-co2-area">120</textarea></p>

				<p><strong>Antriebsart: </strong>
					<select class="textarea resize-ta" id="entry-antrieb">
						<option value="Manuell" default>Manuell</option>
						<option value="Automatik">Automatik</option>
					</select>
				</p>


				<p><strong>Kofferraumvolumen: </strong> <textarea class="textarea resize-ta" id="entry-backVolumen-area">3</textarea></p>

				<p><strong>Maximale Geschwindigkeit (km/h): </strong> <textarea class="textarea resize-ta" id="entry-maxSpeed-area">260</textarea></p>

				<p><strong>Image (1): </strong> <textarea class="textarea resize-ta" id="entry-image1">https://media.istockphoto.com/id/1435226078/photo/front-of-a-white-bmw-m4-parked-on-a-street-with-trees-in-the-background.jpg?s=612x612&w=0&k=20&c=l1IupUrh-_Zbcse-hDkaUAh-qMD82hJspXjnN0IBZlg=</textarea></p>

				<p><strong>Image (2): </strong> <textarea class="textarea resize-ta" id="entry-image2">https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgy3Vihtm_EdW3klYnE0IsHeMwpRMnHJGmng&s</textarea></p>

				<p><strong>Image (3): </strong> <textarea class="textarea resize-ta" id="entry-image3">https://imgd.aeplcdn.com/370x208/n/cw/ec/132513/7-series-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80</textarea></p>

				<p><strong>Image (4): </strong> <textarea class="textarea resize-ta" id="entry-image4">https://t4.ftcdn.net/jpg/04/20/38/41/360_F_420384111_5fzxWlWxvB7bg5BROxfKdBbgBYB2TwGP.jpg</textarea></p>

				<button class="btn" id="add_blog_default" style="margin-top: 20px">Hinzufügen</button>

			</div>

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
	

	<script src="assets//admin/js/script.js"></script>
	<script src="assets//admin/js/popup.js"></script>
	<script src="assets//admin/js/main.js"></script>
	<script src="assets//admin/js/input.js"></script>
</body>
</html>
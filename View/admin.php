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
		<a href="/index.html" class="brand">
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
				<button class="btn" id="add_blog_txt">Hinzufügen</button>
				<button class="btn" id="clear_blog">Clear</button>
			</div>
		</div>

    </div>

			<div class = "input-blog" style="display: none; padding: 20px; border: 1px solid #ccc;" id="new-blog-new">

				<h2>Geben Sie die IDs ein</h2>

				<p><strong>HSN: </strong> <input class="input" value="99" type="number" id="entry-hsn"></p>

				<p><strong>TSN: </strong> <input class="input" value="99" type="number" id="entry-tsn">></p>


				<!--<p><strong>TSN: </strong> I would like <span class="input" role="textbox" contenteditable>99</span> hugs</p> -->

				<h2>Weitere Daten</h2>

				<p><strong>Make: </strong> <textarea class="textarea resize-ta" id="entry-make-area">></textarea></p>

				<p><strong>Model: </strong> <textarea class="textarea resize-ta" id="entry-model-area">></textarea></p>

				<div class ="horizontal-fields" style="display: flex; justify-content: space-between;">
					<p><strong>Jahr: von </strong> <input class="input" value="99" type="number" id="entry-year-from"></p>
					<p><strong> bis </strong> <input class="input" value="99" type="number" id="entry-year-up"></p>
				</div>

				<div class ="horizontal-fields" style="display: flex; justify-content: space-between;">
					<p><strong>KW: von </strong> <input class="input" value="99" type="number"  id="entry-kw-from"></p>
					<p><strong> bis </strong> <input class="input" value="99" type="number"  id="entry-kw-up"></p>
				</div>

				<p><strong>Kategorie: </strong> <textarea class="textarea resize-ta" id="entry-category"></textarea></p>

				<p><strong>Engine: </strong> <textarea class="textarea resize-ta" id="entry-engine"></textarea></p>

				<p><strong>Fueltype: </strong> <textarea class="textarea resize-ta" id="entry-fueltype"></textarea></p>

				<p><strong>Image (1): </strong> <textarea class="textarea resize-ta" id="entry-image1"></textarea></p>

				<p><strong>Image (2): </strong> <textarea class="textarea resize-ta" id="entry-image2"></textarea></p>

				<p><strong>Image (3): </strong> <textarea class="textarea resize-ta" id="entry-image3"></textarea></p>

				<p><strong>Image (4): </strong> <textarea class="textarea resize-ta" id="entry-image4"></textarea></p>

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
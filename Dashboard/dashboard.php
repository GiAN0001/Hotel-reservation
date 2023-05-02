<!DOCTYPE html>
    <html>

        <head>

			<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">

			<link rel = "stylesheet" type = "text/css" href = "../styles/home.css">

            <title> Dashboard </title>


        </head>


        <body>
			<nav>
				<ul>
					<div class = "logo">
						<li><a href = "dashboard.php"> HOTEL LOGO </a></li>
					</div>
						<li><a href = "dashboard.php"> HOME </a> </li>
						<li><a href = "about.php"> ABOUT </a> </li>
						<li><a href = "Rooms.html"> ROOMS </a> </li>
						<li><a href = "price-rates.php"> PRICE RATES </a> </li>


				</ul>
			</nav>


        <div class = "form">
			<form method = "POST" action = "">
				<div class = "pages">
					<input type = "submit" name = "btndb" value = "Make a reservation"><br>
					<input type = "submit" name = "btnadmin" value = "Admin Login"><br>
				</div>

			</form>

			<?php
				if(isset($_POST["btndb"])){
					echo "<script>window.location.href='reservation-form.php';</script>";
				}
				if(isset($_POST["btnadmin"])){
					echo "<script>window.location.href='../AdminPanel/admin.php';</script>";
				}




			?>


        </body>
		</div>
    </html>

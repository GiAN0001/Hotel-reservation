<!DOCTYPE html>
	<html>
		<head>
			<title> Admin panel </title>
		<head>

		<body>
			<nav>
				<ul>


										<li><a href = "guest-reservation.php" class = "guest"> Guest reservations</a></li>
										<li><a href = "add-rooms.php" class = "AddPrice"> Add price rates </a></li>.
										<li><a href = "remove-rooms.php" class = "deletePrice"> Remove price rates</a></li>
										<li><a href = 'search.php' class = "search">Search</a></li>
										<li><a href = 'admin.php' class = "logout">Logout</a></li>


				</ul>
			</nav>
		</body>

	</html>
<style>
*{
	margin: 0px;
	padding: 0px;
}
nav{
	width: 100%;
	height:80px;
	background-color: #1e1e1e;


}
ul{
	margin-left: 80px;

}

ul li{
	list-style: none;
	display: inline-block;
	float: left;
	line-height:80px;
}

ul li a{
	display: block;
	text-decoration: none;
	font-family: arial;
	color: white;
	letter-spacing: 4px;
	padding: 0 40px;
	transition: 0.5s;
}
ul li a:hover{
	color: #1e1e1e;
	background-color: white;

}

</style>

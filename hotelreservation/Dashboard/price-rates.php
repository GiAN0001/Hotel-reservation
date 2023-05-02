<!DOCTYPE html>
	<html>
		<head>
			<title> Price Rates </title>
			<link rel = "stylesheet" type = "text/css" href = "../styles/price-rate-design.css">
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
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
						<li><a href = "price-rates.php"> PRICE RATES </a></li>

				</ul>
			</nav>

			<div class = "header">
				<h1> PRICE RATES <h1>
			</div>
				<?php
					include("../AdminPanel/add-room-connection.php");
						$sql = mysqli_query($conn, "SELECT * FROM price_rates");
							echo "<div class = 'table-stage'>";
								echo "<table class = 'content-table'>";
									echo "<thead>
													<tr>
														<th> Room type </th>
														<th> Type of bed </th>
														<th> Room rate per 3hrs </th>
														<th> Room rate per 12hrs </th>
														<th> No. of person/s </th>
										 			</tr>
											 </thead>";
												while($row = mysqli_fetch_assoc($sql)){
													$RoomType = $row["room_type"];
													$BedType = $row["type_of_bed"];
													$RoomRate_3 = $row["room_rate_3hrs"];
													$RoomRate_12 = $row["room_rate_12hrs"];
													$PersonNum= $row["num_of_persons_allowed"];
														echo "<tbody>
																	<tr>
																		<td>".$RoomType."</td>
																		<td>".$BedType."</td>
																		<td>".$RoomRate_3."</td>
																		<td>".$RoomRate_12."</td>
																		<td>".$PersonNum."</td>
																	</tr>
																</tbody>";	
												}
								 		 echo	"</table>";
										echo "<div class='nav-bot'></div>";
									echo "<div>";


				?>

			<!--<div class = "table-stage">
				<table>
						<tr>
							<th> Room type </th>
							<th> Type of bed </th>
							<th> Room rate </th>
							<th> No. of <br> person/s	</th>
						</tr>

						<tr>
							<td> Single room </td>
							<td> 1 single bed </td>
							<td> P700/3 hrs<br>P1,300/12 hrs</td>
							<td> 1 </td>
						</tr>
						<tr>
							<td> Double room </td>
							<td> 2 single beds </td>
							<td> P1,300/3 hrs<br> P2,600/12 hrs </td>
							<td> 2 </td>
						</tr>
						<tr>
							<td> Triple room </td>
							<td> 3 single beds </td>
							<td> P2,000/3 hrs<br>P4,000/12 hrs </td>
							<td> 3 </td>
						</tr>
						<tr>
							<td> Quad room </td>
							<td> 2 double beds </td>
							<td> P2,850/3 hrs<br>P5,600/12 hrs</td>
							<td> 4 </td>
						</tr>
						<tr>
							<td> Queen room </td>
							<td> 1 queen bed </td>
							<td> P800/ 3hr<br>P1,900/12 hrs </td>
							<td> 1-2 </td>
						</tr>
						<tr>
							<td> King room </td>
							<td> 1 king bed </td>
							<td> P850/3 hrs<br>P2,000/12 hrs </td>
							<td> 1-2 </td>
						</tr>
						<tr>
							<td> Junior suite </td>
							<td> 2 double beds<br>1 king bed </td>
							<td> P3,100/12 hrs</td>
							<td> 1-4 </td>
						</tr>
				</table>
			</div>-->
		</body>

	</html>

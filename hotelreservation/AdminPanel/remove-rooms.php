<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Remove price rates</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
  </head>
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
  margin: 0;
  padding: 0;
}
table{
  text-align: center;
  margin-left: auto;
  margin-right: auto;
}
.title{
  text-align: center;
  font-size: 24px;
}
.content-table{
  border-collapse: collapse;
  font-size: 15px;
  min-width: 400px;
  border-radius: 10px 10px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.content-table thead tr{
  background-color: #1e1e1e;
  color: white;
  text-align: left;
  font-family: 'Open Sans', sans-serif;
  letter-spacing: 3px;
}
.content-table th,
.content-table td{
  padding: 15px 12px;
}
.content-table tbody tr{
  border-bottom: 1px solid #dddddd;
  font-family: open sans;
}
.title{
  font-size:32px;
  font-family: dela gothic one;
  letter-spacing: 2px;
  margin-bottom: 10px;
}
.linkreturn{
  text-decoration: none;
  background: #1e1e1e;
  color: white;
  padding: 10px;
  position: absolute;
  margin-top: 15px;
  margin-left: 117px;
  border-radius: 5px;
  font-family: arial;
  letter-spacing: 3px;
  transition: .3s;
  width: 225px;
}
.linkreturn:hover{
  background: gray;
  width: 240px;
}
.editInfo{
  background: rgba(0, 255, 0, 0.3);
  text-decoration: none;
  padding: 3px;
  color: #1e1e1e;
  font-family: open sans;
}
.deleteInfo{
  background: rgba(255, 0, 0, 0.3);
  text-decoration: none;
  padding: 3px;
  color: #1e1e1e;
  font-family: open sans;
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

<?php
  include("add-room-connection.php");
    $sql = mysqli_query($conn, "SELECT * FROM price_rates");
      echo "<div class = 'title'>Price rates records</div>";
        echo "<table class = 'content-table'>";
          echo "<thead>
                <tr>
                  <th> ID </th>
                  <th> Room type </th>
                  <th> Type of bed </th>
                  <th> Room rate per 3hrs </th>
                  <th> Room rate per 12hrs </th>
                  <th> No. of person/s </th>
                  <th></th>
                </tr>
              </thead>";
                while($row = mysqli_fetch_assoc($sql)){
                  $id = $row["id"];
                  $RoomType = $row["room_type"];
                  $BedType = $row["type_of_bed"];
                  $RoomRate_3 = $row["room_rate_3hrs"];
                  $RoomRate_12 = $row["room_rate_12hrs"];
                  $PersonNum= $row["num_of_persons_allowed"];
                    echo "</tbody>
                          <tr>
                            <td>".$id."</td>
                            <td>".$RoomType."</td>
                            <td>".$BedType."</td>
                            <td>".$RoomRate_3."</td>
                            <td>".$RoomRate_12."</td>
                            <td>".$PersonNum."</td>
                            <td><a href = 'edit-price-rates.php?id=$id' class = 'editInfo'>EDIT</a>
                              <a href = 'delete-price-rates.php?id=$id' class = 'deleteInfo'>DELETE</a>
                            </td>
                          </tr>
                        </tbody>";
                }
        echo "</table>";
      echo "</div>";

        echo "<a href = 'admin-panel.php'class = 'linkreturn'>Return to admin panel</a>"

?>

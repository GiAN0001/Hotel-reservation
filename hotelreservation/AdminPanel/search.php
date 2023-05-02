<!DOCTYPE html>
<html>
  <head>
    <meta>
    <title> Search </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <?php
      include '../dashboard/reservation-connection.php';

        $errorSearchValue = "";
        $search = "";
        $error= 0;
          if(isset($_POST['btnSearch'])){
            if(empty($_POST['searchValue'])){
              $errorSearchValue = "Please input a data!";
                $error++;
            }
            if($error == 0){


            $lname = $_POST['searchValue'];
            
              $query = "SELECT * FROM guests WHERE lastname = '$lname'";
              $queryRun = mysqli_query($con, $query);

              while($row = mysqli_fetch_array($queryRun))
              {
                $id = $row["id"];
                $lastname = $row["lastname"];
                $firstname = $row["firstname"];
                $contact = $row["contact"];
                $email = $row["email"];
                $adult = $row["adult_guest"];
                $children = $row["children_guest"];
                $date = $row["date_of_arrival"];
                echo "<table class = 'content-table'>";
                  echo "<thead>
                          <tr>
                            <th> Id </th>
                            <th> Lastname </th>
                            <th> Firstname </th>
                            <th> Contact </th>
                            <th> Email </th>
                            <th>Adult guest</th>
                            <th>Children guest</th>
                            <th> Arrival date</th>
                            <th>        </th>
                          </tr>
                       </thead>";
                       echo "<tbody>
                              <tr>
                              <tr>
                                <td>".$id."</td>
                                <td>".$lastname."</td>
                                <td>".$firstname."</td>
                                <td>".$contact."</td>
                                <td>".$email."</td>
                                <td>".$adult."</td>
                                <td>".$children."</td>
                                <td>".$date."</td>
                              </tr>
                            </tbody>";
                echo "</table>";

              }
          }

        }
       ?>
        <input type="text" name="searchValue" placeholder="Enter a Lastname" value = "<?php echo $search; ?>"><br>
        <span class="error"><?php echo $errorSearchValue; ?></span><br>
        <input type="submit" name="btnSearch" value = "search">



    </form>

  </body>
</html>
<style>
form{
  text-align: center;
  margin-top: 100px;
}
*{
  margin: 0;
  padding: 0;
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
table{
  text-align: center;
  margin-left: auto;
  margin-right: auto;
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
.error{
  color: red;
  font-size: 18px;
  padding: 4px;
  font-family: open sans;
}
input[type=text]{
  padding: 10px;
  width: 200px;
  border: 1px solid gray;
  font-size: 14px;
  border-radius: 10px;
}
input[type=submit]{
  width: 225px;
  padding: 5px;
  cursor: pointer;
  background: #1e1e1e;
  color: white;
  border-radius: 10px;
  border: none;
  transition: 0.3s;
  letter-spacing: 4px;
}
input[type=submit]:hover{
  width: 250px;
  background: gray;
}

</style>

<?php
  include("add-room-connection.php");
    $userID = $_REQUEST["id"];

      $sql = mysqli_query($conn, "SELECT * FROM price_rates WHERE id = '$userID' ");
      if($row = mysqli_fetch_assoc($sql)){

        $deleteInfo = $row['room_type'];

          echo "<h1>Are you sure you want to delete" ." ". $deleteInfo."?</h1>";
      }
          mysqli_close($conn);

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
     <title>Delete guest records</title>
     <style>
       body{
         background-image: url(../images/dashboard.jpg);
         background-size: cover;
       }
       h1{
         margin-top: 200px;
         text-align: center;
         font-family: arial;
         letter-spacing: 2px;
       }
       form{
         text-align: center;
       }
       input{
         width: 250px;
         padding: 10px;
         background: transparent;
         color: #1e1e1e;
         border: 1px solid #1e1e1e;
         border-radius: 5px;
         margin-top: 10px;
         cursor: pointer;
         font-family: arial;
         letter-spacing: 3px;
         transition: .3s;
       }
       input:hover{
         background: #1e1e1e;
         color: white;
         border: 1px solid white;
         width: 300px;
       }
     </style>
   </head>
   <body>
     <form method="POST" action="true-delete-price-rates.php">
       <input type="hidden" name="userID" value="<?php echo $userID; ?>">
       <input type="submit" name="btnDelete" value="Delete"><br>
       <input type="submit" name="btnCancel" value="Cancel">
     </form>
   </body>
 </html>

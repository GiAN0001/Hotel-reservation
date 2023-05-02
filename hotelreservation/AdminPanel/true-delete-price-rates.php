<?php
  include("add-room-connection.php");
  if(isset($_POST['btnDelete'])){
    $userID = $_POST["userID"];
      mysqli_query($conn, "DELETE FROM price_rates WHERE id = '$userID'");

        echo "<script language = 'javascript'>alert('Your Record has been DELETED!!!')</script>";
        echo "<script>window.location.href='remove-rooms.php';</script>";
  }
  if(isset($_POST['btnCancel'])){
        echo "<script>window.location.href='remove-rooms.php';</script>";
  }

 ?>

<?php
  include("../dashboard/reservation-connection.php");

    if(isset($_POST['btnDelete'])){
      $userID = $_POST["userID"];
        mysqli_query($con, "DELETE FROM guests WHERE id = '$userID'");

        echo "<script language = 'javascript'>alert('Your Record has been DELETED!!!')</script>";
        echo "<script>window.location.href='guest-reservation.php';</script>";
    }
    if(isset($_POST['btnCancel'])){
          echo "<script>window.location.href='guest-reservation.php';</script>";
    }
 ?>

<?php

  include("add-room-connection.php");
    $userID = $_REQUEST["id"];

      $sql = mysqli_query($conn, "SELECT * FROM price_rates WHERE id = '$userID' ");

        if($row =  mysqli_fetch_assoc($sql)){
          $showRoomtype = $row["room_type"];
          $showBedtype = $row["type_of_bed"];
          $showRoomrate_3 = $row["room_rate_3hrs"];
          $showRoomrate_12 = $row["room_rate_12hrs"];
          $showPerson = $row["num_of_persons_allowed"];
        }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit price rates</title>
    <link rel = "stylesheet" type="text/css" href="../styles/reservation-form-style.css">

  </head>
  <body>

    <?php
    $error_roomtype = $error_bedtype = $error_roomrate3 = $error_roomrate12 = $error_person_num = "";
    $roomtype = $bedtype = $roomrate_3 = $roomrate_12 = $person_num = "";

      $error = 0;

        if(isset($_POST['btnupdate'])){

          if(empty($_POST['room_type'])){
            $error_roomtype = "Room type is required!";
              $error++;
          }
          else{
            $_POST['room_type'] = test_input($_POST['room_type']);
            if(!preg_match('/^[\p{L} ]+$/u', $_POST['room_type'])){
              $error_roomtype = "Only letters and white space are allowed!";
               $error++;
            }
          }
          if(empty($_POST['bed_type'])){
            $error_bedtype = "Bed type is required!";
              $error++;
          }
          else{
            $_POST['bed_type'] = test_input($_POST['bed_type']);
            if(!preg_match('/^[a-z0-9 ]+$/i', $_POST['bed_type'])){
              $error_bedtype = "Only letters, digits and white space are allowed!";
               $error++;
            }
          }
          if(empty($_POST['room_rate_3'])){
            $error_roomrate3 = "This field is required!";
              $error++;
          }
          else{
            $_POST['room_rate_3'] = test_input($_POST['room_rate_3']);
              if(!preg_match('/^[a-z0-9 ,]+$/i', $_POST['room_rate_3'])){
                $error_roomrate3 = "Only letters, digits and comma are allowed!";
                  $error++;
              }
          }
          if(empty($_POST['room_rate_12'])){
            $error_roomrate12 = "This field is required!";
              $error++;
          }
          else{
            $_POST['room_rate_12'] = test_input($_POST['room_rate_12']);
              if(!preg_match('/^[a-z0-9 ,]+$/i', $_POST['room_rate_12'])){
                $error_roomrate12 = "Only letters, digits and comma are allowed!";
                  $error++;
              }
          }

          if(empty($_POST['person_num'])){
            $error_person_num = "Number of person is required!";
              $error++;
          }
          else {
            $_POST['person_num'] = test_input($_POST['person_num']);
              if(!preg_match('/^[0-9 -]*$/', $_POST['person_num'])){
                $error_person_num = "Only digits and the symbol - are allowed!";
                  $error++;
              }
          }
          if($error == 0){

            $updateID = $_REQUEST['txtID'];
            $updateRoomtype = $_REQUEST['room_type'];
            $updateBedtype= $_REQUEST['bed_type'];
            $updateRoomrate_3 = $_REQUEST['room_rate_3'];
            $updateRoomrate_12 = $_REQUEST['room_rate_12'];
            $updatePerson = $_REQUEST['person_num'];

                mysqli_query($conn, "UPDATE price_rates SET room_type = '$updateRoomtype', type_of_bed = '$updateBedtype',
                room_rate_3hrs = '$updateRoomrate_3', room_rate_12hrs = '$updateRoomrate_12',
                num_of_persons_allowed = '$updatePerson' WHERE id = '$updateID'");

                echo "<script language='javascript'>alert('Record has been edited!')</script>";
                echo "<script>window.location.href='remove-rooms.php';</script>";
          }
        }
        if(isset($_POST['btncancel'])){

          echo "<script>window.location.href='remove-rooms.php';</script>";
        }
        function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return($data);
        }

     ?>

    <div class = "input-container">
      <div class = "title"> Edit room price rates</div>

        <div class = "sub-container">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

              <input type="hidden" name="txtID" value="<?php echo $userID; ?>">

              <div class="fill-data">
                <label> Room type</label>
                  <input type = "text" name = "room_type" value = "<?php echo $showRoomtype; ?>">
                    <span class = "error"><?php echo $error_roomtype; ?></span>
              </div>
              <div class="fill-data">
                <label> Type of bed</label>
                  <input type = "text" name = "bed_type" value = "<?php echo $showBedtype; ?>">
                    <span class = "error"><?php echo $error_bedtype; ?></span>
              </div>
              <div class="fill-data">
                <label> Room rate per 3hrs</label>
                  <input type = "text" name = "room_rate_3" value = "<?php echo $showRoomrate_3?>" placeholder="PHP 0,000">
                    <span class = "error"><?php echo $error_roomrate3; ?></span>
              </div>
              <div class="fill-data">
                <label> Room rate per 12hrs</label>
                  <input type = "text" name = "room_rate_12" value = "<?php echo $showRoomrate_12; ?>" placeholder="PHP 0,000">
                    <span class = "error"><?php echo $error_roomrate12; ?></span>
              </div>
              <div class="fill-data">
                <label> Number of person allowed</label>
                  <input type = "text" name = "person_num" value = "<?php echo $showPerson; ?>">
                    <span class = "error"><?php echo $error_person_num; ?></span>
              </div>
              <div class="fill-data">
                  <input type = "submit" name = "btnupdate" value = "Add">
              </div>
              <div class="fill-data">
                  <input type = "submit" name = "btncancel" value = "cancel">
              </div>
        </div>
    </div>
  </body>
</html>

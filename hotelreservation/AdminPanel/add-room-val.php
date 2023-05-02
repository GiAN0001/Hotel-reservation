<?php
    include("add-room-connection.php");

      $error_roomtype = $error_bedtype = $error_roomrate3 = $error_roomrate12 = $error_person_num = "";
      $roomtype = $bedtype = $roomrate_3 = $roomrate_12 = $person_num = "";

        $error = 0;

          if(isset($_POST['btnadd'])){

            if(empty($_POST['room_type'])){
              $error_roomtype = "Room type is required!";
                $error++;
            }
            else{
              $roomtype = test_input($_POST['room_type']);
              if(!preg_match('/^[\p{L} ]+$/u', $roomtype)){
                $error_roomtype = "Only letters and white space are allowed!";
                 $error++;
              }
            }
            if(empty($_POST['bed_type'])){
              $error_bedtype = "Bed type is required!";
                $error++;
            }
            else{
              $bedtype = test_input($_POST['bed_type']);
              if(!preg_match('/^[a-z0-9 ]+$/i', $bedtype)){
                $error_bedtype = "Only letters, digits and white space are allowed!";
                 $error++;
              }
            }
            if(empty($_POST['room_rate_3'])){
              $error_roomrate3 = "This field is required!";
                $error++;
            }
            else{
              $roomrate_3 = test_input($_POST['room_rate_3']);
                if(!preg_match('/^[a-z0-9 ,]+$/i', $roomrate_3)){
                  $error_roomrate3 = "Only letters, digits and comma are allowed!";
                    $error++;
                }
            }
            if(empty($_POST['room_rate_12'])){
              $error_roomrate12 = "This field is required!";
                $error++;
            }
            else{
              $roomrate_12 = test_input($_POST['room_rate_12']);
                if(!preg_match('/^[a-z0-9 ,]+$/i', $roomrate_12)){
                  $error_roomrate12 = "Only letters, digits and comma are allowed!";
                    $error++;
                }
            }

            if(empty($_POST['person_num'])){
              $error_person_num = "Number of person is required!";
                $error++;
            }
            else {
              $person_num = test_input($_POST['person_num']);
                if(!preg_match('/^[0-9 -]*$/', $person_num)){
                  $error_person_num = "Only digits and the symbol - are allowed!";
                    $error++;

                }
            }

          if($error == 0){

            $roomtype = $_POST['room_type'];
            $bedtype = $_POST['bed_type'];
            $roomrate_3 = $_POST['room_rate_3'];
            $roomrate_12 = $_POST['room_rate_12'];
            $person_num = $_POST['person_num'];

                $sql = "INSERT INTO price_rates(room_type, type_of_bed, room_rate_3hrs, room_rate_12hrs, num_of_persons_allowed)
                  VALUES ('$roomtype', '$bedtype', '$roomrate_3', '$roomrate_12', '$person_num')";

                  if(mysqli_query($conn, $sql)){
                        echo "<script language = 'javascript'>alert('Your Record has been inserted')</script>";
                        echo "<script>window.location.href='admin-panel.php';</script>";
                      }
                       else {
                        echo "error".$sql."<br>".mysqli_error($conn);
                       }
                       mysqli_close($conn);
          }
        }
        if(isset($_POST['btncancel'])){
            echo "<script>window.location.href='admin-panel.php';</script>";
        }
          function test_input($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return($data);
        }
?>

<?php
  include("../dashboard/reservation-connection.php");
    $userID = $_REQUEST["id"];


      $sql = mysqli_query($con, "SELECT * FROM guests WHERE id = '$userID'");
        if($row = mysqli_fetch_assoc($sql)){

          $showLname = $row["lastname"];
          $showFname = $row["firstname"];
          $showEmail = $row["email"];
          $showContact = $row["contact"];
          $showAdultguest = $row["adult_guest"];
          $showChildrenguest = $row["children_guest"];
          $showArrivaldate = $row["date_of_arrival"];
        }
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Edit guest info</title>
      <link rel = "stylesheet" type="text/css" href="../styles/reservation-form-style.css">

    </head>
    <body>

      <?php
      $error_adult = $error_children = $error_lname = $error_fname = $error_date =
      $error_email = $error_contact = "";



      $error = 0;

          if(isset($_POST['btnUpdate'])){
            if(empty($_POST['txtLname'])){
              $error_lname = "Lastname is required!";
                $error++;
            }
            else{
              $_POST['txtLname'] = test_input($_POST['txtLname']);
              if(!preg_match('/^[\p{L} ]+$/u', $_POST['txtLname'])){
                $error_lname = "Only letter and white space are allowed!";
                 $error++;
              }
            }
            if(empty($_POST['txtFname'])){
              $error_fname = "Lastname is required!";
                $error++;
            }
            else{
              $_POST['txtFname'] = test_input($_POST['txtFname']);
              if(!preg_match('/^[\p{L} ]+$/u', $_POST['txtFname'])){
                $error_fname = "Only letter and white space are allowed!";
                 $error++;
              }
            }
            if(empty($_POST['txtEmail'])){
              $error_email = "Email is required!";
              $error++;
            }
            else{
              $_POST['txtEmail'] = test_input($_POST['txtEmail']);
              if(!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)){
                $error_email = "Invalid email format!";
                $error++;
              }
            }
            if(empty($_POST['txtContact'])){
              $error_contact = "Contact is required!";
              $error++;
            }
            elseif(!is_numeric($_POST['txtContact'])){
              $error_contact = "Only digits are allowed!";
                $error++;
            }
            else{
              $_POST['txtContact'] = test_input($_POST['txtContact']);
              if(!preg_match('/^\d{11}$/', $_POST['txtContact'])){
                $error_contact = "Contact must be 11 digits!";
                  $error++;
              }
           }
           if(empty($_POST['txtAdultguest'])){
             $error_adult = "This field is required!";
               $error++;
           }
           if(empty($_POST['txtChildrenguest'])){
             $error_children = "This field is required!";
               $error++;
           }
           else{
             $_POST['txtAdultguest'] = test_input($_POST['txtAdultguest']);
             $_POST['txtChildrenguest'] = test_input($_POST['txtChildrenguest']);
             if($_POST['txtAdultguest'] === "O" || $_POST['txtChildrenguest'] < 1){
               $error_adult = "You must have an adult with you to book a reservation!";
                 $error++;
             }
           }
           if(empty($_POST['txtDate'])){
             $error_date = "Date is reqiured!";
               $error++;
           }
           else {
             $_POST['txtDate'] = test_input($_POST['txtDate']);
             if($_POST['txtDate'] <= date("Y-m-d")){
               $error_date = "The date should be tomorrow or later!";
                 $error++;
             }
           }
           if($error == 0){
            $updateID = $_REQUEST['txtID'];
            $updateLname = $_REQUEST['txtLname'];
            $updateFname = $_REQUEST['txtFname'];
            $updateEmail = $_REQUEST['txtEmail'];
            $updateContact = $_REQUEST['txtContact'];
            $updateAdultguest = $_REQUEST['txtAdultguest'];
            $updateChildrenguest = $_REQUEST['txtChildrenguest'];
            $updateDate = $_REQUEST['txtDate'];

              mysqli_query($con, "UPDATE guests SET lastname = '$updateLname', firstname = '$updateFname', email = '$updateEmail',
                contact = '$updateContact', adult_guest = '$updateAdultguest', children_guest = '$updateChildrenguest',
                date_of_arrival = '$updateDate' WHERE id = '$updateID' ");

                  echo "<script language='javascript'>alert('Record has been edited!')</script>";
                  echo "<script>window.location.href='guest-reservation.php';</script>";
           }
          }
          if(isset($_POST['btnCancel'])){
            echo "<script>window.location.href='guest-reservation.php';</script>";
          }
          function test_input($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return($data);
          }
      ?>

      <div class = "input-container">
        <div class="title"> Edit guest informartion</div>
          <div class="sub-container">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

              <input type="hidden" name="txtID" value="<?php echo $userID; ?>">

                <div class="fill-data">
                  <label>Lastname</label>
                  <input type="text" name="txtLname" value="<?php echo $showLname; ?>">
                    <span class = "error"><?php echo $error_lname; ?></span>
                </div>

                <div class="fill-data">
                  <label>Firstname</label>
                  <input type="text" name="txtFname" value="<?php echo $showFname; ?>">
                    <span class = "error"><?php echo $error_fname; ?></span>
                </div>

                <div class="fill-data">
                  <label>Email</label>
                  <input type="text" name="txtEmail" value="<?php echo $showEmail; ?>">
                    <span class = "error"><?php echo $error_email; ?></span>
                </div>

                <div class="fill-data">
                  <label>Contact</label>
                  <input type="text" name="txtContact" value="<?php echo $showContact; ?>">
                    <span class = "error"><?php echo $error_contact; ?></span>
                </div>

                <div class="fill-data">
                  <label>Adult guest</label>
                  <select name = "txtAdultguest">
                    <option value = "" selected="selected">Select </option>
                    <option value = "O" <?php if($showAdultguest == 'O') { ?> selected <?php } ?> >0</option>
                    <option value = "1" <?php if($showAdultguest == '1') { ?> selected <?php } ?> >1</option>
                    <option value = "2" <?php if($showAdultguest == '2') { ?> selected <?php } ?> >2</option>
                    <option value = "3" <?php if($showAdultguest == '3') { ?> selected <?php } ?> >3</option>
                    <option value = "4" <?php if($showAdultguest == '4') { ?> selected <?php } ?> >4</option>
                    <option value = "5" <?php if($showAdultguest == '5') { ?> selected <?php } ?> >5</option>
                    <option value = "6" <?php if($showAdultguest == '6') { ?> selected <?php } ?> >6</option>
                    <option value = "7" <?php if($showAdultguest == '7') { ?> selected <?php } ?> >7</option>
                    <option value = "8" <?php if($showAdultguest == '8') { ?> selected <?php } ?> >8</option>
                  </select>
                    <span class = "error"><?php echo $error_adult; ?></span>
                </div>

                <div class="fill-data">
                  <label>Children guest</label>
                  <select name = "txtChildrenguest">
                      <option value = "" selected="selected">Select </option>
                      <option value = "O" <?php if($showChildrenguest == 'O') { ?> selected <?php } ?>>0</option>
                      <option value = "1" <?php if($showChildrenguest == '1') { ?> selected <?php } ?>>1</option>
                      <option value = "2" <?php if($showChildrenguest == '2') { ?> selected <?php } ?>>2</option>
                      <option value = "3" <?php if($showChildrenguest == '3') { ?> selected <?php } ?>>3</option>
                      <option value = "4" <?php if($showChildrenguest == '4') { ?> selected <?php } ?>>4</option>
                      <option value = "5" <?php if($showChildrenguest == '5') { ?> selected <?php } ?>>5</option>
                      <option value = "6" <?php if($showChildrenguest == '6') { ?> selected <?php } ?>>6</option>
                      <option value = "7" <?php if($showChildrenguest == '7') { ?> selected <?php } ?>>7</option>
                      <option value = "8" <?php if($showChildrenguest == '8') { ?> selected <?php } ?>>8</option>
                  </select>
                    <span class = "error"><?php echo $error_children; ?></span>
                </div>

                <div class="fill-data">
                  <label>Arrival date</label>
                  <input type="date" name="txtDate" value="<?php echo $showArrivaldate; ?>">
                    <span class = "error"><?php echo $error_date; ?></span>
                </div>

                <div class="fill-data">
                  <input type="submit" name="btnUpdate" value="Update">
                </div>

                <div class="fill-data">
                  <input type="submit" name="btnCancel" value="Cancel">
                </div>
            </form>
          </div>
      </div>

    </body>
  </html>

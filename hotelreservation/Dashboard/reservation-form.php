<!DOCTYPE html>
  <html>
    <head>
      <title>Reservation Form </title>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel = "stylesheet" type = "text/css" href = "../styles/reservation-form-style.css">
    </head>

    <body>
      <!--connection to validation!-->
      <?php include("reservation-validation.php"); ?>

      <div class = "input-container">
        <div class="title">Make a reservation </div>

        <div class="sub-container">
        <form method = "POST" action="<?php $_SERVER['PHP_SELF'];?>">
          <div class="header"> Personal Information </div>
              <div class = "fill-data">
                <label> Lastname </label>
                  <input type = "text" name = "lname" value="<?= $lastname ?>" placeholder="Your lastname">
                    <span class = "error"><?php echo $error_lname; ?></span>
              </div>
              <div class = "fill-data">
                <label> Firstname </label>
                  <input type = "text" name = "fname" value="<?= $firstname ?>" placeholder="Your firstname">
                    <span class = "error"><?php echo $error_fname; ?></span>
              </div>
              <div class = "fill-data">
                <label> Email </label>
                  <input type = "text" name = "email" value="<?= $email ?>" placeholder="Example@gmail.com">
                    <span class = "error"><?php echo $error_email; ?></span>
              </div>
              <div class = "fill-data">
                <label> Contact </label>
                  <input type = "text" name = "contact" value="<?= $cont ?>" placeholder="09999999999">
                    <span class = "error"><?php echo $error_contact; ?></span>
              </div>
              <div class="header"> Reservation Information </div>
                  <div class="fill-data">
                    <label>Room type</label>
                      <select name="RoomType">
                        <option value="" selected = "selected">Select room type</option>
                        <option value="Single room" <?php if(@$_POST['RoomType'] == "Single room") { echo 'selected = \"selected"'; }  ?> > Single Room</option>
                        <option value="Double room" <?php if(@$_POST['RoomType'] == "Double room") { echo 'selected = \"selected"'; }  ?>> Double Room</option>
                        <option value="Triple room" <?php if(@$_POST['RoomType'] == "Triple room") { echo 'selected = \"selected"'; }  ?>> Triple Room</option>
                        <option value="Quad room" <?php if(@$_POST['RoomType'] == "Quad room") { echo 'selected = \"selected"'; }  ?>> Quad Room</option>
                        <option value="Queen room" <?php if(@$_POST['RoomType'] == "Queen room") { echo 'selected = \"selected"'; }  ?>> Queen Room</option>
                        <option value="King room" <?php if(@$_POST['RoomType'] == "King room") { echo 'selected = \"selected"'; }  ?>> King Room</option>
                        <option value="Junior suite" <?php if(@$_POST['RoomType'] == "Junior suite") { echo 'selected = \"selected"'; }  ?>> Junior suite</option>
                      </select>
                        <span class = "error"><?php echo $error_RoomType; ?></span>
                  </div>
                  <div class = "fill-data">
                    <label> Adult guest</label>
                      <select name = "adult">
                        <option value = "" selected="selected">Select </option>
                        <option value = "O" <?php if(@$_POST['adult'] == 'O') { echo 'selected = \"selected\"'; } ?>>0</option>
                        <option value = "1" <?php if(@$_POST['adult'] == '1') { echo 'selected = \"selected\"'; } ?>>1</option>
                        <option value = "2" <?php if(@$_POST['adult'] == '2') { echo 'selected = \"selected\"'; } ?>>2</option>
                        <option value = "3" <?php if(@$_POST['adult'] == '3') { echo 'selected = \"selected\"'; } ?>>3</option>
                        <option value = "4" <?php if(@$_POST['adult'] == '4') { echo 'selected = \"selected\"'; } ?>>4</option>
                        <option value = "5" <?php if(@$_POST['adult'] == '5') { echo 'selected = \"selected\"'; } ?>>5</option>
                        <option value = "6" <?php if(@$_POST['adult'] == '6') { echo 'selected = \"selected\"'; } ?>>6</option>
                        <option value = "7" <?php if(@$_POST['adult'] == '7') { echo 'selected = \"selected\"'; } ?>>7</option>
                        <option value = "8" <?php if(@$_POST['adult'] == '8') { echo 'selected = \"selected\"'; } ?>>8</option>
                      </select>
                      <span class = "error"><?php echo $error_adult; ?></span>
                  </div>

                  <div class = "fill-data">
                    <label> children guest</label>
                      <select name = "children" value="<?= $children ?>">
                          <option value = "" selected="selectedd">Select </option>
                          <option value = "O" <?php if(@$_POST['children'] == '0') { echo 'selected = \"selected\"'; } ?>>0</option>
                          <option value = "1" <?php if(@$_POST['children'] == '1') { echo 'selected = \"selected\"'; } ?>>1</option>
                          <option value = "2" <?php if(@$_POST['children'] == '2') { echo 'selected = \"selected\"'; } ?>>2</option>
                          <option value = "3" <?php if(@$_POST['children'] == '3') { echo 'selected = \"selected\"'; } ?>>3</option>
                          <option value = "4" <?php if(@$_POST['children'] == '4') { echo 'selected = \"selected\"'; } ?>>4</option>
                          <option value = "5" <?php if(@$_POST['children'] == '5') { echo 'selected = \"selected\"'; } ?>>5</option>
                          <option value = "6" <?php if(@$_POST['children'] == '6') { echo 'selected = \"selected\"'; } ?>>6</option>
                          <option value = "7" <?php if(@$_POST['children'] == '7') { echo 'selected = \"selected\"'; } ?>>7</option>
                          <option value = "8" <?php if(@$_POST['children'] == '8') { echo 'selected = \"selected\"'; } ?>>8</option>
                      </select>
                      <i>note: 1-12 years old is the only age that are considered as a child.</i><br>
                        <span class = "error"><?php echo $error_children; ?></span>
                  </div>
              <div class = "fill-data">
                <label> Arrival date </label>
                  <input type = "date" name = "arrival_date"  value="<?= $date ?>">
                    <span class = "error"><?php echo $error_date; ?></span>
              </div>
              <div class="fill-data">
                <input type = "submit" name = "btnsubmit" value = "Submit">
              </div>
              <div class="fill-data">
                <input type = "submit" name = "btnreturn" value = "Cancel">
              </div>
          </form>
        </div>
      </div>
    </body>
  </html>

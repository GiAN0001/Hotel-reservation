<!DOCTYPE html>
  <html>
    <head>
      <title>Add price rates</title>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel = "stylesheet" type = "text/css" href = "../styles/reservation-form-style.css">
    </head>
    <body>

      <?php include("add-room-val.php");?>

      <div class = "input-container">
        <div class = "title"> Add room & price rates</div>

          <div class = "sub-container">
              <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="fill-data">
                  <label> Room type</label>
                    <input type = "text" name = "room_type" value = "<?= $roomtype?>">
                      <span class = "error"><?php echo $error_roomtype; ?></span>
                </div>
                <div class="fill-data">
                  <label> Type of bed</label>
                    <input type = "text" name = "bed_type" value = "<?= $bedtype?>">
                      <span class = "error"><?php echo $error_bedtype; ?></span>
                </div>
                <div class="fill-data">
                  <label> Room rate per 3hrs</label>
                    <input type = "text" name = "room_rate_3" value = "<?= $roomrate_3?>" placeholder="PHP 0,000">
                      <span class = "error"><?php echo $error_roomrate3; ?></span>
                </div>
                <div class="fill-data">
                  <label> Room rate per 12hrs</label>
                    <input type = "text" name = "room_rate_12" value = "<?= $roomrate_12?>" placeholder="PHP 0,000">
                      <span class = "error"><?php echo $error_roomrate12; ?></span>
                </div>
                <div class="fill-data">
                  <label> Number of person allowed</label>
                    <input type = "text" name = "person_num" value = "<?= $person_num?>">
                      <span class = "error"><?php echo $error_person_num; ?></span>
                </div>
                <div class="fill-data">
                    <input type = "submit" name = "btnadd" value = "Add">
                </div>
                <div class="fill-data">
                    <input type = "submit" name = "btncancel" value = "cancel">
                </div>
          </div>
      </div>
    </body>
  </html>

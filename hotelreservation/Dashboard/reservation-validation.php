<?php
  include("reservation-connection.php");

    $error_RoomType = $error_adult = $error_children = $error_lname = $error_fname = $error_date =
    $error_email = $error_contact = "";

    $lastname = $firstname =  $email = $cont = $adult = $children = $arrivalDate = "";

    $error = 0;

      if(isset($_POST['btnsubmit'])){
        //lastname validation
        if(empty($_POST['lname'])){
          $error_lname = "Lastname is required!";
            $error++;
        }
        else{
          $lastname = test_input($_POST['lname']);
          if(!preg_match('/^[\p{L} ]+$/u', $lastname)){
            $error_lname = "Only letter and white space are allowed!";
             $error++;
          }
        }
        //firstname validation
        if(empty($_POST['fname'])){
          $error_fname = "Firstname is required!";
            $error++;
        }
        else{
          $firstname = test_input($_POST['fname']);
          if(!preg_match('/^[\p{L} ]+$/u', $firstname)){
            $error_fname = "Only letter and white space are allowed!";
             $error++;
          }
        }
        //email validation
        if(empty($_POST['email'])){
          $error_email = "Email is required!";
          $error++;
        }
        else{
          $email = test_input($_POST['email']);
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error_email = "Invalid email format!";
            $error++;
          }
        }
        // contact validation
        if(empty($_POST['contact'])){
          $error_contact = "Contact is required!";
          $error++;
        }
        elseif(!is_numeric($_POST['contact'])){
          $error_contact = "Only digits are allowed!";
            $error++;
        }
        else{
          $cont = test_input($_POST['contact']);
          if(!preg_match('/^\d{11}$/', $cont)){
            $error_contact = "Contact must be 11 digits!";
              $error++;
          }
       }
       // Room type validaiton
       if(empty($_POST['RoomType'])){
         $error_RoomType = "Room type is required!";
          $error++;
       }
       elseif($_POST['RoomType'] == "Single room" && $_POST['adult'] >= 2){
         $error_adult = "The number of adult guest can't be accomodated with this type of room!";
          $error++;
       }
       elseif($_POST['RoomType'] == "Single room" && $_POST['children'] >= 3){
         $error_children = "The number of children guest can't be accommodated with this type of room!";
          $error++;
       }
       elseif ($_POST['RoomType'] == "Double room" && $_POST['adult'] >= 3) {
         $error_adult = "The number of adult guest can't be accomodated with this type of room!";
          $error++;
       }
       elseif ($_POST['RoomType'] == "Double room" && $_POST['children'] >= 5) {
         $error_children = "The number of children guest can't be accommodated with this type of room!";
          $error++;
       }
       elseif ($_POST['RoomType'] == "Triple room" && $_POST['adult'] >= 4) {
         $error_adult = "The number of adult guest can't be accomodated with this type of room!";
         $error++;
       }
       elseif ($_POST['RoomType'] == "Triple room" && $_POST['children'] >= 6) {
         $error_children = "The number of children guest can't be accommodated with this type of room!";
          $error++;
       }
       elseif($_POST['RoomType'] == "Quad room" && $_POST['adult'] >= 5){
         $error_adult = "The number of adult guest can't be accomodated with this type of room!";
          $error++;
       }
       
       //adult guest validation
        if(empty($_POST['adult'])){
          $error_adult = "This field is required!";
            $error++;
        }
        //children validation
        if(empty($_POST['children'])){
          $error_children = "This field is required!";
            $error++;
        }
        else{
          $adult = test_input($_POST['adult']);
          $children = test_input($_POST['children']);
          if($_POST['adult'] === "O" || $_POST['children']  < 1){
            $error_adult = "You must have an adult with you to book a reservation!";
              $error++;
          }
        }
        //arrival date validation
        if(empty($_POST['arrival_date'])){
          $error_date = "Date is reqiured!";
            $error++;
        }
        else {
          $arrivalDate = test_input($_POST['arrival_date']);
          if($arrivalDate <= date("Y-m-d")){
            $error_date = "The date should be tomorrow or later!";
              $error++;
          }
        }
        //sending form data to database if no errors
       if($error == 0){

         $lastname = $_POST['lname'];
         $firstname = $_POST['fname'];
         $email = $_POST['email'];
         $cont = $_POST['contact'];
         $adult = $_POST['adult'];
         $children = $_POST['children'];
         $arrivalDate = $_POST['arrival_date'];


          $sql = "INSERT INTO guests(lastname, firstname, email, contact, adult_guest, children_guest, date_of_arrival)
            VALUES ( '$lastname', '$firstname', '$email', '$cont', '$adult', '$children', '$arrivalDate')";

              if(mysqli_query($con, $sql)){
                    echo "<script language = 'javascript'>alert('Your Record has been inserted')</script>";
                    echo "<script>window.location.href='dashboard.php';</script>";
                  }
                   else {
                    echo "error".$sql."<br>".mysqli_error($con);
                   }
                   mysqli_close($con);
       }
     }
     if(isset($_POST['btnreturn'])){
       echo "<script>window.location.href='dashboard.php';</script>";
     }
   function test_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return($data);
   }
?>

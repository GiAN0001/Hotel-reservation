<?php
  session_start();
  define('DBSERVER', 'localhost');
  define('DBUSERNAME', 'root');
  define('DBPASS', '');
  define('DBNAME', 'hotel_reservation');

    $con = mysqli_connect(DBSERVER,DBUSERNAME,"") or die ("cannot connect to server");

    $mydatabase = mysqli_query($con , "CREATE DATABASE IF NOT EXISTS `hotel_reservation` ");
    $mydatabase = mysqli_query($con, "
                    CREATE TABLE IF NOT EXISTS `hotel_reservation` . `guests` (
                        `id` int(20) NOT NULL AUTO_INCREMENT,
                        `lastname` varchar(20) NOT NULL,
                        `firstname` varchar(20) NOT NULL,
                        `email` varchar(50) NOT NULL,
                        `contact` varchar(20) NOT NULL,
                        `adult_guest` varchar(20) NOT NULL,
                        `children_guest` varchar(20) NOT NULL,
                        `date_of_arrival` varchar(20) NOT NULL,
                        PRIMARY KEY (`id`)
                          ) ENGINE = InnoDB; " );

                          if($con === false){
                              die("ERROR: COULD NOT CONNECT DATABASE" . mysqli_error());
                          }

                          else{
                              mysqli_select_db($con, "hotel_reservation");

                          }

 ?>

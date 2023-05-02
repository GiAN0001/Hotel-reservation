<?php
	session_start();
    define('DBSERVER' , 'localhost');
    define('DBUSERNAME' , 'root');
    define('DBPASS' , '');
    define('DBNAME' , 'add_delete_room');

    $conn = mysqli_connect(DBSERVER,DBUSERNAME,"") or die ("cannot connect to server");

    $mydatabase = mysqli_query($conn , "CREATE DATABASE IF NOT EXISTS `add_delete_room` ");
    $mydatabase = mysqli_query($conn, "
                          CREATE TABLE IF NOT EXISTS `add_delete_room` . `price_rates` (
                                 `id` int(15) NOT NULL AUTO_INCREMENT,
                                 `room_type` varchar (30) NOT NULL,
                                 `type_of_bed` varchar(30) NOT NULL,
                                 `room_rate_3hrs` varchar(30) NOT NULL,
                                 `room_rate_12hrs` varchar(30) NOT NULL,
                                 `num_of_persons_allowed` varchar (30) NOT NULL,
                                  PRIMARY KEY (`id`)
                                    ) ENGINE = InnoDB; " );
    if($conn === false){
        die("ERROR: COULD NOT CONNECT DATABASE" . mysqli_error());
    }

    else{
        mysqli_select_db($conn, "add_delete_room");

    }
?>

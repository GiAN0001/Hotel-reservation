<?php
	session_start();
    define('DBSERVER' , 'localhost');
    define('DBUSERNAME' , 'root');
    define('DBPASS' , '');
    define('DBNAME' , 'admin');

		$connect = mysqli_connect(DBSERVER,DBUSERNAME,"") or die ("cannot connect to server");
		$mydatabase3 = mysqli_query($connect , "CREATE DATABASE IF NOT EXISTS `admin` ");
		$mydatabase3 = mysqli_query($connect, "
										CREATE TABLE IF NOT EXISTS `admin` . `admin_user` (
											`id` int (20) NOT NULL AUTO_INCREMENT,
											`username` varchar(20) NOT NULL,
											`password` varchar(20) NOT NULL,
											PRIMARY KEY (`id`)
											) ENGINE = InnoDB; " );
    if($connect === false){
        die("ERROR: COULD NOT CONNECT DATABASE" . mysqli_error());
    }

    else{
        mysqli_select_db($connect, "admin");

    }


?>

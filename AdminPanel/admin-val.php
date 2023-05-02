<?php

	include("admin-connection.php");




		if(isset($_POST['login'])){
			$username = $_POST['user'];
			$password = $_POST['pass'];

								$sql = "select * from admin_user where username = '$username' and password = '$password'";
								$query = mysqli_query($connect, $sql);
								$row = mysqli_num_rows($query);

			if(empty($username) || empty($password)){
				header ('location:admin.php?login=empty');
					exit();
			}
			if($row != 1){
				header('location:admin.php?login=invalid');
					exit();
			}
			else{
				$_SESSION['user'] = $username;
				header('location:admin-panel.php?login=success');
			}
		}

		else{
			header('location:admin-panel.php?login=success');
				exit();
			}


?>

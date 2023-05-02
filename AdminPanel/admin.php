<!DOCTYPE html>
    <html>

    <head>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<link rel = "stylesheet" type = "text/css" href = "../styles/admin-style.css">
        <title> Admin </title>
    </head>

    <body>




		<div class = "form-design">
		<div class = "header"> Sign in </div>
			<form method = "POST" action = "admin-val.php">
				<input type = "text" name = "user" placeholder = "Username" value = "<?php echo @$_POST['user'];?>">
					<i class = "fa fa-user"></i> <br>
				<input id = "pswrd" type = "password" name = "pass" placeholder = "password">
					<i class = "far fa-eye-slash" onclick = "show()" ></i>
				<input type = "submit" name = "login"  value = "login">
				<a href = "../Dashboard/dashboard.php"> Home</a>
			</form>

		</div>
			<script>
				function show(){
					var pswrd = document.getElementById('pswrd');
					var icon = document.querySelector('.far');
						if(pswrd.type === "password"){
							pswrd.type = "text";
							pswrd.style.marginTop = "20px";
							icon.style.color = "gray";
						}
						else{
							pswrd.type = "password";
							icon.style.color = "#1e1e1e";
						}
				}

			</script>
		<?php

			$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				if(strpos($fullUrl, "login=empty") == true){
					echo "<p class ='error'>Please fill in all fields<p>";
						exit();
				}
				elseif(strpos($fullUrl, "login=invalid") == true){
					echo "<p class ='error'>Your username or password are incorrect please try again!!<p>";
						exit();
				}
				elseif(strpos($fullUrl, "login=success") == true){
						exit();
				}



		?>

    </body>

    </html>

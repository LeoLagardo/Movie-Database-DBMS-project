<?php 

	if (isset($_POST['submit'])){
		$mysqli = NEW MySQLi("localhost","root","","demo");
		
		$password= $mysqli->real_escape_string($_POST['password']);
		
		$resultSet = $mysqli->query("SELECT * FROM loginform WHERE password LIKE '$password%'");
		$num_rows = mysqli_num_rows($resultSet);
		if($resultSet->num_rows > 0){
			echo "welcome";
			header("refresh:1 url=main.php");
		}else{
			 echo "<p style='color:#EFEBEB;'>wrong password</p>";
		}
	}
 ?>
	

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/login1.css">
	</head>
<body>
     
	<div class="container">
		<h1>Welcome to Movie Database</h1>
		<form method="POST" >
			<div class="form_input">
			<i class="fa fa-user" aria-hidden="true"></i>
			  <input type="text" name="username" placeholder="Enter username">
			</div>
            <div class="from_input">
			<i class="fa fa-lock" aria-hidden="true"></i>
              <input type="password" name="password" placeholder="Enter password">
			</div><br><br>
            <button><input type="submit" name="submit" value="LOGIN" class="btn-login" ></button>
		</form>
	</div>
</body>	
</html>
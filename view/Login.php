<?php include('include/Header.php') 
	
	?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		login 
	</title>
</head>
<body>
	
	<?php 
	include("../controller/LoginAction.php");
	?>

	<center>
		<br><br>
		<img src="../model/6.jpg" width="700" height="260">
		

	<h1>Login Page</h1>
	<br><br>

	<form action="../controller/LoginAction.php" method ="POST">
		<fieldset>
			<legend>Please Login</legend>
		Username:
		<input type="Text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"> 
		<br>
		<br>
		
		Password:
		<input type="Text" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
		<br>
		<br>
		<p><input type="checkbox" name="remember" /> Remember me</p>
 
		<input type="submit" name="submit" Value="Login">
	</fieldset>
	</form>



	Not Registered yet? please <a href="Registration.php">Click here</a> for login.

	<br><br>
	  
</center>

</body>
</html>
<?php require('include/Footer.php');?>
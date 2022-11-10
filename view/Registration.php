<?php 
	$firstname=$lastname=$dob=$gender=$religion=$email="";
	$firstnameErr=$lastnameErr=$dobErr=$genderErr=$religionErr=$emailErr="";

	$username=$password="";
	$usernameErr = $passwordErr = "";
	





	if ($_SERVER['REQUEST_METHOD']==="POST")
	{
		if (empty($_POST["firstname"]))
			{
				$firstnameErr = "Firstame is required";
			} 
			else {
				if (str_word_count($_POST["firstname"])>=1)
				{
					$name = test_input($_POST["firstname"]);
					if (!preg_match("/^[a-zA-Z-' _]*$/",$firstname)) 
						{
							$firstnameErr = "Only letters and white space allowed";
						}
						}
						else{
							$firstnameErr = "Type atleast two words";
						}
				 	}


                if (empty($_POST["lastname"]))
                   	{
                   		$lastnameErr = "Lastname is required";
                   	} 
                   	else { 
                   		if (str_word_count($_POST["lastname"])>=1)
                   			{
                   				$lastname = test_input($_POST["lastname"]);
                   				if (!preg_match("/^[a-zA-Z-' _]*$/",$lastname)) 
						{
							$lastnameErr = "Only letters and white space allowed";
					 	}
					 }
				 	  else{
				 	  	$lastnameErr = "Type atleast two words";
				 	  }
				 }
		if (empty($_POST["email"]))
			{
				$emailErr = "Email is required";
			} 
			else {
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				 {
				 	$emailErr = "Invalid email format";
				 }
				 }
		if (empty($_POST["dob"])) 
			{
				$dobErr = "Date of birth is required";
			} 
			else
				{
					$dob = test_input($_POST["dob"]);
				}
		if (empty($_POST["gender"]))
		{
			$genderErr = "Gender is required";
		} 
		else {
			$gender = test_input($_POST["gender"]);
		}


		if (empty($_POST["religion"])) 
		{
			$religionErr = "Religion is required";
		} 
		else {
			$religion = test_input($_POST["religion"]);
		}




		if (empty($_POST["username"]))
		{
			$usernameErr = "User Name is required";
		}
		else
			{
				if (str_word_count($_POST["username"]) ==1 && strlen($_POST["username"])>=2)
					{
						$username = test_input($_POST["username"]);
						if (!preg_match("/^[a-z0-9.-_]/i",$username))
							{
								$usernameErr = "Only alpha numeric characters, period, dash or underscore allowed";
							}
						}
						 else {
						 	$usernameErr = "Type atleast two characters without any space";
						 }
						}


		        $uppercase = preg_match('@[A-Z]@', $password);
		        $lowercase = preg_match('@[a-z]@', $password);
		        $number    = preg_match('@[0-9]@', $password);
		        $specialChars = preg_match('@[^\w]@', $password);



		if(empty($_POST["password"]))
			{
				$password = test_input($_POST["password"]);
				$passwordErr = "Password is required";
			}
			

			$firstname = $_POST['firstname'];
			$lastname= $_POST['lastname'];
			$dob= $_POST['dob'];
			$religion= $_POST['religion'];
			$preadd= $_POST['preadd'];
			$phone= $_POST['phone'];
			$email= $_POST['email'];
			$username = $_POST['username'];
			$password= $_POST['password'];
			

			if(file_exists('../model/user.json'))
				{  
					$current_data = file_get_contents('../model/user.json');
					$array_data = json_decode($current_data, true);
					$extra = array('username' => $username,
						'password' => $password,
						'firstname' => $firstname,
						'lastname' => $lastname,
						'dob' => $dob,
						'religion' => $religion,
						'preadd' => $preadd,
						'phone' => $phone,
						'email' => $email);
					$array_data[] = $extra;
					$final_data = json_encode($array_data);
					if(file_put_contents('../model/user.json', $final_data))
						{  
							$message = "Registration Complete";
						}
					}
				else
				{
					$error = 'JSON File not exits'; 
				}
				}
				function test_input($data) 
					{
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
					}
		
		
		
	?>

	<?php
	include('include/Header.php')
	?>
		

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<style>
	.error {color: #FF0000;}
</style>
	<title>  
		Registration
	</title>
</head>
<body>
	

	<center>
		



		
	<h1>Registration Page for Doctors.</h1>
	<br><br>
	
	<h3>If you are not registered yet, please register</h3>

	 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


	<fieldset>
		<legend>Please register if you are a new doctor</legend>
			<br><br>


	First Name :<input type="text" id="firstname" name="firstname">
	<span class="error">* <?php echo $firstnameErr;?></span>
	
                <br><br>
        Last Name :<input type="text" id="lastname" name="lastname">
        <span class="error">* <?php echo $lastnameErr;?></span>
                
                <br><br>


        Gender :<input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Other
                <span class="error">* <?php echo $genderErr;?></span>
                <br><br>

        Date Of Birth :
                <input type="date" id="dob" name="dob">
                <span class="error">* <?php echo $dobErr;?></span>
                <br><br>

        Religion :<select id="religion" name="religion">
                    <option value="islam">Islam</option>
                    <option value="hindu">Hindu</option>
                    <option value="christian">Christian</option>
                    <option value="buddhist">Buddhist</option>
                </select>
                <span class="error">* <?php echo $religionErr;?> </span>
           <br><br>

        Present Address:<textarea id="preadd" name="preadd" row="4" cols="40"></textarea>
		<br>
		<br>

	Cell No:<input type="tel" id="phone" name="phone">
		<br>
		<br>


        Email: <input type="email" id="email" name="email">
        <span class="error">* <?php echo $emailErr;?></span>

       <br><br>


	Username:<input type="Text" name="username">
	<span class="error">* <?php echo $usernameErr;?></span>
		<br>
		<br>
		
	

	Password:<input type="Text" name="password">
	<span class="error">* <?php echo $passwordErr;?></span>
		<br>
		<br>


	

		

		<input type="submit" name="submit" value="Register">
		<br>	
		<?php  
		if(isset($message))
			{  
			 echo $message;
			} else
			{
				echo $error;
			}

			

			?>	


		<br><br>
		<br>
		<img src="../model/5.png" width="600" height="260">
		

		
		
	</fieldset>
	</form>
	If you are already registered, please <a href="Login.php">Click here</a> for Registration 
	<br><br>

	
	
</center>

</body>
</html>
<?php include('include/Footer.php');?>
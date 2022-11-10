<?php 
  session_start();
  if(count($_SESSION) === 0) 
  {
    header("Location: ../controller/Logout.php");
  }  

  
?>

<html>
 <head>
    </head>
  <body style="background-color:">
    <fieldset>
    	<center>

    	<a href="../view/Homepage.php" style="text-align: center;"><img src="../model/Logo.PNG" width="700" height="260"></a>
    	<h3>"Our Hospital is no place to be sick!"</h3>
    	<p style="text-align:right"><span>Logged in as, Dr.<a href='../view/Portal.php'><?php echo $_SESSION['username']?></a><br><br>
      <span>|</span><a href='../view/AboutUs.php'>About Us</a><span>|</span>
      <a href='../view/ContactUs.php'> Contact Us </a><span>|</span>
      <a href='../view/ViewProfile.php'>View Profile</a><span>|</span>
      <a href='../controller/Logout.php'> logout </a><span>|</span>
    </p>
    	</center>
    </fieldset>
</center>
</body>
</html>

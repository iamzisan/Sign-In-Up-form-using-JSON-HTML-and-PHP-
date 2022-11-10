 
<?php
  require("../view/include/header2.php");
  
?>
<html>
<body>


<?php 
  include("../controller/ViewProfileAction.php");
?>


<center>
<fieldset>
<legend>View Profile</legend>
  <p>First Name        :   <?php echo $firstname ?></p>
  <p>Last Name        :   <?php echo $lastname ?></p>
  <p>Email        :   <?php echo $email ?></p>
  <p>Date of Birth :   <?php echo $dob ?></p>
</fieldset>
<br><br>
<img src="../model/7.jpg" width="700" height="260">

</center>
</body>
</html>

<?php
    require("../view/include/Footer.php")
?>
<?php
session_start();
$detail = file_get_contents('../model/user.json');
    $detailok = json_decode($detail);

    $isValid= false;

    foreach($detailok as $ok)
    {
        $username=$ok->username;
        $password=$ok->password;
    }


if (isset($_POST['username'])) {
	if ($_POST['username']==$username && $_POST['password']==$password)
	{
		$_SESSION['username'] = $username;

		header("location:../view/Portal.php");
	}
	else{
		$msg="username or password invalid";
		
	}

}

?>

<?php
	if(!empty($_POST["remember"]))
	{
		setcookie ("username",$_POST["username"],time()+ 120);
		setcookie ("password",$_POST["password"],time()+ 120);
		echo "Cookies Set Successfuly";
	}
	else
		{
			setcookie("username","");
			setcookie("password","");
			echo "Cookies Not Set";
		}

?>
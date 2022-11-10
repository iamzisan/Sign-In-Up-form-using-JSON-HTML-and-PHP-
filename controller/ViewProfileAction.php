<?php
    $firstname=$lastname=$dob=$gender=$email=$username="";
   

        
    
if (isset($_SESSION['username'])) {
    $detail = file_get_contents('../model/user.json');
    $detailok = json_decode($detail,true);
    foreach($detailok as $row)
    {
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $username = $row["username"];
        $email = $row["email"];
        $dob = $row["dob"];

    }
}
else{
    header("location:../view/Login.php");
}
?>
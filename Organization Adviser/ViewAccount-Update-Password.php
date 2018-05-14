<?php
include ('Connection.php');
session_start();

$oldpass = mysqli_real_escape_string($conn, $_POST['oldpass']);
$confirmpass = mysqli_real_escape_string($conn, $_POST['confirmpass']);

// HASHED OF OLD PASSWORD 
$salted = "rvbfdklfjklej323".$oldpass;
$OldPassW = hash('sha512',$salted);

// HASHED OF CONFIRM PASSWORD 
$salted = "rvbfdklfjklej323".$confirmpass;
$ConfirmPassW = hash('sha512',$salted);

$sqlSelect = "SELECT * FROM users where ID = '".$_SESSION['User']."' AND Password = '$OldPassW'";
$result = mysqli_query($conn,$sqlSelect);
if(mysqli_num_rows($result) > 0)
{
	 $sql = "UPDATE `users` SET `Password`='$ConfirmPassW' WHERE `ID` ='".$_SESSION['User']."'"; 
	 if(mysqli_query($conn, $sql))   
	 {  
		 echo "Password Updated";
	 }  
	else
	{
		echo "Error Occured";
	}
}
else
{
	echo "Incorrect old password. Please try again";
}
 
?>

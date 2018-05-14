<?php
include ('Connection.php');


// SELECT SA ORGANIZATION HAHANAPIN YUNG NAME
$sqlSelectCheck = "SELECT * FROM users_has_organization where organization_ID ='".$_POST["organization"]."' 
and users_ID = '".$_POST["id"]."'";
$result = mysqli_query($conn,$sqlSelectCheck);
if(mysqli_num_rows($result) > 0)
{
	echo 'Already Added';
}
else
{
	$sqlInsertData = "INSERT INTO `users_has_organization`(`users_ID`, `organization_ID`, `users_position`) VALUES ('".$_POST["id"]."','".$_POST["organization"]."','Organization Adviser')";
	if(mysqli_query($conn, $sqlInsertData))   
	 {  

	 }  
	else
	{
		echo "Error Occured";
	}
}
 
?>

<?php
include ('../Connection.php');
$id = $_POST["id"];
if($_POST["status"] == "Active")
{
	 $sql = "UPDATE `users` SET `user_status`='Inactive' WHERE ID = '".$id."'";
	 if(mysqli_query($conn, $sql))
	 {
		 echo "Data Updated";
	 }
	else
	{
		echo "Error Occured";
	}
}
else
{
	 $sql = "UPDATE `users` SET `user_status`='Active' WHERE ID = '".$id."'";
	 if(mysqli_query($conn, $sql))
	 {
		 echo "Data Updated";
	 }
	else
	{
		echo "Error Occured";
	}
}
 ?>

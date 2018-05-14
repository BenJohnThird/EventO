<?php
include ('Connection.php');
$sql2 = "INSERT INTO `ap_schedule`(`ID`, `Activity`, `Starttime`, `Endtime`, `Person_Group`, `ap_id`) VALUES (NULL,'".$_POST["activity"]."','".$_POST["starttime"]."','".$_POST["endtime"]."','".$_POST["person"]."','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>
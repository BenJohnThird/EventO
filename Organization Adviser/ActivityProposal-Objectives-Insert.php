<?php
include ('Connection.php');
$sql2 = "INSERT INTO `ap_objectives`(`ID`, `Objectives`, `ap_id`,`events_id`) VALUES (NULL,'".$_POST["objectives"]."','','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>
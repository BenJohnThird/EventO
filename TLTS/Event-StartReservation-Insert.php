<?php
include ('../Connection.php');
$sql2 = "INSERT INTO `ap_reservation_main`(`ID`, `reservation_status`, `notes`, `ap_id`)
 VALUES (null,'Pending','','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}

$sqlUpdateEvent = "UPDATE `ActivityProposal` SET `ap_status`='Verified | Waiting for the event' WHERE ap_id = '".$_POST["id"]."'";
if(mysqli_query($conn, $sqlUpdateEvent))
	{

	}
	else
	{
		echo "Error Occured";
	}
?>

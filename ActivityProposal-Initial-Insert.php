<?php
include ('Connection.php');
session_start();
$sql2 = "INSERT INTO `activityproposal`(`ap_id`, `ap_status`, `student_org_adviser_idstudent_org_adviser`,`events_id`) VALUES (NULL,'".$_POST["status"]."','".$_SESSION['User']."','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}

$sqlAPUpdate = "UPDATE `events` SET `situation`='Pending Activity Proposal'  WHERE `id` = '".$_POST["id"]."'";
if(mysqli_query($conn, $sqlAPUpdate))
{

}
else
{
 echo "Error Occured";
}
?>

<?php
include ('Connection.php');
session_start();
$sql2 = "INSERT INTO `ap_committees`(`ID`, `Committee`, `Position`, `Stud_Emp_ID`, `ap_id`) VALUES
 (NULL,'".$_POST["committee"]."','".$_POST["position"]."','".$_POST["name"]."','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>	
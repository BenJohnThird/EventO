<?php
include ('Connection.php');
session_start();

// CHECK FIRST IF YOU'RE ALREADY ADDED IN THAT COMMITTEE
$sqlCheck =  "SELECT * FROM ap_committees 
where Committee = '".$_POST["committee"]."'
and ap_id = '".$_POST["id"]."' and idmbl_user_school_individual = '".$_POST["name"]."'";
$result = mysqli_query($conn, $sqlCheck);
if(mysqli_num_rows($result) > 0 )
{
	echo 'One person cannot be in the same committee';
}
else
{
	$sql2 = "INSERT INTO `ap_committees`(`ID`, `Committee`, `Position`, `Committees_Status`, `ap_id`, `idmbl_user_school_individual`) VALUES
 (NULL,'".$_POST["committee"]."','".$_POST["position"]."','Pending','".$_POST["id"]."','".$_POST["name"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
}
?>	
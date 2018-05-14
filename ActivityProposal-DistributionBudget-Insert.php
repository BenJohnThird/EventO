<?php
include ('Connection.php');
$sql2 = "INSERT INTO `ap_distributionbudget`(`ID`, `Committees`, `Distributor`, `Amount`, `Description`, `ap_id`)
VALUES (null,'".$_POST["committee"]."','".$_POST["distributor"]."','".$_POST["amount"]."','".$_POST["description"]."','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2) )
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>

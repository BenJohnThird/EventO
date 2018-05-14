<?php
include ('Connection.php');
$sql2 = "INSERT INTO `ap_consumption`(`ID`, `Committees`, `Price`, `Description`, `ap_financial_disbursement_ID`)
VALUES (null,'".$_POST["committee"]."','".$_POST["amount"]."','".$_POST["description"]."','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2) )
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>

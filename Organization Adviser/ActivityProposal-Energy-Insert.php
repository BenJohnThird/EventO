<?php
include ('Connection.php');
$sql2 = "INSERT INTO `ap_expenses`(`ID`, `Committees`, `Name`, `Pcs`, `Price`, `Description`, `ap_id`) VALUES
 (NULL,'Energy','".$_POST["name"]."','".$_POST["pcs"]."','".$_POST["price"]."','".$_POST["description"]."','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>
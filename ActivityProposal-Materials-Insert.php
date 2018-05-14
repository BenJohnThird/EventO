<?php
include ('Connection.php');
$sql2 = "INSERT INTO `ap_exp_materials`(`ID`, `Category`, `Name`, `Price`, `ap_id`) VALUES
 (NULL,'".$_POST["category"]."','".$_POST["name"]."','".$_POST["price"]."','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>

<?php
include ('Connection.php');
session_start();
$sqlSelect = "SELECT * FROM `physicalfaci-dept` WHERE `Request` = '".$_POST["sector"]."' and ap_reservation_main_ID = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sqlSelect);
if(mysqli_num_rows($result) > 0 )
{
	$sqlUpdate = "UPDATE `physicalfaci-dept` SET `Rate`='".$_POST["payment"]."',`Date`='".$_POST["date"]."',`physical_start`='".$_POST["start"]."',`physical_end`='".$_POST["end"]."',`Pcs`='".$_POST["pcs"]."',`users_ID`='".$_SESSION["User"]."'
		where Request = '".$_POST["sector"]."' AND ap_reservation_main_ID = '".$_POST["id"]."'";
	if(mysqli_query($conn, $sqlUpdate))
	{
		echo "Data Updated";
	}
	else
	{
		echo "Data not Updated";
	}

}
else
{
	$sql2 = "INSERT INTO `physicalfaci-dept`
	(`ID`, `Rate`, `Date`, `physical_start`, `physical_end`, `Pcs`, `Request`, `users_ID`, `ap_reservation_main_ID`)
	VALUES (null,'".$_POST["payment"]."','".$_POST["date"]."','".$_POST["start"]."','".$_POST["end"]."','".$_POST["pcs"]."',
	'".$_POST["sector"]."','".$_SESSION["User"]."','".$_POST["id"]."')";
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

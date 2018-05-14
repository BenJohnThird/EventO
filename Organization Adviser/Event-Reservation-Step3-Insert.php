<?php
include ('Connection.php');
session_start();
$sqlSelect = "SELECT * FROM `accounting-dept` WHERE ap_reservation_main_ID = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sqlSelect);
if(mysqli_num_rows($result) > 0 )
{
	$sqlUpdate = "UPDATE `accounting-dept` SET `Rate`='".$_POST["rate"]."',`Total`='".$_POST["total"]."',`Date` = '".$_POST["date"]."',`users_ID`='".$_SESSION["User"]."'  WHERE ap_reservation_main_ID = '".$_POST["id"]."'";
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
	$sql2 = "INSERT INTO `accounting-dept`(`ID`, `Rate`, `Total`, `Date`, `users_ID`, `ap_reservation_main_ID`) VALUES (null,'".$_POST["rate"]."','".$_POST["total"]."','".$_POST["date"]."','".$_SESSION["User"]."','".$_POST["id"]."')";
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

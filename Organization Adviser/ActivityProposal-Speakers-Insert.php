<?php
include ('Connection.php');
// escape variables for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$education = mysqli_real_escape_string($conn, $_POST['education']);
$experience = mysqli_real_escape_string($conn, $_POST['experience']);

$sql2 = "INSERT INTO `ap_guest`(`ID`, `Name`, `Position`, `Educ_Attainment`, `Exp_Train`, `ap_id`) VALUES
 (NULL,'$name','$position','$education','$experience','".$_POST["id"]."')";
if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}
?>

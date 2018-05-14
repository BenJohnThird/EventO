<?php
include ('Connection.php');
$id = $_POST["id"];
$Date= date('Y-m-d H:i:s');

 $sql = "UPDATE `activityproposal` SET `BudgetType`='".$_POST["checkboxbudget"]."',`TakenFrom` = '".$_POST["takenfrom"]."' WHERE `ap_id` = '".$_POST["id"]."'";
 if(mysqli_query($conn, $sql))
 {
	 echo "Data Updated";
 }
else
{
	echo "Error Occured";
}
 ?>

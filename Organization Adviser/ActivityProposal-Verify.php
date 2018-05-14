<?php
include ('../Connection.php');
$id = $_POST["id"];
 $sql = "UPDATE `activityproposal` SET `ap_status`='".$_POST["situation"]."' WHERE ap_id = '".$id."'";
 if(mysqli_query($conn, $sql))
 {
	 echo "Data Updated";
 }
else
{
	echo "Error Occured";
}
 ?>

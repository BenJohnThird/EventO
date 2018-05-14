<?php
include ('../Connection.php');
$id = $_POST["id"];
 $sql = "UPDATE `ap_reservation_main` SET `reservation_status`='".$_POST["situation"]."' WHERE ID = '".$id."'";
 if(mysqli_query($conn, $sql))
 {
	 echo "Data Updated";
 }
else
{
	echo "Error Occured";
}
 ?>

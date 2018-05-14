<?php
include ('../Connection.php');
$sqlUpdate = "UPDATE `ap_reservation_main` SET `notes`='".$_POST["notes"]."' where ID = '".$_POST["id"]."'";
if(mysqli_query($conn, $sqlUpdate))
{
	echo "Data Updated";
}
else
{
	echo "Data not Updated";
	}

?>

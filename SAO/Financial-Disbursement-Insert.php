<?php
include ('Connection.php');
$sqlUpdate = "UPDATE `ap_financial_disbursement` SET `ap_financial_disbursement_notes` 
='".$_POST["notes"]."',`ap_financial_disbursement_status`='".$_POST["status"]."' where ID = '".$_POST["id"]."'";
if(mysqli_query($conn, $sqlUpdate))
{
	echo "Data Updated";
}
else
{
	echo "Data not Updated";
	}

?>
<?php
include ('Connection.php');
// ADDING OF FINANCIAL DISBURSEMENT
$sql2 = "UPDATE `ap_financial_disbursement` SET `ap_financial_disbursement_status`='Verified' WHERE ap_id = '".$_POST["id"]."'";
	if(mysqli_query($conn, $sql2))
	{
		echo "Data Updated";
	}
	else
	{
		echo "Error Occured";
	}

?>

<?php
include ('Connection.php');
// ADDING OF FINANCIAL DISBURSEMENT
$sql2 = "UPDATE `ap_financial_report` SET `ap_financial_report_status`='Verified' WHERE ap_id = '".$_POST["id"]."'";
	if(mysqli_query($conn, $sql2))
	{
		echo "Data Updated";
	}
	else
	{
		echo "Error Occured";
	}

?>

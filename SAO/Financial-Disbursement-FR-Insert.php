<?php
include ('Connection.php');
$sqlUpdate = "UPDATE `ap_financial_report` SET `ap_financial_report_notes` ='".$_POST["notes"]."',`ap_financial_report_status`='".$_POST["status"]."'
where ap_financial_report.ID = '".$_POST["id"]."'";
if(mysqli_query($conn, $sqlUpdate))
{
	echo "Data Updated";
}
else
{
	echo "Data not Updated";
	}

?>
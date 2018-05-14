<?php
include ('Connection.php');
$sqlUpdate = "UPDATE `ap_financial_report` SET `ap_financial_report_notes` ='".$_POST["notes"]."' where ID = '".$_POST["id"]."'";
if(mysqli_query($conn, $sqlUpdate))
{
	echo "Data Updated";
}
else
{
	echo "Data not Updated";
	}

?>
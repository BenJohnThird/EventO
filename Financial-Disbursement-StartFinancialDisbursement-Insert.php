<?php
include ('Connection.php');
// ADDING OF FINANCIAL DISBURSEMENT
$sql2 = "INSERT INTO `ap_financial_disbursement`(`ID`, `ap_financial_disbursement_status`, `ap_financial_disbursement_notes`, `ap_id`)
 VALUES (null,'Pending','','".$_POST["id"]."')";
	if(mysqli_query($conn, $sql2))
	{
		echo "Data Added";
	}
	else
	{
		echo "Data not added";
	}

// CHANGING THE STATUS OF ACTIVITY PROPOSAL, SPECIFYING THAT IT IS NOW IN THE REPORT STATUS
$sqlUpdateEvent = "UPDATE `activityproposal` SET `ap_status`='Verified | Pending Financial Report/Status' WHERE ap_id = '".$_POST["id"]."'";
	if(mysqli_query($conn, $sqlUpdateEvent))
	{

	}
	else
	{
		echo "Error Occured - ActivityProposal";
	}
// ADDING OF FINANCIAL REPORT
$sqlAddFinancialReport = "INSERT INTO `ap_financial_report`(`ID`, `ap_financial_report_status`, `ap_financial_report_notes`, `ap_id`) VALUES (null,'Pending','','".$_POST["id"]."')";
	if(mysqli_query($conn, $sqlAddFinancialReport))
	{
		
	}
	else
	{
		echo "Error Occured - Financial Report";
	}
?>

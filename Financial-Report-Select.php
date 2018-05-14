<?php
include('Connection.php');
session_start();
//$sql = "SELECT * FROM events where course = 'BSIT' and situation = 'Verified' order by date";
$sql = "SELECT *,ap_financial_report.ID as 'Reserve',ap_financial_disbursement.ID as 'FD' FROM 
(((events INNER JOIN activityproposal ON events.id = activityproposal.events_id)
INNER JOIN ap_financial_disbursement ON ap_financial_disbursement.ap_id = activityproposal.ap_id)                 
INNER JOIN ap_financial_report ON ap_financial_report.ap_id = activityproposal.ap_id)
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."' group by title";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
	<thead>
			<tr>
				<th colspan = "5" class = "text-center">List of <kbd>Financial Report</kbd></th>
			</tr>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Place</th>
				<th>Status</th>
				<th>Function</th>
			</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		if($row["ap_financial_report_status"] == 'Returned')
		{
			$stat = 'danger';
		}
		elseif ($row["ap_financial_report_status"] == 'Pending')
		{
			$stat = 'info';
		}
		else
		{
			$stat = 'success';
		}
		echo '<tr class = "'.$stat.'">
						<td class = "user_id">' .$row["title"].'</td>
						<td class ="firstname" >'.substr($row["start"],0,10).'</td>
						<td class ="firstname" >'.$row["place"].'</td>
						<td class ="firstname" >'.$row["ap_financial_report_status"].'</td>
						<td>

							<a name = "btn_makeAP" id = "btn_viewAP" data-toggle="modal" data-target="#viewActivtyProposalForm"
							data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-info">
							<span class="glyphicon glyphicon-eye-open"></span> View Activity Proposal</a>
							<a id = "btn_viewFinancialReport" data-toggle="modal" data-target="#myModal"
							data-id5="'.$row["ap_id"].'" data-id6 ="'.$row["Reserve"].'" 
							data-id7 = "'.$row["FD"].'" class="btn btn-sm btn-primary">
							<span class="glyphicon glyphicon-pencil"></span> View Financial Report</a>
						</td>
			</tr>';
	}
}
else
{
	echo '<table class = "table">
	<thead>
		<tr>
			<th colspan = "3" class = "text-center">List of <kbd>Financial Reports</kbd></th>
		<tr>
	</thead>
	';
	echo '<tr>
					<td colspan = "3" class = "text-center"> No Financial Reports made yet </td>
				</tr>';
}
echo '</table>';
echo '</div>';
?>

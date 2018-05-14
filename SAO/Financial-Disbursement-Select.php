<?php
include('Connection.php');
session_start();
//$sql = "SELECT * FROM events where course = 'BSIT' and situation = 'Verified' order by date";
$sql = "SELECT ap_financial_disbursement_status,title,start,place,organization_name,activityproposal.ap_id,ap_reservation_main.ID as 'Reserve' FROM student_council
inner join events on student_council.idstudent_council = events.student_council_idstudent_council
inner join activityproposal on events.id = activityproposal.events_id
INNER JOIN ap_reservation_main ON ap_reservation_main.ap_id = activityproposal.ap_id
INNER JOIN ap_financial_disbursement ON ap_financial_disbursement.ap_id = activityproposal.ap_id
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id group by title";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
	<thead>
			<tr>
				<th colspan = "7" class = "text-center">List of <kbd>Financial Disbursement</kbd></th>
			</tr>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Place</th>
				<th>Organization</th>
				<th>Status</th>
				<th>Function</th>
			</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		if($row["ap_financial_disbursement_status"] == 'Returned')
		{
			$stat = 'danger';
		}
		elseif ($row["ap_financial_disbursement_status"] == 'Pending')
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
						<td>'.$row["organization_name"].'</td>
						<td class ="firstname" >'.$row["ap_financial_disbursement_status"].'</td>
						<td >

							<a name = "btn_makeAP" id = "btn_viewAP" data-toggle="modal" data-target="#viewActivtyProposalForm"
							data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-info">
							<span class="glyphicon glyphicon-eye-open"></span> View Activity Proposal</a>
							<a id = "btn_makeFinancialDisbursement" data-toggle="modal" data-target="#myModal"
							data-id5="'.$row["ap_id"].'" data-id6 ="'.$row["Reserve"].'" class="btn btn-sm btn-primary">
							<span class="glyphicon glyphicon-pencil"></span> Financial Disbursement</a>
							<a id = "btn_verifyDisbursement" data-id5="'.$row["ap_id"].'"class="btn btn-sm btn-success">
							<span class="glyphicon glyphicon-ok"></span> Verify</a>
						</td>
			</tr>';
	}
}
else
{
	echo '<table class = "table">
	<thead>
		<tr>
			<th colspan = "3" class = "text-center">List of <kbd>Financial Disbursement</kbd></th>
		<tr>
	</thead>
	';
	echo '<tr>
					<td colspan = "3" class = "text-center"> No Financial Disbursement	 made yet </td>
				</tr>';
}
echo '</table>';
echo '</div>';
?>

<?php
include('Connection.php');
session_start();

// SETTINGS
$record_per_page = 5;
$page = '';

if(isset($_POST["page"]))
{
	$page = $_POST["page"];
}
else
{
	$page = 1;
}

$start_from = ($page - 1) * $record_per_page;


//$sql = "SELECT * FROM events where course = 'BSIT' and situation = 'Verified' order by date";
$sql = "SELECT ap_financial_disbursement_status,title,start,place,organization_name
,ap_financial_report_status,activityproposal.ap_id,ap_financial_report.ID as 'Reserve',ap_financial_disbursement.ID as 'FD'
FROM student_council
inner join events on student_council.idstudent_council = events.student_council_idstudent_council
inner join activityproposal on events.id = activityproposal.events_id
INNER JOIN ap_reservation_main ON ap_reservation_main.ap_id = activityproposal.ap_id
INNER JOIN ap_financial_disbursement ON ap_financial_disbursement.ap_id = activityproposal.ap_id
INNER JOIN ap_financial_report ON ap_financial_report.ap_id = activityproposal.ap_id 
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id group by title
LIMIT $start_from,$record_per_page";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
	<thead>
			<tr>
				<th colspan = "6" class = "text-center">List of <kbd>Financial Report</kbd></th>
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
						<td>'.$row["organization_name"].'</td>
						<td class ="firstname" >'.$row["ap_financial_report_status"].'</td>
						<td>

							<a name = "btn_makeAP" id = "btn_viewAP" data-toggle="modal" data-target="#viewActivtyProposalForm"
							data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-info">
							<span class="glyphicon glyphicon-eye-open"></span> View Activity Proposal</a>
							<a id = "btn_viewFinancialReport" data-toggle="modal" data-target="#myModal"
							data-id5="'.$row["ap_id"].'" data-id6 ="'.$row["Reserve"].'"
							data-id7 = "'.$row["FD"].'" class="btn btn-sm btn-primary">
							<span class="glyphicon glyphicon-pencil"></span> View Financial Report</a>
							<a id = "btn_verifyFR" data-id5="'.$row["ap_id"].'"class="btn btn-sm btn-success">
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

$page_query = "SELECT ap_financial_disbursement_status,title,start,place,organization_name
,ap_financial_report_status,activityproposal.ap_id,ap_financial_report.ID as 'Reserve',ap_financial_disbursement.ID as 'FD'
FROM student_council
inner join events on student_council.idstudent_council = events.student_council_idstudent_council
inner join activityproposal on events.id = activityproposal.events_id
INNER JOIN ap_reservation_main ON ap_reservation_main.ap_id = activityproposal.ap_id
INNER JOIN ap_financial_disbursement ON ap_financial_disbursement.ap_id = activityproposal.ap_id
INNER JOIN ap_financial_report ON ap_financial_report.ap_id = activityproposal.ap_id 
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id group by title";
$page_result = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);
echo '<div class = "text-center">';
for($i = 1; $i <= $total_pages; $i++)
{
		echo'<button class = "pagination_link btn btn-default" id = "'.$i.'" style= "cursor:pointer; border:1px solid #ccc;">'.$i.'</button>';
}
echo '</div>';
?>

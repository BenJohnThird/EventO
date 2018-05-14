<?php
include('..//Connection.php');
session_start();

// SETTINGS
$record_per_page = 2;
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
$sql = "SELECT events.id,title,start,place,situation,organization_name,ap_status,ap_id FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
inner join activityproposal on events.id = activityproposal.events_id
where ap_status != 'Returned' LIMIT $start_from,$record_per_page";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<table class = "table">
	<thead>
			<tr>
				<th colspan = "6" class = "text-center">List of <kbd>Activity Proposals</kbd></th>
			</tr>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Place</th>
				<th>Organization</th>
				<th>Status</th>
				<th>Functions</th>
			</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		if($row["ap_status"] == 'Returned')
		{
			$stat = 'danger';
		}
		elseif ($row["ap_status"] == 'Pending')
		{
			$stat = 'info';
		}
		else
		{
			$stat = 'success';
		}
		echo '<tr class = "'.$stat.'">
					<td class = "user_id" data-idpass ="'.$row["ap_id"].'">' .$row["title"].'</td>
					<td class ="firstname" data-id1 = "'.$row["start"].'" >'.$row["start"].'</td>
					<td class ="lastname" data-column="emp_lastname" data-id2 = "'.$row["place"].'">'.$row["place"].'</td>
					<td>'.$row["organization_name"].'</td>
					<td class ="password" data-column="emp_password" data-id3 = "'.$row["ap_status"].'">'.$row["ap_status"].'</td>
					<td>
						<a id = "btn_viewAP" data-toggle="modal" data-target="#viewActivityProposalForm" data-id4="'.$row["ap_id"].'" class="btn btn-sm btn-info">
						<span class="glyphicon glyphicon-eye-open"></span> View Activity Proposal</a>
						<a id = "btn_verifyAP" data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-success">
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
			<th colspan = "6" class = "text-center">List of <kbd>Activity Proposals</kbd></th>
		<tr>
	</thead>
	';
	echo '<tr>
					<td colspan = "6" class = "text-center"> No verified events yet </td>
				</tr>';
}
echo '</table>';

$page_query = "SELECT events.id,title,start,place,situation,organization_name,ap_status,ap_id FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
inner join activityproposal on events.id = activityproposal.events_id
where ap_status != 'Returned'";
$page_result = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);
echo '<div class = "text-center">';
for($i = 1; $i <= $total_pages; $i++)
{
		echo'<button class = "pagination_link btn btn-default" id = "'.$i.'" data-id1="Activity Proposal" style= "cursor:pointer; border:1px solid #ccc;">'.$i.'</button>';
}
echo '</div>';


?>

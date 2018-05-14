<?php
include('Connection.php');
session_start();
//$sql = "SELECT * FROM events where course = 'BSIT' and situation = 'Verified' order by date";
$sql = "SELECT events.id,title,start,place,situation,organization_name,ap_status,ap_id FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
inner join activityproposal on events.id = activityproposal.events_id
where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."' and ap_status ='Verified'";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
	<thead>
			<tr>
				<th colspan = "6" class = "text-center">List of <kbd>Activity Proposal</kbd></th>
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

						<a name = "btn_makeAP" id = "btn_viewAP" data-toggle="modal" data-target="#viewActivtyProposalForm"
						data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-info">
						<span class="glyphicon glyphicon-eye-open"></span> View Activity Proposal</a>
						<a name = "btn_makeAP" id = "btn_startReservation"
						data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-pencil"></span> Start Making Reservation</a>
					</td>
			</tr>';
	}
}
else
{
	echo '<table class = "table">
	<thead>
		<tr>
			<th colspan = "6" class = "text-center">List of <kbd>Activity Proposal</kbd></th>
		<tr>
	</thead>
	';
	echo '<tr>
					<td colspan = "6" class = "text-center"> No Verified Events yet </td>
				</tr>';
}
echo '</table>';
echo '</div>';
?>

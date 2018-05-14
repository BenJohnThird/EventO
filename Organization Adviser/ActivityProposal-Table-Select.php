<?php
include('Connection.php');
session_start();
$output = '';
//$sql = "SELECT * FROM events where course = 'BSIT' and situation = 'Verified' order by date";
$sql = "SELECT events.id,title,start,place,situation,organization_name,ap_status,ap_id FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
inner join activityproposal on events.id = activityproposal.events_id
where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."' and ap_status != 'Returned'";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
	<thead>
			<tr>
				<th colspan = "8" class = "text-center">List of <kbd>Activity Proposals</kbd></th>
			</tr>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Place</th>
				<th>Organization</th>
				<th>Status</th>
				<th colspan = "3">Functions</th>
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
					<td colspan = "5">
						<a name = "btn_makeAP" id = "btn_makeAP" data-toggle="modal" data-target="#myModal" data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-plus-sign"></span> Make Activity Proposal</a>
						<a id = "btn_verifyAP" data-id5="'.$row["ap_id"].'"class="btn btn-sm btn-success">
						<span class="glyphicon glyphicon-ok"></span> Verify</a>
					</td>
			</tr>';
	}
	echo '<tr>
			<td colspan = "6" class = "text-center"><button name = "btn_popup" id ="btn_popup" style ="width:15%;" data-toggle="modal" data-target="#myModal">+</button></td>
		</tr>';
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
echo '</div>';
?>

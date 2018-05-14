<?php
include('Connection.php');
session_start();
$output = '';
//$sql = "SELECT * FROM events where course = 'BSIT' and situation = 'Verified' order by date";
$sql = "SELECT title,start,place,ap_status,ap_id FROM ((events INNER JOIN activityproposal ON events.id = activityproposal.events_id))
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."' and ap_status ='Returned'";
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
				<th>Status</th>
				<th>Functions</th>
			</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '<tr>
					<td class = "user_id" data-idpass ="'.$row["ap_id"].'">' .$row["title"].'</td>
					<td class ="firstname" data-id1 = "'.$row["start"].'" >'.$row["start"].'</td>
					<td class ="lastname" data-column="emp_lastname" data-id2 = "'.$row["place"].'">'.$row["place"].'</td>
					<td class ="password" data-column="emp_password" data-id3 = "'.$row["ap_status"].'">'.$row["ap_status"].'</td>
					<td>
						<a name = "btn_makeAP" id = "btn_makeAP" data-toggle="modal" data-target="#myModal"
						data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-plus-sign"></span> Make Activity Proposal</a>
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

?>

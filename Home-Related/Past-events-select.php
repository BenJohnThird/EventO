<?php
include('../Connection.php');
session_start();
$dateSql = date("Y-m-d H:i:s");
$sql = "SELECT title,start,place from events 
inner join activityproposal on events.id = activityproposal.events_id 
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."'
and ap_status = 'Verified | Waiting for the event' 
AND events.start < '".$dateSql."'";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
	<thead>
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Place</th>
	</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '<tr>
				<td>' .$row["title"].'</td>
				<td>'.$row["start"].'</td>
				<td>'.$row["place"].'</td>
			</tr>';
	}
}
else
{
	echo '<table class = "table">';
	echo '<tr>
					<td colspan = "6" class = "text-center"> No Upcoming Events yet </td>
				</tr>';
}
echo '</table>';
echo '</div>';
?>

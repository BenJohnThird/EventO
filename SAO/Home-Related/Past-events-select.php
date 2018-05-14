<?php
include('../Connection.php');
session_start();
$dateSql = date("Y-m-d H:i:s");
$sql = "SELECT * FROM organization inner join users_has_organization on 
users_has_organization.organization_ID = organization.ID 
inner join users on users_has_organization.users_ID = users.ID 
inner join events on users.ID = events.created
inner join activityproposal on events.id = activityproposal.events_id 
where organization.organization_adviser = '".$_SESSION['User']."'
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

<?php
include('Connection.php');
session_start();
$output = '';
//$sql = "SELECT * FROM events where course = 'BSIT' and situation = 'Verified' order by date";
$sql = "SELECT * FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
where  student_council.organization_ID = '".$_SESSION['OrgID']."' and situation = 'Verified' order by start";
// SELECT *, users.Department FROM events INNER JOIN users ON events.created = users.ID where users.Department = "BSN" and Situation = 'Verified' order by date
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
	<thead>
			<tr>
				<th colspan = "5" class = "text-center"><kbd>Verified</kbd> from Action Plan</th>
			</tr>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Place</th>
				<th>Functions</th>
			</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		if($row["situation"] == 'Returned')
		{
			$stat = 'danger';
		}
		elseif ($row["situation"] == 'Pending')
		{
			$stat = 'info';
		}
		else
		{
			$stat = 'success';
		}
		echo '<tr class = "'.$stat.'">
					<td class = "user_id" data-idpass ="'.$row["id"].'">' .$row["title"].'</td>
					<td class ="firstname" data-column="emp_firstname" data-id1 = "'.$row["start"].'" >'.$row["start"].'</td>
					<td class ="lastname" data-column="emp_lastname" data-id2 = "'.$row["place"].'">'.$row["place"].'</td>
					<td>
						<a id = "btn_view-top" data-toggle="modal" data-target="#actionPlanModal" data-id4="'.$row["id"].'" class="btn btn-sm btn-info">
						<span class="glyphicon glyphicon-eye-open"></span> View</a>
						<a name = "btn_startAP" id = "btn_startAP" data-id5="'.$row["id"].'" class="btn btn-sm btn-success">
						<span class="glyphicon glyphicon-plus-sign"></span> Start Activity Proposal</a>
					</td>
			</tr>';
	}
}
else
{
	echo '<table class = "table">
	<thead>
		<tr>
			<td colspan = "4" class = "text-center"><kbd>Verified</kbd> from Action Plan</td>
		<tr>
	</thead>
	';
	echo '<tr>
					<td colspan = "4" class = "text-center"> No verified events yet </td>
				</tr>';
}
echo '</table>';
echo '</div>';
?>

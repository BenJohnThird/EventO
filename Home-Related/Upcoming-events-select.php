<?php
include('../Connection.php');
session_start();
$dateSql = date("Y-m-d H:i:s");
$sql = "SELECT title,start,place from events 
inner join activityproposal on events.id = activityproposal.events_id 
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."'
and ap_status = 'Verified | Waiting for the event' 
AND events.start > '".$dateSql."'";
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
		<th>Status</th>
	</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		// DATE SUB
		// DATE TO GET THE DUE DATE
		$date = date_create(substr($row["start"],0,10));
		date_sub($date, date_interval_create_from_date_string('10 days'));
		$dueDate  = date_format($date, 'Y-m-d');
		// GET THE DATE TODAY AND ITS TIME CHECK 10 DAYS
		$dateToday = date_create(date("Y-m-d")); 
		date_add($dateToday, date_interval_create_from_date_string('10 days'));
		$dateCheck  = date_format($dateToday, 'Y-m-d'); 

		$date = date_create_from_format('Y-m-d H:i:s', $row["start"]);
		$dateReal =  date_format($date, 'F j,Y g:i a');
		// KAPAG YUNG DATE NGAYON + DUE DATE == DATEEVEN
		// KAPAG YUNG DUE DATE NG EVENT == +10 NGAYON
		if($dateCheck == $dueDate)
		{
			$stat = 'info';
			$text = 'Your Event is less than 10 Days <span class="glyphicon glyphicon glyphicon-time" aria-hidden="true"></span>';
		}
		elseif($dateCheck >= $dueDate)
		{
			$stat = 'warning';
			$text = 'Your Event is near <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>';
		}
		else
		{
			$stat = 'success';
		}
		echo '<tr class = "'.$stat.'">
					<td>' .$row["title"].'</td>
					<td>'.$dateReal.'</td>
					<td>'.$row["place"].'</td>
					<td>'.$text.'</td>
					<td></td>
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

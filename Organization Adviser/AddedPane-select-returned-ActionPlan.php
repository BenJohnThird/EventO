<?php
include('Connection.php');
session_start();
$output = '';
$sql = "SELECT events.id,title,start,place,situation,organization_name FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'
and situation = 'Returned' order by start";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<table class = "table">
	<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Place</th>
				<th>Organization</th>
				<th>Status</th>
				<th>Functions</th>
			</tr>';
	while($row = mysqli_fetch_array($result))
	{
		echo '<tr class = "danger">
					<td class = "user_id" data-idpass ="'.$row["id"].'">' .$row["title"].'</td>
					<td class ="firstname" data-column="emp_firstname">'.substr($row["start"],0,10).'</td>
					<td class ="lastname" data-column="emp_lastname" data-id2 = "'.$row["place"].'">'.$row["place"].'</td>
					<td>'.$row["organization_name"].'</td>
					<td class ="password" data-column="emp_password" data-id3 = "'.$row["situation"].'">'.$row["situation"].'</td>
					<td>
					<a id = "btn_view" data-toggle="modal" data-target="#myModal" data-id4="'.$row["id"].'" class="btn btn-sm btn-info">
					<span class="glyphicon glyphicon-eye-open"></span> View</a>
					<a id = "btn_edit" data-toggle="modal" data-target="#myModal" data-id5="'.$row["id"].'" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-pencil"></span> Edit</a>
					</td>
			</tr>';
	}
}
else
{
	echo '<table class = "table">
	<thead>
		<tr>
			<td colspan = "6" class = "text-center"><kbd>Returned</kbd> from Action Plan</td>
		<tr>
	</thead>
	';
	echo '<tr>
					<td colspan = "6" class = "text-center"> No returned events yet </td>
				</tr>';
}
echo '</table>';

?>

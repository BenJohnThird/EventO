<?php
include('../Connection.php');
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


//$sql = "SELECT * FROM events where course = 'BSIT' and situation != 'Returned' order by date,starttime";
$sql = "SELECT events.id,title,start,place,situation,organization_name FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
where situation = 'Returned' group by events.id ORDER BY start LIMIT $start_from,$record_per_page";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class="table-responsive">';
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
		if($row["situation"] == 'Returned')
		{
			$stat = 'danger';
			$btn = '';
		}
		elseif ($row["situation"] == 'Pending')
		{
			$stat = 'info';
			$btn = 'data-toggle="modal" data-target="#myModal"';
		}
		else
		{
			$stat = 'success';
			$btn = 'disabled';
		}
		echo '<tr class = "'.$stat.'">
					<td class = "user_id" data-idpass ="'.$row["id"].'">' .$row["title"].'</td>
					<td class ="firstname" data-column="emp_firstname" data-id1 = "'.$row["id"].'" >'.substr($row["start"], 0 ,10).'</td>
					<td class ="lastname" data-column="emp_lastname" data-id2 = "'.$row["place"].'">'.$row["place"].'</td>
					<td>'.$row["organization_name"].'</td>
					<td class ="password" data-column="emp_password" data-id3 = "'.$row["situation"].'">'.$row["situation"].'</td>
					<td>
					<a id = "btn_view" data-toggle="modal" data-target="#myModal" data-id4="'.$row["id"].'" class="btn btn-sm btn-info">
					<span class="glyphicon glyphicon-eye-open"></span> View</a>
					<a id = "btn_verify" '.$btn.' data-id6="'.$row["id"].'" class="btn btn-sm btn-success">
						<span class="glyphicon glyphicon-ok"></span> Verify</a>
					</td>
			</tr>';
	}
}
else
{
	echo '<tr>
					<td colspan = "6"> Data not Found </td>
				</tr>';
}
echo '</table>';
echo '</div>';

$page_query = "SELECT events.id,title,start,place,situation,organization_name FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
inner join organization on organization.ID = student_council.organization_ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
where situation = 'Returned' ORDER BY start";
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

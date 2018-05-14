<?php
include('Connection.php');
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


$sqlSelectOrganization = "SELECT * FROM organization LIMIT $start_from,$record_per_page";
$resultOrg = mysqli_query($conn,$sqlSelectOrganization);
echo '<table class = "table">
<thead>
<tr>
	<th>Organization Name</th>
	<th>Function</th>
</tr>
</thead>';
if(mysqli_num_rows($resultOrg) > 0 )
{
	while($rowOrg = mysqli_fetch_array($resultOrg))
	{
		echo '<tbody>
			<tr>
				<td>'.$rowOrg["organization_name"].'</td>
				<td>
					<button id = "btn_del-Organization" data-idunique = "'.$rowOrg["ID"].'" class = "btn btn-sm btn-danger"> Remove</button>
				</td>
			</tr>';
	}
	echo '<tr>
		<td>
			<input placeholder = "Organization name..." id = "organization_name" type = "text" class = "form-control" />
		</td>
		<td>
			<button type="button" id = "btn_add-Organization" class = "btn btn-sm btn-success"> Add</button>
		</td>
	</tr>';
}
else
{
	echo '<tbody>
		<tr>
			<td colspan = "2"> No Organization Added
			</td>
		</tr>
	</tbody>';
}
echo '</table>';

$page_query = "SELECT * FROM organization";
$page_result = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);
echo '<div class = "text-center">';
for($i = 1; $i <= $total_pages; $i++)
{
		echo'<button class = "pagination_link btn btn-default" data-id1 = "Organization" id = "'.$i.'" style= "cursor:pointer; border:1px solid #ccc;">'.$i.'</button>';
}
echo '</div>';
?>

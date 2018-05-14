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

$sqlSelectDepartment = "SELECT * FROM department 
where department_name != 'Maintenance'
and department_name != 'SAO'  
and department_name != 'Property'  
and department_name != 'TLTS' 
and department_name != 'Organization Adviser'
order by department_name LIMIT $start_from,$record_per_page";
$resultDep = mysqli_query($conn,$sqlSelectDepartment);
echo '<table class = "table">
<thead>
<tr>
	<th>Department Name</th>
	<th>Function</th>
</tr>
</thead>';
if(mysqli_num_rows($resultDep) > 0 )
{
	while($rowOrg = mysqli_fetch_array($resultDep))
	{
		echo '<tbody>
			<tr>
				<td>'.$rowOrg["department_name"].'</td>
				<td>
					<button  id = "btn_del-Department" data-idunique = "'.$rowOrg["ID"].'" class = "btn btn-sm btn-danger"> Remove</button>
				</td>
			</tr>';
	}
	echo '<tr>
		<td>
			<input placeholder = "Department name..." id = "department_name" type = "text" class = "form-control" />
		</td>
		<td>
			<button id = "btn_add-Department" class = "btn btn-sm btn-success"> Add</button>
		</td>
	</tr>';
}
else
{
	echo '<tbody>
		<tr>
			<td colspan = "2"> No Department Added
			</td>
		</tr>
	</tbody>';
}
echo '</table>';

$page_query = "SELECT * FROM department 
where department_name != 'Maintenance'
and department_name != 'SAO'  
and department_name != 'Property'  
and department_name != 'TLTS' 
and department_name != 'Organization Adviser'";
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

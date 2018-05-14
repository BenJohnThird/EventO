<?php
include('Connection.php');
session_start();
$output = '';
$sqlSelectOrganization = "SELECT * FROM organization";
$resultOrg = mysqli_query($conn,$sqlSelectOrganization);
if(mysqli_num_rows($resultOrg) > 0 )
{
	while($rowOrg = mysqli_fetch_array($resultOrg))
	{
		$sql = "SELECT * FROM `organization_has_department` WHERE `organization_ID` = '".$rowOrg["ID"]."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0 )
		{
			echo '<h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$rowOrg["organization_name"].'</h3>';
			echo '<div class="table-responsive">';
			echo '<table class = "table">

					<tr>
						<th>Department</th>
						<th>Function</th>
					</tr>';
			while($row = mysqli_fetch_array($result))
			{
				echo '
				<tbody>
					<tr>
							<td>';
							$sqlDepartment = "SELECT * FROM department 
								where department_name != 'Maintenance'
								and department_name != 'SAO'  
								and department_name != 'Property'  
								and department_name != 'TLTS' 
								and department_name != 'Organization Adviser'
								and ID = '".$row["department_ID"]."'
								order by department_name";
								$resultDepartment = mysqli_query($conn, $sqlDepartment);
								if(mysqli_num_rows($resultDepartment) > 0 )
								{
									while($rowDepartment = mysqli_fetch_array($resultDepartment))
									{
										echo $rowDepartment["department_name"];
									}
								} 
							echo'</td>
							<td>
								<button class = "btn btn-sm btn-danger">Remove </button>
							</td>
					</tr>	
					';
			}
			echo '
			<tr>
							<td>';
							$sqlDepartment = "SELECT * FROM department 
								where department_name != 'Maintenance'
								and department_name != 'SAO'  
								and department_name != 'Property'  
								and department_name != 'TLTS' 
								and department_name != 'Organization Adviser'
								order by department_name";
								$resultDepartment = mysqli_query($conn, $sqlDepartment);
								if(mysqli_num_rows($resultDepartment) > 0 )
								{
									echo '<p>
									<select id = "department-select'.$rowOrg["ID"].'" class = "form-control">
									<option value = "">Select Department here...</option>';
									while($row = mysqli_fetch_array($resultDepartment))
									{
										echo'
									<option value = "'.$row["ID"].'">'.$row["department_name"].'</option>';
									}
									echo '</select>
									</p>';
								}
							echo'</td>
							<td>
								<button id = "btn_add-OrgHasDept" data-id1 = "'.$rowOrg["ID"].'" class = "btn btn-sm btn-success">Add </button>
							</td>
					</tr>	
				</tbody>';
		}
		else
		{
			echo '<h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$rowOrg["organization_name"].'</h3>';
			echo '<table class = "table">
			<thead>
				<tr>
					<th>Department</th>
					<th>Function</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<tr>
							<td>';
							$sqlDepartment = "SELECT * FROM department 
								where department_name != 'Maintenance'
								and department_name != 'SAO'  
								and department_name != 'Property'  
								and department_name != 'TLTS' 
								and department_name != 'Organization Adviser'
								order by department_name";
								$resultDepartment = mysqli_query($conn, $sqlDepartment);
								if(mysqli_num_rows($resultDepartment) > 0 )
								{
									echo '<p>
									<select required id = "department-select'.$rowOrg["ID"].'" class = "form-control">
									<option value = "">Select Department here...</option>';
									while($row = mysqli_fetch_array($resultDepartment))
									{
										echo'
									<option value = "'.$row["ID"].'">'.$row["department_name"].'</option>';
									}
									echo '</select>
									</p>';
								}
							echo'</td>
							<td>
								<button id = "btn_add-OrgHasDept" data-id1 = "'.$rowOrg["ID"].'" class = "btn btn-sm btn-success">Add </button>
							</td>
					</tr>
				<tr>
			</tbody>';
		}
		echo '</table>';
		echo '</div>';
	}
}
else
{
	echo '<p>No organization listed</p>';
}
?>

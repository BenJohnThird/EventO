<?php
include ("Connection.php");

echo '<div>
<table class ="table table-responsive">';
// SEARCH AND PUT IT INTO ID
$sqlUser = "SELECT ID,Username FROM users where Username = '".$_POST["username"]."'";
$resultUser = mysqli_query($conn, $sqlUser);
if(mysqli_num_rows($resultUser) > 0 )
{
	echo '
		<thead>
		<th>Organization</th>
		<th>Function</th>
		</thead>
		';
	while($rowSelect = mysqli_fetch_array($resultUser))
	{

		// DITO, ANG KNUHA IS YUNG ID NIYA AS USER
		// DAPAT KUKUNIN NATIN AY YUNG ID AS ORG ADVISER
		$orgID = 0;
		$sqlCheck = "SELECT idorg_adviser from org_adviser where users_ID  = '".$rowSelect["ID"]."'";
		$resultCheck = mysqli_query($conn,$sqlCheck);
		if(mysqli_num_rows($resultCheck) > 0)
		{
			while($rowCheck = mysqli_fetch_array($resultCheck))
			{
				$orgID = $rowCheck["idorg_adviser"];
			}
		}
		// IPAPASOK SA TABLE ORGANIZATION YUNG UNIQUE ID PARA MACHECK
		$sqlUserCheck = "SELECT * FROM organization where org_adviser_id = '$orgID'";
		$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
		if(mysqli_num_rows($resultUserCheck) > 0 )
		{
			while($rowSelectCheck = mysqli_fetch_array($resultUserCheck))
			{
				echo '<tbody>
					<tr>
						<td>'.$rowSelectCheck["organization_name"].'</td>
						<td>
							<button type="button" class = "btn btn-danger" data-iddel = "'.$rowSelectCheck["ID"].'" id = "btn_del-Organization">Remove </button>
						</td>
					</tr>';
			}
			echo '<tr>
				<td>';
					$sqlOrganization = "SELECT * FROM organization order by organization_name";
					$resultOrganization = mysqli_query($conn, $sqlOrganization);
					if(mysqli_num_rows($resultOrganization) > 0 )
					{
						echo '<p>
						<select required name = "organization" id = "organization" class = "input-txt">
						<option>Select Organization here...</option>';
						while($row = mysqli_fetch_array($resultOrganization))
						{
							echo'
						<option value = "'.$row["ID"].'">'.$row["organization_name"].'</option>';
						}
						echo '</select>
						</p>';
					}
			echo'</td>
				<td>
					<button type="button" class = "btn btn-success" data-id1 = "'.$rowSelect["ID"].'" id = "btn_add-Organization">Add </button>
				</td>
			</tr>
			</tbody>';
		}
		else
		{
			echo '<tbody>
			<tr>
				<td>';
					$sqlOrganization = "SELECT * FROM organization order by organization_name";
					$resultOrganization = mysqli_query($conn, $sqlOrganization);
					if(mysqli_num_rows($resultOrganization) > 0 )
					{
						echo '<p>
						<select required name = "organization" id = "organization" class = "input-txt">
						<option>Select Organization here...</option>';
						while($row = mysqli_fetch_array($resultOrganization))
						{
							echo'
						<option value = "'.$row["ID"].'">'.$row["organization_name"].'</option>';
						}
						echo '</select>
						</p>';
					}
			echo'</td>
				<td>
					<button type="button" class = "btn btn-success" data-id1 = "'.$rowSelect["ID"].'" id = "btn_add-Organization">Add </button>
				</td>
			</tr>
			</tbody>';
		}
		echo '</table>
		</div>';
	}
}



?>
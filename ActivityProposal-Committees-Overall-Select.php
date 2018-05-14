<?php
include('Connection.php');
$output = '';
$sql = "SELECT * FROM ap_committees where Committee LIKE 'Overall%' and ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Overall</kbd> Working Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">';

					$sqlshow = "SELECT * FROM `mbl_user_school_individual` WHERE `mobile_users_id` = '".$row["idmbl_user_school_individual"]."'";
					$resultUser = mysqli_query($conn, $sqlshow);
					if(mysqli_num_rows($resultUser) > 0 )
					{
						while($rowUser = mysqli_fetch_array($resultUser))
						{
							//echo "$rowUser["Lastname"].",".$rowUser["Firstname"];	
							echo $rowUser["Lastname"] ."," .  $rowUser["Firstname"];
						}
					}
					echo '</td>
					<td>
					<button name = "btn_del-Committees-Overall" id ="btn_del-Committees-Overall" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
			<td>
					<select class="form-control" id="committees-overall-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Faculty</option>
					    <option>Co-Faculty</option>
					</select>
				</td>
				<td>
					<select class = "form-control" id = "committees-overall-person">';
						include ("Connection.php");
						session_start();
						$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join student_council on student_council.organization_ID = organization.ID
						where student_council.organization_ID = '".$_SESSION['OrgID']."' group by mobile_users.mobile_users_id";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"].",".$rowCommittees["Firstname"].",".$rowCommittees["Middlename"].'
							</option>';
							}
						}
						else
						{
							echo '
								<option>Ben
							</option>';
						}
					echo'
					</select>
				</td>
				<td><button name = "btn_add-Committees-Overall" id ="btn_add-Committees-Overall" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Overall</kbd> Working Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td>
					<select class="form-control" id="committees-overall-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Faculty</option>
					    <option>Co-Faculty</option>
					</select>
				</td>
				<td>
					<select class = "form-control" id = "committees-overall-person">';
						include ("Connection.php");
						session_start();
						$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join student_council on student_council.organization_ID = organization.ID
						where student_council.organization_ID = '".$_SESSION['OrgID']."' group by mobile_users.mobile_users_id";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"].",".$rowCommittees["Firstname"].",".$rowCommittees["Middlename"].'
							</option>';
							}
						}
						else
						{
							echo '
								<option>Ben
							</option>';
						}
					echo'
					</select>
				</td>
				<td><button name = "btn_add-Committees-Overall" id ="btn_add-Committees-Overall" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
	
?>
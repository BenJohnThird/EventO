<?php
include('Connection.php');
session_start();
$sql = "SELECT * FROM ap_committees where Committee LIKE 'Food%' and ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Food/Refreshment</kbd>Committees</th>
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
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-Food" id ="btn_del-Committees-Food" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-food-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-food-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Food" id ="btn_add-Committees-Food" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Food/Refreshment</kbd>Committees</th>
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
					<select class="form-control" id="committees-food-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-food-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Food" id ="btn_add-Committees-Food" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
// REGISTRATION AND ACCOM
$sqlReg = "SELECT * FROM ap_committees where Committee LIKE 'Registration%' and ap_id = '".$_POST["id"]."'";
$resultReg = mysqli_query($conn, $sqlReg);
if(mysqli_num_rows($resultReg) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Registration & Accomodation</kbd>Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultReg))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-Registration" id ="btn_del-Committees-Registration" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-registration-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-registration-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Registration" id ="btn_add-Committees-Registration" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Registration & Accomodation</kbd>Committees</th>
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
					<select class="form-control" id="committees-registration-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-registration-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Registration" id ="btn_add-Committees-Registration" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
// PROGRAM AND INVITATION
$sqlProgram = "SELECT * FROM ap_committees where Committee LIKE 'Program%' and ap_id = '".$_POST["id"]."'";
$resultProgram = mysqli_query($conn, $sqlReg);
if(mysqli_num_rows($resultProgram) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Program and Invitation</kbd>Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultProgram))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-Program" id ="btn_del-Committees-Program" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-program-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-program-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Program" id ="btn_add-Committees-Program" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Program and Invitation</kbd>Committees</th>
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
					<select class="form-control" id="committees-program-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-program-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Program" id ="btn_add-Committees-Program" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
// DOCUMENTATION
$sqlDocumentation = "SELECT * FROM ap_committees where Committee LIKE 'Documentation%' and ap_id = '".$_POST["id"]."'";
$resultDocumentation = mysqli_query($conn, $sqlDocumentation);
if(mysqli_num_rows($resultDocumentation) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Documentation</kbd>Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultDocumentation))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-Documentation" id ="btn_del-Committees-Documentation" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-documentation-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-documentation-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Documentation" id ="btn_add-Committees-Documentation" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Documentation</kbd>Committees</th>
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
					<select class="form-control" id="committees-documentation-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-documentation-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Documentation" id ="btn_add-Committees-Documentation" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';	
// CERTIFICATES
$sqlCertificates = "SELECT * FROM ap_committees where Committee LIKE 'Certificates%' and ap_id = '".$_POST["id"]."'";
$resultCertificates = mysqli_query($conn, $sqlCertificates);
if(mysqli_num_rows($resultCertificates) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Certificates</kbd>Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultCertificates))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-Certificates" id ="btn_del-Committees-Certificates" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-certificates-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-certificates-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Documentation" id ="btn_add-Committees-Documentation" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Certificates</kbd>Committees</th>
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
					<select class="form-control" id="committees-certificates-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-certificates-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Certificates" id ="btn_add-Committees-Certificates" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
// PHYSICAL FACI
$sqlPhysicalFaci = "SELECT * FROM ap_committees where Committee LIKE 'PhysicalFaci%' and ap_id = '".$_POST["id"]."'";
$resultPhysicalFaci = mysqli_query($conn, $sqlPhysicalFaci);
if(mysqli_num_rows($resultPhysicalFaci) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Physical Plant and Facilities</kbd>Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultPhysicalFaci))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-PhysicalFaci" id ="btn_del-Committees-PhysicalFaci" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-physicalfaci-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-physicalfaci-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-PhysicalFaci" id ="btn_add-Committees-PhysicalFaci" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Physical Plant and Facilities</kbd>Committees</th>
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
					<select class="form-control" id="committees-physicalfaci-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-physicalfaci-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-PhysicalFaci" id ="btn_add-Committees-PhysicalFaci" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
// PEACE AND ORDER
$sqlPeaceOrder = "SELECT * FROM ap_committees where Committee LIKE 'PeaceOrder%' and ap_id = '".$_POST["id"]."'";
$resultPeaceOrder = mysqli_query($conn, $sqlPeaceOrder);
if(mysqli_num_rows($resultPeaceOrder) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Peace and Order</kbd>Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultPeaceOrder))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-PeaceOrder" id ="btn_del-Committees-PeaceOrder" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-peaceorder-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-peaceorder-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-PeaceOrder" id ="btn_add-Committees-PeaceOrder" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Peace and Order</kbd>Committees</th>
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
					<select class="form-control" id="committees-peaceorder-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-peaceorder-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-PeaceOrder" id ="btn_add-Committees-PeaceOrder" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
// EVALUATION
$sqlEvaluation = "SELECT * FROM ap_committees where Committee LIKE 'Evaluation%' and ap_id = '".$_POST["id"]."'";
$resultEvaluation = mysqli_query($conn, $sqlEvaluation);
if(mysqli_num_rows($resultPeaceOrder) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Evaluation</kbd>Committees</th>
			</tr>
			<tr>
				<th>Position</th>
				<th>Student/Faculty</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultEvaluation))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["idmbl_user_school_individual"].'</td>
					<td>
					<button name = "btn_del-Committees-Evaluation" id ="btn_del-Committees-Evaluation" data-idunique = "'.$row["ID"].'">Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td>
					<select class="form-control" id="committees-evaluation-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-evaluation-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Evaluation" id ="btn_add-Committees-Evaluation" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center"><kbd>Evaluation</kbd>Committees</th>
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
					<select class="form-control" id="committees-evaluation-position">
					    <option>Chairman</option>
					    <option>Co-Chairman</option>
					    <option>Member</option>
					</select>
				</td>
				<td>
					<select class="form-control" id="committees-evaluation-person">
					    ';
					    	$sqlSelectCommittees = "SELECT mobile_users.mobile_users_id,mbl_user_school_individual.Lastname,mbl_user_school_individual.Firstname,mbl_user_school_individual.Middlename from mobile_users 
						inner join mbl_user_school_individual on mbl_user_school_individual.mobile_users_id = mobile_users.mobile_users_id 
						inner join department on mbl_user_school_individual.department_ID = department.ID
						inner join organization_has_department on organization_has_department.department_ID = department.ID
						inner join organization on organization.ID = organization_has_department.organization_ID
						inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
						where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'";
						$resultCommittees = mysqli_query($conn, $sqlSelectCommittees);
						if(mysqli_num_rows($resultCommittees) > 0 )
						{
							while($rowCommittees = mysqli_fetch_array($resultCommittees))
							{
								echo '
								<option value = "'.$rowCommittees["mobile_users_id"].'">
								'.$rowCommittees["Lastname"]." ,".$rowCommittees["Firstname"]." ,".$rowCommittees["Middlename"].'
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
				<td><button name = "btn_add-Committees-Evaluation" id ="btn_add-Committees-Evaluation" data-id6 = "'.$_POST["id"].'">Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
?>
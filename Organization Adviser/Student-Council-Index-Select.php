<?php
include('Connection.php');
session_start();
$output = '';
$sql = "SELECT users.user_status,users.Username,student_council.Lastname,
student_council.Firstname,student_council.Middlename,organization.organization_name
,users.ID as 'CouncilID' FROM organization 
INNER JOIN org_adviser on organization.org_adviser_id = org_adviser.idorg_adviser
inner join student_council on student_council.organization_ID = organization.ID
inner join users on users.ID = student_council.users_ID 
where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."' order by student_council.Lastname";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class="table-responsive">';
	echo '<table class = "table">

			<tr>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Organization</th>	
				<th>Function</th>
			</tr>';
	while($row = mysqli_fetch_array($result))
	{
		if($row["user_status"] == 'Active')
		{
			$stat = 'btn-success';
			$btnWords = ' Active';
		}
		else
		{
			$stat = 'btn-danger';
			$btnWords = ' Inactive';
		}
		echo '<tr>
					<td class = "user_id" data-idpass ="'.$row["Username"].'">' .$row["Lastname"].'</td>
					<td class ="firstname" data-column="emp_firstname" >'.$row["Firstname"].'</td>
					<td>'.$row["Middlename"].'</td>
					<td>'.$row["organization_name"].'</td>
					<td>
					<a id = "btn_verifyCouncil" data-idcouncil = "'.$row["CouncilID"].'" data-idstatus = "'.$row["user_status"].'" class="btn btn-sm '.$stat.'">
						<span class="glyphicon glyphicon-ok"></span>'.$btnWords.'</a>
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
?>

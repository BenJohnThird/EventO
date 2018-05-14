<?php
session_start();
include ('../Connection.php');
$id = $_POST["id"];
$Date= date('Y-m-d H:i:s');

 $sql = "UPDATE `events` SET `situation`='".$_POST["situation"]."',`color` = '#FF8C00' WHERE id = '".$id."'";
 if(mysqli_query($conn, $sql))
 {
	 echo "Data Updated";
 }
else
{
	echo "Error Occured";
}
$organization = "";
$sqlOrganization = "SELECT organization.organization_name FROM organization 
inner join student_council on student_council.organization_ID = organization.ID
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
where events.id = '$id'";
$resultOrganization = mysqli_query($conn, $sqlOrganization);
if(mysqli_num_rows($resultOrganization) > 0 )
{
	while($rowOrg = mysqli_fetch_array($resultOrganization))
	{
		$organization = $rowOrg["organization_name"];
	}
}

$sqlActionPlan = "SELECT title from events WHERE id = '".$id."'";
$resultActionPlan = mysqli_query($conn, $sqlActionPlan);
if(mysqli_num_rows($resultActionPlan) > 0 )
{
	while($row = mysqli_fetch_array($resultActionPlan))
	{
		$sqlHistory = "INSERT INTO `history`(`id`, `Function`, `Time`, `users_ID`, `organization`, `status`)
 		VALUES (null,'Verified ".$row["title"]."','$Date','".$_SESSION["User"]."','$organization',0)";
 		 if(mysqli_query($conn, $sqlHistory))
		 {
		 }
		else
		{
			echo "History Error Occured";
		}
	}
}

 ?>

<?php
include ('../Connection.php');

//ORGANIZATION
if($_POST["part"] == "Organization")
{
	$organization = mysqli_real_escape_string($conn, $_POST['name']);
	$sqlOrganization = "SELECT * FROM organization where organization_name = '$organization'";
	$result = mysqli_query($conn,$sqlOrganization);
	if(mysqli_num_rows($result) > 0)
	{
		echo 'Already Added';
	}
	else
	{
		$sqlInsert = "INSERT INTO `organization`(`ID`, `organization_name`, `organization_adviser`, `organization_objectives`) VALUES (null,'$organization','','')";
		if(mysqli_query($conn, $sqlInsert))   
		 {  
			 echo "Organization Added";
		 }  
		else
		{
			echo "Error Occured";
		}
	}

}
//ORGANIZATION
if($_POST["part"] == "Department")
{
	$department = mysqli_real_escape_string($conn, $_POST['name']);
	$sqlDepartment = "SELECT * FROM department where department_name = '$department'";
	$result = mysqli_query($conn,$sqlDepartment);
	if(mysqli_num_rows($result) > 0)
	{
		echo 'Already Added';
	}
	else
	{
		$sqlInsert = "INSERT INTO `department`(`ID`, `department_name`) VALUES (null,'$department')";
		if(mysqli_query($conn, $sqlInsert))   
		 {  
			 echo "Department Added";
		 }  
		else
		{
			echo "Error Occured";
		}
	}

}
 
 if($_POST["part"] == "OrgHasDept")
{
	$department = mysqli_real_escape_string($conn, $_POST['name']);
	$sqlOrgHasDept = "SELECT * FROM `organization_has_department` where department_ID = '$department' and organization_ID = '".$_POST["org"]."'";
		$result = mysqli_query($conn,$sqlOrgHasDept);
		if(mysqli_num_rows($result) > 0)
		{
			echo 'Already Added';
		}
		else
		{
		$sqlInsert = "INSERT INTO `organization_has_department`(`organization_ID`, `department_ID`) VALUES ('".$_POST["org"]."','$department')";
		if(mysqli_query($conn, $sqlInsert))   
		 {  
			 echo "Record Added";
		 }  
		else
		{
			echo "Error Occured";
		}
	}

}

?>

<?php
include ('../Connection.php');

//ORGANIZATION
if($_POST["part"] == "Organization")
{
	$sqlDelete = "DELETE FROM `organization` WHERE ID = '".$_POST["id"]."'";
	if(mysqli_query($conn, $sqlDelete))   
	 {  
		 echo "Organization Deleted";
	 }  
	else
	{
		echo "Error Occured";
	}
}
//ORGANIZATION
if($_POST["part"] == "Department")
{
	$sqlDelete = "DELETE FROM `department` WHERE ID =  '".$_POST["id"]."'";
	if(mysqli_query($conn, $sqlDelete))   
	 {  
		 echo "Department Deleted";
	 }  
	else
	{
		echo "Error Occured";
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

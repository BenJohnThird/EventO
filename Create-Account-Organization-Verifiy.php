<?php
include ('Connection.php');

// DITO, ANG KNUHA IS YUNG ID NIYA AS USER
// DAPAT KUKUNIN NATIN AY YUNG ID AS ORG ADVISER
$orgID = 0;
$sqlCheck = "SELECT idorg_adviser from org_adviser where users_ID  = '".$_POST["id"]."'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck) > 0)
{
	while($rowCheck = mysqli_fetch_array($resultCheck))
	{
		$orgID = $rowCheck["idorg_adviser"];
	}
}
// SELECT SA ORGANIZATION HAHANAPIN YUNG NAME
$sqlSelectOrg = "SELECT * FROM organization where ID ='".$_POST["organization"]."'";
$result = mysqli_query($conn,$sqlSelectOrg);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
		// KAPAG WALA PANG LAMAN YUNG ORG, MAG UUPDATE
		if($row["org_adviser_id"] == "")
		{
			$sqlUpdate = "UPDATE `organization` SET org_adviser_id = '$orgID' where ID ='".$_POST["organization"]."'";
			if(mysqli_query($conn, $sqlUpdate))   
			 {  
				 echo "Organization Added";
			 }  
			else
			{
				echo "Error Occured";
			}
		}
		// KAPAG MAY LAMAN NA
		else
		{
			echo 'Organization has now a Organization Adviser';
		}
	}
}
else
{
	echo "The organization selected is not in database";
}
 
?>

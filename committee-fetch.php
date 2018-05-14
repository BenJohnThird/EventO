<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "ceu");
$request = mysqli_real_escape_string($connect, $_POST["query"]);


$query = "SELECT * FROM events WHERE title LIKE '%".$request."%'";
// $query = "SELECT * from mobile_users inner join department on mobile_users.department_ID = department.ID
// inner join organization_has_department on organization_has_department.department_ID = department.ID
// inner join organization on organization_has_department.organization_ID = organization.ID 
// where Lastname  LIKE '%".$request."%' AND organization_has_department.organization_ID = '". $_SESSION['OrganizationInWords']."'";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["title"];
 }
 echo json_encode($data);
}
else
{
	 echo json_encode('');
}


?>

<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "ceu");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "";

	$query = "SELECT title FROM organization 
			inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
			inner join student_council on student_council.organization_ID = organization.ID
			inner join users on users.ID = student_council.users_ID
			inner join events on events.student_council_idstudent_council = student_council.idstudent_council
			where title LIKE '%".$request."%' 
			AND org_adviser.users_ID = '".$_SESSION['User']."' group by title";

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

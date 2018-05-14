<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "ceu");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "";

	$query = "SELECT title FROM `student_council`
			inner join events on events.student_council_idstudent_council = student_council.idstudent_council
			where title LIKE '%".$request."%'
			AND student_council.organization_ID = '".$_SESSION['OrgID']."' group by title";

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

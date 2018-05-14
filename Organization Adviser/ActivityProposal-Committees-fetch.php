<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "ceu");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "";
if($_SESSION['Position'] == 'SAO')
{
  $query = "SELECT * FROM events WHERE title LIKE '%".$request."%'";
}
else
{
  $query = "SELECT * FROM users where Lastname LIKE '%".$request."%' OR Middlename LIKE '%".$request."%' 
  OR Firstname LIKE '%".$request."%'";
}
$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["Lastname"];
 }
 echo json_encode($data);
}
else
{
   echo json_encode('');
}


?>

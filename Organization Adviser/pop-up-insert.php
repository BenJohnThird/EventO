<?php
include ('Connection.php');
session_start();
$Date= date('Y-m-d H:i:s');
// CHECK WITH THE SAME TITLE WITHIN THE COURSE
//$sql = "SELECT * FROM events where course = 'BSIT' and title = '".$_POST["title"]."'";
$sql = "SELECT *, users.Organization FROM events INNER JOIN users ON events.created = users.ID 
where users.Organization = '".$_SESSION['Organization']."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0)
{
	// CHECK THE SAME PLACE
	$sqlDate = "SELECT * FROM events where place = '".$_POST["place"]."'";
	$resultDate = mysqli_query($conn,$sqlDate);
	if(mysqli_num_rows($resultDate) > 0)
	{
		// IF TIME IS TAKEN BY OTHER EVENT ON THE SAME PLACE
		$sqlDateTime = "SELECT * FROM events where (`start` BETWEEN '".$_POST["start"]."' AND '".$_POST["end"]."') OR (`end` BETWEEN '".$_POST["start"]."' AND '".$_POST["end"]."')";
		$resultDateTime = mysqli_query($conn,$sqlDateTime);
		if(mysqli_num_rows($resultDateTime) > 0)
		{
			echo "Data not added, Time was used already by another event";
		}
		else
		{
			$sql2 = "INSERT INTO `events` (`id`, `title`, `place`, `start`, `end`,  `situation`, `sy`, `notes`, `created`,`proponent`) VALUES (NULL,'".$_POST["title"]."','".$_POST["place"]."','".$_POST["start"]."','".$_POST["end"]."','Pending','2017-2018','".$_POST["notes"]."','".$_SESSION['User']."','".$_POST["proponent"]."')";
				if(mysqli_query($conn, $sql2))
				{
					echo "Data Added";
				}
				else
				{
					echo "Data not added";
				}
		}
	}
	else
	{
		$sql2 = "INSERT INTO `events` (`id`, `title`,`place`, `start`, `end`,  `situation`, `sy`, `notes`, `created`,`proponent`) VALUES (NULL,'".$_POST["title"]."','".$_POST["place"]."','".$_POST["start"]."','".$_POST["end"]."','Pending','2017-2018','".$_POST["notes"]."','".$_SESSION['User']."','".$_POST["proponent"]."')";
				if(mysqli_query($conn, $sql2))
				{
					echo "Data Added";
				}
				else
				{
					echo "Data not added";
				}
	}
}
?>


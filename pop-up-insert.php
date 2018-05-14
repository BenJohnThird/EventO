<?php
include ('Connection.php');
session_start();
$Date= date('Y-m-d H:i:s');
// CHECK WITH THE SAME TITLE WITHIN THE COURSE
//$sql = "SELECT * FROM events where course = 'BSIT' and title = '".$_POST["title"]."'";
$sql = "SELECT id,title,color,start,end,proponent,situation,place,semester,notes FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
where  student_council.organization_ID = '".$_SESSION['OrgID']."'";
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
			$sql2 = "INSERT INTO `events` (`id`, `title`, `place`, `start`, `end`,  `situation`, `notes`, `student_council_idstudent_council`,`proponent`,`semester`) VALUES (NULL,'".$_POST["title"]."','".$_POST["place"]."','".$_POST["start"]."','".$_POST["end"]."','Pending','".$_POST["notes"]."','".$_SESSION['UniversalID']."','".$_POST["proponent"]."','".$_POST["sy"]."')";
				if(mysqli_query($conn, $sql2))
				{
					echo "Data Added";
				}
				else
				{
					echo "Data not added reed";
				}
		}
	}
	else
	{
		$sql2 = "INSERT INTO `events` (`id`, `title`,`place`, `start`, `end`,  `situation`, `notes`, `student_council_idstudent_council`,`proponent`,`semester`) VALUES (NULL,'".$_POST["title"]."','".$_POST["place"]."','".$_POST["start"]."','".$_POST["end"]."','Pending','".$_POST["notes"]."','".$_SESSION['UniversalID']."','".$_POST["proponent"]."','".$_POST["sy"]."')";
				if(mysqli_query($conn, $sql2))
				{
					echo "Data Added";
				}
				else
				{
					echo "Data not added blue";
				}
	}
}
?>


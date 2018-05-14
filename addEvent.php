<?php

// Connexion à la base de données
require_once('bdd.php');
include('Connection.php');
session_start();
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$place = $_POST['place'];
	$notes = $_POST['notes'];
	$proponent = $_POST['proponent'];
	$semester = $_POST['semester'];

	// CHECK THE SAME PLACE
	$sqlDate = "SELECT * FROM events where place = '$place'";
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
			$sql2 = "INSERT INTO `events` (`id`, `title`, `place`, `start`, `end`,  `situation`, `notes`, `student_council_idstudent_council`,`proponent`,`semester`) VALUES (NULL,'$title','$place','$start','$end','Pending','$notes','".$_SESSION['UniversalID']."','$proponent','$semester')";
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
		$sql2 = "INSERT INTO `events` (`id`, `title`, `place`, `start`, `end`,  `situation`, `notes`, `student_council_idstudent_council`,`proponent`,`semester`) VALUES (NULL,'$title','$place','$start','$end','Pending','$notes','".$_SESSION['UniversalID']."','$proponent','$semester')";
				if(mysqli_query($conn, $sql2))
				{
					echo "Data Added";
				}
				else
				{
					echo "Data not added reed";
				}
	}
	// $sql = "INSERT INTO events(title, start, end, color, created, place, notes, proponent, situation, semester) values ('$title', '$start', '$end', '$color','".$_SESSION['User']."','$place', '$notes', '$proponent','Pending','$semester')";
	// //$req = $bdd->prepare($sql);
	// //$req->execute();
	
	// echo $sql;
	
	// $query = $bdd->prepare( $sql );
	// if ($query == false) {
	//  print_r($bdd->errorInfo());
	//  die ('Erreur prepare');
	// }
	// $sth = $query->execute();
	// if ($sth == false) {
	//  print_r($query->errorInfo());
	//  die ('Erreur execute');
	// }

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

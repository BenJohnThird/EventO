<?php

// Connexion à la base de données
require_once('bdd.php');
session_start();
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$place = $_POST['place'];
	$notes = $_POST['notes'];
	$proponent = $_POST['proponent'];
	$semester = $_POST['semester'];

	$sql = "INSERT INTO events(title, start, end, color, created, place, notes, proponent, situation, semester) values ('$title', '$start', '$end', '$color','".$_SESSION['User']."','$place', '$notes', '$proponent','Pending','$semester')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

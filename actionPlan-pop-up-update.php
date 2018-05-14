<?php
include ('Connection.php');
$id = $_POST["id"];
$Date= date('Y-m-d H:i:s');
 $sql = "UPDATE `events` SET `title`= '".$_POST["title"]."',`place`='".$_POST["place"]."',`proponent`='".$_POST["proponent"]."',`situation`='".$_POST["situation"]."',`notes` = '".$_POST["notes"]."',semester = '".$_POST["sy"]."',color = '#0071c5' WHERE id = '".$id."'"; 
 if(mysqli_query($conn, $sql))   
 {  
	 echo "Data Updated";
 }  
else
{
	echo "Error Occured";
}
 ?>

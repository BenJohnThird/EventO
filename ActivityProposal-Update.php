<?php
include ('Connection.php');
$id = $_POST["id"];
$Date= date('Y-m-d H:i:s');

 $sql = "UPDATE `activityproposal` SET `Theme`='".$_POST["theme"]."',`ap_status` = '".$_POST["situation"]."',`Type`='".$_POST["checkboxtype"]."',`Location`='".$_POST["checkboxlocation"]."'
 ,`Description`='".$_POST["description"]."',`TargetParticipant`='".$_POST["participants"]."',`Rehearsal(TD)`='".$_POST["rehearsals"]."',
 `CountTarget`='".$_POST["howmany"]."',`ObjectivePercent`='".$_POST["objectivespercent"]."',`ValuesInculcated`='".$_POST["values"]."',
 `PastMean`='".$_POST["overallmean"]."',`PastVI`='".$_POST["verbalinterpretation"]."',`Note` = '".$_POST["notes"]."' WHERE `ap_id` = '".$_POST["id"]."'";
 if(mysqli_query($conn, $sql))
 {
	 echo "Data Updated";
 }
else
{
	echo "Error Occured";
}
 ?>

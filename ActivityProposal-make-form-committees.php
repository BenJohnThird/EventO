<?php
include('Connection.php');
$sql = "SELECT * FROM (events INNER JOIN activityproposal ON events.id = activityproposal.events_id) INNER JOIN student_council on student_council.idstudent_council = events.student_council_idstudent_council where activityproposal.ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result)){
	  echo '
        <!-- WORKING OVERALL COMMITTEES !-->
        <h1 class = "text-center"> Working Committees </h1>
        <div class = "form-group">
          <div class = "table-Committees-Overall"></div>
        </div>
        <!-- COMMITTEES !-->
        <div class = "well well-sm">
          <div class = "form-group">
            <div class = "table-Committees"></div>
          </div>
        </div>
      </div>';
	}
}
?>
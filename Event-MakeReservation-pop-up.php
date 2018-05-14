<?php
include ('Connection.php');
session_start();


$sql = "SELECT organization_name,place,start,end,CountTarget,Description,ap_reservation_main.notes 
as AP_NOTE,ap_reservation_main.ID as 'Reserve'
FROM ((events INNER JOIN activityproposal ON events.id = activityproposal.events_id)
INNER JOIN ap_reservation_main ON ap_reservation_main.ap_id = activityproposal.ap_id)
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
inner join organization on organization.ID = student_council.organization_ID
where student_council.organization_ID = '".$_SESSION['OrgID']."'
 and ap_reservation_main.ID = '".$_POST["id"]."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result)){
	echo '
			<!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Physical Facilities Request Form</h4>
	        </div>
	        <div class="modal-body">
	    <form>
					<div class="form-group">
						<label for="Name">School/College/Department/Organization:</label>
						<input required type = "text" placeholder ="School" id = "organization" readonly class="form-control" value = "'.$row["organization_name"].'">
					</div>
	        <div class="form-group">
	          <label for="Name">Facilities/Venue(s) /Instructional Facilities :</label>
	          <input required type = "text" placeholder ="Place" id = "place" readonly value = "'.$row["place"].'"class="form-control">
	        </div>
					<div class="form-group" style="margin-bottom:100px;">
						<div class="col-xs-6">
						<label for="Room">Date of Actual Activities / Meetings / Seminar:</label>
						<input required type = "text" placeholder ="Date" id = "date"  readonly value = "'.substr($row["start"],0,10)." -".substr($row["end"],0,10).'" class="form-control">
						</div>
	          <div class="col-xs-2">
	            <label for="Room">Start time:</label>
	            <input type="text"  id = "start" name = "start"  readonly value = "'.substr($row["start"],10).'" class ="form-control">
	          </div>
	          <div class="col-xs-2">
	            <label for="Room">End time:</label>
	            <input type="text"  id = "end" name = "end" readonly value = "'.substr($row["end"],10).'" class ="form-control">
	          </div>
						<div class="col-xs-2">
	            <label for="Room">No. of Person/s:</label>
	            <input type="number"  id = "persons"  readonly value ="'.$row["CountTarget"].'" class ="form-control">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="Room">Purpose of Activities / Meetings / Seminar:</label>
	          <input required type = "text" placeholder ="Purpose of activities" id = "purpose"  readonly value = "'.$row["Description"].'" class="form-control">
	        </div>
	        <hr>
	        <!-- TABLE FOR PHYSICAL FACILITIES  !-->
	        <div class = "form-group">
	          <div class = "table-Physical-Equip"></div>
	        </div>
					<!-- TABLE FOR TLTS  !-->
	        <div class = "form-group">
	          <div class = "table-TLTS-Equip"></div>
	        </div>
					<!-- TABLE FOR CLASSROOM  !-->
	        <div class = "form-group">
	          <div class = "table-Classroom"></div>
	        </div>
					<!-- TABLE FOR STEP 2  !-->
	        <div class = "form-group">
	          <div class = "table-Step2"></div>
	        </div>
					<!-- TABLE FOR STEP 3  !-->
	        <div class = "form-group">
	          <div class = "table-Step3"></div>
	        </div>
	        <div class="form-group">
	          <label for="Room">Notes:</label><br>
	          <textarea rows="6" cols="120" id = "notes" class= "form-control" name="notes" placeholder="Comments/Suggestions here..." >'.$row["AP_NOTE"].'</textarea>
	        </div>
	      <div class="form-group">
	       <div class ="Name" style ="text-align:center; align-items:center;">
	          <button type= "button" id ="btn_add-ReserveMain" data-id5="'.$row["Reserve"].'">Add</button>
	          <input name="reset" type="reset" id = "btn_reset" />
	        </div>
	      </div>
	     </form>';
		 }
 }
?>

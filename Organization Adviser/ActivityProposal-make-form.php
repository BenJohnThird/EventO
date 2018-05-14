<?php
include('Connection.php');
$sql = "SELECT * FROM (events INNER JOIN activityproposal ON events.id = activityproposal.events_id) 
INNER JOIN  student_council on student_council.idstudent_council = events.student_council_idstudent_council
where activityproposal.ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_array($result)){
	echo '
		<form>
        <div class="form-group row">
          <div class="col-xs-2">
          </div>
          <div class="col-xs-3">
            <label class="checkbox-inline">
            <input type="checkbox" class = "checkbox-type" name = "checkbox-type" value="Academic-Related" ';
            if ($row["Type"] == 'Academic-Related') echo 'checked'; echo'>Academic-Related
            </label>
          </div>
          <div class="col-xs-3">
            <label class="checkbox-inline">
            <input type="checkbox" class = "checkbox-type" name = "checkbox-type" value="Community Outreach" ';
            if ($row["Type"] == 'Community Outreach') echo 'checked'; echo'>Community Outreach
            </label>
          </div>
          <div class="col-xs-3">
            <label class="checkbox-inline">
            <input type="checkbox" class = "checkbox-type" name = "checkbox-type" value="Co/Extra-Curricular" ';
            if ($row["Type"] == 'Co/Extra-Curricular') echo 'checked'; echo'>Co/Extra-Curricular
            </label>
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <div class="col-xs-4">
          </div>
          <div class="col-xs-3">
            <label class="checkbox-inline">
            <input type="checkbox" class= "checkbox-location" name= "checkbox-location" value="Inside" ';
            if ($row["Location"] == 'Inside') echo 'checked'; echo'>Inside
            </label>
          </div>
          <div class="col-xs-3">
            <label class="checkbox-inline">
            <input type="checkbox" class= "checkbox-location" name= "checkbox-location" value="Outside" ';
            if ($row["Location"] == 'Outside') echo 'checked'; echo'>Outside
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="Name">Proponent(USC/School/College/Department/Organization):</label>
          <input required type = "text" placeholder ="Proponent" id = "proponent" name = "proponent" size = "20" maxlength = "60" value ="'.$row["proponent"].'" class="form-control">
        </div>
        <div class="form-group">
          <label for="Name">Activity:</label>
          <input required type = "text" placeholder ="Title" id = "title" disabled name = "Title" size = "20" maxlength = "60" value ="'.$row["title"].'" class="form-control">
        </div>
        <div class="form-group">
          <label for="Name">Brief Description of the Activity:</label>
          <input required type = "text" placeholder ="Description (100 Characters)" id = "description" name = "Description" value ="'.$row["Description"].'" size = "20" maxlength = "100" class="form-control">
        </div>
        <div class="form-group row">
          <div class="col-xs-6">
           <label for="Name">Included in the Current Approved Action Plan?</label>
          </div>
          <div class="col-xs-2">
            <label class="checkbox-inline">
            <input type="checkbox" class="checkbox-approved" name="checkbox-approved" value="Yes" ';
            if ($row["events_id"] != '0' ||$row["events_id"] != null) echo 'checked'; echo'>Yes
            </label>
          </div>
          <div class="col-xs-2">
            <label class="checkbox-inline">
            <input type="checkbox" class="checkbox-approved" name="checkbox-approved" value="No" ';
            if ($row["events_id"] == '0' ||$row["events_id"] == null) echo 'checked'; echo'>No
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="Theme">Theme:</label>
          <input required type = "text" placeholder ="Theme" id = "theme" name = "theme" size = "20" maxlength = "60" value ="'.$row["Theme"].'" class="form-control">
        </div>
        <div class="form-group">
          <label for="Setting">Date(s) and Time/Duration(Must be outside the moratorium period):</label>
          <input required type = "text" placeholder ="Date and Time" id = "setting" name = "setting" size = "20" maxlength = "60" value ="'.substr($row["start"], 0,10).'; '.substr($row["start"], 11).' - '.substr($row["end"], 11).'" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Place:</label>
          <input required type = "text" placeholder ="Place" id = "place" name = "Place" size = "20" value ="'.$row["place"].'" maxlength = "200" class="form-control">
        </div>
        <div class="form-group">
          <label for="Rehearsals">Time and Days of Rehearsals (if applicable):</label>
          <input required type = "text" placeholder ="Rehearsals" id = "rehearsals" name = "rehearsals" size = "20" maxlength = "60" value ="'.$row["Rehearsal(TD)"].'" class="form-control">
        </div>
        <div class="form-group row">
          <div class="col-xs-4">
           <label for="Name">Target Participants/Audience</label>
          </div>
          <div class="col-xs-5">
            <label for="Who">Who?</label>
            <input required type = "text" placeholder ="Participants" id = "participants" name = "participants" size = "20" maxlength = "60" value ="'.$row["TargetParticipant"].'" class="form-control">
          </div>
          <div class="col-xs-3">
            <label for="Count">How many?</label>
          <input required type = "number" min = "0" placeholder ="How many" id = "count" name = "count" size = "20" maxlength = "60" value ="'.$row["CountTarget"].'" class="form-control">
          </div>
        </div>
        <div class="form-group">
         <div class="col-xs-9" class = "text-right">
          <label for="Rehearsals">Objectives of the Study</label>
          at the end of the activity, atleast of the participants should be able to:
          </div>
           <div class="col-xs-2 input-group">
            <input id="percentage" type="number" class="form-control" name="percentage"
            value = "'.$row["ObjectivePercent"].'" min="0" max = "100" placeholder="%">
            <span class="input-group-addon">%</span>
            </div>
        </div>
        <!-- TABLE OBJECTIVES !-->
        <div class = "form-group">
          <div class = "table-Objectives"></div>
        </div>
        <div class="form-group">
          <label for="Values">Values Inculcated:</label>
          <input required type = "text" placeholder ="Values" id = "values" name = "values" size = "20" maxlength = "60" value="'.$row["ValuesInculcated"].'" class="form-control">
        </div>
        <div class="form-group">
          <label for="Past Evaluation">Past Evaluation</label>
            If the activity was conducted the previous semester/year, indicate the following:
        </div>

        <div class="form-group">
          <div class = "col-xs-6">
            <label class="col-sm-4 control-label">Over-all Mean</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder = "Over-all Mean" id="mean" type="text" value="'.$row["PastMean"].'">
            </div>
          </div>
          <div class = "col-xs-6">
            <label class="col-sm-4 control-label">Verbal Interpretaion</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder = "Verbal Interpretation" id="verbal-interpretation" type="text" value="'.$row["PastVI"].'">
            </div>
          </div>
        </div>
        <!-- TABLE SPEAKERS/GUEST !-->
        <div class = "form-group">
          <div class = "table-Speakers"></div>
        </div>
        <div class="form-group">
          <label for="Room">Notes:</label><br>
          <textarea rows="6" cols="120" id = "notes" name="notes" class = "form-control" placeholder="Comments/Suggestions here..." >'.$row["Note"].'</textarea>
        </div>
        <div class="form-group">
            <div class ="Name" style ="text-align:center; align-items:center;">
            <button type= "button" name = "btn_update" id ="btn_update" data-idunique = "'.$row["ap_id"].'">Update</button>
            <input name="reset" type="reset" id = "btn_reset" />
        </div>
     </form>';
	}

}
else{
	echo "Red";
}
?>

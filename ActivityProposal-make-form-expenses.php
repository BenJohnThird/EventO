<?php
include('Connection.php');
$sql = "SELECT * FROM (events INNER JOIN activityproposal ON events.id = activityproposal.events_id) INNER JOIN student_council on student_council.idstudent_council = events.student_council_idstudent_council where activityproposal.ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_array($result)){
  echo '
      <div class = "form-group">
        <label for="Past Evaluation">Budget Proposal</label>
        Please Check:
          <div class="checkbox checkbox-primary">
            <label><input type="checkbox" class = "checkbox-budget" name = "checkbox-budget"
            value="Requesting University Subsidy"';
            if ($row["BudgetType"] == 'Requesting University Subsidy') echo 'checked'; echo'>Requesting University Subsidy</label>
          </div>
          <div class="checkbox checkbox-primary">
            <label><input type="checkbox" class = "checkbox-budget" name = "checkbox-budget" value="Not Requesting University Subsidy"';
            if ($row["BudgetType"] == 'Not Requesting University Subsidy') echo 'checked'; echo'>Not Requesting University Subsidy</label>
          </div>
          <div class="checkbox checkbox-primary">
            <label><input type="checkbox" class = "checkbox-budget" name = "checkbox-budget" value="Requesting Subsidy for Venue(s) Only"';
            if ($row["BudgetType"] == 'Requesting Subsidy for Venue(s) Only') echo 'checked'; echo'>Requesting Subsidy for Venue(s) Only</label>
          </div>
          <div class="checkbox checkbox-primary">
            <label><input type="checkbox" class = "checkbox-budget" name = "checkbox-budget"
            value="To be taken from the fund of"';
            if ($row["BudgetType"] == 'To be taken from the fund of') echo 'checked'; echo'>To be taken from the fund of
            <input class="form-control" placeholder = "Fund" id="fund" type="text" value="'.$row["TakenFrom"].'"></label>
          </div>
        </div>
        <div class="form-group">
            <div class ="Name" style ="text-align:left; align-items:center;">
            <button type= "button" name = "btn_update" id ="btn_update-expenses" class = "btn btn-primary" data-idunique = "'.$row["ap_id"].'">Update</button>
        </div>
        <h2 id = "Expenses">Projected Expenses</h2>
        <!-- TABLE DOCUMENTATION !-->
        <div class = "form-group">
          <div class = "table-Documentation"></div>
        </div>
        <!-- TABLE FOOD !-->
        <div class = "form-group">
          <div class = "table-Food"></div>
        </div>
        <!-- TABLE MATERIALS !-->
        <div class = "form-group">
          <div class = "table-Materials"></div>
        </div>
        <!-- TABLE HONORARIUM !-->
        <div class = "form-group">
          <div class = "table-Honorarium"></div>
        </div>
        <!-- TABLE PROGRAM AND INVI !-->
        <div class = "well well-sm">
          <div class = "form-group">
            <div class = "table-ProgramInvi"></div>
          </div>
        </div>
        <!-- TABLE CERTIFICATES!-->
          <div class = "form-group">
            <div class = "table-Certs"></div>
          </div>
        <!-- TABLE TOKEN/PRIZES!-->
        <div class = "well well-sm">
          <div class = "form-group">
            <div class = "table-Token"></div>
          </div>
        </div>
        <!-- TABLE OTHERS!-->
          <div class = "form-group">
            <div class = "table-OthersTable"></div>
          </div>
        <!-- TABLE VENUE!-->
        <div class = "well well-sm">
          <div class = "form-group">
            <div class = "table-Venue"></div>
          </div>
        </div>
        <!-- TABLE ENERGY FEE !-->
          <div class = "form-group">
            <div class = "table-Energy"></div>
          </div>
         <!-- TABLE TRANSPORTATION!-->
        <div class = "well well-sm">
          <div class = "form-group">
            <div class = "table-Transportation"></div>
          </div>
        </div>
        <!-- TABLE CONTINGENCY !-->
          <div class = "form-group">
            <div class = "table-Contingency"></div>
          </div>
      <!-- TABLE FOR TOTAL !-->
          <div class = "form-group" style="margin-top:50px">
            <div class = "table-Total"></div>
          </div>
      ';
  }
}
?>

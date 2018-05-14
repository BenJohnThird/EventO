<?php
include('Connection.php');
$sql = "SELECT * FROM events where id = '".$_POST["id"]."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	
while($row = mysqli_fetch_array($result)){
	echo '
		<!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Event</h4>
        </div>
        <div class="modal-body">
    <form>
        <div class="form-group">
          <label for="Name">Title:</label>
          <input required type = "text" placeholder ="Title" id = "title" name = "Title" size = "20" maxlength = "60" value ="'.$row["title"].'" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Proponent:</label>
          <input required type = "text" placeholder ="Proponent" id = "proponent" name = "Proponent" size = "20" value ="'.$row["proponent"].'" maxlength = "200" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Place:</label>
          <input required type = "text" placeholder ="Place" id = "place" name = "Place" size = "20" value ="'.$row["place"].'" maxlength = "200" class="form-control">
        </div>
        <div class="form-group" style="margin-bottom:100px;">
          <div class="col-xs-6">
            <label for="Room">Start time:</label>
            <input type="text"  readonly id = "start" name = "end" size = "20" maxlength = "60" value = "'.$row["start"].'" class ="form-control">
          </div>
          <div class="col-xs-6">
            <label for="Room">End time:</label> 
            <input required type="text" readonly id = "end" name = "EndTime" size = "20" maxlength = "60"  value = "'.$row["end"].'" class ="form-control">
          </div>
        </div>
        <hr>
        <div class="form-group">
         <div class="col-xs-9" class = "text-right">  
          <label for="Rehearsals">Objectives of the Study</label>
          at the end of the activity, atleast of the participants should be able to:
          </div>
           <div class="col-xs-2 input-group">
            <input id="percentage" type="number" class="form-control" name="percentage"  
             min="0" max = "100" placeholder="%">
            <span class="input-group-addon">%</span>
            </div>
        </div>
        <!-- TABLE OBJECTIVES !-->
        <div class = "form-group">
          <div class = "table-Objectives"></div>
        </div>
        <div class="form-group"> 
          <label for="Room">Notes:</label><br>
          <textarea rows="6" cols="120" id = "notes" class= "form-control" name="notes" placeholder="Comments/Suggestions here..." >'.$row["notes"].'</textarea>
        </div>
        <div class="form-group">  
            <div class ="Name" style ="text-align:center; align-items:center;">
            <button type="button" name = "btn_update" id ="btn_update" data-idunique = "'.$row["id"].'">Update</button>
            <input name="reset" type="reset" id = "btn_reset" />
        </div>
      </div>
     </form>';
	}
	
}
else{
	echo "Red";
}
?>
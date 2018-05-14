<?php
include('Connection.php');
$sql = "SELECT * FROM events where date = '".$_POST["id"]."' and title = '".$_POST["text"]."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	
while($row = mysqli_fetch_array($result)){
	echo '
		<form>
        <div class="form-group">
          <label for="Name">Title:</label>
          <input required type = "text" placeholder ="Title" id = "title" name = "Title" size = "20" maxlength = "60" value ="'.$row["title"].'" class="form-control">
        </div>
        <div class="form-group">
          <label for="Name">Description:</label>
          <input required type = "text" placeholder ="Description (100 Characters)" id = "description" name = "Description" value ="'.$row["description"].'" size = "20" maxlength = "100" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Place:</label>
          <input required type = "text" placeholder ="Place" id = "place" name = "Place" size = "20" value ="'.$row["place"].'" maxlength = "200" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Date:</label>
          <input name="Hiredate" type="date" id = "date" maxlength="200"  class ="form-control" value="'.$row["date"].'">
        </div>
        <div class="form-group">
	        <div class="col-xs-6">
	          <label for="Room">Start time:</label>
	          <input required type = "time" id = "starttime" name = "StartTime" size = "20" maxlength = "60" value = "'.$row["starttime"].'" class ="form-control">
	        </div>
	        <div class="col-xs-6">
	          <label for="Room">End time:</label>
	          <input required type = "time"  id = "endtime" name = "EndTime" size = "20" maxlength = "60"  value = "'.$row["endtime"].'" class ="form-control">
	        </div>
	    </div>
	    <div class="form-group"> 
			<label for="Room">Notes:</label><br>
			<textarea rows="8" cols="120" id="notes" name="notes" placeholder="Comments/Suggestions here..." >'.$row["Note"].'</textarea>
		</div>
  		<div class="form-group">  
            <div class ="Name" style ="text-align:center; align-items:center;">
            <button name = "btn_update" id ="btn_update" data-idunique = "'.$row["id"].'">Update</button>
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
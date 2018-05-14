<?php
echo '
		<form>
        <div class="form-group">
          <label for="Name">Title:</label>
          <input required type = "text" placeholder ="Title" id = "title" name = "Title" size = "20" maxlength = "60" value ="" class="form-control">
        </div>
        <div class="form-group">
          <label for="Name">Description:</label>
          <input required type = "text" placeholder ="Description (100 Characters)" id = "description" name = "Description" size = "20" maxlength = "100" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Place:</label>
          <input required type = "text" placeholder ="Place" id = "place" name = "Place" size = "20" value ="" maxlength = "200" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Date:</label>
          <input name="Hiredate" type="text" id = "date" maxlength="200" disabled class ="form-control" value="'.$_POST["id"].'">
        </div>
        <div class="form-group">
	        <div class="col-xs-6">
	          <label for="Room">Start time:</label>
	          <input required type = "time" id = "starttime" name = "StartTime" size = "20" maxlength = "60" class ="form-control">
	        </div>
	        <div class="col-xs-6">
	          <label for="Room">End time:</label>
	          <input required type = "time"  id = "endtime" name = "EndTime" size = "20" maxlength = "60" class ="form-control">
	        </div>
	    </div>
  		<div class="form-group"> 
      <label for="Room">Notes:</label><br>
      <textarea rows="6" cols="120" id = "notes" name="notes" placeholder="Comments/Suggestions here..." ></textarea>
    </div>
      <div class="form-group">  
       <div class ="Name" style ="text-align:center; align-items:center;">
          <button type="submit" name = "btn_add" id ="btn_add">Add</button>
          <input name="reset" type="reset" id = "btn_reset" />
        </div>
      </div>
     </form>';
?>
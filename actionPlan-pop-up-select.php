<?php
echo '
		<!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Event</h4>
        </div>
        <div class="modal-body">
    <form>
        <div class="form-group">
          <label for="Name">Title:</label>
          <input required type = "text" placeholder ="Title" id = "title" name = "Title" size = "20" maxlength = "60"  class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Proponent:</label>
          <input required type = "text" placeholder ="Proponent" id = "proponent" name = "Proponent" size = "20"  maxlength = "200" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Place:</label>
          <input required type = "text" placeholder ="Place" id = "place" name = "Place" size = "20" maxlength = "200" class="form-control">
        </div>
        <div class="form-group">
          <label for="Room">Semester:</label>
          <select required class = "form-control" id = "sy-select">
              <option value = "">Select Semester here...</option>
              <option>1st Semester</option>
              <option>2nd Semester</option>
          </select>
        </div>
        <div class="form-group" style="margin-bottom:100px;">
          <div class="col-xs-6">
            <label for="Room">Start time:</label>
            <input type="datetime-local"  id = "start" name = "start" size = "20" maxlength = "60" class ="form-control">
          </div>
          <div class="col-xs-6">
            <label for="Room">End time:</label>
            <input type="datetime-local"  id = "end" name = "end" size = "20" maxlength = "60"   class ="form-control">
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
          <textarea rows="6" cols="120" id = "notes" class= "form-control" name="notes" placeholder="Comments/Suggestions here..." ></textarea>
        </div>
      <div class="form-group">
       <div class ="Name" style ="text-align:center; align-items:center;">
          <button type= "button" name = "btn_add" id ="btn_add">Add</button>
          <input name="reset" type="reset" id = "btn_reset" />
        </div>
      </div>
     </form>';
?>

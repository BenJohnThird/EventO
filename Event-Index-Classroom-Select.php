<?php
include('Connection.php');
$sql = "SELECT * FROM ap_reservation where ap_reservation_main_ID = '".$_POST["id"]."' and Sector = 'Classroom'";
$result = mysqli_query($conn, $sql);
echo '<div class = "container">
<div class = "col-sm-7">
Please check the preferred seating style/arrangement for your activity/meeting/seminar
</div>
<div class = "col-sm-3">
<button type= "button" class="btn btn-sm btn-default" id = "Classroom-Open-Modal">
<span class="glyphicon glyphicon-plus"></span> View Classroom</button>
</div>
</div>';
if(mysqli_num_rows($result) > 0 )
{
	while($row = mysqli_fetch_array($result))
	{
		echo '
	  <hr>
		<div class = "container">
					<div class = "col-sm-2">
						<label class="radioPane">Classroom Style
						<input type="radio" name="radio" value = "Classroom Style" ';
            if ($row["Subject"] == 'Classroom Style') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
						<br>
						<label class="radioPane" data-toggle="tooltip" >Chevron Style
						<input type="radio" name="radio" value = "Chevron Style"  ';
            if ($row["Subject"] == 'Chevron Style') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
					</div>
					<div class = "col-sm-2">
						<label class="radioPane">Lecture Style
						<input type="radio" name="radio" value = "Lecture Style"  ';
            if ($row["Subject"] == 'Lecture Style') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
						<br>
						<label class="radioPane">Theater Style
						<input type="radio" name="radio" value = "Theater Style"  ';
            if ($row["Subject"] == 'Theater Style') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
					</div>
					<div class = "col-sm-2">
						<label class="radioPane">Hollow Square
						<input type="radio" name="radio" value = "Hollow Square"  ';
            if ($row["Subject"] == 'Hollow Square') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
						<br>
						<label class="radioPane">Square Style
						<input type="radio" name="radio" value ="Square Style"  ';
            if ($row["Subject"] == 'Square Style') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
					</div>
					<div class = "col-sm-3">
						<label class="radioPane">Classroom Style w/ table
						<input type="radio" name="radio" value = "Classroom Style w/ table"  ';
            if ($row["Subject"] == 'Classroom Style w/ table') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
						<br>
						<label class="radioPane">"U" Shape Style
						<input type="radio" name="radio" value = "U Shape Style"  ';
            if ($row["Subject"] == 'U Shape Style') echo 'checked'; echo'>
						<span class="checkmark"></span>
						</label>
				 </div>
		</div>
	 <div class = "text-center" style="margin-top:5%">
		 <button type= "button" id ="btn_add-Classroom" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
		 <span class="glyphicon glyphicon-plus"></span> Choose</button></td>
	 </div>
	    ';
	}
}
else
{
  echo '
  <hr>
        <div class = "container">
              <div class = "col-sm-2">
                <label class="radioPane">Classroom Style
                <input type="radio" name="radio" value = "Classroom Style">
                <span class="checkmark"></span>
                </label>
                <br>
                <label class="radioPane">Chevron Style
                <input type="radio" name="radio" value = "Chevron Style">
                <span class="checkmark"></span>
                </label>
              </div>
              <div class = "col-sm-2">
                <label class="radioPane">Lecture Style
                <input type="radio" name="radio" value = "Lecture Style">
                <span class="checkmark"></span>
                </label>
                <br>
                <label class="radioPane">Theater Style
                <input type="radio" name="radio" value = "Theater Style">
                <span class="checkmark"></span>
                </label>
              </div>
              <div class = "col-sm-2">
                <label class="radioPane">Hollow Square
                <input type="radio" name="radio" value = "Hollow Square">
                <span class="checkmark"></span>
                </label>
                <br>
                <label class="radioPane">Square Style
                <input type="radio" name="radio" value ="Square Style">
                <span class="checkmark"></span>
                </label>
              </div>
              <div class = "col-sm-3">
                <label class="radioPane">Classroom Style w/ table
                <input type="radio" name="radio" value = "Classroom Style w/ table">
                <span class="checkmark"></span>
                </label>
                <br>
                <label class="radioPane">"U" Shape Style
                <input type="radio" name="radio" value = "U Shape Style">
                <span class="checkmark"></span>
                </label>
							</div>
        </div>
				<div class = "text-center" style="margin-top:5%">
					<button type= "button" id ="btn_add-Classroom" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
					<span class="glyphicon glyphicon-plus"></span> Choose</button></td>
				</div>
    ';

}
?>

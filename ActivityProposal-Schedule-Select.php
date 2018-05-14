<?php
include('Connection.php');
$output = '';
$sql = "SELECT * FROM ap_schedule where ap_id = '".$_POST["id"]."' order by Starttime";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "5" class = "text-center"><kbd>Program Flow</kbd> of the Activity</th>
			</tr>
			<tr>
				<th colspan = "2">Time Duration</th>
				<th>Activity</th>
				<th>Person/Group</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Starttime"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Endtime"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Activity"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Person_Group"].'</td>
					<td>
					<button name = "btn_del-Schedule" id ="btn_del-Schedule" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "time" placeholder ="Starting Time" id = "schedule_starttime" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "time" placeholder ="End Time" id = "schedule_endtime" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Activity" id = "schedule_activity"size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Person" id = "schedule_person"  size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-Schedule" id ="btn_add-Schedule" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table .table-responsive">
		<thead>
			<tr>
				<th colspan = "5" class = "text-center"><kbd>Program Flow</kbd> of the Activity</th>
			</tr>
			<tr>
				<th colspan = "2">Time Duration</th>
				<th>Activity</th>
				<th>Person/Group</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "time" placeholder ="Starting Time" id = "schedule_starttime" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "time" placeholder ="End Time" id = "schedule_endtime" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Activity" id = "schedule_activity" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Person" id = "schedule_person"  size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-Schedule" id ="btn_add-Schedule" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
echo '</div>';
?>

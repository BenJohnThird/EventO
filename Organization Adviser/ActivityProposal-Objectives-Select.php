<?php
include('Connection.php');
$output = '';
$sql = "SELECT * FROM ap_objectives where ap_id = '".$_POST["id"]."' OR events_id = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class = "table-responsive">';
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Objectives</kbd> of the Activity</th>
			</tr>
			<tr>
				<th>Objective</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Objectives"].'</td>
					<td>
					<button name = "btn_del-Objectives" id ="btn_del-Objectives" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger third">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Objectives" id = "objectives" name = "objectives" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-Objectives" id ="btn_add-Objectives" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan ="2"class = "text-center"><kbd>Objectives</kbd> of the Activity</th>
			</tr>
			<tr>
				<th>Objective</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input type = "text" placeholder ="Objectives" id = "objectives" name = "objectives" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-Objectives" id ="btn_add-Objectives" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
echo '</div>'

?>

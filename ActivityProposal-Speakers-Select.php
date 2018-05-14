<?php
include('Connection.php');
$sql = "SELECT * FROM ap_guest where ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<table class="table table-responsive">
		<thead>
			<tr>
				<th colspan = "5" class = "text-center"><kbd>Name(s) and Qualification(s)</kbd> of the Speaker(s)/Judge(s)/Facilitator(s) (if applicable)</th>
			</tr>
			<tr>
				<th>Name(s)</th>
				<th>Present and Past Position(s)</th>
				<th>Educational Attainment-School(s)</th>
				<th>Experience/Training(s)</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Name"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Position"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Educ_Attainment"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Exp_Train"].'</td>
					<td>
						<button name = "btn_del-Speakers" id ="btn_del-Speakers" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '<tr>
				<td><input required type = "text" placeholder ="Name" id = "speakers-name" name = "speakers-name" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "text" placeholder ="Position" id = "speakers-position" name = "speakers-position" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "text" placeholder ="Education" id = "speakers-educ" name = "speakers-educ" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "text" placeholder ="Experience" id = "speakers-exp" name = "speakers-exp" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button type= "button" name = "btn_add-Speakers" id ="btn_add-Speakers" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "5" class = "text-center"><kbd>Name(s) and Qualification(s)</kbd> of the Speaker(s)/Judge(s)/Facilitator(s) (if applicable)</th>
			</tr>
			<tr>
				<th>Name(s)</th>
				<th>Present and Past Position(s)</th>
				<th>Educational Attainment-School(s)</th>
				<th>Experience/Training(s)</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input required type = "text" placeholder ="Name" id = "speakers-name" name = "speakers-name" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "text" placeholder ="Position" id = "speakers-position" name = "speakers-position" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "text" placeholder ="Education" id = "speakers-educ" name = "speakers-educ" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "text" placeholder ="Experience" id = "speakers-exp" name = "speakers-exp" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button type= "button" name = "btn_add-Speakers" id ="btn_add-Speakers" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

?>

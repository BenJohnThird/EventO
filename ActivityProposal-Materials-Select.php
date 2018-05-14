<?php
include('Connection.php');
$output = '';
$sqlTotalMaterials = "SELECT sum(`price`) as MaterialsExp from ap_exp_materials where ap_id = '".$_POST["id"]."'";
$sqlPublicity = "SELECT * FROM ap_exp_materials where Category = 'Publicity' and ap_id = '".$_POST["id"]."'";
$sqlTotalPublicity = "SELECT sum(`price`) as PublicityExp from ap_exp_materials
where Category = 'Publicity' and ap_id = '".$_POST["id"]."'";
$resultPublicity = mysqli_query($conn, $sqlPublicity);
$resultTotalPublicity = mysqli_query($conn, $sqlTotalPublicity);
$resultTotalMaterials = mysqli_query($conn, $sqlTotalMaterials);
if(mysqli_num_rows($resultTotalMaterials) > 0 )
	{
		while($row = mysqli_fetch_array($resultTotalMaterials))
		{
			echo '<div class = "form-group">
				<div class = "col-xs-9">
					<label for="Documentation"><kbd>Materials</kbd> Over-All - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" size = "20" value ="'.$row["MaterialsExp"].'" disabled class="form-control">
            		</div>
				</div>
			</div>
			';
		}
	}
// FOR PUBLICITY
if(mysqli_num_rows($resultPublicity) > 0 )
{
	if(mysqli_num_rows($resultTotalPublicity) > 0 )
	{
		while($row = mysqli_fetch_array($resultTotalPublicity))
		{
			echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Documentation">Publicity - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" size = "20" value ="'.$row["PublicityExp"].'" disabled class="form-control">
            		</div>
				</div>
			</div>
			';
		}
	}
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultPublicity))
	{
		echo '
			<tbody>
			<tr>
					<td data-idpass ="'.$row["ID"].'">' .$row["Name"].'</td>
					<td data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td>
						<button name = "btn_del-Publicity" id ="btn_del-Publicity" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '<tr>
				<td><input required type = "text" placeholder ="Item name" id = "publicity-item" name = "publicity-item-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "publicity-price" name = "publicity-price-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Publicity" id ="btn_add-Publicity" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Documentation">Publicity - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Total" size = "20" maxlength = "60"  disabled class="form-control">
            		</div>
				</div>
			</div>
			';
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input required type = "text" placeholder ="Item name" id = "publicity-item" name = "publicity-item-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group col-xs-4">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "publicity-price" name = "publicity-price-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Publicity" id ="btn_add-Publicity" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

//FOR REGISTRATION
$sqlRegistration = "SELECT * FROM ap_exp_materials where Category = 'Registration' and ap_id = '".$_POST["id"]."'";
$sqlTotalRegistration = "SELECT sum(`price`) as RegistrationExp from ap_exp_materials
where Category = 'Registration' and ap_id = '".$_POST["id"]."'";
$resultRegistration = mysqli_query($conn, $sqlRegistration);
$resultTotalRegistration = mysqli_query($conn, $sqlTotalRegistration);
// FOR PUBLICITY
if(mysqli_num_rows($resultRegistration) > 0 )
{
	if(mysqli_num_rows($resultTotalRegistration) > 0 )
	{
		while($row = mysqli_fetch_array($resultTotalRegistration))
		{
			echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Registration">Registration - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" size = "20" value ="'.$row["RegistrationExp"].'" disabled class="form-control">
            		</div>
				</div>
			</div>
			';
		}
	}
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultRegistration))
	{
		echo '
			<tbody>
			<tr>
					<td data-idpass ="'.$row["ID"].'">' .$row["Name"].'</td>
					<td data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td>
						<button name = "btn_del-Registration" id ="btn_del-Registration" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '<tr>
				<td><input required type = "text" placeholder ="Item name" id = "registration-item" name = "registration-item-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "registration-price" name = "registration-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Registration" id ="btn_add-Registration" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Registration">Registration - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Total" size = "20" maxlength = "60"  disabled class="form-control">
            		</div>
				</div>
			</div>
			';
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input required type = "text" placeholder ="Item name" id = "registration-item" name = "registration-item-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group col-xs-4">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "registration-price" name = "registration-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Registration" id ="btn_add-Registration" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

//FOR SEMINAR
$sqlSeminar = "SELECT * FROM ap_exp_materials where Category = 'Seminar' and ap_id = '".$_POST["id"]."'";
$sqlTotalSeminar = "SELECT sum(`price`) as SeminarExp from ap_exp_materials
where Category = 'Seminar' and ap_id = '".$_POST["id"]."'";
$resultSeminar = mysqli_query($conn, $sqlSeminar);
$resultTotalSeminar = mysqli_query($conn, $sqlTotalSeminar);
// FOR PUBLICITY
if(mysqli_num_rows($resultSeminar) > 0 )
{
	if(mysqli_num_rows($resultTotalSeminar) > 0 )
	{
		while($row = mysqli_fetch_array($resultTotalSeminar))
		{
			echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Registration">Seminar - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" size = "20" value ="'.$row["SeminarExp"].'" disabled class="form-control">
            		</div>
				</div>
			</div>
			';
		}
	}
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultSeminar))
	{
		echo '
			<tbody>
			<tr>
					<td data-idpass ="'.$row["ID"].'">' .$row["Name"].'</td>
					<td data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td>
						<button name = "btn_del-Seminar" id ="btn_del-Seminar" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '<tr>
				<td><input required type = "text" placeholder ="Item name" id = "seminar-item" name = "seminar-item-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "seminar-price" name = "seminar-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Seminar" id ="btn_add-Seminar" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Seminar">Seminar - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Total" size = "20" maxlength = "60"  disabled class="form-control">
            		</div>
				</div>
			</div>
			';
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input required type = "text" placeholder ="Item name" id = "seminar-item" name = "seminar-item-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group col-xs-4">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "seminar-price" name = "seminar-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Seminar" id ="btn_add-Seminar" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

//FOR STAGE
$sqlStage = "SELECT * FROM ap_exp_materials where Category = 'Stage' and ap_id = '".$_POST["id"]."'";
$sqlTotalStage = "SELECT sum(`price`) as StageExp from ap_exp_materials
where Category = 'Stage' and ap_id = '".$_POST["id"]."'";
$resultStage = mysqli_query($conn, $sqlStage);
$resultTotalStage = mysqli_query($conn, $sqlTotalStage);
if(mysqli_num_rows($resultStage) > 0 )
{
	if(mysqli_num_rows($resultTotalStage) > 0 )
	{
		while($row = mysqli_fetch_array($resultTotalStage))
		{
			echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Stage">Stage Decoration - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" size = "20" value ="'.$row["StageExp"].'" disabled class="form-control">
            		</div>
				</div>
			</div>
			';
		}
	}
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultStage))
	{
		echo '
			<tbody>
			<tr>
					<td data-idpass ="'.$row["ID"].'">' .$row["Name"].'</td>
					<td data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td>
						<button name = "btn_del-Stage" id ="btn_del-Stage" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '<tr>
				<td><input required type = "text" placeholder ="Item name" id = "stage-item" name = "stage-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "stage-price" name = "stage-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Stage" id ="btn_add-Stage" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Stage">Stage Decoration - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Total" size = "20" maxlength = "60"  disabled class="form-control">
            		</div>
				</div>
			</div>
			';
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input required type = "text" placeholder ="Item name" id = "stage-item" name = "stage-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group col-xs-4">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "stage-price" name = "stage-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Stage" id ="btn_add-Stage" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

//FOR OTHERS
$sqlOthers = "SELECT * FROM ap_exp_materials where Category = 'Others' and ap_id = '".$_POST["id"]."'";
$sqlTotalOthers = "SELECT sum(`price`) as OthersExp from ap_exp_materials
where Category = 'Others' and ap_id = '".$_POST["id"]."'";
$resultOthers = mysqli_query($conn, $sqlOthers);
$resultTotalOthers = mysqli_query($conn, $sqlTotalOthers);
if(mysqli_num_rows($resultOthers) > 0 )
{
	if(mysqli_num_rows($resultTotalOthers) > 0 )
	{
		while($row = mysqli_fetch_array($resultTotalOthers))
		{
			echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Stage">Others - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" size = "20" value ="'.$row["OthersExp"].'" disabled class="form-control">
            		</div>
				</div>
			</div>
			';
		}
	}
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultOthers))
	{
		echo '
			<tbody>
			<tr>
					<td data-idpass ="'.$row["ID"].'">' .$row["Name"].'</td>
					<td data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td>
						<button name = "btn_del-Others" id ="btn_del-Others" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '<tr>
				<td><input required type = "text" placeholder ="Item name" id = "others-item" name = "others-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "others-price" name = "others-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Others" id ="btn_add-Others" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<div class = "form-group">
				<div class = "col-xs-6">
					<label for="Others">Others - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Total" size = "20" maxlength = "60"  disabled class="form-control">
            		</div>
				</div>
			</div>
			';
	echo '<table class = "table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input required type = "text" placeholder ="Item name" id = "others-item" name = "others-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
					<div class="input-group col-xs-4">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "others-price" name = "others-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><button name = "btn_add-Others" id ="btn_add-Others" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
?>

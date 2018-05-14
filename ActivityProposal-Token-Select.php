<?php
include('Connection.php');
$output = '';
$sql = "SELECT * FROM ap_expenses where Committees = 'Token' and ap_id = '".$_POST["id"]."'";
$sqlTotal = "SELECT sum(`pcs`*`price`) as ProgramInviExp from ap_expenses
where Committees = 'Token' and ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sql);
$resultTotal = mysqli_query($conn, $sqlTotal);
if(mysqli_num_rows($result) > 0 )
{
	if(mysqli_num_rows($resultTotal) > 0 )
	{
		while($row = mysqli_fetch_array($resultTotal))
		{
			echo '<div class = "table-responsive">';
			echo '<div class = "form-group">
				<div class = "col-xs-9">
					<label for="Documentation">Token(s)/Prize(s) - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - - - - - - - - - - - - - - - - - - - - -
					</label>
				</div>
				<div class = "col-xs-3">
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price"  size = "20" maxlength = "60" value ="'.$row["ProgramInviExp"].'" disabled class="form-control">
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
				<th>Pieces</th>
				<th>Price</th>
				<th>Description</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Name"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Pcs"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
						<button name = "btn_del-Token" id ="btn_del-Token" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '<tr>
				<td><input required type = "text" placeholder ="Item name" id = "token-item" name = "token-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "number" placeholder ="Pieces" id = "token-pcs" name = "token-pcs" size = "20" maxlength = "60" value ="1" min = "0" class="form-control"></td>
				<td>
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "token-price" name = "token-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><input required type = "text" placeholder ="Description" id = "token-description" name = "token-description" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-Token" id ="btn_add-Token" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<div class = "form-group">
				<div class = "col-xs-9">
					<label for="Token">Token(s)/Prize(s) - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
					- - - - - - - - - - - - - - - - - - - - - - - -
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
				<th>Pieces</th>
				<th>Price</th>
				<th>Description</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input required type = "text" placeholder ="Item name" id = "token-item" name = "token-item" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input required type = "number" placeholder ="Pieces" id = "token-pcs" name = "token-pcs" size = "20" maxlength = "60" value ="1" min = "0" class="form-control"></td>
				<td>
					<div class="input-group">
					<span class="input-group-addon">₱</span>
            		<input required type = "number" placeholder ="Price" id = "token-price" name = "token-price" size = "20" maxlength = "60" value ="0.00" step= "0.01" class="form-control">
            		</div>
            	</td>
				<td><input required type = "text" placeholder ="Description" id = "token-description" name = "token-description" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-Token" id ="btn_add-Token" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
echo '</div>';
echo '<div class="form-group row">
              <div class="col-xs-3">
              </div>
              <div class="col-xs-3">
                <label class="checkbox-inline ">
                <input type="checkbox" autocomplete="off" value="">To be requested from MATPRO(for proposal requesting subsidy)
                </label>
              </div>
              <div class="col-xs-3">
                <label class="checkbox-inline ">
                <input type="checkbox" autocomplete="off" value="">To be Taken from School/College/Dept/Organization fund
                </label>
              </div>
            </div>';
?>

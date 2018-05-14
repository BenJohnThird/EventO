<?php
include('../Connection.php');
$sql = "SELECT * FROM ap_reservation where ap_reservation_main_ID = '".$_POST["id"]."' and Sector ='Physical Facilities'";
$result = mysqli_query($conn, $sql);
echo 'Please check the preferred seating style/arrangement for your activity/meeting/seminar';
if(mysqli_num_rows($result) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center">Please check the preferred seating style/arrangement for your activity/meeting/seminar</th>
			</tr>
			<tr>
				<th>Pieces</th>
				<th>Item</th>
				<th>Functions</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Pcs"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Subject"].'</td>
					<td>
							<button id ="btn_del-PhysicalFaciEquip" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
  echo '
		<tbody>
			<tr>
				<td><input type = "number" placeholder ="Pcs" id = "physicalfaciequip-pcs" min = "0" value ="" class="form-control"></td>
        <td>
            <select class="form-control" id = "physicalfaciequip-subject" >
              <option value="">Choose here...</option>
              <option value="Chair">Chairs</option>
              <option value="Tables">Tables</option>
              <option value="Lectern">Lectern</option>
              <option value="Panel/White Board">Panel/White Board</option>
              <option value = "Mini Stage">Mini Stage</option>
              <option value="CEU Flag">CEU Flag</option>
              <option value="Phil. Flag">Phil. Flag</option>
              <option value="Aircon">Aircon</option>
              <option value="Lights">Lights</option>
              <option value="Plants">Plants</option>
          </select>
        </td>
				<td><button type= "button" id ="btn_add-PhysicalFaciEquip" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
  echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center">Please check the preferred seating style/arrangement for your activity/meeting/seminar</th>
			</tr>
			<tr>
				<th>Pieces</th>
				<th>Item</th>
				<th>Functions</th>
			</tr>
		</thead>';
	echo '
		<tbody>
			<tr>
				<td><input type = "number" placeholder ="Pcs" id = "physicalfaciequip-pcs" min = "0" value ="" class="form-control"></td>
        <td>
            <select class="form-control" id = "physicalfaciequip-subject" >
              <option value="">Choose here...</option>
              <option value="Chair">Chairs</option>
              <option value="Tables">Tables</option>
              <option value="Lectern">Lectern</option>
              <option value="Panel/White Board">Panel/White Board</option>
              <option value = "Mini Stage">Mini Stage</option>
              <option value="CEU Flag">CEU Flag</option>
              <option value="Phil. Flag">Phil. Flag</option>
              <option value="Aircon">Aircon</option>
              <option value="Lights">Lights</option>
              <option value="Plants">Plants</option>
          </select>
        </td>
				<td><button type= "button" id ="btn_add-PhysicalFaciEquip" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

?>

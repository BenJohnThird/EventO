<?php
include('Connection.php');
$sql = "SELECT * FROM ap_reservation where ap_reservation_main_ID = '".$_POST["id"]."' and Sector ='TLTS'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
	echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center">Teaching and Learning Technology Department(Equipment and Materials)</th>
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
						<button id ="btn_del-TLTSEquip" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
  echo '
		<tbody>
			<tr>
				<td><input type = "number" placeholder ="Pcs" id = "tltsequip-pcs" min = "0" value ="" class="form-control"></td>
        <td>
            <select class="selectpicker form-control" id = "tltsequip-subject" >
              <option value="">Choose here...</option>
              <option value="CD/Casette Player">CD/Casette Player</option>
              <option value="Microphone/Karaoke">Microphone/Karaoke</option>
              <option value="DVD/VCD Player">DVD/VCD Player</option>
              <option value="Digital/Video Camera">Digital/Video Camera</option>
              <option value = "Laptop/Wide Screen">Laptop/Wide Screen</option>
              <option value="LCD/Overhead/Projector">LCD/Overhead/Projector</option>
          </select>
        </td>
				<td><button type= "button" id ="btn_add-TLTSEquip" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
  echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "3" class = "text-center">Teaching and Learning Technology Department(Equipment and Materials)</th>
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
				<td><input type = "number" placeholder ="Pcs" id = "tltsequip-pcs" min = "0" value ="" class="form-control"></td>
        <td>
        <select class="form-control" id = "tltsequip-subject" >
          <option value="">Choose here...</option>
          <option value="CD/Casette Player">CD/Casette Player</option>
          <option value="Microphone/Karaoke">Microphone/Karaoke</option>
          <option value="DVD/VCD Player">DVD/VCD Player</option>
          <option value="Digital/Video Camera">Digital/Video Camera</option>
          <option value = "Laptop/Wide Screen">Laptop/Wide Screen</option>
          <option value="LCD/Overhead/Projector">LCD/Overhead/Projector</option>
      </select>
        </td>
				<td><button type= "button" id ="btn_add-TLTSEquip" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';
?>

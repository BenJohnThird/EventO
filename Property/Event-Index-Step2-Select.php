<?php
include ('../Connection.php');
$sql = "SELECT * FROM `physicalfaci-dept` where ap_reservation_main_ID = '".$_POST["id"]."' and Request ='BMS'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
  echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "6" class = "text-center">Request for BMS Personnel Services</th>
			</tr>
			<tr>
				<th>Date</th>
				<th>Start</th>
				<th>End</th>
        <th>Payment</th>
        <th>No.of BMS Personnel</th>
        <th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result)){
    echo '
    <tbody>
         <td><input type="date"  id = "bms-date" value = "'.$row["Date"].'" class ="form-control"></td>
         <td><input type="time"  id = "bms-start" value = "'.$row["physical_start"].'" name = "end"   class ="form-control"></td>
         <td><input type="time"  id = "bms-end"  value = "'.$row["physical_end"].'"   class ="form-control"></td>
         <td><input type="number"  id = "bms-payment"  value = "'.$row["Rate"].'"   class ="form-control"></td>
         <td><input type="number"  id = "bms-no"  value = "'.$row["Pcs"].'"   class ="form-control"></td>
         <td>
         <button type= "button" id ="btn_add-Step2BMS" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
           <span class="glyphicon glyphicon-plus"></span> Update</button>
         </td>
     </tbody>';
		 }
 }
 else
 {
   echo '<table class = "table">
 		<thead>
 			<tr>
 				<th colspan = "6" class = "text-center">Request for BMS Personnel Services</th>
 			</tr>
 			<tr>
 				<th>Date</th>
 				<th>Start</th>
 				<th>End</th>
         <th>Payment</th>
         <th>No.of BMS Personnel</th>
         <th>Function</th>
 			</tr>
 		</thead>';
   echo '
   <tbody>
        <td><input type="date"  id = "bms-date"   class ="form-control"></td>
        <td><input type="time"  id = "bms-start" name = "end"   class ="form-control"></td>
        <td><input type="time"  id = "bms-end"     class ="form-control"></td>
        <td><input type="number"  id = "bms-payment"     class ="form-control"></td>
        <td><input type="number"  id = "bms-no"     class ="form-control"></td>
        <td>
        <button type= "button" id ="btn_add-Step2BMS" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
          <span class="glyphicon glyphicon-plus"></span> Update</button>
        </td>
    </tbody>';
 }
echo '<hr>';
 $sql = "SELECT * FROM `physicalfaci-dept` where ap_reservation_main_ID = '".$_POST["id"]."' and Request ='PPFD'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result) > 0){
   echo '<table class = "table">
 		<thead>
 			<tr>
 				<th colspan = "6" class = "text-center">Request for PPFD Duty Electrician</th>
 			</tr>
 			<tr>
 				<th>Date</th>
 				<th>Start</th>
 				<th>End</th>
         <th>Payment</th>
         <th>No.of BMS Personnel</th>
         <th>Function</th>
 			</tr>
 		</thead>';
 	while($row = mysqli_fetch_array($result)){
     echo '
     <tbody>
          <td><input type="date"  id = "ppfd-date" value = "'.$row["Date"].'" class ="form-control"></td>
          <td><input type="time"  id = "ppfd-start" value = "'.$row["physical_start"].'" name = "end"   class ="form-control"></td>
          <td><input type="time"  id = "ppfd-end"  value = "'.$row["physical_end"].'"   class ="form-control"></td>
          <td><input type="number"  id = "ppfd-payment"  value = "'.$row["Rate"].'"   class ="form-control"></td>
          <td><input type="number"  id = "ppfd-no"  value = "'.$row["Pcs"].'"   class ="form-control"></td>
          <td>
          <button type= "button" id ="btn_add-Step2" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
            <span class="glyphicon glyphicon-plus"></span> Update</button>
          </td>
      </tbody>';
 		 }
  }
else
{
  echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "6" class = "text-center">Request for PPFD Duty Electrician</th>
			</tr>
			<tr>
				<th>Date</th>
				<th>Start</th>
				<th>End</th>
        <th>Payment</th>
        <th>No.of PPDFD Electrician</th>
        <th>Function</th>
			</tr>
		</thead>';
    echo '
    <tbody>
         <td><input type="date"  id = "ppfd-date"   class ="form-control"></td>
         <td><input type="time"  id = "ppfd-start" name = "end"   class ="form-control"></td>
         <td><input type="time"  id = "ppfd-end"     class ="form-control"></td>
         <td><input type="number"  id = "ppfd-payment"     class ="form-control"></td>
         <td><input type="number"  id = "ppfd-no"     class ="form-control"></td>
         <td>
         <button type= "button" id ="btn_add-Step2" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
           <span class="glyphicon glyphicon-plus"></span> Update</button>
         </td>
     </tbody>';
}
?>

<?php
include ('../Connection.php');
date_default_timezone_set('Asia/Manila');
$today = date("F j, Y");
$sql = "SELECT * FROM `accounting-dept` where ap_reservation_main_ID = '".$_POST["id"]."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
  echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "5" class = "text-center">Accounting Department</th>
			</tr>
			<tr>
				<th>Rate</th>
				<th>Assessed by</th>
        <th>Total</th>
        <th>Date</th>
        <th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($result)){
    echo '
    <tbody>
        <tr>
            <td colspan = "5">To be filled out/computed if not subsidized (Type N.A on the blanks not applicable to you)
            </td>
          <tr>
        <tr>
           <td><input type="number" placeholder = "Rate" id = "accounting-rate" value = "'.$row["Rate"].'" class ="form-control"></td>
           <td><input type="text" placeholder = "Person" id = "accounting-person" value = "'.$row["school_individual_idschool_individual"].'" name = "end"   class ="form-control"></td>
           <td><input type="number" placeholder = "Total" id = "accounting-total"  value = "'.$row["Total"].'"   class ="form-control"></td>
           <td><input type="text" id = "accounting-date"  value = "'.$row["Date"].'"   class ="form-control"></td>
           <td>
           <button type= "button" id ="btn_add-Step3" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
             <span class="glyphicon glyphicon-plus"></span> Update</button>
           </td>
           </tr>
     </tbody>';
		 }
 }
 else
 {
    echo '<table class = "table">
    <thead>
      <tr>
        <th colspan = "5" class = "text-center">Accounting Department</th>
      </tr>
      <tr>
        <th>Rate</th>
        <th>Assessed by</th>
        <th>Total</th>
        <th>Date</th>
        <th>Function</th>
      </tr>
    </thead>';
   echo '
   <tbody>
      <tr>
        <td colspan = "5">To be filled out/computed if not subsidized (Type N.A on the blanks not applicable to you)
        </td>
      <tr>
      <tr>
        <td><input type="number" id = "accounting-rate"  placeholder = "Rate"  class ="form-control"></td>
        <td><input type="text" id = "accounting-person" name = "end" placeholder = "Person" class ="form-control"></td>
        <td><input type="number" id = "accounting-total"  placeholder = "Total" class ="form-control"></td>
        <td><input type="text"  id = "accounting-date" value = "'.$today.'"  class ="form-control"></td>
        <td>
        <button type= "button" id ="btn_add-Step3" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
           <span class="glyphicon glyphicon-plus"></span> Update</button>
         </td>
      </tr>
    </tbody>';
 }
echo '<hr>';
 ?>

<?php
include('Connection.php');
$sqlTotal = "SELECT sum(`pcs`*`price`) as TotalPrice from ap_expenses WHERE ap_id = '".$_POST["id"]."'";
$sqlTotalMaterials = "SELECT sum(`price`) as MaterialsExp from ap_exp_materials where ap_id = '".$_POST["id"]."'";
// FOR TOTAL
$resultTotal = mysqli_query($conn, $sqlTotal);
$resultTotalMaterials = mysqli_query($conn, $sqlTotalMaterials);

if(mysqli_num_rows($resultTotal) > 0)
{
  while($rowTotal = mysqli_fetch_array($resultTotal))
  {
    // FOR MATERIALS
    if(mysqli_num_rows($resultTotalMaterials) > 0)
    {
      while($rowTotalMaterials = mysqli_fetch_array($resultTotalMaterials))
      {
        $total = $rowTotal["TotalPrice"] + $rowTotalMaterials["MaterialsExp"];
        echo'
        <div class = "col-xs-9">
          <label for="Documentation"><kbd>TOTAL</kbd>
          </label>
        </div>
        <div class = "col-xs-3">
          <div class="input-group">
          <span class="input-group-addon">₱</span>
              <input required type = "text" placeholder ="Price"  value ="'.$total.'" disabled class="form-control">
          </div>
        </div>';
      }
    }
  }
}
else
{
  echo 'red';
}
?>


<?php
include ('Connection.php');
$sql = "SELECT * from ap_committees where ap_id = '".$_POST['id']."' group by Committee";
$result = mysqli_query($conn,$sql);
echo '
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Committees Progress</h4>
</div>
<div class="modal-body">
';
echo '<table class = "table">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center">Committes</th>
			</tr>
			<tr>
				<th>Committee</th>
				<th>Progress</th>
			</tr>
		</thead>';
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result))
	{
		echo '<tbody>
			<tr>
				<td>'.$row["Committee"].'</td>';
				if($row["Committees_Status"] == "Done")
				{
					echo'
					<td>
					<a id = "btn_committeesVerifiy" data-idcom ="'.$row["Committee"].'" data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span> Done</a>
					</td>';
				}
				else
				{
					echo'
					<td>
					<a id = "btn_committeesVerifiy" data-idcom ="'.$row["Committee"].'" data-id5="'.$row["ap_id"].'" class="btn btn-sm btn-danger">
							<span class="glyphicon glyphicon-plus-sign"></span> Not Done</a>
					</td>';
				}
				echo'
				</tr>
			</tbody>';
		}
	 }
	 else
	 {
		 echo '<tbody>
		 	<tr>
				<td colspan = "2" class = "text-center"> No committees entered in the activity proposal </td>
			</tr>
		 </tbody>';
	 }
	 echo '</table>';
	?>

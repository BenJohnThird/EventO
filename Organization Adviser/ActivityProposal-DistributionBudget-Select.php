<?php
include('Connection.php');
$sqlTotal = "SELECT sum(`pcs`*`price`) as TotalPrice from ap_expenses WHERE ap_id = '".$_POST["id"]."'";
// FOR EXPENSES TOTAL
$resultTotal = mysqli_query($conn, $sqlTotal);
// FOR DOCUMENTATION TOTAL
$sqlDocumentationTotal = "SELECT sum(`pcs`*`price`) as DocumentationExp from ap_expenses where Committees = 'Documentation' and ap_id = '".$_POST["id"]."'";
$resultDocumentationTotal = mysqli_query($conn, $sqlDocumentationTotal);
// FOR Food
$sqlFoodTotal = "SELECT sum(`pcs`*`price`) as FoodExp from ap_expenses where Committees = 'Food' and ap_id = '".$_POST["id"]."'";
$resultFoodTotal = mysqli_query($conn, $sqlFoodTotal);
// FOR Materials
$sqlMaterialsTotal = "SELECT sum(`price`) as MaterialsExp from ap_exp_materials where ap_id = '".$_POST["id"]."'";
$resultMaterialsTotal = mysqli_query($conn, $sqlMaterialsTotal);
// FOR HONORARIUM
$sqlHonorariumTotal = "SELECT sum(`pcs`*`price`) as HonorariumExp from ap_expenses where Committees = 'Honorarium' and ap_id = '".$_POST["id"]."'";
$resultHonorariumTotal = mysqli_query($conn, $sqlHonorariumTotal);
// FOR PROGRAM AND INVITATION
$sqlProgramTotal = "SELECT sum(`pcs`*`price`) as ProgramInviExp from ap_expenses where Committees = 'ProgramInvi' and ap_id = '".$_POST["id"]."'";
$resultProgramTotal = mysqli_query($conn, $sqlProgramTotal);
// FOR Token
$sqlTokenTotal = "SELECT sum(`pcs`*`price`) as TokenExp from ap_expenses where Committees = 'Token' and ap_id = '".$_POST["id"]."'";
$resultTokenTotal = mysqli_query($conn, $sqlTokenTotal);
// FOR Others
$sqlOthersTotal = "SELECT sum(`pcs`*`price`) as OthersExp from ap_expenses where Committees = 'Others' and ap_id = '".$_POST["id"]."'";
$resultOthersTotal = mysqli_query($conn, $sqlOthersTotal);
// FOR Venue
$sqlVenueTotal = "SELECT sum(`pcs`*`price`) as VenueExp from ap_expenses where Committees = 'Venue' and ap_id = '".$_POST["id"]."'";
$resultVenueTotal = mysqli_query($conn, $sqlVenueTotal);
// FOR Energy Fee
$sqlEnergyTotal = "SELECT sum(`pcs`*`price`) as EnergyExp from ap_expenses where Committees = 'Energy' and ap_id = '".$_POST["id"]."'";
$resultEnergyTotal = mysqli_query($conn, $sqlEnergyTotal);
// FOR TRANSPORTATION
$sqlTransportationTotal = "SELECT sum(`pcs`*`price`) as TransportationExp from ap_expenses where Committees = 'Transportation' and ap_id = '".$_POST["id"]."'";
$resultTransportationTotal = mysqli_query($conn, $sqlTransportationTotal);
// FOR Contingency
$sqlContingencyTotal = "SELECT sum(`pcs`*`price`) as ContingencyExp from ap_expenses where Committees = 'Contingency' and ap_id = '".$_POST["id"]."'";
$resultContingencyTotal = mysqli_query($conn, $sqlContingencyTotal);

$sqldistribution = "SELECT * FROM ap_distributionbudget where ap_id = '".$_POST["id"]."'";
$result = mysqli_query($conn, $sqldistribution);

// FOR DISTRIBUTION OF DOCUMENTATION
$sqlDistributionDocu = "SELECT * FROM ap_distributionbudget where Committees = 'Documentation' and ap_id = '".$_POST["id"]."'";
$resultDocu = mysqli_query($conn, $sqlDistributionDocu);
if(mysqli_num_rows($resultDocu) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Documentation</th>';
				if(mysqli_num_rows($resultDocumentationTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDocumentationTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["DocumentationExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultDocu))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DescriptionBudgetDocu" id ="btn_del-DescriptionBudgetDocu" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button name = "btn_add-DistributionBudgetDocu" id ="btn_add-DistributionBudgetDocu" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Documentation</th>';
				if(mysqli_num_rows($resultDocumentationTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDocumentationTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["DocumentationExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-DistributionBudgetDocu" id ="btn_add-DistributionBudgetDocu" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF FOOD
$sqlDistributionFood = "SELECT * FROM ap_distributionbudget where Committees = 'Food' and ap_id = '".$_POST["id"]."'";
$resultFood = mysqli_query($conn, $sqlDistributionFood);
if(mysqli_num_rows($resultFood) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Food</th>';
				if(mysqli_num_rows($resultFoodTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultFoodTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["FoodExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultFood))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DescriptionBudgetFood" id ="btn_del-DescriptionBudgetFood" data-idunique = "'.$row["ID"].'"class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-DistributionBudgetFood" id ="btn_add-DistributionBudgetFood" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Food</th>';
				if(mysqli_num_rows($resultFoodTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultFoodTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["FoodExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button name = "btn_add-DistributionBudgetFood" id ="btn_add-DistributionBudgetFood" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF MATERIALS
$sqlDistributionMaterials = "SELECT * FROM ap_distributionbudget where Committees = 'Materials' and ap_id = '".$_POST["id"]."'";
$resultMaterials = mysqli_query($conn, $sqlDistributionMaterials);
if(mysqli_num_rows($resultMaterials) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Materials</th>';
				if(mysqli_num_rows($resultMaterialsTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultMaterialsTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["MaterialsExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultMaterials))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button id ="btn_del-DescriptionBudgetMaterials" data-idunique = "'.$row["ID"].'"class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetMaterials" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Materials</th>';
				if(mysqli_num_rows($resultMaterialsTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultMaterialsTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["MaterialsExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetMaterials" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF HONORARIUM
$sqlDistributionHonorarium = "SELECT * FROM ap_distributionbudget where Committees = 'Honorarium' and ap_id = '".$_POST["id"]."'";
$resultHonararium = mysqli_query($conn, $sqlDistributionHonorarium);
if(mysqli_num_rows($resultHonararium) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Honorarium</th>';
				if(mysqli_num_rows($resultHonorariumTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultHonorariumTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["HonorariumExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultHonararium))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DescriptionBudgetHonorarium" id ="btn_del-DescriptionBudgetHonorarium" data-idunique = "'.$row["ID"].'"class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetHonorarium" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Honorarium</th>';
				if(mysqli_num_rows($resultHonorariumTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultHonorariumTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["HonorariumExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetHonorarium" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF PROGRAM AND INVITATION
$sqlDistributionProgramInvi = "SELECT * FROM ap_distributionbudget where Committees = 'ProgramInvi' and ap_id = '".$_POST["id"]."'";
$resultProgramInvi = mysqli_query($conn, $sqlDistributionProgramInvi);
if(mysqli_num_rows($resultProgramInvi) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Program and Invitation</th>';
				if(mysqli_num_rows($resultProgramTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultProgramTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["ProgramInviExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultProgramInvi))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button id ="btn_del-DescriptionBudgetProgramInvi" data-idunique = "'.$row["ID"].'"class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetProgramInvi" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Program and Invitation</th>';
				if(mysqli_num_rows($resultProgramTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultProgramTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["ProgramInviExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetProgramInvi" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF TOKEN AND PRIZES
$sqlDistributionToken = "SELECT * FROM ap_distributionbudget where Committees = 'Token' and ap_id = '".$_POST["id"]."'";
$resultToken = mysqli_query($conn, $sqlDistributionToken);
if(mysqli_num_rows($resultToken) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Token/Prizes</th>';
				if(mysqli_num_rows($resultTokenTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultTokenTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["TokenExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultToken))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button id ="btn_del-DescriptionBudgetToken" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetToken" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Token/Prizes</th>';
				if(mysqli_num_rows($resultTokenTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultTokenTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["TokenExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetToken" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF OTHERS
$sqlDistributionOthers = "SELECT * FROM ap_distributionbudget where Committees = 'Others' and ap_id = '".$_POST["id"]."'";
$resultOthers = mysqli_query($conn, $sqlDistributionOthers);
if(mysqli_num_rows($resultOthers) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Others</th>';
				if(mysqli_num_rows($resultOthersTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultOthersTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["OthersExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultOthers))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button  id ="btn_del-DescriptionBudgetOthers" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetOthers" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Others</th>';
				if(mysqli_num_rows($resultOthersTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultOthersTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["OthersExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetOthers" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF VENUE
$sqlVenueOthers = "SELECT * FROM ap_distributionbudget where Committees = 'Venue' and ap_id = '".$_POST["id"]."'";
$resultVenue = mysqli_query($conn, $sqlVenueOthers);
if(mysqli_num_rows($resultVenue) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Venue</th>';
				if(mysqli_num_rows($resultVenueTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultVenueTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["VenueExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultVenue))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button id ="btn_del-DescriptionBudgetVenue" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetVenue" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Venue</th>';
				if(mysqli_num_rows($resultVenueTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultVenueTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["VenueExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetVenue" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF ENERGY
$sqlEnergyOthers = "SELECT * FROM ap_distributionbudget where Committees = 'Energy' and ap_id = '".$_POST["id"]."'";
$resultEnergy = mysqli_query($conn, $sqlEnergyOthers);
if(mysqli_num_rows($resultEnergy) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Energy</th>';
				if(mysqli_num_rows($resultEnergyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultEnergyTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["EnergyExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultEnergy))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button id ="btn_del-DescriptionBudgetEnergy" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetEnergy" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Energy</th>';
				if(mysqli_num_rows($resultEnergyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultEnergyTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["EnergyExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetEnergy" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF TRANSPORTATION
$sqlDistributionTranspo = "SELECT * FROM ap_distributionbudget where Committees = 'Transportation' and ap_id = '".$_POST["id"]."'";
$resultTranpostation = mysqli_query($conn, $sqlDistributionTranspo);
if(mysqli_num_rows($resultTranpostation) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Transportation</th>';
				if(mysqli_num_rows($resultTransportationTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultTransportationTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["TransportationExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultTranpostation))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button id ="btn_del-DescriptionBudgetTransportation" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetTransportation" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Transporation</th>';
				if(mysqli_num_rows($resultTransportationTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultTransportationTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["TransportationExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetTransportation" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISTRIBUTION OF CONTINGENCY
$sqlDistributionContingency = "SELECT * FROM ap_distributionbudget where Committees = 'Contingency' and ap_id = '".$_POST["id"]."'";
$resultContingency = mysqli_query($conn, $sqlDistributionContingency);
if(mysqli_num_rows($resultContingency) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Contingency</th>';
				if(mysqli_num_rows($resultContingencyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultContingencyTotal))
					{
						echo '<th><input type = "text" readonly value ="'.$row["ContingencyExp"].'" class="form-control"></th>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultContingency))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Distributor"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Amount"].'</td>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button id ="btn_del-DescriptionBudgetContingency" data-idunique = "'.$row["ID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Delete</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" id = "distribution_amount-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetContingency" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center"><kbd>Distribution</kbd> of Budget</th>
				<th class = "text-center">Allotted budget for Contingency</th>';
				if(mysqli_num_rows($resultContingencyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultContingencyTotal))
					{
						echo '<td><input type = "text" readonly value ="'.$row["ContingencyExp"].'" class="form-control"></td>';
					}
				}
			echo'
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "text" placeholder ="Fund from.." id = "distribution_distributor-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "number" placeholder ="Amount" min="0" step="0.01" id = "distribution_amount-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description" id = "distribution_description-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><button id ="btn_add-DistributionBudgetContingency" data-id6 = "'.$_POST["id"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR TOTAL PRICES OF Distributor
$sqlTotalDistributor = "SELECT `Distributor`, sum(`Amount`) as Amount FROM `ap_distributionbudget` where ap_id = '".$_POST["id"]."'  GROUP BY `Distributor`";
$resultDistributor = mysqli_query($conn, $sqlTotalDistributor);
if(mysqli_num_rows($resultDistributor) > 0 )
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center">TOTAL BUDGET OF DISTRIBUTOR</th>
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultDistributor))
	{
		echo '
			<tbody>
			<tr>
					<td>' .$row["Distributor"].'</td>
					<td>' .$row["Amount"].'</td>
			</tr>';
	}
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-center">TOTAL BUDGET OF DISTRIBUTOR</th>
			</tr>
			<tr>
				<th>Distributor</th>
				<th>Amount</th>
			</tr>
		</thead>';
		echo '
			<tbody>
			<tr>
					<td colspan = "2">There are no amount yet. </td>
			</tr>';
}
?>

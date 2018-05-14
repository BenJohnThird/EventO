<?php
include ('Connection.php');
session_start();
// THIS WILL CHECK THE STATUS OF THE FINANCIAL DISBURSEMENT
$sqlFinancialDisbursement = "SELECT *,ap_financial_disbursement.ID as 'Reserve' 
FROM ((events INNER JOIN activityproposal ON events.id = activityproposal.events_id)
INNER JOIN ap_financial_disbursement ON ap_financial_disbursement.ap_id = activityproposal.ap_id)
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
inner join users on users.ID = student_council.users_ID
where  ap_financial_disbursement.ap_id = '".$_POST["id"]."' group by title";
$resultFinancialDisbursement = mysqli_query($conn,$sqlFinancialDisbursement);
// ITO NAMAN PARA IPAKITA YUNG NOTES OR STATUS NUNG FINANCIAL DISBURSEMENT


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

// FOR DISBURSEMENT OF DOCUMENTATION
$sqlDistributionDocu = "SELECT * FROM `ap_consumption` where Committees = 'Documentation' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDocu = mysqli_query($conn, $sqlDistributionDocu);
// FOR TOTAL
$sqlDistributionDocuTotal = "SELECT sum(Price) as DocuTotal FROM `ap_consumption` where Committees = 'Documentation' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDocuTotal = mysqli_query($conn, $sqlDistributionDocuTotal);
if(mysqli_num_rows($resultDocu) > 0 )
{
	$DocuExp = 0;
	$DocuBudget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Documentation</th>';
				if(mysqli_num_rows($resultDocumentationTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDocumentationTotal))
					{
						$DocuBudget = $row["DocumentationExp"];
						echo '<th><input type = "text" readonly value ="'.$row["DocumentationExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Documentation</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDocuTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDocuTotal))
					{
						$DocuExp = $row["DocuTotal"];
					}
				}
				$Total = $DocuBudget - $DocuExp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultDocu))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementDocu" id ="btn_del-DisbursementDocu" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementDocu" id ="btn_add-DisbursementDocu" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Documentation</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Docu" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementDocu" id ="btn_add-DisbursementDocu" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF FOOD
$sqlDistributionFood = "SELECT * FROM `ap_consumption` where Committees = 'Food' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultFood = mysqli_query($conn, $sqlDistributionFood);
// FOR TOTAL
$sqlDistributionFoodTotal = "SELECT sum(Price) as FoodTotal FROM `ap_consumption` where Committees = 'Food' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementFoodTotal = mysqli_query($conn, $sqlDistributionFoodTotal);
if(mysqli_num_rows($resultFood) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Food</th>';
				if(mysqli_num_rows($resultFoodTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultFoodTotal))
					{
						$Budget = $row["FoodExp"];
						echo '<th><input type = "text" readonly value ="'.$row["FoodExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Food</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementFoodTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementFoodTotal))
					{
						$Exp = $row["FoodTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultFood))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementFood" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementFood" id ="btn_add-DisbursementFood" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Food</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Food" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementFood" id ="btn_add-DisbursementFood" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF MATERIALS
$sqlDistributionMaterials = "SELECT * FROM `ap_consumption` where Committees = 'Materials' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultMaterials = mysqli_query($conn, $sqlDistributionMaterials);
// FOR TOTAL
$sqlDistributionMaterialsTotal = "SELECT sum(Price) as MaterialsTotal FROM `ap_consumption` where Committees = 'Materials' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementMaterialsTotal = mysqli_query($conn, $sqlDistributionMaterialsTotal);
if(mysqli_num_rows($resultMaterials) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Materials</th>';
				if(mysqli_num_rows($resultMaterialsTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultMaterialsTotal))
					{
						$Budget = $row["MaterialsExp"];
						echo '<th><input type = "text" readonly value ="'.$row["MaterialsExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Materials</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementMaterialsTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementMaterialsTotal))
					{
						$Exp = $row["MaterialsTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultMaterials))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementMaterials" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementMaterials" id ="btn_add-DisbursementMaterials" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Material</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Materials" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementMaterials" id ="btn_add-DisbursementMaterials" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF HONORARIUM
$sqlDistributionHonorarium = "SELECT * FROM `ap_consumption` where Committees = 'Honorarium' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultHonorarium = mysqli_query($conn, $sqlDistributionHonorarium);
// FOR TOTAL
$sqlDistributionHonorariumTotal = "SELECT sum(Price) as HonorariumTotal FROM `ap_consumption` where Committees = 'Honorarium' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementHonorariumTotal = mysqli_query($conn, $sqlDistributionHonorariumTotal);
if(mysqli_num_rows($resultHonorarium) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Honorarium</th>';
				if(mysqli_num_rows($resultHonorariumTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultHonorariumTotal))
					{
						$Budget = $row["HonorariumExp"];
						echo '<th><input type = "text" readonly value ="'.$row["HonorariumExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Honorarium</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementHonorariumTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementHonorariumTotal))
					{
						$Exp = $row["HonorariumTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultHonorarium))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementHonorarium" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementHonorarium" id ="btn_add-DisbursementHonorarium" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Honorarium</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Honorarium" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementHonorarium" id ="btn_add-DisbursementHonorarium" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF PROGRAM AND INVI
$sqlDistributionProgramInvi = "SELECT * FROM `ap_consumption` where Committees = 'ProgramInvi' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultProgramInvi = mysqli_query($conn, $sqlDistributionProgramInvi);
// FOR TOTAL
$sqlDistributionProgramInviTotal = "SELECT sum(Price) as ProgramInviTotal FROM `ap_consumption` where Committees = 'ProgramInvi' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementProgramInviTotal = mysqli_query($conn, $sqlDistributionProgramInviTotal);
if(mysqli_num_rows($resultProgramInvi) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for ProgramInvi</th>';
				if(mysqli_num_rows($resultProgramTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultProgramTotal))
					{
						$Budget = $row["ProgramInviExp"];
						echo '<th><input type = "text" readonly value ="'.$row["ProgramInviExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Program and Invitation</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementProgramInviTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementProgramInviTotal))
					{
						$Exp = $row["ProgramInviTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultProgramInvi))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementProgramInvi" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementProgramInvi" id ="btn_add-DisbursementProgramInvi" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Program and Invitation</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-ProgramInvi" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementProgramInvi" id ="btn_add-DisbursementProgramInvi" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF TOKEN/PRIZES
$sqlDistributionToken = "SELECT * FROM `ap_consumption` where Committees = 'Token' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultToken = mysqli_query($conn, $sqlDistributionToken);
// FOR TOTAL
$sqlDistributionTokenTotal = "SELECT sum(Price) as TokenTotal FROM `ap_consumption` where Committees = 'Token' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementTokenTotal = mysqli_query($conn, $sqlDistributionTokenTotal);
if(mysqli_num_rows($resultToken) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Token</th>';
				if(mysqli_num_rows($resultTokenTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultTokenTotal))
					{
						$Budget = $row["TokenExp"];
						echo '<th><input type = "text" readonly value ="'.$row["TokenExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Token</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementTokenTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementTokenTotal))
					{
						$Exp = $row["TokenTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultToken))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementToken" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementToken" id ="btn_add-DisbursementToken" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Token</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Token" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementToken" id ="btn_add-DisbursementToken" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF OTHERS
$sqlDistributionOthers = "SELECT * FROM `ap_consumption` where Committees = 'Others' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultOthers = mysqli_query($conn, $sqlDistributionOthers);
// FOR TOTAL
$sqlDistributionOthersTotal = "SELECT sum(Price) as OthersTotal FROM `ap_consumption` where Committees = 'Others' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementOthersTotal = mysqli_query($conn, $sqlDistributionOthersTotal);
if(mysqli_num_rows($resultOthers) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Others</th>';
				if(mysqli_num_rows($resultOthersTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultOthersTotal))
					{
						$Budget = $row["OthersExp"];
						echo '<th><input type = "text" readonly value ="'.$row["OthersExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense forOthers</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementOthersTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementOthersTotal))
					{
						$Exp = $row["OthersTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultOthers))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementOthers" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementOthers" id ="btn_add-DisbursementOthers" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Others</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Others" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementOthers" id ="btn_add-DisbursementOthers" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF VENUE
$sqlDistributionVenue = "SELECT * FROM `ap_consumption` where Committees = 'Venue' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultVenue = mysqli_query($conn, $sqlDistributionVenue);
// FOR TOTAL
$sqlDistributionVenueTotal = "SELECT sum(Price) as VenueTotal FROM `ap_consumption` where Committees = 'Venue' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementVenueTotal = mysqli_query($conn, $sqlDistributionVenueTotal);
if(mysqli_num_rows($resultVenue) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Venue</th>';
				if(mysqli_num_rows($resultVenueTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultVenueTotal))
					{
						$Budget = $row["VenueExp"];
						echo '<th><input type = "text" readonly value ="'.$row["VenueExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Venue</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementVenueTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementVenueTotal))
					{
						$Exp = $row["VenueTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultVenue))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementVenue" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementVenue" id ="btn_add-DisbursementVenue" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button>
				</td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Venue</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Venue" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementVenue" id ="btn_add-DisbursementVenue" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF ENERGY
$sqlDistributionEnergy = "SELECT * FROM `ap_consumption` where Committees = 'Energy' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultEnergy = mysqli_query($conn, $sqlDistributionEnergy);
// FOR TOTAL
$sqlDistributionEnergyTotal = "SELECT sum(Price) as EnergyTotal FROM `ap_consumption` where Committees = 'Energy' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementEnergyTotal = mysqli_query($conn, $sqlDistributionEnergyTotal);
if(mysqli_num_rows($resultEnergy) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Energy</th>';
				if(mysqli_num_rows($resultEnergyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultEnergyTotal))
					{
						$Budget = $row["EnergyExp"];
						echo '<th><input type = "text" readonly value ="'.$row["EnergyExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Energy</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementEnergyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementEnergyTotal))
					{
						$Exp = $row["EnergyTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultEnergy))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementEnergy" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementEnergy" id ="btn_add-DisbursementEnergy" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Energy</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Energy" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementEnergy" id ="btn_add-DisbursementEnergy" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF TRANSPORTATION
$sqlDistributionTransportation = "SELECT * FROM `ap_consumption` where Committees = 'Transportation' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultTransportation = mysqli_query($conn, $sqlDistributionTransportation);
// FOR TOTAL
$sqlDistributionTransportationTotal = "SELECT sum(Price) as TransportationTotal FROM `ap_consumption` where Committees = 'Transportation' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementTransportationTotal = mysqli_query($conn, $sqlDistributionTransportationTotal);
if(mysqli_num_rows($resultTransportation) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Transportation</th>';
				if(mysqli_num_rows($resultTransportationTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultTransportationTotal))
					{
						$Budget = $row["TransportationExp"];
						echo '<th><input type = "text" readonly value ="'.$row["TransportationExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Transportation</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementTransportationTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementTransportationTotal))
					{
						$Exp = $row["TransportationTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultTransportation))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementTransportation" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementTransportation" id ="btn_add-DisbursementTransportation" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Transportation</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Transportation" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementTransportation" id ="btn_add-DisbursementTransportation" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// FOR DISBURSEMENT OF CONTINGENCY
$sqlDistributionContingency = "SELECT * FROM `ap_consumption` where Committees = 'Contingency' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultContingency = mysqli_query($conn, $sqlDistributionContingency);
// FOR TOTAL
$sqlDistributionContingencyTotal = "SELECT sum(Price) as ContingencyTotal FROM `ap_consumption` where Committees = 'Contingency' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementContingencyTotal = mysqli_query($conn, $sqlDistributionContingencyTotal);
if(mysqli_num_rows($resultContingency) > 0 )
{
	$Exp = 0;
	$Budget = 0;
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th class = "text-center">Allotted budget for Contingency</th>';
				if(mysqli_num_rows($resultContingencyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultContingencyTotal))
					{
						$Budget = $row["ContingencyExp"];
						echo '<th><input type = "text" readonly value ="'.$row["ContingencyExp"].'" class="form-control"></th>';
					}
				}
			echo'
				<th class = "text-right">Actual Expense for Contingency</th>';
				// IF MERON YUNG TOTAL BUDGET FOR EXPENSES
				if(mysqli_num_rows($resultDisbursementContingencyTotal) > 0 )
				{
					while($row = mysqli_fetch_array($resultDisbursementContingencyTotal))
					{
						$Exp = $row["ContingencyTotal"];
					}
				}
				$Total = $Budget - $Exp;
				echo '<th><input type = "text" readonly value ="'.$Total.'" class="form-control"></th>
			</tr>
			<tr>
				<th>Amount</th>
				<th colspan = "2">Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	while($row = mysqli_fetch_array($resultContingency))
	{
		echo '
			<tbody>
			<tr>
					<td  data-idpass ="'.$row["ID"].'">' .$row["Price"].'</td>
					<td colspan = "2" data-idpass ="'.$row["ID"].'">' .$row["Description"].'</td>
					<td>
					<button name = "btn_del-DisbursementFood" id ="btn_del-DisbursementContingency" data-idunique = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-remove"></span> Remove</button>
					</td>
			</tr>';
	}
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td colspan = "2"><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementContingency" id ="btn_add-DisbursementContingency" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
else
{
	echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th colspan = "2" class = "text-right">Allotted budget for Contingency</th>';
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
				<th>Amount</th>
				<th>Description</th>
				<th>Function</th>
			</tr>
		</thead>';
	echo '
			<tr>
				<td><input type = "number" placeholder ="Amount" id = "disbursement_amount-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td><input type = "text" placeholder ="Description if needed" id = "disbursement_description-Contingency" size = "20" maxlength = "60" value ="" class="form-control"></td>
				<td>
				<button type="button" name = "btn_add-DisbursementContingency" id ="btn_add-DisbursementContingency" data-id6 = "'.$_POST["DisbursementID"].'" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-plus"></span> Add</button></td>
			</tr>
		</tbody>';
}
echo '</table>';

// ITO NAMAN PARA IPAKITA YUNG NOTES OR STATUS NUNG FINANCIAL DISBURSEMENT
if(mysqli_num_rows($resultFinancialDisbursement) > 0){
	while($row = mysqli_fetch_array($resultFinancialDisbursement))
	{
	 echo'<form>
	 	<div class="form-group">
	          <label for="Room">Notes:</label><br>
	          <textarea rows="6" cols="120" id = "notes" class= "form-control" name="notes" placeholder="Comments/Suggestions here..." >'.$row["ap_financial_disbursement_notes"].'</textarea>
	        </div>
	      <div class="form-group">
	       <div class ="Name" style ="text-align:center; align-items:center;">
	          <button type= "button" id ="btn_add-FinancialDisbursement" data-id5="'.$row["Reserve"].'">Add</button>
	          <input name="reset" type="reset" id = "btn_reset" />
	        </div>
	      </div>';
	    echo' </form>';
	 }
 }
 else
 {
 	echo'<form>
 	   <div class="form-group">
	          <label for="Room">Notes:</label><br>
	          <textarea rows="6" cols="120" id = "notes" class= "form-control" name="notes" placeholder="Comments/Suggestions here..." ></textarea>
	        </div>
	      <div class="form-group">
	       <div class ="Name" style ="text-align:center; align-items:center;">
	          <button type= "button" id ="btn_add-FinancialDisbursement" data-id5="'.$row["Reserve"].'">Add</button>
	          <input name="reset" type="reset" id = "btn_reset" />
	        </div>
	      </div>';
	    echo' </form>';
 }
?>

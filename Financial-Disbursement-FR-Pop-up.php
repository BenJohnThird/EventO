<?php
include ('Connection.php');
session_start();
// THIS WILL CHECK THE STATUS OF THE FINANCIAL DISBURSEMENT
$sqlFinancialReport = "SELECT *,ap_financial_report.ID as 'Reserve'
FROM organization inner join student_council on student_council.organization_ID = organization.ID
inner join events on student_council.idstudent_council = events.student_council_idstudent_council
inner join activityproposal on events.id = activityproposal.events_id
INNER JOIN ap_reservation_main ON ap_reservation_main.ap_id = activityproposal.ap_id
INNER JOIN ap_financial_report ON ap_financial_report.ap_id = activityproposal.ap_id 
where student_council.organization_ID = '".$_SESSION['OrgID']."'
and ap_financial_report.ID = '".$_POST["ReportID"]."' group by title";
$resultFinancialReport = mysqli_query($conn,$sqlFinancialReport);
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


echo '<table class = "table table-responsive">
		<thead>
			<tr>
				<th><th>
				<th>Approved Budget</th>
				<th>Actual Expenses</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan = "2">Documentation</td>';
// FOR APPROVED BUDGET //DOCUMENTATION
if(mysqli_num_rows($resultDocumentationTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDocumentationTotal))
	{
		echo '<td>'.$row["DocumentationExp"].'</td>';
	}
}

// FOR TOTAL
$sqlDistributionDocuTotal = "SELECT sum(Price) as DocuTotal FROM `ap_consumption` where Committees = 'Documentation' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDocuTotal = mysqli_query($conn, $sqlDistributionDocuTotal);	
if(mysqli_num_rows($resultDocuTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDocuTotal))
	{
		echo '<td>'.$row["DocuTotal"].'</td>';
	}
}	

echo'</tr>
			<tr>
				<td colspan = "2">Food/Refreshments</td>';
// FOR APPROVED BUDGET //FOOD AND REFRESHMENTS
if(mysqli_num_rows($resultFoodTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultFoodTotal))
	{
		echo '<td>'.$row["FoodExp"].'</td>';
	}
}

// FOR TOTAL
$sqlDistributionFoodTotal = "SELECT sum(Price) as FoodTotal FROM `ap_consumption` where Committees = 'Food' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementFoodTotal = mysqli_query($conn, $sqlDistributionFoodTotal);
if(mysqli_num_rows($resultDisbursementFoodTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementFoodTotal))
	{
		echo '<td>'.$row["FoodTotal"].'</td>';
	}
}	

echo'</tr>
			<tr>
				<td colspan = "2">Program and Invitation</td>';
// FOR APPROVED BUDGET //PROGRAM AND INVITATION
if(mysqli_num_rows($resultProgramTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultProgramTotal))
	{
		echo '<td>'.$row["ProgramInviExp"].'</td>';
	}
}

// FOR TOTAL
$sqlDistributionProgramInviTotal = "SELECT sum(Price) as ProgramInviTotal FROM `ap_consumption` where Committees = 'ProgramInvi' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementProgramInviTotal = mysqli_query($conn, $sqlDistributionProgramInviTotal);
if(mysqli_num_rows($resultDisbursementProgramInviTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementProgramInviTotal))
	{
		echo '<td>'.$row["ProgramInviTotal"].'</td>';
	}
}	

echo'</tr>
		<tr>
			<td colspan = "4">Certificates</td>
		</tr>
			<tr>
				<td colspan = "2">Venue</td>';
// FOR APPROVED BUDGET //VENUE
if(mysqli_num_rows($resultVenueTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultVenueTotal))
	{
		echo '<td>'.$row["VenueExp"].'</td>';
	}
}
// FOR TOTAL
$sqlDistributionVenueTotal = "SELECT sum(Price) as VenueTotal FROM `ap_consumption` where Committees = 'Venue' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementVenueTotal = mysqli_query($conn, $sqlDistributionVenueTotal);
if(mysqli_num_rows($resultDisbursementVenueTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementVenueTotal))
	{
		echo '<td>'.$row["VenueTotal"].'</td>';
	}
}	

echo'</tr>
			<tr>
				<td colspan = "2">Honorarium</td>';
// FOR APPROVED BUDGET //HONORARIUM
if(mysqli_num_rows($resultHonorariumTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultHonorariumTotal))
	{
		echo '<td>'.$row["HonorariumExp"].'</td>';
	}
}
// FOR TOTAL
$sqlDistributionHonorariumTotal = "SELECT sum(Price) as HonorariumTotal FROM `ap_consumption` where Committees = 'Honorarium' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementHonorariumTotal = mysqli_query($conn, $sqlDistributionHonorariumTotal);
if(mysqli_num_rows($resultDisbursementHonorariumTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementHonorariumTotal))
	{
		echo '<td>'.$row["HonorariumTotal"].'</td>';
	}
}

echo'</tr>
			<tr>
				<td colspan = "2">Token(s)/Prizes</td>';
// FOR APPROVED BUDGET //TOKEN
if(mysqli_num_rows($resultTokenTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultTokenTotal))
	{
		echo '<td>'.$row["TokenExp"].'</td>';
	}
}
// FOR TOTAL
$sqlDistributionTokenTotal = "SELECT sum(Price) as TokenTotal FROM `ap_consumption` where Committees = 'Token' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementTokenTotal = mysqli_query($conn, $sqlDistributionTokenTotal);
if(mysqli_num_rows($resultDisbursementTokenTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementTokenTotal))
	{
		echo '<td>'.$row["TokenTotal"].'</td>';
	}
}

echo'</tr>
			<tr>
				<td colspan = "2">Evaluation</td>
				<td></td>
				<td>Actual Expenses</td>
			</tr>

			<tr>
				<td colspan = "2">Transportation</td>';
// FOR APPROVED BUDGET //TRANSPORTATION
if(mysqli_num_rows($resultTransportationTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultTransportationTotal))
	{
		echo '<td>'.$row["TransportationExp"].'</td>';
	}
}
// FOR TOTAL
$sqlDistributionTransportationTotal = "SELECT sum(Price) as TransportationTotal FROM `ap_consumption` where Committees = 'Transportation' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementTransportationTotal = mysqli_query($conn, $sqlDistributionTransportationTotal);
if(mysqli_num_rows($resultDisbursementTransportationTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementTransportationTotal))
	{
		echo '<td>'.$row["TransportationTotal"].'</td>';
	}
}
	
echo'</tr>		
			<tr>
				<td colspan = "2">Materials</td>';
// FOR APPROVED BUDGET //MATERIALS
if(mysqli_num_rows($resultMaterialsTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultMaterialsTotal))
	{
		echo '<td>'.$row["MaterialsExp"].'</td>';
	}
}
// FOR TOTAL
$sqlDistributionMaterialsTotal = "SELECT sum(Price) as MaterialsTotal FROM `ap_consumption` where Committees = 'Materials' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementMaterialsTotal = mysqli_query($conn, $sqlDistributionMaterialsTotal);
if(mysqli_num_rows($resultDisbursementMaterialsTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementMaterialsTotal))
	{
		echo '<td>'.$row["MaterialsTotal"].'</td>';
	}
}
	
echo'</tr>

<tr>
				<td colspan = "2">Others (Please Specify</td>';
// FOR APPROVED BUDGET //OTHERS
if(mysqli_num_rows($resultOthersTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultOthersTotal))
	{
		echo '<td>'.$row["OthersExp"].'</td>';
	}
}
// FOR TOTAL
$sqlDistributionOthersTotal = "SELECT sum(Price) as OthersTotal FROM `ap_consumption` where Committees = 'Others' 
and ap_financial_disbursement_ID = '".$_POST["DisbursementID"]."'";
$resultDisbursementOthersTotal = mysqli_query($conn, $sqlDistributionOthersTotal);
if(mysqli_num_rows($resultDisbursementOthersTotal) > 0 )
{
	while($row = mysqli_fetch_array($resultDisbursementOthersTotal))
	{
		echo '<td>'.$row["OthersTotal"].'</td>';
	}
}
	
echo'</tr>
		</tbody>
	</table>';






// ITO NAMAN PARA IPAKITA YUNG NOTES OR STATUS NUNG FINANCIAL DISBURSEMENT
if(mysqli_num_rows($resultFinancialReport) > 0){
	while($row = mysqli_fetch_array($resultFinancialReport))
	{
	 echo'<form>
	 <div class="form-group">
	          <label for="Room">Notes:</label><br>
	          <textarea rows="6" cols="120" id = "notes" class= "form-control" name="notes" placeholder="Comments/Suggestions here..." >'.$row["ap_financial_report_notes"].'</textarea>
	        </div>
	      <div class="form-group">
	       <div class ="Name" style ="text-align:center; align-items:center;">
	          <button type= "button" id ="btn_add-FinancialReport" data-id6="'.$row["Reserve"].'">Add</button>
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
	          <textarea rows="6" cols="120" id = "notes" class= "form-control" name="notes" placeholder="Comments/Suggestions here..." >3123123</textarea>
	        </div>
	      <div class="form-group">
	       <div class ="Name" style ="text-align:center; align-items:center;">
	          <button type= "button" id ="btn_add-FinancialReport" data-id6="'.$row["Reserve"].'">Add</button>
	          <input name="reset" type="reset" id = "btn_reset" />
	        </div>
	      </div>';
	    echo' </form>';
 }
?>

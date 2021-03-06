<?php
include('Connection.php');
session_start();

// SHOW THE 2SEMESTER
$sqlSelect = "SELECT * FROM events group by semester";
$resultSelect = mysqli_query($conn, $sqlSelect);
if(mysqli_num_rows($resultSelect) > 0 )
{
	while($rowSelect = mysqli_fetch_array($resultSelect))
	{
		echo '<h3>'.$rowSelect["semester"].'</h3>';
		// SELECT EVENTS THAT ARE ON THAT SEMESTER
		$sqlEventSem = "SELECT events.id,title,start,place,situation,organization_name,ap_status,ap_id FROM `student_council` 
		inner join events on events.student_council_idstudent_council = student_council.idstudent_council
		inner join organization on organization.ID = student_council.organization_ID
		inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
		inner join activityproposal on events.id = activityproposal.events_id
		where org_adviser.idorg_adviser = '".$_SESSION['UniversalID']."'
		 and situation != 'Returned' and situation != 'Pending' and semester = '".$rowSelect["semester"]."'";
		 $resultEventSem = mysqli_query($conn, $sqlEventSem);
		if(mysqli_num_rows($resultEventSem) > 0 )
		{
			echo '<div class="table-responsive">';
			echo '<table class = "table">

					<tr>
						<th>Title</th>
						<th>Date</th>
						<th>Place</th>
						<th>Status</th>
						<th>Functions</th>
					</tr>';
			while($rowEventSem = mysqli_fetch_array($resultEventSem))
			{
				
				echo '<tr>
							<td class = "user_id" data-idpass ="'.$rowEventSem["id"].'">' .$rowEventSem["title"].'
							</td>
							<td class ="firstname" data-column="emp_firstname" data-id1 = "'.$rowEventSem["id"].'" >'.substr($rowEventSem["start"], 0 ,10).'
							</td>
							<td class ="lastname" data-column="emp_lastname" data-id2 = "'.$rowEventSem["place"].'">'.$rowEventSem["place"].'
							</td>
							<td class ="password" data-column="emp_password" data-id3 = "'.$rowEventSem["situation"].'">'.$rowEventSem["situation"].'
							</td>							
							<td>
							<a id = "btn_viewAP" data-toggle="modal" data-target="#viewActivtyProposalForm" data-id4="'.$rowEventSem["ap_id"].'" class="btn btn-sm btn-info">
							<span class="glyphicon glyphicon-eye-open"></span> Activity Proposal</a>
							</td>
					</tr>';
			}
		}
		else
		{
			echo '<tr>
							<td colspan = "6"> Data not Found </td>
						</tr>';
		}
		echo '</table>';
		echo '</div>';
	}
}
?>

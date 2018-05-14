<?php
include('Connection.php');
session_start();
// FOR THE EVENT RESULT IN THE -ACTION PLAN-
$eventname = mysqli_real_escape_string($conn, $_POST['eventname']);
$sqlActionPlan = "SELECT situation FROM events where title = '$eventname'";
$resultActionPlan = mysqli_query($conn, $sqlActionPlan);
// FOR THE EVENT RESULT IN THE -ACTIVITY PROPOSAL-
$sqlActivityProposal = "SELECT situation FROM ((events INNER JOIN activityproposal ON events.id = activityproposal.events_id))
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."'
and events.title = '$eventname'";
$resultActivityProposal = mysqli_query($conn, $sqlActivityProposal);
// FOR THE RESERVATION
$sqlReservation = "SELECT *,ap_reservation_main.notes as AP_NOTE,ap_reservation_main.ID as 'Reserve'
FROM ((events INNER JOIN activityproposal ON events.id = activityproposal.events_id)
INNER JOIN ap_reservation_main ON ap_reservation_main.ap_id = activityproposal.ap_id)
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."'
and events.title = '$eventname'";
$resultReservation = mysqli_query($conn, $sqlReservation);
// FOR THE COMMITTEES OF THE EVENT
$sqlCommittees = "SELECT *,ap_reservation_main.notes as AP_NOTE,ap_reservation_main.ID as 'Reserve'
FROM ((((events INNER JOIN activityproposal ON events.id = activityproposal.events_id)
INNER JOIN ap_reservation_main ON ap_reservation_main.ap_id = activityproposal.ap_id)
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council)
INNER JOIN ap_committees on ap_committees.ap_id = activityproposal.ap_id)
where student_council.organization_ID = '".$_SESSION['OrgID']."' 
and events.title = '$eventname' group by ap_committees.Committee";
$resultCommittees = mysqli_query($conn, $sqlCommittees);
// FOR FINANCIAL DISBURSEMENT
$sqlFinancialDisbursement = "SELECT *,ap_financial_disbursement.ID as 'Reserve' FROM ((events INNER JOIN activityproposal ON events.id = activityproposal.events_id)
INNER JOIN ap_financial_disbursement ON ap_financial_disbursement.ap_id = activityproposal.ap_id)
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."'
and events.title = '$eventname'  group by title";
$resultFinancialDisbursement = mysqli_query($conn, $sqlFinancialDisbursement);
echo '<ul class="list-unstyled">';
// FOR FINANCIAL REPORT
$sqlFinancialReport = "SELECT *,ap_financial_report.ID as 'Reserve' FROM 
((events INNER JOIN activityproposal ON events.id = activityproposal.events_id)
INNER JOIN ap_financial_report ON ap_financial_report.ap_id = activityproposal.ap_id)
inner join student_council on student_council.idstudent_council = events.student_council_idstudent_council
where student_council.organization_ID = '".$_SESSION['OrgID']."' and events.title = '$eventname' group by title";
$resultFinancialReport = mysqli_query($conn,$sqlFinancialReport);

if(mysqli_num_rows($resultActionPlan) > 0 )
{
  while($row = mysqli_fetch_array($resultActionPlan))
  {
    if($row["situation"] == "Returned")
    {
      $color = 'color:red;';
      $glyph = 'glyphicon glyphicon-repeat';
      $title = 'Returned';
    }
    elseif ($row["situation"] == "Pending")
    {
      $color = 'color:orange;';
      $glyph = 'glyphicon glyphicon-send';
      $title = 'Pending';
    }
    else
    {
      $color = 'color:green;';
      $glyph = 'glyphicon glyphicon-ok';
      $title = 'Approved';
    }
    echo '<li>
          <a href="" title="'.$title.'" style="'.$color.'">Action Plan
            <span class="pull-right">
              <span class="'.$glyph.'"></span>
            </span>
          </a>
        </li>';
  }
}
else
{
  echo '<li>
        <a href="" title="">Action Plan
          <span class="pull-right">
            <span class="glyphicon glyphicon-list-alt"></span>
          </span>
        </a>
      </li>';
}
// FOR ACTIVITY PROPOSAL
if(mysqli_num_rows($resultActivityProposal) > 0 )
{
  while($row = mysqli_fetch_array($resultActivityProposal))
  {
    if($row["situation"] == "Returned")
    {
      $color = 'color:red;';
      $glyph = 'glyphicon glyphicon-repeat';
      $title = 'Returned';
    }
    elseif ($row["situation"] == "Pending")
    {
      $color = 'color:orange;';
      $glyph = 'glyphicon glyphicon-send';
      $title = 'Pending';
    }
    else
    {
      $color = 'color:green;';
      $glyph = 'glyphicon glyphicon-ok';
      $title = 'Approved';
    }
    echo '<li>
          <a href="" title="'.$title.'" style="'.$color.'">Activity Proposal
            <span class="pull-right">
              <span class="'.$glyph.'"></span>
            </span>
          </a>
        </li>';
  }
}
else
{
  echo '<li>
        <a href="" title="">Activity Proposal
          <span class="pull-right">
            <span class="glyphicon glyphicon-list-alt"></span>
          </span>
        </a>
      </li>';
}

// FOR RESERVATION
if(mysqli_num_rows($resultReservation) > 0 )
{
  while($row = mysqli_fetch_array($resultReservation))
  {
    if($row["reservation_status"] == "Returned")
    {
      $color = 'color:red;';
      $glyph = 'glyphicon glyphicon-repeat';
      $title = 'Returned';
    }
    elseif ($row["reservation_status"] == "Pending")
    {
      $color = 'color:orange;';
      $glyph = 'glyphicon glyphicon-send';
      $title = 'Pending';
    }
    else
    {
      $color = 'color:green;';
      $glyph = 'glyphicon glyphicon-ok';
      $title = 'Approved';
    }
    echo '<li>
          <a href="" title="'.$title.'" style="'.$color.'">Reservation
            <span class="pull-right">
              <span class="'.$glyph.'"></span>
            </span>
          </a>
        </li>';
  }
}
else
{
  echo '<li>
        <a href="" title="">Reservation
          <span class="pull-right">
            <span class="glyphicon glyphicon-list-alt"></span>
          </span>
        </a>
      </li>';
}

// FOR COMMITTEES
if(mysqli_num_rows($resultCommittees) > 0 )
{
  while($row = mysqli_fetch_array($resultCommittees))
  {
    if($row["Committees_Status"] == "Done")
    {
      $color = 'color:green;';
      $glyph = 'glyphicon glyphicon-ok';
      $title = 'Done';
    }
    else
    {
      $color = 'color:green;';
      $glyph = 'glyphicon glyphicon-ok';
      $title = 'Approved';
      $color = 'color:red;';
      $glyph = 'glyphicon glyphicon-repeat';
      $title = 'Not yet done';
    }
    echo '<li>
          <a href="" title="'.$title.'" style="'.$color.'">'.$row["Committee"].'
            <span class="pull-right">
              <span class="'.$glyph.'"></span>
            </span>
          </a>
        </li>';
  }
}
else
{
  echo '<li>
        <a href="" title="">Committee
          <span class="pull-right">
            <span class="glyphicon glyphicon-list-alt"></span>
          </span>
        </a>
      </li>';
}

// FOR FINANCIAL DISBURSEMENT
if(mysqli_num_rows($resultFinancialDisbursement) > 0 )
{
  while($row = mysqli_fetch_array($resultFinancialDisbursement))
  {
    if($row["ap_financial_disbursement_status"] == "Returned")
    {
      $color = 'color:red;';
      $glyph = 'glyphicon glyphicon-repeat';
      $title = 'Returned';
    }
    elseif ($row["ap_financial_disbursement_status"] == "Pending")
    {
      $color = 'color:orange;';
      $glyph = 'glyphicon glyphicon-send';
      $title = 'Pending';
    }
    else
    {
      $color = 'color:green;';
      $glyph = 'glyphicon glyphicon-ok';
      $title = 'Approved';
    }
    echo '<li>
          <a href="" title="'.$title.'" style="'.$color.'">Financial Disbursement
            <span class="pull-right">
              <span class="'.$glyph.'"></span>
            </span>
          </a>
        </li>';
  }
}
else
{
  echo '<li>
        <a href="" title="">Financial Disbursement
          <span class="pull-right">
            <span class="glyphicon glyphicon-list-alt"></span>
          </span>
        </a>
      </li>';
}
// FOR FINANCIAL REPORT
if(mysqli_num_rows($resultFinancialReport) > 0 )
{
  while($row = mysqli_fetch_array($resultFinancialReport))
  {
    if($row["ap_financial_report_status"] == "Returned")
    {
      $color = 'color:red;';
      $glyph = 'glyphicon glyphicon-repeat';
      $title = 'Returned';
    }
    elseif ($row["ap_financial_report_status"] == "Pending")
    {
      $color = 'color:orange;';
      $glyph = 'glyphicon glyphicon-send';
      $title = 'Pending';
    }
    else
    {
      $color = 'color:green;';
      $glyph = 'glyphicon glyphicon-ok';
      $title = 'Approved';
    }
    echo '<li>
          <a href="" title="'.$title.'" style="'.$color.'">Financial Report
            <span class="pull-right">
              <span class="'.$glyph.'"></span>
            </span>
          </a>
        </li>';
  }
}
else
{
  echo '<li>
        <a href="" title="">Financial Report
          <span class="pull-right">
            <span class="glyphicon glyphicon-list-alt"></span>
          </span>
        </a>
      </li>';
}
echo '</ul>';
?>

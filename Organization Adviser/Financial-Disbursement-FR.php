<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="Pictures/eventoLogo.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="jquery.min.js"></script>
  <link href="style.css" type="text/css" rel="stylesheet">
  <link href='progress.css' rel='stylesheet' />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 700px;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }

    .tabcontent {
    display: none;
    }
    .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
    height:100%;
}

  </style>
</head>
<body>
<?php include('MainTabs.php'); ?>
<div class="container-fluid text-center">
  <div class="row content">
      <?php include ('Financial-Disbursement-sidetabs.php') ?>
        <div class="col-sm-8 text-left" >
          <br>
          <div class = "container">
              <div class = "col-sm-10">
                  <!-- LIST OF FINANCIAL REPORT -->
                  <div class="financial-report-table"></div>
              </div>
          </div>
        </div>
        <!-- PROGRESS BAR -->
        <?php include ('progress-section.php'); ?>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="myModal" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Financial Report</h4>
      </div>
      <div class="modal-body">
      <!-- Modal content-->
          <!-- Modal From pop-up-select.php !-->
        <div id = "show_table">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- FOR VIEWING OF ACTIVITY PROPOSAL -->
<div class="modal fade" id="viewActivtyProposalForm" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Viewing of Activity Proposal</h4>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'benjohn')"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Activity Proposal</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'projected-expenses')"><a href="#"><span class="glyphicon glyphicon-ruble"></span> Projected Expenses</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'working-committees')"><a href="#"><span class="glyphicon glyphicon-user"></span> Working Committees</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'activity-program')"><a href="#"><span class="glyphicon glyphicon-copy"></span> Activity Program</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'distribution-budget')"><a href="#"><span class="glyphicon glyphicon-user"></span> Distribution of Budget</a></li>
              </ul>
            </div>
          </nav>
        <div class="modal-body">
          <!-- Modal From pop-up-select.php !-->
          <div id = "benjohn" class = "tabcontent">
          </div>
          <div id ="projected-expenses" class = "tabcontent">
          </div>
          <div id ="working-committees" class = "tabcontent">
          </div>
          <div id ="activity-program" class = "tabcontent">
          </div>
          <div id ="distribution-budget" class = "tabcontent">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
</div>
</div>
<!-- FOR VIEWING OF ACTIVITY PROPOSAL -->
<div class="modal" id="viewClassroom" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title text-center">Images of Classroom style</h4>
        </div>
        <!-- START -->
        <div class = "container" style="margin-left:5%;">
          <div class = "col-sm-2">
            <div class="card">
                  <img src="Pictures/classroomstyle.jpg" alt="Avatar" style="width:100%; height:10%;">
                  <div class="text-label">
                    <h4><b>Classroom Style</b></h4>
                  </div>
            </div>
          </div>
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/lecturestyle.jpg" alt="Avatar" style="width:100%; height:10%;">
                    <div class="text-label">
                      <h4><b>Lecture Style</b></h4>
                      <p></p>
                    </div>
              </div>
            </div>
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/hollowsquare.jpg" alt="Avatar" style="width:100%">
                    <div class="text-label">
                      <h4><b>Hollow Scare</b></h4>
                    </div>
              </div>
            </div>
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/classroomstyletable.jpg" alt="Avatar" style="width:100%">
                    <div class="text-label">
                      <h4><b>Classroom style w/ table</b></h4>
                    </div>
              </div>
            </div>
        </div>
        <!-- END -->
        <!-- START -->
        <div class = "container" style="margin-left:5%;">
          <div class = "col-sm-2">
            <div class="card">
                  <img src="Pictures/chevronstyle.jpg" alt="Avatar" style="width:100%">
                  <div class="text-label">
                    <h4><b>Chevron Style</b></h4>
                  </div>
            </div>
          </div>
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/theaterstyle.jpg" alt="Avatar" style="width:100%">
                    <div class="text-label">
                      <h4><b>Theater Style</b></h4>
                    </div>
              </div>
            </div>
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/squarestyle.jpg" alt="Avatar" style="width:100%">
                    <div class="text-label">
                      <h4><b>Square Style</b></h4>
                    </div>
              </div>
            </div>
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/ushape.jpg" alt="Avatar" style="width:100%">
                    <div class="text-label">
                      <h4><b>U Shape Style</b></h4>
                    </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
</body>
</html>
<script>
function openTabs(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
$(document).ready(function(){
document.getElementById('benjohn').style.display = "block"

// FETCHING OF FINANCIAL REPORT TABLE
function fetchFinancialReport() {
  $.ajax({
    url:"Financial-Report-Select.php",
    method:"POST",
    success:function(data){
        $('.financial-report-table').html(data);
      }
  });
}
fetchFinancialReport();

function fetchFinancialReportPopUp() {
  var DisbursementID = $('#btn_viewFinancialReport').data("id5"); //ID FOR DISBURSEMENT REFERENCE
  alert(DisbursementID);
  $.ajax({
    url:"Financial-Disbursement-FR-Pop-up.php",
    method:"POST",
    data:{id:id,DisbursementID:DisbursementID},
    dataType:"text",
    success:function(data){
        $('#show_table').html(data);
      }
  });
}
// BUTTON WHEN VIEW FINANCIAL REPORT IS CLICKED
$(document).on('click','#btn_viewFinancialReport', function (){
  var id=$(this).data("id5"); //ID NG ACIVITY PROPOSAL
  var ReportID = $(this).data("id6"); //ID NG FINANCIAL REPORT
  var DisbursementID = $(this).data("id7"); //ID FOR DISBURSEMENT REFERENCE
  $.ajax({
    url:"Financial-Disbursement-FR-Pop-up.php",
    method:"POST",
    data:{id:id,ReportID:ReportID,DisbursementID:DisbursementID},
    dataType:"text",
    success:function(data){
        $('#show_table').html(data);
      }
  });
});
// FOR FINANCIAL REPORT ADDING NOTES
  $(document).on('click','#btn_add-FinancialReport', function (){
    var id = $(this).data("id6");
    var notes = $('#notes').val();
    $.ajax({
      url:"Financial-Disbursement-FR-Insert.php",
      method:"POST",
      data:{id:id,notes:notes},
      dataType:"text",
      success:function(data){
        alert(data);
      }
    });
  });
  ///SHOWS MODAL WHEN BUTTON MAKE ACTIVITY PROPOSAL IS CLICKED
  $(document).on('click','#btn_viewAP', function (){
    var id=$(this).data("id5");
    //TAB CONTENT FIRST
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#benjohn').html(data);
      }
    });
    //TAB CONTENT EXPENSES
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-expenses.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#projected-expenses').html(data);
      }
    });
    //TAB CONTENT WORKING COMMITTEES
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-committees.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#working-committees').html(data);
      }
    });
    //TAB CONTENT ACTIVITY SCHEDULE
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-schedule.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#activity-program').html(data);
      }
    });
    //TAB CONTENT DISTRIBUTION OF BUDGET
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-distributionbudget.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#distribution-budget').html(data);
      }
    });
    //FOR OBJECTIVES FETCH
    $.ajax({
    url:"ActivityProposal-Objectives-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Objectives').html(data);
      }
    });
    // FOR SPEAKERS FETCH
    $.ajax({
    url:"ActivityProposal-Speakers-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Speakers').html(data);
      }
    });
    // FOR DOCUMENTATION FETCH
    $.ajax({
    url:"ActivityProposal-Documentation-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Documentation').html(data);
      }
    });
    // FOR FOOD FETCH
    $.ajax({
    url:"ActivityProposal-Food-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Food').html(data);
      }
    });
    // FOR MATERIALS
    $.ajax({
    url:"ActivityProposal-Materials-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Materials').html(data);
      }
    });
    // FOR HONORARIUM
    $.ajax({
    url:"ActivityProposal-Honorarium-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Honorarium').html(data);
      }
    });
    // FOR PROGRAM AND INVITATION
    $.ajax({
    url:"ActivityProposal-ProgramInvi-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-ProgramInvi').html(data);
      }
    });
    // FOR CERTIFICATES
    $.ajax({
    url:"ActivityProposal-Certs-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Certs').html(data);
      }
    });
    // FOR TOKEN/PRIZES
    $.ajax({
    url:"ActivityProposal-Token-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Token').html(data);
      }
   });
    // FOR OTHERS
   $.ajax({
    url:"ActivityProposal-OthersTable-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-OthersTable').html(data);
      }
    });
   // FOR VENUE
    $.ajax({
    url:"ActivityProposal-Venue-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Venue').html(data);
      }
    });
    // FOR ENERGY
    $.ajax({
    url:"ActivityProposal-Energy-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Energy').html(data);
      }
    });
    // FOR TRANSPORTATION
    $.ajax({
    url:"ActivityProposal-Transportation-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Transportation').html(data);
      }
    });
    $.ajax({
    url:"ActivityProposal-Contingency-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Contingency').html(data);
      }
    });
    // TABLE FOR TOTAL
    $.ajax({
      type:'POST',
      url:'ActivityProposal-make-form-total.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('.table-Total').html(data);
        }
    });
    $.ajax({
    url:"ActivityProposal-Committees-Overall-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Committees-Overall').html(data);
      }
    });
    // FOR ACTIVTY COMMITTEES
    $.ajax({
    url:"ActivityProposal-Committees-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Committees').html(data);
      }
    });
    // FOR ACTIVTY PROGRAM/SCHEDULE
    $.ajax({
    url:"ActivityProposal-Schedule-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Schedule').html(data);
      }
    });
    // FOR ACTIVTY DISTRIBUTION OF BUDGET
    $.ajax({
    url:"ActivityProposal-DistributionBudget-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-DistributionBudget').html(data);
      }
    });
  });
});
</script>

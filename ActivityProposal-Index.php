<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Pictures/eventoLogo.png"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="jquery.min.js"></script>
  <link href="style.css" type="text/css" rel="stylesheet">
  <link href='progress.css' rel='stylesheet' />

  <style>
    body{
      overflow-y: auto;
    }
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
  </style>
</head>
<body>
<?php include('MainTabs.php'); ?>
<div class="container-fluid text-center">
  <div class="row content">
  <?php include ('ActivityProposal-sidetabs.php') ?>
      <div class="col-sm-8 text-left" >
        <br>
        <div class = "container">
            <div class = "col-sm-10">
                <!-- THIS IS WHERE THE APROVED ACTION PLAN IS -->
                <div class="table"></div>
                <!-- THIS IS WHERE THE ACTIVTY PROPOSAL IS -->
                <div class="activityproposal"></div>
            </div>
        </div>
      </div>
  <!-- PROGRESS BAR -->
      <?php include ('progress-section.php'); ?>
  </div>
</div>
<div class="modal fade" id="actionPlanModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
          <!-- Modal From pop-up-select.php !-->
          <div id = "actionPlan_table"></div>

</div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Activity Proposal</h4>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'show_table')"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Activity Proposal</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'projected-expenses')"><a href="#"><span class="glyphicon glyphicon-ruble"></span> Projected Expenses</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'working-committees')"><a href="#"><span class="glyphicon glyphicon-user"></span> Working Committees</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tab links" onclick="openTabs(event, 'activity-program')"><a href="#"><span class="glyphicon glyphicon-copy"></span> Activity Program</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="tablinks" onclick="openTabs(event, 'distribution-budget')"><a href="#"><span class="glyphicon glyphicon-user"></span> Distribution of Budget</a></li>
              </ul>
            </div>
          </nav>
        <div class="modal-body">
          <!-- Modal From pop-up-select.php !-->
          <div id = "show_table" class = "tabcontent">
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
                <li class="tablinks" onclick="openTabs(event, 'show_table')"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Activity Proposal</a></li>
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
          <div id = "show_table" class = "tabcontent">
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
</body>
</html>
  <!-- JQUERY FOR TYPEAHEAD -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<!-- MAIN QUERIES -->
<script type="text/javascript" src="ActivityProposal-Index.js"></script>

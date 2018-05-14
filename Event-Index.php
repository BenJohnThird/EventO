<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="Pictures/eventoLogo.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="jquery.min.js"></script>
  <link href="style.css" type="text/css" rel="stylesheet">
  <link href='progress.css' rel='stylesheet' />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
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

    /* The container */
.radioPane {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.radioPane input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* When the radio button is checked, add a blue background */
.radioPane input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}


.radioPane input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.radioPane .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
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
.text-label {
    padding: 2px 16px;
}
  </style>
<body>
<?php include('MainTabs.php'); ?>
<div class="container-fluid text-center">
  <div class="row content">
      <?php include ('Event-sidetabs.php') ?>
        <div class="col-sm-8 text-left" >
          <br>
          <div class = "container">
              <div class = "col-sm-10">
                <!-- APPROVED ACTIVITY PROPOSAL -->
                  <div class="table"></div>
                  <div class="reservation_table"></div>
              </div>
          </div>
        </div>
        <!-- PROGRESS BAR -->
        <?php include ('progress-section.php'); ?>
  </div>
</div>
<div class="modal fade" id="myModal" >
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
          <!-- Modal From pop-up-select.php !-->
          <div id = "show_table">
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
          <button type="button" class="close" id="Classroom-Close-Modal" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title text-center">Images of Classroom style</h4>
        </div>
        <!-- START -->
        <div style="height:50%;">
          <div class = "container" style="margin-left:5%;">
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/classroomstyle.jpg" alt="Avatar" style="width:100%;">
                    <div class="text-label">
                      <p style= "font-size: 16px; padding-top: 10px;"><b>Classroom Style</b></p>
                    </div>
              </div>
            </div>
              <div class = "col-sm-2">
                <div class="card">
                      <img src="Pictures/lecturestyle.jpg" alt="Avatar" height="120" style="width:100%;">
                      <div class="text-label">
                        <h4><b>Lecture Style</b></h4>
                        <p></p>
                      </div>
                </div>
              </div>
              <div class = "col-sm-2">
                <div class="card">
                      <img src="Pictures/hollowsquare.jpg" alt="Avatar" height = "120" style="width:100%">
                      <div class="text-label">
                        <h4><b>Hollow Scare</b></h4>
                      </div>
                </div>
              </div>
              <div class = "col-sm-2">
                <div class="card">
                      <img src="Pictures/classroomstyletable.jpg" height = "120" alt="Avatar" style="width:100%">
                      <div class="text-label">
                        <p style= "font-size: 14px; padding-top: 10px;"><b>Classroom w/ table</b></p>
                      </div>
                </div>
              </div>
          </div>
          <!-- END -->
          <!-- START -->
          <div class = "container" style="margin-left:5%;">
            <div class = "col-sm-2">
              <div class="card">
                    <img src="Pictures/chevronstyle.jpg" height = "120" alt="Avatar" style="width:100%">
                    <div class="text-label">
                      <h4><b>Chevron Style</b></h4>
                    </div>
              </div>
            </div>
              <div class = "col-sm-2">
                <div class="card">
                      <img src="Pictures/theaterstyle.jpg" height = "120" alt="Avatar" style="width:100%">
                      <div class="text-label">
                        <h4><b>Theater Style</b></h4>
                      </div>
                </div>
              </div>
              <div class = "col-sm-2">
                <div class="card">
                      <img src="Pictures/squarestyle.jpg" height = "120" alt="Avatar" style="width:100%">
                      <div class="text-label">
                        <h4><b>Square Style</b></h4>
                      </div>
                </div>
              </div>
              <div class = "col-sm-2">
                <div class="card">
                      <img src="Pictures/ushape.jpg" height = "120" alt="Avatar" style="width:100%">
                      <div class="text-label">
                        <h4><b>U Shape Style</b></h4>
                      </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="Classroom-Close-Modal" data-dismiss="modal">Close</button>
          </div>
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
//SHOW THE TABLE OF ACTIVITY PROPOSAL
function fetchEvents() {
  $.ajax({
    url:"Event-ActivityProposal-Select.php",
    method:"POST",
    success:function(data){
        $('.table').html(data);
      }
  });
}
fetchEvents();
// SHOW THE LIST OF RESRVATION
function fetchReservation() {
  $.ajax({
    url:"Event-Reservation-Select.php",
    method:"POST",
    success:function(data){
        $('.reservation_table').html(data);
      }
  });
}
fetchReservation();
// FETCHING PHYSICAL FACI EQUIPMENTS
function fetchPhysicalFaciEquip() {
  var id=$('#btn_makeReservation').data("id5");
  $.ajax({
    url:"Event-Index-PhysicalFaciEquip-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Physical-Equip').html(data);
      }
  });
}
// FETCHING TLTS EQUIPMENTS
function fetchTLTSEquip() {
  var id=$('#btn_makeReservation').data("id5");
  $.ajax({
    url:"Event-Index-TLTSEquip-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-TLTS-Equip').html(data);
      }
  });
}
// FETCHING CLASSROOM
function fetchClassroom() {
  var id=$('#btn_add-Classroom').data("id6");
  $.ajax({
    url:"Event-Index-Classroom-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Classroom').html(data);
      }
  });
}
// FETCHING DETAILS FOR STEP2
function fetchStep2() {
  var id=$('#btn_makeReservation').data("id5");
  $.ajax({
    url:"Event-Index-Step2-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Step2').html(data);
      }
  });
}
// FETCHING DETAILS FOR STEP3
function fetchStep3() {
  var id=$('#btn_makeReservation').data("id5");
  $.ajax({
    url:"Event-Index-Step3-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Step3').html(data);
      }
  });
}
// BUTTON WHEN START YOUR RESERVATION IS CLICKED
$(document).on('click','#btn_startReservation', function (){
  var id=$(this).data("id5");
	$.ajax({
    type:'POST',
    url:'Event-StartReservation-Insert.php',
    data:{id:id},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchEvents();
      fetchReservation();
    }
  });
});
// BUTTON WHEN ADD IN PHYSICAL FACI IS CLICKED
$(document).on('click','#btn_add-PhysicalFaciEquip', function (){
  var id = $(this).data("id6");
  var pcs = $('#physicalfaciequip-pcs').val();
  var equipment = $('#physicalfaciequip-subject').val();
  var sector = 'Physical Facilities';
  if (pcs == "")
  {
    alert('Please indicate a number');
    return false;
  }
  if(equipment == "")
  {
    alert('Please choose an equipment');
    return false;
  }
  $.ajax({
    type:'POST',
    url:'Event-Reservation-Equipment-Insert.php',
    data:{id:id,pcs:pcs,equipment:equipment,sector:sector},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchPhysicalFaciEquip();
    }
  });
});
// BUTTON WHEN ADD IN PHYSICAL FACI IS CLICKED
$(document).on('click','#btn_add-Classroom', function (){
  var id = $(this).data("id6");
  var pcs = 1;
  var equipment = $('input[name="radio"]:checked').val();
  var sector = 'Classroom';
  if(equipment == "")
  {
    alert('Please choose a classroom');
    return false;
  }
  $.ajax({
    type:'POST',
    url:'Event-Reservation-Equipment-Insert.php',
    data:{id:id,pcs:pcs,equipment:equipment,sector:sector},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchClassroom();
    }
  });
});
// BUTTON WHEN ADD IN TLTS IS CLICKED
$(document).on('click','#btn_add-TLTSEquip', function (){
  var id = $(this).data("id6");
  var pcs = $('#tltsequip-pcs').val();
  var equipment = $('#tltsequip-subject').val();
  var sector = 'TLTS';
  if (pcs == "")
  {
    alert('Please indicate a number');
    return false;
  }
  if(equipment == "")
  {
    alert('Please choose an equipment');
    return false;
  }
  $.ajax({
    type:'POST',
    url:'Event-Reservation-Equipment-Insert.php',
    data:{id:id,pcs:pcs,equipment:equipment,sector:sector},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchTLTSEquip();
    }
  });
});
// BUTTON WHEN UPDATE IN PHYSICAL FACI IS CLICKED BMS
$(document).on('click','#btn_add-Step2BMS', function (){
  var id = $(this).data("id6");
  var date = $('#bms-date').val();
  var start = $('#bms-start').val();
  var end = $('#bms-end').val();
  var payment = $('#bms-payment').val();
  var pcs = $('#bms-no').val();
  var sector = 'BMS';
  $.ajax({
    type:'POST',
    url:'Event-Reservation-Step2-Insert.php',
    data:{id:id,pcs:pcs,date:date,sector:sector,start:start,end:end,payment:payment},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchStep2();
    }
  });
});
// BUTTON WHEN UPDATE IN PHYSICAL FACI IS CLICKED PPFD
$(document).on('click','#btn_add-Step2', function (){
  var id = $(this).data("id6");
  var date = $('#ppfd-date').val();
  var start = $('#ppfd-start').val();
  var end = $('#ppfd-end').val();
  var payment = $('#ppfd-payment').val();
  var pcs = $('#ppfd-no').val();
  var sector = 'PPFD';
  $.ajax({
    type:'POST',
    url:'Event-Reservation-Step2-Insert.php',
    data:{id:id,pcs:pcs,date:date,sector:sector,start:start,end:end,payment:payment},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchStep2();
    }
  });
});
// BUTTON WHEN UPDATE IN ACCOUNTING IS CLICKED
$(document).on('click','#btn_add-Step3', function (){
  var id = $(this).data("id6");
  var rate = $('#accounting-rate').val();
  var person = $('#accounting-person').val();
  var total = $('#accounting-total').val();
  var date = $('#accounting-date').val();
  $.ajax({
    type:'POST',
    url:'Event-Reservation-Step3-Insert.php',
    data:{id:id,rate:rate,person:person,total:total,date:date},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchStep3();
    }
  });
});
// BUTTON WHEN UPDATE IN ACCOUNTING IS CLICKED
$(document).on('click','#btn_add-ReserveMain', function (){
  var id = $(this).data("id5");
  var notes = $('#notes').val();
  $.ajax({
    type:'POST',
    url:'Event-Reservation-Insert.php',
    data:{id:id,notes:notes},
    dataType:"text",
    success:function(data){
      alert(data);
      fetchReservation();
    }
  });
});
// BUTTON WHEN UPDATE IN ACCOUNTING IS CLICKED
$(document).on('click','#Classroom-Close-Modal', function (){
  $('#myModal').modal('show'); 
  $('#viewClassroom').modal('hide'); 
});
$(document).on('click','#Classroom-Open-Modal', function (){
  $('#viewClassroom').modal('show'); 
   $('#myModal').modal('hide');
});
///SHOWS MODAL WHEN BUTTON ADD IS CLICKED IN RESERVATION
$(document).on('click','#btn_makeReservation', function (){
  var id=$(this).data("id5");
  $('#myModal').modal('show');  
  $.ajax({
    type:'POST',
    url:'Event-MakeReservation-pop-up.php',
    data:{id:id},
    dataType:"text",
    success:function(data){
      $('#show_table').html(data);
    }
  });
  // FOR TABLE OF PHYSICAL FACI EQUIPMENTS
  $.ajax({
    url:"Event-Index-PhysicalFaciEquip-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Physical-Equip').html(data);
      }
  });
  // FOR TABLE OF TLTS EQUIPMENTS
  $.ajax({
    url:"Event-Index-TLTSEquip-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-TLTS-Equip').html(data);
      }
  });
  // FOR TABLE OF CLASSROOM OR RECORDS
  $.ajax({
    url:"Event-Index-Classroom-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Classroom').html(data);
      }
  });
  $.ajax({
    url:"Event-Index-Step2-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Step2').html(data);
      }
  });
  $.ajax({
    url:"Event-Index-Step3-Select.php",
    method:"POST",
    data:{id:id},
    dataType:"text",
    success:function(data){
        $('.table-Step3').html(data);
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

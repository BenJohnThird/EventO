<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="jquery.min.js"></script>
  <link href="style.css" type="text/css" rel="stylesheet">
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
      .navbar {
        height: auto;
        padding: 15px;
      }
      #myNavbar {
        height: auto;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
<?php include_once('functions.php'); ?>
<?php include('MainTabs.php'); ?>
<div class="container-fluid text-center">    
  <div class="row content">
     <?php include ('ActionPlan-sidetabs.php') ?>
    <div class="col-sm-10 text-left" > 
      <div id = "mainBody" style= "width:100%;">
        <div id= "CalendarPane">
                <h2 style="text-align:center;"><?php echo $_SESSION["Organization"] ?> Action Plan 2017-2018</h2>
                <br>
                <div id="calendar_div">
              <?php echo getCalender(); ?>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Fill-up the following</h4>
        </div>
        <div class="modal-body">
          <!-- Modal From pop-up-select.php !-->
          <div id = "show_table"></div>
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
$(document).ready(function(){
  //SHOW THE TABLE OF EVENTS
  $(document).on('click','#btn_update', function (){
    var id = $(this).data("idunique");
    var title = $('#title').val();
    var description = $('#description').val();
    var date = $('#date').val();
    var starttime = $('#starttime').val();
    var endtime = $('#endtime').val();
    var place = $('#place').val();
    var notes = $('#notes').val();
    var situation = 'Pending';
    if(title == '')
    {
      alert("Enter Title of the Event");
      return false;
    }
    if(description == '')
    {
      alert("Enter Description of the Event");
      return false;
    }
    if(date == '')
    {
      alert("Enter Date");
      return false;
    }
    if(place == '')
    {
      alert("Enter Date");
      return false;
    }
    $.ajax({
      url:"actionPlan-pop-up-update.php",
      method:"POST",
      data:{id:id,title:title,place:place,description:description,date:date,starttime:starttime
        ,endtime:endtime,notes:notes,situation:situation},
      dataType:"text",
      success:function(data){
        alert(data);
      }
    });
  });
  //function for Add
$(document).on('click','#btn_add', function (){
    var title = $('#title').val();
    var description = $('#description').val();
    var date = $('#date').val();
    var starttime = $('#starttime').val();
    var endtime = $('#endtime').val();
    var place = $('#place').val();
    var notes = $('#notes').val();
    if(title == '')
    {
      alert("Enter Title of the Event");
      return false;
    }
    if(description == '')
    {
      alert("Enter Description of the Event");
      return false;
    }
    if(date == '')
    {
      alert("Enter Date");
      return false;
    }
    $.ajax({
      url:"pop-up-insert.php",
      method:"POST",
      data:{title:title,description:description,date:date,place:place,starttime:starttime,endtime:endtime,notes:notes},
      dataType:"text",
      success:function(data){
        alert(data);
      }
    }); 
  });
});
</script>
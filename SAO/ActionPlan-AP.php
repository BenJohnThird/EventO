<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- INCLUDE FOR ICON -->
  <?php include ('../icon.php'); ?>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="..//jquery.min.js"></script>
  <link href="..//style.css" type="text/css" rel="stylesheet">
    <link href='..//progress.css' rel='stylesheet' />

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
  </style>
</head>
<body>
<?php include('MainTabs.php'); ?>
<div class="container-fluid text-center">
  <div class="row content">
     <?php include ('ActionPlan-sidetabs.php') ?>
    <div class="col-sm-8 text-left" >
      <h2 style="text-align:center;">CSIT Action Plan 2017-2018</h2>
      <br>
      <div class = "container">
        <div class = "col-sm-10">
          <div class="table"></div>
        </div>
      </div>
    </div>
    <?php include ('progress-section.php'); ?>
  </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
          <!-- Modal From pop-up-select.php !-->
          <div id = "show_table"></div>

</div>
</body>
</html>
<script>
$(document).ready(function(){
  function alertAdded(){
    alert('Data Added');
  }

fetchEvents();
//SHOW THE TABLE OF EVENTS
function fetchEvents(page) {
  $.ajax({
    url:"AddedPane-select.php",
    method:"POST",
    data:{page:page},
    success:function(data){
        $('.table').html(data);
      }
  });
}

$(document).on('click','.pagination_link',function(){
  var page = $(this).attr("id");
  fetchEvents(page);
});

///SHOWS MODAL WHEN BUTTON ADD IS CLICKED
$(document).on('click','#btn_popup', function (){
        $.ajax({
          type:'POST',
          url:'actionPlan-pop-up-select.php',
          dataType:"text",
          success:function(data){
            $('#show_table').html(data);
          }
        });
      });
//function for Add
$(document).on('click','#btn_add', function (){
    var title = $('#title').val();
    var proponent = $('#proponent').val();
    var start = $('#start').val();
    var end = $('#end').val();
    var place = $('#place').val();
    var notes = $('#notes').val();
    if(title == '')
    {
      alert("Enter Title of the Event");
      return false;
    }
    if(start == '')
    {
      alert("Enter Starting time");
      return false;
    }
    if(place == '')
    {
      alert("Enter place");
      return false;
    }
    $.ajax({
      url:"..//pop-up-insert.php",
      method:"POST",
      data:{title:title,place:place,start:start,end:end,notes:notes,proponent:proponent},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchEvents();
      }
    });
  });
  //TO VIEW POP UP (VIEW BUTTON)
  $(document).on('click','#btn_view', function (){
    var id=$(this).data("id4");
    $.ajax({
      type:'POST',
      url:'actionPlan-pop-up-events-view.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#show_table').html(data);
      }
    });
  });
  //to OPEN EDIT (EDIT BUTTON)
  $(document).on('click','#btn_edit', function (){
    var id=$(this).data("id5");
    $.ajax({
      type:'POST',
      url:'actionPlan-pop-up-events-edit.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#show_table').html(data);
      }
    });
  });
  //to UPDATE into RETURNED
  $(document).on('click','#btn_update', function (){
    var id = $(this).data("idunique");
    var title = $('#title').val();
    var place = $('#place').val();
    var proponent = $('#proponent').val();
    var notes = $('#notes').val();
    var situation = 'Returned';
    if(title == '')
    {
      alert("Enter Title of the Event");
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
      data:{id:id,title:title,place:place,notes:notes,situation:situation,proponent:proponent},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchEvents();
      }
    });
  });
  //to UPDATE into VERIFIED
  $(document).on('click','#btn_verify', function (){
    var id = $(this).data("id6");
    var situation = 'Verified';
    $.ajax({
      url:"actionPlan-verify.php",
      method:"POST",
      data:{id:id,situation:situation},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchEvents();
      }
    });
  });
});
fetchEvents();
</script>

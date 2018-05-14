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
  <script src="..//jquery.min.js"></script>
  <link href="..//style.css" type="text/css" rel="stylesheet">
    <link href='..//progress.css' rel='stylesheet' />
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
     .btn-toggle {
    top: 50%;
    transform: translateY(-50%);
  }
}

  </style>
</head>
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
</body>
</html>
<script>

$(document).ready(function(){
//SHOW THE TABLE OF ACTIVITY PROPOSAL //COMMITTEES
function fetchEvents(page) {
  $.ajax({
    url:"Event-ActivityProposal-Committees-Select.php",
    method:"POST",
    data:{page:page},
    success:function(data){
        $('.table').html(data);
      }
  });
}
fetchEvents();
function fetchCommittees() {
    var id= $('#btn_committeesVerifiy').data("id5");
    $.ajax({
      type:'POST',
      url:'Event-Committees-pop-up.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#show_table').html(data);
      }
    });
}
$(document).on('click','.pagination_link',function(){
  var page = $(this).attr("id");
  fetchEvents(page);
});
///SHOWS MODAL WHEN BUTTON ADD IS CLICKED IN RESERVATION
  $(document).on('click','#btn_committeeUP', function (){
    var id=$(this).data("id5");
    $.ajax({
      type:'POST',
      url:'Event-Committees-pop-up.php',
      data:{id:id},
      dataType:"text",
      success:function(data){
        $('#show_table').html(data);
      }
    });
  });
  ///SHOWS MODAL WHEN BUTTON ADD IS CLICKED IN RESERVATION
$(document).on('click','#btn_committeesVerifiy', function (){
    var id=$(this).data("id5");
    var committee = $(this).data("idcom");
    $.ajax({
      type:'POST',
      url:'Event-Committees-Update.php',
      data:{id:id,committee:committee},
      dataType:"text",
      success:function(data){
        alert(data);
        fetchCommittees();
      }
    });
  });
});
</script>

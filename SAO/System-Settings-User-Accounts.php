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
  <script src="../jquery.min.js"></script>
  <!--  -->
  <link href="../style.css" type="text/css" rel="stylesheet">
  <!-- CSS FOR PROGRESS SECTION -->
    <link href='../progress.css' rel='stylesheet' />
    <!-- INCLUDE FOR ICON -->
    <?php include ('../icon.php'); ?>
  <style>
    body{
      overflow-x: hidden;
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
<div class = "container-fluid text-center">
  <div class="row content">
    <?php include ('System-Settings-sidetabs.php') ?>
    <div class="col-sm-8 text-left" >
      <br>
      <div class = "container">
        <div class = "col-sm-10">
          <div style="border-bottom: 5%;">
            <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Accounts</h3>
            <div class="form-group row">
                <div class="col-xs-6">
                  <div class="input-group">
                    <input type="text" id = "search-text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-3">
                </div>
                <div class="col-xs-3">
                  <select class="form-control" id="dropdown-select">
                    <option value = "">Sort By...</option>
                    <option>Student Council</option>
                    <option>Organization Adviser</option>
                    <option>TLTS</option>
                    <option>Maintenance</option>
                    <option>Property</option>
                    <option>SAO</option>
                  </select>
                </div>
            </div>
            <div id = "user-table"></div>
            <hr>
          </div>
        </div>
      </div>
    </div>
    <?php include ('progress-section.php'); ?>
  </div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
   fetchUser();
  // FETCHING OF STUDENT COUNCIL
  function fetchUser(page) {
    var text = $('#search-text').val();
    var dropdown = $('#dropdown-select').val();
    $.ajax({
    url:"System-Settings-User-Select.php",
    method:"POST",
    data:{text:text,dropdown:dropdown,page:page},
    dataType:"text",
    success:function(data){
        $('#user-table').html(data);
      }
  });
  }
  $(document).on('click','.pagination_link',function(){
  var page = $(this).attr("id");
  fetchUser(page);
});
  $('#search-text').change(function() {
      fetchUser();
  });
  $('#search-text').on('keyup', function() {
    var element = document.getElementById('dropdown-select');
    element.value = 'Sort By...';
     fetchUser();
  });
  $('#dropdown-select').change(function() {
      fetchUser();
  });
  // BUTTON TO VERIFY/ACTIVATE THE USER
  $(document).on('click','#btn_verifyUser', function (){
    var id=$(this).data("iduser"); //ID USER COUNCIL
    var status = $(this).data("idstatus");
    $.ajax({
      url:"User-Verify.php",
      method:"POST",
      data:{id:id,status:status},
      dataType:"text",
      success:function(data){
          alert(data);
          fetchUser();
        }
    });
  });
});
</script>

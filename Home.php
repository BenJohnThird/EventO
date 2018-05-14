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
  <!--  -->
  <link href="style.css" type="text/css" rel="stylesheet">
  <!-- CSS FOR PROGRESS SECTION -->
    <link href='progress.css' rel='stylesheet' />
    <!-- INCLUDE FOR ICON -->
    <?php include ('icon.php'); ?>
    <!-- FOR EVENTS CSS -->
    <link href="Home-Events.css" type="text/css" rel="stylesheet">
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
      <div class="col-sm-9 text-left" >
        <div class = "container">
        <div class = "col-sm-11">
          <div id = "alerty"  class="alert alert-info alert-dismissable fade in">
           <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
           <strong>Upcoming Events. </strong>
         </div>
            <div class ="upcoming-events"></div>  
            <br><br>

              <div id = "alerty"  class="alert alert-success alert-dismissable fade in">
             <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
             <strong> Finished/Past Events</strong>
           </div>
            <div class = "past-events"></div>
            <hr>
            </div>
          </div>
        </div>
        <?php include ('progress-section.php'); ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
//SHOW THE TABLE OF UPCOMING EVENTS
function fetchUpcomingEvents() {
  $.ajax({
    url:"Home-Related/Upcoming-events-select.php",
    method:"POST",
    success:function(data){
        $('.upcoming-events').html(data);
      }
  });
}
fetchUpcomingEvents();

// SHOW THE TABLE OF PAST EVENTS
function fetchPastEvents() {
  $.ajax({
    url:"Home-Related/Past-events-select.php",
    method:"POST",
    success:function(data){
        $('.past-events').html(data);
      }
  });
}
fetchPastEvents();
});
</script>

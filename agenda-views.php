<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<link href='fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<link href='progress.css' rel='stylesheet' />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
     <!-- JQUERY FOR TYPEAHEAD -->
 <!--    <script src="jquery3.js"></script> -->
    <!-- INCLUDE FOR ICON -->
    <?php include ('icon.php'); ?>

<style>
  body {
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>
<?php include('MainTabs.php'); ?>
<!--  -->
<?php
require_once('bdd.php');
// $sql = "SELECT * FROM events ";
$sql = "SELECT id,title,color,start,end,proponent,situation,place,semester,notes FROM `student_council` 
inner join events on events.student_council_idstudent_council = student_council.idstudent_council
where  student_council.organization_ID = '".$_SESSION['OrgID']."'";
$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>
<div class="container-fluid text-center">
  <div class="row content">
       <?php include ('ActionPlan-sidetabs.php') ?>
        <div class="col-sm-8 text-left" >
          <!-- <h2 style="text-align:center;"><?php //echo $_SESSION["Organization"] ?>  Action Plan 2017-2018</h2> -->
          <br>
          <div class = "container">
            <div class = "col-sm-10">
              <div id ="legend" class = "text-left">
                <p><b> Legend </b></p>
                <div id = "legend-pane">
                  <span  class="fa fa-square" style="color:#008000;"></span> - Verified by SAO 
                  <span  class="fa fa-square" style="color:#FF8C00;"></span> - Verified by Organization Adviser 
                  <span  class="fa fa-square" style="color:#0071c5;"></span> - Pending 
                  <span  class="fa fa-square" style="color:#FF0000;"></span> - Returned
                </div>
              </div>
              <hr>
              <div id='calendar'></div>
            </div>
          </div>
        </div>
        <?php include ('progress-section.php'); ?>
  </div>
</div>
<!--  -->
  <div id='calendar'></div>
  <!-- Modal -->
  <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="form-horizontal" method="POST" action="editEventTitle.php">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
          <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        </div>
        <!-- <div class="form-group">
        <label for="color" class="col-sm-2 control-label">Color</label>
        <div class="col-sm-10">
          <select name="color" class="form-control" id="color">
            <option value="">Choose</option>
            <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
            <option style="color:#008000;" value="#008000">&#9724; Green</option>
            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
            <option style="color:#000;" value="#000">&#9724; Black</option>

          </select>
        </div>
        </div> -->
        <div class="form-group">
        <label for="proponent" class="col-sm-2 control-label">Proponent</label>
        <div class="col-sm-10">
          <input type="text" name="proponent" class="form-control" id="proponent" placeholder="Proponent">
        </div>
        </div>
        <div class="form-group">
        <label for="place" class="col-sm-2 control-label">Venue</label>
        <div class="col-sm-10">
          <input type="text" name="place" class="form-control" id="place" placeholder="Place">
        </div>
        </div>
        <div class="form-group">
         <div class="col-xs-9" class = "text-right">
          <label for="Rehearsals">Objectives of the Study</label>
          at the end of the activity, atleast of the participants should be able to:
          </div>
           <div class="col-xs-2 input-group">
            <input id="percentage" type="number" class="form-control" name="percentage"
             min="0" max = "100" placeholder="%">
            <span class="input-group-addon">%</span>
            </div>
        </div>
        <!-- TABLE OBJECTIVES !-->
        <div class = "form-group">
          <div class = "table-Objectives" style = "margin:0 5%;"></div>
        </div>
        <div class="form-group">
        <label for="notes" class="col-sm-2 control-label">Notes</label>
        <div class="col-sm-10">
           <textarea class="form-control" rows="5" cols="120" placeholder = "Comments/Suggestions here ..." name = "notes" id="notes"></textarea>
        </div>
        </div>
          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
            <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
            </div>
          </div>
        </div>

        <input type="hidden" name="id" class="form-control" id="id">


      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
    </div>
  </div>
  <!-- Modal -->
  <!-- ADD EVENT  -->
  <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="form-horizontal" method="POST" action="addEvent.php">

      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Add Event</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
          <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        </div>
        <!-- <div class="form-group">
        <label for="color" class="col-sm-2 control-label">Color</label>
        <div class="col-sm-10">
          <select name="color" class="form-control" id="color">
            <option value="">Choose</option>
            <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
            <option style="color:#008000;" value="#008000">&#9724; Green</option>
            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
            <option style="color:#000;" value="#000">&#9724; Black</option>

          </select>
        </div>
        </div> -->
        <div class="form-group">
        <label for="proponent" class="col-sm-2 control-label">Proponent</label>
        <div class="col-sm-10">
          <input type="text" name="proponent" class="form-control" id="proponent" placeholder="Proponent">
        </div>
        </div>

        <div class="form-group">
        <label for="venue" class="col-sm-2 control-label">Venue</label>
        <div class="col-sm-10">
          <input type="text" placeholder = "Place" name="place" class="form-control" id="place">
        </div>
        </div>
        <div class="form-group">
        <label for="start" class="col-sm-2 control-label">Start date</label>
        <div class="col-sm-10">
          <input type="text" name="start" class="form-control" id="start" readonly>
        </div>
        </div>
        <div class="form-group">
        <label for="end" class="col-sm-2 control-label">End date</label>
        <div class="col-sm-10">
          <input type="text" name="end" class="form-control" id="end" readonly>
        </div>
        </div>
        <div class="form-group">
        <label for="end" class="col-sm-2 control-label">Semester</label>
        <div class="col-sm-10">
          <select required="" class = "form-control" name = "semester" id = "semester">
            <option value = "">Select Semester...</option>
            <option>1st Semester</option>
            <option>2nd Semester</option>
          </select>
        </div>
        </div>
        <div class="form-group">
        <label for="notes" class="col-sm-2 control-label">Notes</label>
        <div class="col-sm-10">
           <textarea class="form-control" rows="5" cols="120" placeholder = "Comments/Suggestions here ..." name = "notes" id="notes"></textarea>
        </div>
        </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
    </div>
  </div>
</body>
<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          // $('#ModalEdit #color').val(event.color);
          $('#ModalEdit #place').val(event.place);
          $('#ModalEdit #notes').val(event.notes);
          $('#ModalEdit #proponent').val(event.proponent);
          fetchObjectives(event);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
      <?php foreach($events as $event):

        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        // $place = $event['place'];
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title'] ;?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
          place: '<?php echo $event['place']; ?>',
          notes: '<?php echo $event['notes']; ?>',
          proponent: '<?php echo $event['proponent']; ?>',
        },
      <?php endforeach; ?>
      ]
    });

    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }
      place = event.place;
      id =  event.id;

      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      Event[3] = place;

      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Saved');
          }else{
            alert('Could not be saved. try again.');
          }
        }
      });
    }

    function fetchObjectives(event){
      var id = event.id;
      $.ajax({
        url:"ActivityProposal-Objectives-Select.php",
        method:"POST",
        data:{id:id},
        dataType:"text",
        success:function(data){
            $('.table-Objectives').html(data);
          }
      });
    }

    // ADDING OF OBJECTIVES
  $(document).on('click','#btn_add-Objectives', function (){
      var id = $(this).data("id6");
      var objectives = $('#objectives').val();
      if(objectives == '')
      {
        alert("Enter objectives");
        return false;
      }
      $.ajax({
        url:"ActivityProposal-Objectives-Insert.php",
        method:"POST",
        data:{id:id,objectives:objectives},
        dataType:"text",
        success:function(data){
          alert(data);
          fetchObjectives();
        }
      });
    });
  $(document).on('click','#progress', function (){
      $("#progress-pane").slideToggle("slow");
    });
  $(document).on('click','#legend', function (){
      $("#legend-pane").slideToggle("slow");
    });

  });

</script>

</html>

<div class="col-sm-2 text-left" style="margin-left:8%;">
  <div class="single category">
    <div id = "progress">
      <h3 class="side-title" style = "">Progress</h3>
    </div>
    <div id = "progress-pane">
      <div class="form-group">
        <label for="usr">Event Name:</label>
        <input type="text" class="form-control" placeholder = "Event..." id="event-name">
      </div>
      <!-- FETCHING FROM PROGRES-FETCH.PHP -->
      <div id = "progress-details"></div>
    </div>
  </div>
</div>
<!-- JQUERY FOR TYPEAHEAD -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
<script type="text/javascript">
$(document).ready(function(){
  $(document).on('click','#progress', function (){
      $("#progress-pane").slideToggle("slow");
    });
});
  function fetchProgress() {
    var eventname = $('#event-name').val();
    $.ajax({
        url:"progress-fetch.php",
        method:"POST",
        data:{eventname:eventname},
        dataType:"text",
        success:function(data){
          $('#progress-details').html(data);
        }
      });
  }
  //EVENT PROGRESS INPUT FIELD
  $('#event-name').typeahead({
      source: function(query, result)
      {
       $.ajax({
        url:"event-fetch.php",
        method:"POST",
        data:{query:query},
        dataType:"json",
        success:function(data)
        {
         result($.map(data, function(item){
          return item;
         }));
        }
       })
      }
     });
     $('#event-name').change(function() {
        fetchProgress();
      });
        $('#event-name').on('keyup', function() {
            fetchProgress();
        });
      fetchProgress();
</script>


 <?php session_start(); ?>
  <title>EventO</title>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">EventO</a>
    </div>
    <ul id = "ben" class="nav navbar-nav">
      <li><a href="Home.php">Home</a></li>
        <li class="active"><a href="agenda-views.php">Action Plan</a></li>
        <li class = "active"><a href="ActivityProposal-Index.php">Activity Proposal</a></li>
        <li class = "active"><a href="Event-Index.php">Event</a></li>
        <li class = "active"><a href= "Financial-Disbursement-Index.php">Financial Reports/Disbursement</a></li>
        <li class = "active"><a href="Financial-Status-Index.php">Financial Status</a></li>
        <li class = "active"><a href="Student-Council-Index.php">Student Council</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" id ="dropdown-main" data-toggle="dropdown" href="#"><span class = "glyphicon glyphicon-bell"></span> <span class="badge badge-light count"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
            <li role="separator" class="divider"></li>
              <div id = "notification-pane" style="overflow-y: auto; padding-left:10px; height:300px;">
            </div>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href= "#" style="font-size: 15px;">
            <?php
              if($_SESSION["User"] == null)
              {
                header("Location: ../index2.php");
              }
              include("../Connection.php");
              $base = "Organization Adviser";
              $sql = "SELECT * FROM users where ID = '".$_SESSION["User"]."'";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0 )
              {
                  while($row = mysqli_fetch_array($result))
                  {

                    // KAPAG HINDI NAGMATCH YUNG NAKASESSION NA ORGANIZATION DUN SA RECORD
                    // AVOID LANG TO KAPAG NAGCHANGE NG DIRECTORY
                    if($row["UserLvl"] != $base)
                    {
                      header("Location: ../index2.php");
                    }
                    else
                    {
                      $sqlCheckCredentials = "SELECT Lastname,Firstname from org_adviser where users_ID = '".$row["ID"]."'";
                       $resultCheckCredentials = mysqli_query($conn, $sqlCheckCredentials);
                        if(mysqli_num_rows($resultCheckCredentials) > 0 )
                        {
                            while($rowCheckCredentials = mysqli_fetch_array($resultCheckCredentials))
                            {
                               echo ''.'Organization Adviser'.' - '.$rowCheckCredentials["Lastname"].','.$rowCheckCredentials["Firstname"].'';
                            }
                        }
                    }
                  }
              }
           ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="ViewAccount.php"><span class="glyphicon glyphicon-user"></span> View Account</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" id = "logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
      </li>
      </ul>
  </div>
</nav>
</html>
<script>
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"notification_fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#notification-pane').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();

 $(document).on('click', '#dropdown-main', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
  setInterval(function(){ 
  load_unseen_notification();; }, 5000);
 
  $('#logout').click(function(){
    var reallyLogout=confirm("Do you really want to log out?");
    if(reallyLogout)
    {
      $.ajax({
      type:'POST',
      url:'Logout.php',
      success:function(data){
        location.href="../index2.php";
        }
       });
    }
});
</script>

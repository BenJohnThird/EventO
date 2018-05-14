
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
        <?php
        // ADD ANOTHER TAB IF YOU'RE AN SUPER ADMIN
              include("../Connection.php");
              $base = "Employee";
              $sql = "SELECT * FROM users where ID = '".$_SESSION["User"]."'";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0 )
              {
                  while($row = mysqli_fetch_array($result))
                  {
                    if($row["AccessLvl"] == 'Super Admin')
                    {
                      echo '<li class = "active"><a href="System-Settings-User-Accounts.php">System Settings</a></li>';
                    }
                  }
              }
           ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class = "glyphicon glyphicon-bell"></span> <span class="badge badge-light">10</span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
            <li role="separator" class="divider"></li>
            <div style="overflow-y: auto; padding-left:10px;">
            </div>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href= "#" style="font-size: 15px;">
            <?php
              if($_SESSION["User"] == null)
              {
                header("Location:../index2.php");
              }
              include("../Connection.php");
              $base = "SAO";
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
                      $sqlCheckCredentials = "SELECT Lastname,Firstname,AccessLvl from school_individual inner join users on users.ID = school_individual.users_ID where users.ID = '".$row["ID"]."'";
                       $resultCheckCredentials = mysqli_query($conn, $sqlCheckCredentials);
                        if(mysqli_num_rows($resultCheckCredentials) > 0 )
                        {
                            while($rowCheckCredentials = mysqli_fetch_array($resultCheckCredentials))
                            {
                               echo ''.$rowCheckCredentials["AccessLvl"].' - '.$rowCheckCredentials["Lastname"].','.$rowCheckCredentials["Firstname"].'';
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
  function ajaxFunction()
{
var xmlHttp;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
  xmlHttp.onreadystatechange=function()
    {
    if(xmlHttp.readyState==4)
      {
      document.myForm.time.value=xmlHttp.responseText;
      }
    }
  xmlHttp.open("GET","userlogout.php",true);
  xmlHttp.send(null);
  }
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

<!DOCTYPE html>
<html>
<head>
  <title>EventO</title>
</head>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">EventO</a>
    </div>
    <ul id = "ben" class="nav navbar-nav">
        <li class = "active"><a href="Event-Index.php">Event</a></li>
        <?php
        session_start();
        if($_SESSION["User"] == null)
        {
          header("Location: ../index2.php");
        }
        if($_SESSION['AccessLvl'] === 'Super Admin')
        {
          echo '<li class = "active"><a href="#">User Account</a></li>';
        }
      ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href= "#" style="font-size: 15px;">
            <?php
              include("..//Connection.php");
              $sql = "SELECT * FROM users where ID = '".$_SESSION["User"]."'";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0 )
              {
                  while($row = mysqli_fetch_array($result))
                  {
                    $sqlCheckCredentials = "SELECT Lastname,Firstname,UserLvl from school_individual inner join users on users.ID = school_individual.users_ID where users.ID = '".$row["ID"]."'";
                       $resultCheckCredentials = mysqli_query($conn, $sqlCheckCredentials);
                        if(mysqli_num_rows($resultCheckCredentials) > 0 )
                        {
                            while($rowCheckCredentials = mysqli_fetch_array($resultCheckCredentials))
                            {
                               echo ''.$rowCheckCredentials["UserLvl"].' - '.$rowCheckCredentials["Lastname"].','.$rowCheckCredentials["Firstname"].'';
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
      url:'../Logout.php',
      success:function(data){
        location.href="../index2.php";
        }
       });
    }
});
</script>

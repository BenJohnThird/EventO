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
<?php
include ("Connection.php");

	//Get the Password of the Super Admin
	if (isset($_POST['SubmitButton']))
	{
		//Employee ID tong ID
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $position = 'Student Council';

    $salted = "rvbfdklfjklej323".$password;
    $hashed = hash('sha512',$salted);

  		$sql = "UPDATE `users` SET `Username`='$username',`Email`='$email',
      `Lastname`='$lastname',`Firstname`='$firstname',`Middlename`='$middlename',
      `Position`='$position'
       WHERE ID = '".$_SESSION["User"]."'";
       if(mysqli_query($conn, $sql))
       {
         echo '<div id = "alerty"  class="alert alert-success alert-dismissable fade in">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Info!</strong> User updated was successful.
         </div>';
       }
      else
      {
        echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Info!</strong> Error Occured.
        </div>';
      }
	}
  if (isset($_POST['SubmitButton_School']))
  {
    //Employee ID tong ID
    $department = mysqli_real_escape_string($conn, $_POST['department-select']);
    $organization = mysqli_real_escape_string($conn, $_POST['organization-select']);
    // UPDATE IN USER TABLE
    $sql = "UPDATE `users` SET `department_ID`='$department' WHERE ID = '".$_SESSION["User"]."'";
     if(mysqli_query($conn, $sql))
     {
      echo '<div id = "alerty"  class="alert alert-success alert-dismissable fade in">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Info!</strong> School Profile update was successful.
         </div>';
     }
    else
    {
      echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Info!</strong> Error Occured.
      </div>';
    }
    $sqlHas = "UPDATE `users_has_organization` SET `organization_ID`='$organization' WHERE `users_ID` = '".$_SESSION["User"]."'";
    if(mysqli_query($conn, $sqlHas))
     {

     }
    else
    {
      echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Info!</strong> Error Occured.
      </div>';
    }
  }
?>
<div class = "container-fluid text-center">
  <div class="row content">
    <?php include ('Student-Council-sidetabs.php') ?>
    <div class="col-sm-8 text-left" >
      <br>
      <div class = "container">
        <div class = "col-sm-10">
          <div style="border-bottom: 5%;">
            <div id = "student-council-organization-table"></div>
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
  // FETCHING OF ORGANIZATION SETTING
  function fetchOrganization() {
    $.ajax({
    url:"Student-Council-Organization-Select.php",
    method:"POST",
    success:function(data){
        $('#student-council-organization-table').html(data);
      }
  });
  }
  fetchOrganization();
  // BUTTON TO VERIFY/ACTIVATE THE USER
  $(document).on('click','#btn_verifyCouncil', function (){
    var id=$(this).data("idcouncil"); //ID USER COUNCIL
    var status = $(this).data("idstatus");
    $.ajax({
      url:"User-Verify.php",
      method:"POST",
      data:{id:id,status:status},
      dataType:"text",
      success:function(data){
          alert(data);
          fetchStudentCouncil();
        }
    });
  });
});
</script>

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
<?php
include ("../Connection.php");

	//Get the Password of the Super Admin
	if (isset($_POST['SubmitButton']))
	{
		//Employee ID tong ID
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $salted = "rvbfdklfjklej323".$password;
    $hashed = hash('sha512',$salted);

  		$sql = "UPDATE `users` SET `Username`='$username',`Email`='$email'
       WHERE ID = '".$_SESSION["User"]."'";
       if(mysqli_query($conn, $sql))
       {

       }
      else
      {
        echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Info!</strong> Error Occured.
        </div>';
      }
      $sqlUpdateStaff = "UPDATE `school_individual` SET `Lastname`='$lastname',`Firstname`='$firstname',`Middlename`='$middlename' where school_individual.users_ID ='".$_SESSION["User"]."'";
      if(mysqli_query($conn, $sqlUpdateStaff))
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
  
?>
  <div class="row content">
    <div class = "col-sm-1">
    </div>
    <div class="col-sm-8 text-left" >
      <br>
      <div class = "container">
        <div class = "col-sm-10">
          <div style="border-bottom: 5%;">
            <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profile</h3>
            <hr>
          </div>
          <?php
            $sql = "SELECT Username,Lastname,Firstname,Middlename,Email from users inner join school_individual on school_individual.users_ID = users.ID  where ID = '".$_SESSION["User"]."'";
            $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0 )
                {
                    while($row = mysqli_fetch_array($result))
                    {

                     echo '<form action = "" method = "post">
                       <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name = "username" id="inputPassword3"  value = "'.$row["Username"].'" placeholder="Username">
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                         <div class="col-sm-10">
                            <button type="button" data-toggle="modal" data-target="#passwordModal" class="btn btn-default">Change my password</button>
                         </div>
                       </div>

                       <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-2 col-form-label">Lastname</label>
                         <div class="col-sm-10">
                           <input type="text" name = "lastname" class="form-control" value = "'.$row["Lastname"].'"  id="inputEmail3" placeholder="Lastname">
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="inputPassword3" class="col-sm-2 col-form-label">Firstname</label>
                         <div class="col-sm-10">
                           <input type="text" name = "firstname" class="form-control" value = "'.$row["Firstname"].'"  id="inputPassword3" placeholder="Firstname">
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-2 col-form-label">Middlename</label>
                         <div class="col-sm-10">
                           <input type="text"  name = "middlename" class="form-control" value = "'.$row["Middlename"].'"  id="inputEmail3" placeholder="Middlename">
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                         <div class="col-sm-10">
                           <input type="email" name = "email" class="form-control" value = "'.$row["Email"].'"  id="inputEmail3" placeholder="Email">
                         </div>
                       </div>
                       <div class="form-group row">
                         <div class="col-sm-10 text-center">
                           <button type="submit" name = "SubmitButton" class="btn btn-primary">Update</button>
                         </div>
                       </div>
                     </form>';
                    }
                }
          ?>
        </div>
      </div>
    </div>
    <?php include ('progress-section.php'); ?>
  </div>
</div>
<!-- Modal -->
  <div class="modal fade" id="passwordModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Change your password</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <input type="text" id = "oldpass" class="form-control" placeholder="Old Password">
          </div>
          <div class="form-group">
              <input type="text" id = "newpass" class="form-control" placeholder="New Password">
          </div>
          <div class="form-group">
              <input type="text" id = "confirmpass" class="form-control" placeholder="Confirm Password">
           </div>
          <div class = "text-center">
           <button type="button" id="PasswordUpdate" class="btn btn-primary"> Confirm</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
$(document).ready(function(){
  $(document).on('click','#PasswordUpdate',function(){
    var oldpass = $('#oldpass').val();
    var newpass = $('#newpass').val();
    var confirmpass = $('#confirmpass').val();
    if(oldpass == "" || newpass == "" || confirmpass == "" )
    {
      alert('Please fill the fields');
      return false;
    }
    if(newpass != confirmpass)
    {
      alert('Confirm Password doenst match');
      return false;
    }
    $.ajax({
      url:"ViewAccount-Update-Password.php",
      method:"POST",
      data:{oldpass:oldpass,newpass:newpass,confirmpass:confirmpass},
      dataType:"text",
      success:function(data){
        alert(data);
      }
    });
  });
});
</script>

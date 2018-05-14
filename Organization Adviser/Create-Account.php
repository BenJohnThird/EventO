<html>
<head>
	<title>EventO</title>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="jquery3.js"></script>
  <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="Pictures/eventoLogo.png"/>
<!--===============================================================================================-->
  <form action = "" method = "post">
</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Tenor+Sans);
body{
	background-color: #5D92BA;
	 font-family: "Tenor Sans", sans-serif;
	 overflow-y: auto;
}
#image-section {
	position:relative;
	height:60%;
}
img {
    width:400px;
    height:400px;
    object-fit:cover;
}
#main-section {
	padding:50px 50px;
}
.Credentials{
	margin:auto;
}
.button {
    background-color: #ff69b4;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 10px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
.input-txt {
  width: 100%;
  padding: 9px 10px;
  background: #5D92BA;
  border: none;
  font-size: 1em;
  color: white;
  border-bottom: 1px dotted rgba(250, 250, 250, 0.4);
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -moz-transition: background-color 0.5s ease-in-out;
  -o-transition: background-color 0.5s ease-in-out;
  -webkit-transition: background-color 0.5s ease-in-out;
  transition: background-color 0.5s ease-in-out;
}
.input-txt:-moz-placeholder {
  color: #81aac9;
}
.input-txt:-ms-input-placeholder {
  color: #81aac9;
}
.input-txt::-webkit-input-placeholder {
  color: #81aac9;
}
.input-txt:focus {
  background-color: #4478a0;
}
.Credentials {
	color:white;
}
.login-heading {
  font: 1.8em/48px "Tenor Sans", sans-serif;
  color: white;
}
#alerty {
	position:absolute;
	width:100%;
	z-index:2;
}
</style>
<body>
<?php
session_start();
include ("Connection.php");
	if (isset($_POST['SubmitStudent']))
	{
		$username = mysqli_real_escape_string($conn, $_POST['Username_student']);
		$password = mysqli_real_escape_string($conn, $_POST['Password_student']);
		$lastname = mysqli_real_escape_string($conn, $_POST['Lastname_student']);
		$middlename = mysqli_real_escape_string($conn, $_POST['Middlename_student']);
		$firstname = mysqli_real_escape_string($conn, $_POST['Firstname_student']);
		$email = mysqli_real_escape_string($conn, $_POST['Email_student']);
		$course = mysqli_real_escape_string($conn, $_POST['Course_student']);
		$organization = mysqli_real_escape_string($conn, $_POST['Organization_student']);
		// IF USERNAME OR EMAIL IS ALREADY ADDED, BAWAL
		$sqlCheck = "SELECT * FROM users where Username = '$username' OR Email = '$email'";
		$result = $conn -> query($sqlCheck);
		// PAG MAY NAKITA
		if($result-> num_rows>0) 
		{
			echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>Info!</strong> Username or Email already exists! 
 				</div>';
		}
		// PAG WALA
		else
		{
			// HASHED
			$salted = "rvbfdklfjklej323".$password;
   			$PassW = hash('sha512',$salted);

			$sqlInsert = "INSERT INTO `users`(`ID`, `Username`, `Password`, `Email`, `Lastname`, `Firstname`, `Middlename`, `Department`, `Organization`, `Position`, `UserLvl`, `AccessLvl`) 
				VALUES (null, '$username','$PassW','$email','$lastname','$firstname',
				'$middlename','$course','$organization','Student Council','Student','User')";
				if(mysqli_query($conn, $sqlInsert))
				{
					echo '<div id = "alerty"  class="alert alert-success alert-dismissable fade in">
	    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<strong>Info!</strong> Account Successfully Created! Please wait for the admin/program head to verify your account. Thank you! 
	 				</div>';
				}
				else
				{
					echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
	    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<strong>Info!</strong> Error Occured! 
	 				</div>';
				}
		}

	}
	//Get the Password of the Super Admin
	if (isset($_POST['SubmitEmployee']))
	{
		$username = mysqli_real_escape_string($conn, $_POST['Username_employee']);
		$password = mysqli_real_escape_string($conn, $_POST['Password_employee']);
		$lastname = mysqli_real_escape_string($conn, $_POST['Lastname_employee']);
		$middlename = mysqli_real_escape_string($conn, $_POST['Middlename_employee']);
		$firstname = mysqli_real_escape_string($conn, $_POST['Firstname_employee']);
		$email = mysqli_real_escape_string($conn, $_POST['Email_employee']);
		$department = mysqli_real_escape_string($conn, $_POST['Department_employee']);
		// IF USERNAME OR EMAIL IS ALREADY ADDED, BAWAL
		$sqlCheck = "SELECT * FROM users where Username = '$username' OR Email = '$email'";
		$result = $conn -> query($sqlCheck);
		// PAG MAY NAKITA
		if($result-> num_rows>0) 
		{
			echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>Info!</strong> Username or Email already exists! 
 				</div>';
		}
		// PAG WALA
		else
		{
			// HASHED
			$salted = "rvbfdklfjklej323".$password;
   			$PassW = hash('sha512',$salted);

			$sqlInsert = "INSERT INTO `users`(`ID`, `Username`, `Password`, `Email`, `Lastname`, `Firstname`, `Middlename`, `Department`, `Organization`, `Position`, `UserLvl`, `AccessLvl`) 
				VALUES (null, '$username','$PassW','$email','$lastname','$firstname',
				'$middlename','$department','$department','$department','Employee','User')";
				if(mysqli_query($conn, $sqlInsert))
				{
					echo '<div id = "alerty"  class="alert alert-success alert-dismissable fade in">
	    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<strong>Info!</strong> Account Successfully Created! Please wait for the admin/program head to verify your account. Thank you! 
	 				</div>';
				}
				else
				{
					echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
	    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<strong>Info!</strong> Error Occured! 
	 				</div>';
				}
		}
	}
?>

	<div class = "container">
			<div class = "col-sm-4" id = "image-section">
			<!-- FOR DIV OF IMAGE -->
			<div class="container text-center" style = "height:33%;">
			</div>
			<img src="Pictures/eventoLogo.png" alt="EventO" width="400" height="300">
		</div>
		<div class = "col-sm-8" id = "main-section">
			<div class = "Credentials">
				<div id ="invi-col" style = "height:25%;">
				</div>
					<div class = "text-center" id = "Button-Pane">
						<h1>Create Account</h1>
						<input type = "button" id = "Student-Coll" value = "Student?" class= "button">
						<input type = "button" id = "Employee-Coll" value = "Employee?" class= "button">
					</div>
					<div id = "Student-Create">
						<form action = "" method = "post">
							<div class = "form-group">
								<p><input required="" type = "text" placeholder ="Username" autocomplete="off" id = "user-id" class = "input-txt" name = "Username_student" size = "50" maxlength = "60"></p>
								<p><input required type = "password" placeholder = "Password" autocomplete="off" class="input-txt" name = "Password_student" size = "50" maxlength = "60"></p>
								<p><input required type = "text" placeholder = "Lastname" autocomplete="off" class="input-txt" name = "Lastname_student" size = "50" maxlength = "60"></p>
								<p><input required type = "text" placeholder = "Firstname" autocomplete="off" class="input-txt" name = "Firstname_student" size = "50" maxlength = "60"></p>
								<p><input required type = "text" placeholder = "Middlename" autocomplete="off" class="input-txt" name = "Middlename_student" size = "50" maxlength = "60"></p>
								<p><input required type = "email" placeholder = "Email" autocomplete="off" class="input-txt" name = "Email_student"	 size = "50" maxlength = "60"></p>
								<p><input required type = "text" placeholder = "Course" autocomplete="off" class="input-txt" name = "Course_student" size = "50" maxlength = "60"></p>
								<p><input required type = "text" placeholder = "Organization" autocomplete="off" class="input-txt" name = "Organization_student" size = "50" maxlength = "60"></p>
							</div>
							<div class = "text-center">
								<input type = "submit" name = "SubmitStudent" value = "Create Student" class= "button" style="background-color:orange;">
							</div>
						</form>
					</div>
					<div id = "Employee-Create">
						<form action = "" method = "post">
						<div class = "form-group">
							<p><input required type = "text" placeholder ="Username" autocomplete="off" id = "user-id" class = "input-txt" name = "Username_employee" size = "50" maxlength = "60"></p>
							<p><input  required type = "password" placeholder = "Password" autocomplete="off" class="input-txt" name = "Password_employee" size = "50" maxlength = "60"></p>
							<p><input required type = "text" placeholder = "Lastname" autocomplete="off" class="input-txt" name = "Lastname_employee" size = "50" maxlength = "60"></p>
							<p><input required type = "text" placeholder = "Firstname" autocomplete="off" class="input-txt" name = "Firstname_employee" size = "50" maxlength = "60"></p>
							<p><input required type = "text" placeholder = "Middlename" autocomplete="off" class="input-txt" name = "Middlename_employee"	 size = "50" maxlength = "60"></p>
							<p><input required type = "email" placeholder = "Email" autocomplete="off" class="input-txt" name = "Email_employee" size = "50" maxlength = "60"></p>
							<p>
								<select required name = "Department_employee" class = "input-txt">
									<option>Select Department here...</option>
									<option>Maintenance</option>
									<option>Property</option>
									<option>TLTS</option>
									<option>SAO</option>
								</select>
							</p>
						</div>
						<div class = "text-center">
							<input type = "submit" name = "SubmitEmployee" value = "Create Employee" class= "button">
						</div>
					</form>
					</div>
					<a href="index.php" style="color: white;">
						<span class="glyphicon glyphicon glyphicon-arrow-left" ></span> 
					Back to Login</a>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("#Student-Create").hide();
	$("#Employee-Create").hide();
  $(document).on('click','#Student-Coll', function (){
  	$("#invi-col").hide(100);
  	$("#Employee-Create").hide();
    $("#Student-Create").slideToggle("slow");
    });
  $(document).on('click','#Employee-Coll', function (){
  	$("#invi-col").hide(100);
  	$("#Student-Create").hide();
    $("#Employee-Create").show("slide");
    });

});	
</script>
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
@import url(https://fonts.google.com/specimen/Merriweather+Sans);
body{
	background-image: url("img/BackGround2.png");
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
  background: white;
  border: none;
  font-size: 1em;
  color: #5D92BA;
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
  background-color: white;
}
.Credentials {
	color:#d43d86;
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
// COUNTER TO PARA HINDI MAGING UNDEFINED
$_SESSION['Username'] = '';
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
		$sy = mysqli_real_escape_string($conn, $_POST['sy-student']);
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
   			// IPAPASOK MUNA NATIN SA TBALE USERS
			$sqlInsert = "INSERT INTO `users`(`ID`, `Username`, `Password`, `Email`, `AccessLvl`, `UserLvl`, `user_status`) 
				VALUES (null, '$username','$PassW','$email','User','Student Council','Inactive')";
				if(mysqli_query($conn, $sqlInsert))
				{
					
				}
				else
				{
					echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
	    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<strong>Info!</strong> Error Occured! 
	 				</div>';
				}
			// SEARCH YUNG ID NUNG USER PARA ILALAGAY DUN SA TABLE NG USER HAS CHANGE
			$sqlSelect = "SELECT ID FROM users WHERE Username = '$username'";
			$resultSelect = mysqli_query($conn, $sqlSelect);
			if(mysqli_num_rows($resultSelect) > 0 )
			{
				while($rowSelect = mysqli_fetch_array($resultSelect))
				{
					$sqlInsertUserHas = "INSERT INTO `student_council`(`idstudent_council`, `Lastname`, `Firstname`, `Middlename`,`SY`, `users_ID`, `organization_ID`, `department_ID`) 
						VALUES (null,'$lastname','$firstname','$middlename','$sy','".$rowSelect["ID"]."','$organization',$course)";
					if(mysqli_query($conn, $sqlInsertUserHas))
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
		$sqlCheck = "SELECT Username,Email FROM users where Username = '$username' OR Email = '$email'";
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

   			$userLvl = "";
   			if($department == "Organization Adviser" || $department == "SAO")
   			{
   				$userLvl = "Admin";
   			}
   			// KAPAG SCHOOL INVIDUAL
   			else
   			{
   				$userLvl = "User";
   			}
   			// IPAPASOK MUNA NATIN SA TBALE USERS
			$sqlInsert = "INSERT INTO `users`(`ID`, `Username`, `Password`, `Email`, `AccessLvl`, `UserLvl`, `user_status`) 
				VALUES (null, '$username','$PassW','$email','$userLvl','$department','Inactive')";
				if(mysqli_query($conn, $sqlInsert))
				{
					
				}
				else
				{
					echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
	    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<strong>Info!</strong> Error Occured! 
	 				</div>';
				}	

			// SEARCH YUNG ID NUNG USER PARA ILALAGAY DUN SA TABLE
			$sqlSelect = "SELECT ID FROM users WHERE Username = '$username'";
			$resultSelect = mysqli_query($conn, $sqlSelect);
			if(mysqli_num_rows($resultSelect) > 0 )
			{
				while($rowSelect = mysqli_fetch_array($resultSelect))
				{
					// CHECK KUNG SAAN NA SIYA IPAPAPSOK
					// KAPAG ORGANIZATION ADVISER
					if($department == "Organization Adviser")
					{
						$sqlInsertAdviser = "INSERT INTO `org_adviser`(`idorg_adviser`, `Lastname`, `Firstname`, `Middlename`, `users_ID`) VALUES (null,'$lastname','$firstname','$middlename','".$rowSelect["ID"]."')";
						if(mysqli_query($conn, $sqlInsertAdviser))
						{
							$_SESSION['Username'] = $username;
							$_SESSION['Position'] = $department;
							echo '<div id = "alerty"  class="alert alert-success alert-dismissable fade in">
			    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    			<strong>Info!</strong> Account Successfully Created! Please wait for the admin to verify your account. Thank you! 
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
					// KAPAG SCHOOL INVIDUAL SIYA
					else
					{
						$sqlInsertSchoolIndi = "INSERT INTO `school_individual`(`idschool_individual`, `Lastname`, `Firstname`, `Middlename`, `users_ID`) VALUES (null,'$lastname','$firstname','$middlename','".$rowSelect["ID"]."')";
						if(mysqli_query($conn, $sqlInsertSchoolIndi))
						{
							echo '<div id = "alerty"  class="alert alert-success alert-dismissable fade in">
			    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    			<strong>Info!</strong> Account Successfully Created! Please wait for the admin to verify your account. Thank you! 
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
			}
			
		}
	}
?>
<div id = "contain">
	<div class = "container">
			<div class = "col-sm-7" id = "image-section">
			<!-- FOR DIV OF IMAGE -->
			<div class="container text-center" style = "height:33%;">
			</div>
			<img src="img/EventOFinal2.png" alt="EventO" width="400" height="300">
		</div>
		<div class = "col-sm-5" id = "main-section" style="background-color: white; margin-top:10%;">
			<div class = "Credentials">	
				<div id ="invi-col" style = "height:25%;">
				</div>
					<div class = "text-center" id = "Button-Pane">
						<h1>Create Account</h1>
						<input type = "button" id = "Student-Coll" value = "Student" class= "button">
						<input type = "button" id = "Employee-Coll" value = "Employee" class= "button">
					</div>
					<div id = "Student-Create">
						<form action = "" method = "post">
							<div class = "form-group">
								<p><input required="" type = "text" placeholder ="Username" autocomplete="off" id = "user-id" class = "input-txt" name = "Username_student" size = "50" maxlength = "60"></p>
								<p><input required type = "password" placeholder = "Password" autocomplete="off" class="input-txt" name = "Password_student" id = "student_old_pass" size = "50" maxlength = "60"></p>
								<p><input required type = "password" placeholder = "Confirm Password" autocomplete="off" class="input-txt" name = "Confirm_pass_student" id = "student_confirm_password" size = "50" maxlength = "60"></p>
								<div id = "confirm-valid">
									<span class = "hidden" id = "confirm-word">
										<h5>
											<b>Confirm Password Doesn't Match</b>
										</h5>
									</span>
								</div>
								<p><input required type = "text" placeholder = "Lastname" autocomplete="off" class="input-txt" name = "Lastname_student" size = "50" maxlength = "60"></p>
								<p><input required type = "text" placeholder = "Firstname" autocomplete="off" class="input-txt" name = "Firstname_student" size = "50" maxlength = "60"></p>
								<p><input required type = "text" placeholder = "Middlename" autocomplete="off" class="input-txt" name = "Middlename_student" size = "50" maxlength = "60"></p>
								<p><input required type = "email" placeholder = "Email" autocomplete="off" class="input-txt" name = "Email_student"	 size = "50" maxlength = "60"></p>
								<!-- COURSE/DEPARTMENT -->
								<?php 
								include ("Connection.php");
								$sqlDepartment = "SELECT * FROM department 
								where department_name != 'Maintenance'
								and department_name != 'SAO'  
								and department_name != 'Property'  
								and department_name != 'TLTS' 
								and department_name != 'Organization Adviser'
								order by department_name";
								$resultDepartment = mysqli_query($conn, $sqlDepartment);
								if(mysqli_num_rows($resultDepartment) > 0 )
								{
									echo '<p>
									<select required name = "Course_student" class = "input-txt">
									<option>Select Department here...</option>';
									while($row = mysqli_fetch_array($resultDepartment))
									{
										echo'
									<option value = "'.$row["ID"].'">'.$row["department_name"].'</option>';
									}
									echo '</select>
									</p>';
								}
								?>
								<?php 
								include ("Connection.php");
								$sqlOrganization = "SELECT * FROM organization order by organization_name";
								$resultOrganization = mysqli_query($conn, $sqlOrganization);
								if(mysqli_num_rows($resultOrganization) > 0 )
								{
									echo '<p>
									<select required name = "Organization_student" class = "input-txt">
									<option>Select Organization here...</option>';
									while($row = mysqli_fetch_array($resultOrganization))
									{
										echo'
									<option value = "'.$row["ID"].'">'.$row["organization_name"].'</option>';
									}
									echo '</select>
									</p>';
								}
								?>
								<select required name = "sy-student" class = "input-txt">
									<option value = "">Select School Year...</option>
									<option>2017-2018</option>
									<option>2018-2019</option>
									<option>2019-2020</option>
									<option>2021-2022</option>
									<option>2022-2023</option>
								 </select>
							</div>
							<div class = "text-center">
								<input type = "submit" name = "SubmitStudent" id = "student_add" value = "Create Student" class= "button" style="background-color:#d43d86;">
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
								<select required id = "Department_employee" name = "Department_employee" class = "input-txt">
									<option value ="">Select Department here...</option>
									<option>Maintenance</option>
									<option>Property</option>
									<option>TLTS</option>
									<option>SAO</option>
									<option>Organization Adviser</option>
								</select>
							</p>
						</div>
						<div class = "text-center">
							<input type = "submit" name = "SubmitEmployee" value = "Create Employee" class= "button">
						</div>
					</form>
					</div>
					<a href="index2.php" style="color: #d43d86">
						<span class="glyphicon glyphicon glyphicon-arrow-left" ></span> 
					Back to Login</a>
			</div>
		</div>
	</div>
</div>
	<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add your Organization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!-- TOP -->
      	<div class="form-group row">
		  <div class="col-xs-5">
		    <label for="ex1">Username</label>
		    <input class="form-control" id="pop-up-username" readonly value="<?php echo $_SESSION['Username'];?>" type="text">
		  </div>
		  <div class="col-xs-6">
		    <label for="ex2">As</label>
		    <input class="form-control" id="ex2" readonly value = 'Organization Adviser' type="text">
		  </div>
		</div>
		<!-- TABLE -->
		<div id = "organization_table"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php 
if($_SESSION['Username'] != "" && $_SESSION['Position'] == 'Organization Adviser')
{
	echo "<script>fetchOrganization()</script>";
	echo "<script>
	$('#exampleModalCenter').modal('show')</script>"; // Show modal
}
?> 
<script type="text/javascript">
$(document).ready(function(){
	$("#Student-Create").hide();
	$("#Employee-Create").hide();
	$("#invi-col").hide(100);
	//$('#exampleModalCenter').modal('show')
  $(document).on('click','#Student-Coll', function (){
  	$("#Employee-Create").hide();
    $("#Student-Create").slideToggle("slow");
    });
  $(document).on('click','#Employee-Coll', function (){
  	$("#invi-col").hide(100);
  	$("#Student-Create").hide();
    $("#Employee-Create").show("slide");
    });
  function fetchOrganization () {
  	var username = $('#pop-up-username').val();
  	$.ajax({
    url:"Create-Account-Organization-Select.php",
    method:"POST",
    data:{username:username},
    success:function(data){
        $('#organization_table').html(data);
      }
  	});
  }
  fetchOrganization();

  // ADDING OF OBJECTIVES
  $(document).on('click','#btn_add-Organization', function (){
      var id = $(this).data("id1"); //ID TO NG USER NA IPAPASOK
      var organization = $('#organization').val();
      if(organization == "")
      {
      	alert('Please specify organization');
      	return false;
      }
      // TABLE ORGANIZATION - LALAGYAN NG VALUE YUNG ORGANIZATION
      $.ajax({
        url:"Create-Account-Organization-Verifiy.php",
        method:"POST",
        data:{id:id,organization:organization},
        dataType:"text",
        success:function(data){
          alert(data);
          fetchOrganization();
        }
      });
    });

  $(document).on('keyup','#student_confirm_password',function(){
  	var password = $('#student_old_pass').val();
  	var confirmpass = $('#student_confirm_password').val();
  	if(password == "")
  	{
  		$('#student_add').attr('disabled',true);
  	}
  	else
  	{
  		if(password != confirmpass)
  		{
  			$('#confirm-word').removeClass('hidden');
  			$('#student_add').attr('disabled',true);
  		}
  		else
  		{
  			$('#confirm-word').addClass('hidden');
  			$('#student_add').attr('disabled',false);
  		}
  	}
  });
});	
</script>
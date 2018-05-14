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

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Carme" />

  <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="Pictures/eventoLogo.png"/>
<!--===============================================================================================-->
  <form action = "" method = "post">
</head>
<style>
@import url(https://fonts.google.com/specimen/Merriweather+Sans);
body{
	background-image: url("img/BackGround2.png");
	 font-family: Carme; 
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
  padding: 20px 10px;
  background: white;
  border: none;
  font-size: 1em;
  color: #4478a0;
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
	color: #d43d86;
}
.login-heading {
  font-family: Carme; 
  color: white;
}
#alerty {
	position:absolute;
	width:100%;
	z-index:2;
}
#wholepage {
	display:none;
}
</style>
<body>
<div id="wholepage">
<?php
session_start();

// SESSION HANDLING
if(isset($_SESSION['User']))
{
	session_destroy();
}
// 

include ("Connection.php");

	//Get the Password of the Super Admin
	if (isset($_POST['SubmitButton']))
	{
		//Employee ID tong ID
		$ID = $_POST['emp_ID'];
		$password = mysqli_real_escape_string($conn, $_POST['emp_Password']);
		$PassW = $_POST['emp_Password'];
		$Count;
		$Okay = false;
		// HASHED
		$salted = "rvbfdklfjklej323".$password;
   		$PassW = hash('sha512',$salted);

		$sql = "SELECT * FROM users where (Username = '$ID' and Password = '$PassW')
		or (Email = '$ID' and Password = '$PassW')";

		$result = $conn -> query($sql);
		$_SESSION['TransBool'] = $Okay;

		if($result-> num_rows>0) //PAG TAMA YUNG USERNAME AND PASSWORD
		{
			$row = $result->fetch_assoc();
			// CHECK IF IT REALLY MATCHES
			if((($row["Username"] == $ID) && ($row["Password"] == $PassW)) ||
				(($row["Email"] == $ID) && ($row["Password"] == $PassW)))
			{
				// KAPAG ACTIVE
				if($row["user_status"] == "Active")
				{
					$_SESSION['User'] = $row["ID"];
					$_SESSION['AccessLvl'] = $row["AccessLvl"];
					// CHECK THE USER LEVEL IF STUDENT OR EMPLOYEE
					if($row["UserLvl"] === "Student Council")
					{
						// DITO MAMIMIGAY NG ID OF ORG NG USER
						$sqlCheckSC = "SELECT idstudent_council,organization_ID,SY from student_council where users_ID = '".$row["ID"]."'";
						$resultCheckSC = mysqli_query($conn, $sqlCheckSC);
						if(mysqli_num_rows($resultCheckSC) > 0 )
						{
							while($rowCheckSC = mysqli_fetch_array($resultCheckSC))
							{
								$_SESSION["SchoolYear"] = $rowCheckSC["SY"];
								$_SESSION['UniversalID'] = $rowCheckSC["idstudent_council"];
								$_SESSION['OrgID'] = $rowCheckSC["organization_ID"];
								// DITO ICHECHECK KUNG ANO YUNG ID 
								$sqlCheckOrganization = "SELECT ID,organization_name from organization where ID = '".$rowCheckSC["organization_ID"]."'";
								$resultCheckOrganization = mysqli_query($conn, $sqlCheckOrganization);
								if(mysqli_num_rows($resultCheckOrganization) > 0 )
								{
									while($rowCheckOrganization = mysqli_fetch_array($resultCheckOrganization))
									{
										$_SESSION['Organization'] = $rowCheckOrganization["organization_name"];
									}
								}
							}
						}
						header("Location: agenda-views.php");
					}
					// CHECK THE POSITION
					else if($row["UserLvl"] === "Organization Adviser")
					{
						$sqlCheckOrg = "SELECT idorg_adviser from org_adviser where users_ID = '".$row["ID"]."'";
						$resultCheckOrg = mysqli_query($conn, $sqlCheckOrg);
						if(mysqli_num_rows($resultCheckOrg) > 0 )
						{
							while($rowCheckOrg = mysqli_fetch_array($resultCheckOrg))
							{
								$_SESSION['UniversalID'] = $rowCheckOrg["idorg_adviser"];
							}
						}
						header("Location: Organization Adviser/agenda-views.php");
					}
					else if($row["UserLvl"] === "SAO")
					{
						header("Location: SAO/agenda-views.php");
					}
					else if($row["UserLvl"] === "Maintenance")
					{
						header("Location: Maintenance/Event-Index.php");
					}
					else if($row["UserLvl"] === "Property")
					{
						header("Location: Property/Event-Index.php");
					}
					else if($row["UserLvl"] === "TLTS")
					{
						header("Location: TLTS/Event-Index.php");
					}
					else
					{
						echo '<div id = "alerty" class="alert alert-danger alert-dismissable fade in">
		    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    			<strong>Info!</strong> Your account is unidentified or your position is not yet specified. Please contact the administrator. Thank you.
		 				</div>';
					}
					
				}
				else
				{
					echo '<div id = "alerty" class="alert alert-info alert-dismissable fade in">
		    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    			<strong>Info!</strong> Your account is account not yet activated. Please contact the administrator. Thank you.
		 				</div>';
				}
			}
			else
			{
				echo '<div id = "alerty" class="alert alert-danger alert-dismissable fade in">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>Info!</strong> Incorrect ID or Password.
 				</div>';
			}
		}
		else //PAGMALI YUNG INPUT NA USERNAME AND PASSWORD
		{

			echo '<div id = "alerty"  class="alert alert-danger alert-dismissable fade in">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>Info!</strong> Incorrect ID or Password.
 				</div>';
		}
	}
?>
	<div class="container text-center" style = "height:20%;">
	</div>
	<div class = "container">
		<div class = "col-sm-7" id = "image-section">
			<a href = "index.html">
				<img src="img/EventOFinal2.png" alt="EventO" width="400" height="300">
			</a>
		</div>
		<div class = "col-sm-5" id = "main-section" style="background-color: white;">
		<form action = "" method = "post">
			<div class = "Credentials">
				<h1><b>Welcome. Please login.</b></h1>
				<div class = "form-group">
					<p><input required type = "text" placeholder ="Username or Email" autocomplete="off" id = "user-id" class = "input-txt" name = "emp_ID" size = "50" maxlength = "60"></p>
					<p><input required type = "password" placeholder = "Password" autocomplete="off" class="input-txt" name = "emp_Password" size = "50" maxlength = "60"></p>
				</div>
				<div class = "text-center">
					<input type = "submit" name = "SubmitButton" value = "Login" class= "button">
					<a href="Create-Account.php" style="color:#d43d86 ;">Create Account</a>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
</body>
<script>
$(document).ready(function(){
	$('#wholepage').fadeIn(1000);
});
</script>
</html>

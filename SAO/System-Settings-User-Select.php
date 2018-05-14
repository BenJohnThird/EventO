<?php
include('../Connection.php');
session_start();

// SETTINGS
$record_per_page = 10;
$page = '';

if(isset($_POST["page"]))
{
	$page = $_POST["page"];
}
else
{
	$page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$request = mysqli_real_escape_string($conn, $_POST["text"]);
$sql = "";
if($request != "")
{
	// IF THERE'S AN INPUT
	$sql = "SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN student_council on student_council.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'

			UNION
			SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN org_adviser on org_adviser.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'

			UNION
			SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl
			from users INNER JOIN school_individual on school_individual.users_ID = users.ID 
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			group by Username order by Lastname LIMIT $start_from,$record_per_page";
}
else
{
	// IF THERE'S NONE
	$sql = "SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN student_council on student_council.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			UNION
			SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN org_adviser on org_adviser.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			UNION
			SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl
			from users INNER JOIN school_individual on school_individual.users_ID = users.ID
			 where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			group by Username order by Lastname LIMIT $start_from,$record_per_page";
}
if($_POST["dropdown"] != "")
{
	// IF DROPDOWN IS NOT NULL
	$sql = "SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN student_council on student_council.users_ID = users.ID
			where UserLvl = '".$_POST["dropdown"]."'
			UNION
			SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN org_adviser on org_adviser.users_ID = users.ID
			where UserLvl = '".$_POST["dropdown"]."'
			UNION
			SELECT ID,user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN school_individual on school_individual.users_ID = users.ID 
			where UserLvl = '".$_POST["dropdown"]."'
			group by Username order by Lastname LIMIT $start_from,$record_per_page";
}

$result = mysqli_query($conn, $sql);	
if(mysqli_num_rows($result) > 0 )
{
	echo '<div class="table-responsive">';
	echo '<table class = "table">

			<tr>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Position</th>
				<th>Function</th>
			</tr>';
	while($row = mysqli_fetch_array($result))
	{
		if($row["user_status"] == 'Active')
		{
			$stat = 'btn-success';
			$btnWords = ' Active';
		}
		else
		{
			$stat = 'btn-danger';
			$btnWords = ' Inactive';
		}
		echo '<tr>
					<td class = "user_id">' .$row["Lastname"].'</td>
					<td class ="firstname" data-column="emp_firstname" >'.$row["Firstname"].'</td>
					<td>'.$row["Middlename"].'</td>
					<td>'.$row["UserLvl"].'</td>
					<td>
					<a id = "btn_verifyUser" data-iduser = "'.$row["ID"].'" data-idstatus = "'.$row["user_status"].'" class="btn btn-sm '.$stat.'">
						<span class="glyphicon glyphicon-ok"></span>'.$btnWords.'</a>
					</td>
			</tr>';
	}
}
else
{
	echo '<tr>
					<td colspan = "6"> Data not Found </td>
				</tr>';
}
echo '</table>';
echo '</div>';

$sqlCount = "";
if($sqlCount != "")
{
	$sql = "SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN student_council on student_council.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			UNION
			SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN org_adviser on org_adviser.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			UNION
			SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN school_individual on school_individual.users_ID = users.ID 
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			group by Username order by Lastname";
}
else
{
	$sqlCount = "SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN student_council on student_council.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			UNION
			SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN org_adviser on org_adviser.users_ID = users.ID
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			UNION
			SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN school_individual on school_individual.users_ID = users.ID 
			where Lastname LIKE '%".$request."%'
			OR Firstname LIKE '%".$request."%'
			OR Middlename LIKE '%".$request."%' 
			OR UserLvl LIKE '%".$request."%'
			group by Username order by Lastname";
}
if($_POST["dropdown"] != "")
{
	$sqlCount = "SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN student_council on student_council.users_ID = users.ID
			where UserLvl = '".$_POST["dropdown"]."'
			UNION
			SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN org_adviser on org_adviser.users_ID = users.ID
			where UserLvl = '".$_POST["dropdown"]."'
			UNION
			SELECT user_status,Lastname,Firstname,Middlename,UserLvl 
			from users INNER JOIN school_individual on school_individual.users_ID = users.ID 
			where UserLvl = '".$_POST["dropdown"]."'
			group by Username order by Lastname";
}

$page_result = mysqli_query($conn, $sqlCount);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);
echo '<div class = "text-center">';
for($i = 1; $i <= $total_pages; $i++)
{
		echo'<button class = "pagination_link btn btn-default" id = "'.$i.'" style= "cursor:pointer; border:1px solid #ccc;">'.$i.'</button>';
}
echo '</div>';
?>

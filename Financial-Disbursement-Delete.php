<?php  
include('Connection.php'); 
if($_POST["pass"] == 'Financial Disbursement')
{
	 $sql = "DELETE FROM `ap_consumption` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Food')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Publicity')
{
	 $sql = "DELETE FROM `ap_exp_materials` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Registration')
{
	 $sql = "DELETE FROM `ap_exp_materials` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Seminar')
{
	 $sql = "DELETE FROM `ap_exp_materials` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Stage Decoration')
{
	 $sql = "DELETE FROM `ap_exp_materials` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Others Material')
{
	 $sql = "DELETE FROM `ap_exp_materials` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Honorarium')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Program')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Certificates')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Token')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Others')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Venue')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Energy')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Transportation')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Contingency')
{
	 $sql = "DELETE FROM `ap_expenses` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Schedule')
{
	 $sql = "DELETE FROM `ap_schedule` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Documentation')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Food')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Materials')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Honorarium')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Program')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Token')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Others')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Venue')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Energy')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Transportation')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Documentation')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else if($_POST["pass"] == 'Budget Contingency')
{
	 $sql = "DELETE FROM `ap_distributionbudget` WHERE ID = '".$_POST["id"]."'";  
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }  
}
else
{
	echo 'Error Occured';
}


 ?>
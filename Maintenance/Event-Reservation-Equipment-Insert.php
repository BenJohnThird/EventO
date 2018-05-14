<?php
include ('../Connection.php');

$equipment = mysqli_real_escape_string($conn, $_POST['equipment']);

if($_POST["sector"] == "Classroom")
{
  $sqlSelect = "SELECT * FROM ap_reservation where Sector = '".$_POST["sector"]."' and Subject = '".$equipment."'";
  $result = mysqli_query($conn, $sqlSelect);
  if(mysqli_num_rows($result) > 0 )
  {
    echo 'Classroom Style already chosen';
  }
  else
  {
    // IF HINDI PA UPDATED
    $sqlUpdate = "UPDATE `ap_reservation` SET `Subject` = '".$equipment."'
    where Sector = '".$_POST["sector"]."' and ap_reservation_main_ID = '".$_POST["id"]."'";
    if(mysqli_query($conn, $sqlUpdate))
    	{
    		echo "Data Updated";
    	}
    	else
    	{
    		echo "Data not Updated";
    	}
  }
}
else
{
  $sql2 = "INSERT INTO `ap_reservation`(`ID`, `Subject`, `Pcs`, `Sector`, `ap_reservation_main_ID`)
   VALUES (null,'".$equipment."','".$_POST["pcs"]."','".$_POST["sector"]."','".$_POST["id"]."')";
  if(mysqli_query($conn, $sql2))
  	{
  		echo "Data Added";
  	}
  	else
  	{
  		echo "Data not added";
  	}
}
?>

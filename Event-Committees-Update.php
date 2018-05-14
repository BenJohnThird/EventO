<?php
include ('Connection.php');
$sqlSelect = "SELECT * FROM `ap_committees` WHERE `Committee` = '".$_POST["committee"]."' and ap_id = '".$_POST["id"]."' group by Committee";
$result = mysqli_query($conn, $sqlSelect);
if(mysqli_num_rows($result) > 0 )
{
	while($row = mysqli_fetch_array($result))
	{
		// IF IT'S DONE, IT WILL TURN INTO NOT DONE
		if($row["Committees_Status"] == "Done")
		{
			$sqlUpdate = "UPDATE `ap_committees` SET `Committees_Status`= 'Not Done'
			WHERE `Committee` = '".$_POST["committee"]."'  and  ap_id = '".$_POST["id"]."'";
			if(mysqli_query($conn, $sqlUpdate))
			{
				echo "Data Updated";
			}
			else
			{
				echo "Data not Updated";
			}
		}
		// IF IT'S NOT DONE, IT WILL TURN INTO DONE
		else
		{
			$sqlUpdate = "UPDATE `ap_committees` SET `Committees_Status`= 'Done'
			WHERE `Committee` = '".$_POST["committee"]."'  and ap_id = '".$_POST["id"]."'";
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
}
?>

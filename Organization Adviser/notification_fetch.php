<?php
session_start();
//notification fetch.php;
if(isset($_POST["view"]))
{
 include("Connection.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE history SET status=1 WHERE status=0";
  mysqli_query($conn, $update_query);
 }
 $query = "SELECT users.UserLvl,history.Function,history.Time from history 
 inner join users on users.ID = history.users_ID 
 inner join organization on organization.organization_name = history.organization
 inner join student_council on student_council.organization_ID = organization.ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
 where  organization.org_adviser_id = '".$_SESSION['UniversalID']."'
 group by history.id
 ORDER by history.id DESC";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <div>
   <kbd>'.$row["UserLvl"].'</kbd>
   <strong>'.$row["Function"].'</strong><br>
   <p>'.$row["Time"].'</p>
   </div>
   <hr>
   ';
  }
 }
 else
 {
  $output .= '<div>
   <strong>No notification</strong><br>
   </div>';
 }
 
 $query_1 = "SELECT users.UserLvl,history.Function,history.Time from history 
 inner join users on users.ID = history.users_ID 
 inner join organization on organization.organization_name = history.organization
 inner join student_council on student_council.organization_ID = organization.ID
inner join org_adviser on org_adviser.idorg_adviser = organization.org_adviser_id
 where  organization.org_adviser_id = '".$_SESSION['UniversalID']."'
 and status = 0
 group by history.id";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
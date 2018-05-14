<html>

<head>
<title>Paginate</title>
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
</head>
<body>
<form method='get'>
<?php  
$dbhost = 'localhost';  
$dbuser = 'root';  
$dbpass = "";  
$dbname = 'ceu';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');    
if(mysqli_connect_errno()) {
    printf("Connect failed");
    exit();
}  
$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM users ORDER BY ID ASC LIMIT $start_from, $limit";  
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
    echo '<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>ID</th>  
<th>Lastname</th> 
<th>Firstname</th>
<th>Middlename</th> 
</tr>  
<thead>  
<tbody> ';
    while($row = mysqli_fetch_array($result))
    {
        echo '<tr>  
            <td>'.$row["ID"].'</td>  
            <td>'.$row["Lastname"].'</td> 
            <td>'.$row["Firstname"].'</td>  
            <td>'.$row["Middlename"].'</td>    
            </tr>  ';
    }
}
?> 
</tbody>  
</table>  
<?php  
$sql = "SELECT COUNT(ID) FROM users";  
$rs_result = mysqli_query($conn,$sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='AddedPane-select.php?page=".$i."'>".$i."</a>";  
};  
echo $pagLink . "</div>";  
?>
</form>
</body>
</html>
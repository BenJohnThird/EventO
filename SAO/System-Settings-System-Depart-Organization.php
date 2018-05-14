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
      overflow-x: hidden;
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
<div class = "container-fluid text-center">
  <div class="row content">
    <?php include ('System-Settings-sidetabs.php') ?>
    <div class="col-sm-8 text-left" >
      <br>
      <div class = "container">
        <div class = "col-sm-10">
          <div style="border-bottom: 5%;">
            <div id = "organization-table"></div>
            <div id = "department-table"></div>
            <hr>
            <p><strong>In this section,</strong> you will appoint the department mainly for that organization.</p>
            <div id = "department-organization"></div>
          </div>
        </div>
      </div>
    </div>
    <?php include ('progress-section.php'); ?>
  </div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
  // FETCHING OF STUDENT COUNCIL
  function fetchOrganization(page) {
    $.ajax({
    url:"Student-Council-System-Organization.php",
    method:"POST",
    data:{page:page},
    success:function(data){
        $('#organization-table').html(data);
      }
  });
  }
  fetchOrganization();

  function fetchDepartment(page) {
    $.ajax({
    url:"Student-Council-System-Department.php",
    method:"POST",
    data:{page:page},
    success:function(data){
        $('#department-table').html(data);
      }
    });
  }
  fetchDepartment();
  function fetchOrgHasDept() {
    $.ajax({
    url:"Student-Council-System-OrgHasDept.php",
    method:"POST",
    success:function(data){
        $('#department-organization').html(data);
      }
    });
  }
  fetchOrgHasDept();

  $(document).on('click','.pagination_link',function(){
  var page = $(this).attr("id");
  var word = $(this).data("id1");
  if(word == 'Organization')
  {
     fetchOrganization(page);
  }
  else
  {
      fetchDepartment(page);
  }
});
  // BUTTON TO ADD ORGANIZATION
  $(document).on('click','#btn_add-Organization', function (){
    var name = $('#organization_name').val();
    var part = 'Organization';
    $.ajax({
      url:"System-Settings-System-Insert.php",
      method:"POST",
      data:{name:name,part:part},
      dataType:"text",
      success:function(data){
          alert(data);
          fetchOrganization();
          fetchOrgHasDept();
        }
    });
  });
  // BUTTON TO DELETE ORGANIZATION
  $(document).on('click','#btn_del-Organization', function (){
    var id = $(this).data("idunique");
    var part = 'Organization';
    var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"System-Settings-System-Delete.php",
          method:"POST",
          data:{id:id,part:part},
          dataType:"text",
          success:function(data){
              alert(data);
              fetchOrganization();
              fetchOrgHasDept();
            }
        });
      }
  });
  // BUTTON TO DELETE DEPARTMENT
  $(document).on('click','#btn_del-Department', function (){
    var id = $(this).data("idunique");
    var part = 'Department';
    var reallyLogout = confirm("Do you really remove this data?");
      if(reallyLogout)
      {
          $.ajax({
          url:"System-Settings-System-Delete.php",
          method:"POST",
          data:{id:id,part:part},
          dataType:"text",
          success:function(data){
              alert(data);
              fetchDepartment();
              fetchOrgHasDept();
            }
        });
      }
  });
  // BUTTON TO ADD DEPARTMENT
  $(document).on('click','#btn_add-Department', function (){
    var name = $('#department_name').val();
    var part = 'Department';
    $.ajax({
      url:"System-Settings-System-Insert.php",
      method:"POST",
      data:{name:name,part:part},
      dataType:"text",
      success:function(data){
          alert(data);
          fetchDepartment();
          fetchOrgHasDept();
        }
    });
  });
  // BUTTON TO ADD DEPARTMENT
  $(document).on('click','#btn_add-OrgHasDept', function (){
    var org = $(this).data("id1"); //organization
    var name = $('#department-select'+ org).val(); //department
    var part = 'OrgHasDept';
    if(name == "")
    {
      alert('Please Select a department');
      return false;
    }
    $.ajax({
      url:"System-Settings-System-Insert.php",
      method:"POST",
      data:{name:name,part:part,org:org},
      dataType:"text",
      success:function(data){
          alert(data);
          fetchOrgHasDept();
        }
    });
  });
});
</script>

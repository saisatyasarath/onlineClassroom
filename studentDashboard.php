<?php
   include 'databaseConnect.php';
   session_start();
   if(isset($_SESSION["uid"])){
   	 
   }else{
   		header("Location:login.php");
   }
   $uid = $_SESSION["uid"];
   $l = "classroom.jpg";
?>

<!DOCTYPE html>
<html>
<head>
	<title>VirtualClassroom</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Virtual Classroom</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.btn {
  background-color: RoyalBlue; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
#main {
  transition: margin-left .5s;
  padding: 16px;
}
.color2{
background-color:orange;
margin-left: 35px;
}
.color3{
background-color:yellow;
}
.text1{
color:red;
}
.pc{
  color: black;
}
.Round{
padding-top:30px;
}
.Round1{
padding-top:30px;
}
.Round2{
padding-top:30px;
padding-bottom:70px;
}

.jumbotron{
padding-bottom:0;
padding-top:10px;
}
.navbar-right{
padding-bottom:0;
}
.hello{
background-color:purple;
}
</style>
</head>


<body>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="studentDashboard.php">Home</a>
  <a href="studentClasses.php">My Classes</a>
  <a href="myGroups.php">MyGroups</a>
  <a href="logout.php">Logout</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

  <div class="container" style="padding-top: 50px;">
<div class="jumbotron">
<h2>Welcome to Gudimetla Classroom all announcements will appear here</h2>
<br>              
</div>

    <div class="panel-group">
        <?php 

        $q = "SELECT * from announcements where cid in (select cid from studentclasses where sid = $uid)";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        while($rows = $result->fetch_assoc()){
          $uid = $rows['uid'];
          $name = "";
          $q1 = "SELECT * from users where id = $uid";
          $sp1 = mysqli_prepare($conn,$q1);
          mysqli_stmt_execute($sp1);
          $result1 = mysqli_stmt_get_result($sp1);
          while($rows1 = $result1->fetch_assoc()){
            $name = $rows1['email'];
          }


          echo '<div class="panel panel-default">';
          echo '<div class="panel-heading">'.$rows["title"].'<label class="pull-right" style="margin-bottom:20px;">  by '.$name.'</label></div>';
          
          echo '<div class="panel-body">'.$rows["des"].'</div>';
          echo '</div>';
        }
      ?>
      </div>


</div>
</div>
</body>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</html>
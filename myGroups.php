<?php
   include 'databaseConnect.php';
   session_start();
   if(isset($_SESSION["uid"])){
     
   }else{
      header("Location:login.php");
   }
   $sid = $_SESSION["uid"];
   $l = "classroom.jpg";
?>

<!DOCTYPE html>
<html>
<head>
  <title>VirtualClassroom</title>
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}


.close1 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
a{
  color: black;
}
</style>
</head>


<body>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="studentDashboard.php"><i class="fa fa-home"></i> Home</a>
  <a href="studentClasses.php">My Classes</a>
  <a href="myGroups.php">My Groups</a>
  <a href="logout.php"> Logout</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

  <div class="container" style="padding-top:50px;">
<div class="jumbotron">
<h1>My Groups <button class="btn" id = "myBtn" style="margin-left: 700px; margin-bottom: 10px;"><i class="fa fa-plus"></i></button></h1>              
</div>
<button class="btn" id = "myBtn1" style="margin-left: 900px;">Join Group</button>
</div>

<section id="RectangleFrames" class="color1 Round1">
<div class="container">
<div class="card-group">
  
    <?php
        $q = "SELECT * from studentgroups where sid = $sid ";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        
        while($rows = $result->fetch_assoc()){
            $count++;
            $gid = $rows['gid'];
            $q1 = "SELECT * from groups where gid = $gid ";
            $sp1 = mysqli_prepare($conn,$q1);
            mysqli_stmt_execute($sp1);
            $result1 = mysqli_stmt_get_result($sp1);
            while($rows1 = $result1->fetch_assoc()){
              echo '<div class="col-auto mb-3">';
              echo '<a href="index1.php?gid='.$gid.'">';
              echo '<div style="width: 18rem" class="card color2">';
              echo '<img style="width:100%;height: 200px;" src="'.$l.'" class="card-img-top" alt="EyeGlasses">
                <div class="card-body ">
                <h5 class="card-title">Subject : '.$rows1['gname'].'</h5>
                <p class="card-text"><h5>Code is : '.$rows1['gcode'].'</h5></p>
                <p class="card-text text1"><h5><label class="pc">Subject :'.$rows1['cname'].'</label></h5></p> 
                </div>';
              echo '</div>';
              echo '</a>';
              echo '</div>';
            }
            
            
       }
     
  ?>

</div>
</div>
</section>
</div>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h1>Add Group</h1>  
      <span class="close">&times;</span>
      
    </div>
    <div class="modal-body">
      <br>
      <br>
      <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                
                <div class="card-body" style="background-color: black">
                    
                    <form method="POST" action="addGroupToDatabase.php">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Enter GroupName" name="name" required="required">
                        </div>
                        
                        
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Enter Subject" name="subject" required="required">
                        </div>
                        
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" style = "color:blue" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      <h1></h1>
    </div>
  </div>
</div>

<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h1>Join Group</h1>  
      <span class="close1">&times;</span>
      
    </div>
    <div class="modal-body">
      <br>
      <br>
      <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                
                <div class="card-body" style="background-color: black">
                    
                    <form method="POST" action="joinGroup.php">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Enter GroupCode" name="code" required="required">
                        </div>
                        
                        
                        
                        
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" style = "color:blue" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      <h1></h1>
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

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}


</script>
<script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</html>
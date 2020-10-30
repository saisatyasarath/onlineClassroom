<?php
session_start();
if(isset($_SESSION["uid"])){
  header("Location:studentDashboard.php");   
}
if(isset($_SESSION["fid"])){
  header("Location:facultyDashboard.php");   
}
$error1 ='';


if(isset($_GET['err']))
{
    $error1 = "* Email Doesn't exist";  
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Virtual Classroom</title>
  <link rel="stylesheet" href="loginCSS.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
  <div class="login">
   <br/>
   <br/> 
    <form method="post" action="forgotPasswordController.php">
        <input type="email" name="email" placeholder="Enter Email" required="required" /><span><?php echo $error1;?></span><br><br>
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Send Reset Password Link</button>
        
    </form>
    
</div>
</body>
</html>
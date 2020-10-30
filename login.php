<?php
session_start();
if(isset($_SESSION["uid"])){
  header("Location:studentDashboard.php");   
}
if(isset($_SESSION["fid"])){
  header("Location:facultyDashboard.php");   
}
$error1 ='';
$error2 ='';
$error3 ='';
$error4 ='';

if(isset($_GET['err1']))
{
    if($_GET['err1']=='empty_u')
    {
        $error1 = "username required";
    }
    if($_GET['err2']=='empty_p')
    {
        $error2 = "password required";
    }
}
if(isset($_GET['err3'])||isset($_GET['err4'])){
    if($_GET['err3']=='wrongusername')
    {
        $error3 = "Wrong Username";
    }
    if($_GET['err4']=='wrongpassword')
    {
        $error4 = "Wrong Password";
    }
    
    
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
    <h1>Login</h1>
    <form method="post" action="loginController.php">
        <input type="text" name="email" placeholder="Email" required="required" /><span><?php echo $error1;echo $error3; ?></span><br><br>
        <input type="password" name="password" placeholder="Password" required="required" /><span><?php echo $error2;echo $error4; ?></span><br><br>
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Let me in.</button>
        <br/>
        <a href="forgotPassword.php" style="color: red;">Forgot Password?</a>
    </form>
    <br />
    <br />
    <a href="signUp.php" class="btn btn-success btn-block btn-large">signUp</a>
</div>
</body>
</html>
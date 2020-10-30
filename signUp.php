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
$error5='';
$error6 = '';


if(isset($_GET['err1']))
{
    if($_GET['err1']=='empty_u')
    {
        $error1 = "*username empty";
    }
    if($_GET['err2']=='empty_p')
    {
        $error2 = "*password empty";
    }
    if($_GET['err3']=='empty_cp')
    {
        $error3 = "*confirm password empty";
    }
}

if(isset($_GET['err4'])){
    $error4 = "*please confirm your password";
    // echo "<script>if (window.confirm('Address added successfully')) 
    //         {
    //             window.location.href='http://localhost/WebProject/addAddress.php';
    //         };</script>";
    // echo "I am here";
}
if(isset($_GET['err6']))
{
    $error6 = "*Please select role";
}

if(isset($_GET['err5']))
{
    if($_GET['err5']=='already')
    {
        $error5 = "*user alreday exists in our database.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Virtual Classroom</title>
  <link rel="stylesheet" href="LoginCSS.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="login">
    <h1>SignUp</h1>
    <form method="post" action="signUpController.php">
        <input type="email" name="email" placeholder="Enter Email" required="required" /><span><?php echo $error1;echo $error5; ?></span><br><br>
        <input type="password" name="password" placeholder="Enter Password" required="required" /><span><?php echo $error2;?></span><br><br>
        <input type="password" name="confirmPassword" placeholder="comfirm Password" required="required" /><span><?php echo $error3; echo $error4;?></span><br><br>
        <select name="role" id="role" placeholder = "select role" required="">
            <option value="select">Select Role</option>
            <option value="student">student</option>
            <option value="faculty">faculty</option>
        </select><span><?php echo $error6;?></span><br><br>
        <input type="submit" name = "submit" class="btn btn-primary btn-block btn-large">
    </form>
    <br />
    <br />
    <a href="login.php" class="btn btn-success btn-block btn-large">Login</a>
</div>
</body>
</html>
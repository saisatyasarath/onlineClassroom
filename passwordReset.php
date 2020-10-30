<?php
	if (isset($_POST['submit'])) {
		$otp = $_POST['otp'];
		session_start();
		$gotp = $_SESSION['otp'];
		$email = $_SESSION['email'];
		if($otp!=$gotp){
			echo "<script>if (window.confirm('Please Enter Correct OTP')) 
            {
                window.location.href='http://localhost/virtualClassroom/PasswordResetUI.php';
            };</script>";
		}else{?>
		<html>
  			<head>
  				<title>Virtual Classroom</title>
  				<link rel="stylesheet" href="loginCSS.css">
  				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			</head>
			<body>
    
  				<div class="login">
   					<br/>
   					<br/> 
    				<form method="post" action="updatePassword.php">
        				<input type="text" name="pwd" placeholder="Enter New Password" required="required" /><br><br>
        				<button type="submit" class="btn btn-primary btn-block btn-large" name="submit">Submit</button>
    				</form>
    
				</div>
			</body>
		</html>
	<?php }
    }else{
		header("location:login.php");
	}
?>
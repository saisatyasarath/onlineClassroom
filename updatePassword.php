<?php
include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		session_start();
		$email = $_SESSION['email'];
		$pwd = $_POST['pwd'];
		$stmt = $conn->prepare("update users set password=? where email=?");
		$stmt->bind_param('ss', $pwd,$email);
		$stmt->execute();
		
		session_unset();
		session_destroy();

		echo "<script>if (window.confirm('Password Updated Successfully')) 
            {
                window.location.href='http://localhost/virtualClassroom/login.php';
            };</script>";
	}else{
		header("location:login.php");
	}
?>
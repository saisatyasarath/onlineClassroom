<?php
    include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		session_start();
		$sid = $_SESSION['uid'];
		$code = $_POST['code'];
		$password = $_POST['password'];
		$fpassword = null;
		$q = "SELECT * from users where id =?";

        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'i',$sid);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        while($rows = $result->fetch_assoc()){
        	$fpassword = $rows['password'];
        }
        if($fpassword!=$password){
        	echo "<script>if (window.confirm('Please enter correct Password')) 
            {
                window.location.href='http://localhost/virtualClassroom/studentClasses.php';
            }else{
            	window.location.href='http://localhost/virtualClassroom/studentClasses.php';
            };</script>";
        }

        $q = "SELECT * from classes where ccode =?";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'s',$code);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $cid = null;
        $fid = null;

        while($rows = $result->fetch_assoc()){
        	$cid = $rows['cid'];
        	$fid = $rows['fid'];
        }
        if($cid==null){
        	echo "<script>if (window.confirm('Please enter correct Code')) 
            {
                window.location.href='http://localhost/virtualClassroom/studentClasses.php';
            }else{
            	window.location.href='http://localhost/virtualClassroom/studentClasses.php';
            };</script>";
        }

        $stmt = $conn->prepare("INSERT INTO studentClasses (cid,fid,sid) VALUES (?, ?, ?)");
		$stmt->bind_param('iii', $cid, $fid,$sid);
		$stmt->execute();
		echo "<script>if (window.confirm('Joined Successfully')) 
            {
                window.location.href='http://localhost/virtualClassroom/studentClasses.php';
            }else{
            	window.location.href='http://localhost/virtualClassroom/studentClasses.php';
            };</script>";
	}else{
		header("Location:login.php");
    	exit();
	}
?>
<?php
    include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		session_start();
		$sid = $_SESSION['uid'];
		$code = $_POST['code'];

        $q = "SELECT * from groups where gcode =?";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'s',$code);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $gid = null;

        while($rows = $result->fetch_assoc()){
        	$gid = $rows['gid'];
        	
        }
        if($gid==null){
        	echo "<script>if (window.confirm('Please enter correct Code')) 
            {
                window.location.href='http://localhost/virtualClassroom/myGroups.php';
            }else{
            	window.location.href='http://localhost/virtualClassroom/myGroups.php';
            };</script>";
        }

        $stmt = $conn->prepare("INSERT INTO studentgroups (gid,sid) VALUES (?, ?)");
		$stmt->bind_param('ii', $gid,$sid);
		$stmt->execute();
		echo "<script>if (window.confirm('Joined Successfully')) 
            {
                window.location.href='http://localhost/virtualClassroom/myGroups.php';
            }else{
            	window.location.href='http://localhost/virtualClassroom/myGroups.php';
            };</script>";
	}else{
		header("Location:login.php");
    	exit();
	}
?>
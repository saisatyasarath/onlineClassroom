<?php
	include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		session_start();
		$fid = $_SESSION["fid"];
		$password = $_POST["password"];
		$fpassword = null;
		$q = "SELECT * from users where id =?";

        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'i',$fid);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        while($rows = $result->fetch_assoc()){
        	$fpassword = $rows['password'];
        }
        if($fpassword!=$password){
        	echo "<script>if (window.confirm('Please enter correct Password')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyDashboard.php';
            };</script>";
        }
        
        $name = $_POST["name"];
        $q = "SELECT * FROM classes WHERE cid=(SELECT max(cid) FROM classes)";

        $sp = mysqli_prepare($conn,$q);
        
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $id = null;
        while($rows = $result->fetch_assoc()){
        	//echo "I am here";
        	$id = $rows['cid'];
        	$id += 1;
        	//echo $id;
        }
        if($id==null){
        	$id = 1;
        }

        $ccode = "aaba".$id;

        $stmt = $conn->prepare("INSERT INTO classes (cid,cname, ccode,fid) VALUES (?,?, ?,?)");
		$stmt->bind_param('issi',$id, $name, $ccode,$fid);
		$stmt->execute();
        
        header("Location:successAddClass.php?err=$ccode");



	}else{
		header("Location:login.php");
	}
?>
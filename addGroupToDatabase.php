<?php
	include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		session_start();
		$sid = $_SESSION["uid"];
        $name = $_POST["name"];
        $sub = $_POST["subject"];
        $q = "SELECT * FROM groups WHERE gid=(SELECT max(gid) FROM groups)";

        $sp = mysqli_prepare($conn,$q);
        
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $id = null;
        while($rows = $result->fetch_assoc()){
        	//echo "I am here";
        	$id = $rows['gid'];
        	$id += 1;
        	//echo $id;
        }
        if($id==null){
        	$id = 5;
        }

        $ccode = "aabc".$id;

        $stmt = $conn->prepare("INSERT INTO groups (gname,sid,cname, gcode) VALUES (?,?, ?,?)");
		$stmt->bind_param('siss',$name,$sid, $sub,$ccode);
		$stmt->execute();

        $stmt = $conn->prepare("INSERT INTO studentgroups (gid,sid) VALUES (?,?)");
        $stmt->bind_param('ii',$id,$sid);
        $stmt->execute();
        
        echo "<script>if (window.confirm('Group Created successfully')) 
            {
                window.location.href='http://localhost/virtualClassroom/myGroups.php';
            };</script>";



	}else{
		header("Location:login.php");
	}
?>
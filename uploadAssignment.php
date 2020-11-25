<?php
	
	include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		date_default_timezone_set("Asia/Kolkata");
		$date = "".date("Y_m_d");
		$time = "".date("H_i_sa",time());
		$cid = $_POST["id"];
		session_start();
		$sid = $_SESSION["uid"];
		$aid = $_POST["aid"];
		$dt = $date.'('.$time.')';
		//echo $aid;
		$target_dir = "assignments/";
		$target_file = $target_dir .''.$sid.''.$date.''.$time.''.basename($_FILES['fileToUpload']["name"]);
    
		$uploadOk = 1;
		
		


		if (file_exists($target_file)) {
    	echo "<script>if (window.confirm('Sorry, file already exists.')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyDashboard.php';
            };</script>";
    		$uploadOk = 0;
		}

	    
	   $img = null;
	   if ($uploadOk == 0) {
    	
    	echo "<script>if (window.confirm('Sorry, your file was not uploaded.')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyDashboard.php';
            };</script>";
// if everything is ok, try to upload file
	} else {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    		
        	$img = "assignments/".''.$sid.''.$date.''.$time.''.basename( $_FILES["fileToUpload"]["name"]);
    	} else {
        	echo "<script>if (window.confirm('Sorry, there was an error uploading your file.')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyDashboard.php';
            };</script>";
    	}
	}

	$query = "SELECT * from assignmentfiles where cid=$cid and sid=$sid and aid=$aid";
    $aft = mysqli_prepare($conn,$query);
    mysqli_stmt_execute($aft);
    $res=mysqli_stmt_get_result($aft);
    if(mysqli_num_rows($res)){
    	

        $stmt = $conn->prepare("UPDATE assignmentfiles SET date=?,path=? where cid=$cid and sid=$sid and aid=$aid");
        $stmt->bind_param('ss',$dt,$img);
    //$stmt->bind_param('iissss',$fid,$cid,$img,$name,$des,$date);
    $stmt->execute();
    	//$res=mysqli_stmt_get_result($aft);
    	?>
    <script type="text/javascript">
                
                var v = <?php echo $cid ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClassStudent.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Assignment Updated Successfully')){
                    window.location.href = vr;    
                }
                
            </script>
  <?php
    }else{
	$stmt = $conn->prepare("INSERT INTO assignmentfiles (cid,sid,path,date,aid) VALUES (?,?,?,?,?)");
		$stmt->bind_param('iissi',$cid,$sid,$img,$dt,$aid);
		$stmt->execute();
		?>
    <script type="text/javascript">
                
                var v = <?php echo $cid ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClassStudent.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Assignment Uploaded Successfully')){
                    window.location.href = vr;    
                }
                
            </script>
  <?php
	}
    }else{
  		header("Location:login.php");
  }
?>
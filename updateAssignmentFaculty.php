<?php

  include 'databaseConnect.php';
  if(isset($_POST['submit'])){
  	$name = $_POST["name1"];
  	$date = ''.$_POST["date"];
    $des = $_POST["description"];
    $cid = $_POST["id"];
    $aid = $_POST["aid"];
    $target_dir = "uploads/";
    $date1 = "".date("Y_m_d");
		$time = "".date("H_i_sa",time());
		$target_file = $target_dir .''.$cid.''.$date1.''.$time.''. basename($_FILES['fileToUpload']["name"]);
    
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
    		
        	$img = "uploads/".''.$cid.''.basename( $_FILES["fileToUpload"]["name"]);
    	} else {
        	echo "<script>if (window.confirm('Sorry, there was an error uploading your file.')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyDashboard.php';
            };</script>";
    	}
	}

	$stmt = $conn->prepare("UPDATE assignments set path = ?, name = ?,description=?,date=? where id=?");
	$stmt->bind_param('ssssi',$img,$name,$des,$date,$aid);
	//$stmt->bind_param('iissss',$fid,$cid,$img,$name,$des,$date);
	$stmt->execute(); ?>
	<script type="text/javascript">
                
                var v = <?php echo $cid ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClass.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Assignment Updated Successfully')){
                    window.location.href = vr;    
                }
                
            </script>
  <?php }else{
  	header("Location:login.php");
  }

?>
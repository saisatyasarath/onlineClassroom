<?php

  include 'databaseConnect.php';
  if(isset($_POST['submit'])){
  	session_start();
  	$fid = $_SESSION["fid"];
  	$cid = $_POST["id"];
  	$name = $_POST["name1"];
  	$date = ''.$_POST["date"];
    $des = $_POST["description"];
  	echo gettype($date);
  	//echo $cid;
  	

  	
  		//echo "I am here";
  		//echo $_POST['fileToUpload'];
  		$target_dir = "uploads/";
		$target_file = $target_dir .''.$cid.''. basename($_FILES['fileToUpload']["name"]);
    
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

	   $stmt = $conn->prepare("INSERT INTO studymaterials (name,path,fid,cid,date,description) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param('ssiiss',$name,$img,$fid,$cid,$date,$des);
		$stmt->execute();
		echo "<script>if (window.confirm('Items added successfully')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyDashboard.php';
            };</script>";
  	
  	

  }else{
  	header("Location:login.php");
  }
?>
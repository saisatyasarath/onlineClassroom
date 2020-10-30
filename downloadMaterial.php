<?php 
	include 'databaseConnect.php';
	echo "hii";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$q = "SELECT * from studymaterials where id =?";

        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'i',$id);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $filepath = null;
        while($rows=$result->fetch_assoc()){
        	$filepath = $rows['path'];
        }
        echo $filepath;
        if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);

        
        exit;
    }
	}else{
		header("location:login.php");
	}
?>
<?php
    include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		$des = $_POST['ades'];
		$cid = $_POST['id'];
		$tit = $_POST['title'];
		$id = $_POST['uid'];
		$stmt = $conn->prepare("INSERT INTO announcements (cid,uid, des,title) VALUES (?,?,?,?)");
		$stmt->bind_param('iiss',$cid, $id, $des,$tit);
		$stmt->execute();
		echo "I";
		if(isset($_SESSION["fid"])){ echo "Hello"; ?>


		<script type="text/javascript">
                
                var v = <?php echo $cid ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClass.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Announcement Posted Successfully')){
                    window.location.href = vr;    
                }
                
            </script>

		<?php }else{ echo "I am here"; ?>
			<script type="text/javascript">
                
                var v = <?php echo $cid ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClassStudent.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Announcement Posted Successfully')){
                    window.location.href = vr;    
                }
                
            </script>
		<?php }
	}else{
		header("Location:login.php");
	}
?>
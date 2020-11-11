<?php
    include 'databaseConnect.php';
	if(isset($_POST['submit'])){
		$des = $_POST['ades'];
		$cid = $_POST['id'];
		$tit = $_POST['title'];
		session_start();
		$fid = $_SESSION['fid'];
		$stmt = $conn->prepare("INSERT INTO announcements (cid,uid, des,title) VALUES (?,?,?,?)");
		$stmt->bind_param('iis',$cid, $fid, $des,$tit);
		$stmt->execute();
		?>
		<script type="text/javascript">
                
                var v = <?php echo $cid ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClass.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Announcement Posted Successfully')){
                    window.location.href = vr;    
                }
                
            </script>

		<?php
	}else{
		header("Location:login.php");
	}
?>
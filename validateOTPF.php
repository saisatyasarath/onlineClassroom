<?php
	if (isset($_POST['submit'])) {
		include 'databaseConnect.php';
		$otp = $_POST['otp'];
		session_start();
		$gotp = $_SESSION['cotp'];
		$email = $_SESSION['cemail'];
		$clid = $_SESSION['clid'];
		if($otp!=$gotp){
			echo "<script>if (window.confirm('Please Enter Correct OTP')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyChangeOTPUI.php';
            };</script>";
		}else{
		    $q = "SELECT * from users where email =?";
        	$sp = mysqli_prepare($conn,$q);
        	mysqli_stmt_bind_param($sp,'s',$email);
        	mysqli_stmt_execute($sp);
        	$result = mysqli_stmt_get_result($sp);
        	$ufid = 0;
        	while($r = $result->fetch_assoc()){
        		$ufid = $r['id'];
        	}
        	$stmt = $conn->prepare("update classes set fid=? where cid=?");
			$stmt->bind_param('ii', $ufid,$clid);
			$stmt->execute();

			$stmt1 = $conn->prepare("update studymaterials set fid=? where cid=?");
			$stmt1->bind_param('ii', $ufid,$clid);
			$stmt1->execute();

			$stmt2 = $conn->prepare("update studentclasses set fid=? where cid=?");
			$stmt2->bind_param('ii', $ufid,$clid);
			$stmt2->execute();

			$stmt3 = $conn->prepare("update assignments set fid=? where cid=?");
			$stmt3->bind_param('ii', $ufid,$clid);
			$stmt3->execute();

			unset($_SESSION['cotp']);
			unset($_SESSION['cemail']);
			unset($_SESSION['clid']);
			?>
			<script type="text/javascript">
                
                var v = <?php echo $clid ?>;
                var ur = "".concat("http://localhost/virtualClassroom/facultyDashboard.php");
                var vr = ur.concat("");
                if(window.confirm('Faculty Changed Successfully')){
                    window.location.href = vr;    
                }
                
            </script>
 
		<?php }
    }else{
		header("location:login.php");
	}
?>
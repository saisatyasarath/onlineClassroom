<?php  

	if(isset($_POST['submit'])){
        session_start();
        $pid = $_SESSION['fid'];
		include 'databaseConnect.php';
		$error1='';
		$email = $_POST['email'];
		$q = "SELECT * from users where email =?";
        $id1 = $_POST['id'];
        echo $id1;
        echo $email;
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'s',$email);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);

// echo mysqli_num_rows($result);
        if(mysqli_num_rows($result))
        {
            $role = "";
            $comid;
            while($r = $result->fetch_assoc()){
                $role = $r['Role'];
                $comid = $r['id'];
            }
            if($role!="faculty"){?>
                <script type="text/javascript">
                
                var v = <?php echo $id1 ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClass.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Please Check Your Mail')){
                    window.location.href = vr;    
                }
                
            </script>
            <?php }
            if($comid==$pid){
                ?>
                <script type="text/javascript">
                
                var v = <?php echo $id1 ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClass.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('you cant enter your mail')){
                    window.location.href = vr;    
                }
                
            </script>
            <?php
            }
            

        }else{
            
            ?>
            <script type="text/javascript">
                
                var v = <?php echo $id1 ?>;
                var ur = "".concat("http://localhost/virtualClassroom/viewClass.php?id=");
                var vr = ur.concat(v);
                if(window.confirm('Please Check Your Mail')){
                    window.location.href = vr;    
                }
                
            </script>
            <?php
            exit();
        }

    require("C:/xampp/PHPMailer-master/src/PHPMailer.php");
    require("C:/xampp/PHPMailer-master/src/SMTP.php");
    require("C:/xampp/PHPMailer-master/src/Exception.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 

    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 1; 
    $mail->Port = 465 ; //465 or 587

    $mail->SMTPSecure = 'ssl';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);

    //Authentication
    $mail->Username = "";
    $mail->Password = "";

    //Set Params
    $mail->SetFrom("");
    $mail->AddAddress($email);
    $mail->Subject = "Password Reset";
    $otp = mt_rand(10000000, 99999999);
    $mail->Body = '<h2>Your OTP is : '.$otp.'</h2>';
    $mail->SMTPDebug = false;



     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
     	session_start();
     	$_SESSION['cotp'] = $otp;
     	$_SESSION['cemail'] = $email;
     	$_SESSION['clid'] = $id1;
        echo "<script>if (window.confirm('Please Check Your Mail')) 
            {
                window.location.href='http://localhost/virtualClassroom/facultyChangeOTPUI.php';
            };</script>";
      }


	}else{
		header("location:login.php");
	}


?>

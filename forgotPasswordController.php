<?php  

	if(isset($_POST['login'])){
		include 'databaseConnect.php';
		$error1='';
		$email = $_POST['email'];
		$q = "SELECT * from users where email =?";

        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'s',$email);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);

// echo mysqli_num_rows($result);
        if(mysqli_num_rows($result))
        {
            
        }else{
        	header("Location:forgotPassword.php?err=already");
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
    $mail->SetFrom();
    $mail->AddAddress($email);
    $mail->Subject = "Password Reset";
    $otp = mt_rand(10000000, 99999999);
    $mail->Body = '<h2>Your OTP is : '.$otp.'</h2>';
    $mail->SMTPDebug = false;



     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
     	session_start();
     	$_SESSION['otp'] = $otp;
     	$_SESSION['email'] = $email;
     	
        echo "<script>if (window.confirm('Please Check Your Mail')) 
            {
                window.location.href='http://localhost/virtualClassroom/PasswordResetUI.php';
            };</script>";
      }


	}else{
		header("location:login.php");
	}


?>

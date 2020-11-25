<?php
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
    
    $mail->AddAddress("scssreddy.gudimetla@vitap.ac.in");
    $mail->Subject = "Test";
    $mail->Body = "hello";


     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
?>
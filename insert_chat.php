<?php

//insert_chat.php

include('database_connection.php');

session_start();

// $data = array(
//  ':to_user_id'  => $_POST['to_user_id'],
//  ':from_user_id'  => $_SESSION['user_id'],
//  ':chat_message'  => $_POST['chat_message'],
//  ':status'   => '1'
// );

 $to_user_id  = $_POST['to_user_id'];
 $from_user_id  = $_SESSION['user_id'];
 $chat_message  = $_POST['chat_message'];
 $status   = 1;

$q = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES (?,?,?,?)
";

        $sp = mysqli_prepare($connect,$q);
        mysqli_stmt_bind_param($sp,'iisi',$to_user_id,$from_user_id,$chat_message,$status);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);

// $statement = $connect->prepare($query);
// $statement->execute();


 echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);


?>

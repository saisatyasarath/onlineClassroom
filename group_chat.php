<?php

//group_chat.php

include('database_connection.php');

session_start();

if($_POST["action"] == "insert_data")
{
 // $data = array(
 //  ':from_user_id'  => $_SESSION["user_id"],
 //  ':chat_message'  => $_POST['chat_message'],
 //  ':status'   => '1'
 // );

$user_id = $_SESSION["user_id"];
$chat_message = $_POST['chat_message'];
$status   = 1;


 // $query = "
 // INSERT INTO chat_message 
 // (from_user_id, chat_message, status) 
 // VALUES (:from_user_id, :chat_message, :status)
 // ";

 // $statement = $connect->prepare($query);

$cid = $_SESSION["clid"];
$q = "
INSERT INTO chat_message 
(to_user_id,from_user_id, chat_message, status,cid) 
VALUES (?,?,?,?,?)
";
$a = 0;

        $sp = mysqli_prepare($connect,$q);
        mysqli_stmt_bind_param($sp,'iisii',$a,$user_id,$chat_message,$status,$cid);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);

 
 
 echo fetch_group_chat_history($connect);
 

}

if($_POST["action"] == "fetch_data")
{
 echo fetch_group_chat_history($connect);
}

?>
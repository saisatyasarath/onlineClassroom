<?php
$se = "localhost";
$un = "root";
$pw = "root";
$db = "virtualClassroom";

$connect = mysqli_connect($se,$un,$pw,$db);

date_default_timezone_set('Asia/Kolkata');

function fetch_user_last_activity($user_id, $connect)
{
 $q = "
 SELECT * FROM login_details 
 WHERE user_id = '$user_id' 
 ORDER BY last_activity DESC 
 LIMIT 1
 ";
 // $statement = $connect->prepare($query);
 // $statement->execute();
 // $result = $statement->fetchAll();

 $sp = mysqli_prepare($connect,$q);
mysqli_stmt_execute($sp);
$result = mysqli_stmt_get_result($sp);
 foreach($result as $row)
 {
  return $row['last_activity'];
 }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
 $q = "
 SELECT * FROM chat_message 
 WHERE (from_user_id = '".$from_user_id."' 
 AND to_user_id = '".$to_user_id."') 
 OR (from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."') 
 ORDER BY timestamp DESC
 ";
 // $statement = $connect->prepare($query);
 // $statement->execute();
 // $result = $statement->fetchAll();
 $sp = mysqli_prepare($connect,$q);
mysqli_stmt_execute($sp);
$result = mysqli_stmt_get_result($sp);
 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {
  $user_name = '';
  if($row["from_user_id"] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_message"].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';

 $query = "
 UPDATE chat_message 
 SET status = '0' 
 WHERE from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."' 
 AND status = '1'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();

 return $output;
}

function get_user_name($user_id, $connect)
{
 $q = "SELECT email FROM users WHERE id = '$user_id'";
 // $statement = $connect->prepare($query);
 // $statement->execute();
 // $result = $statement->fetch_all();

 $sp = mysqli_prepare($connect,$q);
mysqli_stmt_execute($sp);
$result = mysqli_stmt_get_result($sp);
 foreach($result as $row)
 {
  return $row['email'];
 }
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
 $q = "
 SELECT * FROM chat_message 
 WHERE from_user_id = ? 
 AND to_user_id = ? 
 AND status = ?
 ";
 // $statement = $connect->prepare($query);
 // $statement->execute();
 $status ='1';

 $sp = mysqli_prepare($connect,$q);
        mysqli_stmt_bind_param($sp,'iii',$from_user_id,$to_user_id,$status);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
 $count = mysqli_num_rows($result);
 $output = '';
 if($count > 0)
 {
  $output = '<span class="label label-success">'.$count.'</span>';
 }
 return $output;
}


function fetch_is_type_status($user_id, $connect)
{
 $q = "
 SELECT is_type FROM login_details 
 WHERE user_id = '".$user_id."' 
 ORDER BY last_activity DESC 
 LIMIT 1
 "; 
 // $statement = $connect->prepare($query);
 // $statement->execute();
 //$result = $statement->fetchAll();
 $sp = mysqli_prepare($connect,$q);
mysqli_stmt_execute($sp);
$result = mysqli_stmt_get_result($sp);
 $output = '';
 foreach($result as $row)
 {
  if($row["is_type"] == 'yes')
  {
   $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
  }
 }
 return $output;
}

function fetch_group_chat_history($connect)
{
$a = 0;
//session_start();
$cid = $_SESSION["clid"];
 $q = "
 SELECT * FROM chat_message 
 WHERE to_user_id = $a and cid = $cid
 ORDER BY timestamp DESC
 ";

 $sp = mysqli_prepare($connect,$q);
mysqli_stmt_execute($sp);
$result = mysqli_stmt_get_result($sp);

 

 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {

  $user_name = '';
  if($row["from_user_id"] == $_SESSION["user_id"])
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }

  $output .= '

  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row['chat_message'].' 
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 return $output;
}


function fetch_group_chat_history1($connect)
{
$a = 0;
//session_start();
$gid = $_SESSION["gid"];
 $q = "
 SELECT * FROM chat_message 
 WHERE to_user_id = $a and gid = $gid
 ORDER BY timestamp DESC
 ";

 $sp = mysqli_prepare($connect,$q);
mysqli_stmt_execute($sp);
$result = mysqli_stmt_get_result($sp);

 

 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {

  $user_name = '';
  if($row["from_user_id"] == $_SESSION["user_id"])
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }

  $output .= '

  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row['chat_message'].' 
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 return $output;
}






?>
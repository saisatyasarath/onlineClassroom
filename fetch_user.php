<?php

//fetch_user.php

include('database_connection.php');

session_start();


$us = $_SESSION['user_id'];
$cid = $_SESSION['clid'];
$q = "
SELECT * FROM users 
WHERE id != $us and id in (SELECT sid from studentclasses where cid = $cid) 
";


$sp = mysqli_prepare($connect,$q);
mysqli_stmt_execute($sp);
$result = mysqli_stmt_get_result($sp);
// $statement = $connect->prepare($query);

// $statement->execute();

?>


<?php

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';
$q1 = "
select fid from classes where cid = $cid 
";
$sp1 = mysqli_prepare($connect,$q1);
mysqli_stmt_execute($sp1);
$result1 = mysqli_stmt_get_result($sp1);
$fid = 0;
foreach($result1 as $row1){
	$fid = $row1['fid'];
}
if($fid!=0&&$fid!=$us){
$q2 = "
select * from users where id = $fid 
";
$sp2 = mysqli_prepare($connect,$q2);
mysqli_stmt_execute($sp2);
$result2 = mysqli_stmt_get_result($sp2);	
foreach($result2 as $row2)
{	
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row2['id'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">Online</span>';
 }
 else
 {
  $status = '<span class="label label-danger">Offline</span>';
 }
 $output .= '
 <tr>
  <td>'.$row2['email'].' (Faulty) '.count_unseen_message($row2['id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row2['id'], $connect).'</td>
 
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row2['id'].'" data-tousername="'.$row2['email'].'">Start Chat</button></td>
 </tr>
 ';
}
}

foreach($result as $row)
{	
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['id'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">Online</span>';
 }
 else
 {
  $status = '<span class="label label-danger">Offline</span>';
 }
 $output .= '
 <tr>
  <td>'.$row['email'].' '.count_unseen_message($row['id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['id'], $connect).'</td>
 
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['email'].'">Start Chat</button></td>
 </tr>
 ';
}



$output .= '</table>';

echo $output;

?>
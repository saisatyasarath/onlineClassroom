<?php

//fetch_user.php

include('database_connection.php');

session_start();

$sid = $_SESSION["user_id"];
$gid = $_SESSION["gid"];

$query = "
SELECT * FROM users 
WHERE id != $sid and id in (SELECT sid from studentgroups where gid = $gid) 
";

$sp1 = mysqli_prepare($connect,$query);
mysqli_stmt_execute($sp1);
$result1 = mysqli_stmt_get_result($sp1);

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <th>Username</th>
  <th>Status</th>
  <th>Action</th>
 </tr>
';

foreach($result1 as $row)
{

  
 $id = $row['id'];
 $q2 = "
select * from users where id = $id 
";
$sp2 = mysqli_prepare($connect,$q2);
mysqli_stmt_execute($sp2);
$result2 = mysqli_stmt_get_result($sp2);
  foreach ($result2 as $row1) {
     # code...
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row1['id'], $connect);
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
  <td>'.$row1['email'].' '.count_unseen_message($row1['id'], $_SESSION['user_id'], $connect).'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row1['id'].'" data-tousername="'.$row1['email'].'">Start Chat</button></td>
 </tr>
 ';
}
}

$output .= '</table>';

echo $output;

?>
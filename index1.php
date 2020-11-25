<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
 header('location:login.php');
}

if(!isset($_GET['gid'])){
  header('location:login.php');
}
$id = $_GET['gid'];
$sid = $_SESSION['user_id'];
$sen = "SELECT * from studentgroups where gid=$id and sid = $sid";
   $sp2 = mysqli_prepare($connect,$sen);
   mysqli_stmt_execute($sp2);
    $ans = mysqli_stmt_get_result($sp2);
    $sub = null;
    $ffid = -1;
    while($ab = $ans->fetch_assoc()){
      
      $ffid = $ab['id'];
    }

    if($ffid==-1){
      header("Location:login.php");
    }
$_SESSION["gid"] = $id;

?>


<html>  
    <head>  
        <title>Virtual Classroom</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- Font special for pages-->
   

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <style type="text/css">
      .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
    </style>  
    <body>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="studentDashboard.php"><i class="fa fa-home"></i> Home</a>
  <a href="studentClasses.php">My Classes</a>
  <a href="logout.php"> Logout</a>
</div> 
    <div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span> 
        <div class="container">
   <br />
   
   <h3 align="center">Group Members</h3><br />
   <br />
   
   <input type="hidden" id="is_active_group_chat_window" value="no" />
   <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs" style="margin-bottom: 20px;">Group Chat</button>
   <div class="table-responsive">
    
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
  </div>


    </body>  
</html>  

<div id="group_chat_dialog" title="Group Chat Window">
 <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

 </div>
 <div class="form-group">
  <textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>
 </div>
 <div class="form-group" align="right">
  <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
 </div>
</div>
</div>


<script> 

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
} 
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
 }, 5000);

 setInterval(function(){
 update_last_activity();
 fetch_user();
 update_chat_history_data();
 fetch_group_chat_history1();
}, 5000);


 function fetch_user()
 {
  $.ajax({
   url:"fetch_user1.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
 var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });


 
});  

$(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    
   }
  })
 });

 $('#group_chat_dialog').dialog({
 autoOpen:false,
 width:400
});
 
 $('#group_chat').click(function(){
 $('#group_chat_dialog').dialog('open');
 $('#is_active_group_chat_window').val('yes');
 fetch_group_chat_history();
});


$('#send_group_chat').click(function(){
 var chat_message = $('#group_chat_message').val();
 var action = 'insert_data';
 if(chat_message != '')
 {
  $.ajax({
   url:"group_chat1.php",
   method:"POST",
   data:{chat_message:chat_message, action:action},
   success:function(data){
    $('#group_chat_message').val('');
    $('#group_chat_history').html(data);
   }
  })
 }
});

function fetch_group_chat_history1()
{
 var group_chat_dialog_active = $('#is_active_group_chat_window').val();
 var action = "fetch_data";
 if(group_chat_dialog_active == 'yes')
 {
  $.ajax({
   url:"group_chat1.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#group_chat_history').html(data);
   }
  })
 }
}

</script>



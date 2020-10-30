
<?php
	
	session_start();
	if(!isset($_SESSION["fid"])){
  	   header("Location:login.php");   
	}
	$ccode = '';
	if(isset($_GET['err'])){
		$ccode = $_GET['err'];
	}
	
	
	
    if(ccode==''){
    	header("Location:login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

    
	<style type="text/css">
		.hover_bkgr_fricc{
    background:purple;
    cursor:pointer;

    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    left:0;
    width:100%;
   
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup_fricc {
    cursor: pointer;
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 10px;
}
.button1{
	background-color: green; 
  	color: black;
}
a{
	color: white;
}
label{
	color : red;
}

	</style>
</head>
<body>
	<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        
        <h2><p>You have successfully created the classroom!!<br /><br /> <label>Your class code is : <?php echo $ccode ?> </label>  <br/><br />Please share this with students to join the class.
        	<br /> <br/>
        	<button class="button button1"><a href="facultyDashboard.php">OK!!</a></button> </p></h2>
    </div>
</div>
</body>
</html>
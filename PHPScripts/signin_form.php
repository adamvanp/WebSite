<?php
include("db_conn.php");
//include the file session.php
include("session.php");

//if the session for username has been set, automatically go to "signin_success.php"
if($session_user!="") {
	header('location: ./signin_success.php');
}

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('$errormessage');</script>";
 
	
}
?>


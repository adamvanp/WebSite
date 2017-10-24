<?php
include("db_conn.php");
include("session.php");
//update user access
if(isset($_POST['submit'])){
$user=$_POST['user'];
$access_temp=$_POST['accesslevel'];

	$error="";
	//check user is there
	if($user==""){
    	$error.="* No name"."<br/>";
    }
	
	if($error=="") //upate if all info valid
	{
		$query="UPDATE users SET Access = '$access_temp' WHERE Username='$user' "; 
		$result = $mysqli->query($query);
		echo "Updated Access Levels", $user,$access_temp;
		}
		else
		{
			echo "submission faild </br>", $error;
		}
}
?>



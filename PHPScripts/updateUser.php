

<?php
include("db_conn.php");
include("session.php");
//update user information
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$dob=$_POST['dob'];
	$error="";
	//check if name
    if($name==""){
    	$error.="* Please enter a name"."<br/>";
    }
    //check if dob
    if($dob==""){
    	$error.="* Please enter a name"."<br/>";
    }
    //check if email
    if($email==""){
        $error.="* Please type your email address"."<br/>";
	}elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){
		$error.="* Please type the correct format of email address"."<br/>";
    }

	if($error=="") //upate if all info valid
	{
		$encrypt_password=MD5($password);
		$query="UPDATE users SET Name = '$name', Email = '$email', DOB = '$dob' WHERE Username = '$session_user' "; 
		$result = $mysqli->query($query);
		echo "update submitted";
		}
		else
		{
			echo "submission faild </br>", $error;
		}
}
?>


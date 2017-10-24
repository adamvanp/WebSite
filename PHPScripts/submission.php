
<?php
include("db_conn.php");

//Sign upsubmission
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$name=$_POST['name'];
$email=$_POST['email'];
	$error="";
	
    if($username==""){
    	$error.="* Please enter a username"."<br/>";
    }
    if($password=="" || $password2==""){
    	$error.="* Please enter a password"."<br/>";
    }
     //check password length
    elseif(strlen($password)<8){
    	$error.="* The password must be 8 or more characters"."<br/>";
    }
    //check password match
	elseif($password != $password2){
	$error.="* Passwords do not match"."<br/>";
	}
    if($name==""){
    	$error.="* Please enter a name"."<br/>";
    }
    if($email==""){
        $error.="* Please type your email address"."<br/>";
	}elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){
		$error.="* Please type the correct format of email address"."<br/>";
    }

	if($error=="")
	{
		$encrypt_password=MD5($password);
		$query="INSERT INTO users (Username, Password, Name, Email, Access) 
		VALUES ('$name','$encrypt_password','$name','$email','2')";
		$result = $mysqli->query($query);
			
		echo "form submitted";
		}
		else
		{
			echo "submission faild </br>", $error;
		}
}
?>



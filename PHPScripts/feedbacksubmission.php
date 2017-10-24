<?php
include("db_conn.php");

//feedback submission
if(isset($_POST['submit'])){
$gender=$_POST['sex'];
$state=$_POST['state'];
$city=$_POST['city'];
$satisfaction=$_POST['satisfaction'];
	$error="";
	
	//error checking for inputs 
    if($state==""){
    	$error.="* Please enter a state"."<br/>";
    }
    if($city==""){
    	$error.="* Please enter a city"."<br/>";
    }
    if($gender==""){
    	$error.="* Please enter a gender"."<br/>";
    }
    if($satisfaction==""){
    	$error.="* Please enter a satisfaction rating"."<br/>";
    }

	if($error=="")
	{
		//insert into feedback table
		$query="INSERT INTO feedback (Gender, State, City, Satisfaction) 
		VALUES ('$gender','$state','$city','$satisfaction')";
		$result = $mysqli->query($query);
			
		echo "form submitted";
		}
		else
		{
			echo "submission faild </br>", $error;
		}
}
?>
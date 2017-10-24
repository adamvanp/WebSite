<?php
include("session.php");
include("db_conn.php");


$user=$_POST['username'];
$password=$_POST['password'];

//query to check whether username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE Username='$user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);


//if the username from table/database is not same as the username data from the form(from signin_form.php)
if($row['Username']!=$user || $user=="")
{
	//automatically go back to signin_form and pass the error message
	header('Location: ./signin_form.php?error=invalid_username');

	
}//if the username is same as the username data from the form(from signin_form.php) 
else {
	//if the password from table/database is same as the password data from the form(from signin_form.php)
	if($row['Password']==md5($password)) {
		//save the username in the session
		$session_user=$row['Username'];
		$_SESSION['session_user']=$session_user;
		 //create access variable for session use
		$user_access=$row['Access'];
		$_SESSION['user_access']=$user_access;
		
		//automatically go to signin_success.php
		header('Location: ./signin_success.php');
	
	}//if the password from table/database does not match with the password data from the signin form
	else{

		//automatically go back to signin_form and pass the error message
		header('Location: ./signin_form.php?error=invalid_password');

	}
}
?>

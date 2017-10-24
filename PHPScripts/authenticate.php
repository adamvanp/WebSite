<?php
include("session.php");
include("db_conn.php");



$password=$_POST['password'];
$error="";

//query to check whether username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE Username='$session_user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);


//if the username from table/database is not same as the username data from the form(from signin_form.php)
if($row['Username']!=$session_user || $session_user=="")
{
	//automatically go back to signin_form and pass the error message
	header('Location: ./signin_form.php?error=invalid_username');

	
}//if the username is same as the username data from the form(from signin_form.php) 
else {
	//if the password from table/database is same as the password data from the form(from signin_form.php)
	if($row['Password']==md5($password)) {
		$authenticated=1;
		//set authentication once they have authenticated
		$_SESSION['authenticated']=$authenticated;
		if($user_access == 1){
		echo '<br><a href="../PHPpages/MyArea.php">Go to My Area</a>.<br>';
		echo '<br><a href="../PHPpages/Admin.php">Admin Page</a>.';
		}
		if($user_access == 2){
		echo '<br><a href="../PHPpages/MyArea.php">Go to My Area</a>.<br>';
		
		}
		
	}//if the password from table/database does not match with the password data from the signin form
	else{
		//automatically go back to signin_form and pass the error message
		$error.="* Your password did not match"."<br/>";

	}
}
?>

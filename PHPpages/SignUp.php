<?php
	include("../PHPScripts/db_conn.php");
	include("../PHPScripts/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link href="Template.css" rel="stylesheet" type="text/css" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>Home</title>
</head>

<body>
	<h1>
		Rock and Roll History
	</h1>
		
	<h2>
		<a href="Home.php">Home Page</a>  
		<a href="Contact.php">Contact</a>     
		
		<?php //display links based on access level
		if($user_access==""){
		echo '<a href="SignUp.php">Sign Up</a>';
		}
		if($user_access=="1")
		{
		echo '<a href="FeedBack.php">Feed Back</a> ';
		echo '<a href="MyArea.php">My Area</a> ';
		echo '<a href="Admin.php">Admin</a> ';
		
		echo '
			  <form action="../PHPScripts/signout.php">
			  <input type="submit" value="signout" value="Signout"/></form>';
		}
		if($user_access=="2"){
		echo '<a href="FeedBack.php">Feed Back</a> ';
		 echo '<a href="MyArea.php">My Area</a> ';
		 echo '
			  <form action="../PHPScripts/signout.php">
			  <input type="submit" value="signout" value="Signout"/></form>';
		}
 		?>
	</h2>
	<form method="post" action="../PHPScripts/submission.php">
		Sign up here, complete the form.<br/>
		*Required</br>
		User Name:*</br>
		<input type="text" name="username"></input>
		</br>
		Password:*</br>
	 	<input type="text" name="password"</input> 
		<br></br>
		Re-Type Password:*</br>
	 	<input type="text" name="password2"></input> 
		</br>
		Name:</br>
	 	<input type="text" name="name"></input>
		</br>
		Email:</br>
	 	<input type="text" name="email" size="25"></input>
		</br>
		<input type="submit" value="Submit" name="submit"/>
		<input type="reset" value="Reset" onClick="this.form.reset()" />
	</form>
 
	<h5>
    	adamvp 207995 University Of Tasmania
    </h5>  	
</body>

</html>

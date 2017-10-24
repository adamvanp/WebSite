<?php
	include("../PHPScripts/db_conn.php");
	include("../PHPScripts/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link href="Template.css"rel="stylesheet" type="text/css" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Contact</title>
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
			  <input type="submit" value="signout" value="Signout"/>';
		}
		if($user_access=="2"){
		echo '<a href="FeedBack.php">Feed Back</a> ';
		 echo '<a href="MyArea.php">My Area</a> ';
		 echo '
			  <form action="../PHPScripts/signout.php">
			  <input type="submit" value="signout" value="Signout"/>';
		}
 		?>
 		
	
	</h2>
		<?php
		if($user_access==""){		
		echo'<form method="post" action="../PHPScripts/signin_engine.php" >
		User Name:
		<input type="text" name="username" id="username"></input>
		<br></br>
		Password:
	 	<input type="text" name="password" id="password"></input> 
		<br></br>
		<input type="submit" value="Submit" value="Sign in"/>
		<a href="SignUp.php">Sign Up</a>
		</form>';
		}
		?>

	
		
	<ul style="list-style-type:square">
		 State:<br/>
 		 <li>ACT: Phone (02) 4482 1173</li>
 		 <li>NSW: Phone (02) 4426 5483</li>
 		 <li>NT: Phone (08) 9532 9989</li>
 		 <li>QLD: Phone (07) 3584 4562</li>
 		 <li>SA: Phone (08) 9546 1158</li>
 		 <li>TAS: Phone (03) 6348 1565</li>
 		 <li>VIC: Phone (03) 6315 4685</li>
 		 <li>WA: Phone (08) 9568 4531</li>
 		 	
	</ul>		
		
	<h5>
    	adamvp 207995 University Of Tasmania
    </h5>

</body>

</html>

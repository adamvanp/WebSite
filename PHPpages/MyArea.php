<?php
	include("../PHPScripts/db_conn.php");
	include("../PHPScripts/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
	<link href="Template.css" rel="stylesheet" type="text/css" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>My Area</title>
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
	
	<?php if($authenticated != 1){
	echo '
	<form id ="Authenticate" method="post" action="../PHPScripts/authenticate.php">
		Authenticate<br/>
		User Name:
		<input type="text" value="';?> <?php echo $session_user;?><?php echo'" disabled></input>
		<br></br>
		Password:
	 	<input type="text" name="password" size="16"></input> 
		<br></br>
		<input type="submit" value="submit" value="submit"/>	
		</form>';
	}	
	?>
		
<?php
	if($authenticated == 1){
	$user=$session_user;
	//query for retreiving all the items from the guestbook table (order by the recent items)
	$list_query =  "SELECT * FROM users WHERE Username='$user'";
	//execute the query 'list_query'
	$result= $mysqli->query($list_query);
   
   	//covert the above result into array (associative array)
   	//keys of the array are the column name
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){
   	
   	//extract the values
   	$username=$row['Username'];
   	$name=$row['Name'];
   	$dob=$row['DOB'];
   	$email=$row['Email'];  	
  
  
  	//printing out with table :) 	
?>
<br/>
<?php
	echo'
	<form method="post" action="../PHPScripts/updateUser.php">
		User Name:
		<input type="text" name="user" value="';?><?php echo $session_user;?><?php echo'" disabled></input>
		<br></br>
		Name:
	 	<input type="text" name="name" value="';?><?php echo $name;?><?php echo'" ></input>
		<br></br>
		Dat of Birth:
	 	<input type="text" name="dob" value="';?><?php echo $dob;?><?php echo'" ></input>
	 	<br></br>
		Email:
	 	<input type="text" name="email" value="';?><?php echo $email;?><?php echo'" size="25"></input>
		
		<br></br>
		<input type="submit" value="Submit" name="submit"/></input>
		<input type="button" value="Reset" onClick="this.form.reset()" /></input>

		
		</form>
	
	';
?>
<?php
 } 
}
else{
	echo "You do not have access to this content";
}
?>
    	<h5>
    		adamvp 207995 University Of Tasmania
    	</h5>
</body>

</html>

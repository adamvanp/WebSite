<?php
	include("../PHPScripts/db_conn.php");
	include("../PHPScripts/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	<link href="Template.css" rel="stylesheet" type="text/css" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Admin</title>
</head>

<body>
	<h2>
	    <a href="Home.php">Home Page</a>     
		<a href="Contact.php">Contact</a>
		<?php //display links based on access level
		
		if($user_access=="1")
		{
		echo '<a href="FeedBack.php">Feed Back</a> ';
		echo '<a href="MyArea.php">My Area</a> ';
		echo '<a href="Admin.php">Admin</a> ';
		
		echo '
			  <form action="../PHPScripts/signout.php">
			  <input type="submit" value="signout" value="Signout"/></form>';
		}
 		?>
 		<?php //display users name if an admin
 		if($user_access=="1")
 		{
 		echo 'Welcome to Admin ', $session_user;
		}
		?>
	</h2>
	
	<?php //show authentication form if the user has not done it within the current session
	if($authenticated != "1"){
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
	
<form method="post" action="../PHPScripts/updateAccess.php">		
<?php
	if($authenticated=="1"){
	//query for retreiving all the items from the guestbook table (order by the recent items)
	$list_query = "SELECT * FROM users ORDER BY ID ASC";
	//execute the query 'list_query'
	$result= $mysqli->query($list_query);
   
   	//covert the above result into array (associative array)
   	//keys of the array are the column name
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){
   	
   	//extract the values
   	$id=$row['ID'];
   	$username=$row['Username'];
   	$name=$row['Name'];
   	$dob=$row['DOB'];
   	$email=$row['Email'];
   	$access=$row['Access'];
   	
  
  
  	//printing out with table :) 	
?>
<br/>

<table id="userslist" >
   <tr>
      <td class="title">ID</td>
      <td><?php echo $id;?></td>
      <td class="title" >Username</td>
      <input type="hidden" name="user" value="<?php echo $username;?>"></input>
      <td><?php echo $username;?></td>
   </tr>
   <tr>
      <td class="title">Name</td>
      <td><?php echo $name;?></td>
      <td class="title">Email</td>
      <td><?php echo $email;?></td>
   </tr>
   <tr>
      <td class="title">DOB</td>
      <td><?php echo $dob;?></td>
      <td class="title">Access Level</td>
      <td>
      <?php 
      if($access==1){echo'
      <select name="accesslevel" >
	  <option value="1">Admin</option>
	  <option value="2">General</option>
	  </select>
      ';
      }
      if($access==2){echo'
      <select name="accesslevel" >
	  <option value="2">General</option>
	  <option value="1">Admin</option>
	  </select>
      ';
      }
      ?>
      </td>
   </tr>
   </table>
    <input type="submit" value="Submit" name="submit"/></input>
	<input type="button" value="Reset" onClick="this.form.reset()" /></input>
<?php
 } 
}
else{
	//if for some reason someone is on admin page this will show 
	echo "You do not have access to this content";
}
?>
</form>
    	<h5>
    		adamvp 207995 University Of Tasmania
    	</h5>
</body>

</html>

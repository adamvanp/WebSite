<?php
	include("../PHPScripts/db_conn.php");
	include("../PHPScripts/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
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
		
	<?php //show page links based on user access
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
		
	
	
	<h3>
	Welcome to the Rock and Roll History Class for Semester 1! <br></br><br></br>
	For your weekly lectures and person in charge of content, you will have Mr. Steven Tyler.
	In you Practicals Mr. Dave Grohl will be teaching you and finally for your supporting staff
	that will be present in every other practical, Eric Clapton will be joining you in as of week 3.
	
	On this site there are 3 levels of access, any member is automatically set to level 2, they only have a feedback 
	and MyArea page to access as well as the standard, The Admins have a access level of 1 which allows them 
	to change things for general students. The other is just a gerneral access which you may only sign up, view contacts
	and see the home page.
	</h3>
	
    <script>
	$(document).ready(function(){
		$("#dave").click(function() {
    		$("#daveInfo").toggle();
    	});
    });
    </script>
    
    <h4>Meet Dave<br></br><img id="dave" src="../../Staff/Dave.jpg"/></h4>
	
	<div id="daveInfo" class="initiallyHidden">
	Dave Grohl, in this course he is in charge of all of your practicals. <br></br>
	Starting out in a 1986, Dave started out as a drummer for the band Scream, following that he started
	the band Nirvana with Kurt Cobain with Dave as a drummer. After Kurt's Death Dave started Foo Fighters
	by himself, recording a 15 track demo and playing all instruments himself. Dave is an all-round player 
	for instruments and is highly qualified to lead your practicals.
	
	<?php
	$list_query = "SELECT * FROM users";
	//execute the query 'list_query'
	$result= $mysqli->query($list_query);
   	//covert the above result into array (associative array)
   	//keys of the array are the column name
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){

   	//extract the values
   	$name=$row['Name'];
   	$dob=$row['DOB'];
   	$email=$row['Email'];

   	
		if($name=="Dave Grohl"){
		echo '
		<ul style="list-style-type:square">
 			<li>'," Name: ", $name , " DOB: ", $dob ," Email: ", $email ; echo '</li>	
		</ul>
	';}}?>
	</div>
	
	
	<script>
	$(document).ready(function(){
		$("#eric").click(function() {
    		$("#ericInfo").toggle();
    	});
    });
    </script>
    
     <h4>Meet Eric<br></br><img id="eric" src="../../Staff/Eric.jpg"/></h4>
	
	<div id="ericInfo" class="initiallyHidden">
	Eric Clapton will be joining us in week 3 due to other commitments, he will be join in the practicals
	to help with Dave and split you into two groups for a few weeks and then swap in week 7. <br></br>
	Starting in 1962 and still going today, He has been a part of many bands, most famously Cream, and then 
	continuing into a solo career and having great success.
	
	<?php
	$list_query = "SELECT * FROM users";
	//execute the query 'list_query'
	$result= $mysqli->query($list_query);
   	//covert the above result into array (associative array)
   	//keys of the array are the column name
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){

   	//extract the values
   	$name=$row['Name'];
   	$dob=$row['DOB'];
   	$email=$row['Email'];

   	
		if($name=="Eric Clapton"){
		echo '
		<ul style="list-style-type:square">
 			<li>'," Name: ", $name , " DOB: ", $dob ," Email: ", $email ; echo '</li>	
		</ul>
	';}}?>
	</div>
	
	<script>
	$(document).ready(function(){
		$("#steven").click(function() {
    		$("#stevenInfo").toggle();
    	});
    });
    </script>
    
    <h4>Meet Steven<br></br><img id="steven" src="../../Staff/Steven.jpg"/></h4>
	
	<div id="stevenInfo" class="initiallyHidden">
	Steven Tyler, in this course he is in charge of all of your content and is your lecturer. <br></br>
	Steven is the lead singer of the band Aerosmith, starting his career in 1970 and continuing today. Steven has
	a long history with rock and roll and has worked with some of the greatest rock and roll musicians over
	his life time.
	<?php
	$list_query = "SELECT * FROM users";
	//execute the query 'list_query'
	$result= $mysqli->query($list_query);
   	//covert the above result into array (associative array)
   	//keys of the array are the column name
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){

   	//extract the values
   	$name=$row['Name'];
   	$dob=$row['DOB'];
   	$email=$row['Email'];

   	
		if($name=="Steven Tyler"){
		echo '
		<ul style="list-style-type:square">
 			<li>'," Name: ", $name , " DOB: ", $dob ," Email: ", $email ; echo '</li>	
		</ul>
	';}}?>
	
	</div>
	
	<h4>
	<br/><br/>
	Upcoming Events	
	</h4>
	<p>
		- 25th April - LAZER TAG, Join us and your fellow classmates in a friendly game of laser tag. <br></br>
		Sign up before the 20th via emailing one of teachers.
	</p>
	
	<p>
		- 28th April - Assignment 1 Due at 3pm. Email about extensions or any problems.
	</p>
	
	<p>
		- 20th May - Assignment 2 Due at 3pm. Email about extensions or any problems.
	</p>
	<br></br>
	
	<h4> 
		Users with Admin access
	</h4>
	
<?php
	//query for retreiving all the items from the guestbook table (order by the recent items)
	$list_query = "SELECT * FROM users ORDER BY Name ASC";
	//execute the query 'list_query'
	$result= $mysqli->query($list_query);
   	//covert the above result into array (associative array)
   	//keys of the array are the column name
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){
   	//extract the values
   	$name=$row['Name'];
   	$access=$row['Access'];
  	//printing out with table	
?>

<?php
if($access==1){
echo '
<ul style="list-style-type:square">
 		 <li>'," Name: ", $name; echo '</li>	
	</ul>
	';?>
<?php
 } 
}
?>
 	<br></br>
 	
	<p id="date"></p>
	<h5>
    	adamvp 207995 University Of Tasmania
    </h5>

	<script>
		var curdate = new Date();
		document.getElementById("date").innerHTML = curdate.toUTCString();
		
	</script>
	

</body>

</html>

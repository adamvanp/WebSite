<?php
	include("../PHPScripts/db_conn.php");
	include("../PHPScripts/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<link href="Template.css" rel="stylesheet" type="text/css" />
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	//showing cities based on state selection
	<script type="text/javascript">
      function setup_state_change(){
         //check whether state section is changed.
         $('#state').change(update_cities);
      }
      
      function update_cities(){
         //assigns the selected state to state variable.
         var state = $('#state').val();
         
         //get_cities.php performs when the state is selected.
         //call the function(show_cities) when the data is returned from get_cities.php.
         $.get('../PHPScripts/get_cities.php?state='+state,show_cities);
      }
      
      function show_cities(cities){
         //returned data from get_cities.php is assigned to cities
	     //change the field(drop down list)
         $('#cities').php(cities);
      }
   
      $(document).ready(setup_state_change);
   
   </script>
   
<title>Feedback</title>
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
	//feedback submission form
	<form method="post" action="../PHPScripts/feedbacksubmission.php" >
		Gender<br></br>
		<input type="radio" name="sex" value="male" >Male</input><br></br>
  		<input type="radio" name="sex" value="female" >Female</input><br></br>
		<table>
         <tr>
            <th>State: </th>
            <td>
               <select name="state" id="state" >
                  <option value="" selected="selected">Please Select State</option>
                  <option value="tas">Tasmania</option>
                  <option value="vic">Victoria</option>
                  <option value="qld">Queensland</option>                  
                  <option value="nt">Northern Territory</option>
                  <option value="sa">South Australia</option>
                  <option value="nsw">South Australia</option>
                  <option value="wa">Western Australia</option>
                  <option value="act">Australian Capital Territory</option>
               </select>
            </td>
         </tr>
         <tr>
            <th>Cities: </th>
            <td id="cities">Please Select State First</td>
         </tr>
      </table>

		<br></br>
		How are you feeling about classes?<br></br>
		
		<input type="radio" name="satisfaction" value="satisfied" >Satisfied</input>
  		<input type="radio" name="satisfaction" value="not_satisfied" >Not satisfied</input><br></br>
		<input type="submit" value="Submit" name="submit"/>
		<input type="reset" value="Reset" onClick="this.form.reset()"/>

	</form>
	
	<h5>
    	adamvp 207995 University Of Tasmania
    </h5>

	
</body>

</html>

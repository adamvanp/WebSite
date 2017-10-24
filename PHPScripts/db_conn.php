<?php
//conncet to database 
$mysqli = new mysqli("localhost","adamvp","207995","adamvp");

if(mysqli_connect_errno($con))
{
	echo "failed to connect to MySQL " .mysqli_connect_error();
	exit();
}

?>


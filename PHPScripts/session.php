<?php

session_start();

if(!isset($_SESSION['session_user']))
{
	$_SESSION['session_user']="";
}

$session_user=$_SESSION['session_user'];

if(!isset($_SESSION['user_access']))
{
	$_SESSION['user_access']="";
}
$user_access=$_SESSION['user_access'];
 
if(!isset($_SESSION['authenticated']))
{
	$_SESSION['authenticated']="";
}
$authenticated=$_SESSION['authenticated'];
?>	
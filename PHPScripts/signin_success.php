<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

$res=mysqli_query($mysqli, "SELECT * FROM users WHERE Username LIKE '$session_user'"); 
if ($res) $rs = mysqli_fetch_array($res);
echo "Sign in successful, welcome ", $session_user;
echo '<br><a href="../PHPpages/MyArea.php">Go to My Area</a>.<br>';
echo '<a href="../PHPpages/Home.php">Go To home page</a>.';

//tell user what access level they have and show access sites
if($user_access=="2")
{
	echo "<br>Your Access level is 2, you have limited access to certain pages";
}
if($user_access=="1")
{
	echo "<br>Your Access level is 1, you have full access to every page";
	echo '<br><a href="../PHPpages/Admin.php">Admin Page</a>.';
}
//if the session for username has not been saved, automatically go back to signin_form.php
if ($session_user==""){
	header('Location: signin_form.php');
}
?>

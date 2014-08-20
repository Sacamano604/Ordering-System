<?php 
//Logout script which kills or destroys the session and redirects the user to the page of choice.
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: ../index.php");
?>

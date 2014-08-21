<?php
session_start();
	if (isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['privileges'])) { // check for authentication
		$loggedin = $_SESSION['email']; // if logged in, give the variable $loggedin the client or admin's email address
	} else {
		header("location:../error.php");
	}
//include('../dbconnect.php');//connect to database
?>
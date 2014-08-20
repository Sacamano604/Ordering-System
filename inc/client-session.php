<?php
session_start();
	if (isset($_SESSION['email']) && isset($_SESSION['password'])) { // check for authentication
		$loggedin = $_SESSION['email']; // if logged in, give the variable $loggedin the client or admin's email address
	}
// include('dbconnect.php');//connect to database
?>
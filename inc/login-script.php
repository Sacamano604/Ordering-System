<?php
// connect to database
include('../inc/dbconnect.php');

$email = $_GET['email']; 
$password = $_GET['password'];

$query = $mysqli->prepare('SELECT * FROM clients WHERE email = ? AND password = ?');
$query->bind_param('ss', $email, $password);
$query->execute();
$result = $query->get_result();

//Put results into a row
//$row = mysql_fetch_array($result);
$row = $result->fetch_array();
//Get value of privileges (OPTIONAL)
$privileges = $row['privileges'];

// Mysql_num_row is counting table row
$num_rows = $result->num_rows;

// If result matched $email and $passwd, table row must be 1 row
if($num_rows==1) {

if ($privileges == "Admin") {

// Register $userid, $passid and redirect to file
session_start();
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['privileges'] = $privileges;
//Return to this location if LOGIN is an ADMINISTRATOR
header("location:../admin/admin-home.php");
} else {
// Register $userid, $passid and redirect to file
session_start();
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
//Return to this location if LOGIN is a CUSTOMER
header("location:../products.php");
}
} else {
//Return to this location if LOGIN has failed
header("location:../login.php?invalid=true");
}

?>
<?php
// connect to database
$hostname = "localhost";
$user = "root";
$pass = "root";
$database = "bensberries";

mysql_connect("$hostname", "$user", "$pass") or die(mysql_error());
mysql_select_db("$database") or die(mysql_error());
print_r($database);
// email and password sent from signup form 
$email = $_GET['email']; 
$password = $_GET['password'];


//Query MySQL database and put data into variable
$result = mysql_query("SELECT * FROM clients WHERE email='$email' AND password='$password'");

//Put results into a row
$row = mysql_fetch_array($result);

//Get value of privileges (OPTIONAL)
$privileges = $row['privileges'];

// Mysql_num_row is counting table row
$num_rows = mysql_num_rows($result);

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
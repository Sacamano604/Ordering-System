<?php
//Set variabloes and locations for the connection.
$hostname = "localhost";
$user = "root";
$pass = "root";
$database = "bensberries";

//connection string and die if fails
mysql_connect("$hostname", "$user", "$pass") or die(mysql_error());
mysql_select_db("$database") or die(mysql_error());

?>
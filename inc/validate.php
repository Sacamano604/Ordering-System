<?php
$validate = "pass"; // Validation passes unless fails below

// Check for dupliate emails!!
if (!isset($_POST['add'])) {
	$query = $mysqli->prepare('SELECT email FROM clients WHERE email = ?');
	$query->bind_param('s', $email); 
	$query->execute();
	$result = $query->get_result();

while($row = $query -> fetch_assoc()){
	$taken = $row['email'];
}




	
	if ($email === $taken) {
		$validate = "fail";
	?>
 	 <h2>Email is already taken!</h2>
 	 <p><a href="#" onClick="history.back(); return false;">< Please try again</a></p>
	<?php } // End Check for duplicate emails ?>

	<?php
	} else if (empty($first)) { // if the VARIABLE is empty then...
		$validate ="fail";
	?>
	<h2>Your First Name is Empty!</h2>
	<p><a href="#" onclick="history.back(); return false;">< Please try again</a></p>
	<?php 
	} else if (empty($last)) { 
	$validate ="fail";
	?>
	<h2>Your Last Name is Empty!</h2>
	<p><a href="#" onclick="history.back(); return false;">< Please try again</a></p>
	<?php 
	} else if (empty($password)) { 
	$validate ="fail";
	?>
	<h2>Your Password is Empty!</h2>
	<p><a href="#" onclick="history.back(); return false;">< Please try again</a></p>
	<?php 
	} else if (empty($confirmpassword)) { 
	$validate ="fail";
	?>
	<h2>Your Password Confirmation is Empty!</h2>
	<p><a href="#" onclick="history.back(); return false;">< Please try again</a></p>
	<?php 
	} else if ($password != $confirmpassword) { // if the passwd does NOT EQUAL confirm
	$validate ="fail";
	?> 
	<h2>Your Password and Confirmation DO NOT match!</h2>
	<p><a href="#" onclick="history.back(); return false;">< Please try again</a></p>
	<?php
	} else if (!preg_match("/^[\ a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,6}$/i", $email)) { // checks if email is valid
	$validate ="fail";
	?>
	<h2>Your email address is not valid!</h2>
	<p><a href="#" onclick="history.back(); return false;">< Please try again</a></p>
<?php } ?>

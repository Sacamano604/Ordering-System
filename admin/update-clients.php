<?php include('../inc/dbconnect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Clients</title>
  <!-- Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head> 
<body>
<div class="container">
  <div class="page-header">
   <div class="btn-group" style="float: right;">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Admin Controls <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="add-clients.php">Add Clients</a></li>
        <li><a href="view-clients.php">View Clients</a></li>
        <li class="divider"></li>
        <li><a href="add-products.php">Add Products</a></li>
        <li><a href="view-products.php">View Products</a></li>
        <li class="divider"></li>
        <li><a href="add-transactions.php">Add Transactions</a></li>
        <li><a href="view-transactions.php">View Transactions</a></li>
        <li class="divider"></li>
        <li><a href="../inc/logout.php">Logout</a></li>
      </ul>
  </div>
 







<?php 
if (isset($_POST['update'])) { // if the POSTED VALUE of the name INVALID "is set" then...
$clientid = $_POST['clientid'];
$first = $_POST['first'];
$last = $_POST['last'];
$company = $_POST['company'];
$jobtitle = $_POST['jobtitle'];
$street = $_POST['street'];
$city = $_POST['city'];
$province = $_POST['province'];
$country = $_POST['country'];
$postal = $_POST['postal'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$mobile = $_POST['mobile'];
$website = $_POST['website'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$privileges = $_POST['privileges'];

include('../inc/validate.php');
if ($validate == "pass") {
// UPDATE client based on the clientid
$sql = "UPDATE clients SET first='$first', last='$last', company='$company', jobtitle='$jobtitle', street='$street', city='$city', province='$province', country='$country', postal='$postal', phone='$phone', fax='$fax', mobile='$mobile', website='$website', email='$email', password=PASSWORD('$password'), confirmpassword=PASSWORD('$confirmpassword'), privileges='$privileges' WHERE clientid='$clientid'";
$result = mysql_query($sql);
?>

<h3>Thank you. Client: <?php echo $first; ?> <?php echo $last; ?> has been edited.</h3>
<table class="table">
  <tr>
    <td><strong>First Name: </strong></td>
    <td><?php echo $first; ?></td>
    <td><strong>Last Name:</strong></td>
    <td><?php echo $last; ?></td>
  </tr>
  <tr>
    <td><strong>Company:</strong></td>
    <td><?php echo $company; ?></td>
    <td><strong>Job Title</strong></td>
    <td><?php echo $jobtitle; ?></td>
  </tr>
  <tr>
    <td><strong>Street:</strong></td>
    <td><?php echo $street; ?></td>
    <td><strong>City:</strong></td>
    <td><?php echo $city; ?></td>
  </tr>
  <tr>
    <td><strong>Province:</strong></td>
    <td><?php echo $province; ?></td>
    <td><strong>Country:</strong><strong></strong></td>
    <td><?php echo $country; ?></td>
  </tr>
  <tr>
    <td><strong>Postal:</strong></td>
    <td><?php echo $postal; ?></td>
    <td><strong>Phone:</strong></td>
    <td><?php echo $phone; ?></td>
  </tr>
  <tr>
    <td><strong>Mobile:</strong></td>
    <td><?php echo $mobile; ?></td>
    <td><strong>Fax:</strong></td>
    <td><?php echo $fax; ?></td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td> http://<?php echo $website ?></td>
    <td><strong>Email:</strong><strong></strong></td>
    <td><?php echo $email; ?></td>
  </tr>
  <tr>
    <td><strong>Privileges:</strong></td>
    <td><?php echo $privileges; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Password:</strong></td>
    <td><?php echo $password; ?></td>
    <td><strong>Confirm Password:</strong></td>
    <td><?php echo $confirmpassword; ?></td>
  </tr>
</table>
<?php } ?>
<?php } else { ?>
<?php
if (isset($_GET['clientid'])) { // if the POSTED VALUE of the name CLIENTID "is set" then...
  $clientid = $_GET['clientid']; // put value into variable
}
//Query DATABASE
$result = mysql_query("SELECT * FROM clients WHERE clientid = $clientid");
//Fetch Array from DATABASE
$row = mysql_fetch_array($result);
$clientid = $row["clientid"];
$first = $row["first"];
$last = $row["last"];
$company = $row["company"];
$jobtitle = $row["jobtitle"];
$street = $row["street"];
$city = $row["city"];
$province = $row["province"];
$country = $row["country"];
$postal = $row["postal"];
$phone = $row["phone"];
$mobile = $row["mobile"];
$fax = $row["fax"];
$website = $row["website"];
$email = $row["email"];
$password = $row["password"];
$confirmpassword = $row["confirmpassword"];
$privileges = $row["privileges"];

if ($privileges == "Admin") {
$privileges_other = "Customer";
} else {
$privileges_other = "Admin";
}
?>
<div id="page-header">
  <h3>Edit client: <?php echo $first; ?> <?php echo $last; ?></h3>
  <p>Feel free to edit any existing client, just make sure to hit save when done.</p>
</div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input name="clientid" type="hidden" value="<?php echo $clientid; ?>" />
<table class="table">
    <tr>
      <td><strong>First Name: </strong></td>
      <td><input name="first" class="form-control" type="text" value="<?php echo $first; ?>" maxlength="128" /> * </td>
      <td><strong>Last Name:</strong></td>
      <td><input name="last" class="form-control" type="text" value="<?php echo $last; ?>" maxlength="128" /> * </td>
    </tr>
    <tr>
      <td><strong>Company:</strong></td>
      <td><input name="company" class="form-control" type="text" value="<?php echo $company; ?>" maxlength="128" /></td>
      <td><strong>Job Title</strong></td>
      <td><input name="jobtitle" class="form-control" type="text" value="<?php echo $jobtitle; ?>" maxlength="128" /></td>
    </tr>
    <tr>
      <td><strong>Street:</strong></td>
      <td><input name="street" class="form-control" type="text" value="<?php echo $street; ?>" maxlength="128" /></td>
      <td><strong>City:</strong></td>
      <td><input name="city" class="form-control" type="text" value="<?php echo $city; ?>" maxlength="128" /></td>
    </tr>
    <tr>
      <td><strong>Province:</strong></td>
      <td><input name="province" class="form-control" type="text" value="<?php echo $province; ?>" maxlength="128" /></td>
      <td><strong>Country:</strong><strong></strong></td>
      <td><input name="country" class="form-control" type="text" value="<?php echo $country; ?>" maxlength="128" /></td>
    </tr>
    <tr>
      <td><strong>Postal:</strong></td>
      <td><input name="postal" class="form-control" type="text" value="<?php echo $postal; ?>" maxlength="128" /></td>
      <td><strong>Phone:</strong></td>
      <td><input name="phone" class="form-control" type="text" value="<?php echo $phone; ?>" maxlength="128" /></td>
    </tr>
    <tr>
      <td><strong>Mobile:</strong></td>
      <td><input name="mobile" class="form-control" type="text" value="<?php echo $mobile; ?>" maxlength="128" /></td>
      <td><strong>Fax:</strong></td>
      <td><input name="fax" class="form-control" type="text" value="<?php echo $fax; ?>" maxlength="128" /></td>
    </tr>
    <tr>
      <td><strong>Website:</strong></td>
      <td><input name="website" class="form-control" type="text" value="<?php echo $website; ?>" maxlength="128" /></td>
      <td><strong>Email:</strong><strong></strong></td>
      <td><input name="email" class="form-control" type="text" value="<?php echo $email; ?>" maxlength="128" /> * </td>
    </tr>
    <tr>
      <td><strong>Privileges:</strong></td>
      <td><select name="privileges" class="form-control" id="privileges">
              <option value="<?php echo $privileges; ?>" selected="selected"><?php echo $privileges; ?></option>
              <option value="<?php echo $privileges_other; ?>"><?php echo $privileges_other; ?></option>
          </select></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><strong>Password:</strong></td>
      <td><input name="password" class="form-control" id="password" value="<?php echo $confirmpassword; ?>" maxlength="128" /> * </td>
      <td><strong>Confirm Password:</strong></td>
      <td><input name="confirmpassword" class="form-control" id="confirmpassword" value="<?php echo $confirmpassword; ?>" maxlength="128" /> * </td>
    </tr>
  </table>
  <button type="submit" class="btn btn-success" name="update" id="update" value="update">Update</button>
  <button type="reset" class="btn btn-danger" name="Reset" value="Reset">Reset</button>   
</form>
<?php } ?>



























</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plug</a>ins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

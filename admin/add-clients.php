<?php include('../inc/dbconnect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add a Client</title>
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
  <h3>Add a Client</h3> 
  </div>
<p>Input users information to add a client manually. Be sure to set proper permissions...</p>
<?php 
if (isset($_POST['add'])) { // if the POSTED VALUE of the name ADD "is set" then...

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

$sql = "INSERT INTO clients (first, last, company, jobtitle, street, city, province, country, postal, phone, fax, mobile, website, email, password, confirmpassword, privileges) VALUES ('$first', '$last', '$company', '$jobtitle', '$street','$city','$province','$country','$postal','$phone','$fax', '$mobile', '$website', '$email', PASSWORD('$password'), PASSWORD('$confirmpassword'), '$privileges')";
$result = mysql_query($sql);

?>
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline">
<table class="table">
  <tr>
    <td><strong>First Name: </strong></td>
    <td><input name="first" type="text" class="form-control" value="" maxlength="128" /> * </td>
    <td><strong>Last Name:</strong></td>
    <td><input name="last" type="text" class="form-control" value="" maxlength="128" /> * </td>
  </tr>
  <tr>
    <td><strong>Company:</strong></td>
    <td><input name="company" type="text" class="form-control" value="" maxlength="128" /></td>
    <td><strong>Job Title</strong></td>
    <td><input name="jobtitle" type="text" class="form-control" value="" maxlength="128" /></td>
  </tr>
  <tr>
    <td><strong>Street:</strong></td>
    <td><input name="street" type="text" class="form-control" value="" maxlength="128" /></td>
    <td><strong>City:</strong></td>
    <td><input name="city" type="text" class="form-control" value="" maxlength="128" /></td>
  </tr>
  <tr>
    <td><strong>Province:</strong></td>
    <td><input name="province" type="text" class="form-control" value="" maxlength="128" /></td>
    <td><strong>Country:</strong><strong></strong></td>
    <td><input name="country" type="text" class="form-control" value="" maxlength="128" /></td>
  </tr>
  <tr>
    <td><strong>Postal:</strong></td>
    <td><input name="postal" type="text" class="form-control" value="" maxlength="128" /></td>
    <td><strong>Phone:</strong></td>
    <td><input name="phone" type="text" class="form-control" value="" maxlength="128" /></td>
  </tr>
  <tr>
    <td><strong>Mobile:</strong></td>
    <td><input name="mobile" type="text" class="form-control" value="" maxlength="128" /></td>
    <td><strong>Fax:</strong></td>
    <td><input name="fax" type="text" class="form-control" value="" maxlength="128" /></td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td><input name="website" type="text" class="form-control" value="" maxlength="128" /></td>
    <td><strong>Email:</strong><strong></strong></td>
    <td><input name="email" type="text" class="form-control" value="" maxlength="128" /> * </td>
  </tr>
  <tr>
    <td><strong>Privileges:</strong></td>
    <td><select name="privileges" id="privileges" class="form-control">
          <option value="Customer" selected="selected">Customer</option>
          <option value="Admin">Admin</option>
        </select></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><strong>Password:</strong></td>
    <td><input name="password" type="password" class="form-control" id="password" value="" maxlength="128" /> * </td>
    <td><strong>Confirm Password:</strong></td>
    <td><input name="confirmpassword" type="password" class="form-control" id="confirmpassword" value="" maxlength="128" /> * </td>
  </tr>
</table>
  <button type="submit" class="btn btn-success" name="add" id="add" value="add">Add</button>
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

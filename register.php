<?php 
  include('inc/dbconnect.php');
  include('inc/client-session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Berry Emporium - Register</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
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
    <div id="clientMenu" style="float: right;">
      <?php include('inc/client-menu.php'); ?>
    </div>
    <h2 style="color: #BD0000;">The Berry Emporium</h2>
  </div>
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

    include('inc/validate.php');

    if ($validate == "pass"){
      $query = $mysqli->prepare('INSERT INTO clients (first, last, company, jobtitle, street, city, province, country, postal, phone, fax, mobile, website, email, password, confirmpassword, privileges) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
      $query->bind_param('sssssssssssssssss', $_POST['first'], $_POST['last'], $_POST['company'], $_POST['jobtitle'], $_POST['street'], $_POST['city'], $_POST['province'], $_POST['country'], $_POST['postal'],  $_POST['phone'], $_POST['fax'], $_POST['mobile'], $_POST['website'], $_POST['email'], $_POST['password'], $_POST['confirmpassword'], $_POST['privileges']);
      $query->execute();
      $mysqli->close();
?>
  <h3>Thank you for Registering <?php echo $first; ?> <?php echo $last; ?></h3>
  <p>Feel free to <a href="products.php">start shopping</a></p>
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
    <td><strong>Password:</strong></td>
    <td><?php echo $password; ?></td>
    <td><strong>Confirm Password:</strong></td>
    <td><?php echo $confirmpassword; ?></td>
  </tr>
</table>
<?php } ?>
<?php } else { ?>
<h3>Register</h3>
<p>Please fill in all the information below to register your account with The Berry Emporium. <br /><em>* = Mandatory</em></p>
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
    <td><strong>Password:</strong></td>
    <td><input name="password" type="password" class="form-control" id="password" value="" maxlength="128" /> * </td>
    <td><strong>Confirm Password:</strong></td>
    <td><input name="confirmpassword" type="password" class="form-control" id="confirmpassword" value="" maxlength="128" /> * </td>
  </tr>
  <tr>
    <td><input name="privileges" type="hidden" value="Customer" /></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
  <button type="submit" class="btn btn-success" name="add" id="add" value="add">Register</button>
  <button type="reset" class="btn btn-danger" name="Reset" value="Reset">Reset</button>            
</form>
<?php } ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plug</a>ins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>

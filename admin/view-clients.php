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
  <h3>View Clients</h3> 
  </div>
<p>View List of Clients. Edit or delete as needed...</p>
<?php 
if (!isset($_GET['column']) && !isset($_GET['sort'])) {
    $column = "clientid";
    $sort = "ASC";
} else {
    $column = $_GET['column'];
    $sort = $_GET['sort'];
if ($sort == "ASC") {
    $sort = "DESC";
} else {
    $sort = "ASC";
  }
} ?>
<thead>
  <table class="table table-hover">
    <tr style="border-top: none;">
      <th><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=clientid&amp;sort=<?php echo $sort; ?>">ID</a></strong></th>
      <th><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=first&amp;sort=<?php echo $sort; ?>">First Name</a></strong></th>
      <th><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=last&amp;sort=<?php echo $sort; ?>">Last Name</a></strong></th>
      <th><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=email&amp;sort=<?php echo $sort; ?>">Email</a></strong></th>
      <th><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=privileges&amp;sort=<?php echo $sort; ?>">Privilege</a></strong></th>
      <th><strong>Modify</strong></td>
    </tr>
</thead>    
    <?php
  if (isset($_GET['delete'])) { // if the POSTED VALUE of the name DELETE "is set" then...
  $delete = $_GET['delete'];
  mysql_query("DELETE FROM clients WHERE clientid='$delete'");
  echo "<h3>Thank-you, Client ID# $delete has been deleted</h3>";
  }

//Query DATABASE
$result = mysql_query("SELECT * FROM clients ORDER BY $column $sort");
//Fetch Array from DATABASE
while ($row = mysql_fetch_array($result)) //While there is still data in the array, keep going...
{
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
?>
    <tr>
      <td><?php echo $clientid; ?></td>
      <td><?php echo $first; ?></td>
      <td><?php echo $last; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $privileges; ?></td>
      <td><a href="update-clients.php?clientid=<?php echo $clientid; ?>">Edit</a> | <a href="view-clients.php?delete=<?php echo $clientid; ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plug</a>ins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

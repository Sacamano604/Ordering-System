<?php include('../inc/dbconnect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Products</title>
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
  <h3>View Products</h3> 
</div>
<p>View the list of your products, edit or delete as needed...</p>
 <?php 
if (!isset($_GET['column']) && !isset($_GET['sort'])) {
    $column = "productid";
    $sort = "ASC";
} else {
  $column = $_GET['column'];
  $sort = $_GET['sort'];
  if ($sort == "ASC") {
    $sort = "DESC";
  } else {
    $sort = "ASC";
  }
}
?>
<thead>
  <table class="table table-hover">
      <tr style="border-top: none;">
        <th width="90px"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=productid&sort=<?php echo $sort; ?>"><strong>Product ID</strong></a></th>
        <th><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=category&sort=<?php echo $sort; ?>"><strong>Category</strong></a></th>
        <th><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=title&sort=<?php echo $sort; ?>"><strong>Title</strong></a></th>
        <th><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=description&sort=<?php echo $sort; ?>"><strong>Description</strong></a></th>
        <th><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=price&sort=<?php echo $sort; ?>"><strong>Price</strong></a></th>
        <th><a href="<?php echo $_SERVER['PHP_SELF']; ?>?column=photo&sort=<?php echo $photo; ?>"><strong>Photo</strong></a></th>
        <th width="120px"><strong>Admin Options</strong></th>
      </tr>
</thead>
    <?php
  if (isset($_GET['delete'])) { // if the POSTED VALUE of the name DELETE "is set" then...
  $delete = $_GET['delete'];
  mysql_query("DELETE FROM products WHERE productid='$delete'");
  echo "<h3>Thank-you, Product ID# $delete has been deleted</h3>";
  }


if (isset($_GET['cat'])) { 
  $cat = $_GET['cat'];
  $result = mysql_query("SELECT * FROM products WHERE category = '$cat' ORDER BY $column $sort");//Query DATABASE
} else { 
  $result = mysql_query("SELECT * FROM products ORDER BY $column $sort");//Query DATABASE
}
//Fetch Array from DATABASE
while ($row = mysql_fetch_array($result)) //While there is still data in the array, keep going...
{
  $productid = $row["productid"];
  $category = $row["category"];
  $title = $row["title"];
  $description = $row["description"];
  $price = $row["price"];
  $photo = $row["photo"];
  $dateAdded = $row["dateAdded"];
  $dateModified = $row["dateModified"];
?>
    <tr>
      <td><?php echo $productid; ?></td>
      <td><?php echo $category; ?></td>
      <td><?php echo $title; ?></td>
      <td><?php echo $description; ?></td>
      <td><?php echo $price; ?></td>
      <td><img src="../products/small/<?php echo $photo; ?>" title="<?php echo $title; ?>" /></td>
      <td><a href="update-products.php?productid=<?php echo $productid; ?>">Edit</a> | <a href="view-products.php?delete=<?php echo $productid; ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plug</a>ins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php include('../inc/dbconnect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update a Product</title>
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
  <h3>Update a Product</h3> 
  <p>Update the chosen product details...</p>
</div>
  <!-- BEGIN UPLOAD PHP SCRIPT -->
  <?php 
  if (isset($_POST['update'])) { // if the POSTED VALUE of the name INVALID "is set" then...

  if (isset($_FILES['uploadme'])) {

  include('../inc/resize.php');

  // On submit, the file is actually uploaded to a "temporary" location on your server
  // This PHP function moves the file from the "temporary" location to your desired location on the server
  if (!file_exists($uploadPath)) { 
  echo "<h3>Sorry, there was a problem uploading your file OR it doesn't exist.</h3>";
  echo "<p>Check if folder <strong>$uploadFolder</strong> is CHMOD 777</p>";
  echo "<p><a href=\"#\" onclick=\"history.back(); return false;\">< Please try again</a></p>";
  exit;
  }
  $photo = $uploadFile;
  }
?>
<?php
  $productid = $_POST['productid'];
  $category = $_POST['category'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $dateAdded = $_POST['dateAdded'];
  $dateModified = $_POST['dateModified'];
    if (isset($_POST['photo'])) {
    $photo = $_POST['photo'];
  }
$validate = 'pass';
if ($validate == "pass") {
// UPDATE client based on the clientid
$sql = "UPDATE products SET title='$title', description='$description', price='$price', photo='$photo' WHERE productid='$productid'";
$result = mysql_query($sql);
?>
  <table class="table">
  <h4>Thank you! Product Updated...</h4>
  <tr>
    <td width="10%"><strong>Title: </strong></td>
    <td width="30%"><?php echo $title; ?></td>
    <td width="10%"><strong>Description:</strong></td>
    <td width="50%"><?php echo $description; ?></td>
  </tr>
  <tr>
    <td><strong>Price:</strong></td>
    <td><?php echo $price; ?></td>
    <td><strong>Photo</strong></td>
    <td><?php echo $photo; ?></td>
  </tr>
  <tr>
    <td><strong>Category:</strong></td>
    <td><?php echo $category; ?></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><strong>Date Added:</strong></td>
    <td><?php echo $dateAdded; ?></td>
    <td><strong>Date  Modified:</strong></td>
    <td><?php echo $dateModified; ?></td>
  </tr>
</table>
<?php } ?>
<?php } else { ?>
<?php
if (isset($_GET['productid'])) { // if the POSTED VALUE of the name CLIENTID "is set" then...
  $productid = $_GET['productid']; // put value into variable
}
if (isset($_GET['delete'])) {
  $delete = $_GET['delete'];
  chdir("../products");
  unlink("small/".$delete);
  unlink("large/".$delete);
  chdir("../admin-cms");
  // UPDATE client based on the productid
  $sql = "UPDATE products SET photo='' WHERE productid='$productid'";
  $result = mysql_query($sql);
  
  echo "<h3>Thank-you, the photo $delete has been deleted</h3>";
}
  //Query DATABASE
  $result = mysql_query("SELECT * FROM products WHERE productid = $productid");
  //Fetch Array from DATABASE
  $row = mysql_fetch_array($result);

  $productid = $row["productid"];
  $title = $row["title"];
  $category = $row['category'];
  $description = $row["description"];
  $price = $row["price"];
  $photo = $row["photo"];
  $dateAdded = $row["dateAdded"];
  $dateModified = $row["dateModified"];
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="form-inline">
<input name="productid" type="hidden" value="<?php echo $productid; ?>" />
<table class="table">
    <h4>Update Product ID: <?php echo $productid ?>, <?php echo $title ?> within database.</h4>
    <tr>
      <td><strong>Title: </strong></td>
      <td><input name="title" class="form-control" type="text" value="<?php echo $title; ?>" size="18" maxlength="128" /> * </td>
      <td><strong>Description:</strong></td>
      <td><textarea name="description" class="form-control" cols="30" rows="5"><?php echo $description; ?></textarea> * </td>
    </tr>
    <tr>
      <td><strong>Price:</strong></td>
      <td><input name="price" class="form-control" type="text" value="<?php echo $price; ?>" size="18" maxlength="128" />      </td>
      <?php if (!empty($photo)) { ?>
        <td><strong>Photo:</strong><input name="photo" class="form-control" type="hidden" value="<?php echo $photo; ?>" /></td>
        <td><?php echo $photo; ?><a href="update-products.php?delete=<?php echo $photo; ?>&&productid=<?php echo $productid; ?>" onclick="return confirm('Are you sure you want to delete this photo?')"> Delete</a></td>
    </tr>
     <?php } else { ?>
    <tr>
        <td><strong>New Photo:</strong></td>
        <td ><input name="uploadme" class="form-control" type="file" size="50" maxlength="255" /></td>
    </tr>
      <?php } ?>
    <tr>
      <td><strong>Category:</strong></td>
      <td><select name="category" class="form-control" id="category">
      <option value="-" selected="selected">Please choose one...</option>
          <option value="red">Red Berry</option>
          <option value="white">White Berry</option>
          <option value="blue">Blue Berry</option>
          <option value="misc">Miscellaneous Berry</option>
    </select></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><strong>Date Added:</strong></td>
      <td><input name="dateAdded" class="form-control" type="text" value="<?php echo $dateAdded; ?>" size="18" maxlength="128" />      </td>
      <td><strong>Date Modified:</strong></td>
      <td><input name="dateModified" class="form-control" type="text" value="<?php echo $dateModified; ?>" size="18" maxlength="128" />      </td>
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

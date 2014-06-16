<?php include('../inc/dbconnect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add a Product</title>
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
  <h3>Add a Product</h3> 
</div>
<p>When adding a product make sure to fill out the information correctly as it will reflect on the website word for word. Proper category is also important</p>


<?php 
if (isset($_POST['add'])) { // if the POSTED VALUE of the name ADD "is set" then...
  include('../inc/resize.php');
// Make sure you have a writeable folder called products and make it writeable (CHMOD 777)
  $uploadFolder = "../products/";  
// "uploadme" is the reference value of the form field. 
// "name" is the original path of the file.
  $uploadFile = basename($_FILES['uploadme']['name']); 
// Make a complete path to your folder on the server
  $uploadPath = $uploadFolder . $uploadFile; 
// Validate Parameters
  include('../inc/validate-upload.php');  
//If everything is verified we try to upload it 
  move_uploaded_file($_FILES['uploadme']['tmp_name'], $uploadPath);
// On submit, the file is actually uploaded to a "temporary" location on your server
// This PHP function moves the file from the "temporary" location to your desired location on the server
  if (!file_exists($uploadPath)) { 
  echo "<h3>Sorry, there was a problem uploading your file OR it doesn't exist.</h3>";
  echo "<p>Check if folder <strong>$uploadFolder</strong> is CHMOD 777</p>";
  echo "<p><a href=\"#\" onclick=\"history.back(); return false;\">< Please try again</a></p>";
  exit;
} 
?>
<?php 
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $photo = $uploadFile;
  $dateAdded = $_POST['dateAdded'];
  $dateModified = $_POST['dateModified'];
  $category = $_POST['category'];

  $sql = "INSERT INTO products (title, description, price, photo, dateAdded, dateModified, category) VALUES ('$title', '$description', '$price', '$photo', '$dateAdded','$dateModified', '$category')";
  $result = mysql_query($sql);
?>
<h3>Thank you! Product added...</h3>
<table class="table">
  <tr>
    <td><strong>Title: </strong></td>
    <td><?php echo $title; ?></td>
    <td><strong>Description:</strong></td>
    <td><?php echo $description; ?></td>
  </tr>
  <tr>
    <td><strong>Price</strong></td>
    <td><?php echo $price; ?></td>
    <td><strong>Photo</strong></td>
    <td><?php echo $photo; ?></td>
  </tr>
  <tr>
    <td><strong>Date Added:</strong></td>
    <td><?php echo $dateAdded; ?></td>
    <td><strong>Date Modified:</strong></td>
    <td><?php echo $dateModified; ?></td>
  </tr>
   <tr>
    <td><strong>Category</strong></td>
    <td><?php echo $category; ?></td>
    <td></td>
    <td></td>
  </tr>
 </table>
<?php } else { 
$dateAdded = date('Y-m-d');
$dateModified = date('Y-m-d');
?>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline">
  <table class="table">
    <tr>
      <td><strong>Titile: *</strong></td>
      <td><input name="title" type="text" value="" maxlength="128" class="form-control"/> * </td>
      <td><strong>Description: * </strong></td>
      <td><textarea name="description" cols="50" rows="5"  class="form-control"></textarea> * </td>
    </tr>
    <tr>
      <td><strong>Price: * </strong></td>
      <td><input name="price" type="text" value="" maxlength="128" class="form-control"/></td>
      <td><strong>Photo</strong></td>
      <td><input name="uploadme" type="file" value="" maxlength="10" class="form-control"/></td>
    </tr>
    <tr>
      <td><strong>Category: * </strong></td>
      <td><select name="category" id="category" class="form-control">
          <option value="-" selected="selected">Please choose one...</option>
          <option value="red">Red Berry</option>
          <option value="white">White Better</option>
          <option value="blue">Blue Berry</option>
          <option value="misc">Miscellaneous Berry</option>
    </select>
      </td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><strong>Date Added:</strong></td>
      <td><input name="dateAdded" type="text" value="<?php echo $dateAdded; ?>" maxlength="128" class="form-control"/></td>
      <td><strong>Date Modified:</strong></td>
      <td><input name="dateModified" type="text" value="<?php echo $dateAdded; ?>" maxlength="128"  class="form-control"/></td>
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

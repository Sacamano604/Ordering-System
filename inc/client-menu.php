<?php if (!empty($loggedin)) { ?>
<p><a href="register.php">Register</a> | <a href="products.php">Products</a> | <a href="inc/logout.php">Logout</a> | Logged in as <strong><?php echo $loggedin; ?></strong></p>
<?php } else { ?>
  <p><a href="register.php">Register</a> | <a href="index.php">Login</a> | <br /><em>* You must be logged in to place orders.</em></p>
<?php } ?>
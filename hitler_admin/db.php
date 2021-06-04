<?php
// IMPORTANT
//When You Change Database name at a time ajax/id.php change the same DB Name
// Create connection
//$conn = new mysqli('localhost', 'root','','bcp_capital');
$conn = new mysqli("mysql.hostinger.in","u931565432_bcp_capital","123456789_Bcp","u931565432_bcp_capital");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
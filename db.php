

<?php
$servername = "mysql.eecs.ku.edu";
$username = "s352j477";
$password = "aiCeiph7";

// Create connection
$conn = new mysql_connect($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Close connection
mysql_close($link);

?> 

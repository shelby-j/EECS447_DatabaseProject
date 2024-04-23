

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', $dbName, 'aiCeiph7') or die('Could not connect: ' . mysqli_error());
echo 'Connected successfully';
mysqli_select_db($conn, $dbName) or die('Could not select database');

// Close connection
mysqli_close($conn);

?> 

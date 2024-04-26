<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
$dbName = '447s24_e016l962';

//mysqli_select_db($dbName) or die('Could not select database');
$conn = mysqli_connect('mysql.eecs.ku.edu', $dbName, 'VuVitah4')
or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';

mysql_select_db($dbName) or die('Could not select database');

mysqli_close($conn);
?> 

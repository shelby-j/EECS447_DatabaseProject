


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', '447s24_s352j477', 'aiCeiph7', '447s24_s352j477') or die('Could not connect: ' . mysqli_error());
echo 'Connected successfully';


$username = $_POST['username'];
$password = $_POST['password'];

echo $username;
echo $password;
$sql = "SELECT ENAME FROM EMPLOYEE WHERE ENAME='$username' and PASS='$password';";
echo $sql;
$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($result1);


mysqli_close($conn);


if ($result2 != NULL){
	header('Location: Homepage.php');
	session_start();
	$_SESSION["user"] = $username;
}
else{
	header('Location: login.php');
}


?>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', '447s24_s352j477', 'aiCeiph7', '447s24_s352j477') or die('Could not connect: ' . mysqli_error());



$accid = $_POST['accountid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$loc = $_POST['homelocation'];

$sql = "SELECT * FROM ACCOUNT WHERE ACCOUNTID =\"$accid\";";

$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($result1);


if ($result2 != NULL){
    echo("There already exists an emplyee with that ID");
}
else{
    $sqldel = "INSERT INTO ACCOUNT (ACCOUNTID, FNAME, LNAME, HOMELOCATION) VALUES($accid, \"$fname\", \"$lname\", \"$loc\");";
    $r1 = mysqli_query($conn, $sqldel);
    
}
mysqli_close($conn);

header('Location: accounts.html');

?>
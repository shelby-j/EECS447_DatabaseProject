<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', '447s24_s352j477', 'aiCeiph7', '447s24_s352j477') or die('Could not connect: ' . mysqli_error());


$barcode = $_POST['barcode'];
$accid = $_POST['accid'];


$sql = "SELECT * FROM CHECKEDOUT WHERE BARCODE=\"$barcode\" and ACCOUNTID =\"$accid\";";

$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($result1);



if ($result2 != NULL){
    echo("Book is already checked out");
}
else{
    $sqldel = "INSERT INTO CHECKEDOUT (BARCODE, ACCOUNTID) VALUES(\"$barcode\", \"$accid\");";
    $r1 = mysqli_query($conn, $sqldel);
    $sqladd  = "UPDATE BOOK SET ATLOC = NULL WHERE BARCODE = \"$barcode\";";
    $r2= mysqli_query($conn, $sqladd);
    
}
mysqli_close($conn);

?>
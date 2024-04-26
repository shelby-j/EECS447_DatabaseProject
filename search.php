

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', $dbName, 'aiCeiph7') or die('Could not connect: ' . mysqli_error());
echo 'Connected successfully';
mysqli_select_db($conn, $dbName) or die('Could not select database');


$query = 'SELECT TITLE, AUTHOR FROM BOOKINFO';
$result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT) or die('Query failed: ' . mysqli_error());
echo 'query done';

// Print results in HTML
echo "<table>\n";
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   		echo "\t<tr>\n";
   		foreach ($line as $col_value) {
       		echo "\t\t<td>$col_value</td>\n";
   		}
   		echo "\t</tr>\n";
}
echo "</table>\n";
echo "Number of fields: ".mysqli_num_fields($result)."<br>";
echo "Number of records: ".mysqli_num_rows($result)."<br>";








// Close connection
mysqli_close($conn);

?> 

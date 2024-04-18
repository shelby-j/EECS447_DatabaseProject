

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

mysql_select_db('447s24_s352j477') or die('Could not select database');

// Send SQL query
	$query = 'SELECT * FROM CRUISE';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Print results in HTML
	echo "<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    		echo "\t<tr>\n";
    		foreach ($line as $col_value) {
        		echo "\t\t<td>$col_value</td>\n";
    		}
    		echo "\t</tr>\n";
	}
	echo "</table>\n";

	echo "Number of fields: ".mysql_num_fields($result)."<br>";
	echo "Number of records: ".mysql_num_rows($result)."<br>";

// Close connection
mysql_close($link);

?> 

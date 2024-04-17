<?php

	$conn = mysql_connect('mysql.eecs.ku.edu', '447s24_s352j477', 'aiCeiph7')
    		or die('Could not connect: ' . mysql_error());
	echo 'Connected successfully';
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

// Free resultset
	mysql_free_result($result);

// Close connection
	mysql_close($link);

?> 

<!DOCTYPE html>
<html>
<body>

<style>
.buttons{
    display: flex;
    justify-content:flex-end;
    align-items:center;
}
body {
    text-align: center;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: black;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: gray;
}

.active {
  background-color: #fb5592;
}
div{
	text-align: center;
}
</style>



<!---------------------- HTML -------------------------->


<h1>Library Page</h1>
 

<ul>
  <li><a href="Homepage.php">Home</a></li>
  <li><a href="employee.html">Employees</a></li>
  <li><a href="account.php">Accounts</a></li> 
  <li class="active"><a href="locations.php">Locations</a></li> 
  <form action = "logout.php" method = "post"><div class="buttons"><button>Logout</button></div></form>
</ul>
<br/>

<div id="results">

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', $dbName, 'aiCeiph7') or die('Could not connect: ' . mysqli_error());
mysqli_select_db($conn, $dbName) or die('Could not select database');


$query = 'SELECT * FROM BRANCH';
$result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT) or die('Query failed: ' . mysqli_error());


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

// Close connection
mysqli_close($conn);

?> 


</div>

</body>
</html>


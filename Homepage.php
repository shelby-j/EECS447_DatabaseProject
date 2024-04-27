


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
  <li class="active"><a href="Homepage.php">Home</a></li>
  <li><a href="employee.html">Employees</a></li>
  <li><a href="account.php">Accounts</a></li> 
  <li><a href="locations.php">Locations</a></li> 
  <form action = "logout.php" method = "post"><div class="buttons"><button>Logout</button></div></form>
</ul>
<br/>
<form action="Homepage.php" method="post">
	<label for="branches"> Pick a branch to search: </label>
	<select id="branches" name = "loc">
        <option value="All">Any</option>
		<option value="Woodend">Woodend</option>
		<option value="Turner Valley">Turner Valley</option>
		<option value="Park Lane">Park Lane</option>
		<option value="Rosebud">Rosebud</option>
        <option value="Lakelee">Lakelee</option>
        <option value="Fallie">Fallie</option>
	</select>
	<br/><br/>
	
	<label> Search by:</label><br>

    <label for="title"><b>Title: </b></label>
    <input name = "title" type="title" placeholder="Search Title" size=40><br>

    <label for="auth"><b>Author: </b></label>
    <input type="auth" placeholder="Search Author" name = "auth" size=40><br>

    <label for="genre"><b>Genre: </b></label><br>

    <input type="radio" id="all" name="genre" value="All" checked />
    <label for="all">Any</label>
    
	<input type="radio" id="ChildLit" name="genre" value="Children's Lit"/>
    <label for="ChildLit">Children's Lit</label>
	
    <input type="radio" id="Poetry" name="genre" value="Poetry"/>
    <label for="Poetry">Poetry</label>
    
    <input type="radio" id="scifi" name="genre" value="Sci-Fi"/>
    <label for="scifi">Sci-Fi</label>
    
    <input type="radio" id="romance" name="genre" value="Romance"/>
    <label for="romance">Romance</label>
	
    <input type="radio" id="classic" name="genre" value="Classic"/>
    <label for="classic">Classics</label>
	
    <input type="radio" id="Horror" name="genre" value="Horror"/>
    <label for="horror">Horror</label>
	
    <input type="radio" id="ya" name="genre" value="YA"/>
    <label for="ya">YA</label>
	
    <input type="radio" id="dystopian" name="genre" value="Dystopian"/>
    <label for="dystopian">Dystopian</label>
	
    <input type="radio" id="fantasy" name="genre" value="Fantasy"/>
    <label for="fantasy">Fantasy</label><br>
	
    <input type="submit" value="Search">
	
</form>

<div id="results">

<?php



//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', $dbName, 'aiCeiph7') or die('Could not connect: ' . mysqli_error());
mysqli_select_db($conn, $dbName) or die('Could not select database');




$query = 'SELECT TITLE, AUTHOR FROM BOOKINFO';
$result = mysqli_query($conn, $query, MYSQLI_STORE_RESULT) or die('Query failed: ' . mysqli_error());

// Close connection


$loc = $_POST["loc"];
$title = $_POST["title"];
$auth  = $_POST["auth"];
$genre = $_POST["genre"];

//if ($loc === "All"){
//	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ISBN FROM BOOK";
//}
//else{
//	$sqlloc = "SELECT BARCODE,ISBN FROM BOOK WHERE ATLOC = \"$loc\" ";
//}


if($loc ===  "All" and $genre ==="All"){
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN";
}
else if($loc !== "All" and $genre === "All"){
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN AND BOOK.ATLOC = \"$loc\"";
}
else if($genre !== "All" and $loc ==="All")
{
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN AND BOOKGENRE.GENRE = \"$genre\"";
}
else{
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN AND BOOK.ATLOC = \"$loc\" AND BOOKGENRE.GENRE = \"$genre\"";
}


if($title === "" and $auth ===""){
	$sqls = "SELECT * FROM BOOKINFO,($sqlloc) AS LOC WHERE BOOKINFO.ISBN = LOC.ISBN;";
}
else if($title !== "" and $auth === ""){
	$sqls = "SELECT * FROM BOOKINFO,($sqlloc) AS LOC WHERE TITLE LIKE \"%$title%\" AND BOOKINFO.ISBN = LOC.ISBN;";
}
else if($auth !== "" and $title ==="")
{
	$sqls = "SELECT * FROM BOOKINFO,($sqlloc) AS LOC WHERE AUTHOR LIKE \"%$auth%\" AND BOOKINFO.ISBN = LOC.ISBN;";
}
else{
	$sqls = "SELECT * FROM BOOKINFO,($sqlloc) AS LOC WHERE AUTHOR LIKE \"%$auth%\" AND TITLE LIKE \"%$title%\" AND BOOKINFO.ISBN = LOC.ISBN;";
}


//if($genre === "All"){
	//$sqlgenreall = "$sqls;";
//}
//else{
//	$sqlgenreall = "SELECT AUTH.BARCODE, AUTH.ISBN, AUTH.TITLE, AUTH.AUTHOR FROM BOOKGENRE, ($sqls) AS AUTH WHERE BOOKGENRE.ISBN = AUTH.ISBN AND GENRE = \"$genre\";";
	//$sqlgenreall = "SELECT * FROM ($sqlgenres) AS AUTH, BOOK WHERE BOOK.ISBN = AUTH.ISBN;";
//}

//echo $sqls;
$result = mysqli_query($conn, $sqls, MYSQLI_STORE_RESULT) or die('Query failed: ' . mysqli_error());

//$tableStyle = "style='border:1px solid; border-collapse:collapse; padding:8px;'";
if(mysqli_fetch_array($result, MYSQLI_ASSOC) != NULL){
	echo "<br><br>";
	echo "<table style='border:1px solid; border-collapse:collapse; padding:8px; width:100%;'>\n";
	echo "\t<tr style='border:1px solid; border-collapse:collapse; padding:8px;'>
			\t\t<th>ISBN</th>\n
			\t\t<th>Publication Year</th>\n
			\t\t<th>Author</th>\n
			\t\t<th>Title</th>\n
			\t\t<th>Cover</th>\n
			\t\t<th>Barcode</th>\n
		\t</tr>";
}
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   		echo "\t<tr style='border:1px solid; border-collapse:collapse; padding:8px;'> \n";
   		foreach ($line as $col_value) {
       		echo "\t\t<td style='border:1px solid; border-collapse:collapse; padding:8px;'>$col_value</td>\n";
   		}
   		echo "\t</tr>\n";
}
echo "</table>\n";

mysqli_close($conn);
?> 


</div>

</body>
</html>



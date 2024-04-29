


<!DOCTYPE html>
<html>
<body>

<style>

/* CSS */
.buttonlog {
  background-color:  #bfbfbf;
  border: 2px solid #404040;
  border-radius: 25px;
  color: #404040;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 50px;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.buttonlog:hover {
  background-color:  #bfbfbf;
}

.buttonlog:active {
  box-shadow: #404040 2px 2px 0 0;
  transform: translate(2px, 2px);
}

@media (min-width: 768px) {
  .buttonlog {
    min-width: 120px;
    padding: 0 25px;
  }
}
.searchform{
  width: 450px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

</style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome To Library </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
<!--------------------------------------------------------Navigation---------------------------------------------------------------------------------->
<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="index.html">HOME</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Homepage.php">VIEW CATALOG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkinout.html">CHECK IN/OUT</a>
            </li>
                <a class="nav-link" href="accounts.html" >PATRONS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="employee.php" >EMPLOYEE</a>
              </li>
          </ul>
        </div>
		<form action = "logout.php" method= "post"><div class="buttons"><button class = "buttonlog">Logout</button></div></form>
      </nav>
</section>




<!---------------------- HTML -------------------------->


<h1>Library Database Search</h1>

<br/>
<form action="Homepage.php" method="post" class="searchform">
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



/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

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
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ATLOC, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN";
}
else if($loc !== "All" and $genre === "All"){
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ATLOC, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN AND BOOK.ATLOC = \"$loc\"";
}
else if($genre !== "All" and $loc ==="All")
{
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ATLOC, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN AND BOOKGENRE.GENRE = \"$genre\"";
}
else{
	$sqlloc = "SELECT BOOK.BARCODE, BOOK.ATLOC, BOOK.ISBN FROM BOOK, BOOKGENRE WHERE BOOK.ISBN = BOOKGENRE.ISBN AND BOOK.ATLOC = \"$loc\" AND BOOKGENRE.GENRE = \"$genre\"";
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

$counter = 0;
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   		echo "\t<tr style='border:1px solid; border-collapse:collapse; padding:8px;'> \n";
   		foreach ($line as $col_value) {
			if($counter < 1){
				   echo "<br><br>";
					echo "<table style='border:1px solid; border-collapse:collapse; padding:8px; width:100%;'>\n";
					echo "\t<tr style='border:1px solid; border-collapse:collapse; padding:8px;'>
							\t\t<th>ISBN</th>\n
							\t\t<th>Publication Year</th>\n
							\t\t<th>Author</th>\n
							\t\t<th>Title</th>\n
							\t\t<th>Cover</th>\n
							\t\t<th>Barcode</th>\n
							\t\t<th>Location</th>\n
						\t</tr>";
			}
			if(str_contains($col_value, ".jpg")){
				$path = "coverImages/";
				echo "\t\t<td style='border:1px solid; border-collapse:collapse; padding:8px;'> <img src='$path$col_value' style='max-width:100px;'></td>\n";
				
			}
			else if($col_value == NULL){
				echo "\t\t<td style='border:1px solid; border-collapse:collapse; padding:8px;'> Checked Out </td>\n";
			}
			else{
				echo "\t\t<td style='border:1px solid; border-collapse:collapse; padding:8px;'>$col_value</td>\n";
			}
			$counter = $counter + 1;
   		}
   		echo "\t</tr>\n";
		
}
echo "</table>\n";



mysqli_close($conn);
?> 




</div>

</body>
</html>



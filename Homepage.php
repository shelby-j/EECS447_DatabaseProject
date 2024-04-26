<?php
session_start()

if(isset($_SESSION['ENAME'])) { ?>


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
</style>



<!---------------------- HTML -------------------------->


<h1>Library Page</h1>
 

<ul>
  <li class="active"><a href="Homepage.php">Home</a></li>
  <li><a href="employee.html">Employees</a></li>
  <li><a href="accounts.html">Accounts</a></li>
  <li><a href="locations.html">Locations</a></li>
  <form><div class="buttons"><button>Profile</button></div></form>
</ul>
<br/>
<form action="db.php">
	<label for="branches"> Pick a branch to search: </label>
	<select id="branches">
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
    <input type="title" placeholder="Search Title" size=40><br>

    <label for="auth"><b>Author: </b></label>
    <input type="auth" placeholder="Search Author" size=40><br>

    <label for="genre"><b>Genre: </b></label><br>

    <input type="radio" id="all" name="genre" value="All"/>
    <label for="all">Any</label>
    
	<input type="radio" id="ChildLit" name="genre" value="Children's Lit"/>
    <label for="ChildLit">Children's Lit</label>
	
    <input type="radio" id="Poetry" name="searchType" value="Poetry"/>
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

<div class="results">

</div>

<h1>Hello, <?php echo $_SESSION['ENAME'];?> </h1>
<a href = "logout.php">Logout</a>
</body>
</html>

<?php
}
else
{
  header("Location: LoginPage.php");
  exit();
}
?>

<style>
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

label {
  color: white;
}

.buttonlog:hover {
  background-color:  #800000;
}

.buttonlog:active {
  box-shadow: #4d0000 2px 2px 0 0;
  transform: translate(2px, 2px);
}

@media (min-width: 768px) {
  .buttonlog {
    min-width: 120px;
    padding: 0 25px;
  }
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}
body {
  background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url(img/back.jpg);
    margin-top: 0px;
    border-collapse: collapse;
    width: 100%;
    padding-bottom: 210px;
}

p {
  color: white;
  font-size: large;
}

/* Control the left side */
.left {
  left: 0;
}

/* Control the right side */
.right {
  right: 0;
}

/* If you want the content centered horizontally and vertically */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

/* Style the image inside the centered container, if needed */
.centered img {
  width: 150px;
  border-radius: 50%;
}
  </style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="account.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
  <body>
<!--------------------------------------------------------Navigation----------------------------------------------------------->
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
          <li class="nav-item">
            <a class="nav-link" href="Homepage.php">VIEW CATALOG</a>
          </li>
          <li class="nav-item active">
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

  <div class="split left">
    <div class="centered">
      <p>Check out a book from the system:</p><br>
      <form id = "checkout" action = "" method = "post">
        <label for="barcode"><b>Book Barcode:</b></label><br>
        <input type="text" placeholder="Barcode" name="barcode" required><br>
    
        <label for="accid"><b>Accont Id:</b></label><br>
        <input type="text" placeholder="Account Id" name="accid" required><br><br>
    
        <input type="submit" name = "checkout" value="Check Out">
    </form>
	<div>
	<?php
	 if( $_POST['checkout'] ) {
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
			header('Location: checkinout.php');
		    
		}
		mysqli_close($conn);
		}
		 ?>
	</div>
    </div>
  </div>
  
  <div class="split right">
    <div class="centered">
      <p>Check in a book to the system:</p><br>
      <form id = "checkin" action = "" method = "post">
        <label for="barcode"><b>Book Barcode:</b></label><br>
        <input type="text" placeholder="Barcode" name="barcode" required><br>
    
        <label for="accid"><b>Account Id:</b></label><br>
        <input type="text" placeholder="Account Id" name="accid" required><br><br>
		<label for="location"><b>Check-in Location:</b></label><br>
		<select name="location">
			<option value="Fallie">Fallie</option>
			<option value="Lakelee">Lakelee</option>
			<option value="Park Lane">Park Lane</option>
			<option value="Rosebud">Rosebud</option>
			<option value="Turner Valley">Turner Valley</option>
			<option value="Woodend">Woodend</option>
		</select>
		<br><br>
        <input type="submit" name = "checkin" value="Check In">
    </form>
	<div>
	<?php
	 if( $_POST['checkin'] ) {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		$dbName = '447s24_s352j477';
		
		// Connect to MySQL server, select database
		$conn = mysqli_connect('mysql.eecs.ku.edu', '447s24_s352j477', 'aiCeiph7', '447s24_s352j477') or die('Could not connect: ' . mysqli_error());
		
		
		$loc = $_POST['location'];
		$barcode = $_POST['barcode'];
		$accid = $_POST['accid'];
		
		
		$sql = "SELECT * FROM CHECKEDOUT WHERE BARCODE=\"$barcode\" and ACCOUNTID =\"$accid\";";
		
		$result1 = mysqli_query($conn, $sql);
		$result2 = mysqli_fetch_array($result1);
		
		
		
		if ($result2 != NULL){
		    /*$uname = $_SESSION['user'];
		    $getloc = "SELECT LOCNAME FROM EMPLOYEE WHERE ENAME = \"$uname\";";
		    $loc = mysqli_fetch_array(mysqli_query($conn, $getloc));
			echo $loc; */
		    $sqldel = "DELETE FROM CHECKEDOUT WHERE BARCODE = \"$barcode\" and ACCOUNTID = \"$accid\";";
		    $r1 = mysqli_query($conn, $sqldel);
		    $sqladd  = "UPDATE BOOK SET ATLOC = \"$loc\" WHERE BARCODE = \"$barcode\";";
		    $r1 = mysqli_query($conn, $sqladd);
		   header('Location: checkinout.php');
		}
		else{
			echo("Book is already checked in");
		}
		mysqli_close($conn);
		}
		 ?>
	</div>
    </div>
</body>
  </html>

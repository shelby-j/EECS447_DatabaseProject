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
          <li class="nav-item">
            <a class="nav-link" href="checkinout.html">CHECK IN/OUT</a>
          </li>
              <a class="nav-link" href="accounts.html" >PATRONS</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="employee.php" >EMPLOYEE</a>
            </li>
        </ul>
      </div>
  <form action = "logout.php" method= "post"><div class="buttons"><button class = "buttonlog">Logout</button></div></form>
    </nav>
</section>
<div id="results">
    <?php
    
    $dbName = '447s24_s352j477';
    
    $conn = mysqli_connect('mysql.eecs.ku.edu', $dbName, 'aiCeiph7') or die('Could not connect: ' . mysqli_error());
    mysqli_select_db($conn, $dbName) or die('Could not select database');
    
    $sql = "SELECT ENAME, EMPLOYID, LOCNAME FROM EMPLOYEE;";
    $result = mysqli_query($conn, $sql);
	$counter = 0;
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			   if($counter < 1){
				   echo "<br><br>";
					echo "<table style='border:1px solid; border-collapse:collapse; padding:8px; width:100%; color:white; background-color:rgba(0,0,0,0.5)'>\n";
					echo "\t<tr style='border:1px solid; border-collapse:collapse; padding:8px;'>
							\t\t<th>Name</th>\n
							\t\t<th>ID</th>\n
							\t\t<th>Branch</th>\n
						\t</tr>";
			   }
               echo "\t<tr style='border:1px solid; border-collapse:collapse; padding:8px;'> \n";
               foreach ($line as $col_value) {
                   echo "\t\t<td style='border:1px solid; border-collapse:collapse; padding:8px;'>$col_value</td>\n";
               }
               echo "\t</tr>\n";
			   $counter = $counter + 1;
    }
    echo "</table>\n";
    
    mysqli_close($conn);
	?>
    
</div>

  
  </body>
  </html>

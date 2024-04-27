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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active ">
              <a class="nav-link" href="index.html" target="_parent" >HOME</a>
            </li>
          </ul>
        </div>
      </nav>
</section>
<div id="results">
    <?php
    
    $dbName = '447s24_s352j477';
    
    $conn = mysqli_connect('mysql.eecs.ku.edu', $dbName, 'aiCeiph7') or die('Could not connect: ' . mysqli_error());
    mysqli_select_db($conn, $dbName) or die('Could not select database');
    
    $sql = "SELECT ENAME, EMPLOYID, LOCNAME FROM EMPLOYEE;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_fetch_array($result, MYSQLI_ASSOC) != NULL){
        echo "<br><br>";
        echo "<table style='border:1px solid; border-collapse:collapse; padding:8px; width:100%;'>\n";
        echo "\t<tr style='border:1px solid; border-collapse:collapse; padding:8px;'>
                \t\t<th>Name</th>\n
                \t\t<th>ID</th>\n
                \t\t<th>Branch</th>\n
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

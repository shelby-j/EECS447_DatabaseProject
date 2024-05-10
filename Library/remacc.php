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
form{
  text-align: center;
}
input {
  text-align: center;
}
</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delete Account</title>
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
          <li class="nav-item">
            <a class="nav-link" href="Homepage.php">VIEW CATALOG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkinout.html">CHECK IN/OUT</a>
          </li>
              <a class="nav-link active" href="accounts.html" >PATRONS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="employee.php" >EMPLOYEE</a>
            </li>
        </ul>
      </div>
  <form action = "logout.php" method= "post"><div class="buttons"><button class = "buttonlog">Logout</button></div></form>
    </nav>
</section>
<!------------------------------------------------------------------SLIDER-------------------------------------------------------------------------------------->
<div id="headerSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
      <li data-target="#headerSlider" data-slide-to="1"></li>
      <li data-target="#headerSlider" data-slide-to="2"></li>
      <li data-target="#headerSlider" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/librarybackground1.jpg" class="d-block img-fluid" alt="slide1">
        <div class="carousel-caption">
            <h5>“Between the Covers”</h5>
            <blockquote>“Connects – people to people,<br>
              people to place,<br>
              people to learning.”</blockquote>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/librarybackground2.jpg" class="d-block img-fluid" alt="slide2">
        <div class="carousel-caption">
            <h5>“Find happiness in turning pages”</h5>
            <blockquote>“How about a date<br>
              with a good book.”</blockquote>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/librarybackground3.jpg" class="d-block w-fluid" alt="slide3">
        <div class="carousel-caption">
            <h5>“Beginning to End”</h5>
            <blockquote>“Cutting libraries in a recession is<br>
              like cutting hospitals in<br>
              a plague.”</blockquote>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/newyork.jpg" class="d-block img-fluid" alt="slide2">
        <div class="carousel-caption">
            <h5>“A bibliophile's paradise.”</h5>
            <blockquote>“"I had found my religion:<br> 
              nothing seemed more important to me than a book.<br>
               I saw the library as a temple.”</blockquote>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <!-- add account-->
  <div class="container">
    <h1>Delete Account</h1>
    <div class="col-12">
        <form action="remacc.php" method="post">
          <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="form-group">
          <label for="accountid">Account ID</label>
          <input type="text" class="form-control" id="accountid" name="accountid" pattern="\d{8}" title="Account ID must be exactly 8 digits" required placeholder="account id">
      </div>
            <button type="submit" class="btn btn-primary" value="Delete">Submit</button>
        </form>
    </div>
</div>
        <div>
            <?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', '447s24_s352j477', 'aiCeiph7', '447s24_s352j477') or die('Could not connect: ' . mysqli_error());



$accid = $_POST['accountid'];

$sql = "SELECT * FROM ACCOUNT WHERE ACCOUNTID =\"$accid\";";

$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($result1);



if ($result2 != NULL){
    $sqldel = "DELETE FROM ACCOUNT WHERE ACCOUNTID = \"$accid\";";
    $r1 = mysqli_query($conn, $sqldel);
    header('Location: accounts.html');
}
else{
    echo("There is no such account.");
    
}
mysqli_close($conn);


?>
        </div>

    <!--------------------------------------------------------container----------------------------------------------------------->
    <section id="footer">
      <div class="container text-center">
        <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="https://www.gmail.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
        <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.snapchat.com/" target="_blank"><i class="fa fa-snapchat-ghost"></i></a>
        <a href="http://linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
                         <p><i class="fa fa-copyright"></i> 2024</p>
      </div>
    </section>
    <!-----------------------------------------------------------------javascript------------------------------------------------------------------>
    <script src="javascript/scroll.js"></script>
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    </body>
</html>


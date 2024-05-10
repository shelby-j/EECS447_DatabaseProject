<!DOCTYPE html>
<html>
<body>
  <style>
    h1{
    text-align: center;
    font-family: Bookman, URW Bookman L, serif;
    color: white;
    font-size: 40px;
    }
    h2{
    text-align: center;
    font-family: Bookman, URW Bookman L, serif;
    color: white;
    font-size: 40px;
    }
    body{
        text-align: center;
        color: white;
        font-family: Bookman, URW Bookman L, serif;
        position: fixed;
        top: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-image: url('libBack.jpg');
    }
  </style>


<h1>Library Manager Login</h1>

<form action = "LoginPage.php" method="post">
    <?php if(isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
    <?php } ?>
      <label for="username"><b>Username</b></label><br>
      <input type="text" placeholder="User" name="username" required><br>
  
      <label for="password"><b>Password</b></label><br>
      <input type="password" placeholder="Password" name="password" required><br><br>
  
      <input type="submit" value="Login">
  </form>
  <h2>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

$dbName = '447s24_s352j477';

// Connect to MySQL server, select database
$conn = mysqli_connect('mysql.eecs.ku.edu', '447s24_s352j477', 'aiCeiph7', '447s24_s352j477') or die('Could not connect: ' . mysqli_error());


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT ENAME FROM EMPLOYEE WHERE ENAME='$username' and PASS='$password';";
$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($result1);


mysqli_close($conn);


if ($result2 != NULL){
	header('Location: index.html');
	session_start();
	$_SESSION["user"] = $username;
}
else{
	echo ("Invalid Username or Password");
}
?>
  </h2>


</body>
</html> 

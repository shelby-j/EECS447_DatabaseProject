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

<form action = "login.php" method="post">
    <?php if(isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
    <?php } ?>
      <label for="username"><b>Username</b></label><br>
      <input type="text" placeholder="User" name="username" required><br>
  
      <label for="password"><b>Password</b></label><br>
      <input type="password" placeholder="Password" name="password" required><br><br>
  
      <input type="submit" value="Login">
  </form>
  <h2></h2>


</body>
</html> 

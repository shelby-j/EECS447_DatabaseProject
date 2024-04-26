<?php
session_start();
include ("db.php");

if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);

if(empty($username)){
    header("Location: LoginPage.php?error=Enter Username")
    exit();
}
else if(empty($password))
{
    header("Location: LoginPage.php?error=Enter Password");
    exit();
}

$sql = "SELECT ENAME, PASS FROM EMPLOYEE WHERE ENAME='$username' and PASS='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    if($row['ENAME']===$username && $row['PASS']===$password){
        echo "Logged In";
        $_SESSION['PASS'] = $row['PASS'];
        $_SESSION['ENAME'] = $row['ENAME'];
        header("Location: Homepage.php");
        exit();

    }
    else{
        header("Location: LoginPage.php?error=Incorrect Credentials");
    exit();
    }
}
else {
    header("Location: LoginPage.php?");
    exit();
}
?>

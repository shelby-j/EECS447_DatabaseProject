<?php
session_start()
include "db_conn.php";

if(issets($_POST['uname']) && isset($_POST['psw'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['uname']);
$password = validate($_POST['psw']);

if(empty($username)){
    header("Location: LoginPage.php?error=Enter Username")
    exit();
}
else if(empty($password))
{
    header("Location: LoginPage.php?error=Enter Password");
    exit();
}

$sql = "SELECT * FROM EMPLOYEE WHERE ENAME='$username' and PASS='$password'";
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

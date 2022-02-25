<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/db_connx.php');
include('includes/errors.php');

// get username and password from form
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

// Check if is an admin
$checkadmin = "SELECT * FROM staff WHERE username = '$username' AND pass = '$password'";
$resultadmin = $conn->query($checkadmin);
if($resultadmin->num_rows === 1){
    $_SESSION['session1'] = "admin";
    $row= $resultadmin->fetch_assoc();
    echo $_SESSION['session1'];
    echo $row['id'];
    header("Location:admininfo.php?id=". $row['id']);
}
else{

// If not is and admin check if is a registred user
$sql =  "SELECT  userid, pass, username  FROM users WHERE username = '$username' and pass = '$password'" ;
$result = $conn->query($sql);
$count=mysqli_num_rows($result);

if ($result->num_rows === 1) {
    $_SESSION['session1'] = "user";
    $row = $result->fetch_assoc();
    header("Location:memberpage.php?id=". $row['userid']); 
    }
    else
        header('Location:index.php');
}
?>



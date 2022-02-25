<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/errors.php');

include('includes/db_connx.php');   

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);  
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);


    $checkuser = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkuser);
    if($result->num_rows > 0){
        echo "username already taken";
    }
    else{
        $sql = "INSERT INTO users(username, pass, firstname, lastname, telephone, address, email)
        VALUE('$username', '$password', '$firstname', '$lastname' , '$telephone','$address', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "New Account created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error; 
         }   
    }    
?>





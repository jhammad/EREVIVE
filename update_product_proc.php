<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/errors.php');
include('includes/db_connx.php');
if(!isset( $_SESSION["session1"]))
{
    header('Location:index.php');
}
else
{
$productID = mysqli_real_escape_string($conn,$_POST['IDproduct']);
$title = mysqli_real_escape_string($conn,$_POST['titleproduct']);
$brand = mysqli_real_escape_string($conn,$_POST['brandproduct']);
$age = mysqli_real_escape_string($conn,$_POST['ageproduct']);
$estate = mysqli_real_escape_string($conn,$_POST['estateproduct']);
$price = mysqli_real_escape_string($conn,$_POST['costproduct']);
$description = mysqli_real_escape_string($conn,$_POST['descriptionproduct']);
$picture = mysqli_real_escape_string($conn,$_POST['picurl']);


// Update the product///////////////////////

$sql = "UPDATE products SET id='$productID', title='$title', brand='$brand', age = '$age',estate='$estate', cost='$price', picture= '$picture', 
information = '$description' WHERE id='$productID'";


if (mysqli_query($conn, $sql)) {
    // move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file);
    echo "Record updated successfully";
    header("Location:adminpanel.php"); 

    // header('Location:products_on_sale.php');
    
  
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }  
  mysqli_close($conn);
}

?>
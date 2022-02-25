<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/errors.php');
include('includes/db_connx.php');
session_start();
if(!isset($_SESSION["session1"]))
{
  header('Location:index.php');
}
else 
{
$userid = $_GET['id'];
$sql =  "SELECT * FROM staff WHERE id = '$userid'";
$result = $conn->query($sql);
if($result->num_rows > 0) { 
    $row= $result->fetch_assoc();   
}  
}      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet"> 
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title><?php echo $row['firstname'] . "'s" . " page"?></title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container">
  <div class="col">
    <a class="navbar-brand" href="index.php">eRevive</a>
    </div>
    <div class="col-8">
    <p class="motto">Giving your tech a second life</p>
    </div>
    <div class="col">
    <button type="button" onclick="document.location='memberpass.php'" class="btn btn-light">Log in/Register</button>
    </div> 
  </div>
</nav>

<div class="product_frame">
<div class="container">
<div class="row">
    <div class="col">
    <h3 class="title_text"><?php echo $row['firstname'] . "'s" . " information"?></h3>
    </div>
    <div class="col col-md-4 offset-md-4">
    <a class='button_link' href="adminpanel.php">All products on sale</a>
    </div>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
<p class="membertext"><?php echo "Username :   ". $row['username']?></p>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
<p class="membertext"><?php echo "Name :   ". $row['firstname']?></p>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
<p class="membertext"><?php echo "Lastname :   ". $row['lastname']?></p>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
<p class="membertext"><?php echo "Phone :   ". $row['telephone']?></p>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
<p class="membertext"><?php echo "Address :   ". $row['address']?></p>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
<p class="membertext"><?php echo "Role :   ". $row['role']?></p>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
<p class="membertext"><?php echo "Email :   ". $row['email']?></p>
</div>
<div class="row">
<hr class="memberhr">
</div>
<div class="row">
  <div class="col text-center">
<?php echo"<a class='delete_link' href='account_deletion_confirmation.php?id="  . $row['id']. " '>Delete account</a>"?>
</div> 
<div class="col col-md-4 offset-md-4">
<?php echo"<a class='logout_link' href='logout.php'>  Log out</a>"?>
</div>
</div> 
</div>
</div>
<br>
<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-bottom">
  <div class="container">
  <div class="col">
    <a class="smalllogo" href="index.php">eRevive</a>
    </div>
    <div class="col">
    <a class="footerlink" href="#">Contact</a>
    </div>
    <div class="col">
    <a class="footerlink" href="#">Social Media</a>
    </div> 
    <div class="col">
    <a class="footerlink" href="#">About</a>
    </div> 
    <div class="col">
    <a class="footerlink" href="#">Copyright</a>
    </div> 
  </div>
</nav>
</body>
</html>

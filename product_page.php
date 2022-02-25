<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include('includes/errors.php');

// Pass the value ID
$productID = $_GET['id'];

// connect to the database
include('includes/db_connx.php');

// Retrieve the information from the database 
$sql =  "SELECT id, title, brand, age, estate, cost, picture, information, link, userid FROM products WHERE id = '$productID'";


// We define the variable $result 
$result = $conn->query($sql);

// If the $result is bigger than 0
if($result->num_rows > 0) {

// We create a new variable fetching the variable result
  $row= $result->fetch_assoc();


//fetch the user id number
  $usernumber= $row['userid'];


} else {
    echo "Login Failed!";
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
    <title>Product page</title>
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
    <div class="col-3">
    <div class="row">
        <p class="lefttitle">Products from the same seller</p>
    </div>
    <div class="row">   

  
    <?php

$list = mysqli_query($conn,"SELECT * FROM `products` WHERE userid = $usernumber");

while($row2 = mysqli_fetch_array($list))
  {
//   echo $row2['title']; 
  echo "<ul class='productlist'><a class=link1 href='product_page.php?id=" . $row2['id']. " '> ".
   $row2['title']. "</a></ul>";
    echo "<br />";
  }

mysqli_close($conn);
  
  
    ?>


    </div>
    </div>
    <div class="col-9">
        <div class="row">
        <div class="col">
        <h3 class="title_text"><?php echo $row['title']?></h3>
        </div>
        <div class="col">
        <h3 class="price_text"><?php echo $row['cost']?> £</h3>
        </div>
        </div>
        <div class="row">
        <hr class="producthr">
        </div>
        <div class="row">
        <img class="img-fluid" id="imagehome" src="<?php echo $row['picture']?>" alt="image product">    
        </div>  
        <div class="row">
        <hr class="producthr">
        </div> 
        <div class="row">
        <p class="description_text"><?php echo $row['information']?></p>
        </div>
        <div class="row">
        <hr class="producthr">
        </div> 
        <div class="row">
        <a class="btn btn-primary" id="cartbutton" href="cart.php" role="button">Add to cart</a>        </div> 
  </div>
</div>
</div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
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
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
    <title>eRevive</title>
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

<div class="hero-image">  
  <div class="hero-text">
    <h1>Giving your tech a second life</h1>
  </div>
</div>

  <form class="form-inline" id="search_home" action="search_results.php" method="post">
    <input class="form-control mr-sm-2" type="text" name="searchinfo" placeholder="Search in our products" aria-label="Search">
    <button class="btn" id="button_search" type="submit">Search</button>
  </form>


<hr class="homehr">

<p class="herotitle">Last products on sale</p>


<div class="grid-container-products_home">

<?php

include'includes/db_connx.php';
include'includes/errors.php';
$sql =  "SELECT title, brand, age, picture, cost,id FROM products";
$result = $conn->query($sql);
$i=0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo '<div class=space3>'.'<p class=title2>'.$row['title'].'</p>'.'<p>'.$row['brand'].'</p>'.'<p>'.$row['cost'].
  '<p>'.'<img class=image1 src='.'"'.$row['picture'].'"'.'</p>'.'<p >'."<a class=link1 href='product_page.php?id=" . $row['id']. " '>  Buy it</a>".'</p>'.'</div>';
  // Limit number of products to 8  
  if (++$i >= 8) {
    break;
  }
  } 
}
$conn->close();
?>

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
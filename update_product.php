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
?>

<?php

// Pass the value ID
$productID = $_GET['id'];

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
    <title>Update product</title>
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
        <p class="lefttitle">items on sale from user</p>
    </div>
    <div class="row">
    
    <!-- products from the same seller -->

  
    <?php
    $list = mysqli_query($conn,"SELECT * FROM `products` WHERE userid = $usernumber");
    while($row2 = mysqli_fetch_array($list))
    {
    echo "<ul class='productlist'><a class=link1 href='product_page.php?id=" . $row2['id']. " '> ".
    $row2['title']. "</a></ul>";
    echo "<br />";
    }
    mysqli_close($conn);  
    ?>
    </div>
    </div>
    <div class="col-9">
    <div class="container">
    <div class="row">
    <p class="lefttitle">Update the product</p>
    </div>
     
        <form enctype="multipart/form-data" action="update_product_proc.php" method="post" name="UpdateForm">
        <div class="form-group"> 
        <label for="titleproduct">Product ID</label>
        <input type="text" readonly class="form-control"  name="IDproduct" value="<?php echo $row['id']?>">
        </div>       
         <label for="titleproduct">Title</label>
        <input type="text" class="form-control"  name="titleproduct" value="<?php echo $row['title']?>">
        <div class="form-group">
        <label for="brandproduct">Brand</label>
        <input type="text" class="form-control"  name="brandproduct" value="<?php echo $row['brand']?>">
        </div>
        <div class="form-group">
        <label for="ageproduct">Age</label>
        <input type="text" class="form-control"  name="ageproduct" value="<?php echo $row['age']?>">
        </div>
        <div class="form-group">
        <label for="estateproduct">Estate</label>
        <input type="text" class="form-control"  name="estateproduct" value="<?php echo $row['estate']?>">
        </div>
        <div class="form-group">
        <label for="costproduct">Price</label>
         <input type="text" class="form-control"  name="costproduct" value="<?php echo $row['cost']?>">
        </div>
        <div class="form-group">
        <label for="descriptionproduct">Description</label>
        <input type="text" class="form-control"  name="descriptionproduct" value="<?php echo $row['information']?>">
        </div>
        <div class="form-group">  
         <input type="hidden" readonly class="form-control"  name="picurl" value="<?php echo $row['picture']?>">
        </div>
        <input type="submit"  name="submit" value="change details" class="btn btn-primary" >         
        </form>
        <form action="update_product_image.php" method="post" enctype="multipart/form-data" class="text-center title1">
        Product's image<br>
        <image class="image1" src="<?php echo $row['picture']?>"><br><br>
        <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-light"><br><br>
        <input type="submit" name="newpic" value="change the picture" class="btn btn-primary">
        </form>
  </div>
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
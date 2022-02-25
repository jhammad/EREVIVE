<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include('includes/errors.php');
    include('includes/db_connx.php');
    session_start();
    if(!isset( $_SESSION["session1"]))
    {
        header('Location:index.php');
    }
?>

<?php

$userid = $_GET['id'];
$sql =  "SELECT * FROM users WHERE userid = '$userid'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
$row= $result->fetch_assoc();
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
    <title>Sell a product</title>
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
        <p class="lefttitle">Current products on sale</p>
    </div>
    <div class="row"> 

  
    <?php

    $list = mysqli_query($conn,"SELECT * FROM products WHERE userid = $usernumber");
    if($list->num_rows > 0) {
    while($row2 = mysqli_fetch_array($list))
    {
    echo "<ul class='productlist'><a class=link1 href='product_page.php?id=" . $row2['id']. " '> ".
    $row2['title']. "</a></ul>";
    echo "<br />";
    }
    }
    else {
    echo "<p class=link1> No products on sale yet </p>";
    }

    mysqli_close($conn);
  
    ?>

    </div>
    </div>
    <div class="col-9">
    <div class="container">
    <div class="row">
    <p class="lefttitle">Sell a new item</p>
    </div>     
        <form enctype="multipart/form-data" action="new_product_proc.php" method="post" name="UpdateForm">
        <div class="form-group">            
         <label for="titleproduct">Title</label>
        <input type="text" class="form-control"  name="titleproduct" placeholder="insert product name">
        <div class="form-group">
        <label for="brandproduct">Brand</label>
        <input type="text" class="form-control"  name="brandproduct" placeholder="insert brand">
        </div>
        <div class="form-group">
        <label for="ageproduct">Age</label>
        <input type="text" class="form-control"  name="ageproduct" placeholder="insert age (YYYY-MM-DD format)">
        </div>
        <div class="form-group">
        <label for="estateproduct">Estate</label>
        <input type="text" class="form-control"  name="estateproduct" placeholder="insert  estate">
        </div>
        <div class="form-group">
        <label for="costproduct">Price</label>
         <input type="text" class="form-control"  name="costproduct" placeholder="insert cost">
        </div>
        <div class="form-group">
        <label for="descriptionproduct">Description</label>
        <input type="text" class="form-control"  name="descriptionproduct" placeholder="insert information (max 10000 char)">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control"  name="userid" value="<?php echo $row['userid']?>">
        </div>
        <div class="form-group">  
         <input type="hidden" readonly class="form-control"  name="picurl">
        </div>   
        <label for="fileToUpload">Insert Product's image max 2mb (jpg, jpeg, png, gif and webp format)</label>
            <br>
        <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-light"><br><br>
        <input type="submit"  name="submit" placeholder="change details" class="btn btn-primary" value="sell product">
        </form>      
  </div>
  </div>
</div>
</div>
</div>

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
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;300;700&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Delete account confirmation<?php echo "hello ".$_SESSION['username'] ?></title>
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
  </div>
</nav>
<div class="grid-container">

    <br>

<?php
// Get the value id from the previous page
$productID  = $_GET['id'];
$sql =  "SELECT id, title, brand, age, estate, cost, picture, information, link FROM products WHERE id = '$productID'";
$result = $conn->query($sql);

// If the $result is bigger than 0
if($result->num_rows > 0) {

  $row= $result->fetch_assoc();
} else {
    echo "Connection Failed!";
}

	$conn->close();
    echo '<div class=product_frame>'.'<p>'."You are going to delete the product  ". $row['title'].'</p>'.
    '<p>'."This process is irreversible ! ".'</p?' .'<br>'.
    '<p>'."<a class=link2 href='delete_product.php?id=" .$row['id']. " '>Delete the product</a>".
    "<a class=link1 href='index.php'>Back to home page</a>".'</div>'.'</p>'; 

?>

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
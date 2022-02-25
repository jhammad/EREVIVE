<?php   
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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Admin panel</title>
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
                <button type="button" onclick="document.location='memberpass.php'" class="btn btn-light">Log
                    in/Register</button>
            </div>
        </div>
    </nav>
    <div class="product_frame">
        <div class="container">
            <div class="row">
                <div class="col-3">
            <p class="lefttitle">List of users</p>
<?php
    
    $sql2 =  "SELECT * FROM users";
    $result2 = $conn->query($sql2);        
    if($result2->num_rows > 0) {
    while ($row2= $result2->fetch_assoc())
        {
        echo "<ul class='productlist'><a class=link1 href='memberpage.php?id=" . $row2['userid']. " '> ".
        $row2['username']. "</a></ul>";
         echo "<br />";
        }             
    }   
?>
    </div>
    <div class="col-9">
    <p class="accountitle"> All the products on sale </p>
    <div class="grid-container-products_home">

<?php
$sql =  "SELECT * FROM products" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo '<div class=space3>'.'<p class=title2>'.$row['title'].'</p>'.'<p>'.$row['brand'].'</p>'.'<p>'.$row['cost'].
'<p>'.'<img class=image1 src='.'"'.$row['picture'].'"'.'"'.'</p>'.'<p >'.
"<a class=link1 href='delete_confirmation.php?id=" .$row['id'].  " '>Delete</a>".
"<a class=link1 href='update_product.php?id=" . $row['id']. " '>  Update</a>".'</p>'.'</div>';
} 
}
$conn->close();
?>
</div>
</div>
    </div>
    </div>
    </div>
    <br>
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
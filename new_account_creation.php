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
    <title>Account creation</title>
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

<div class="product_frame_createaccount">
  <div class="container">
    <div class="col-9">
    <div class="container_createaccount">
      <br>
    <div class="row">
    <p class="accountitle">Account information</p>
    </div>
     
        <form enctype="multipart/form-data" class="createaccount" action="new_account_proc.php" method="post" name="UpdateForm">
        <div class="form-group">            
         <label for="titleproduct">Username</label>
        <input type="text" class="form-control"  name="username" placeholder="insert username">
        </div>
        <div class="form-group">
        <label for="brandproduct">Password</label>
        <input type="password" class="form-control"  name="password" placeholder="Create a password of ten characters">
        </div>
        <div class="form-group">
        <label for="ageproduct">Firstname</label>
        <input type="text" class="form-control"  name="firstname" placeholder="Name">
        </div>
        <div class="form-group">
        <label for="estateproduct">Lastname</label>
        <input type="text" class="form-control"  name="lastname" placeholder="Lastname">
        </div>
        <div class="form-group">
        <label for="estateproduct">Telephone</label>
        <input type="text" class="form-control"  name="telephone" placeholder="Lastname">
        </div>
        <div class="form-group">
        <label for="costproduct">Address</label>
         <input type="text" class="form-control"  name="address" placeholder="Address">
        </div>
        <div class="form-group">
        <label for="descriptionproduct">Email</label>
        <input type="text" class="form-control"  name="email" placeholder="email">
        </div>            
        <input type="submit"  name="submit" placeholder="change details" class="btn btn-primary" value="Create account">
        </form>


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
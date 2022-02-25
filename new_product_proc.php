<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/errors.php');

include('includes/db_connx.php');  

    $title = mysqli_real_escape_string($conn,$_POST['titleproduct']);
    $brand = mysqli_real_escape_string($conn,$_POST['brandproduct']);
    $age = mysqli_real_escape_string($conn,$_POST['ageproduct']);
    $estate =mysqli_real_escape_string($conn,$_POST['estateproduct']);
    $cost = mysqli_real_escape_string($conn,$_POST['costproduct']);
    $description =mysqli_real_escape_string($conn,$_POST['descriptionproduct']);
    $userid =mysqli_real_escape_string($conn,$_POST['userid']);


    // upload image to database
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    

    //   Check if file image is a real image

      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }

      // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size under 2 MB
      if ($_FILES["fileToUpload"]["size"] > 2000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
      }

      // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "webp" ) {
    echo "Sorry, only JPG, JPEG, PNG , GIF and WEBP files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    }  
  
    else
    {
    $sql =  "INSERT INTO products(title, brand, age, estate, cost, picture, information, userid)
     VALUE('$title', '$brand', '$age', '$estate' , '$cost','$target_file', '$description', '$userid')";
     (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));
   

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }        
      $conn->close();      
	}
?>



<?php   
    include('includes/errors.php');
    include('includes/db_connx.php');
    session_destroy();
    header('Location:index.php');
?>

<?php
    if(!isset($_GET['id'])){
        header('location: user-template.php');
    }
    
    else if (isset($_GET['id'])){
        echo "User ID: ". $_GET['id'] ."<br>";
    }
?>
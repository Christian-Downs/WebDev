<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Welcome Page</title>
</head>
<body>

<?php

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    
    if(!isset($_SESSION['user'])){
        $_SESSION['returnUrl'] = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        header('Location: login.php', true, $permanent ? 301 : 302);

    } else {
        include_once('models/userModel.php');
        // unserialize($_SESSION['user'])->username;
    }
?>
    <?php include('views/header.php')?>
    <?php 
    include_once('controller/connecter.php');
    checkTables();
    ?>


        <?php 
    include ('allBusinesses.php')
    ?>

</body>
</html>
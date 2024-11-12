<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Welcome Page</title>
</head>
<body>

<?php
    include('models/Connector.php');

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    
    if(!isset($_SESSION['user'])){
        $_SESSION['returnUrl'] = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        header('Location: login.php', true, $permanent ? 301 : 302);

        exit();
    } else {
        echo $_SESSION['user'];
    }
?>
    <?php include('views/header.php')?>
    <?php 
    include('controller/connecter.php');
    checkTables();
    ?>
    <h1>Welcome to My Website!</h1>
    
    <p>This is the home page of my project.</p>
</body>
</html>
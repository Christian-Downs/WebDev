<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Logout</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="w3-container w3-center">
        <h1>You have been logged out</h1>
        <p>Thank you for visiting. You have successfully logged out.</p>
        <a href="login.php">Login again</a>
    </div>
</body>

</html>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_unset();
session_destroy();
?>
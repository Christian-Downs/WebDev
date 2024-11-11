<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <!-- Include any necessary CSS or JavaScript files -->
</head>
<body>

<?php
    function checkLogin($username, $password){
        if(session_status()=== PHP_SESSION_NONE){

            session_start();
        }

        $_SESSION['user'] = $username;

        // IF FAIL THOW EXECPTION
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if (isset($_POST['username']) && isset($_POST['password'])){
            try{
                checkLogin($_POST['username'],$_POST['password']);
                if(isset($_SESSION['returnUrl'])){
                    error_log("LOGIN: GOING TO:".$_SESSION['returnUrl']);
                    header('Location: '.$_SESSION['returnUrl']);
                } else{
                    header('Location: index.php');
                }
            } catch (Exception $e){
                echo $e;
            }
        }
    }

?>



    <!-- Your login form or content goes here -->
     <h1>LOGIN TIME</h1>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
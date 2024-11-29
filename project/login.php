<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>

<body>
    <div class="w3-container w3-center">

        <?php
        function checkLogin($username, $password)
        {

            include('models/userModel.php');

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            try {
                $user = User::login($username, $password);
                if ($user !=  null) {
                    // error_log($user->id);
                    $_SESSION['user'] = serialize($user);
                }
            } catch (Exception $e) {
                error_log("ERROR");
                $_SESSION['login_error'] = "USER NOT FOUND";
                header('Location: login.php');
            }




            // IF FAIL THOW EXECPTION
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                try {
                    checkLogin($_POST['username'], $_POST['password']);
                    if (isset($_SESSION['returnUrl'])) {
                        error_log("LOGIN: GOING TO:" . $_SESSION['returnUrl']);
                        header('Location: ' . $_SESSION['returnUrl']);
                    } else {
                        header('Location: index.php');
                    }
                } catch (Exception $e) {
                    echo $e;
                }
            }
        }

        ?>



        <!-- Your login form or content goes here -->
        <h1>LOGIN TIME</h1>
        <form action="login.php" method="POST">
            <?php

            if (session_status() !== PHP_SESSION_NONE) {
                if (isset($_SESSION['login_error'])) {
                    echo 'User not found';
                }
            }
            ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
        <br>
        <a href="register.php"><button>Register</button></b>
    </div>
</body>

</html>
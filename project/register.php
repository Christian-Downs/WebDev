<?php
require_once 'models/userModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['username']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hash = hash("sha256", $password);

        $name = $_POST['name'];
        $email = $_POST['email'];

        $userModel = new User();
        $userModel->username = $username;
        $userModel->name = $name;
        $userModel->email = $email;
        try{
            $result = $userModel->save($hash);
            if(isset($_SESSION['returnUrl'])){
                error_log("REGISTER: GOING TO:".$_SESSION['returnUrl']);
                header('Location: '.$_SESSION['returnUrl']);
            } else{
                header('Location: index.php');
            }
        } catch (Exception $e){
            echo $e->getMessage();
        }
        

        if ($result) {
            echo "Registration successful!";
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
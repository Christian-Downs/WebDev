<?php
require_once 'models/userModel.php';
$userCheck = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hash = hash("sha256", $password);

        $name = $_POST['name'];
        $email = $_POST['email'];

        $userModel = new User();
        $userModel->username = $username;
        $userModel->name = $name;
        $userModel->email = $email;
        try {
            $userCheck = !$userModel->usernameCheck($username);
            error_log("userCheck:".($userCheck ? "true": "false"));
            if (!$userCheck){
                $result = $userModel->save($hash);
                if (isset($_SESSION['returnUrl'])) {
                    error_log("REGISTER: GOING TO:" . $_SESSION['returnUrl']);
                    header('Location: ' . $_SESSION['returnUrl']);
                } else {
                    header('Location: index.php');
                }
            } 
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <div class="w3-container w3-center">
        <h2>Welcome to Zelp</h2>
        <h3>To get started please fill out your information</h3>
        <form method="post" action="register.php" style="place-items:center">
            <table>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td colspan="2"><input type="text" id="name" name="name" placeholder="Your Name" required style="width:100%" value="<?php echo $userCheck ? $name : '' ?>"></td>
                </tr>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td colspan="2"><input type="text" id="username" name="username" placeholder="Your Username" required style="width:100%" value="<?php echo $userCheck ? $username : '' ?>"></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td colspan="2"><input type="password" id="password" name="password" placeholder="Your Password" required style="width:100%" ></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td colspan="2"><input type="email" id="email" name="email" placeholder="Your Email" required style="width:100%" value="<?php echo $userCheck ? $email : '' ?>"></td>
                </tr>
            </table>
            <br>
            <?php echo $userCheck ?  "USERNAME TAKEN <br>" :  "" ?>
            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>
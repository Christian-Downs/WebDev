<!DOCTYPE html>
<html>
<head>
    <title>My Web Page</title>
</head>
<body>
    <form action="process.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Submit">
    </form>
    <?php include('../footer.php');?>
</html>
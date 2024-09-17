<?php

// Your PHP code goes here

?><!DOCTYPE html>
<html>
<head>
    <title>My Web Page</title>
</head>
<body>
    <!-- Your HTML content goes here -->
     <form action="process.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <input type="submit" value="Submit">
     </form>
     <?php include('../footer.php');?>

</body>
</html>
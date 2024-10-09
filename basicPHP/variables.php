<!DOCTYPE html>
<html>
    <head>PHP Variable Demo</head>
</html>
<body>
    <?php
    $message = "Hello World";
    echo "<p>$message</p>";

    $num1 = 10;
    $num2 = 20;
    $hello;
    // echo "<p>The value of hello is $hello</p>";
    $hello = "Hello";
    echo "<p>The value of hello is $hello</p>";

    $sum = $num1 + $num2;

    echo "<p>The sum of $num1 and $num2 is $sum</p>";


    ?>

    <?php include('../footer.php');?>
</body>
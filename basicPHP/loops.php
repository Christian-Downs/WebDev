<!DOCTYPE html>
<html>
<head>
    <title>Loops Example</title>
</head>
<body>
    <h1>Loops Example</h1>

    <?php
        if (!true){
            echo "<p>hello truth</p>";
        } elseif (true) {
            echo "<p>hello false</p>";
        } else {
            echo "<p>hello else</p>";
        }

        $number =[5,4];
        echo "<p>{$number[1]}</p>";
    ?>

</body>
</html>
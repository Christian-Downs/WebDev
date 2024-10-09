<!DOCTYPE html>
<html>
<head>
    <title>Array Example</title>
</head>
<body>
    <h1>Array Example</h1>
    
    <?php
        $fruits = array("Apple", "Banana", "Orange", "Mango");
        echo "<p>My favorite fruit is $fruits[0]</p>";

        
        echo "<ol>";
        foreach($fruits as $fruit) {
            echo "<li>$fruit</li>";
        }
        echo "</ol>";
    ?>
    
</body>
</html>
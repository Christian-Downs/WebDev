<!DOCTYPE html>
<html>
<head>
    <title>Checkbox Example</title>
</head>
<body>
    <h1>Checkbox Example</h1>
    <?php
        $selectedOption = $_POST['checkbox'];
        echo $selectedOption;
        foreach ($selectedOption as $option){
            echo $option;
        }
    ?>
</body>
</html>
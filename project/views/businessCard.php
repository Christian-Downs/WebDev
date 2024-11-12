<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Business Card</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-card-4">
  <div class="w3-display-container w3-text-white">
    <?php 
        echo $photo;
    ?>
    <div class="w3-xlarge w3-display-bottomleft w3-padding"><?php echo $name; ?> TEST</div>
  </div>

</div>

</body>
</html>
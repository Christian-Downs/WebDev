<!-- 
Requires a business to be sent in as the $business variable 

-->

<!DOCTYPE html>
<html>
<head>
    <title>Business Card</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-card-4" style="width: 30em;">
  <div class="w3-display-container w3-text-green">
    <?php 
        echo $photo;
    ?>
    <div class="w3-large w3-display-bottomleft w3-padding"><?php echo $business->getName()." ".$business->getLocation(); ?> </div>
  </div>

</div>

</body>
</html>
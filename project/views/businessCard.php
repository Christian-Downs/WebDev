<!-- 
Requires a business to be sent in as the $business variable 

-->

<!DOCTYPE html>

<div class="w3-card-4 w3-container w3-middle" style="width: 30em;">
  <div class="w3-display-container w3-middle w3-text-green w3-padding">
    <?php 
        echo $photo;
    ?>
  </div>
  <div class="w3-container w3-center w3-padding">
    <?php echo $business->getName();
        echo "<br/>";
        echo $business->getLocation(); ?>
    <br/>
    <span class="w3-text-yellow">&#9733;</span> <?php echo ($business->getRating()) ? $business->getRating() : 0;?>/5.0
  </div>
  <?php include 'review.php';  ?>
</div>

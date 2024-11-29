<?php
function parsePhoto($fileContent) {
    // Get the file content
    
    // Encode the file content to base64
    $base64 = base64_encode($fileContent);
    
    // Create the img HTML tag
    $imgTag = '<img src="data:image/jpeg;base64,' . $base64 . '" alt="Photo" class="business-photo" style="width:100%">';
    
    return $imgTag;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <!-- Add your content here -->
       
        <?php  
            include_once('models/businessModel.php');
            $businesses = BusinessGetter::getAllBusinesses();

            foreach($businesses as $business){ 

                echo '<div class="w3-container w3-middle w3-center w3-margin-top" style="place-items:center">';
                $name = $business->getName();
                
                $photo = parsePhoto($business->getPhoto());
                include('views/businessCard.php');   //Creates business cards using the businesscard view
                echo "</div>";
            }

        ?>

</body>
</html>
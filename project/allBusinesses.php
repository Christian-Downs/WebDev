<?php
function parsePhoto($fileContent) {
    // Get the file content
    
    // Encode the file content to base64
    $base64 = base64_encode($fileContent);
    
    // Create the img HTML tag
    $imgTag = '<img src="data:image/jpeg;base64,' . $base64 . '" alt="Photo">';
    
    return $imgTag;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Businesses</title>
</head>
<body>
    <header>
        <h1>All Businesses</h1>
    </header>
    <main>
        <p>Welcome to the All Businesses page.</p>
        <!-- Add your content here -->
        <?php  
            include('models/businessModel.php');
            $businesses = BusinessGetter::getAllBusinesses();

            foreach($businesses as $business){ 
                $name = $business->getName();
                
                $photo = parsePhoto($business->getPhoto());
                echo $name;
                include('views/businessCard.php');   //Creates business cards using the businesscard view
            }

        ?>

    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> All Businesses. All rights reserved.</p>
    </footer>
</body>
</html>
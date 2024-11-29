<?php
require_once 'models/businessModel.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $ownerId = $_POST['ownerId'];

    // Handle photo upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photo = file_get_contents($_FILES['photo']['tmp_name']);
    } else {
        $photo = null;
    }

    $business = new Business();
    $business->setName($name);
    $business->setLocation($location);
    $business->setDescription($description);
    session_start();
    $business->setOwner(unserialize($_SESSION['user']));
    $business->setPhoto(base64_encode($photo));

    try {
        $business->save();
        echo "Business created successfully!";
        header("location: index.php");
    } catch (Exception $e) {
        echo "Error creating business: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Business</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>
    <?php include('views/header.php'); ?>
    <div class="w3-container w3-center">
        <h1>Create Business</h1>
        <form action="createBusiness.php" method="post" enctype="multipart/form-data">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br /><br>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required><br><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea><br><br>

            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required><br><br>

            <input type="submit" value="Create Business">
        </form>
    </div>
</body>

</html>
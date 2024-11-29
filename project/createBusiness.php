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
    $business->setOwner((new User())->getUserById($ownerId));
    $business->setPhoto(base64_encode($photo));

    try {
        $business->save();
        echo "Business created successfully!";
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
</head>

<body>
    <h1>Create Business</h1>
    <form action="createBusiness.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="ownerId">Owner ID:</label>
        <input type="text" id="ownerId" name="ownerId" required><br>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br>

        <input type="submit" value="Create Business">
    </form>
</body>

</html>
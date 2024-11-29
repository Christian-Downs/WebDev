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
        <form action="createBusiness.php" method="post" enctype="multipart/form-data" style="place-items:center">
            <table>

                <tr>
                    <td><label for="name">Name:</label></td>
                    <td colspan="2"><input type="text" id="name" name="name" placeholder="Business Name" required style="width:100%"></td>
                </tr>

                <tr>
                    <td><label for="location">Location:</label></td>
                    <td colspan="2"><input type="text" id="location" name="location" placeholder="Business Location" required style="width:100%"></td>
                </tr>

                <tr>
                    <td><label for="description">Description:</label></td>
                    <td colspan="2"> <textarea id="description" name="description" placeholder="Description" style="width:100%"></textarea></td>
                </tr>
                <tr>
                    <td><label for="photo">Photo:</label></td>
                    <td colspan="2"><input type="file" id="photo" name="photo" accept="image/*" required style="width:100%"></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Create Business">
        </form>
    </div>
</body>

</html>
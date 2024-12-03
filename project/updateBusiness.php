<?php
include_once('models/businessModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $photo = null;

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo = file_get_contents($_FILES['photo']['tmp_name']);
        }

        $business = Business::getBusinessById($id);
        $business->setName($name);
        $business->setLocation($location);
        $business->setDescription($description);

        if ($photo) {
            $business->setPhoto($photo);
        }
        error_log($business->getName());
        
        $business->update();

        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        error_log($e);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    error_log("ERROR");

    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
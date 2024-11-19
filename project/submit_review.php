<?php 
    require "models/reviewModel.php";
    error_log("HELLO");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Handle the POST request
        $rating = $_POST['review'] ?? '';
        $businessId = $_POST['businessId'] ?? '';
        $userId = $_POST('userId');

        $review = new Review(); 
        echo "Review submitted: " . htmlspecialchars($rating);
    } else {
        echo "No POST data received.";
    }
?>
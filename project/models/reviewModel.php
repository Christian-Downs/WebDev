<?php
include_once 'connection.php';
include_once 'businessModel.php';
include_once 'userModel.php';

error_log("HELLO");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle the POST request
    $rating = $_POST['review'] ?? '';
    $businessId = $_POST['businessId'] ?? '';
    $userId = $_POST['userId'];

    $review = new Review($userId, "", $rating, $businessId); 

    $review->insertReview();

    echo "Review submitted: " . htmlspecialchars($rating);
} else {
    echo "No POST data received.";
}

class Review
{
    private $rating;
    private $businessId;
    public Business $business;

    public User $user;
    private $userId;
    private $description;
    private static Connector $conn;


    public function __construct($userId = null, $description = null, $rating = null, $businessId = null)
    {
        if (!isset(self::$Connector)){
            self::$conn = new Connector();
        }
        if ($userId !== null) {
            $this->setUserId($userId);
        }
        if ($description !== null) {
            $this->setDescription($description);
        }
        if ($rating !== null) {
            $this->setRating($rating);
        }
        if ($businessId !== null) {
            $this->setBusinessId($businessId);
        }
    }

    // Getters
    public function getRating()
    {
        return $this->rating;
    }

    public function getBusinessId()
    {
        return $this->businessId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    // Setters
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function setBusinessId($businessId)
    {
        $this->businessId = $businessId;
        $this->business = Business::getBusinessById($businessId);
    }

    public function setBusiness(Business $business){
        $this->business = $business;
        $this->businessId = $business->getId();
    }
    public function getBusiness():Business{
        return $this->business;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    // Insert review
    public function insertReview()
    {
        $query = "INSERT INTO review (rating, businessId, userId, description) VALUES (:rating, :businessId, :userId, :description)";
        $stmt = self::$conn->pdo->prepare($query);

        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':businessId', $this->businessId);
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':description', $this->description);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Update review
    public function updateReview($id)
    {
        $query = "UPDATE review SET rating = :rating, businessId = :businessId, userId = :userId, description = :description WHERE id = :id";
        $stmt = self::$conn->pdo->prepare($query);

        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':businessId', $this->businessId);
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete review
    public function deleteReview($id)
    {
        $query = "DELETE FROM review WHERE id = :id";
        $stmt = self::$conn->pdo->prepare($query);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

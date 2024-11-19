<?php
include_once 'connection.php';
include_once 'businesssModel.php';
include_once 'userModel.php';

class Review
{
    private $rating;
    private $businessId;
    public Business $business;

    public User $user;
    private $userId;
    private $description;
    private static Connector $conn;


    public function __construct()
    {
        self::$conn = new Connector();
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
        $query = "INSERT INTO reviews (rating, business_id, user_id, description) VALUES (:rating, :businessId, :userId, :description)";
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
        $query = "UPDATE reviews SET rating = :rating, business_id = :businessId, user_id = :userId, description = :description WHERE id = :id";
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
        $query = "DELETE FROM reviews WHERE id = :id";
        $stmt = self::$conn->pdo->prepare($query);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

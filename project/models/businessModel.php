<?php

include_once('userModel.php');

class Business{
    private $id;
    private $name;
    private User $owner;
    private $location;
    private $description;
    
    private static Connector $Connector;

    private $photo;

    private $rating;

    public function __construct($name = '', $owner = '', $location = '', $description = '') {
        $this->name = $name;
        $this->owner = new User('',$owner,'');
        $this->location = $location;
        $this->description = $description;
        if (!isset(self::$Connector)){
            self::$Connector = new Connector();
        }    }

    public function save() {
        error_log(print_r($this, true));
        $sql = "INSERT INTO business (name, ownerId, location, description, photo) VALUES (:name, :ownerId, :location, :description, :photo)";
        $stmt = self::$Connector->pdo->prepare($sql);
        
        $stmt->execute([
            'name' => $this->name,
            'ownerId' => $this->owner->id,
            'location' => $this->location,
            'description' => $this->description,
            'photo' => $this->photo
        ]);
        
        $this->id = self::$Connector->pdo->lastInsertId();

    }

    public function update()
    {
        error_log(print_r($this, true));
        $sql = "update business set name = :name, location = :location, description = :description, photo = :photo where id = :id" ;
        $stmt = self::$Connector->pdo->prepare($sql);

        $stmt->execute([
            'name' => $this->name,
            'location' => $this->location,
            'description' => $this->description,
            'photo' => $this->photo,
            'id' => $this->id
        ]);
    }


    public function delete() {
        if (!isset(self::$Connector)){
            self::$Connector = new Connector();
        }
        $sql = "DELETE FROM business WHERE id = :id";
        $stmt = self::$Connector->pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
    }

    public static function getBusinessById($id) {
        if (!isset(self::$Connector)){
            self::$Connector = new Connector();
        }
        $sql = "SELECT b.id, b.name, b.location, b.description, u.id as owner, b.photo as photo FROM business b join registration u on b.ownerId = u.id WHERE b.id = :id";
        $stmt = self::$Connector->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $business = $stmt->fetch();
        if ($business) {
            $instance = new self();
            $instance->id = $business['id'];
            $instance->name = $business['name'];
            $instance->owner = (new User())->getUserById($business['owner']);
            $instance->location = $business['location'];
            $instance->description = $business['description'];
            $instance->photo = $business['photo'];
            return $instance;
        } else {
            throw new Exception("SQL ERROR BUSINESS MODEL GET BUSINESS BY ID: BUSINESS NOT FOUND ERROR");
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function setOwner(User $owner) {
        $this->owner = $owner;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }
    public function getRating() {
        return $this->rating;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'location' => $this->getLocation(),
            'description' => $this->getDescription(),
            'photo' => base64_encode($this->getPhoto()), // Encode photo if needed
        ];
    }


}

class BusinessGetter{
    private Connector $connector;

    public function __construct(){

    }


    public static function getAllBusinesses() {
        $tempConnector = new Connector();

        $sql = "
        SELECT
	b.id,
	b.name,
	b.ownerId,
	b.location,
	b.description,
	b.photo,
	r.rating
FROM
	business b
left join (SELECT businessid, round(AVG(rating),1) as rating from review r group by businessid) r on
	r.businessId = b.id
        ";
        $stmt = $tempConnector->pdo->prepare($sql);
        $stmt->execute();
        $businesses = $stmt->fetchAll();
        $businessList = [];
        foreach ($businesses as $business) {
            $instance = new Business();
            // error_log(implode(array_values($business)));
            $instance->setId($business['id']);
            $instance->setName($business['name']);
            $instance->setOwner((new User())->getUserById($business['ownerId']));
            $instance->setLocation($business['location']);
            $instance->setRating($business['rating']);
            $instance->setDescription($business['description']);
            $instance->setPhoto($business['photo']);
            $businessList[] = $instance;
        }
        return $businessList;
    }

    public static function getAllBusinessesForUser($id)
    {
        $tempConnector = new Connector();

        $sql = "
        SELECT
	b.id,
	b.name,
	b.ownerId,
	b.location,
	b.description,
	b.photo,
	r.rating
FROM
	business b
left join (SELECT businessid, round(AVG(rating),1) as rating from review r group by businessid) r on
	r.businessId = b.id
where b.ownerId = :id
        ";
        $stmt = $tempConnector->pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $businesses = $stmt->fetchAll();
        $businessList = [];
        foreach ($businesses as $business) {
            $instance = new Business();
            // error_log(implode(array_values($business)));
            $instance->setId($business['id']);
            $instance->setName($business['name']);
            $instance->setOwner((new User())->getUserById($business['ownerId']));
            $instance->setLocation($business['location']);
            $instance->setRating($business['rating']);
            $instance->setDescription($business['description']);
            $instance->setPhoto($business['photo']);
            $businessList[] = $instance;
        }
        return $businessList;
    }

    public static function setAllPhotosToPlaceholder($photoConent) {
        $tempConnector = new Connector();        
        $sql = "UPDATE business SET photo = :photo";
        $stmt = $tempConnector->pdo->prepare($sql);
        $stmt->execute(['photo' => $photoConent]);
    }

}
?>
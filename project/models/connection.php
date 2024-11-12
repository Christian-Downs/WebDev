<?php

class Connector{

    public PDO $pdo;
    private const CACHE_FILE = __DIR__ . '/tables_exists.cache'; // Define cache file path


    function __construct(){
        $this->connect();
        if(!file_exists(self::CACHE_FILE)){
            $this->checkTables();
        }
    }



    private function connect(): bool
    {
        $dsn = 'mysql:host=localhost;dbname=project';
        $username = 'root';
        $password = 'root';
        try {
            $pdo = new PDO($dsn, $username, $password);
            $this->pdo = $pdo;
            return true;
        } catch (PDOException $e) {
            die("Connector Error" . $e->getMessage());
        }   
    }

    private function checkTables(){
        error_log("RAN");
        $this->checkUsersTables();
        $this->checkBusinessTable();
        $this->checkReviewTable();
        file_put_contents(self::CACHE_FILE, '1');

    }



    private function checkUsersTables()
    {
        try{
            $stmt = $this->pdo->query("select 1 from registration LIMIT 1");
 
        } catch (PDOException $e){
            $this->createUsersTable();
        }
    }

    private function createUsersTable(): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS registration(
            id int(7) not null AUTO_INCREMENT,
            name VARCHAR(100) NOT Null,
            username  varchar(100) not null unique,
            email VARCHAR(100) not null unique,
            password varchar(100) not null,
            Primary key(id)
        )";

        $stmt = $this->pdo->prepare($sql);


        if ($stmt->execute()) {

            echo "table created successfully";
            return true;
        } else {
            echo "error in creating the table: " . implode(", ", $stmt->errorInfo());
            return false;
        }
    }


    private function checkBusinessTable(){
        try {
            $stmt = $this->pdo->query("select 1 from business LIMIT 1");
        } catch (PDOException $e) {
            $this->createBusinessTable();
        }
    }

    private function createBusinessTable(): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS business(
            id INT(7) auto_increment NOT NULL,
            name varchar(100) NOT NULL,
            location varchar(100) NOT NULL,
            description varchar(100) NOT NULL,
            ownerid INT(7) NOT NULL,
            photo LONGBLOB,
            PRIMARY KEY (id),
            FOREIGN KEY (ownerid) REFERENCES project.registration(id)
        )";

        $stmt = $this->pdo->prepare($sql);


        if ($stmt->execute()) {

            echo "table created successfully";
            return true;
        } else {
            echo "error in creating the table: " . implode(", ", $stmt->errorInfo());
            return false;
        }
    }


    private function checkReviewTable()
    {
        try {
            $stmt = $this->pdo->query("select 1 from review LIMIT 1");
        } catch (PDOException $e) {
            $this->createReviewTable();
        }
    }

    private function createReviewTable(): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS review(
            id INT(7) auto_increment NOT NULL,
            rating FLOAT(3) NOT NULL,
            businessid int(7) NOT NULL,
            userid int(7) NOT NULL,
            descriptiono varchar(100) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (businessid) REFERENCES project.business(id),
            FOREIGN KEY (userid) REFERENCES project.registration(id)
        )";

        $stmt = $this->pdo->prepare($sql);


        if ($stmt->execute()) {

            echo "table created successfully";
            return true;
        } else {
            echo "error in creating the table: " . implode(", ", $stmt->errorInfo());
            return false;
        }
    }

}
?>
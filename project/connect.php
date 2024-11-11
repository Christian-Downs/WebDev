<?php
    $dsn = 'mysql:host=localhost:dbname=my_db';
    $username='root';
    $password='root';

    try{
        $pdo= new PDO($dsn, $username, $password);
    } catch (PDOException $e){
        die("Connection Error".$e->getMessage());
    }

    $sql="CREATE TABLE IF NOT EXISTS my_table{
        id int(7) not null AUTO_INCREMENT,
        name VARCHAR(100) NOT Null,
        email VARCHAR(100) not null,
        Primary key(id)
    )";

    $stmt = $pdo -> prepare($sql);

    if ($stmt->execute()){
        echo "table created successfully";
    } else{
        echo "error in creating the table".$stmt->error;
    }

    $sql = "INSERT INTO my_table (name,email) values (:name, :email)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':name',$name);



?>
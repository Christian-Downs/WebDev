<?php
    include("connection.php");

class User{

    private static Connection $connection;

    public string $username;
    public string $name;
    public string $email;
    public int $id;
    /**
     * To use this pick a way to find a user than fill that in and put blank for all the others
     * @param mixed $username
     * @param mixed $id
     * @param mixed $email
     * @return void
     */
    function __construct($username = '', $id = 0, $email = ""){
        if (!isset(self::$connection)){
            self::$connection = new Connection();
        }
        error_log($email." ".$username." ".$id);
        if ($id != 0 && $id != ''){
            
            $this->getUserById($id);
            return;
        }
        if($username != ''){
            $this->getUserByUsername($username);
            return;
        }
        if($email != ""){
            $this->getUserByEmail($email);
        }
    }

    function  updateUsername($username){
        $sql = "update users set username = :username where id = :id";
        if(self::$connection->pdo->prepare($sql)->execute(['username'=>$username, 'id'=>$this->id])){
            $this->username = $username;
            return;
        } else {
            throw new Exception("SQL ERROR USER MODEL UPDATE USERNAME: USERNAME DID NOT UPDATE ERROR");
        }        
    }

    function updateName($name){
        $sql = "update users set name = :name where id = :id";
        if (self::$connection->pdo->prepare($sql)->execute(['name' => $name, 'id' => $this->id])) {
            $this->name = $name;
            return;
        } else {
            throw new Exception("SQL ERROR USER MODEL UPDATE NAME: NAME DID NOT UPDATE ERROR");
        }   
    } 
    function updateEmail($email){
        $sql = "update users set email = :email where id = :id";
        if (self::$connection->pdo->prepare($sql)->execute(['email' => $email, 'id' => $this->id])) {
            $this->email = $email;
            return;
        } else {
            throw new Exception("SQL ERROR USER MODEL UPDATE EMAIL: EMAIL DID NOT UPDATE ERROR");
        }   
    }

    function updatePassword($password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "update users set password = :password where id = :id";
        if (self::$connection->pdo->prepare($sql)->execute(['password' => $hashedPassword, 'id' => $this->id])) {
            return;
        } else {
            throw new Exception("SQL ERROR USER MODEL UPDATE PASSWORD: PASSWORD DID NOT UPDATE ERROR");
        }   
    }

    function deleteUser(){
        $sql = "delete from users where id = :id";
        if (self::$connection->pdo->prepare($sql)->execute(['id' => $this->id])) {
            return;
        } else {
            throw new Exception("SQL ERROR USER MODEL DELETE USER: USER DID NOT DELETE ERROR");
        }   
    }

    function getUserByUsername($username){
        $sql = "select * from users where username = :username";
        $stmt = self::$connection->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();
        if ($user) {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            return $user;
        } else {
            error_log("SQL ERROR USER MODEL GET USER BY USERNAME: USER NOT FOUND ERROR");
            throw new Exception("SQL ERROR USER MODEL GET USER BY USERNAME: USER NOT FOUND ERROR");
        }
    }

    function getUserByEmail($email){
        $sql = "select * from users where email = :email";
        $stmt = self::$connection->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        if ($user) {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            return $user;
        } else {
            throw new Exception("SQL ERROR USER MODEL GET USER BY EMAIL: USER NOT FOUND ERROR");
        }
    }

    function getUserById($id){
        $sql = "select * from users where id = :id";
        $stmt = self::$connection->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        if ($user) {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            return $user;
        } else {
            throw new Exception("SQL ERROR USER MODEL GET USER BY ID: USER NOT FOUND ERROR");
        }
    }

}
?>
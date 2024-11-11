<?php 
include(dirname(__FILE__) . "/../models/userModel.php");

$user = new User('',1);

echo "USER: ".$user->username;
?>
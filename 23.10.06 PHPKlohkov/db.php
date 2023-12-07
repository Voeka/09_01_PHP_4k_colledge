<?php

$db = new PDO(
    "mysql:host=localhost;dbname=cakesKlohkov",'root',''
);

session_start();

if(!isset($_SESSION["user"])){
    $_SESSION['user'] = [];
};


?>
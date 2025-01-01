<?php

require './User.php';
require '../config/config.php';
require './Categorie.php'


$db = new database;
$conn = $db->connect();

$tech = new categorie($conn);

$tech->setattributes("amine", "0681634833", "amine@gmail.com", "azed", "administrator");
$amine->createuser();
print_r($amine->getuserbyid(1));




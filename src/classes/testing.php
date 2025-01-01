<?php

require './User.php';
require '../config/config.php';
require './Categorie.php';


$db = new database;
$conn = $db->connect();

$tech = new categorie($conn);

// $tech->setattributes("tech");
// $tech->createcategorie();

$tech->deletecategorie(1);



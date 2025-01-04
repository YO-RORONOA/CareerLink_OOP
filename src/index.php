<?php

require './controllers/RegisterValidation.php';
require './classes/User.php';
require './config/config.php';


// $db = new database;
// $conn = $db->connect();


$validate = new Registercontroller;
$validate->validateform($_POST);
$validate-> createuser();



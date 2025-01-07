<?php

require './controllers/RegisterValidation.php';
require './classes/User.php';
require './config/config.php';
// require './controllers/logincontroller.php';




// new registration
$validate = new Registercontroller;

$validate->validateform($_POST);



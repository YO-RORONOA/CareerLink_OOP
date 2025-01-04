<?php

require './controllers/RegisterValidation.php';
require './classes/User.php';
require './config/config.php';




// new registration
$validate = new Registercontroller;
$validate->validateform($_POST);



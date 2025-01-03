<?php

session_start();

$error_message = [];

if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (empty($email) || empty($password)) {
        $_SESSION['error_message'][] = "Please fill all fields.";
        header('Location: ../views/login.php');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailerror'] = "Please enter a valid email address.";
    }





}



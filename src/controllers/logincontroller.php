<?php

if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (empty($email)) {
        $error_message['email'] = "Please fill all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message['email'] = "Please enter a valid email address.";
    }

    if (empty($password)) {
        $error_message['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $error_message['password'] = "Password is incorrect.";
    }



}
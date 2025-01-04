<?php

namespace Youcode\CareerLinkOop\logincontrol;

use database;
use user;

session_start();

$error_message = [];


class logincontroller
{
    protected $db;
    protected $user;

    public function __construct()
    {
        $database = new database;
        $this->db= $database->connect();

        $this->user = new user($this->db); 
    }


    public function loginvalidation($data)
    {

        if (isset($_POST["submit"])) {
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

        $userdata = $this->user->getuserbyid($email);

        if(!$userdata)
        {
            $_SESSION['!user'] = "User not found.";
            return $this->redirectlogin();
        }

        if(!password_verify($password, $userdata['password']))
        {
            $_SESSION['!password'] = "password is incorrect.";
            return $this->redirectlogin();
        }

        $_SESSION['user_id'] = $userdata['id'];
        $_SESSION['user_role'] = $userdata['role'];
        $_SESSION['user_name'] = $userdata['name'];

        // header('Location: ../views/dashboard.php');
    }





        public function redirectlogin()
        {
            header('../views/login.php');
        }



}



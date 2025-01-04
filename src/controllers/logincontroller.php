<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/User.php';




session_start();



class Logincontroller
{
    protected $db;
    protected $user;
    protected $email;
    protected $password;
    protected $text_error = [];


    

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->connect();

        $this->user = new User($this->db);
    }


    public function loginvalidation($data)
    {

        if (isset($data["submit"])) {

            
            $this->email = $data["email"];
            $this->password = $data["password"];


            if (empty($this->email) || empty($this->password)) {
                $this->text_error['email'] = "Please fill all fields.";
                header('Location: ../views/login.php');
                exit();
            }

            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->text_error['email2'] = "Please enter a valid email address.";
            }

        }

        if (!empty($this->text_error)) {
            $_SESSION['text_error'] = $this->text_error;
            header('Location: ../views/register.php');
            exit();
        }


        $userdata = $this->user->getuserbyemail($this->email);

        

        if (!$userdata) {
            $this->text_error['!user'] = "User not found.";
            return $this->redirectlogin();
        }

        if (!password_verify($this->password, $userdata['password'])) {
            $this->text_error['!password'] = "password is incorrect.";

            return $this->redirectlogin();
        }

        $_SESSION['user_id'] = $userdata['id'];
        $_SESSION['user_role'] = $userdata['role'];
        $_SESSION['user_name'] = $userdata['name'];


        header('Location: ../views/register.php');
        exit();

        }





    public function redirectlogin()
    {
        header('Location: ../views/login.php');
        exit();
    }
}


$login = new Logincontroller;
$login->loginvalidation($_POST);



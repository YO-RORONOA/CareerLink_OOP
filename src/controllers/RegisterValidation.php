<?php
require '../config/config.php';
require '../classes/User.php';



session_start();

$formdata = [];

$error_message = [];

class Registercontroller
{
    protected $db;
    protected $user;
    protected $name;
    protected $email;
    protected $phone;
    protected $password;
    protected $role;

    public function __construct()
    {
        $database = new database;
        $this->db = $database->connect();

        $this->user = new user($this->db);
    }


    public function validateform($data)
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $role = $_POST["role"];

            $formdata = $_POST;


            if (empty($name)) {
                $error_message["name"] = "Name is required.";
            } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
                $error_message['name'] = "Name can only contain letters and spaces.";
            }

            if (empty($email)) {
                $error_message['email'] = "Email is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_message['email'] = "Please enter a valid email address.";
            }


            if (empty($phone)) {
                $error_message['phone'] = "Phone number is required.";
            } elseif (!preg_match("/^[0-9]+$/", $phone)) {
                $error_message['phone'] = "Phone number can only contain numbers.";
            }

            if (empty($password)) {
                $error_message['password'] = "Password is required.";
            } elseif (strlen($password) < 6) {
                $error_message['password'] = "Password must be at least 6 characters.";
            }

            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);



            if (!empty($error_message)) {
                $_SESSION['error_message'] = $error_message;
                $_SESSION['formdata'] = $formdata;
                header("Location: ../src/views/register.php");
                exit;
            }
        }
    }


    public function createuser()
    {
        $this->user->setattributes($this->name, $this->phone, $this->email, $this->password, $this->role);
        $this->user->createuser();
    }
}
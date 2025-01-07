<?php
// require '../config/config.php';
// require '../classes/User.php';


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
    protected $hashedpassword;

    public function __construct()
    {
        $database = new database;
        $this->db = $database->connect();

        $this->user = new user($this->db);
    }


    public function validateform($data)
    {
        if (isset($data["submit"])) {
            $this->name = $data["name"];
            $this->email = $data["email"];
            $this->phone = $data["phone"];
            $this->password = $data["password"];
            $this->role = $data["role"];

            $formdata = $data;


            if (empty($this->name)) {
                $error_message["name"] = "Name is required.";
            } elseif (!preg_match("/^[a-zA-Z\s]+$/", $this->name)) {
                $error_message['name'] = "Name can only contain letters and spaces.";
            }

            if (empty($this->email)) {
                $error_message['email'] = "Email is required.";
            } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $error_message['email'] = "Please enter a valid email address.";
            }


            if (empty($this->phone)) {
                $error_message['phone'] = "Phone number is required.";
            } elseif (!preg_match("/^[0-9]+$/", $this->phone)) {
                $error_message['phone'] = "Phone number can only contain numbers.";
            }

            if (empty($this->password)) {
                $error_message['password'] = "Password is required.";
            } elseif (strlen($this->password) < 6) {
                $error_message['password'] = "Password must be at least 6 characters.";
            }

            $this->hashedpassword = password_hash($this->password, PASSWORD_DEFAULT);



            if (!empty($error_message)) {
                $_SESSION['error_message'] = $error_message;
                $_SESSION['formdata'] = $formdata;
                header("Location: ../src/views/register.php");
                exit;
            }
            $this->createuser();
            header('Location: ../src/views/login.php');


        }
    }


    public function createuser()
    {
        $this->user->setattributes($this->name, $this->phone, $this->email, $this->hashedpassword, $this->role);
        $this->user->createuser();
    }
}

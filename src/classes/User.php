<?php

class user{
    protected $db;
    protected $id;
    protected $name;
    protected $phone_number;
    protected $email_address;
    protected $password;
    protected $role;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function setattributes($name, $phone, $email, $password, $role)
    {
        $this->name = $name;
        $this->phone_number = $phone;
        $this->email_address = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function createuser()
    {
        $query = "INSERT into users(name, phone_number, email_adresse, password, role)
        values(:name, :phone_number, :email_adress, :password, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone_number', $this->phone_number);
        $stmt->bindParam(':email_adress', $this->email_adress);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        return $stmt->exicute();

    }



}